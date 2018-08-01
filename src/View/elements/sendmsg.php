<?php
include_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . 'src/Classes/DataOperation.php';

$objdb = new DataOperation;

$records = $objdb->select_records_where('id , title_projekt ', 'msg', true);

$sub_grup = $objdb->select_records_where('id , nazwa ', 'sub_grup', true);

?>
<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="close">X</a>
        <h2>Informacja</h2>

        <p>Lista wysyłkowa została utworzona</p>

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
<div class="container">
    <div class="row">

        <div class="col-md-6">

            <h2>Wysyłka </h2>
            <form action="/src/Controller/sendController.php" class="form-horizontal" method="post"
                  enctype="multipart/form-data">

                <h3> Wybierz projekt </h3>
                <select name="sendmsgid" class="form-control">
                    <?php
                    if (isset($records) && !empty($records)) { ?>

                        <?php foreach ($records as $sub) { ?>

                            <option value="<?php echo $sub['id']; ?>"><?php echo $sub['title_projekt']; ?></option>

                        <?php } ?>
                    <?php } ?>
                </select>
                <br>

                <h3> Wybierz grupę odbiorców </h3>
                <select name="sendgrup" class="form-control">
                    <option value="0">Wysylka testowa</option>
                    <?php
                    if (isset($sub_grup) && !empty($sub_grup)) { ?>

                        <?php foreach ($sub_grup as $sub) { ?>

                            <option value="<?php echo $sub['id']; ?>"><?php echo $sub['nazwa']; ?></option>

                        <?php } ?>
                    <?php } ?>
                </select>
                <br>
                <div class="checkbox">
                    <label>
                        <input name="aceptmsg" type="checkbox" value="1" required>
                       Potwierdź chęć wysyłki wiadomości
                    </label>
                </div>
                <br>
                <br>
                <br>

                <button type="submit" class="btn btn-default">Wyślij</button>
            </form>
        </div>
    </div>
</div>