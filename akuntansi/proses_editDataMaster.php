<?php
	include "koneksi.php";
	$id_master=$_POST['id_master'];
	$nama = $_POST['nama'];
	$sql=mysqli_query($koneksi,"UPDATE data_master SET nama = '$nama' WHERE id_master = '$id_master'");
	header('location:datamaster.php');
?>