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

  a[href="/teams/create"] {
    display: inline-block;
  }

  ul {
    list-style-type: none;
    padding-left: 0;
  }

  ul li {
    margin-bottom: 12px;
    font-family: Arial, sans-serif;
    font-size: 1.1em;
  }
</style>

<h1>Teams</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<a href="/teams/create">+ New Team</a>
<ul>
  <?php foreach ($teams as $team): ?>
    <li>
      <a href="/teams/show?id=<?= $team['id'] ?>">
        <?= htmlspecialchars($team['name']) ?>
      </a>
    </li>
  <?php endforeach; ?>
</ul>
