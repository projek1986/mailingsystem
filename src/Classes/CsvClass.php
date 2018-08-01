<?php

class csv {

    public function csv_import($file){



        if($file["size"] > 0){

            $ext_file = explode(".",$file["name"]);

            if(strtolower(end($ext_file)) == "csv"){

                $incorrect_emails = array();
                $duplicate_emails = array();

                $filename = $file['tmp_name'];

                $file = fopen($filename, "r");

                $fields = array();

                while (!feof($file)) {
                    $fields[] = fgetcsv($file, null, ';');
                }
                $regex = "/^([a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ0-9])+([a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ0-9\._-])*@([a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ0-9_-])+([a-ząćęłńóśźżA-ZĄĆĘŁŃÓŚŹŻ0-9\._-]+)+$/";

                $newFields = array();

                for($i = 1; $i < count($fields); $i++){

                    if (is_array($fields[$i]) || is_object($fields[$i])){

                        foreach ($fields[0] as $key => $header){

                            foreach ($fields[$i] as $k =>$v){

                                $temp_field = iconv('Windows-1250', 'UTF-8', $fields[$i][$key]);


                                if(in_array($temp_field, $newFields)){
                                    $duplicate_emails[] = '<b>zdublowany e-mail:</b> '.$temp_field. ' (wiersz nr: <b>'.($i+1).'</b>)<br />';
                                    continue;
                                }
                                $newFields[] = $temp_field;

                            }
                        }
                    }
                }

                fclose($file);

                return array(
                    'number_of_emails' => count($fields),
                    'incorrect_emails' => $incorrect_emails,
                    'duplicate_emails' => $duplicate_emails,
                    'correct_emails' => $newFields
                );

            }else{
                return 'noCSV';
            }

        }else{
            return 'noFile';
        }




    }


    public function export_db($filename, $headers, $fields, $table_to_export){


        $output = fopen('php://output', 'w');
        header("Content-type: text/csv; charset=windows-1250");
        header("Content-Disposition: attachment; filename=$filename.csv");


        foreach ($headers as $k => $v) {
            $headers[$k] = $this -> convert_locale_for_xls($headers[$k]);
        }


        fputcsv($output, $headers, ";");

        foreach ($table_to_export as $record) {

            $recordNew = array();

            foreach ($fields as $field) {

                $recordNew[] = ($record[$field] === null || $record[$field] == "null") ? "" : $this -> convert_locale_for_xls(html_entity_decode($record[$field],ENT_QUOTES,"UTF-8"));
            }

            fputcsv($output, $recordNew, ";");
        }


        fclose($output);
        exit;
    }

    public function convert_locale_for_xls($text) {

        $return = iconv('UTF-8', 'cp1250', $text);
        return preg_replace("/([\xC2\xC4])([\x80-\xBF])/e", "chr(ord('\\1')<<6&0xC0|ord('\\2')&0x3F)",
            $return);
    }


}