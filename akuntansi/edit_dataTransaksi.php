
<?php
	include "koneksi.php";
	$id_transaksi=$_GET['id_transaksi'];
	$sql=mysqli_query($koneksi,"SELECT * FROM data_transaksi WHERE id_transaksi = '$id_transaksi'");
	while($data=mysqli_fetch_array($sql)){

?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Transaksi</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_editDataTransaksi.php" name="modal_popup" enctype="multipart/form-data" method="POST">
           
            <div class="form-group" style="padding-bottom: 20px;">
                	<label for="tanggal">Tanggal</label>       
					<input type="hidden" name="modal_id"  class="form-control" value="<?php echo $r['id_transaksi']; ?>" />
     				<input type="text" name="tanggal"  class="form-control" value="<?php echo $r['tanggal']; ?>" disabled/>
                </div>
				<div class="form-group" style="padding-bottom: 20px;">
			
				<label for="id_master" class="control-label">Nama Akun</label>
                <select id="id_master" class="form-control" name="id_master" >
                <?php
              include "koneksi.php";
              $sql=mysqli_query($koneksi, "SELECT * FROM data_master ORDER BY id_master");
              while ($data = mysqli_fetch_array($sql)) {
                ?>
                <option value="<?=$data['id_master'];?>"><?php echo $data['nama'];?>
                </option>
                <?php
              }
              ?>
     				<input type="text" name="nama"  class="form-control" value="<?php echo $r['nama']; ?>" disabled/>
                </div>
				<div class="form-group" style="padding-bottom: 20px;">
                	<label for="tanggal">Keterangan</label>       
     				<input type="text" name="tanggal"  class="form-control" value="<?php echo $r['tanggal']; ?>" disabled/>
                </div>
				<div class="form-group" style="padding-bottom: 20px;">
                	<label for="tanggal">Pemasukkan</label>       
     				<input type="text" name="tanggal"  class="form-control" value="<?php echo $r['tanggal']; ?>" disabled/>
                </div>
				<div class="form-group" style="padding-bottom: 20px;">
                	<label for="tanggal">Pengeluaran</label>       
     				<input type="text" name="tanggal"  class="form-control" value="<?php echo $r['tanggal']; ?>" disabled/>
                </div>
  

              

	            <div class="modal-footer">
	                <button class="btn btn-success" type="submit">
	                    Confirm
	                </button>

	                <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
	               		Cancel
	                </button>
	            </div>

            	</form>

				<?php
              }
              ?>

            </div>

           
        </div>
    </div>