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

            <form action="/src/Controller/msgfileFormController.php"  class="form-horizontal" method="post" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="exampleInputEmail1">Tytuł Projektu</label>
                    <input type="text" name="title_projekt" class="form-control" id="exampleInputEmail1" placeholder="Tytuł Projektu">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tytuł meila</label>
                    <input type="text" name="title_msg" class="form-control" id="exampleInputEmail1" placeholder="Tytuł meila">
                </div>


                <div class="form-group">
                    <div class="form-group">
                        <label>Kontent z pliku html</label>

                        <input id="input-ke-11" name="file_content[]" type="file" multiple >

                    </div>
                </div>

                <div class="form-group">
                    <div class="form-group">
                        <label>Zdjecia do pliku</label>

                        <input id="input-ke-2" name="images[]" type="file" multiple class="file-loading">

                    </div>
                </div>



                <div class="form-group">
                    <div class="form-group">
                        <label>Załączniki</label>

                        <input id="input-ke-3" name="files[]" type="file" multiple class="file-loading">

                    </div>
                </div>


                <button type="submit" class="btn btn-default">Zapisz</button>
<br>
<br>
<br>
<br>
            </form>


        </div>

    </div>
</div>

<script>

    var krajeeGetCount = function(id) {
        var cnt = $('#' + id).fileinput('getFilesCount');
        return cnt === 0 ? 'You have no files remaining.' :
            'You have ' +  cnt + ' file' + (cnt > 1 ? 's' : '') + ' remaining.';
    };

    $("#input-ke-3").fileinput({
        language: "pl",
//        uploadUrl: "/file-upload-batch/1",
        uploadAsync: false,
        showUpload: false ,
        overwriteInitial: true,
        initialPreview: [
            // IMAGE RAW MARKUP


        ],
        initialPreviewAsData: true, // defaults markup
        //    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
        initialPreviewConfig: [

            //    {previewAsData: false, url: "/site/file-delete", key: 9}

        ],

        initialPreviewShowDelete: false,
        uploadExtraData: {
            img_key: "1000",
            img_keywords: "happy, nature",
        }

    }).on('filebeforedelete', function() {
        return new Promise(function(resolve, reject) {
            $.confirm({
                title: 'Confirmation!',
                content: 'Are you sure you want to delete this file?',
                type: 'red',
                buttons: {
                    ok: {
                        btnClass: 'btn-primary text-white',
                        keys: ['enter'],
                        action: function(){
                            resolve();
                        }
                    },
                    cancel: function(){
                        $.alert('File deletion was aborted! ' + krajeeGetCount('input-ke-3'));
                    }
                }
            });
        });
    }).on('filedeleted', function() {
        setTimeout(function() {
            $.alert('File deletion was successful! ' + krajeeGetCount('input-ke-3'));
        }, 900);
    });
  $("#input-ke-2").fileinput({
        language: "pl",
//        uploadUrl: "/file-upload-batch/1",
        uploadAsync: false,
        showUpload: false ,
        overwriteInitial: true,
        initialPreview: [
            // IMAGE RAW MARKUP


        ],
        initialPreviewAsData: true, // defaults markup
        //    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
        initialPreviewConfig: [

            //    {previewAsData: false, url: "/site/file-delete", key: 9}

        ],

        initialPreviewShowDelete: false,
        uploadExtraData: {
            img_key: "1000",
            img_keywords: "happy, nature",
        }

    }).on('filebeforedelete', function() {
        return new Promise(function(resolve, reject) {
            $.confirm({
                title: 'Confirmation!',
                content: 'Are you sure you want to delete this file?',
                type: 'red',
                buttons: {
                    ok: {
                        btnClass: 'btn-primary text-white',
                        keys: ['enter'],
                        action: function(){
                            resolve();
                        }
                    },
                    cancel: function(){
                        $.alert('File deletion was aborted! ' + krajeeGetCount('input-ke-3'));
                    }
                }
            });
        });
    }).on('filedeleted', function() {
        setTimeout(function() {
            $.alert('File deletion was successful! ' + krajeeGetCount('input-ke-3'));
        }, 900);
    });
  $("#input-ke-1").fileinput({
        language: "pl",
//        uploadUrl: "/file-upload-batch/1",
        uploadAsync: false,
        showUpload: false ,
        overwriteInitial: true,
        initialPreview: [
            // IMAGE RAW MARKUP


        ],
        initialPreviewAsData: true, // defaults markup
        //    initialPreviewFileType: 'image', // image is the default and can be overridden in config below
        initialPreviewConfig: [

            //    {previewAsData: false, url: "/site/file-delete", key: 9}

        ],

        initialPreviewShowDelete: false,
        uploadExtraData: {
            img_key: "1000",
            img_keywords: "happy, nature",
        }

    }).on('filebeforedelete', function() {
        return new Promise(function(resolve, reject) {
            $.confirm({
                title: 'Confirmation!',
                content: 'Are you sure you want to delete this file?',
                type: 'red',
                buttons: {
                    ok: {
                        btnClass: 'btn-primary text-white',
                        keys: ['enter'],
                        action: function(){
                            resolve();
                        }
                    },
                    cancel: function(){
                        $.alert('File deletion was aborted! ' + krajeeGetCount('input-ke-3'));
                    }
                }
            });
        });
    }).on('filedeleted', function() {
        setTimeout(function() {
            $.alert('File deletion was successful! ' + krajeeGetCount('input-ke-3'));
        }, 900);
    });

</script>


<script>tinymce.init({ selector:'textarea' });</script>

<!------plupload------>




