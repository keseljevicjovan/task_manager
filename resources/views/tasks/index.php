<h1>Tasks</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<a href="/tasks/create">+ New Task</a>

<ul>
<?php
$tasksByProject = [];
foreach ($tasks as $task) {
    $projectName = $task['project_name'] ?? 'No Project';
    if (!isset($tasksByProject[$projectName])) {
        $tasksByProject[$projectName] = [];
    }
    $tasksByProject[$projectName][] = $task;
}
?>

<?php foreach ($tasksByProject as $projectName => $tasksList): ?>
    <li>
        <?= htmlspecialchars($projectName) ?>
        <ul>
            <?php foreach ($tasksList as $task): ?>
                <li>
                    <a href="/tasks/show?id=<?= $task['id'] ?>">
                        <?= htmlspecialchars($task['title']) ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </li>
<?php endforeach; ?>
</ul>
