<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
  }

  p {
    font-family: Arial, sans-serif;
    font-size: 1.1em;
    color: #333;
    margin-bottom: 15px;
    white-space: pre-wrap;
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

<h1><?= htmlspecialchars($team['name']) ?></h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<p><?= nl2br(htmlspecialchars($team['description'])) ?></p>

<a href="/teams">← Back to teams</a> |
<form method="POST" action="/teams/delete" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this team?');">
    <input type="hidden" name="id" value="<?= htmlspecialchars($team['id']) ?>">
    <button type="submit" style="background:none; border:none; padding:0; color:#007bff; text-decoration:underline; cursor:pointer; font-family: Arial, sans-serif; font-size: 1em;">
        Delete
    </button>
</form>

