
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
              <li class="breadcrumb-item">Kehadiran</li>
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
            <h3 class="card-title">Daftar Kehadiran <?= ucwords(strtolower($programID->programName)); ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          
          <form action="<?= base_url('kehadiran/tambahkehadiran/'.$warga .'/'. $programID->programID)?>" method="POST">
          <div class="card-body">
          
               <input type="hidden" id="programID" name="programID" value="<?= $programID->programID; ?>">

                <div class="form-group">
                  <label>Matrik Pelajar</label>
                  <select name="studentID" class="form-control select2bs4" style="width: 100%;" required>
                  <option value="" selected disabled>Pilih Matrik Pelajar</option>
                  <?php foreach ($studentID as $student): ?>
                        <option value="<?= $student->studentID; ?>"><?= $student->studentID; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Nama Pelajar</label>
                  <input type="text" class="form-control" id="studentName" name="studentName" placeholder="Nama Pelajar" disabled>
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

        <div class="container-fluid">

<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Senarai Kehadiran <?= ucwords(strtolower($programID->programName)); ?></h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      
    </div>
  </div>
    
  <div class="card-body">
    <div class="card">
      
      <div class="card-body">
        <div id="flashMessage">
          <?= $this->session->flashdata('reminder'); ?>
        </div>
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            
          
          <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th>Matrik</th>
                          <th>Nama</th>
                          <th style="text-align: center;">Status</th>
                          <th style="text-align: center;">
                            <button type="button" onclick="return confirm('Confirm delete the data?') && padam();" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button>
                          </th>
                      </tr>
                  </thead>
                  
                  <tbody>
                  <?php $no = 1;
                  foreach($kehadiran as $hadir): ?>
                      <tr>
                          <td><?= $no++ ?></td>
                          <td><?= ucwords(strtolower($hadir->studentID)) ?></td>
                          <td><?= ucwords(strtolower($hadir->studentName)) ?></td>
                          <td style="text-align: center;">
                              <?php 
                              $registered = false;
                              foreach($penyertaan as $join): 
                                  if ($hadir->studentID == $join->studentID) {
                                      $registered = true; 
                                      break; 
                                  }
                              endforeach; 
                              ?>
                              <span class="badge <?= $registered ? 'badge-primary' : 'badge-secondary' ?>">
                                  <?= $registered ? 'Registered' : 'Unregistered' ?>
                              </span>
                          </td>
                          <td style="text-align: center;">
                              <input type="hidden" class="kehadiranID" value="<?= $hadir->kehadiranID ?>">
                              <input type="checkbox" class="adminCheckbox table-admin-checkbox" data-kehadiranid="<?= $hadir->kehadiranID ?>" <?= $hadir->kehadiranID == 1 ? 'checked' : '' ?>>
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
                    $('input[name="studentEmail"]').val(data.studentEmail);
                }
            });
        });
    });

    setTimeout(function() {
        $('#flashMessage').fadeOut('fast');
    }, 1000);

    </script>

        <script>
              function padam() {
                  var checkboxData = [];

                  // Loop through each checkbox to gather data
                  $('.adminCheckbox').each(function() {
                      var kehadiranID = $(this).data('kehadiranid'); 
                      var padam = $(this).prop('checked') ? 1 : 0; 

                      checkboxData.push({ kehadiranID: kehadiranID, padam: padam });
                  });

                  $.ajax({
                      type: "POST",
                      url: "<?= base_url('kehadiran/deleteatt/'.$warga.'/'.$programID->programID) ?>",
                      data: { checkboxData: checkboxData },
                      success: function(response) {
                          
                        $('#flashMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> Kehadiran Berjaya Dipadam! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> </button></div>');
                        setTimeout(function() {
                              location.reload();
                          }, 1000);
                      }
                  });
              }

        </script>
    
    

   

  
  

         
  







