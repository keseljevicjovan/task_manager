<h1>Teams</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<a href="/teams/create">+ Add new team</a>
<ul>
  <?php foreach ($teams as $team): ?>
    <li>
      <a href="/teams/show?id=<?= $team['id'] ?>">
        <?= htmlspecialchars($team['name']) ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
