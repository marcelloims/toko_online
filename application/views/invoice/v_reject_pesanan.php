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
                    <!-- Batas Memasukan Konten -->
                    <h4>Reject Orders</h4>
                    <div class="container mt-5">
                        <table class="table table-striped" id="example1">
                            <thead>
                                <tr align="center">
                                    <th>#</th>
                                    <th>Produk</th>
                                    <th>Hargra</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Akhir</th>
                                    <th>Subtotal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
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
                                        <td align="center"><?= $psn->status_order ?></td>
                                        <?php if ($psn->status_order != 'Accept') : ?>
                                            <td>
                                                <form action="<?= base_url() ?>invoice/c_invoice/accept" method="post">
                                                    <input type="hidden" name="kode_tenant" value="<?= $psn->kode_tenant ?>">
                                                    <input type="hidden" name="kode_pembayaran" value="<?= $psn->kode_pembayaran; ?>">
                                                    <button type="submit" class="btn btn-success">√</button>
                                                    <a href="<?= base_url('invoice/c_invoice/reject/' . $psn->kode_tenant) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin Ingin REJECT pesanan ini?')"><i class="fa fa-minus-circle" aria-hidden="true"></i></a>
                                                </form>
                                            </td>
                                        <?php endif; ?>

                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                        <a href=" <?= base_url() ?>invoice/c_invoice/data_pesanan_member" class="btn btn-danger float-right"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></a>
                    </div>
                    <!-- Batas Memasukan Konten -->
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