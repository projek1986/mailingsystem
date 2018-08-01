<div class="container">
    <div class="row">

        <div class="col-md-6">

            <form action="/src/Controller/csvController.php"  class="form-horizontal" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nazwa Grupy</label>
                    <input type="text" class="form-control" name="grupa" id="exampleInputEmail1" placeholder="Nazwa Grupy">
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">Plik</label>
                    <input type="file" name="filecsv" id="exampleInputFile">
                    <p class="help-block">Wybierz plik csv z listą subskrybentów</p>
                </div>

                <button type="submit" class="btn btn-default">Pobierz Listę </button>
            </form>

        </div>
    </div>
</div>