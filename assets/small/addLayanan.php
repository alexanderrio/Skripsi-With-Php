<button type="button" class="floatAdd" data-toggle="modal" data-target="#formulir">
    <i class="fa fa-plus"></i>
</button>

<div class="modal fade" id="formulir" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Layanan</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul" class="col-form-label">Judul Layanan:</label>
                <input type="text" class="form-control" name="judul" id="judul">
            </div>
            <div class="form-group">
                <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label for="gambar1" class="col-form-label">Gambar:</label>
                <input type="file" name="gambar1" id="gambar1" multiple="multiple">
            </div>
            <div class="form-group">
                <label for="gambar2" class="col-form-label">Gambar:</label>
                <input type="file" name="gambar2" id="gambar2">
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="tambahLayanan">Simpan</button>
        </form>  
    </div>
    </div>
  </div>
</div>