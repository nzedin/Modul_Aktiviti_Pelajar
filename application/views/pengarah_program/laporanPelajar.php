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
              <li class="breadcrumb-item">Laporan</li>
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
            <h3 class="card-title">Senarai Laporan Aktiviti / Program</h3>

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
                                  <th style="text-align: center;">Tarikh Aktiviti</th>
                                  <th style="text-align: center;">Nama Program</th>
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center;">Cetak Laporan</th>
                                  <th style="text-align: center;">Ulasan Laporan</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($laporan as $list): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= $list->clubName ?></td>
                                  <td><?= $list->startDate ?></td>
                                  <td><?= $list->programName ?></td>

                                  <td> <?php
                                        if ($list->statusApproval == null) {
                                          echo "<span class='badge badge-secondary'>No Submission</span>";
                                        }
                                        else if ($list->statusApproval == 3) {
                                          echo "<span class='badge badge-primary'>In Draft</span>";
                                        }
                                        else if ($list->statusApproval == 0) {
                                          echo "<span class='badge badge-warning'>Pending</span>";
                                        }
                                        else if ($list->statusApproval == 1){
                                          echo "<span class='badge badge-danger'>Not Approved</span>";
                                        } else {
                                          echo "<span class='badge badge-success'> Approved</span>";
                                        }
                                      ?>
                                  </td>
                                  <td>-</td>

                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="<?= base_url('laporan/laporanProgram/'.$warga.'/'.$list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
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

 