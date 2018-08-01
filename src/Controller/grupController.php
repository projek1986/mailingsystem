<?php

include_once '../Classes/DataOperation.php';
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





