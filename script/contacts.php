<?php

function getAllContacts($id){
    $pdo = Database::getInstance()->getConnection();
    $get_contact_query = 'SELECT * FROM `tbl_contacts` WHERE user_id='.$id.'';
    $get_contact_set = $pdo->prepare($get_contact_query);
    $get_contact_result = $get_contact_set->execute();

    if($get_contact_result && $get_contact_set->rowCount()){
        return $get_contact_set;
    }else{
        
        return false;
    }
}

function getContactByFilter($id, $filter){
    
    $pdo = Database::getInstance()->getConnection();
    $getByFilter = 'SELECT * FROM `tbl_contacts` WHERE user_id='.$id.' ORDER BY '.$filter.'';
    $filter_exec = $pdo->prepare($getByFilter);
    $filter_result =$filter_exec->execute(
        array(
            ':id'=>$id,
            ':filter'=>$filter
        )
        );
        // var_dump($filter_result);
        // exit;
        if($filter_result){

            return $filter_exec;
            // print("HELLO");
            // exit;
        }
}

function getSingleContact($contact_id){
    $pdo = Database::getInstance()->getConnection();
    $get_contact_query = 'SELECT * FROM `tbl_contacts` WHERE contact_id=:contact_id';
    $get_contact_set = $pdo->prepare($get_contact_query);
    $get_contact_result = $get_contact_set->execute(
        array(
            ':contact_id'=>$contact_id
        )
    );

    if($get_contact_result && $get_contact_set->rowCount()){
        return $get_contact_set;
    }else{
        
        return false;
    }
}

function createContact($id, $first_name, $last_name, $email, $phone, $file_name){
    $pdo = Database::getInstance()->getConnection();

    $create_contact = 'INSERT INTO `tbl_contacts` (user_id, first_name, last_name, email, phone, profile_pic) VALUES (:id, :first_name, :last_name, :email, :phone, :file_name)';
    $executeCreate = $pdo->prepare($create_contact);
    $create_user_result = $executeCreate->execute(
        array(
            ':id'=> $id,
            ':first_name'=>$first_name,
            ':last_name'=> $last_name,
            ':email'=> $email,
            ':phone'=> $phone,
            ':file_name'=> $file_name
        )

        );

        if($create_user_result){
            redirect_to('./mycontacts.php');
        }

}
function deleteContact($contact_id){
    $pdo = Database::getInstance()->getConnection();
    
    $delete_stmt = 'DELETE from `tbl_contacts` WHERE contact_id = :id';
    $delete_query = $pdo->prepare($delete_stmt);
    $delete_query->execute(
        array(
            ':id'=>$contact_id
        )
        );
        redirect_to('./dashboard.php');
}

function editContact($contact_id, $first_name,$last_name,$email,$phone, $file_name){
    $pdo = Database::getInstance()->getConnection();

    $updateContact = 'UPDATE `tbl_contacts` SET  first_name=:first_name, last_name=:last_name, email=:email, phone=:phone, profile_pic=:file_name WHERE contact_id=:contact_id';
    $update_execute = $pdo->prepare($updateContact);
    $update_execute->execute(
        array(
            ':contact_id'=>$contact_id,
            ':first_name'=>$first_name,
            ':last_name'=>$last_name,
            ':email'=>$email,
            ':phone'=>$phone,
            ':file_name'=>$file_name

        )
        );
}

function searchContact($id, $search){
    $search = '%'.$search.'%';
    $pdo = Database::getInstance()->getConnection();

    $search_stmt = 'SELECT * FROM `tbl_contacts` WHERE first_name LIKE :fname OR last_name LIKE :lname OR email LIKE :email OR phone LIKE :phone AND user_id = :id ';
    $search_exec = $pdo->prepare($search_stmt);
    $result = $search_exec->execute(
        array(
            ':id'=>$id,
            ':fname'=>$search,
            ':lname'=>$search,
            ':email'=>$search,
            ':phone'=>$search
            
        )
        );
    if($result){
        return $search_exec;
    }
    
}

?>