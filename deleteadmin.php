<?php
include('koneksi.php');

if(isset($_GET['idadmin'])){
	$idadmin = $_GET['idadmin'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM admin WHERE idadmin='$idadmin'") or die(mysqli_error($koneksi));
	
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($koneksi, "DELETE FROM admin WHERE idadmin='$idadmin'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Berhasil menghapus data."); document.location="listadmin.php";</script>';
		}else{
			echo '<script>alert("Gagal menghapus data."); document.location="listadmin.php";</script>';
		}
	}else{
		echo '<script>alert("ID tidak ditemukan di database."); document.location="listadmin.php";</script>';
	}
}else{
	echo '<script>alert("ID tidak ditemukan di database."); document.location="listadmin.php";</script>';
}

?>