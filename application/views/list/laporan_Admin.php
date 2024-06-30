<head>
    <style>
        th {
            text-align: center;
        }
      
    </style>
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

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Rekod Aktiviti Pelajar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-footer">
            <div style="text-align: left;">
            <div class="row">
              <div class="col-1">
                <label style="float:right;">Bulan: </label>
              </div>
              <div class="col-2">
                <select id="monthDropdown" class="select2bs4" style="width: 100%;"></select>
              </div>
              <div class="col-1">
                <label style="float:right;">Tahun: </label>
              </div>
              <div class="col-2">
                <select id="yearDropdown" class="select2bs4" style="width: 100%;"></select>
              </div>
              <div class="col-1">
                <button style="float:right;" onclick="search()" id="submitBtn" class="btn btn-info">
                  <i class="fas fa-search"></i> Cari
                </button>
              </div>
              <div class="col-2">
              <button style="float:left;" onclick="report()" id="generateReportBtn" class="btn btn-primary">
              <i class="fa fa-cogs"></i> Laporan Bulanan
                </button>
              </div>
            </div>
            </div>
          </div>       
          <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div>
                      <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th rowspan="2">No.</th>
                                <th rowspan="2">Penganjur/Persatuan</th>
                                <th rowspan="2">Kategori</th>
                                <th rowspan="2">Tarikh Terima Kertas Kerja</th>
                                <th rowspan="2">Program / Aktiviti</th>
                                <th colspan="3">Tarikh / Tempoh Program</th>
                                <th rowspan="2">Tempat</th>
                                <th rowspan="2">Tarikh Lulus</th>
                                <th colspan="3">Kelulusan Peruntukan (RM)</th>
                                <th rowspan="2">Tarikh Laporan Diterima</th>
                                <th rowspan="2">Jumlah Kos Program (RM)</th>
                                <th colspan="3">Pengarah Program</th>
                                <th rowspan="2">Catatan</th>
                            </tr>
                            <tr>
                            
                                <th>Mula</th>
                                <th>Tamat</th>
                                <th>Bil. Hari</th>
                                <th>HEPA</th>
                                <th>Sumbangan Luar</th>
                                <th>Jumlah</th>
                                <th>Nama</th>
                                <th>No.Matrik</th>
                                <th>No.Telefon</th>
                            </tr>
                        </thead>

                          
                          <tbody>
                            <?php $no = 1; foreach($laporan as $list): ?>
                                <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($list->clubName)) ?></td>
                                  <td><?= ucwords(strtolower($list->programCategoryName)) ?></td>
                                  <td style="text-align: center;"><?= $list->dateApply ?></td>
                                  <td><?= ucwords(strtolower($list->programName)) ?></td>
                                  <td style="text-align: center;"><?= $list->startDate ?></td>
                                  <td style="text-align: center;"><?= $list->endDate ?></td>
                                  <td style="text-align: center;"><?= $list->period ?></td>
                                  <td><?= ucwords(strtolower($list->programLocation)) ?>, <br><?= ucwords(strtolower($list->stateName)) ?></td>
                                  <td style="text-align: center;"><?= date('Y-m-d', strtotime($list->dateApproved)) ?></td>
                                  <td style="text-align: center;"><?= $list->bantuanKewanganHEPA ?></td>
                                  <td style="text-align: center;"><?= $list->danaTabungAmanah ?></td>
                                  <td style="text-align: center;"><?= $list->total ?></td>
                                  <td style="text-align: center;"><?= $list->dateSubmission ?></td>
                                  <td style="text-align: center;">-</td>
                                  <td style="text-align: center;"><?= ucwords(strtolower($list->studentName)) ?></td>
                                  <td style="text-align: center;"><?= $list->studentID ?></td>
                                  <td style="text-align: center;"><?= $list->phoneNo ?></td>
                                  <td style="text-align: center;">
                                    <a href="<?= base_url('laporan/laporanProgramID/' . $warga . '/' . $list->laporanID) ?>"><img src="<?= base_url('img/catatan.png') ?>" alt="icon" style="width:30px"></a>
                                  </td>
                                </tr>
                            <?php endforeach ?>
                          </tbody>
                      
                      </table>
                      </div>
                </div>
              </div>
            </div>
          </div> 
      </div>
    </section>   
  </div>
</body>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', (event) => {
      const monthDropdown = document.getElementById('monthDropdown');
      const yearDropdown = document.getElementById('yearDropdown');
      
      // Months array
      const months = [
        'Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun',
        'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'
      ];
      
      // Current date
      const currentDate = new Date();
      const currentYear = currentDate.getFullYear();
      const currentMonth = currentDate.getMonth();
      
      // Populate months dropdown
      months.forEach((month, index) => {
        const option = document.createElement('option');
        option.value = index + 1;
        option.textContent = month;
        if (index === currentMonth) {
          option.selected = true;
        }
        monthDropdown.appendChild(option);
      });
      
      // Populate years dropdown (2000 to current year)
      for (let year = 2000; year <= currentYear; year++) {
        const option = document.createElement('option');
        option.value = year;
        option.textContent = year;
        if (year === currentYear) {
          option.selected = true;
        }
        yearDropdown.appendChild(option);
      }

    });

    function search() {
        const month = document.getElementById('monthDropdown').value;
        const year = document.getElementById('yearDropdown').value;
        console.log(`Selected month: ${month}, Selected year: ${year}`);

        var tableBody = document.querySelector("table tbody");
        var rows = tableBody.rows;

        // Remove any existing "No data" row
        var noDataRow = document.getElementById('no-data-row');
        if (noDataRow) {
            noDataRow.remove();
        }

        var anyRowDisplayed = false;

        // Loop through all table rows
        for (var i = 0; i < rows.length; i++) {
            var shouldDisplay = false;

            // Extract dateSubmission from the table cell (assuming it's in YYYY-MM-DD format)
            var dateSubmission = rows[i].cells[13].innerText.trim();

            // Check if dateSubmission matches the selected month and year
            var submissionDate = new Date(dateSubmission);
            var submissionMonth = submissionDate.getMonth() + 1; // getMonth() returns zero-based month
            var submissionYear = submissionDate.getFullYear();

            if (submissionMonth == month && submissionYear == year) {
                shouldDisplay = true;
            }

            // Display or hide the row based on search result
            rows[i].style.display = shouldDisplay ? "" : "none";
            if (shouldDisplay) {
                anyRowDisplayed = true;
            }
        }

        // If no rows are displayed, insert a "No data" row
        if (!anyRowDisplayed) {
            var newRow = tableBody.insertRow();
            newRow.id = 'no-data-row';
            var newCell = newRow.insertCell(0);
            newCell.colSpan = tableBody.rows[0].cells.length; // Set the colspan to span all columns
            newCell.innerText = "Tiada Maklumat Data";
            newCell.style.textAlign = "center";
        }

        
    }

    function report() {
    const month = document.getElementById('monthDropdown').value;
    const year = document.getElementById('yearDropdown').value;
    console.log(`Selected month: ${month}, Selected year: ${year}`);
    const baseUrl = '<?= base_url('laporan/statistic/' . $warga) ?>';
    const selectedDate = `${year}-${month.toString().padStart(2, '0')}`;
    window.open(`${baseUrl}/${selectedDate}`);
}


  </script>


