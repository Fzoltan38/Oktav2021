<?php
//hátultesztelő ciklus
$num=0;
do {
    echo("Kérek egy számot: ");
    echo("<form action=szamol.php method=POST>");
    echo("<input type='number' name=number2>");
    echo("<input type='submit' name=button2>");
    echo("</form>");
    $num++;
 } while ($_POST['number2'] != 0 && $num!=10);
?>