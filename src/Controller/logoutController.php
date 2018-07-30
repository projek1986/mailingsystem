<?php
if(!isset($_SESSION)){
    ob_start();
    session_start();
}

if (isset($_SESSION) && isset($_SESSION['admin'])) {
    $_SESSION = array();
    session_destroy();
 
    header("Location: /");
} else {
    header("Location: /");
}
?>