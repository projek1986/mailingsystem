<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="close">X</a>
        <h2>Informacja</h2>

        <p>DODANO NOWĄ GRUPĘ</p>

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
        background: rgba(0, 0, 0, 0.8);
        z-index: 99999;
        opacity: 0;
        -webkit-transition: opacity 400ms ease-in;
        -moz-transition: opacity 400ms ease-in;
        transition: opacity 400ms ease-in;
        pointer-events: none;
    }

    .modalDialog:target {
        opacity: 1;
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

    .close:hover {
        background: #00d9ff;
    }
</style>


<div class="container">
    <div class="row">

        <div class="col-md-6">


            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Dodaj Nową Grupę</div>
                <div class="panel-body">
                    <form action="/src/Controller/grupController.php" method="post"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nazwa Grupy</label>
                            <input type="text" class="form-control" name="grupa" id="exampleInputEmail1"
                                   placeholder="Nazwa Grupy">
                        </div>
                        <button type="submit" class="btn btn-default">Dodaj nową grupę</button>
                    </form>

                </div>
            </div>
        </div>


        <?php
        include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'src/Classes/DataOperation.php';

        $objdb = new DataOperation;

        $records_grup = $objdb->select_records_where('*', 'sub_grup', 'true');


        ?>

        <div class="col-md-6">

            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Lista Grup</div>
                <div class="panel-body">
                    <ul class="list-group">

                        <?php if (isset($records_grup) && !empty($records_grup)) {
                            $lp=1;
                            foreach ($records_grup as $grupa) { ?>

                                <li class="list-group-item"> <?php echo $lp.' ' .$grupa['nazwa'] ?> <a class="btn btn-default" href="/panel_page/grupalist?id=<?php echo $grupa['id'] ?>" role="button">Lista Subskrybentów</a></li>

                            <?php $lp++; ?>
                            <?php } ?>
                        <?php } ?>

                    </ul>
                </div>


            </div>


        </div>

    </div>
</div>