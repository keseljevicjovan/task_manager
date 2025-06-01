<?php

require_once __DIR__ . '/connection.php';

$conn = getConnection();

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
