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

  <?php if ($page == 'senarai_admin'): ?>
    <div id="flashMessage">
      <?= $this->session->flashdata('reminder'); ?>
    </div>
    <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Senarai Admin Aktiviti Pelajar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

            <div class="card-footer">
              <a href="<?= base_url('setup/setup_admin/daftar_admin/'.$warga)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah Admin</button></a>
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
                                  <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($admin as $hepa): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($hepa->staffID)) ?></td>
                                  <td><?= ucwords(strtolower($hepa->staffName)) ?></td>
                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                           <a href="<?= base_url('setup/delete_admin/'.$warga.'/'.$hepa->staffID) ?>" ><button type="button" onclick="return confirm('Confirm delete the data?')" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
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
    
    <?php else: ?>

      <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Daftar Admin Aktiviti Pelajar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

          <div class="card-body">
              
              <form action="<?= base_url('setup/daftar_admin/'.$warga)?>" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>ID Admin</label>
                   
                        <select name="staffID" id="staffID" class="form-control select2bs4" style="width: 100%;" required>
                        <option value="" selected disabled>Pilih ID Admin</option>
                        <?php foreach ($admin as $row): ?>
                            <option value="<?= $row->staffID; ?>"><?= $row->staffID; ?></option>
                        <?php endforeach; ?>
                        </select>
                     
                  </div>
                  <div class="form-group">
                     <label>Nama</label>
                     <input type="text" class="form-control" id="staffName" name="staffName" placeholder="Nama Admin" disabled>
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
                  url: '<?= base_url('setup/getStaff')?>',
                  data: {staffID: staffID},
                  dataType: 'json',
                  success: function(data){
                      $('input[name="staffName"]').val(data.staffName);
                    
                  }
              });
          });
      });
    
  </script>





    <?php endif ?>

  </div>
  
  