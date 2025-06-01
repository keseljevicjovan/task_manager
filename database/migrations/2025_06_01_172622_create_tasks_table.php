<?php

class CreateTasksTable
{
    public function up(mysqli $conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS tasks (
            id INT PRIMARY KEY AUTO_INCREMENT,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            project_id INT,
            team_id INT,
            status ENUM('pending', 'in_progress', 'done') DEFAULT 'pending',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (project_id) REFERENCES projects(id) ON DELETE CASCADE,
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
