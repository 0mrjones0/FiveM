<?php
// Hent brugerens IP
$ip = $_SERVER['REMOTE_ADDR'];

// Gem IP i fil
file_put_contents("ips.txt", $ip . "\n", FILE_APPEND);

// Hvis formularen er sendt, gem data
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    $data = "IP: $ip | Navn: $name | Email: $email | Besked: $message\n";
    file_put_contents("submissions.txt", $data, FILE_APPEND);
}
?>
<!DOCTYPE html>
<html lang="da">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Skoleprojekt - Forside</title>
  <style>
    body { font-family: Arial, sans-serif; margin:0; background:#f0f0f0; color:#333; }
    header { background:#4CAF50; color:white; padding:15px; text-align:center; }
    nav { display:flex; justify-content:center; background:#333; }
    nav a { color:white; text-decoration:none; padding:12px 20px; display:block; }
    nav a:hover { background:#4CAF50; }
    main { padding:20px; max-width:800px; margin:20px auto; background:white; border-radius:10px; box-shadow:0 0 10px rgba(0,0,0,0.1);}
    footer { text-align:center; padding:10px; margin-top:20px; background:#333; color:white; }
    h1,h2{text-align:center;}
    form { display:flex; flex-direction:column; }
    input, textarea { margin-bottom:10px; padding:10px; border-radius:5px; border:1px solid #ccc; font-size:14px; }
    button { padding:12px; background:#28a745; color:white; border:none; border-radius:5px; font-size:16px; cursor:pointer; }
    button:hover { background:#218838; }
  </style>
</head>
<body>

<header>
  <h1>Mit Skoleprojekt</h1>
</header>

<nav>
  <a href="index.php">Forside</a>
  <a href="om.html">Om mig</a>
  <a href="projekt.html">Projektbeskrivelse</a>
</nav>

<main>
  <h2>Kontakt mig</h2>
  <p>Udfyld formularen for at sende mig en besked:</p>

  <form method="POST" action="">
    <label>Navn:</label>
    <input type="text" name="name" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Besked:</label>
    <textarea name="message" rows="5" required></textarea>

    <button type="submit">Send besked</button>
  </form>
</main>

<footer>
  &copy; 2025 Mit Skoleprojekt
</footer>

</body>
</html>
