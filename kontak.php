<?php
	include_once("commons/header.php");
	include_once("assets/small/whatsapp.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="styles.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
    <link rel="stylesheet" href="assets/fontawesome-free-6.2.0-web/css/all.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Kontak</title>
</head>
<body>
    
<div id="content"> 
		<div class="judulProduk">
		<H1>Kontak</H1>
		</div>
		<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:80%">
			<tbody>
				<tr>
					<td>
					<p><strong>Kantor: </strong><br>
					(024)8313468 <br>
					(024)8412206<br><br>
					<strong>No Hp: </strong><br>
					0811271723 <br>
					08122878169</p>

					<p><strong>Gedung 1 </strong><br>
					JL Taman Tenaga, No. 2<br>
					Komplek Kawasan Industri<br>
					Blimbing, Kota Malang<br>
					Jawa Timur 65125</p>

					<p><strong>Gedung Anggrek </strong><br>
					JL. Tenaga Baru IV no 20<br>
					Komplek Kawasan Industri<br>
					Blimbing, Kota Malang<br>
					Jawa Timur 65125</p>
					</td>
					<td>
						<form action="addContacs.php" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" required>
							</div>
							<div class="form-group">
								<label for="nohp">No HP</label>
								<input type="text" class="form-control" id="nohp" name="nohp" placeholder="0xxxxxxxx" required>
							</div>
							<div class="form-group">
								<label for="pesan">Pesan</label>
								<textarea class="form-control" id="pesan" name="pesan" rows="3" required></textarea>
							</div>
							<button type="submit" name="submit" class="btn btn-primary mb-2">Kirim</button>
						</form>
					</td>
				</tr>
		<tr><td rowspan="2" colspan="2"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.1026755295966!2d110.43490821537594!3d-6.997188370475818!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e708c99b85cbcff%3A0x40b30e2da89f7d7!2sArimatea%20YPK!5e0!3m2!1sen!2sid!4v1667530162002!5m2!1sen!2sid" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></td></tr>
	</tbody>
</table>

            </div>
      <?php
    include_once("commons/footer.php");

?>