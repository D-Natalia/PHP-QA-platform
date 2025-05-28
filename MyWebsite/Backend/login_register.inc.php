<?php
//echo "Am ajuns în formhandler!";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: application/json');
if($_SERVER["REQUEST_METHOD"]=="POST"){
    session_start();
 
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    //$pwd_repeat=$_POST["pwd_repeat"];

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        header("Location: ../Frontend/login.php");
                exit();
    }

    require_once "../DBconfig/DBconfig.inc.php";

    if ($action == "register") {
        $pwd_repeat=$_POST["pwd_repeat"];

    if (empty($username) || empty($pwd)||empty($pwd_repeat)) {
        header("Location: ../Frontend/register.php?error=empty_field");
        exit();
    }
    if (strlen($pwd) < 4) {
        header("Location: ../Frontend/register.php?error=password_too_short");
        exit();
    }
    if ($pwd !== $pwd_repeat) {
        header("Location: ../Frontend/register.php?signup=password_different");
        exit();
    }
   try {
    require_once "../DBconfig/DBconfig.inc.php";

    $query = "SELECT username FROM users WHERE username = ?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$username]);

    if($stmt->rowCount()>0){
        header("Location: ../Frontend/login.php?register=user_exists");
            exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $query="INSERT INTO users (username,pwd)VALUES(?,?);";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$username,$hashedPwd]);
    header("Location: ../Frontend/login.php?register=success");
    $pdo=null;
    $stmt=null;
    exit();
   }catch(PDOException $e){
       die("Query failed: ". $e->getMessage());
   }

}else if($action=="login"){

    if (empty($username) || empty($pwd)) {
        header("Location: ../Frontend/login.php?error=empty_field");
        exit();
       
    }
    
    $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        if($stmt->rowCount()==0){
            header("Location: ../Frontend/login.php?signin=user_doesnt_exist");
            exit();
        }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!password_verify($pwd, $user['pwd'])) {
        header("Location: ../Frontend/login.php?signin=incorect_password");
        exit();
    }
    header("Location: ../Frontend/index.php?signin=success");
    exit();

    
}
}else{
    header("Location: ../Frontend/login.php");
    exit();
}
 