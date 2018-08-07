<?php
include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'src/Classes/DataOperation.php';

$objdb = new DataOperation;


$records = $objdb->select_records_where('*', 'msg', true);

if(isset($_GET['msg']) && !empty($_GET['msg'])){ ?>




    <div id="openModal" class="modalDialog">
        <div>
            <a href="#close" title="Close" class="close">X</a>
            <h2>Informacja</h2>

                <?php echo '<p>'.$_GET['msg'].' </p>' ?>

        </div>
    </div>
    <style>
        .modalDialog {
            position: fixed;
            font-family: Arial, Helvetica, sans-serif;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: rgba(0,0,0,0.8);
            z-index: 99999;
            opacity:0;
            -webkit-transition: opacity 400ms ease-in;
            -moz-transition: opacity 400ms ease-in;
            transition: opacity 400ms ease-in;
            pointer-events: none;
        }

        .modalDialog:target {
            opacity:1;
            pointer-events: auto;
        }

        .modalDialog > div {
            width: 800px;
            position: relative;
            margin: 10% auto;
            padding: 5px 20px 13px 20px;
            border-radius: 10px;
            background: #fff;
            background: -moz-linear-gradient(#fff, #999);
            background: -webkit-linear-gradient(#fff, #999);
            background: -o-linear-gradient(#fff, #999);
        }

        .close {
            background: #000000;
            color: #FFFFFF;
            line-height: 25px;
            position: absolute;
            right: -12px;
            text-align: center;
            top: -10px;
            width: 24px;
            text-decoration: none;
            font-weight: bold;
            -webkit-border-radius: 12px;
            -moz-border-radius: 12px;
            border-radius: 12px;
            -moz-box-shadow: 1px 1px 3px #000;
            -webkit-box-shadow: 1px 1px 3px #000;
            box-shadow: 1px 1px 3px #000;
        }

        .close:hover { background: #00d9ff; }
    </style>



<?php } ?>


<div class="container">
    <div class="row">

        <div class="col-md-12">

            <table id="msg_list" class="cell-border" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">Tytuł projektu</th>
                    <th style="text-align:center;">Tytuł wiadomości</th>
                    <th style="text-align:center;">Plik</th>
                    <th style="text-align:center;">Data dodania</th>
                    <th style="text-align:center;">Zarządzaj</th>

                </tr>
                </thead>

                <tbody>
                <?php
                if (isset($records) && !empty($records)) { ?>

                    <?php foreach ($records as $sub) { ?>

                        <tr>
                            <td><?php echo $sub['id']; ?></td>
                            <td><?php echo $sub['title_projekt']; ?></td>
                            <td><?php echo $sub['title_msg']; ?></td>
                            <td><?php echo $sub['file_content']; ?></td>
                            <td><?php echo $sub['create_date']; ?></td>
                            <td><?php echo '<a href="/msg_edit/' . $sub['id'] . '" class="btn btn-default small-buttons" role="button">Edytuj</a><br />';
                                echo '<a href="/msg_delete/' . $sub['id'] . '" class="btn btn-danger small-buttons" role="button" onclick =\'return confirm ("Na pewno chcesz usunąć?")\'>Usuń</a>'; ?> </td>


                        </tr>


                    <?php } ?>
                <?php } ?>


                </tbody>
            </table>


        </div>
    </div>
</div>


<!--Data Tables Script init-->
<script src="/web/vendors/DataTables/init_dataTable.js"></script>

<script>
    $(document).ready(function () {
        init_dataTable('#msg_list');
    });


</script>