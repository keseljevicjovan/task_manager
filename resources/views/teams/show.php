<h1><?= htmlspecialchars($team['name']) ?></h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<p><?= nl2br(htmlspecialchars($team['description'])) ?></p>

<a href="/teams">← Back to teams</a>
|
<a href="/teams/delete?id=<?= $team['id'] ?>" onclick="return confirm('Are you sure you want to delete this team?')">Delete</a>
