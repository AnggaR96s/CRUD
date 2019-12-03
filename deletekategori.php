<?php
include('koneksi.php');

if(isset($_GET['idkategori'])){
	$idkategori = $_GET['idkategori'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM kategori WHERE idkategori='$idkategori'") or die(mysqli_error($koneksi));
	
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($koneksi, "DELETE FROM kategori WHERE idkategori='$idkategori'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="listkategori.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="listkategori.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="listkategori.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="listkategori.php";</script>';
}

?>