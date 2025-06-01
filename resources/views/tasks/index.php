<h1>All Tasks</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<a href="/tasks/create">+ New Task</a>

<ul>
    <?php foreach ($tasks as $task): ?>
        <li>
            <a href="/tasks/show?id=<?= $task['id'] ?>">
                <?= htmlspecialchars($task['title']) ?>
            </a> 
            (<?= htmlspecialchars($task['project_name']) ?>)
        </li>
    <?php endforeach; ?>
</ul>
