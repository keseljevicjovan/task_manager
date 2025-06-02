<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
  }

  form {
    max-width: 400px;
    font-family: Arial, sans-serif;
  }

  label {
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
    color: #333;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 1em;
    font-family: inherit;
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

<h1>Create New Project</h1>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>

    <label>Description:</label>
    <textarea name="description" rows="5" cols="40"></textarea>

    <button type="submit">Create</button>
</form>

<a href="/projects">← Back to projects</a>

