
<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title2 ?></h1>
          </div>
          <div class="col-sm-6">
          <?php if( $warga == "staff" ): ?>
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Pendaftaran</li>
              <li class="breadcrumb-item"><?= $title ?></li>
              <li class="breadcrumb-item active"><?= $title2 ?></li>
            </ol>
            <?php else: ?>
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Pelajar</li>
              <li class="breadcrumb-item">Pendaftaran Ahli</li>
              <li class="breadcrumb-item active"><?= $title2 ?></li>
            </ol>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Maklumat Pendaftaran Badan Pelajar <?= ucwords(strtolower($clubID->CLUBNAME)); ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          
          <form action="<?= base_url('club/addkepimpinan/'.$warga .'/'. $clubID->CLUBID)?>" method="POST">
          <div class="card-body">
          
               <input type="hidden" id="clubID" name="clubID" value="<?= $clubID->CLUBID; ?>">

                <div class="form-group">
                  <label>Matrik Pelajar</label>
                  <select name="studentID" class="form-control select2bs4" style="width: 100%;" required>
                  <option value="" selected disabled>Pilih Matrik Pelajar</option>
                  <?php foreach ($studentSelect as $stud): ?>
                        <option value="<?= $stud->STUDENTID; ?>"><?= $stud->STUDENTID; ?></option>
                    <?php endforeach; ?>
                  </select>
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
                  <label>Jawatan</label>
                  <select name="committeeID" class="form-control select2bs4" style="width: 100%;" required>
                    <option value="" selected disabled>Pilih Jawatan</option>
                    <?php foreach ($committee as $com): ?>
                        <?php if ($com->CATEGORYROLE == 'BADAN PELAJAR'): ?>
                          <option value="<?= $com->COMMITTEEID; ?>"><?= $com->COMMITTEE; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    
                  </select>
                </div>
                <?php if( $warga == "staff" ): ?>
                  <div class="form-group">
                      <label>Status Pelajar</label>
                          
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="aktif" name="status" value="AKTIF" required>
                            <label for="aktif" class="custom-control-label">Aktif</label>
                          </div>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="tidakaktif" name="status" value="TIDAK AKTIF">
                            <label for="tidakaktif" class="custom-control-label">Tidak Aktif</label>
                          </div>
                    </div>
                    <?php else: ?>
                       <input type="hidden" id="status" name="status" value="Aktif">
                  <?php endif; ?>
                
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






