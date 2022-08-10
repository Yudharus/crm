<?php

@session_start();

include "koneksi.php";
include "navbar.php";

if (@$_SESSION['manager'] || @$_SESSION['pegawai']) {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Kuisoner Produk</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css">
  </head>

  <body>
    <div class="container">
      <div class="panel panel-default" style="margin-top: 100px">
        <div class="row" style="padding-bottom: 30px; padding-left: 10px; ">
          <div class="col-md-8">
            <h2>Kuisoner</h2>
            <p>Untuk pernyataan berikut ini, saudara dimohon untuk memberikan jawaban
              dengan nilai 1-5 pada tabel yang sudah tersedia dengan tanda check (√).

              <br>STS = Sangat Tidak Setuju
              <br>ST = Tidak Setuju (ST)
              <br> CS = Cukup Setuju (N)
              <br> S = Setuju (S)
              <br>SS = Sangat Setuju (SS)
              <br>Seberapa setuju anda terhadap pernyataan berikut ini :
            </p>
          </div>
        </div>
        <table class="table table-bordered table-striped">
          <thead class="bg-info text-white">
            <tr align="center">
              <th width="5%">No</th>
              <th width="70%">Pernyataan</th>
              <th>STS</th>
              <th>TS</th>
              <th>CS</th>
              <th>S</th>
              <th>SS</th>
            </tr>
          </thead>
          <tbody>
            </tr>
            <?php
            $no = 0;
            //membuat array yang berisi nama buah-buahan
            $buah = array(
              'Produk baru yang akan keluar berbahan cotton combed (tekstur halus, dingin, dan sangat mudah menyerap keringat)  ',
              'Produk baru yang akan keluar berbahan katun jepang (ringan dan sejuk)',
              'Produk baru yang akan keluar berbahan jersey (tekstur licin, mengilap, dan jatuh di badan)',
              'Produk baru yang akan keluar berbahan bamboo (lembut, menjadikan kulit mudah bernapas, hypoallergenic)',
              'Produk yang akan keluar berwarna orange',
              'Produk yang akan keluar berwarna hitam',
              'Produk yang akan keluar berwarna putih',
              'Produk yang akan keluar berwarna abu',
              'Produk yang akan keluar berwarna hijau',
              'Harga produk yang akan keluar berkisar Rp.100,000.00 - Rp.150,000.00',
              'Harga produk yang akan dikeluarkan terjangkau untuk kedepannya',
              'Apakah menurut anda kemasan menggunakan kertas merupakan kemasan yang baik bagi lingkungan?',
              'Kemasan yang digunakan ramah lingkungan.',
              'Keinginan adanya pemberian mini free gift (masker, sticker, dsb) untuk minimal pembelian tertentu.',
            );
            //count() untuk menghitung isi array.
            for ($x = 0; $x < count($buah); $x++) {

              $no++;
            ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $buah[$x] ?></td>
                <td class="form-group">
                  <input class="form-control form-control-lg" style="width: auto;" type="radio" title="Tidak Mampu" value="1" required>
                </td>
                <td class="form-group">
                  <input class="form-control form-control-lg" style="width: auto;" type="radio" title="Tidak Mampu" value="2" required>
                </td>
                <td class="form-group">
                  <input class="form-control form-control-lg" style="width: auto;" type="radio" title="Tidak Mampu" value="3" required>
                </td>
                <td class="form-group">
                  <input class="form-control form-control-lg" style="width: auto;" type="radio" title="Tidak Mampu" value="4" required>
                </td>
                <td class="form-group">
                  <input class="form-control form-control-lg" style="width: auto;" type="radio" title="Tidak Mampu" value="5" required>
                </td>
              </tr>


            <?php } ?>
        </table>
        <div class="card-footer clearfix">
          <ul class="pagination pagination-sm m-0 float-left">
            <button type="button" class="btn btn-info btn-sm ml-20">
              Submit
            </button>
          </ul>
        </div>
      </div>
    </div>
    </tbody>
    </div>

    <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="./js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="./js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
    <script type="text/javascript">
      $('.form_datetime').datetimepicker({
        //language:  'fr',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        forceParse: 0,
        showMeridian: 1
      });
      $('.form_date').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
      });
      $('.form_time').datetimepicker({
        language: 'id',
        weekStart: 1,
        todayBtn: 1,
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
      $(document).ready(function() {
        $(".open_modal").click(function(e) {
          var m = $(this).attr("id_master");
          $.ajax({
            url: "edit_dataTransaksi.php",
            type: "GET",
            data: {
              modal_id: m,
            },
            success: function(ajaxData) {
              $("#ModalEdit").html(ajaxData);
              $("#ModalEdit").modal('show', {
                backdrop: 'true'
              });
            }
          });
        });
      });
    </script>

    <!-- Javascript untuk popup data master  Delete-->
    <script type="text/javascript">
      function confirm_modal(delete_url) {
        $('#modal_delete').modal('show', {
          backdrop: 'static'
        });
        document.getElementById('delete_link').setAttribute('href', delete_url);
      }
    </script>
  </body>

  </html>
<?php
} else {
  header("location:index.php");
}
?>