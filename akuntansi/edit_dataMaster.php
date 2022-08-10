<?php
    include "koneksi.php";
	$id_master=$_GET['id_master'];
	$sql=mysqli_query($koneksi,"SELECT * FROM data_master WHERE id_master='$id_master'");
	while($data=mysqli_fetch_array($sql)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Data Master</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_editDataMaster.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama Akun</label>
                    <input type="hidden" name="id_master"  class="form-control" value="<?php echo $data['id_master']; ?>" />
     				<input type="text" name="nama"  class="form-control" value="<?php echo $data['nama']; ?>"/>
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

             <?php } ?>

            </div>

           
        </div>
    </div>