<?php
    include "koneksi.php";
	$id_customer=$_GET['id_customer'];
	$sql=mysqli_query($koneksi,"SELECT * FROM customer WHERE id_customer='$id_customer'");
	while($data=mysqli_fetch_array($sql)){
?>

<div class="modal-dialog">
    <div class="modal-content">

    	<div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Edit Customer</h4>
        </div>

        <div class="modal-body">
        	<form action="proses_editCustomer.php" name="modal_popup" enctype="multipart/form-data" method="POST">
        		
                <div class="form-group" style="padding-bottom: 20px;">
                	<label for="Modal Name">Nama Customer</label>
                    <input type="hidden" name="id_customer"  class="form-control" value="<?php echo $data['id_customer']; ?>" />
     				<input type="text" name="nama_customer"  class="form-control" value="<?php echo $data['nama_customer']; ?>"/>
					 <input type="text" name="alamat"  class="form-control" value="<?php echo $data['alamat']; ?>"/>
					 <input type="text" name="nomor"  class="form-control" value="<?php echo $data['nomor']; ?>"/>
				
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