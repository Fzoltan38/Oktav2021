<?php
session_start();
include('classes.php');
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Projekt1</title>
</head>

<body>
<div class="jumbotron text-center kep"
style="margin-bottom:0;background-image: url(kep1.jpg);;background-size:cover;height: 200px;">
  <p class="betuszin">Méretezd át a böngésződ a rezponzív megjelenítéshez!</p> 
</div>

<?php
if (isset($_SESSION['felhasznalonev']))
{
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <a class="navbar-brand" href="#">Menü</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php?azonosito=fo">Főoldal</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="index.php?azonosito=news">Hírek</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="index.php?azonosito=order">Megrendelés</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" href="index.php?azonosito=contact">Kapcsolat</a>
      </li> 
      <li class="nav-item">
      <a class="nav-link" href="index.php?azonosito=admin">Admin</a>
      </li> 
      <li class="nav-item">
      <a class="nav-link" href="index.php?azonosito=exit">Kilépés</a>
      </li> 
    </ul>
  </div>  
</nav>
<?php 
}
?>

<?php
if (isset($_SESSION['felhasznalonev'])){
  include('userpage.php');
}
else {
  include('startpage.php');
}
?>

<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Footer</p>
</div>

</body>
</html>
