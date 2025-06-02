<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
  }

  label {
    font-weight: 600;
    font-family: Arial, sans-serif;
  }

  input[type="text"],
  textarea {
    width: 100%;
    max-width: 400px;
    padding: 8px 10px;
    margin-top: 5px;
    font-size: 1em;
    font-family: Arial, sans-serif;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    transition: border-color 0.3s ease;
  }

  input[type="text"]:focus,
  textarea:focus {
    border-color: #007bff;
    outline: none;
  }

  button {
    background-color: #007bff;
    color: white;
    font-weight: 700;
    border: none;
    padding: 10px 20px;
    font-size: 1em;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  button:hover {
    background-color: #0056b3;
  }
</style>

<h1>Create New Team</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<form method="POST" action="/teams/create">
  <label>Name:</label><br>
  <input type="text" name="name" required><br><br>

  <label>Description:</label><br>
  <textarea name="description"></textarea><br><br>

  <button type="submit">Create</button>
</form>
