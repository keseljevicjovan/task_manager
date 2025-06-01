<h1>All Projects</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<a href="/projects/create">+ New Project</a>
<ul>
    <?php foreach ($projects as $project): ?>
        <li>
            <a href="/projects/show?id=<?= $project['id'] ?>">
                <?= htmlspecialchars($project['name']) ?>
            </a> (Team: <?= htmlspecialchars($project['team_name']) ?>)
        </li>
    <?php endforeach; ?>
</ul>

