<?php
require_once './load.php';

confirm_logged_in();

$id = $_SESSION['user_id'];
// echo $id;
// exit;
logout($id);