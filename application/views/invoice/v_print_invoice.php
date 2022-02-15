<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | ChartJS</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body>
    <div class="col">
        <div class="row">
            <!-- Batas Memasukan Konten -->
            <div class="invoice p-3 mb-3">
                <!-- title row -->
                <div class="row">
                    <div class="col-12">
                        <h4>
                            <img src="<?= base_url() ?>assets/dist/img/icon/logo.png" alt="SIMTOTIS"> SIMTOTIS
                            <?php foreach ($detail as $inv) : ?>
                            <?php endforeach; ?>
                            <small class="float-right">Tanggal Invoice : <?= $inv->tanggal_invoice; ?></small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>Tenant of SIMTOTIS.</strong><br>
                            Perumahan Taman Sari Blok E/1 Jagapati<br>
                            Abiansemal - Badung - Bali. <br>
                            Phone : 08196-6090-9030<br>
                            Email : info@simtotis.com
                        </address>
                    </div>
                    <!-- /.col -->
                    <?php
                    foreach ($detail as $pp) :
                    ?>
                    <?php endforeach; ?>
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong><?= $pp->nama_pemesan; ?></strong><br>
                            <?= $pp->alamat_pemesan; ?><br>
                            <?= $pp->telepon_pemesan; ?><br>
                            #ID_USER_PELANGGAN - <strong><?= $pp->id_user; ?></strong><br>
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <table>
                            <tr>
                                <td colspan="3"><b>Invoice SIMTOTIS/<?= $pp->no_invoice; ?></b></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Pesan</b></td>
                                <td>:</td>
                                <td><?= $pp->tanggal_pesanan; ?></td>
                            </tr>
                            <tr>
                                <td><b>Batas Bayar</b></td>
                                <td>:</td>
                                <td><?= $pp->batas_pembayaran; ?></td>
                            </tr>
                            <tr>
                                <td><b>Kode Pembayaran</b></td>
                                <td>:</td>
                                <td>SIMTOTIS/<?= $pp->kode_pembayaran; ?></td>
                            </tr>
                            <tr>
                                <td><b>Status Pesanan</b></td>
                                <td>:</td>
                                <td><?= $pp->status_pesanan ?></td>
                            </tr>
                            <tr>
                                <td><b>Status Pembayaran</b></td>
                                <td>:</td>
                                <td><?= $pp->status_pembayaran ?></td>
                            </tr>
                        </table>
                        <br><br>
                    </div> <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Produk</th>
                                    <th>Hargra</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                foreach ($detail_orders as $psn) :
                                    $no = 1;
                                    $subtotal = $psn->harga_tenant;
                                ?>
                                    <tr>
                                        <td><?= $psn->kode_tenant ?></td>
                                        <td><?= $psn->nama_tenant; ?></td>
                                        <td>Rp. <?= number_format($psn->harga_tenant, 0, ',', '.'); ?></td>
                                        <td><?= $psn->tanggal_mulai; ?></td>
                                        <td><?= $psn->tanggal_akhir; ?></td>
                                        <td>Rp. <?= number_format($subtotal, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row text-justify">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p class="lead">Metode Pembayaran :</p>
                        <img src="<?= base_url() ?>assets/dist/img/credit/visa.png" alt="Visa">
                        <img src="<?= base_url() ?>assets/dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="<?= base_url() ?>assets/dist/img/credit/american-express.png" alt="American Express">
                        <img src="<?= base_url() ?>assets/dist/img/credit/paypal2.png" alt="Paypal">

                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                            <b>
                                <h5>NOTE :</h5> Untuk pelanggan yang terhomat. Kami selaku pihak SIMTOTIS akan menghapus
                                pesanan anda jika, pesanan yang anda pesan/booking dalam bentuk pembayaran (<b>DP/Lunas</b>)
                                tidak di bayar sesuai waktu yang ditentukan.
                                <br><br>
                                Atas perhatian dan kerjasamanya kami ucapkan TERIMAKASIH
                            </b>
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead"><b>Rincian Total</b></p>

                        <div class="table-responsive">
                            <table class="table">
                                <?php
                                $total_belanja  = 0;

                                foreach ($detail as $ttl) :
                                    $subtotal =  $ttl->harga_tenant;
                                    $total_belanja += $subtotal;

                                    $total_bayar = $ttl->total_bayar;
                                    $sisa_bayar = $total_belanja - $total_bayar;
                                endforeach;
                                ?>
                                <tr>
                                    <th style="width:50%">Total Belanja </th>
                                    <td><?= ":" ?> Rp. <?= number_format($total_belanja, 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Total Bayar </th>
                                    <td><?= ":" ?> Rp. <?= number_format($total_bayar, 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Sisa Pembayaran </th>
                                    <td><?= ":" ?> Rp. <?= number_format($sisa_bayar, 0, ',', '.'); ?></td>
                                </tr>
                                <tr>
                                    <th style="width:50%">Bank</th>
                                    <td><?= ":" ?> <?= $ttl->bank ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
            </div>
            <!-- Batas Memasukan Konten -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?= base_url() ?>assets/dist/js/demo.js"></script>
    <!-- jQuery UI -->
    <script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Ekko Lightbox -->
    <script src="<?= base_url() ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
    <!-- Filterizr-->
    <script src="<?= base_url() ?>assets/plugins/filterizr/jquery.filterizr.min.js"></script>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>