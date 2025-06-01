<?php

class CreateTeamsTable
{
    public function up(mysqli $conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS teams (
            id INT PRIMARY KEY AUTO_INCREMENT,
            name VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
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
