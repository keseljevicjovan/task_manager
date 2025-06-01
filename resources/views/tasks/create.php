<h1>Create a New Task</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<form method="POST" action="/tasks/create">
    <label>Title:
        <input type="text" name="title" required>
    </label><br><br>

    <label>Description:<br>
        <textarea name="description" rows="5"></textarea>
    </label><br><br>

    <label>Team:
        <select name="team_id" required>
            <?php foreach ($teams as $team): ?>
                <option value="<?= $team['id'] ?>">
                    <?= htmlspecialchars($team['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <label>Project (optional):
        <select name="project_id">
            <option value="">-- None --</option>
            <?php foreach ($projects as $project): ?>
                <option value="<?= $project['id'] ?>">
                    <?= htmlspecialchars($project['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label><br><br>

    <label>Status:
        <select name="status">
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="done">Done</option>
        </select>
    </label><br><br>

    <button type="submit">Create Task</button>
</form>

<a href="/tasks">← Back to tasks</a>

