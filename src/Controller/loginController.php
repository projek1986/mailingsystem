<?php
if(!isset($_SESSION)){
    ob_start();
    session_start();
}
include('src/Classes/Admin.php');

if (isset($_SESSION) && isset($_SESSION['admin'])) {
    header("Location: /");
} else {
    $loginErrors = array();

    if ($_POST) {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            
            $login = $_POST['login'];
        
            if (empty($loginErrors)) {
                $admin = new Admin();
                if (!$admin->admin_login($login, $_POST['password'])) {
                    $loginErrors['message'] = "Login lub hasło są niepoprawne";
                }
            }
        } else {
            $loginErrors['message'] = "Wypełnij wszystkie pola";
        }
    }
    include 'src/Template/login.php';
}
?>