<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

   <form action="../Backend/login_register.inc.php" method="post">
   <h3>Sing in</h3> 
   <input type="text" name="username" placeholder="Username"><br>
   <input type="password" name="pwd" placeholder="Password"><br>
   <button type="submit">Sing in</button><br>
   <p>New account?<a href="register.php">Register here</a></p>
   <?php
    if (isset($_GET['error']) && $_GET['error'] === 'empty_field') {
    echo "<p style='color:red;'>Complete all the fields!</p>";
    }
   
    if (isset($_GET['error']) && $_GET['error'] === 'user_doesnt_exist') {
    echo "<p style='color:red;'>User does not exist!</p>";
    }
    if (isset($_GET['error']) && $_GET['error'] === 'incorect_password') {
        echo "<p style='color:red;'>Incorect password!</p>";
    }
    if (isset($_GET['signin']) && $_GET['signin'] === 'success') {
        echo "<p style='color:red;'>Successfully connected</p>";
    }

    ?>
   <input type="hidden" name="action" value="login">

</form>


</body>
</html>