<?php

class CreateProjectsTable
{
    public function up(mysqli $conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS projects (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            team_id INT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (team_id) REFERENCES teams(id) ON DELETE SET NULL
        )";

        if (!$conn->query($sql)) {
            throw new Exception($conn->error);
        }
    }

    public function down(mysqli $conn)
    {
        echo "Down migrations are not supported yet.";
    }
}
