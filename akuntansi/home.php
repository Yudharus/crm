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
        <div class="panel panel-default" style="padding-top: 100px">
            <div class="panel-heading">
                <h2>
                    <marquee>Selamat Datang </marquee>
                </h2>
            </div>

        </div>
        <script type="text/javascript" src="./jquery/jquery-1.8.3.min.js" charset="UTF-8"></script>
        <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
    </body>

    </html>
<?php
} else {
    header("location:index.php");
}
?>