<?php
include_once '../Classes/sendClass.php';
if (isset($_POST)) {

    if (isset($_POST['sendmsgid']) && isset($_POST['sendgrup']) && !empty($_POST['aceptmsg'])) {


        $send = new send();

        $send->sendmsg($_POST['sendgrup'], $_POST['sendmsgid']);

        echo("<script>location.href = '/panel_page/sendmsg#openModal'</script>");


    }


}


