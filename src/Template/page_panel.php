<?php
if(!isset($_SESSION)){
ob_start();
session_start();
}
?>
<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>Panel Administratora</title>
      <link rel="shortcut icon" href="/web/img/favicon.ico" />

    <!-- Bootstrap -->
    <link href="/web/vendors/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Dashboard Bootstrap -->
    <link href="/web/css/dashboard.css" rel="stylesheet">

   
    <!-- JSDATA Table CSS-->
    <link href="/web/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    
    <!-- Datetimepicker-->
    <link href="/web/vendors/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    
    
    <!-- style -->
    <link href="/web/css/style.css" rel="stylesheet"/>
    <link href="/web/css/fileinput.css" rel="stylesheet"/>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>-->
    
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
                          
    
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/web/vendors/bootstrap/js/bootstrap.min.js"></script>

    
<!--    TINYMCE-->
    <script src="/web/vendors/tinymce/tinymce.min.js"></script>
    
    <!-- JSDATA Table JS-->
    <script src="/web/vendors/DataTables/datatables.min.js"></script>
    
<!--        <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>-->
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]<!-->

      <script src="/web/js/fileinput.js"></script>


      <link href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    
  </head>
  
  <body>
      


  <div class="container-fluid">



    <div class="col-md-12">

        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="/panel_page/panel">
                        <span class="label label-default">Panel Administracyjny mailingowy</span>
                    </a>

            </div>
        </nav>

    </div>





          <div class="col-md-2">

              <?php include './src/View/elements/sidebar-left.php'; ?>

          </div>
          <div class="col-md-10">


              <?php include './src/View/elements/'.$activePage.'.php'; ?>

          </div>





  </div>






  </body>
</html>