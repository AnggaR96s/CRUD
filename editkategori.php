<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Kategori</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Edit Kategori</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="listkategori.php">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="tambahkategori.php">Tambah</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	
	<div class="container" style="margin-top:20px">
		<h2>Edit Kategori</h2>
		
		<hr>
		
		<?php
		if(isset($_GET['idkategori'])){
			$idkategori = $_GET['idkategori'];
			
			$select = mysqli_query($koneksi, "SELECT * FROM kategori WHERE idkategori='$idkategori'") or die(mysqli_error($koneksi));
			
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			}else{
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>
		
		<?php
		if(isset($_POST['submit'])){
			$idkategori		= $_POST['idkategori'];
			$namakategori	= $_POST['namakategori'];
			$keterangan		= $_POST['keterangan'];
			
			$sql = mysqli_query($koneksi, "UPDATE kategori SET idkategori='$idkategori', namakategori='$namakategori', keterangan='$keterangan' WHERE idkategori='$idkategori'") or die(mysqli_error($koneksi));
			
			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="editkategori.php?idkategori='.$idkategori.'";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>
		
		<form action="editkategori.php?idkategori=<?php echo $idkategori; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">ID Kategori</label>
				<div class="col-sm-10">
					<input type="text" name="idkategori" class="form-control" size="4" value="<?php echo $data['idkategori']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Kategori</label>
				<div class="col-sm-10">
					<input type="text" name="namakategori" class="form-control" value="<?php echo $data['namakategori']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Keterangan</label>
				<div class="col-sm-10">
					<input type="text" name="keterangan" class="form-control" value="<?php echo $data['keterangan']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="listkategori.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>
		
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
</body>
</html>