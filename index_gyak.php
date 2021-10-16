<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Otav</title>
</head>
<body>
    <!--ez itt megjgyzés-->
    <h1>Üdvözöllek!</h1>
    <form action="index.php" method="POST">
        <input type="number" name="number1"><br>
        <input type="text" name="text1"><br>
        <input type="submit" value="Elküld">
    </form>
</body>
</html>

<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
    $ho=(int)$_POST['number1'];
    $szoveg=$_POST['text1'];
    
    if(!empty($ho) || $ho==0)
    {
        echo var_dump($ho);

        if($ho<=0){
            echo("Szilárd $szoveg.");
            echo var_dump($ho);

        }
        else if($ho<100){
            echo("Folyékony $szoveg.");
            echo var_dump($ho);

        }
        else {
            echo("Légnemű $szoveg.");
            echo var_dump($ho);

        }
    }
    else {
        echo("Üres a mező!");
    }

   
    echo("<br>");
    //ciklusok 
    //számláló
    for ($i=0; $i <10 ; $i++) { 
        echo("Farkas Zoltán<br>");
    }
    echo("<br>");
    //előltesztelő
    /*while ($ho <= 0) {
       echo("Fagyás<br>");
    }*/
    //hátltesztelő
    
   
}



/*ez itt megjegyzés
$nev="Farkas Zoltán";
echo("<h2>Üdvözöllek: $nev legyen szép napot.</h2>");*/
?>