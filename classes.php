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

class Connect{
    private $server;
    private $db;
    private $uid;
    private $password;
    private $conn;

    public function getConn(){
        return $this->conn;
    }

    function __construct(){
        $this->server="localhost";
        $this->db="oktav";
        $this->uid="root";
        $this->password="";

        $this->conn=mysqli_connect($this->server,$this->uid, $this->password,$this->db);

        if ($this->conn->connect_error) {
            die("Hiba a catlakozás során!: " . $this->conn->connect_error);
        }
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

    function userLog(){
        if($this->userNameErr=="" && $this->userPassErr==""){
            
            $sql="SELECT * FROM `users` WHERE `uname`='".$this->userName."' AND `upass`='".md5($this->userPass)."'";

            $c=new Connect();
            $result=mysqli_query($c->getConn(),$sql);

            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_assoc($result);
                $_SESSION['szint']=$row['rank'];
                $_SESSION['felhasznalonev']=$row['uname'];
                header('location:index.php');
            }
            else {
                echo("Nincs találat!");
            }
        }
    }
}

class Reg extends Forms{

    private $userEmail;
    private $userFullName;

    public function GetuserEmail(){
        return $this->userEmail;
    }

    public function GetuserFullName(){
        return $this->userFullName;
    }

    function __construct(){

        $this->userName=$_POST['uname']; 
        $this->userPass=$_POST['upass1'];
        $this->userPass2=$_POST['upass2'];
        $this->userEmail=$_POST['uemail'];
        $this->userFullName=$_POST['ufullname'];

        
        $sql="INSERT INTO `users`(`uname`, `upass`, `umail`, `ufullname`, `rank`, `ban`, `regtime`, `logtime`) VALUES ('".$this->GetuserName()."','".md5($this->GetuserPass())."','".$this->GetuserEmail()."','".$this->GetuserFullName()."',0,0,'".date('Y-m-d-H-i')."','0')";

        $c=new Connect();
        mysqli_query($c->getConn(), $sql);
    }
}

class Queries{
    
    private $result;

    public function getResult(){
        return $this->result;
    }

    public function selectrecord($id){
        $sql="SELECT * FROM users WHERE id=$id";
        $c=new Connect(); 
        $this->result=mysqli_query($c->Getconn(), $sql);
    }

    public function deleterecord($id){
        $sql="DELETE FROM `users` WHERE id=$id";
        $c=new Connect(); 
        mysqli_query($c->Getconn(), $sql);
    }

    public function updaterecord($id){
        $this->selectrecord($id);
        $row=mysqli_fetch_assoc($this->result);
        
        if($row['rank']<3)
            $actualrank=$row['rank']+1;
        else {
            $actualrank=0;
        }

        $sql="UPDATE `users` SET `rank`=$actualrank WHERE id=$id";

        $c=new Connect(); 
        mysqli_query($c->Getconn(), $sql);
    }
}
?>
