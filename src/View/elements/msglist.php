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
                    <th style = "text-align:center;">Zarchiwizowany</th>
                    <th style = "text-align:center;">Zarządzaj</th>

                </tr>
                </thead>

                <tbody>



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