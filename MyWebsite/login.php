<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

   <form action="includes/formhandler.inc.php" method="post">
   <h3>Sing in</h3> 
   <input type="text" name="username" placeholder="Username"><br>
   <input type="password" name="pwd" placeholder="Password"><br>
   <button type="submit">Sing in</button><br>
   <p>New account?<a href="register.php">Register here</a></p>
   <input type="hidden" name="action" value="login">

</form>

</body>
</html>