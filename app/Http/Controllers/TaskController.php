<?php

require_once __DIR__ . '/../../Models/Task.php';
require_once __DIR__ . '/../../Models/Team.php';
require_once __DIR__ . '/../../Models/Project.php';
require_once __DIR__ . '/../../../framework/view/view.php';

class TaskController {
    public function index() {
        $tasks = Task::all();
        view('tasks/index', ['tasks' => $tasks]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'title' => $_POST['title'] ?? '',
                'description' => $_POST['description'] ?? '',
                'project_id' => $_POST['project_id'] ?? null,
                'team_id' => $_POST['team_id'] ?? null,
            ];
            Task::create($data);
            header('Location: /tasks');
            exit;
        }

        $projects = Project::all();
        $teams = Team::all();
        view('tasks/create', ['projects' => $projects, 'teams' => $teams]);
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            echo "Task ID not provided.";
            return;
        }

        $task = Task::find($id);
        if (!$task) {
            http_response_code(404);
            echo "Task not found.";
            return;
        }

        view('tasks/show', ['task' => $task]);
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            Task::delete($id);
        }
        header('Location: /tasks');
        exit;
    }
}
