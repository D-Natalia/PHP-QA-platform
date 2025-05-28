<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>


<form action="../Backend/login_register.inc.php" method="post">
<h3>Register form</h3>
   <input type="text" name="username" placeholder="Username" required><br>
   <input type="password" name="pwd" placeholder="Password" required><br>
   <input type="password" name="pwd_repeat" placeholder="Repeat Password" required><br>
   <button type="submit">Register</button>
   <input type="hidden" name="action" value="register">
   <p><a href="login.php">Back to sign in</a></p>

</form>
</body>
</html>
