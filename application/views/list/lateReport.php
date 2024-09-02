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
              <li class="breadcrumb-item">Laporan (Pelajar)</li>
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
            <h3 class="card-title">Sebab Kelewatan Laporan Dihantar</h3>

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
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center;">Tarikh Aktiviti</th>
                                  <th style="text-align: center;">Tempat/Negeri</th>
                                  <th style="text-align: center;">Tarikh Hantar Laporan</th>
                                  <th style="text-align: center;">Sebab Kelewatan</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                            <?php $no = 1; foreach($laporan as $list): ?>
                              <?php if (strtotime($list->ENDDATE) < strtotime('+15 days')):?>
                                  <tr>
                                      <td><?= $no++ ?></td>
                                      <td><?= ucwords(strtolower($list->CLUBNAME)) ?></td>
                                      <td><?= ucwords(strtolower($list->PROGRAMNAME)) ?></td>
                                      <td style="text-align: center;"><?= date('d/m/Y', strtotime($list->DATEAPPLY)) ?></td>
                                      <td style="text-align: center;"> 
                                        <?php
                                          if ($list->STATUSAPPROVAL == 2) {
                                            echo "<span class='badge badge-warning'>Proses Kelulusan</span>";
                                          }
                                          else if ($list->STATUSAPPROVAL == 3){
                                            echo "<span class='badge badge-success'> Lulus</span>";
                                          } else {
                                            echo "<span class='badge badge-danger'> Tidak Lulus</span>";
                                          }
                                        ?>
                                      </td>
                                      <td style="text-align: center;"><?= date('d/m/Y', strtotime($list->STARTDATE)) ?><br>-<br><?= date('d/m/Y', strtotime($list->ENDDATE)) ?></td>
                                      <td><?= ucwords(strtolower($list->PROGRAMLOCATION)) ?>, <br><?= ucwords(strtolower($list->STATENAME)) ?></td>
                                      <td style="text-align: center;"><?= date('d/m/Y', strtotime($list->DATESUBMISSION)) ?></td>
                                      <td><?= ucwords(strtolower($list->SEBABLEWAT)) ?></td>
                                  </tr>
                              <?php endif ?>
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

  