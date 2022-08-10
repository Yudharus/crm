<?php 

    @session_start();

    include "koneksi.php";
    include "navbar.php";

    if (@$_SESSION['manager'] || @$_SESSION['pegawai']) {     
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css">

</head>
<body>
<div class="container">
<div class="panel panel-default" style="margin-top: 100px">
    <div class="row" style="padding-bottom: 30px; padding-left: 10px; ">
        <div class="col-md-8">
                <h2>Customer</h2>
        </div>
    </div>
    <p><a href="#" class="btn btn-primary" data-target="#ModalAdd" data-toggle="modal"><span class='glyphicon glyphicon-plus-sign'></span>Tambah Data</button></a></p>
               <table class = "table table-bordered table-striped">
        <tr>
        <td>No</td>
        <td>Nama Customer </td>
        <td>Alamat</td>
        <td>Nomor</td>
        <td>Aksi</td>
        </tr>
        <?php
        $no = 0;
        $sql = mysqli_query($koneksi, "SELECT * FROM customer ORDER BY id_customer ASC") or die(mysqli_error());

        while ($data = mysqli_fetch_array($sql)){
          $no++;
       
          ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo  $data['nama_customer']; ?></td>
                <td><?php echo  $data['alamat']; ?></td>
                <td><?php echo  $data['nomor']; ?></td>
                <td>
                   <a href="#" class='open_modal' id='<?php echo  $data['id_customer']; ?>'><button type='button' class='btn btn-success'><span class='glyphicon glyphicon-edit'></span> Edit</button></a>
                   <a href="#" onclick="confirm_modal('delete_customer.php?&id_customer=<?php echo  $data['id_customer']; ?>');"><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove-sign'>Delete</button></a>
                </td>
            </tr>
           
          
          <?php } ?>
                    </table>
        </div>      
    </div>
    <!-- Modal Popup untuk Edit--> 
<div id="ModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

</div>

<!-- Modal Popup untuk delete--> 
<div class="modal fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content" style="margin-top:100px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" style="text-align:center;">Data akan terhapus apakah anda yakin ?</h4>
      </div>        
      <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
        <a href="#" class="btn btn-danger" id="delete_link">Delete</a>
        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

    <!-- Popup untuk Tambah Data--> 
<div id="ModalAdd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myModalLabel">Tambah Data Customer</h4>
        </div>

        <div class="modal-body">
          <form action="tambah_customer.php" name="modal_popup" enctype="multipart/form-data" method="POST">
            
                <div class="form-group" style="padding-bottom: 20px;">
                  <label for="nama_customer">Nama Customer</label>      
                  <input type="text" name="nama_customer"  class="form-control" placeholder="nama_customer" required/>
                  <label for="alamat">Alamat</label>
                  <input type="text" name="alamat"  class="form-control" placeholder="alamat" required/>
                  <label for="nomor">Nomor</label>
                  <input type="text" name="nomor"  class="form-control" placeholder="nomor" required/>
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

           

            </div>

           
        </div>
    </div>
</div>

<script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="./js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
    $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
    });
    $('.form_date').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });
    $('.form_time').datetimepicker({
        language:  'id',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 1,
        minView: 0,
        maxView: 1,
        forceParse: 0
    });
</script>
<!-- Javascript untuk popup data master Edit--> 
<script type="text/javascript">
   $(document).ready(function () {
   $(".open_modal").click(function(e) {
      var m = $(this).attr("id_master");
		   $.ajax({
    			   url: "edit_customer.php",
    			   type: "GET",
    			   data : {modal_id: m,},
    			   success: function (ajaxData){
      			   $("#ModalEdit").html(ajaxData);
      			   $("#ModalEdit").modal('show',{backdrop: 'true'});
      		   }
    		   });
        });
      });
</script>

<!-- Javascript untuk popup data master  Delete--> 
<script type="text/javascript">
    function confirm_modal(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
</body>
</html>
<?php 
}else{
        header("location:index.php");
}
?>

