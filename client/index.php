<?php
session_start();
include ("connection.php");
include ("functions.php");
?>

<!DOCTYPE html>
<html lang="hu">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <script src="getData.js"></script>
  <title>KickStats</title>
</head>

<body>
  <div class="container bg-light p-0">

    <nav class="navbar navbar-expand-lg navbar-dark szin"
      style="background-color: #08AEEA;background-image: linear-gradient(180deg, #08AEEA 0%, #2AF598 100%);border-radius: 25px;">
      <a class="navbar-brand" href="index.php">
        <img src="../client/img/FootBall.png" width="30" height="30" class="d-inline-block align-top" alt="">
        KickStats
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active p-2 m-2">
            <a class="nav-link" href="index.php"
              style="color: white; font-weight: bold;">Home</a>
          </li>
          <li class="nav-item p-2 m-2">
            <a class="nav-link" href="index.php?prog=Players.php">🔍 Search</a>
          </li>
          <li class="nav-item p-2 m-2">
            <a class="nav-link" href="index.php?prog=Countries.php">Countries</a>
          </li>
        </ul>

        <div>
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <?php
            if (isset($_SESSION['user_id'])) {
              echo '<li class="nav-item p-2 m-2" id="favourites">
        <a class="nav-link" href="index.php?prog=Favourites.php" style="color: white; text-shadow: 0 0 3px #FFA500; font-weight: bold;">Favourites</a>
      </li>
      <li class="nav-item p-2 m-2 row text-center" id="logout">
        <a class="nav-link" href="index.php?prog=SignOut.php" style="color: black; font-weight: bold;">Logout</a>
        <img src="../client/img/logout.png" alt="logouticon" class="align-self-center" style="height: 20px; width: auto;">
      </li>';
            } else {
              echo '<li class="nav-item p-2 m-2" id="logout">
        <a class="nav-link" href="index.php?prog=Login.php" style="color: white;">Login</a>
      </li>
      <li class="nav-item p-2 m-2" id="logout">
        <a class="nav-link" href="index.php?prog=SignUp.php" style="color: white;">SignUp</a>
      </li>';
            }
            ?>

          </ul>

        </div>
      </div>
    </nav>


    <div class="row p-3 justify-content-center">
      <?php
      if (isset($_GET['prog']))
        include $_GET['prog'];
      else
        include 'main.php';
      ?>
    </div>

    <footer class="text-center">
      <p>© Németh Sándor</p>
    </footer>

    <script src="bootstrap/jquery-3.5.1.min.js"></script>
    <script src="bootstrap/bootstrap.bundle.js"></script>
</body>

</html>