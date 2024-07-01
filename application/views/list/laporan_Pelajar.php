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
              <li class="breadcrumb-item">Laporan(Pelajar)</li>
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
            <h3 class="card-title">Senarai Ulasan Laporan Program</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          <div class="card-footer">
            <div style="text-align: center;">
              <input type="hidden" id="searchInput" value="">
              <button onclick="search('Proses')" id="button2" class="btn btn-warning" style="width:15%;border-radius:0%;"><i class="fa fa-spinner"></i>  Proses Kelulusan</button>
              <button onclick="search('Dilulus')" id="button3" class="btn btn-success" style="width:15%;border-radius:0%;"><i class="fa fa-check"></i> Diluluskan</button>
              <button onclick="search('Tidak')" id="button4" class="btn btn-danger" style="width:15%;border-radius:0%;"><i class="fa fa-exclamation-circle"></i> Tidak Lulus</button>
            </div>
          </div>


          <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                      <table id="example1" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Badan Pelajar</th>
                                <th style="text-align: center;">Aktiviti</th>
                                <th style="text-align: center;">Tarikh Hantar Permohonan</th>
                                <th style="text-align: center;">Status Program</th>
                                <th style="text-align: center;">Tarikh Aktiviti</th>
                                <th style="text-align: center;">Tempat</th>
                                <th style="text-align: center;">Tarikh Hantar Laporan</th>
                                <th style="text-align: center;">Ulasan Laporan</th>
                                <th style="text-align: center;">Kelulusan</th>
                                <th style="text-align: center;">Cetak Ulasan Laporan</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                            <?php $no = 1; foreach($laporan as $list): ?>
                                <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($list->clubName)) ?></td>
                                  <td><?= ucwords(strtolower($list->programName)) ?></td>
                                  <td style="text-align: center;"><?= $list->dateApply ?></td>
                                  <td <?php if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) { echo 'style="background-color: #3ae965;text-align: center;"';}else{echo 'style="background-color: #90daff;text-align: center;"';}?>>
                                  <?php
                                    if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) {
                                      echo "Selesai";
                                    }
                                    else{
                                      echo 'Belum Selesai';
                                    } 
                                  ?>
                                  </td>
                                  <td style="text-align: center;"><?= $list->startDate ?><br>-<br><?= $list->endDate ?></td>
                                  <td><?= ucwords(strtolower($list->programLocation)) ?>, <br><?= ucwords(strtolower($list->stateName)) ?></td>
                                  <td style="text-align: center;"><?= $list->dateSubmission ?></td>
                                  <td style="text-align: center;"><?php
                                      if ($list->comment == null) {
                                        echo "<span class='badge badge-secondary'>Tiada Maklumat</span>";
                                      }
                                      else{
                                        echo ucwords(strtolower($list->comment));
                                      } 
                                    ?>
                                  </td>
                                  <td style="text-align: center;"> 
                                    <?php
                                      if ($list->statusApproval == 2) {
                                        echo "<span class='badge badge-warning'>Proses Kelulusan</span>";
                                      }
                                      else if ($list->statusApproval == 3){
                                        echo "<span class='badge badge-success'> Diluluskan</span>";
                                      } else {
                                        echo "<span class='badge badge-danger'> Tidak Lulus</span>";
                                      }
                                    ?>
                                  </td>
                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                      <a href="<?= base_url($list->statusApproval == 2 ? 'laporan/laporanProgramID/' . $warga . '/' . $list->laporanID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
                                      </div>
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
    </section>   
  </div>

  	
  <script>
    function search(input) {
        // Update the hidden input value
        document.getElementById('searchInput').value = input.toLowerCase();

        // Get table rows
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
            
            // Check only the 5th column (index 4)
            var cell = rows[i].cells[9];
            if (cell.innerText.toLowerCase().indexOf(input.toLowerCase()) > -1) {
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
  </script>