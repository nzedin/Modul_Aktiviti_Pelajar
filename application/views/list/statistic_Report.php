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
    <!-- jQuery UI CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
            <!-- PIE CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Pie Chart</h3>
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
                <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>

            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Donut Chart</h3>
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
                <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <!-- BAR CHART -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Bar Chart</h3>
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
                <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>

            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>
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
                <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

<script src="<?= base_url('dist/temp')?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('dist/temp')?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('dist/temp')?>/plugins/chart.js/Chart.min.js"></script>
<!-- jQuery UI -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
  $(document).ready(function() {
    $('#generateReportBtn').on('click', function() {
      var month = $('#monthDropdown').val();
      var year = $('#yearDropdown').val();
      var date = `${year}-${month}`;

      fetch(`/controller/statistic/${warga}/${date}`)
        .then(response => response.json())
        .then(data => {
          // Update charts with new data
          updatePieChart(data.json_total_registered_students, data.json_total_attendance);
          updateDonutChart(data.json_financial_aid);
          updateBarChart(data.json_programs_by_category);
          updateLineChart(data.json_attendance_trends);
        });
    });

    function updatePieChart(totalStudents, totalAttendance) {
      var ctx = $('#pieChart').get(0).getContext('2d');
      new Chart(ctx, {
        type: 'pie',
        data: {
          labels: ['Total Registered Students', 'Total Attendance'],
          datasets: [{
            data: [totalStudents, totalAttendance],
            backgroundColor: ['#FF6384', '#36A2EB']
          }]
        }
      });
    }

    function updateDonutChart(financialAid) {
      var ctx = $('#donutChart').get(0).getContext('2d');
      new Chart(ctx, {
        type: 'doughnut',
        data: {
          labels: ['Bantuan Kewangan HEPA', 'Dana Tabung Amanah', 'Total Cost'],
          datasets: [{
            data: [financialAid.bantuanKewanganHEPA, financialAid.danaTabungAmanah, financialAid.totalCost],
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
          }]
        }
      });
    }

    function updateBarChart(programsByCategory) {
      var ctx = $('#barChart').get(0).getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: programsByCategory.map(program => program.categoryName),
          datasets: [{
            data: programsByCategory.map(program => program.program_count),
            backgroundColor: '#36A2EB'
          }]
        }
      });
    }

    function updateLineChart(attendanceTrends) {
      var ctx = $('#lineChart').get(0).getContext('2d');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: attendanceTrends.map(trend => trend.submission_date),
          datasets: [{
            data: attendanceTrends.map(trend => trend.total_attendance),
            backgroundColor: '#FF6384',
            fill: false
          }]
        }
      });
    }
  });
</script>
</body>
</html>
