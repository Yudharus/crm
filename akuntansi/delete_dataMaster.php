<?php
	include "koneksi.php";
	$id_master=$_GET['id_master'];
	$datamaster=mysqli_query($koneksi,"Delete FROM data_master WHERE id_master='$id_master'");
	header('location:datamaster.php');
?>