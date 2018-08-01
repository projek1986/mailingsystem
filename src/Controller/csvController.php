<?php

include_once '../Classes/DataOperation.php';
include_once '../Classes/CsvClass.php';

if (isset($_POST)) {

    if (isset($_POST['grupa']) && !empty($_FILES)) {


        $objdb = new DataOperation;

        $sub_inputs = array(
            'data_create' => date("Y-m-d"),
            'nazwa' => $_POST['grupa'],
            'status' => 1
        );

        $objdb->insert_record('sub_grup', $sub_inputs);


        $grupa_id = $objdb->select_records_where('max(id) as max', 'sub_grup', 'true');


        $max_grup = $grupa_id[0]['max'];


        $csv = new csv();

        $result = $csv->csv_import($_FILES['filecsv']);


        if (is_array($result)) {

          $fields = $result['correct_emails'];


            foreach ($fields as $key => $value) {

                $temp_inputs = array(
                    'sub_grup' => $max_grup,
                    'data_create' => date("Y-m-d"),
                    'email' => $value,
                    'status' => 1

                );

                if (!$objdb->insert_record('subscribers', $temp_inputs)) {
                    $flag .= 1;
                }
            }

        } else {
            return $fields;
        }


    }

}