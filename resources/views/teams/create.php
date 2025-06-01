<h1>Create New Team</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<form method="POST" action="/teams/create">
  <label>Name:</label><br>
  <input type="text" name="name" required><br><br>

  <label>Description:</label><br>
  <textarea name="description"></textarea><br><br>

  <button type="submit">Create</button>
</form>
