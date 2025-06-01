<?php
require_once __DIR__ . '/../../framework/database/connection.php';

class Task {
    private static function getDb() {
        return getConnection();
    }

    public static function all() {
        $conn = self::getDb();
        $result = $conn->query("SELECT tasks.*, projects.name as project_name, teams.name as team_name
                                 FROM tasks
                                 LEFT JOIN projects ON tasks.project_id = projects.id
                                 LEFT JOIN teams ON tasks.team_id = teams.id");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public static function find($id) {
        $conn = self::getDb();
        $stmt = $conn->prepare("
            SELECT tasks.*, 
                   projects.name AS project_name, 
                   teams.name AS team_name
            FROM tasks
            LEFT JOIN projects ON tasks.project_id = projects.id
            LEFT JOIN teams ON tasks.team_id = teams.id
            WHERE tasks.id = ?
        ");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }


    public static function create($data) {
        $conn = self::getDb();
        $stmt = $conn->prepare("INSERT INTO tasks (title, description, project_id, team_id, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssiis", $data['title'], $data['description'], $data['project_id'], $data['team_id'], $data['status']);
        return $stmt->execute();
    }

    public static function delete($id) {
        $conn = self::getDb();
        $stmt = $conn->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
