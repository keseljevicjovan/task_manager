<h1><?= htmlspecialchars($team['name']) ?></h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<p><?= nl2br(htmlspecialchars($team['description'])) ?></p>

<form method="POST" action="/teams/delete" onsubmit="return confirm('Are you sure you want to delete this team?');" style="margin-top: 20px;">
    <input type="hidden" name="id" value="<?= $team['id'] ?>">
    <button type="submit">
        Delete Team
    </button>
</form>

<a href="/teams" style="display: block; margin-top: 20px;">← Back to teams</a>
