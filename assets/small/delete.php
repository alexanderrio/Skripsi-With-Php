<?php
include_once("connection.php");
    $con = createConnection();
    $sql = "SELECT * FROM coffins";
	$result = mysqli_query($con, $sql);
?>
<button type="button" data-toggle="modal" class="btn btn-danger" data-target="#detailHapus">Delete</button>
			<div class="modal fade" id="detailHapus" tabindex="-1">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Informasi Peti</h5>
							<button type="button" class="close" data-dismiss="modal">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="">
							<form action="delete.php" method="post" enctype="multipart/form-data">
								<div class="">
									<label for="namaPeti" class="col-form-label">Nama Peti:</label>
									<input type="text" class="form-control" name="namaPeti" id="namaPeti" readonly value="<?php echo $hasil['nama']; ?>">
								</div>
								<div class="">
									<label for="bahan" class="col-form-label">Bahan Peti:</label>
									<textarea class="form-control" name="bahanPeti" id="bahan" readonly><?php echo $hasil['bahan'];?></textarea>
								</div>
								<div class="">
									<label for="deskripsi" class="col-form-label">Deskripsi:</label>
									<textarea class="form-control" name="deskripsi" id="deskripsi" readonly><?php echo $hasil['deskripsi']; ?></textarea>
								</div>
									<img src=" <?php echo $hasil['path']; ?>" width="100%" height="300" alt="">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger" name="hapusPeti">Hapus</button>
							</form>  
						</div>
					</div>
				</div>
			</div>