<?php
include('classes.php');
if($_SERVER['REQUEST_METHOD']=='POST'){
  $r=new Reg();
}
?>

<form action="index.php?azonosito=reglap" method="POST">
  <div class="form-group">
    <label>Felhasználónév:</label>
    <input type="text" name="uname" required class="form-control" placeholder="Írd be a felhasználó nevedet">
  </div>



  <div class="form-group">
    <label>Jelszó1:</label>
    <input type="password" name="upass1" required class="form-control" placeholder="Írd be a jelszavad">
  </div>

  <div class="form-group">
    <label>Jelszó2:</label>
    <input type="password" name="upass2" required class="form-control" placeholder="Írd be a jelszavad mégegyszer">
  </div>

  <div class="form-group">
    <label>Email:</label>
    <input type="email" name="uemail" required class="form-control" placeholder="Add meg az email címed">
  </div>

  <div class="form-group">
    <label>Teljes név:</label>
    <input type="text" name="ufullname" required class="form-control" placeholder="Add meg a teljes neved">
  </div>

  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" name="ucheck1" type="checkbox"> Emlékezz rám
    </label>
  </div>
  <button type="submit" name="submit1" class="btn btn-primary">Elküld</button>
</form>