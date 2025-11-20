<?php
// NO CACHE HEADERS — MUST BE FIRST LINE IN FILE
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!doctype html>
<html lang="en">
<head>
  <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Axen Vars</title>

  <style>
    /* Disable blue tap highlight on mobile */
    a, a:active, a:focus {
        -webkit-tap-highlight-color: transparent;
    }

    @font-face {
      font-family: 'CustomFont';
      src: url('https://cdn.jsdelivr.net/gh/axenvars/mysite/font.woff2') format('woff2');
      font-weight: 400 700;
      font-style: normal;
      font-display: swap;
    }

    html, body { height: 100%; }

    body {
      margin: 0;
      background: #000;
      color: #fff;
      font-family: 'CustomFont', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
      text-align: center;
      padding: 50px;
      box-sizing: border-box;

      opacity: 0;            /* start invisible */
      transition: opacity 1s ease; /* smooth fade */
    }

    body.show {
      opacity: 1;            /* fade-in after delay */
    }

    h1 {
      margin: 0 0 12px;
      font-size: 3rem;
      font-weight: 600;
    }

    #urls a {
      color: oklch(71.5% 0.143 215.221);
      font-size: 13px;
      text-decoration: none;
      letter-spacing: 1px;
    }

    .xcom a {
      color: oklch(58.6% 0.253 17.585);
      font-size: 13px;
      text-decoration: none;
      letter-spacing: 1px;
    }

    #urls a:hover,
    #urls a:focus {
      text-decoration: underline;
    }

    .xcom a:hover,
    .xcom a:focus {
      text-decoration: underline;
    }
  </style>
</head>

<body>
  <main>
    <br><br><br>
    <h1>Axen Vars</h1>
    <br><br>

    <div class="xcom">
      <a href="https://x.com/axenvars">X.COM/AXENVARS</a>
    </div>
    <br><br>

    <!-- PHP links will print here -->
    <div id="urls">
      <?php
$src = 'https://raw.githubusercontent.com/axenvars/mysite/main/urls.json?x=' . time();
$data = json_decode(file_get_contents($src), true);

foreach ($data as $x) {
    echo '<a href="' . $x['url'] . '">' . strtoupper($x['name']) . '</a><br><br><br>';
}
?>

    </div>
<br><br><br>
  </main>

<script>
  Promise.all([
    document.fonts.ready,          // wait for all fonts to load
    new Promise(res => window.onload = res) // wait for full page load
  ]).then(() => {
    setTimeout(() => {
      document.body.classList.add('show');
    }, 1100);
  });
</script>


</body>
</html>
