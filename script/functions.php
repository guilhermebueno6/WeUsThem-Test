<?php
function redirect_to($location){
        if($location != null){
            header('Location: '.$location);
            
        }
    }

    function confirm_logged_in(){
        if(!isset($_SESSION['user_id'])){
            redirect_to('index.html');
        }
    }
    function logout($id){
    
        
        session_destroy();
        redirect_to('index.html');
    
}

    ?>
