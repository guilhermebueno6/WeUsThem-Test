<?php 
require_once 'load.php';
confirm_logged_in();

if(isset($_GET['contact_id'])){
    $contact_id = trim($_GET['contact_id']);

    $singleContact = getSingleContact($contact_id);
}
if(isset($_POST['submit'])){
    
    $file_name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];
    
    

        if(isset($file_name) and !empty($file_name)){
            $location = 'images/'; 
            
            if(move_uploaded_file($temp_name, $location.$file_name)){
                
                
            }
        }

        $first_name = trim($_POST['first_name']);
        $last_name = trim($_POST['last_name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $contact_id = trim($_POST['contact_id']);
       if($file_name ===''){
           $file_name = trim($_POST['currentPic']);
       }
       


    editContact($contact_id, $first_name,$last_name,$email,$phone,$file_name);
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


    <?php require_once 'views/header.php' ;?><br><br>
    <?php if(isset($_GET['contact_id'])): ?>
    <?php while($row = $singleContact->fetch(PDO::FETCH_ASSOC)):?>
        <form action="editContact.php" method="POST" enctype="multipart/form-data">
        <label>Contact Picture</label>
        <img src="images/<?php echo $row['profile_pic'] ;?>" alt="">
        <input  type="file" name="file" id="file">

        <label>First Name</label>
        <input required type="text" value="<?php echo $row['first_name'] ;?>" name="first_name">

        <label>Last Name</label>
        <input required type="text" value="<?php echo $row['last_name'] ;?>" name="last_name">

        <label>Email</label>
        <input required type="email" value="<?php echo $row['email'] ;?>" name="email">

        <label>Phone Number</label>
        <input required type="phone" value="<?php echo $row['phone'] ;?>" name="phone">

        <input type="hidden" name="currentPic" value="<?php echo $row['profile_pic'];?>  ">
        <input type="hidden" name="contact_id" value="<?php echo $row['contact_id'];?>  ">

        <button name="submit">Submit</button>

        </form>

        <?php endwhile;?>

    <?php endif;?>



</body>
</html>