<?php
?>
<div id="openModal" class="modalDialog">
    <div>
        <a href="#close" title="Close" class="close">X</a>
        <h2>Informacja</h2>



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

        <div class="col-md-12">

            <form action="/src/Controller/msgFormController.php"  class="form-horizontal" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1">Tytuł Projektu</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tytuł Projektu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tytuł meila</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Tytuł meila">
                </div>

                <div class="form-group">
                    <label for="postContent" >Treść: </label>

                        <textarea rows="20" cols="50" class="form-control" name="content" ><?= isset($records["content"]) ? $records["content"] : ''?></textarea>

                </div>


                <button type="submit" class="btn btn-default">Submit</button>

            </form>


        </div>

    </div>
</div>

<script>tinymce.init({ selector:'textarea' });</script>

