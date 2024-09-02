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
              <li class="breadcrumb-item">Setup</li>
              <li class="breadcrumb-item active"><?= $title ?></li>
          </div>
        </div>
      </div>
    </section>

  <?php if ($page == 'senarai_parameter_surat'): ?>
    <div id="flashMessage">
      <?= $this->session->flashdata('reminder'); ?>
    </div>
    <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Senarai Parameter Surat</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

            <div class="card-footer">
              <a href="<?= base_url('setup/setup_parameter_surat/daftar_parameter_surat/'.$warga)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah Parameter Surat</button></a>
            </div>
            
          <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                  <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>ID Staf</th>
                                  <th>Nama</th>
                                  <th>No. Kad Pengenalan</th>
                                  <th>Jawatan</th>
                                  <th>Bagi Pihak</th>
                                  <th>Status</th>
                                  <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($parameter as $hepa): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($hepa->STAFFID)) ?></td>
                                  <td><?= ucwords(strtolower($hepa->STAFFNAME)) ?></td>
                                  <td><?= $hepa->STAFFIC ?></td>
                                  <td><?= ucwords(strtolower($hepa->STAFFPOSITION)) ?></td>
                                  <td><?= ucwords(strtolower($hepa->BAGIPIHAK)) ?></td>
                                  <td><?= ucwords(strtolower($hepa->STATUS)) ?></td>
                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                         <button data-toggle="modal" data-target="#editparameter<?= $hepa->PARAMETERID ?>"  class="btn btn-warning"><i class="fas fa-edit">  Edit</i></button>
                                         
                                            <div class="modal fade" id="editparameter<?= $hepa->PARAMETERID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Parameter Surat</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('setup/edit_parameter/'.$warga.'/'. $hepa->PARAMETERID) ?>" method="POST">
                                                            <div style="text-align: left;" class="card-body">
                                                          
                                                            <div class="form-group">
                                                                <label>ID Admin</label>
                                                                <select name="staffID" class="form-control select2bs4" style="width: 100%;" value="<?= $hepa->STAFFID; ?>" required>
                                                                <?php foreach ($admin as $row): ?>
                                                                    <option value="<?= $row->STAFFID; ?>" <?php if($row->STAFFID == $hepa->STAFFID) echo 'selected'; ?>><?= $row->STAFFID; ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input type="text" class="form-control" id="staffName" name="staffName" placeholder="Nama Admin" value="<?=  $hepa->STAFFNAME; ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jawatan</label>
                                                                <input type="text" class="form-control" id="staffPosition" name="staffPosition" placeholder="Jawatan" value="<?=  $hepa->STAFFPOSITION; ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Bagi Pihak</label>
                                                                <input type="text" class="form-control" id="bagiPihak" name="bagiPihak" placeholder="Bagi Pihak" value="<?=  $hepa->BAGIPIHAK; ?>" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                    <div class="row">
                                                                        <div class="col-1">
                                                                            <div class="custom-control custom-radio">
                                                                                <input class="custom-control-input" type="radio" id="aktif<?= $hepa->PARAMETERID ?>" name="status" value="Aktif" <?php echo ($hepa->STATUS == "Aktif") ? "checked" : ""; ?>>
                                                                                <label class="custom-control-label" for="aktif<?= $hepa->PARAMETERID ?>">Aktif</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <div class="custom-control custom-radio">
                                                                                <input class="custom-control-input" type="radio" id="tidakaktif<?= $hepa->PARAMETERID ?>" name="status" value="Tidak Aktif" <?php echo ($hepa->STATUS == "Tidak Aktif") ? "checked" : ""; ?>>
                                                                                <label class="custom-control-label" for="tidakaktif<?= $hepa->PARAMETERID ?>">Tidak Aktif</label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>                                                
            
                                                              <div style="text-align: right;" class="card-footer">
                                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                                  <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>   Simpan</button>
                                                              </div>
                                                        
                                                            </div>
                                                      </form>
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                              </div>

                                           <a href="<?= base_url('setup/delete_parameter/'.$warga.'/'.$hepa->PARAMETERID) ?>" ><button type="button" onclick="return confirm('Confirm delete the data?')" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select[name="staffID"]').change(function(){
                var staffID = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('setup/getAdmin')?>',
                    data: {staffID: staffID},
                    dataType: 'json',
                    success: function(data){
                        $('input[name="staffName"]').val(data.STAFFNAME);
                        $('input[name="staffPosition"]').val(data.STAFFPOSITION);

                    }
                });
            });
        });
        
    </script>
    
    <?php else: ?>

      <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Daftar Parameter Surat</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

          <div class="card-body">
              
              <form action="<?= base_url('setup/daftar_parameter/'.$warga)?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>ID Admin</label>
                    <select name="staffID" id="staffID" class="form-control select2bs4" style="width: 100%;" required>
                    <option value="" selected disabled>Pilih ID Admin</option>
                    <?php foreach ($admin as $row): ?>
                        <option value="<?= $row->STAFFID; ?>"><?= $row->STAFFID; ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                     <label>Nama</label>
                     <input type="text" class="form-control" id="staffName" name="staffName" placeholder="Nama Admin" disabled>
                  </div>
                  <div class="form-group">
                     <label>Jawatan</label>
                     <input type="text" class="form-control" id="staffPosition" name="staffPosition" placeholder="Jawatan" disabled>
                  </div>
                  <div class="form-group">
                     <label>Bagi Pihak</label>
                     <input type="text" class="form-control" id="bagiPihak" name="bagiPihak" placeholder="Bagi Pihak" required>
                  </div>
                  <div class="form-group">
                    <label>Status</label>
                        <div class="row">
                            <div class="col-1">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="aktif" name="status" value="Aktif" required>
                                    <label for="aktif" class="custom-control-label">Aktif</label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="tidakaktif" name="status" value="Tidak Aktif">
                                    <label for="tidakaktif" class="custom-control-label">Tidak Aktif</label>
                                </div>
                            </div>
                        </div>
                    </div>

                  <div class="card-footer">
                    <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i>   Reset</button>
                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>   Simpan</button>
                  </div>

            </form>
          </div> 
        </div>
      </div>
    </section> 

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select[name="staffID"]').change(function(){
                var staffID = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '<?= base_url('setup/getAdmin')?>',
                    data: {staffID: staffID},
                    dataType: 'json',
                    success: function(data){
                        $('input[name="staffName"]').val(data.STAFFNAME);
                        $('input[name="staffPosition"]').val(data.STAFFPOSITION);

                    }
                });
            });
        });
        
    </script>
<?php endif ?>
</div>
  
  