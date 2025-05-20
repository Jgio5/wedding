<?php
session_start(); // <--- SEMPRE PRIMA DI QUALSIASI HTML!

if (!isset($_SESSION['access_granted']) || $_SESSION['access_granted'] !== true) {
    // Se la sessione non è valida, reindirizza
    header("Location: /"); // oppure dove vuoi
    exit;
}

// Se l'accesso è valido, puoi anche resettare subito la variabile per sicurezza:
unset($_SESSION['access_granted']);
?>

<!DOCTYPE html>
<html lang="it">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="img/favicon_io/favicon.ico" type="image/x-icon">
  <title></title>
  <link rel="stylesheet" href="css/thanks.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <div class="wrapper">
    <h1 id="thankYouMessage"></h1>
    <p class="thanks-message" id="thanks-message"></p>
    <p class="reminder" id="reminder"></p>
    <div class="pyro">
      <div class="before"></div>
      <div class="after"></div>
    </div>
    <div class="dots-remember">
        <img src="img/qr-app.webp" alt="">
        <a href="https://onelifesocial.page.link/ooHi" target="_blank" class="download-button">
            <i class="fas fa-download"></i>
        </a>
        <p class="code"></p>
        <p class="code-access" onclick="copyCode()" style="cursor: pointer;" title="Clicca per copiare">
            l2sXRiW
            <i class="fas fa-copy" style="margin-left: 6px; font-size: 14px;"></i>
        </p>
    </div>
    </div>
  </div>
  <script src="js/script.js"></script>
</body>
</html>