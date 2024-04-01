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

    <section class="content">
      <div class="container-fluid">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Maklumat Pendaftaran Badan Pelajar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          
          <form action="<?= base_url('club/addclub/'.$warga)?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                
                <div class="form-group">
                  <label>Tarikh Penubuhan <label style="color: red;">*</label></label>
                        <input type="date" class="form-control " id="establishDate" name="establishDate" required />
                  <?= form_error('establishDate', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                
                <div class="form-group">
                  <label>No. Rujukan <label style="color: red;">*</label></label>
                  <input type="text" class="form-control" id="refNo" name="refNo" placeholder="Nombor Rujukan" required>
                  <?= form_error('refNo', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label>Nama Badan Pelajar <label style="color: red;">*</label></label>
                  <input type="text" class="form-control" id="clubName" name="clubName" placeholder="Nama Badan Pelajar" required>
                  <?= form_error('clubName', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label>Nama Singkatan</label>
                  <input type="text" class="form-control" id="shortName" name="shortName" placeholder="Nama Singkatan" >
                </div>
                
                <div class="form-group">
                  <label>Kategori Badan Pelajar <label style="color: red;">*</label></label>
                  <select name="category" class="form-control select2bs4" style="width: 100%;" required>
                  <option value="" selected disabled>Pilih Kategori</option>
                  <?php foreach ($category as $row): ?>
                      <option value="<?= $row->categoryID; ?>"><?= $row->category; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <?= form_error('category', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="logo">Logo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="logo" name="logo">
                        <label class="custom-file-label" for="logo">Choose Image</label>
                      </div>
                      
                    </div>
                  </div>

                <div class="form-group">
                  <label>Penasihat 1 <label style="color: red;">*</label></label>
                  <div class="row">
                    <div class="col-3">
                      <select name="advisor1" id="advisor1" class="form-control select2bs4" style="width: 100%;" required>
                      <option value="" selected disabled>Pilih ID Staff</option>
                      <?php foreach ($advisor as $row): ?>
                          <option value="<?= $row->staffID; ?>"><?= $row->staffID; ?></option>
                      <?php endforeach; ?>
                      </select>
                        <?= form_error('advisor1', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-9">
                      <input type="text" class="form-control" id="staffName1" name="staffName1" placeholder="Nama Penasihat 1" disabled>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Penasihat 2</label>
                  <div class="row">
                    <div class="col-3">
                        <select name="advisor2" id="advisor2" class="form-control select2bs4" style="width: 100%;">
                        <option  value="" selected disabled>Pilih ID Staff</option>
                        <?php foreach ($advisor as $row): ?>
                            <option value="<?= $row->staffID; ?>"><?= $row->staffID; ?></option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-9">
                      <input type="text" class="form-control" id="staffName2" name="staffName2" placeholder="Nama Penasihat 2" disabled>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label>Objektif Badan Pelajar <label style="color: red;">*</label></label><br>
                  <textarea class="form-control" id="objective" name="objective" placeholder="Tandakan '-' sekiranya tidak berkenaan." rows="3" required></textarea>
                </div>
                <?= form_error('objective', '<div class="text-small text-danger">', '</div>'); ?>
            </div>
            <!-- /.card-body -->
    
            <div class="card-footer">
              <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i>   Reset</button>
              <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>   Simpan</button>
            </div>
          </form>
          <!-- /.card-body -->
          
          </div>
          <!-- /.card -->

        </div>


      </div>
      <!-- /.container-fluid -->
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
                      $('input[name="staffName1"]').val(data.staffName);
                    
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
                      $('input[name="staffName2"]').val(data.staffName);
                    }else{

                    }
                  }
              });
          });
      });
    
      $(document).ready(function() {
          $('#advisor1').on('change', function() {
              var selectedAdvisor1 = $(this).val();
              $('#advisor2 option').each(function() {
                  if ($(this).val() == selectedAdvisor1) {
                      $(this).prop('disabled', true);
                  } else {
                      $(this).prop('disabled', false);
                  }
              });
          });
      });
  </script>



