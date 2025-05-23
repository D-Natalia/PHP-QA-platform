<?php
//echo "Am ajuns în formhandler!";
if($_SERVER["REQUEST_METHOD"]=="POST"){
 
    $username=$_POST["username"];
    $pwd=$_POST["pwd"];
    $pwd_repeat=$_POST["pwd_repeat"];

    if (isset($_POST['action'])) {
        $action = $_POST['action'];
    } else {
        header("Location: ../index.php");
        exit();
    }

    require_once "DBconfig.inc.php";

    if ($action == "register") {

    if (empty($username) || empty($pwd)||empty($pwd_repeat)) {
        header("Location: ../register.php?error=empty_field");
        exit();
    }
    if (strlen($pwd) < 4) {
        header("Location: ../register.php?error=password_too_short");
        exit();
    }
    if ($pwd !== $pwd_repeat) {
        header("Location: ../register.php?signup=password_different");
        exit();
    }
   try {
    require_once "DBconfig.inc.php";

    $query = "SELECT username FROM users WHERE username = ?";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$username]);

    if($stmt->rowCount()>0){
        header("Location: ../login.php?register=user_exists");
            exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $query="INSERT INTO users (username,pwd)VALUES(?,?);";
    $stmt=$pdo->prepare($query);
    $stmt->execute([$username,$hashedPwd]);
    header("Location: ../login.php?register=success");
    $pdo=null;
    $stmt=null;
    exit();
   }catch(PDOException $e){
       die("Query failed: ". $e->getMessage());
   }
}else if($action=="login"){
    if (empty($username) || empty($pwd)) {
        header("Location: ../login.php?error=empty_field");
        exit();
    }
    $query = "SELECT * FROM users WHERE username = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$username]);
        if($stmt->rowCount()==0){
            header("Location: ../login.php?signin=user_doesnt_exist");
                exit();
        }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!password_verify($pwd, $user['pwd'])) {
        header("Location: ../login.php?signin=incorect_password");
        exit();
    }
    header("Location: ../index.php?signin=success");
    exit();

    
}
}else{
    header("Location: ../login.php");
    exit();
}
 