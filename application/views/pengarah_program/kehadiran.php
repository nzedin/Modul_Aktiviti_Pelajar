<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Pelajar</li>
              <li class="breadcrumb-item">Aktiviti/Program</li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <div id="flashMessage">
      <?= $this->session->flashdata('reminder'); ?>
    </div>
    <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Senarai Aktiviti / Program</h3>

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
                                  <th style="text-align: center;">Program</th>
                                  <th style="text-align: center;">Badan Pelajar</th>
                                  <th style="text-align: center;">Tarikh Mula</th>
                                  <th style="text-align: center;">Tarikh Tamat</th>
                                  <th style="text-align: center;">Jenis Program</th>
                                  <th style="text-align: center;">Quota</th>
                                  <th style="text-align: center;">Lokasi</th>
                                  <th style="text-align: center;">Pendaftaran</th>
                                  <th style="text-align: center;">Kehadiran</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($list as $list): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($list->programName)) ?></td>
                                  <td><?= ucwords(strtolower($list->clubName)) ?></td>
                                  <td><?= $list->startDate ?></td>
                                  <td><?= $list->endDate ?></td>
                                  <td><?= ucwords(strtolower($list->typeProgram)) ?></td>
                                  <td><?= $list->programQuota ?></td>
                                  <td><?= ucwords(strtolower($list->programLocation)) ?></td>                                  

                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('kehadiran/pendaftaranPeserta/'.$warga.'/'.$list->programID) ?>" ><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fa fa-plus-square-o">  Pendaftaran</i></button></a>
                                        <?php if (strtotime($list->startDate) > strtotime(date('Y-m-d'))) { ?>
                                              <?php if (!$this->kehadiran_model->is_quota_exceeded($list->programID)) { ?>
                                                  <button type="button" class="btn btn-block btn-outline-primary btn-sm" onclick="window.open('<?= base_url('kehadiran/qrregistration/'.$warga.'/'.$list->programID) ?>')">
                                                      <i class="fa fa-qrcode"> Create QR</i>
                                                  </button>
                                              <?php } else { ?>
                                                  <button type="button" class="btn btn-block btn-outline-primary btn-sm" onclick="alert('Registration is full.');">
                                                      <i class="fa fa-qrcode"> Create QR</i>
                                                  </button>
                                              <?php } ?>
                                          <?php } else { ?>
                                              <button type="button" class="btn btn-block btn-outline-primary btn-sm" onclick="alert('Program registration is closed.');">
                                                  <i class="fa fa-qrcode"> Create QR</i>
                                              </button>
                                          <?php } ?>
                                      </div>
                                  </td>

                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('kehadiran/kehadiranPeserta/'.$warga.'/'.$list->programID) ?>" ><button type="button" class="btn btn-block btn-outline-info btn-sm"><i class="fa fa-list-ol">  Kehadiran</i></button></a>
                                        <button type="button" class="btn btn-block btn-outline-primary btn-sm" 
                                          <?php 
                                            if(strtotime($list->startDate) > strtotime(date('Y-m-d')) || strtotime($list->endDate) < strtotime(date('Y-m-d'))) {
                                              $dateString = date('d F Y, l', strtotime($list->startDate));
                                              echo 'onclick="alert(\'QR Attendance can only be generated during the program on ' . $dateString . '.\');"';                                            
                                            }else 
                                              echo 'onclick="window.open(\''. base_url('kehadiran/qrcode/'.$warga.'/'.$list->programID) . '\')"';
                                            ?>>
                                          <i class="fa fa-qrcode">  Create QR</i>
                                        </button>
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
 