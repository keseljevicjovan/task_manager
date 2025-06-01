<?php

require_once __DIR__ . '/../bootstrap/env.php';

$db = require __DIR__ . '/../config/database.php';

function getConnection() {
    global $db;

    static $conn = null;
    if ($conn === null) {
        $conn = new mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    return $conn;
}
