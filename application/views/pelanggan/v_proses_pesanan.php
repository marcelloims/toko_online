<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <?php $this->load->view('_partial_pelanggan/header'); ?>
</head>

<body class="hold-transition sidebar-collapse layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('_partial_pelanggan/navbar'); ?>
        <!-- /.navbar -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Batas Memasukan Konten -->
            <div class="container">
                <div class="row">
                    <div class="container-fluid">
                        <div class="alert alert-success text-center mt-5">
                            <h4>Selamat, Pesanan Anda Sedang Kami Proses</h4>
                            <h4>Batas Pembayaran <b>2 Jam</b></h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Batas Memasukan Konten -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <?php $this->load->view('_partial_pelanggan/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <?php $this->load->view('_partial_pelanggan/js'); ?>
</body>

</html>