<?php
include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'src/Classes/DataOperation.php';

$objdb = new DataOperation;

if (isset($_GET) && !empty($_GET['id'])) {

    $records_sub = $objdb->select_records('subscribers', array("sub_grup" => $_GET['id']));

}

?>

<div class="container">
    <div class="row">

        <div class="col-md-12">

            <table id="gru_list" class="cell-border" cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th style="text-align:center;">Id</th>
                    <th style="text-align:center;">E-mail</th>
                    <th style="text-align:center;">Nazwa</th>
                    <th style="text-align:center;">Status</th>
                    <th style="text-align:center;">Data dodania</th>
                    <th style="text-align:center;">Zarządzaj</th>

                </tr>
                </thead>

                <tbody>

                <?php
                if (isset($records_sub) && !empty($records_sub)) { ?>

                    <?php foreach ($records_sub as $sub) { ?>

                        <tr>
                            <td><?php echo $sub['id'] ?></td>
                            <td><?php echo $sub['email'] ?></td>
                            <td><?php echo $sub['name'] ?></td>
                            <td><?php echo $sub['status'] ?></td>
                            <td><?php echo $sub['data_create'] ?></td>
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
        init_dataTable('#gru_list');
    });


</script>