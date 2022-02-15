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
                    <div class="col">
                        <!-- Batas Konten -->

                        <h3 class="m-0 text-dark mb-3 mt-3">Data Tenant Photographer</h3>


                        <table class="table table-hover" id="example1">
                            <thead>
                                <tr align="center">
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Tenant</th>
                                    <th scope="col">Nama Tenant</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Tanggal Keluar</th>
                                    <th scope="col">Status Aktif</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($photographer as $pht) :
                                ?>
                                    <tr>
                                        <th scope="row" align="center"><?= $no++ ?></th>
                                        <td align="center"><?= $pht->kode_tenant; ?></td>
                                        <td><?= $pht->nama_tenant; ?></td>
                                        <td align="center"><?= $pht->tanggal_masuk; ?></td>
                                        <td align="center"><?= $pht->tanggal_keluar; ?></td>
                                        <td align="center"><?= $pht->keterangan; ?></td>
                                        <td align="center">
                                            <a href="<?= base_url() . 'member/c_member/detail_photographer/' . $pht->kode_tenant; ?>" class="btn btn-sm btn-success"><i class="fas fa-info-circle bg-success"></i></a>
                                            <a class="btn btn-sm btn-warning" href="<?= base_url() . 'member/c_member/edit_photographer/' . $pht->kode_tenant; ?>"><i class="fas fa-edit bg-warning"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- Batas Konten -->
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