<?php
require_once 'load.php';
confirm_logged_in();
// error_reporting(0);
$id = $_SESSION['user_id'];

$contactList = getAllContacts($id);

if(isset($_GET['search_name'])){
    $search = trim($_GET['search_name']);
    $contactList = searchContact($id, $search);
}

if(isset($_POST['filter'])){
    $filter = trim($_POST['filter']);
    $contactList = getContactByFilter($id, $filter);
}

if(isset($_GET['contact_id'])){
    $contact_id = $_GET['contact_id'];
    deleteContact($contact_id);
}

if(isset($_GET['editContact'])){
    $contact_id = $_GET['editContact'];
    redirect_to('editContact.php?contact_id='.$contact_id);
    
}

if(isset($_POST['submit'])){
    
    $file_name       = $_FILES['file']['name'];  
    $temp_name  = $_FILES['file']['tmp_name'];
    
    

        if(isset($file_name) and !empty($file_name)){
            $location = 'images/'; 
            
            if(move_uploaded_file($temp_name, $location.$file_name)){
                
                
            }
        }
   
    
    
        move_uploaded_file($temp_name, $location.$file_name);
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);

    if(empty($first_name) || empty($last_name) || empty($email) || empty($phone)){
        $message ='Please fill the required fields';
    }else{
       
        
        createContact($id, $first_name, $last_name, $email, $phone, $file_name);
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


    <?php require_once 'views/header.php' ;?><br><br>

    <form action="mycontacts.php" method="GET" id="search">
        
        <input type="text" name="search_name">
        <button>Search</button>
    </form>

    <form action="mycontacts.php" method="POST" id="filter">
        <label>Sort by:</label>
        <select name="filter" >
            <option value="first_name">First Name</option>
            <option value="last_name">Last Name</option>
            <option value="email">Email</option>
            <option value="phone">Phone</option>
        </select>
            <button>Filter</button>
    </form>

    <h4 id="addContact">Add Contact</h4>
    <form action="mycontacts.php" method="POST" enctype="multipart/form-data" id="newContact">
        <label>Contact Picture</label>
        <input required type="file" name="file" id="file">

        <label>First Name</label>
        <input required type="text" name="first_name">

        <label>Last Name</label>
        <input required type="text" name="last_name">

        <label>Email</label>
        <input required type="email" name="email">

        <label>Phone Number</label>
        <input required type="phone" name="phone">
        <button name="submit">Submit</button>
    </form>
 
    
        <div class="contactList">
        <?php while($row = $contactList->fetch(PDO::FETCH_ASSOC)):?><br><br>
            <div class="contact">
            <img src="images/<?php echo $row['profile_pic'];?>" alt="<?php echo $row['first_name'];?>'s profile picture">
            <h2><?php echo $row['last_name']; ?>, <?php echo $row['first_name']; ?></h2>
            <h3><?php echo $row['email']; ?></h3>
            <h3><?php echo $row['phone']; ?></h3>
            <a href="mycontacts.php?contact_id=<?php echo $row['contact_id'];?>">Delete Contact</a>
            <a href="mycontacts.php?editContact=<?php echo $row['contact_id'];?>">Edit Contact</a>
            </div>
            
            <?php endwhile;?>
            </div>


    
    
</body>
</html>