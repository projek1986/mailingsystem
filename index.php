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

