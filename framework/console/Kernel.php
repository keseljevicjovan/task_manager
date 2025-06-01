<?php

class Kernel
{
    public function handle(array $argv)
    {
        require_once __DIR__ . '/../../bootstrap/env.php';

        $command = $argv[1] ?? null;
        $argument = $argv[2] ?? null;

        switch ($command) {
            case 'migrate':
                require_once __DIR__ . '/../database/migrate.php';
                break;

            case 'make:migration':
                if (!$argument) {
                    echo "You must specify a migration name, e.g. create_users_table\n";
                    exit(1);
                }
                $this->createMigration($argument);
                break;

            case 'migrate:list':
                $this->listMigrations();
                break;

            case 'migrate:fresh':
                require_once __DIR__ . '/../database/migrate_fresh.php';
                break;
      
            case 'serve':
                $host = $argument ?? 'localhost:8000';
                $publicPath = realpath(__DIR__ . '/../../public');
            
                echo "Starting development server at http://$host\n";
                echo "Press Ctrl+C to stop the server\n\n";
            
                passthru("php -S $host -t $publicPath");
                break;


            default:
                echo <<<ASCII
     _   __                                _   _      _ 
    | | / /                               | | | |    | |
    | |/ / _   _ _ __ ___   __ _ _ __ __ _| | | | ___| |
    |    \| | | | '_ ` _ \ / _` | '__/ _` | | | |/ _ \ |
    | |\  \ |_| | | | | | | (_| | | | (_| \ \_/ /  __/ |
    \_| \_/\__,_|_| |_| |_|\__,_|_|  \__,_|\___/ \___|_|
        
                   Кешељевић Јован - 2025               
    ASCII;
                echo "\n\nAvailable commands:\n";
                echo "  migrate              Run all migrations\n";
                echo "    make:migration     Create a new migration\n";
                echo "    migrate:list       List all migrations\n";
                echo "    migrate:fresh      Drop all tables and rerun migrations\n";
                echo "  serve                Serve the application on the PHP development server\n";
                break;
        }
    }

    private function listMigrations()
    {
        $dir = __DIR__ . '/../../database/migrations';
        $files = scandir($dir);

        $migrations = array_filter($files, function ($file) {
            return preg_match('/\.php$/', $file);
        });

        echo "List of all migrations:\n";
        foreach ($migrations as $migration) {
            echo " - {$migration}\n";
        }
    }

    private function createMigration($name)
    {
        $timestamp = date('Y_m_d_His');
        $fileName = __DIR__ . "/../../database/migrations/{$timestamp}_{$name}.php";

        $table = $name;
        if (preg_match('/^create_(.+)_table$/', $name, $matches)) {
            $table = $matches[1];
        }

        $className = implode('', array_map('ucfirst', explode('_', $name)));

        $template = <<<PHP
<?php

class $className
{
    public function up(mysqli \$conn)
    {
        \$sql = "CREATE TABLE IF NOT EXISTS $table (
            id INT PRIMARY KEY AUTO_INCREMENT
        )";

        if (!\$conn->query(\$sql)) {
            throw new Exception(\$conn->error);
        }
    }

    public function down(mysqli \$conn)
    {
        echo "Down migrations are not supported yet.";
    }
}

PHP;

        if (file_put_contents($fileName, $template)) {
            echo "Migration created: {$fileName}\n";
        } else {
            echo "Error creating migration file.\n";
        }
    }
}

