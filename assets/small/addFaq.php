<button type="button" class="floatAdd" data-toggle="modal" data-target="#formulir">
    <i class="fa fa-plus"></i>
</button>

<div class="modal fade" id="formulir" tabindex="-1">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah FaQ</h5>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="add.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="pertanyaan" class="col-form-label">Pertanyaan:</label>
                <input type="text" class="form-control"required name="pertanyaan" id="pertanyaan">
            </div>
            <div class="form-group">
                <label for="jawaban" class="col-form-label">Jawaban:</label>
                <input type="text" class="form-control" required name="jawaban" id="jawaban">
            </div>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="submit" name="tambahFaq">Simpan</button>
        </form>  
    </div>
    </div>
  </div>
</div>
