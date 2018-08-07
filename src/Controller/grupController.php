<?php

include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'src/Classes/DataOperation.php';


$objdb = new DataOperation;

if (isset($_POST)) {

    if (isset($_POST['grupa']) && !empty($_POST['grupa'])) {


        $sub_inputs = array(
            'data_create' => date("Y-m-d"),
            'nazwa' => $_POST['grupa'],
            'status' => 1
        );

        $objdb->insert_record('sub_grup', $sub_inputs);

        echo("<script>location.href = '/panel_page/grupanew#openModal'</script>");

    }


}


$action = $match['name'];

if ($action == "subdelete" && isset($match['params']['id'])) {


    $message_id = $match['params']['id'];
    $where = array("id" => $message_id);
    $where_grupid = array("sub_grup" => $message_id);


    if (($objdb->delete_record('sub_grup', $where)) && ($objdb->delete_record('subscribers', $where_grupid))) {
        header("location: /panel_page/grupanew?msg=Rekord usunięty#openModal2");
    } else {
        header("location: /panel_page/grupanew?msg=Nie udało się usunąć, spróbuj ponownie");
    }


}



