<?php
include_once '../Classes/sendClass.php';
if (isset($_POST)){


    $send = new send();

    $send->sendmsg();

}