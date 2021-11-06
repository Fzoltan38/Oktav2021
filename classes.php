<?php
//Ős osztály
class Forms{
    protected $userName;
    protected $userPass;
    protected $userNameErr;
    protected $userPassErr;

    //Ők Getter-ek rajtuk keresztül kapom vissza a változók érétkét!
    public function GetuserName(){
        return $this->userName;
    }

    public function GetuserNameErr(){
        return $this->userNameErr;
    }

    public function GetuserPass(){
        return $this->userPass;
    }

    public function GetuserPassErr(){
        return $this->userPassErr;
    }
}

class LogCheck extends Forms{
    
    //Az adattagok értékkel való ellátása a konstruktor feldata
    function __construct(){
        $this->userName=$_POST['uname']; 
        $this->userPass=$_POST['upass'];
        $this->userNameErr="";
        $this->userPassErr="";
    }

    /*function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }*/

    function errorLog(){
        if(empty($this->userName)){
            $this->userNameErr="A felhasználó mező üres!";   
        }
        else if(!preg_match("/^[a-zA-Z-' ]*$/",$this->userName)){
            $this->userNameErr="Nem megfelelő formátumot adtál meg!";   
        }
        else {
            $this->userNameErr="";
        }

        $passNumber=8;
        $passLength=$passNumber-strlen($this->userPass);
        
        if($passLength<0){
            $passLength=0;
        }
   
        if(empty($this->userPass)){
            $this->userPassErr="A jelszó mező nem lehet üres!";
        }
        else if($passLength!=0){
            $this->userPassErr="Rövid jelszó még ".$passLength." karakter hiányzik!";
        }   
        else if(!preg_match("/^(?=.*[0-9])(?=.*[A-Z]).{8,20}$/",$this->userPass)){
            $this->userPassErr="Nem megfelelő formátumot adtál meg!";  
        }
        else {
            $this->userPassErr="";
        }
    }
}
?>
