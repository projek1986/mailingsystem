<?php
if (!isset($_SESSION)) {
    ob_start();
    session_start();
}
include_once '../Classes/DataOperation.php';
$objdb = new DataOperation;


if (isset($_POST)) {


    if (isset($_POST['title_projekt']) && !empty($_POST['title_projekt']) && isset($_FILES) && !empty($_FILES)) {


        $sub_inputs = array(
            'create_date' => date("Y-m-d H:i"),
            'title_projekt' => $_POST['title_projekt'],
            'title_msg' => $_POST['title_msg'],
            'content_msg' => $_POST['content_msg'],
            'file_content' => $_FILES['file_content']['name'][0],
            'status' => 1
        );

        $objdb->insert_record('msg', $sub_inputs);


    }


    if (isset($_FILES) && !empty($_FILES)) {


        $folder_ID = $objdb->select_records_where('max(id) as max', 'msg', 'true');

        $folder = $folder_ID[0]['max'];

        if (!is_dir("../../assets/file/$folder")) {
            mkdir("../../assets/file/$folder", 0777);
        }

        if (!is_dir("../../assets/images/$folder")) {
            mkdir("../../assets/images/$folder", 0777);
        }

        if (!is_dir("../../assets/contentfile/$folder")) {
            mkdir("../../assets/contentfile/$folder", 0777);
        }


        if (isset($_FILES['files'])) {

            for ($i = 0; $i < count($_FILES['files']['size']); $i++) {

                $heder_img = $_FILES['files']['name'][$i];


                $file = '../../assets/file/' . $folder . '/' . $heder_img . '';

                move_uploaded_file($_FILES['files']['tmp_name'][$i], $file);

                $sub_inputs_msgfile = array(
                    'msg_id' => $folder,
                    'namefile' => $heder_img,
                    'status' => 1
                );

                $objdb->insert_record('msgfile', $sub_inputs_msgfile);


            }

        }


        if (isset($_FILES['images'])) {

            for ($i = 0; $i < count($_FILES['images']['size']); $i++) {

                $heder_img = $_FILES['images']['name'][$i];


                $file = '../../assets/images/' . $folder . '/' . $heder_img . '';

                move_uploaded_file($_FILES['images']['tmp_name'][$i], $file);


                $sub_inputs_msgfile = array(
                    'msg_id' => $folder,
                    'namefile' => $heder_img,
                    'status' => 1
                );

                $objdb->insert_record('msgimages', $sub_inputs_msgfile);

            }
        }


        if (isset($_FILES['file_content'])) {

            for ($i = 0; $i < count($_FILES['file_content']['size']); $i++) {

                $heder_img = $_FILES['file_content']['name'][$i];

                $file = '../../assets/contentfile/' . $folder . '/' . $heder_img . '';

                move_uploaded_file($_FILES['file_content']['tmp_name'][$i], $file);


            }
        }


          echo("<script>location.href = '/panel_page/msgfile#openModal'</script>");
    }

}


