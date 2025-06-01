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
    <pre style="background:#2d2d2d; color:#f8f8f2; padding:10px; border-radius:5px; overflow-x:auto; max-width:300px;">
php artisan migrate
    </pre>
    <button onclick="copyToClipboard(this)">Copy</button>
  </li>
  <li>Покретање локалног development сервера:
    <pre style="background:#2d2d2d; color:#f8f8f2; padding:10px; border-radius:5px; overflow-x:auto; max-width:300px;">
php artisan serve
    </pre>
    <button onclick="copyToClipboard(this)">Copy</button>
  </li>
  <li>Све остале команде можете добити преко:
    <pre style="background:#2d2d2d; color:#f8f8f2; padding:10px; border-radius:5px; overflow-x:auto; max-width:300px;">
php artisan
    </pre>
    <button onclick="copyToClipboard(this)">Copy</button>
  </li>
</ul>

<script>
function copyToClipboard(button) {
  const codeBlock = button.previousElementSibling;
  const text = codeBlock.innerText.trim();
  navigator.clipboard.writeText(text).then(() => {
    button.innerText = "Copied!";
    setTimeout(() => button.innerText = "Copy", 1500);
  });
}
</script>

<p>Кешељевић Јован, 2025</p>
