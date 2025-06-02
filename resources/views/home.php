<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    color: #333;
  }

  h1 {
    color: #007bff;
  }

  p {
    font-size: 1.1em;
    margin-bottom: 20px;
  }

  ul {
    list-style-type: none;
    padding-left: 0;
  }

  ul li {
    margin-bottom: 10px;
  }

  ul li a {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
  }

  ul li a:hover {
    color: #0056b3;
    text-decoration: underline;
  }
</style>

<h1>Home</h1>
<?php require __DIR__ . '/partials/nav.php'; ?>

<p>Welcome to the Task Manager!</p>

<ul>
    <li><a href="/projects">Projects</a></li>
    <li><a href="/tasks">Tasks</a></li>
    <li><a href="/teams">Teams</a></li>
</ul>

