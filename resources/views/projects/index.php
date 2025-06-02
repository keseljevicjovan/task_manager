<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
  }

  a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
  }

  a:hover {
    color: #0056b3;
    text-decoration: underline;
  }

  /* Stil za "New Project" link */
  a[href="/projects/create"] {
    display: inline-block;
  }

  ul {
    list-style-type: none;
    padding-left: 0;
  }

  ul li {
    margin-bottom: 10px;
  }
</style>

<h1>Projects</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<a href="/projects/create">+ New Project</a>

<ul>
    <?php foreach ($projects as $project): ?>
        <li>
            <a href="/projects/show?id=<?= $project['id'] ?>">
                <?= htmlspecialchars($project['name']) ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
