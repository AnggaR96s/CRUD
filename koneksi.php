<?php
$koneksi = mysqli_connect("localhost","root","","crud");

if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>