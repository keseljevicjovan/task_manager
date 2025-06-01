<?php

require_once __DIR__ . '/../../Models/Team.php';
require_once __DIR__ . '/../../../framework/view/view.php';

class TeamController {
  public function index() {
    $teams = Team::all();
    view('teams/index', ['teams' => $teams]);
  }

  public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $name = trim($_POST['name'] ?? '');
      $description = trim($_POST['description'] ?? '');

      if (empty($name)) {
        http_response_code(400);
        echo "Name is required.";
        return;
      }

      $data = [
        'name' => $name,
        'description' => $description,
      ];

      if (Team::create($data)) {
        header('Location: /teams');
        exit;
      } else {
        http_response_code(500);
        echo "Failed to create team.";
      }
    }

    view('teams/create');
  }

  public function show() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if (!$id) {
      http_response_code(400);
      echo "Team ID not provided.";
      return;
    }

    $team = Team::find($id);

    if (!$team) {
      http_response_code(404);
      echo "Team not found.";
      return;
    }

    view('teams/show', ['team' => $team]);
  }
  public function delete() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
      http_response_code(405);
      echo "Method not allowed.";
      return;
    }

    $id = isset($_POST['id']) ? (int)$_POST['id'] : null;

    if (!$id) {
      http_response_code(400);
      echo "Team ID not provided.";
      return;
    }

    if (Team::delete($id)) {
      header('Location: /teams');
      exit;
    } else {
      http_response_code(500);
      echo "Failed to delete team.";
    }
  }
}
