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
                    <div class="col">
                        <!-- Batas Konten -->


                        <h3 class="m-0 text-dark mb-3 mt-3">Dashboard Admin</h3>
                        <!-- Main content -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-primary">
                                    <div class="inner">
                                        <h3><?= $customer ?> <sup style="font-size: 15px">Customers</sup></h3>

                                        <p>Data Customer</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-user-tie"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-pink">
                                    <div class="inner">
                                        <h3><?= $tenant ?> <sup style="font-size: 15px">Tenants</sup></h3>

                                        <p>Data Tenant</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-tasks" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-secondary">
                                    <div class="inner">
                                        <h3><?= $photographer ?> <sup style="font-size: 15px">Photographer</sup></h3>

                                        <p>Data Photographer</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-camera-retro" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-warning">
                                    <div class="inner">
                                        <h3><?= $makeup ?> <sup style="font-size: 15px">Makeup Artist</sup></h3>

                                        <p>Data Makeup Artist</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-light">
                                    <div class="inner">
                                        <h3><?= $endorse ?> <sup style="font-size: 15px">Endorse</sup></h3>
                                        <p>Data Endorse</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-danger">
                                    <div class="inner">
                                        <h3><?= $member ?> <sup style="font-size: 15px">Members</sup></h3>

                                        <p>Data Member</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-info">
                                    <div class="inner">
                                        <h3><?= $order ?> <sup style="font-size: 15px">Orders</sup></h3>

                                        <p>Data Order</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-gradient-success">
                                    <div class="inner">
                                        <h3><?= $payment ?> <sup style="font-size: 15px">Payments</sup></h3>

                                        <p>Data Payment</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-hand-holding-usd" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 card-pink">
                                <div class="card-header text-center">
                                    <h3 class="card-title">Diagram Simtotis</h3>
                                </div>
                                <div class="card-body">
                                    <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>

                            </div>
                            <!-- Main content -->
                        </div>
                        <!-- Batas Konten -->
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

            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

            var donutData = {
                labels: [
                    'Customer',
                    'Tenant',
                    'Photographer',
                    'Makeup Artist',
                    'Endorse',
                    'Member',
                    'Order',
                    'Payment'
                ],
                datasets: [{
                    data: [<?= $customer ?>, <?= $tenant ?>, <?= $photographer ?>, <?= $makeup ?>, <?= $endorse ?>, <?= $member ?>, <?= $order ?>, <?= $payment ?>],
                    backgroundColor: ['#187cf5', '#eb57c6', '#919090', '#fcd01c', '#f5f5f5', '#f51439', '#2aa0b5', '#2ab54a'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })
        })
    </script>
    <!-- page script -->
</body>

</html>