<?php
	include "koneksi.php";
	$id_transaksi=$_GET['id_transaksi'];
	$datatransaksi=mysqli_query($koneksi,"Delete FROM data_transaksi WHERE id_transaksi='$id_transaksi'");
	header('location:transaksi.php');
?>