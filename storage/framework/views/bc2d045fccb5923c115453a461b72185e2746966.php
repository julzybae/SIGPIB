<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('breadcrumb'); ?>

    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php $__env->startSection('navbar'); ?>
    <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>


<br>

<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">

        <div class="card card-default">

            <div class="card-body">
                <div class="row justify-content-center">

                    <!-- Card -->
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?php echo e($anggota->count()); ?></h3>
                                <p>Jumlah Anggota Jemaat</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="<?php echo e(route('anggota.index')); ?>" class="small-box-footer">Info lebih lanjut <i
                                    class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- Card -->

                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->
        </div>
    </div>

</div>


<div class="row">

    <div class="col-md-12">

        <div class="row">

            <div class="col-md-6">
                <div class="card">
                    <div id="jk"></div>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card">
                    <div id="goldar"></div>
                </div>

            </div>

        </div>
    </div>

</div>

<div class="row">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="grafik"></div>
                </div>

            </div>
        </div>
    </div>

</div>




<script src="/highcharts/highcharts.js"></script>



<script>
    Highcharts.chart('jk', {
        //  navigation: {
        //      buttonOptions: {
        //          enabled: false
        //      }
        // },
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Jenis Kelamin'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Jenis Kelamin',
            colorByPoint: true,
            data: [{
                name: 'Laki-laki ( <?php echo e($anggota->where('jk', 'Laki-laki')->count()); ?> )',
                y: <?php echo e($anggota->where('jk', 'Laki-laki')->count()); ?>,
            }, {
                name: 'Perempuan ( <?php echo e($anggota->where('jk', 'Perempuan')->count()); ?> )',
                y: <?php echo e($anggota->where('jk', 'Perempuan')->count()); ?>

            }]
        }]
    });
</script>



<script>
    Highcharts.chart('goldar', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Golongan Darah'
        },
        xAxis: {
            categories: [
                '<a target="_blank" title="Unduh" href="<?php echo e(route('dashboard.download_goldara_pdf')); ?>"> Goldar A<br/> ( <?php echo e($anggota->where('goldar', 'A')->count()); ?> )</a>',
                '<a target="_blank" title="Unduh" href="<?php echo e(route('dashboard.download_goldarb_pdf')); ?>"> Goldar B<br/> ( <?php echo e($anggota->where('goldar', 'B')->count()); ?> )</a>',
                '<a target="_blank" title="Unduh" href="<?php echo e(route('dashboard.download_goldaro_pdf')); ?>"> Goldar O<br/> ( <?php echo e($anggota->where('goldar', 'O')->count()); ?> )</a>',
                '<a target="_blank" title="Unduh" href="<?php echo e(route('dashboard.download_goldarab_pdf')); ?>"> Goldar AB<br/> ( <?php echo e($anggota->where('goldar', 'AB')->count()); ?> )</a>'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Anggota Per Golongan Darah'
            }
        },
        tooltip: {
            headerFormat: '<table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>&nbsp{point.y:.f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah Anggota Per Golongan Darah',
            data: [
                <?php echo e($anggota->where('goldar', 'A')->count()); ?>,
                <?php echo e($anggota->where('goldar', 'B')->count()); ?>,
                <?php echo e($anggota->where('goldar', 'O')->count()); ?>,
                <?php echo e($anggota->where('goldar', 'AB')->count()); ?>

            ]
        }],

    });
</script>



<script>
    var bulan = <?php echo json_encode($bulan); ?>;
    var total_anggota = <?php echo json_encode($total_anggota); ?>

    Highcharts.chart('grafik', {
        title: {
            text: 'Grafik Anggota Jemaat Masuk Bulanan </br> Tahun <?php echo e(date('Y')); ?>'
        },
        xAxis: {
            categories: bulan
        },
        yAxis: {
            title: {
                text: 'Jumlah Anggota Jemaat'
            }
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Jumlah Anggota Jemaat Masuk Bulanan',
            data: total_anggota
        }]
    })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SIGPIB\resources\views/dashboard/anggota/index.blade.php ENDPATH**/ ?>