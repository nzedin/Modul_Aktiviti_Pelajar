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
         
          <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div style="overflow-x: auto;">
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
                                <th colspan="3">Kelulusan Peruntukan</th>
                                <th rowspan="2">Tarikh Laporan Diterima</th>
                                <th rowspan="2">Kos Keseluruhan Program (RM)</th>
                                <th colspan="3">Pengarah Program</th>
                                <th rowspan="2">Catatan</th>
                            </tr>
                            <tr>
                            
                                <th>Mula</th>
                                <th>Tamat</th>
                                <th>Bilangan Hari</th>
                                <th>HEPA (RM)</th>
                                <th>Sumbangan Luar (RM)</th>
                                <th>Jumlah (RM)</th>
                                <th>Nama</th>
                                <th>No. Matrik</th>
                                <th>No. Telefon</th>
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
                                  <td style="text-align: center;">-</td>
                                  <td style="text-align: center;"><?= $list->bantuanKewanganHEPA ?></td>
                                  <td style="text-align: center;"><?= $list->danaTabungAmanah ?></td>
                                  <td style="text-align: center;"><?= $list->total ?></td>
                                  <td style="text-align: center;"><?= $list->dateSubmission ?></td>
                                  <td style="text-align: center;">-</td>
                                  <td style="text-align: center;"><?= ucwords(strtolower($list->studentName)) ?></td>
                                  <td style="text-align: center;"><?= $list->studentID ?></td>
                                  <td style="text-align: center;"><?= $list->phoneNo ?></td>
                                  <td></td>
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