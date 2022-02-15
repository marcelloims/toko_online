<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_partial_member/header'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- ./wrapper -->
    <div class="wrapper">
        <?php $this->load->view('_partial_member/navbar'); ?>
        <?php $this->load->view('_partial_member/sidebar'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col mt-3">
                        <!-- Batas Memasukan Konten -->
                        <h4>Data Pemesanan Anda</h4>
                        <table class="table table-bordered table-hover table-striped mt-5" id="example1">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>No Invoice</th>
                                    <th>Kode Pembayaran</th>
                                    <th>Tanggal Pesanan</th>
                                    <th>Tanggal Invoice</th>
                                    <th>Status Pesanan</th>
                                    <th>Nama Pelanggan</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pesanan as $psn) : ?>
                                    <tr>
                                        <td align="center"><?= $no++; ?></td>
                                        <td align="center"><?= $psn->no_invoice; ?></td>
                                        <td align="center"><?= $psn->kode_pembayaran; ?></td>
                                        <td align="center"><?= $psn->tanggal_pesanan; ?></td>
                                        <td align="center"><?= $psn->tanggal_invoice; ?></td>
                                        <td align="center"><?= $psn->status_pesanan; ?></td>
                                        <td align="center"><?= $psn->nama_pemesan; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url() . 'invoice/c_invoice/detail_pesanan_member/' . $psn->no_invoice ?>" class="btn btn-sm btn-info"><i class="fas fa-info-circle bg-info"></i></a>
                                            <a href="<?= base_url() . 'invoice/c_invoice/print_invoice/' . $psn->no_invoice; ?>" class="btn btn-sm btn-light"><i class="fas fa-print bg-light"></i></a>
                                            <a href="<?= base_url() . 'invoice/c_invoice/reject_pesanan/' . $psn->no_invoice; ?>" class="btn btn-sm btn-warning"><i class="fa fa-shield bg-warning"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- Batas Memasukan Konten -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Content Wrapper. Contains page content -->
        <?php $this->load->view('_partial_member/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- page script -->
    <?php $this->load->view('_partial_member/js'); ?>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });
    </script>
    <!-- page script -->
</body>

</html>