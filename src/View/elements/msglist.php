<?php
include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'src/Classes/DataOperation.php';

$objdb = new DataOperation;


    $records = $objdb->select_records_where('*', 'msg' , true);


?>


<div class="container">
    <div class="row">

        <div class="col-md-12">

            <table id = "msg_list" class="cell-border" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th style = "text-align:center;">Id</th>
                    <th style = "text-align:center;">Tytuł projektu</th>
                    <th style = "text-align:center;">Tytuł wiadomości</th>
                    <th style = "text-align:center;">Plik</th>
                    <th style = "text-align:center;">Data dodania</th>
                    <th style = "text-align:center;">Zarządzaj</th>

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
                            <td>--</td>


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