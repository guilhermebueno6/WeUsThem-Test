<?php
require_once 'load.php';

if(isset($_POST['submit'])){
$pw1 = trim($_POST['password1']);
$pw2 = trim($_POST['password2']);
$username = trim($_POST['username']);

if($pw1 === $pw2){
   $message = checkExistingUsername($username,$pw1);
        
    }else{
        $message ='Please make sure you passwords match';
    }
}





?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Contact App</title>
</head>
<body>
<form method="POST" action="signup.php">
        <label for="username">Username</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password</label>
        <input type="password" name="password1" required>
        <label>Confirm Password</label>
        <input type="password" name="password2" required>
        <p><?php echo !empty($message)?$message:''; ?></p>

        <button type="submit" name="submit">Submit</button>

    </form>
    <a href="index.html">Log In</a>

</body>
</html>