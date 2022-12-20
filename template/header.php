<?php

include_once('./php/config.php');

if (isset($_SESSION["user_id"])) {
  header("location: " . BASE_URL . "home.php");
  exit;
} else {
  session_destroy();
}

?>
<!DOCTYPE html>
<html lang="pt">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aprendendo PDO</title>

  <link rel="icon" href="https://achievement-images.teamtreehouse.com/badges-php-databasespdo-stage1.png">

  <!-- Css Externos -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/style.min.css">

</head>

<body>