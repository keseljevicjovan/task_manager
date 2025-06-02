<?php

require_once __DIR__ . '/../../Models/Project.php';
require_once __DIR__ . '/../../../framework/view/view.php';

class ProjectController {
    public function index() {
        $projects = Project::all();
        view('projects/index', ['projects' => $projects]);
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'] ?? '',
                'description' => $_POST['description'] ?? '',
            ];
            Project::create($data);
            header('Location: /projects');
            exit;
        }

        view('projects/create');
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            http_response_code(400);
            echo "Project ID not provided.";
            return;
        }

        $project = Project::find($id);
        if (!$project) {
            http_response_code(404);
            echo "Project not found.";
            return;
        }

        view('projects/show', ['project' => $project]);
    }

    public function delete() {
        $id = $_GET['id'] ?? null;
        if ($id) {
            Project::delete($id);
        }
        header('Location: /projects');
        exit;
    }
}

