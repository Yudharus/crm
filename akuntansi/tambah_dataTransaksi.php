<?php
include "koneksi.php";

$tanggal = $_POST['tanggal'];
$id_master = $_POST['id_master'];
$keterangan = $_POST['keterangan'];
$pemasukan = $_POST['pemasukkan'];
$pengeluaran = $_POST['pengeluaran'];
mysqli_query($koneksi,"INSERT INTO data_transaksi (tanggal,id_master,keterangan,pemasukkan,pengeluaran) VALUES ('$tanggal','$id_master','$keterangan','$pemasukan','$pengeluaran')");
header('location:transaksi.php');
?>