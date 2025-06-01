<?php

require_once __DIR__ . '/../bootstrap/env.php';

function getConnection() {
    static $conn = null;

    if ($conn === null) {
        $db = require __DIR__ . '/../config/database.php';

        $conn = new mysqli($db['host'], $db['user'], $db['pass']);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $dbName = $conn->real_escape_string($db['name']);
        $result = $conn->query("SHOW DATABASES LIKE '{$dbName}'");

        if ($result->num_rows === 0) {
            if (!$conn->query("CREATE DATABASE `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")) {
                die("Error creating database: " . $conn->error);
            }
            echo "Database '{$dbName}' created successfully.\n";
        }

        $conn->close();

        $conn = new mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
        if ($conn->connect_error) {
            die("Connection failed after creating database: " . $conn->connect_error);
        }
    }

    return $conn;
}
