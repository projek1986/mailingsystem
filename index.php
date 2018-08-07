<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Content-Type: text/html");

include dirname(__FILE__) . '/includes/AltoRouter.php';

$router = new AltoRouter();
$router->setBasePath('');


//Admin
$router->map('GET', '/', 'src/Controller/loginController.php', 'adminLogin');
$router->map('POST', '/', 'src/Controller/loginController.php', 'loginAction');
$router->map('GET', '/logout', 'src/Controller/logoutController.php', 'adminLogout');
$router->map('GET', '/panel_page', 'src/Controller/panelController.php', 'panel_page');
$router->map('GET', '/panel_page/[a:web]', 'src/Controller/panelController.php', 'page');
$router->map('GET', '/[a:web]', 'src/Controller/webController.php', 'web');
$router->map('GET', '/install', 'src/Controller/installController.php', 'install');


// msg
$router->map('GET', '/msg_edit/[i:id]', 'src/Controller/msgController.php', 'msg_edit');
$router->map('GET', '/msg_delete/[i:id]', 'src/Controller/msgController.php', 'msg_delete');
$router->map('GET', '/report_delete/[i:id]', 'src/Controller/reportController.php', 'report_delete');


// subscribers

//$router->map('GET', '/sub_edit/[i:sub_grup]', 'src/Controller/subController.php', 'sub_edit');

$router->map('GET', '/image_delete/[i:id]/[i:msg_id]', 'src/Controller/imageController.php', 'image_delete');
$router->map('GET', '/file_delete/[i:id]/[i:msg_id]', 'src/Controller/fileController.php', 'file_delete');

$router->map('GET', '/sub_delete/[i:id]/[i:sub_grup]', 'src/Controller/subController.php', 'sub_delete');
$router->map('GET', '/subdelete/[i:id]', 'src/Controller/grupController.php', 'subdelete');


// API Routes
$router->map('GET','/api/[*:key]/[*:name]/', 'json.php', 'api');


/* Match the current request */
$match = $router->match();
if($match) {
  require $match['target'];
}
else {
  header("HTTP/1.0 404 Not Found");
  require '404.html';
}
?>

