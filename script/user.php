<?php

function createUser($username,$password){
    $pdo = Database::getInstance()->getConnection();

    $createUser = 'INSERT INTO `tbl_user` (user_name, user_pass) VALUES (:username, :password)';
    $create_exec = $pdo->prepare($createUser);
    $result = $create_exec->execute(
        array(
            ':username'=>$username,
            ':password'=>$password
        )
        );
    if($result){
        $message = 'User Created succesfully';
        
    }else{
        $message = 'There was a Problem creating the user, please try again';

    }
    return $message;
}

function checkExistingUsername($username,$password){
    $pdo = Database::getInstance()->getConnection();
    $user_exists = 'SELECT * FROM `tbl_user` WHERE user_name=:username';
    $exist_exec = $pdo->prepare($user_exists);
    $result = $exist_exec->execute(
        array(
            ':username'=>$username
        )
        );
        
        if(!$exist_exec->fetchColumn()>0){
            $message = createUser($username,$password);
        }else{
            $message='This username already exists';
            
        }
        return $message;
}

function changePass($id,$oldPass,$newPass){
    $pdo = Database::getInstance()->getConnection();
    $changePass = 'UPDATE `tbl_user` SET user_pass=:newPass WHERE user_id=:id AND user_pass=:oldPass';
    $change_exec = $pdo->prepare($changePass);
    $result = $change_exec->execute(
        array(
            ':newPass'=>$newPass,
            ':id'=>$id,
            ':oldPass'=>$oldPass
        )
        );
        if($result){
            return ('Password changed with success');

        }else{
            return('Something Went Wrong please try again');
        }
}
