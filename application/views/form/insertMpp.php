<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Pelantikan MPP</li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Maklumat Pelantikan MPP</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          
          <!-- /.card-header -->
          <form action="<?= base_url('mpp/addmpp/'.$warga)?>" method="POST">
            <div class="card-body">
                <div class="form-group">
                  <label>Matrik Pelajar</label>
                  <select name="studentID" class="form-control select2bs4" style="width: 100%;">
                  <option selected disabled>Pilih Matrik Pelajar</option>
                  <?php foreach ($student as $student): ?>
                        <option value="<?= $student->STUDENTID; ?>"><?= $student->STUDENTID; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <?= form_error('studentID', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                
                <div class="form-group">
                  <label>Nama Pelajar</label>
                  <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Nama Pelajar" disabled>
                </div>

                <div class="form-group">
                  <label>Program Pengajian</label>
                  <input type="text" class="form-control" id="program" name="program" placeholder="Program" disabled>
                </div>

                <div class="form-group">
                  <label>Semester</label>
                  <input type="text" class="form-control" id="semester" name="semester" placeholder="Semester" disabled>
                </div>
                
                <div class="form-group">
                  <label>Sesi Semester</label>
                  <select name="session" class="form-control select2bs4" style="width: 100%;">
                  <option selected disabled>Pilih Sesi</option>
                  <?php foreach ($sesi as $row): ?>
                      <option value="<?= $row->SESI; ?>"><?= $row->SESI; ?></option>
                  <?php endforeach; ?>
                  </select>
                  <?= form_error('session', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label>Jawatan</label>
                  <select name="positionMpp" class="form-control select2bs4" style="width: 100%;">
                    <option selected disabled>Pilih Jawatan</option>
                    <?php foreach ($committee as $com): ?>
                        <?php if ($com->CATEGORYROLE == 'MPP'): ?>
                          <option value="<?= $com->COMMITTEEID; ?>"><?= $com->COMMITTEE; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    
                  </select>
                  <?= form_error('positionMpp', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
              <div class="form-group">
                  <label>Status Pelajar</label>
                       
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="aktif" name="status" value="Aktif">
                        <label for="aktif" class="custom-control-label">Aktif</label>
                      </div>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="tidakaktif" name="status" value="Tidak Aktif">
                        <label for="tidakaktif" class="custom-control-label">Tidak Aktif</label>
                      </div>
                      <?= form_error('status', '<div class="text-small text-danger">', '</div>'); ?>
                </div>
                <div class="form-group">
                  <label>Admin MPP</label><br>
                  <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="adminMPP" name="adminMPP" value="1">
                      <label class="custom-control-label" for="adminMPP"></label>
                  </div>
                  <p style="color:blue;">*tandakan kotak sekiranya pelajar admin MPP</p>
                 </div>
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
        $('select[name="studentID"]').change(function(){
            var studentID = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('mpp/getinfo')?>',
                data: {studentID: studentID},
                dataType: 'json',
                success: function(data){
                    // Populate input fields
                    $('input[name="studentName"]').val(data.studentName);
                    $('input[name="program"]').val(data.program);
                    $('input[name="semester"]').val(data.semester);
                }
            });
        });
    });
  </script>
