<?php
require_once '../load.php';

$ip = $_SERVER['REMOTE_ADDR'];
$username = trim($_POST['username']);
$password = trim($_POST['password']);

function login($ip, $username, $password){
    $pdo = Database::getInstance()->getConnection();

    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_user` WHERE user_name =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
        );

        if($user_set->fetchColumn()>0){
            $check_match_query = 'SELECT * from `tbl_user` WHERE user_name =:username';
        $check_match_query .=' AND user_pass=:password';
        $user_match = $pdo->prepare($check_match_query);
        $user_match->execute(
            array(
                ':username'=>$username,
                ':password'=>$password
            )
            );


        while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
            $id = $founduser['user_id'];

            $_SESSION['user_id'] = $id;
            
            $update = 'UPDATE tbl_user SET user_ip =:ip WHERE user_id =:id';
            
            $user_update = $pdo->prepare($update);
            $user_update->execute(
                array(
                    ':ip'=>$ip,
                    ':id'=>$id
                )
                );
            }
            redirect_to('../mycontacts.php');
    }else{
        redirect_to('../index.html');
        
        
    }
}

login($ip, $username, $password);





?>