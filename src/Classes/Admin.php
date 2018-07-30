<?php
class Admin {

    public function admin_login($login, $pass) {
        
        include('DataOperation.php');
        
        $login = trim(htmlspecialchars($login));
     
        $pass = md5(trim($pass));
        
        $data_obj = new DataOperation;
        
        $result = $data_obj->select_records('admin_log', array('login'=>$login, 'pass'=>$pass, 'status'=>1));

        if (count($result)> 0) {
            
            $_SESSION['admin'] = $login;
            header("Location: /panel_page/panel");
            return true;
            
        } else {
            return false;
        }

    }


}
