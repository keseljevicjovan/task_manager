<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
  }

  form {
    max-width: 500px;
    font-family: Arial, sans-serif;
  }

  label {
    font-weight: 600;
    display: block;
    margin-bottom: 8px;
    color: #333;
  }

  input[type="text"],
  textarea,
  select {
    width: 100%;
    padding: 8px;
    margin-top: 4px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1em;
    font-family: inherit;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
  }

  input[type="text"]:focus,
  textarea:focus,
  select:focus {
    border-color: #007bff;
    outline: none;
  }

  button {
    background-color: #007bff;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 4px;
    font-size: 1em;
    cursor: pointer;
    font-weight: 600;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #0056b3;
  }

  a {
    display: inline-block;
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
  }

  a:hover {
    color: #0056b3;
    text-decoration: underline;
  }
</style>

<h1>Create a New Task</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<form method="POST" action="/tasks/create">
    <label>Title:
        <input type="text" name="title" required>
    </label>

    <label>Description:
        <textarea name="description" rows="5"></textarea>
    </label>

    <label>Team:
        <select name="team_id" required>
            <?php foreach ($teams as $team): ?>
                <option value="<?= $team['id'] ?>">
                    <?= htmlspecialchars($team['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Project:
        <select name="project_id" required>
            <?php foreach ($projects as $project): ?>
                <option value="<?= $project['id'] ?>">
                    <?= htmlspecialchars($project['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </label>

    <label>Status:
        <select name="status">
            <option value="pending">Pending</option>
            <option value="in_progress">In Progress</option>
            <option value="done">Done</option>
        </select>
    </label>

    <button type="submit">Create Task</button>
</form>

<a href="/tasks">← Back to tasks</a>
