<?php
include_once __DIR__ . '/DataOperation.php';
include_once __DIR__ . '/../../settings/mailTemplate/Templates.php';
include_once __DIR__ . '/../../settings/Settings.php';
include_once __DIR__ . '/../../web/vendors/mailerPHP/Mailer.class.php';

class send extends DataOperation
{

    public function create_mail_content($id_msg)
    {

        $msg_record = $this->select_record('msg', array("id" => $id_msg));

        $subject = $msg_record['title_msg'];

        if (empty($msg_record['file_content'])) {

            $content = Templates::htmlTemplate($msg_record['content_msg']);
        } else {

            $content = file_get_contents('../../assets/contentfile/' . $id_msg . '/' . $msg_record['file_content']);

        }


        $images = $this->select_records('msgimages', array("msg_id" => $id_msg));

        $atachments = $this->select_records('msgfile', array("msg_id" => $id_msg));


        if (isset($images) && !empty($images)) {

            $images_file = array();

            foreach ($images as $img) {

                $images_file [] = $img['namefile'];


            }
        }

        if (isset($atachments) && !empty($atachments)) {

            $atachmentfile = array();

            foreach ($atachments as $file) {

                $atachmentfile [] = $file['namefile'];

            }

        }

        return array(
            'id_msg' => $id_msg,
            'subject' => isset($subject) ? $subject : 'brak tematu',
            'content' => isset($content) ? $content : 'brak treści',
            'images' => isset($images_file) ? $images_file : '',
            'attachments' => isset($atachmentfile) ? $atachmentfile : '',
        );


    }


    public function sendmsg($send_grup_id, $id_msg)
    {


        $settings_obj = new Settings;

        $email_content = $this->create_mail_content($id_msg);

        if ($send_grup_id != 0) {

            $recipients = $this->select_distinct_records('subscribers', array("sub_grup" => $send_grup_id), 'email');


            if (isset($recipients) && !empty($recipients)) {


                foreach ($recipients as $recept) {

                    $dane = array(
                        'email' => $recept['email'],
                        'data_create' => date('Y-m-d H:i'),
                        'status' => 1,
                        'send' => 0,
                        'group_id' => isset($send_grup_id) ? $send_grup_id : '',
                        'msg_id' => isset($id_msg) ? $id_msg : '',
                        'cron' => 1,

                    );


                    $this->insert_record('sub_send_info', $dane);

                }


            } else {

                $this->runPHPMailer($settings_obj->from_email_settings, $settings_obj, $email_content);
            }


        } else {

            $this->runPHPMailer($settings_obj->from_email_settings, $settings_obj, $email_content);
        }


    }


    public function runPHPMailer($recipient = "rojek.przemek@gmail.com", $settings_obj, $email_content)
    {


        try {
            $mailer = new Mailer($settings_obj->email_settings);
            $mailer->SetFrom($settings_obj->from_email_settings);
            $mailer->Subject = $email_content['subject'];
            $mailer->Body = $email_content['content'];
            $mailer->AddAddress(trim($recipient));
            $mailer->ClearReplyTos();
            if (!empty($reply_to)) {
                $mailer->AddReplyTo($reply_to);
            }


            if (isset($email_content['images']) && !empty($email_content['images'])) {

                foreach ($email_content['images'] as $image) {

                    $mailer->AddEmbeddedImage('../../assets/images/' . $email_content['id_msg'] . '/' . $image, $image);

                }


            }


            if (isset($email_content['attachments']) && !empty($email_content['attachments'])) {

                foreach ($email_content['attachments'] as $attachments) {

                    $mailer->AddAttachment('../../assets/file/' . $email_content['id_msg'] . '/' . $attachments);

                }


            }

            $mailer->Send($mailer);
            $send = 1;
            $send_at = date('Y-m-d G:i:s');

        } catch (phpmailerException $e) {
            $error = $e->errorMessage();
        }


        return array(
            'data_wys' => isset($send_at) ? $send_at : '0000-00-00 00:00:00',
            'error' => isset($error) ? $error : '',
            'send' => isset($send) ? $send : 1,

        );
    }


    public function sendcronmsg()
    {

        $settings_obj = new Settings;

        $wys_mailer = $this->select_records_limit('sub_send_info', array('send' => 0), 100);

        //  echo '<pre>';

        $i = 0;

        if (isset($wys_mailer) && !empty($wys_mailer)) {

            foreach ($wys_mailer as $mail) {

                $delivery_info = $this->runPHPMailer($mail['email'], $settings_obj, $this->create_mail_content($mail['msg_id']));

                $this->update_record('sub_send_info', array('id' => $mail['id']), $delivery_info);


                $i++;


            }


            if ($i == count($wys_mailer)) {

                $this->runPHPMailer($settings_obj->from_email_settings, $settings_obj, $this->sendReports($wys_mailer[$i]['msg_id'] , 1) );

            }

        }

    }


    public function createStatictics($reports_id , $cron)
    {

        $number_of_recipients_result = $this->my_query('SELECT COUNT(id) FROM sub_send_info WHERE msg_id = ' . $reports_id .' AND CRON = '.$cron);
        $delivered_status_result = $this->my_query('SELECT COUNT(id) FROM sub_send_info WHERE msg_id  = ' . $reports_id . ' AND status = 1 AND send = 1 AND CRON = '.$cron);
        $number_of_attempts_result = $this->my_query('SELECT COUNT(id) FROM sub_send_info WHERE msg_id = ' . $reports_id . ' AND status = 1 AND CRON = '.$cron);
        $number_of_errors_result = $this->my_query('SELECT COUNT(id) FROM sub_send_info WHERE msg_id =' . $reports_id . ' AND error  != "" AND CRON = '.$cron);


        $number_of_recipients = !empty($number_of_recipients_result) ? mysqli_fetch_assoc($number_of_recipients_result) : '';
        $delivered_status = !empty($delivered_status_result) ? mysqli_fetch_assoc($delivered_status_result) : '';
        $number_of_attempts = !empty($number_of_attempts_result) ? mysqli_fetch_assoc($number_of_attempts_result) : '';
        $number_of_errors = !empty($number_of_errors_result) ? mysqli_fetch_assoc($number_of_errors_result) : '';


        $data_in= array(
            'msg_id'=>$reports_id,
            'number_of_recipients' => isset($number_of_recipients['COUNT(id)']) ? $number_of_recipients['COUNT(id)'] : 0,
            'delivered_messages' => isset($delivered_status['COUNT(id)']) ? $delivered_status['COUNT(id)'] : 0,
            'number_of_attempts' => isset($number_of_attempts ['COUNT(id)']) ? $number_of_attempts ['COUNT(id)'] : 0,
            'number_of_errors' => isset($number_of_errors['COUNT(id)']) ? $number_of_errors['COUNT(id)'] : 0,
            'start_at' => date('Y-m-d H:i'),

        );

        $this->insert_record('reports' ,$data_in );


        return array(
            'number_of_recipients' => isset($number_of_recipients['COUNT(id)']) ? $number_of_recipients['COUNT(id)'] : 'Brak informacji',
            'delivered_messages' => isset($delivered_status['COUNT(id)']) ? $delivered_status['COUNT(id)'] : 'Brak informacji',
            'number_of_attempts' => isset($number_of_attempts ['COUNT(id)']) ? $number_of_attempts ['COUNT(id)'] : 'Brak informacji',
            'number_of_errors' => isset($number_of_errors['COUNT(id)']) ? $number_of_errors['COUNT(id)'] : 'Brak informacji'
        );



    }

    public function sendReports($reports_id , $cron)
    {

        $statistics = $this->createStatictics($reports_id , $cron);

        $subject = 'Raport z wysłania wiadomości: ';

        $content = '<h3>Raport z wysłania wiadomości: </h3>'
            . '<p>Liczba odbioców: ' . $statistics['number_of_recipients'] . '</p>'
            . '<p>Podjęto próbę do: ' . $statistics['number_of_attempts'] . '</p>'
            . '<p>Wysłano do: ' . $statistics['delivered_messages'] . '</p>'
            . '<p>Błędów: ' . $statistics['number_of_errors'] . '</p>'
            . '<p>Pozdrawiamy,<br /> </p>';

        return array(
            'subject' => isset($subject) ? $subject : 'brak tematu',
            'content' => isset($content) ? $content : 'brak treści',
            'images' => isset($images) ? $images : '',
            'attachments' => isset($attachments) ? $attachments : '',

        );

    }


    public function sendmsgnow($send_grup_id, $id_msg)
    {


        $settings_obj = new Settings;

        $email_content = $this->create_mail_content($id_msg);

        if ($send_grup_id != 0) {

            $recipients = $this->select_distinct_records('subscribers', array("sub_grup" => $send_grup_id), 'email');


            if (isset($recipients) && !empty($recipients)) {

                $i=0;
                foreach ($recipients as $recept) {


                    if ($this->runPHPMailer($recept['email'], $settings_obj, $email_content)) {

                        $dane = array(
                            'email' => $recept['email'],
                            'data_create' => date('Y-m-d H:i'),
                            'status' => 1,
                            'send' => 1,
                            'group_id' => isset($send_grup_id) ? $send_grup_id : '',
                            'msg_id' => isset($id_msg) ? $id_msg : '',
                            'cron'=>0

                        );


                        $this->insert_record('sub_send_info', $dane);


                    }


                    $i++;

                    if ($i == count($recipients)) {

                        $this->runPHPMailer($settings_obj->from_email_settings, $settings_obj, $this->sendReports($id_msg , 0));

                    }


                }


            } else {

                $this->runPHPMailer($settings_obj->from_email_settings, $settings_obj, $email_content);
            }


        } else {

            $this->runPHPMailer($settings_obj->from_email_settings, $settings_obj, $email_content);
        }


    }


}