<h1><?= htmlspecialchars($project['name']) ?></h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<p><?= nl2br(htmlspecialchars($project['description'])) ?></p>

<a href="/projects">← Back to projects</a>
|
<a href="/projects/delete?id=<?= $project['id'] ?>" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
