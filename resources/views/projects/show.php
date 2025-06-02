<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
  }

  p {
    font-family: Arial, sans-serif;
    font-size: 1.1em;
    color: #333;
    white-space: pre-wrap;
    margin-bottom: 20px;
  }

  a {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    margin-right: 10px;
    transition: color 0.3s ease;
  }

  a:hover {
    color: #0056b3;
    text-decoration: underline;
  }
</style>

<h1><?= htmlspecialchars($project['name']) ?></h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<p><?= nl2br(htmlspecialchars($project['description'])) ?></p>

<a href="/projects">← Back to projects</a> |
<a href="/projects/delete?id=<?= $project['id'] ?>" onclick="return confirm('Are you sure you want to delete this project?')">Delete</a>
