
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
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
            
          <div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="example1_length"><label>Show <select name="example1_length" aria-controls="example1" class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> entries</label></div></div><div class="col-sm-12 col-md-6"><div id="example1_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="example1"></label></div></div></div>

          <table id="example2" class="table table-bordered table-hover">
                  <thead>
                      <tr>
                          <th>No.</th>
                          <th>Matrik</th>
                          <th>Nama</th>
                          <th style="text-align: center;">Action</th>
                      </tr>
                  </thead>
                  <?php $no = 1;
                  foreach($kehadiran as $hadir): ?>
                  <tbody>
                      <tr>
                          <td><?= $no++ ?></td>
                          <td><?= ucwords(strtolower($hadir->studentID)) ?></td>
                          <td><?= ucwords(strtolower($hadir->studentName)) ?></td>
                          <td style="text-align: center;">
                              <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                              </div>
                          </td>
                      </tr>
                  </tbody>
              <?php endforeach ?>
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
  </script>

  
  

         
  







