<?php
include_once __DIR__ . '/DataOperation.php';
include_once __DIR__ . '/../../settings/mailTemplate/Templates.php';
include_once __DIR__ . '/../../settings/Settings.php';
include_once __DIR__ .'/../../web/vendors/mailerPHP/Mailer.class.php';

class send extends DataOperation
{

    public function create_mail_content($id_msg)
    {

        $msg_record = $this->select_record('msg', array("id" => $id_msg));

        $subject = $msg_record['title_msg'];

        if (empty($msg_record['file_content'])) {

            $content = Templates::htmlTemplate($msg_record['content_msg']);
        } else {

            $content = file_get_contents('../../assets/contentfile/'.$id_msg.'/'.$msg_record['file_content']);

        }


        $images = $this->select_records('msgimages', array("msg_id" => $id_msg));

        $atachments = $this->select_records('msgfile', array("msg_id" => $id_msg));


        if(isset($images) && !empty($images)){

        $images_file = array();

        foreach ($images as $img) {

            $images_file [] = $img['namefile'];


        }
    }

        if(isset($atachments) && !empty($atachments)) {

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


    public function sendmsg($id_msg){
        $settings_obj = new Settings;

        $email_content = $this->create_mail_content($id_msg);
        $this->runPHPMailer('rojek.przemek@gmail.com',$settings_obj,$email_content);


    }


    public function runPHPMailer($recipient ="rojek.przemek@gmail.com",$settings_obj,$email_content){


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


            if(isset($email_content['images']) && !empty($email_content['images'])){

                foreach ($email_content['images'] as $image) {

                    $mailer->AddEmbeddedImage('../../assets/images/'.$email_content['id_msg'].'/'.$image , $image);

                }


            }


            if(isset($email_content['attachments']) && !empty($email_content['attachments'])){

                foreach ($email_content['attachments'] as $attachments) {

                    $mailer->AddAttachment('../../assets/file/'.$email_content['id_msg'].'/'.$attachments );

                }


            }

           $mailer->Send($mailer);
            $send = 1;
            $send_at = date('Y-m-d G:i:s');

        } catch (phpmailerException $e) {
            $error = $e->errorMessage();
        }


        return array(
            'send_at' => isset($send_at) ? $send_at : '0000-00-00 00:00:00',
            'error' => isset($error) ? $error : '',
            'status' => 1,
            'send' => isset($send) ? $send: 0
        );
    }

}