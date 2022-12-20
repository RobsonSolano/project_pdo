<?php

include_once('./php/config.php');

if (!isset($_SESSION["user_id"])) {
  header("location: " . BASE_URL);
  exit;
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="./assets/css/style.min.css">

</head>

<body>


  <nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container d-flex">
      <div class="d-flex justify-content-between w-100">
        <a class="navbar-brand" href="#">PDO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="border-right">&nbsp;</li>
          <li class="nav-item dropdown">
            <a class="btn btn-dark btn-outline dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              Olá, <strong><?php echo $_SESSION["user_name"]; ?></strong>
            </a>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="#">Perfil</a></li>
              <li>
                <hr>
              </li>
              <li><a class="dropdown-item" href="<?php echo BASE_URL ?>/php/auth/logout.php">Sair</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>