<button type="button" class="floatAdd" data-toggle="modal" data-target="#formulir">
    <i class="fa fa-plus"></i>
</button>

<div class="modal fade" id="formulir" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Peti</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="namaPeti" class="col-form-label">Nama Peti:</label>
                <input type="text" class="form-control" name="namaPeti" id="namaPeti">
            </div>
            <div class="form-group">
                <label for="bahan" class="col-form-label">Bahan Peti:</label>
                <textarea class="form-control" name="bahanPeti" id="bahan"></textarea>
            </div>
            <div class="form-group">
                <label for="deskripsi" class="col-form-label">Deskripsi:</label>
                <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <label for="gambar" class="col-form-label">Gambar:</label>
                <input type="file" name="gambar" id="gambar">
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="btn_submit" name="tambahPeti">Simpan</button>
        </form>  
    </div>
    </div>
  </div>
</div>
