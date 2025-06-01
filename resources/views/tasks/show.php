<h1><?= htmlspecialchars($task['title']) ?></h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<p><strong>Description:</strong><br>
<?= nl2br(htmlspecialchars($task['description'])) ?></p>

<p><strong>Status:</strong> <?= htmlspecialchars($task['status']) ?></p>

<p><strong>Project:</strong> <?= htmlspecialchars($task['project_name']) ?></p>

<form method="POST" action="/tasks/delete" onsubmit="return confirm('Are you sure?');">
    <input type="hidden" name="id" value="<?= $task['id'] ?>">
    <button type="submit">Delete Task</button>
</form>

<a href="/tasks">← Back to tasks</a>
