<?php
echo "<h2>Kapcsolat</h2>";
echo "<h6>farkaszoltan28@gmail.com</h6>";
if(isset($_SESSION['felhasznalonev'])){
    echo "Üdvözöllek ".$_SESSION['felhasznalonev'];
}
?>