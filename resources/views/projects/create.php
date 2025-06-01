<h1>Create New Project</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<form method="POST">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="5" cols="40"></textarea><br><br>

    <label>Team:</label><br>
    <select name="team_id">
        <option value="">No Team</option>
        <?php foreach ($teams as $team): ?>
            <option value="<?= $team['id'] ?>"><?= htmlspecialchars($team['name']) ?></option>
        <?php endforeach; ?>
    </select><br><br>

    <button type="submit">Create</button>
</form>

<a href="/projects">← Back to projects</a>
