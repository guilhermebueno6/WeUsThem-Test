<?php
require_once 'load.php';
confirm_logged_in();
$id = $_SESSION['user_id'];
if(isset($_POST['submit'])){
    $oldPass = trim($_POST['oldPass']);
    $newPass = trim($_POST['newPass']);
    $message = changePass($id,$oldPass,$newPass);
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
    <?php require_once 'views/header.php' ;?>
   
<form action="editAcc.php" method="POST">
            <label>Change Password</label><br><br>
            <label>Current Password</label>
            <input type="password" name="oldPass">
            <label>New Password</label>
            <input type="password" name="newPass">
            <button name="submit">Change Password</button>

            </form>
            <p><?php echo !empty($message)?$message:''; ?></p>
            

            
    
    
    
</body>
</html>