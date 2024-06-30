<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('dist/temp')?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dist/temp')?>/dist/css/adminlte.min.css">   
</head>
<body>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Admin</li>
                        <li class="breadcrumb-item">Laporan(Admin)</li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Bantuan Kewangan</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="financialAidChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- PIE CHART -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Jumlah Program Mengikut Kategori</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="categoryChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col (LEFT) -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
</div>
<script src="<?= base_url('dist/temp')?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('dist/temp')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('dist/temp')?>/plugins/chart.js/Chart.min.js"></script>

<script>
$(function () {
    // Fetch the data passed from the controller
    var laporanData = <?= $json_laporan ?>;
    
    // Prepare data for the financial aid chart
    var labels = [];
    var financialAidData = [];
    laporanData.forEach(function(item) {
        labels.push(item.programName);
        financialAidData.push(item.bantuanKewanganHEPA + item.danaTabungAmanah);
    });

    var financialAidChartCanvas = $('#financialAidChart').get(0).getContext('2d');
    var financialAidChartData = {
        labels: labels,
        datasets: [{
            label: 'Jumlah Bantuan Kewangan',
            backgroundColor: 'rgba(60,141,188,0.9)',
            borderColor: 'rgba(60,141,188,0.8)',
            pointRadius: false,
            pointColor: '#3b8bba',
            pointStrokeColor: 'rgba(60,141,188,1)',
            pointHighlightFill: '#fff',
            pointHighlightStroke: 'rgba(60,141,188,1)',
            data: financialAidData
        }]
    };

    var financialAidChartOptions = {
        maintainAspectRatio: false,
        responsive: true,
        legend: {
            display: true
        },
        scales: {
            xAxes: [{
                gridLines: {
                    display: false
                }
            }],
            yAxes: [{
                gridLines: {
                    display: false
                }
            }]
        }
    };

    new Chart(financialAidChartCanvas, {
        type: 'line',
        data: financialAidChartData,
        options: financialAidChartOptions
    });

    // Prepare data for the category chart
    var categoryCounts = {};
    laporanData.forEach(function(item) {
        var category = item.programCategoryID;
        if (categoryCounts[category]) {
            categoryCounts[category]++;
        } else {
            categoryCounts[category] = 1;
        }
    });

    var categoryLabels = Object.keys(categoryCounts);
    var categoryData = Object.values(categoryCounts);

    var categoryChartCanvas = $('#categoryChart').get(0).getContext('2d');
    var categoryChartData = {
        labels: categoryLabels,
        datasets: [{
            label: 'Jumlah Program Mengikut Kategori',
            backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            data: categoryData
        }]
    };

    var categoryChartOptions = {
        maintainAspectRatio: false,
        responsive: true
    };

    new Chart(categoryChartCanvas, {
        type: 'pie',
        data: categoryChartData,
        options: categoryChartOptions
    });
});
</script>
</body>
</html>
