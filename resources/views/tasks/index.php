<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
  }

  a {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
  }

  a:hover {
    color: #0056b3;
    text-decoration: underline;
  }

  a.project-link {
    font-size: 1.2em;
    font-weight: 700;
    display: inline-block;
  }

  ul {
    list-style-type: none;
    padding-left: 0;
  }

  ul > li {
    margin-bottom: 20px;
  }

  ul ul {
    padding-left: 20px;
    margin-top: 5px;
  }

  ul ul li {
    margin-bottom: 8px;
  }

  a[href="/tasks/create"] {
    display: inline-block;
  }
</style>

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
        <?php if ($projectName !== 'No Project'): ?>
            <?php
              $projectId = $tasksList[0]['project_id'] ?? null;
            ?>
            <a href="/projects/show?id=<?= $projectId ?>" class="project-link">
                <?= htmlspecialchars($projectName) ?>
            </a>
        <?php else: ?>
            <span class="project-link" style="color:#6c757d; font-style: italic;">
                <?= htmlspecialchars($projectName) ?>
            </span>
        <?php endif; ?>

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
