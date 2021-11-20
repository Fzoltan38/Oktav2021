<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  $log=new LogCheck();
  $log->errorLog();
  $log->userLog();
}
?>

<form action="index.php" method="POST">
  <div class="form-group">
    <label>Felhasználónév:</label>
    <input type="text" name="uname" value="<?php if(isset($_POST['uname'])) echo $log->GetuserName();?>" class="form-control" placeholder="Írd be a felhasználó nevedet">
    <label type="text" style="color:red;">
    
    <?php 
    if(isset($_POST['uname']))
    echo $log->GetuserNameErr();
    ?>

  </label>
  </div>
  <div class="form-group">
    <label>Jelszó:</label>
    <input type="password" name="upass" class="form-control" placeholder="Írd be a jelszavad">
    <label type="text" style="color:red;">
    
    <?php 
    if(isset($_POST['upass']))
    echo $log->GetuserPassErr();
    ?>

  </label>
  </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" name="ucheck1" type="checkbox"> Emlékezz rám
    </label>
  </div>
  <div class="form-group form-check">
      <a href="index.php?azonosito=reglap">Regisztrálok</a>
  </div>
  <button type="submit" name="submit1" class="btn btn-primary">Elküld</button>
</form>