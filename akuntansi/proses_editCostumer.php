<?php
	include "koneksi.php";
	$id_customer=$_POST['id_customer'];
	$nama_customer = $_POST['nama_customer'];
	$alamat= $_POST['alamat'];
	$nomor = $_POST['nomor'];
	$sql=mysqli_query($koneksi,"UPDATE customer SET nama_customer= '$nama_customer', alamat='$alamat', nomor ='$nomor'  WHERE id_customer = '$id_customer'");
	header('location:costumer.php');
?>