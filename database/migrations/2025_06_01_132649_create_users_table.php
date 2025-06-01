<?php

class CreateUsersTable
{
    public function up(mysqli $conn)
    {
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT PRIMARY KEY AUTO_INCREMENT
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
