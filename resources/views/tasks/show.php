<h1><?= htmlspecialchars($task['title']) ?></h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<p><strong>Description:</strong><br>
<?= nl2br(htmlspecialchars($task['description'])) ?></p>

<p><strong>Status:</strong> <?= htmlspecialchars($task['status']) ?></p>

<p><strong>Project:</strong> <?= htmlspecialchars($task['project_name']) ?></p>

<a href="/tasks">← Back to tasks</a>
|
<a href="/tasks/delete?id=<?= $task['id'] ?>" onclick="return confirm('Are you sure you want to delete this task?')">Delete</a>
