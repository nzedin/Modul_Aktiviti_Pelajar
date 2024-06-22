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
            <h3 class="card-title">Peringatan Muatnaik Laporan Aktiviti</h3>

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
                                <th style="text-align: center;">Peringatan (email kepada Pengarah/SU)</th>
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
                                  <td style="text-align: center;">
                                      email
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

  	