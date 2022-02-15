<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('_partial_admin/header'); ?>
</head>

<body class="hold-transition sidebar-mini">
    <!-- ./wrapper -->
    <div class="wrapper">
        <?php $this->load->view('_partial_admin/navbar'); ?>
        <?php $this->load->view('_partial_admin/sidebar'); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col mt-5">
                        <!-- Batas Memasukan Konten -->
                        <h4>Invoice Pembayaran</h4>

                        <table class="table table-bordered table-hover table-striped" id="example1">
                            <thead>
                                <tr align="center">
                                    <th>No</th>
                                    <th>Kode</th>
                                    <th>No Invoice</th>
                                    <th>Harga Tenant</th>
                                    <th>Total Pembayaran</th>
                                    <th>Bukti Pembayaran</th>
                                    <th width="100px">Bank</th>
                                    <th>Status Pembayaran</th>
                                    <th width="100px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($pembayaran as $byr) : ?>
                                    <tr>
                                        <td align="center"><?= $no++; ?></td>
                                        <td align="center"><?= $byr->kode_pembayaran; ?></td>
                                        <td align="center"><?= $byr->no_invoice; ?></td>
                                        <td align="right">Rp. <?= number_format($byr->harga_tenant, 0, ',', '.'); ?></td>
                                        <td align="right">Rp. <?= number_format($byr->total_pembayaran, 0, ',', '.') ?></td>
                                        <td><?= $byr->bukti_pembayaran; ?></td>
                                        <td><?= $byr->bank; ?></td>
                                        <td><?= $byr->status_pembayaran; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url() . 'admin/c_admin/detail_member/' . $byr->kode_pembayaran; ?>" class="btn btn-sm btn-success"><i class="fas fa-info-circle bg-success"></i></a>

                                            <a href="<?= base_url() . 'admin/c_admin/edit_member/' . $byr->kode_pembayaran; ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit bg-warning"></i></a>

                                            <a href="<?= base_url() . 'admin/c_admin/hapus_member/' . $byr->kode_pembayaran; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda Yakin Ingin HAPUS Data ini?')"><i class="fas fa-trash bg-red"></i></a>
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
        <?php $this->load->view('_partial_admin/footer'); ?>
    </div>
    <!-- ./wrapper -->

    <!-- page script -->
    <?php $this->load->view('_partial_admin/js'); ?>
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