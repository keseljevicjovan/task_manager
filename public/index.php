<?php

require_once __DIR__ . '/../bootstrap/env.php';

$db = require __DIR__ . '/../config/database.php';

$conn = new mysqli($db['host'], $db['user'], $db['pass'], $db['name']);
