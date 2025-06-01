<?php

require_once __DIR__ . '/connection.php';

$conn = getConnection();

echo "Dropping all tables...\n";

$tablesResult = $conn->query("SHOW TABLES");
if (!$tablesResult) {
    die("Error fetching tables: " . $conn->error . "\n");
}

while ($row = $tablesResult->fetch_array()) {
    $table = $row[0];
    echo "Dropping table `$table`... ";
    if ($conn->query("DROP TABLE IF EXISTS `$table`")) {
        echo "OK\n";
    } else {
        echo "FAILED: " . $conn->error . "\n";
    }
}

echo "All tables dropped.\n\n";


$migrationsDir = __DIR__ . '/migrations';
$migrationFiles = glob($migrationsDir . '/*.php');
sort($migrationFiles);

foreach ($migrationFiles as $file) {
    require_once $file;

    $baseName = basename($file, '.php');

    $namePart = preg_replace('/^\d+_\d+_\d+_\d+/', '', $baseName);
    $namePart = trim($namePart, '_');

    $className = implode('', array_map('ucfirst', explode('_', $namePart)));

    if (!class_exists($className)) {
        echo "Error: Class $className not found in $baseName.php\n";
        continue;
    }

    $migration = new $className();

    echo "Running migration: $baseName.php... ";

    try {
        $migration->up($conn);
        echo "SUCCESS\n";
    } catch (Exception $e) {
        echo "ERROR: " . $e->getMessage() . "\n";
    }
}
