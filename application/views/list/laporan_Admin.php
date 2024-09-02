<head>

    <style>
        p {
            padding: 6px;
        }
        .modal#statusErrorsModal .modal-content,
        .modal#updateRemark .modal-content {
            border-radius: 30px;
        }
        .modal#statusErrorsModal .modal-content svg ,
        .modal#updateRemark .modal-content svg {
            width: 100px; 
            display: block; 
            margin: 0 auto;
            
        }
        .modal#statusErrorsModal .modal-content .path,
        .modal#updateRemark .modal-content .path {
            stroke-dasharray: 1000; 
            stroke-dashoffset: 0;
        }
        .modal#statusErrorsModal .modal-content .path.circle,
        .modal#updateRemark .modal-content .path.circle  {
            -webkit-animation: dash 0.9s ease-in-out; 
            animation: dash 0.9s ease-in-out;
        }
        .modal#statusErrorsModal .modal-content .path.line,
        .modal#updateRemark .modal-content .path.line {
            stroke-dashoffset: 1000; 
            -webkit-animation: dash 0.95s 0.35s ease-in-out forwards; 
            animation: dash 0.95s 0.35s ease-in-out forwards;
        }
        .modal#statusErrorsModal .modal-content .path.check ,
        .modal#updateRemark .modal-content .path.check {
            stroke-dashoffset: -100; 
            -webkit-animation: dash-check 0.95s 0.35s ease-in-out forwards; 
            animation: dash-check 0.95s 0.35s ease-in-out forwards;
        }

        @-webkit-keyframes dash { 
            0% {
                stroke-dashoffset: 1000;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes dash { 
            0% {
                stroke-dashoffset: 1000;
            }
            100%{
                stroke-dashoffset: 0;
            }
        }
        @-webkit-keyframes dash { 
            0% {
                stroke-dashoffset: 1000;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes dash { 
            0% {
                stroke-dashoffset: 1000;}
            100% {
                stroke-dashoffset: 0;
            }
        }
        @-webkit-keyframes dash-check { 
            0% {
                stroke-dashoffset: -100;
            }
            100% {
                stroke-dashoffset: 900;
            }
        }
        @keyframes dash-check {
            0% {
                stroke-dashoffset: -100;
            }
            100% {
                stroke-dashoffset: 900;
            }
        }
        .box00{
            width: 100px;
            height: 100px;
            border-radius: 50%;
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

    <?php if($page == "catatan"): ?>

      <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Catatan Laporan <?= ucwords(strtolower($laporanID->PROGRAMNAME)); ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>

          <div class="card-body">
              
              <form id="reportForm" action="<?= base_url('laporan/update_remark/'.$laporanID->LAPORANID)?>" method="POST">
  
              <input type="hidden" id="laporanID" name="laporanID" value="<?= $laporanID->LAPORANID ?>">

              <div class="form-group row">
                  <div class="col-sm-2">
                      <label for="remark" class="float-right">Remark</label>
                  </div>
                  <div class="col-sm-1">
                      <p>:</p>
                  </div>
                  <div class="col-sm-7">
                      <textarea class="form-control" id="remark" name="remark" placeholder="Ulasan" required><?= $laporanID->REMARK ?></textarea>
                  </div>
              </div>
           
                  <div class="card-footer">
                    <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i>   Reset</button>
                    <button type="submit" id="submit-simpan" class="btn btn-info"><i class="fas fa-save"></i>   Simpan</button>
                  </div>

            </form>
          </div> 
        </div>
      </div>

                    <div class="modal fade" id="updateRemark" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-body text-center p-lg-4"> 
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                        <circle class="path circle" fill="none" stroke="#198754" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                        <polyline class="path check" fill="none" stroke="#198754" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " /> 
                                    </svg> 
                                    <h4 class="text-success mt-3">Laporan Berjaya Dikemaskini!</h4> 
                                    <button onclick="window.location.href = '<?= base_url('laporan/laporan_admin/rekod_laporan/'.$warga)?>'"  class="btn btn-success" style="margin: 10px;width:50%;" data-bs-dismiss="modal">Selesai</button> 

                                </div> 
                            </div> 
                        </div> 
                    </div>
                    <div class="modal fade" id="statusErrorsModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
                      <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
                          <div class="modal-content"> 
                              <div class="modal-body text-center p-lg-4"> 
                                  <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                      <circle class="path circle" fill="none" stroke="#db3646" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" /> 
                                      <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3" />
                                      <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" X2="34.4" y2="92.2" /> 
                                  </svg> 
                                  <h4 class="text-danger mt-3">Laporan Tidak Berjaya Dikemaskini!</h4> 
                                  <button type="button" class="btn btn-sm mt-3 btn-danger" data-bs-dismiss="modal">Ok</button> 
                              </div> 
                          </div> 
                      </div> 
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"></script>
            <script>
               $(document).ready(function() {
                $('#reportForm').on('submit', function(event) {
                    event.preventDefault(); 

                        $.ajax({
                            url: $(this).attr('action'),
                            method: $(this).attr('method'),
                            data: $(this).serialize(),
                            success: function(response) {
                                    $('#updateRemark').modal('show');
                              
                            },
                            error: function(xhr, status, error) {
                                // Handle the error
                                $('#statusErrorsModal').modal('show'); 
                                alert('There was an error submitting the form: ' + error);
                            }
                        });
                    
                });
              });
            </script>
    </section>                     
    <?php else: ?>
    
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
                                  <td><?= ucwords(strtolower($list->CLUBNAME)) ?></td>
                                  <td><?= ucwords(strtolower($list->PROGRAMCATEGORYNAME)) ?></td>
                                  <td style="text-align: center;"><?=  date('d/m/Y', strtotime($list->DATEAPPLY)) ?></td>
                                  <td><?= ucwords(strtolower($list->PROGRAMNAME)) ?></td>
                                  <td style="text-align: center;"><?=  date('d/m/Y', strtotime($list->STARTDATE)) ?></td>
                                  <td style="text-align: center;"><?=  date('d/m/Y', strtotime($list->ENDDATE)) ?></td>
                                  <td style="text-align: center;"><?= $list->PERIOD ?></td>
                                  <td><?= ucwords(strtolower($list->PROGRAMLOCATION)) ?>, <br><?= ucwords(strtolower($list->STATENAME)) ?></td>
                                  <td style="text-align: center;"><?=  date('d/m/Y', strtotime($list->DATEAPPROVED)) ?></td>
                                  <td style="text-align: center;"><?= $list->BANTUANKEWANGANHEPA ?></td>
                                  <td style="text-align: center;"><?= $list->DANATABUNGAMANAH ?></td>
                                  <td style="text-align: center;"><?= $list->TOTAL ?></td>
                                  <td style="text-align: center;"><?=  date('d/m/Y', strtotime($list->DATESUBMISSION)) ?></td>
                                  <td style="text-align: center;"><?= $list->TOTALCOST ?></td>
                                  <td style="text-align: center;"><?= ucwords(strtolower($list->STUDENTNAME)) ?></td>
                                  <td style="text-align: center;"><?= $list->STUDENTID ?></td>
                                  <td style="text-align: center;"><?= $list->PHONENO ?></td>
                                  <td style="text-align: center;">
                                    <a href="<?= base_url('laporan/catatan_rekod_laporan/catatan/' . $warga . '/' . $list->LAPORANID) ?>"><img src="<?= base_url('img/catatan.png') ?>" alt="icon" style="width:30px"></a>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', (event) => {
        const monthDropdown = document.getElementById('monthDropdown');
        const yearDropdown = document.getElementById('yearDropdown');
        
        const months = [
          'Januari', 'Februari', 'Mac', 'April', 'Mei', 'Jun',
          'Julai', 'Ogos', 'September', 'Oktober', 'November', 'Disember'
        ];
        
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();
        
        months.forEach((month, index) => {
          const option = document.createElement('option');
          option.value = index + 1;
          option.textContent = month;
          if (index === currentMonth) {
            option.selected = true;
          }
          monthDropdown.appendChild(option);
        });
        
        for (let year = 1997; year <= currentYear; year++) {
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

          var noDataRow = document.getElementById('no-data-row');
          if (noDataRow) {
              noDataRow.remove();
          }

          var anyRowDisplayed = false;

          for (var i = 0; i < rows.length; i++) {
              var shouldDisplay = false;

              var dateSubmission = rows[i].cells[13].innerText.trim();

              var parts = dateSubmission.split('/');
              var submissionDay = parseInt(parts[0], 10); 
              var submissionMonth = parseInt(parts[1], 10); 
              var submissionYear = parseInt(parts[2], 10); 

              if (submissionMonth == month && submissionYear == year) {
                  shouldDisplay = true;
              }

              rows[i].style.display = shouldDisplay ? "" : "none";
              if (shouldDisplay) {
                  anyRowDisplayed = true;
              }
          }


          if (!anyRowDisplayed) {
              var newRow = tableBody.insertRow();
              newRow.id = 'no-data-row';
              var newCell = newRow.insertCell(0);
              newCell.colSpan = tableBody.rows[0].cells.length; 
              newCell.innerText = "Tiada Maklumat Data";
              newCell.style.textAlign = "center";
          }

          
      }

  </script>

  <?php endif ?>  
  </div>
</body>
  