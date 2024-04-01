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
                    
                  <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div>

                      <table id="example2" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th style="text-align: center;">No.</th>
                                  <th style="text-align: center;">Program</th>
                                  <th style="text-align: center;">Nama Badan Pelajar</th>
                                  <th style="text-align: center;">Jenis Program</th>
                                  <th style="text-align: center;">Tarikh</th>
                                  <th style="text-align: center;">Lokasi</th>
                                  <th style="text-align: center;">Quota</th>
                                  <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($list as $list): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= $list->programName ?></td>
                                  <td><?= $list->clubName ?></td>
                                  <td><?= $list->typeProgram ?></td>
                                  <td><?= $list->programDate ?></td>
                                  <td><?= $list->programLocation ?></td>
                                  <td><?= $list->programQuota ?></td>

                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="" ><button type="button" onclick="" class="btn btn-info"><i class="fa fa-list-ol">  Kehadiran</i></button></a>
                                        <a href="" ><button type="button" onclick="" class="btn btn-primary"><i class="fa fa-qrcode">  Create QR</i></button></a>
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
 