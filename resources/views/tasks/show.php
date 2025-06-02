<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
    /* nema margine */
  }

  p {
    font-family: Arial, sans-serif;
    font-size: 1.1em;
    color: #333;
    margin-bottom: 15px;
    white-space: pre-wrap; /* za dobar prikaz novih redova */
  }

  strong {
    font-weight: 700;
  }

  a {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    margin-right: 10px;
    transition: color 0.3s ease;
  }

  a:hover {
    color: #0056b3;
    text-decoration: underline;
  }
</style>

<h1><?= htmlspecialchars($task['title']) ?></h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<p><strong>Description:</strong><br>
<?= nl2br(htmlspecialchars($task['description'])) ?></p>

<p><strong>Status:</strong> <?= htmlspecialchars($task['status']) ?></p>

<p><strong>Project:</strong> <?= htmlspecialchars($task['project_name']) ?></p>

<a href="/tasks">← Back to tasks</a> |
<a href="/tasks/delete?id=<?= $task['id'] ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
