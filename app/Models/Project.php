<?php

require_once __DIR__ . '/../../framework/database/connection.php';

class Project {
    private static function getDb() {
        return getConnection();
    }

    public static function all() {
        $conn = self::getDb();
        $result = $conn->query("SELECT projects.*, teams.name AS team_name FROM projects LEFT JOIN teams ON projects.team_id = teams.id");
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
        $stmt = $conn->prepare("INSERT INTO projects (name, description, team_id) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $data['name'], $data['description'], $data['team_id']);
        return $stmt->execute();
    }

    public static function delete($id) {
        $conn = self::getDb();
        $stmt = $conn->prepare("DELETE FROM projects WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
