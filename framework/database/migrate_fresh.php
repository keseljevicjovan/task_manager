<?php

require_once __DIR__ . '/connection.php';

$conn = getConnection();

echo "Dropping all tables...\n";

$conn->query('SET FOREIGN_KEY_CHECKS = 0');

$tablesResult = $conn->query("SHOW TABLES");
if (!$tablesResult) {
    die("Error fetching tables: " . $conn->error . "\n");
}

$tables = [];
while ($row = $tablesResult->fetch_array()) {
    $tables[] = $row[0];
}

$tables = array_reverse($tables);

foreach ($tables as $table) {
    echo "Dropping table `$table`... ";
    if ($conn->query("DROP TABLE IF EXISTS `$table`")) {
        echo "OK\n";
    } else {
        echo "FAILED: " . $conn->error . "\n";
    }
}

$conn->query('SET FOREIGN_KEY_CHECKS = 1');

echo "All tables dropped.\n\n";

$migrationsDir = __DIR__ . '/../../database/migrations';
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
