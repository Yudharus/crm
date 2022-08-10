<?php
	include "koneksi.php";
	$id_transaksi= $_POST['id_transaksi'];
	$tanggal = $_POST['tanggal'];
    $id_master = $_POST['id_master'];
    $keterangan = $_POST['keterangan'];
    $pemasukan = $_POST['pemasukkan'];
    $pengeluaran = $_POST['pengeluaran'];
	$sql=mysqli_query($koneksi,"UPDATE data_transaksi SET tanggal = '$tanggal',  WHERE id_transaksi = '$id_transaksi'");
	header('location:transaksi.php');
?>