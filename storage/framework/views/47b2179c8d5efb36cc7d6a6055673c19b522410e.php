<?php $__env->startSection('header-content'); ?>
    <div class="row mt-3">

        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-warning">
                                    <i class="ti ti-users"></i>
                                </div>
                                <div class="ms-3">
                                    <h6 class="text-muted"><?php echo e(__('Total Users')); ?></h6>
                                    <h6 class="text-muted"><?php echo e(__('Paid Users')); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h4 class="m-0"><?php echo e($ownersCount); ?></h4>
                            <h4 class="m-0"><?php echo e($paidOwnersCount); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-danger">
                                    <i class="ti ti-chart-pie"></i>
                                </div>
                                <div class="ms-3">

                                    <h6 class="text-muted"><?php echo e(__('Total Orders')); ?></h6>
                                    <h6 class="text-muted"><?php echo e(__('Total Order Amount')); ?></h6>

                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h4 class="m-0"><?php echo e($ordersCount); ?></h4>
                            <h4 class="m-0"><?php echo e($ordersPrice); ?></h4>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="d-flex align-items-center">
                                <div class="theme-avtar bg-primary">
                                    <i class="ti ti-database"></i>
                                </div>
                                <div class="ms-3">

                                    <h6 class="text-muted"><?php echo e(__('Total Plans')); ?></h6>
                                    <h6 class="text-muted"><?php echo e(__('Most Purchased Plan')); ?></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto text-end">
                            <h4 class="m-0"><?php echo e($plansCount); ?></h4>
                            <h4 class="m-0"><?php echo e($mostPurchasedPlan); ?></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row ">
                        <div class="col-11">
                            <h5><?php echo e(__('Last 14 Days')); ?></h5>
                        </div>
                        <div class="col-1">
                            <h6><?php echo e(__('Order Report')); ?></h6>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="order-chart"></div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title'); ?>
    <div class="d-inline-block">
        <h5 class="h4 d-inline-block font-weight-400 mb-0"><?php echo e(__('Dashboard')); ?></h5>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startPush('scripts'); ?>
    <script src="<?php echo e(asset('assets/js/plugins/apexcharts.min.js')); ?>"></script>

    <script>
        (function() {
            var options = {

                series: [{
                    name: '<?php echo e(__('Order')); ?>',
                    data: <?php echo json_encode($getOrderChart['data']); ?>

                }, ],

                chart: {
                    height: 150,
                    type: 'area',
                    dropShadow: {
                        enabled: true,
                        color: '#000',
                        top: 18,
                        left: 7,
                        blur: 10,
                        opacity: 0.2
                    },
                    toolbar: {
                        show: false,
                    },
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    width: 2,
                    curve: 'smooth'
                },

                title: {
                    text: '',
                    align: 'left'
                },

                xaxis: {
                    categories: <?php echo json_encode($getOrderChart['label']); ?>,
                    title: {
                        text: 'Days'
                    }
                },

                colors: ['#ffa21d', '#FF3A6E'],

                grid: {
                    strokeDashArray: 4,
                },
                legend: {
                    show: false,
                },
                markers: {
                    size: 4,
                    colors: ['#ffa21d', '#FF3A6E'],
                    opacity: 0.9,
                    strokeWidth: 2,
                    hover: {
                        size: 7,
                    }
                },
                yaxis: {
                    title: {
                        text: 'Amount'
                    },
                }
            };
            var chart = new ApexCharts(document.querySelector("#order-chart"), options);
            chart.render();
        })();
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\wetransfer_scripts-to-install-onn-your-local-machine_2022-05-23_0954\posgo\main_file\resources\views/sa-dashboard.blade.php ENDPATH**/ ?>