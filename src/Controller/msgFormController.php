<?php
if(!isset($_SESSION)){
    ob_start();
    session_start();
}

if(isset($_POST)){




    echo("<script>location.href = '/panel_page/msg#openModal'</script>");
}