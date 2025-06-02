<?php

require_once __DIR__ . '/../../framework/database/connection.php';

class Project {
    private static function getDb() {
        return getConnection();
    }

    public static function all() {
        $conn = self::getDb();
        $result = $conn->query("SELECT * FROM projects");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $conn = self::getDb();
        $stmt = $conn->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public static function create($data) {
        $conn = self::getDb();
        $stmt = $conn->prepare("INSERT INTO projects (name, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['name'], $data['description']);
        return $stmt->execute();
    }

    public static function delete($id) {
        $conn = self::getDb();
        $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
