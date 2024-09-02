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
              <li class="breadcrumb-item">Pendaftaran</li>
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
            <h3 class="card-title">Senarai Maklumat Badan Pelajar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

            <div class="card-footer">
              <a href="<?= base_url('club/club/'.$warga)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah Badan Pelajar</button></a>
            </div>
            
          <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                      <table id="example1" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                  <th style="text-align: center;">No.</th>
                                  <th style="text-align: center;">No. Rujukan</th>
                                  <th style="text-align: center;">Nama Badan Pelajar</th>
                                  <th style="text-align: center;">Singkatan</th>
                                  <th style="text-align: center;">Logo</th>
                                  <th style="text-align: center;">Penasihat 1</th>
                                  <th style="text-align: center;">Daftar Kepimpinan</th>
                                  <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($club as $kelab): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= $kelab->REFNO ?></td>
                                  <td><?= ucwords(strtolower($kelab->CLUBNAME)) ?></td>
                                  <td><?= $kelab->SHORTNAME ?></td>
                                  <td style="text-align: center;">
                                    <?php if($kelab->LOGO): ?>
                                      <button type="button" onclick="openLogo('<?= base64_encode(file_get_contents('images/' . $kelab->LOGO)); ?>');" class="btn btn-primary"><i class="fa fa-eye"> Open</i></button>
                                    <?php else: ?>
                                      <button type="button" class="btn btn-primary" disabled><i class="fa fa-eye"> Open</i></button>
                                    <?php endif; ?>

                                    <script>
                                        function openLogo(logoData) {
                                            var logo = 'data:image/png;base64,' + logoData;
                                            var viewLogoWindow = window.open('', '_blank', 'width=500,height=500', 'name=LogoPreview');
                                            viewLogoWindow.document.write('<html><head><title>Logo Preview</title></head><body style="margin: 0; padding: 0; text-align: center;">');
                                            viewLogoWindow.document.write('<img src="' + logo + '" style="max-width: 100%; max-height: 100%;">');
                                            viewLogoWindow.document.write('</body></html>');
                                            viewLogoWindow.document.close();
                                        }
                                    </script>
                                  </td>
                                  <td><?= $kelab->ADVISOR1_NAME ?></td>
                                  <td style="text-align: center;">
                                    <a href="<?= base_url('club/kepimpinan/'.$warga.'/'.$kelab->CLUBID) ?>"><img src="<?= base_url('img/icon.png') ?>" alt="icon" style="width:50px"></a>
                                  </td>

                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                         <button type="button"  onclick="window.open('<?= base_url('club/profile/kelab/'.$warga .'/'.$kelab->CLUBID) ?>')" class="btn btn-info"><i class="fa fa-external-link">  Detail</i></button>
                                         
                                         <button data-toggle="modal" data-target="#editclub<?= $kelab->CLUBID ?>"  class="btn btn-warning"><i class="fas fa-edit">  Edit</i></button>
                                         
                                         <div class="modal fade" id="editclub<?= $kelab->CLUBID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Badan Pelajar</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('club/editclub/'.$warga.'/'. $kelab->CLUBID) ?>" method="POST"  enctype="multipart/form-data">
                                                        <div style="text-align: left;" class="card-body">
                                                          
                                                            <div class="form-group">
                                                              <label>Tarikh Penubuhan <label style="color: red;">*</label></label>
                                                                    <input type="date" class="form-control " value="<?= date('Y-m-d', strtotime($kelab->ESTABLISHDATE)) ?>" name="establishDate" required />
                                                              <?= form_error('establishDate', '<div class="text-small text-danger">', '</div>'); ?>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>No. Rujukan <label style="color: red;">*</label></label>
                                                              <input type="text" class="form-control" value="<?= $kelab->REFNO ?>" name="refNo" placeholder="Nombor Rujukan" required>
                                                              <?= form_error('refNo', '<div class="text-small text-danger">', '</div>'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Nama Badan Pelajar <label style="color: red;">*</label></label>
                                                              <input type="text" class="form-control" value="<?= $kelab->CLUBNAME ?>" name="clubName" placeholder="Nama Badan Pelajar" required>
                                                              <?= form_error('clubName', '<div class="text-small text-danger">', '</div>'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Nama Singkatan</label>
                                                              <input type="text" class="form-control" value="<?= $kelab->SHORTNAME ?>" name="shortName" placeholder="Nama Singkatan" >
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Kategori Badan Pelajar  <label style="color: red;">*</label></label>
                                                              <select name="category" class="form-control select2bs4" style="width: 100%;" value="<?= $kelab->CATEGORY; ?>" required>
                                                                <?php foreach ($categoryClub as $cat): ?>
                                                                    <option value="<?= $cat->CATEGORYID; ?>"  <?php if($cat->CATEGORYID != $kelab->CATEGORY) echo 'selected'; ?>  > <?= $cat->CATEGORY; ?></option>
                                                                <?php endforeach; ?>
                                                              </select>
                                                              <?= form_error('category', '<div class="text-small text-danger">', '</div>'); ?>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="logo">Logo</label>
                                                                <div class="input-group">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="logo" name="logo" accept="image/*" >
                                                                        <label class="custom-file-label" for="logo"> <?= $kelab->LOGO != null ? $kelab->LOGO : 'Choose Image'; ?></label>
                                                                    </div>
                                                                    
                                                                    <?php if ($kelab->LOGO != null): ?>
                                                                      <div class="input-group-append">
                                                                          <span class="input-group-text" style="cursor: pointer;" onclick="window.open('<?= base_url('images/' . $kelab->LOGO); ?>', '_blank')">
                                                                              <i class="fa fa-file-image-o"></i>
                                                                          </span>
                                                                      </div>
                                                                  <?php endif; ?>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Penasihat 1 <label style="color: red;">*</label></label>
                                                                  <select name="advisor1" class="form-control select2bs4" style="width: 100%;" required>
                                                                  <option  value="" selected disabled>Pilih ID Staff</option>
                                                                  <?php foreach ($advisor as $row): ?>
                                                                      <option value="<?= $row->STAFFID; ?>" <?php if($row->STAFFID == $kelab->ADVISOR1_ID) echo 'selected'; ?>><?= $row->STAFFID; ?></option>
                                                                  <?php endforeach; ?>
                                                                  </select>
                                                                    <?= form_error('advisor1', '<div class="text-small text-danger">', '</div>'); ?>
                                                                  <input type="text" class="form-control" id="staffName1" name="staffName1" value="<?= $kelab->ADVISOR1_NAME ?>" placeholder="Nama Penasihat 1" disabled>
                                                               
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Penasihat 2</label>
                                                                    <select name="advisor2" class="form-control select2bs4" style="width: 100%;">
                                                                    <option  value="" selected>Pilih ID Staff</option>
                                                                    <?php foreach ($advisor as $row): ?>
                                                                        <option value="<?= $row->STAFFID; ?>" <?php if($row->STAFFID == $kelab->ADVISOR2_ID) echo 'selected'; ?>><?= $row->STAFFID; ?></option>
                                                                    <?php endforeach; ?>
                                                                    </select>
                                                                  <input type="text" class="form-control" id="staffName2" name="staffName2" value="<?= $kelab->ADVISOR2_NAME ?>" placeholder="Nama Penasihat 2" disabled>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Objektif Badan Pelajar <label style="color: red;">*</label></label><br>
                                                              <textarea class="form-control" id="objective" name="objective" placeholder="Tandakan '-' sekiranya tidak berkenaan." rows="3" required><?= $kelab->OBJECTIVE ?></textarea>
                                                            </div>
                                                            <?= form_error('objective', '<div class="text-small text-danger">', '</div>'); ?>

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
                                         
                                         

                                         <a href="<?= base_url('club/deleteclub/'.$warga.'/'.$kelab->CLUBID) ?>" ><button type="button" onclick="return confirm('Confirm delete the data?')" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
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






  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
      $(document).ready(function(){
          $('select[name="advisor1"]').change(function(){
              var advisor1 = $(this).val();
              $.ajax({
                  type: 'POST',
                  url: '<?= base_url('club/getStaff1')?>',
                  data: {advisor1: advisor1},
                  dataType: 'json',
                  success: function(data){
                      $('input[name="staffName1"]').val(data.STAFFNAME);
                    
                  }
              });
          });

          $('select[name="advisor2"]').change(function(){
              var advisor2 = $(this).val();
              $.ajax({
                  type: 'POST',
                  url: '<?= base_url('club/getStaff2')?>',
                  data: {advisor2: advisor2},
                  dataType: 'json',
                  success: function(data){
                    if ( advisor2 != null) {
                      $('input[name="staffName2"]').val(data.STAFFNAME);
                    }else{

                    }
                  }
              });
          });
      });
    
      $(document).ready(function() {
          $('select[name="advisor1"]').on('change', function() {
              var selectedAdvisor1 = $(this).val();
              $('select[name="advisor2"] option').each(function() {
                  if ($(this).val() == selectedAdvisor1) {
                      $(this).prop('disabled', true);
                  } else {
                      $(this).prop('disabled', false);
                  }
              });
          });
      });
  </script>



