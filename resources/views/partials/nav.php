<style>
nav {
  margin-bottom: 20px;
  background-color: #f8f9fa;
  padding: 10px 15px;
  border-radius: 5px;
  font-family: Arial, sans-serif;
  box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

nav a {
  color: #007bff;
  text-decoration: none;
  margin-right: 10px;
  font-weight: 600;
  transition: color 0.3s ease;
}

nav a:hover {
  color: #0056b3;
  text-decoration: underline;
}

nav a:not(:last-child)::after {
  content: "|";
  margin-left: 10px;
  color: #6c757d;
}
</style>

<nav>
    <a href="/">Home</a>
    <a href="/projects">Projects</a>
    <a href="/projects/create">Create Project</a>
    <a href="/tasks">Tasks</a>
    <a href="/tasks/create">Create Task</a>
    <a href="/teams">Teams</a>
    <a href="/teams/create">Create Team</a>
    <a href="/about">About</a>
</nav>
