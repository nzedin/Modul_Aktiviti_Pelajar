<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
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
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
            <?php endif; ?>
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
            <h3 class="card-title">Senarai Kepimpinan Badan Pelajar <?= ucwords(strtolower($clubID->clubName)); ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

            <div class="card-footer">
              <a href="<?= base_url('club/tambahkepimpinan/'.$warga.'/'. $clubID->clubID)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah Ahli</button></a>
            </div>
            
          <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                  <table id="example1" class="table table-bordered table-striped">
                          <thead>
                              <tr>
                                  <th>No.</th>
                                  <th>Jawatan</th>
                                  <th>Matrik</th>
                                  <th>Nama</th>
                                  <?php if( $warga == "staff" ): ?>
                                    <th>Status</th>
                                  <?php endif; ?>
                                  <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($kepimpinan as $kep): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($kep->committee)) ?></td>
                                  <td><?= ucwords(strtolower($kep->studentID)) ?></td>
                                  <td><?= ucwords(strtolower($kep->studentName)) ?></td>
                                  <?php if( $warga == "staff" ): ?>
                                    <td><?= ucwords(strtolower($kep->status)) ?></td>
                                  <?php endif; ?>
                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                         
                                         <button data-toggle="modal" data-target="#editkepimpinan<?= $kep->kepimpinanID ?>"  class="btn btn-warning"><i class="fas fa-edit">  Edit</i></button>
                                         
                                         <div class="modal fade" id="editkepimpinan<?= $kep->kepimpinanID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Kepimpinan Badan Pelajar <?= ucwords(strtolower($clubID->clubName)); ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('club/editkepimpinan/'.$warga.'/'.$kep->kepimpinanID) ?>" method="POST">
                                                            <div style="text-align: left;" class="card-body">
                                                          
                                                            <input type="hidden" id="clubID" name="clubID" value="<?= $clubID->clubID; ?>">

                                                            <div class="form-group">
                                                              <label>Matrik Pelajar</label>
                                                              <input type="text" class="form-control" id="studentID" name="studentID" value="<?=  $kep->studentID; ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Nama Pelajar</label>
                                                              <input type="text" class="form-control" id="studentName" name="studentName" value="<?=  $kep->studentName; ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Program Pengajian</label>
                                                              <input type="text" class="form-control" id="program" name="program" value="<?=  $kep->program; ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Semester</label>
                                                              <input type="text" class="form-control" id="semester" name="semester" value="<?= $kep->semester; ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Jawatan</label>
                                                              <select name="committeeID" class="form-control select2bs4" style="width: 100%;" value="<?= $kep->committeeID; ?>" required>
                                                                <?php foreach ($committee as $comm): ?>
                                                                    <?php if ($comm->categoryrole == 'BADAN PELAJAR'): ?>
                                                                      <option value="<?= $comm->committeeID; ?>" <?php if($comm->committeeID == $kep->committeeID) echo 'selected'; ?> ><?= $comm->committee; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                              </select>
                                                            </div>
                                                          <?php if( $warga == "staff" ): ?>
                                                           <div class="form-group">
                                                              <label>Status Pelajar</label>
                                                              <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" id="AKTIF<?= $kep->kepimpinanID ?>" name="status" value="AKTIF" <?php echo ($kep->status == "AKTIF") ? "checked" : ""; ?> required>
                                                                  <label class="custom-control-label" for="AKTIF<?= $kep->kepimpinanID ?>">Aktif</label>
                                                              </div>
                                                              <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" id="TIDAKAKTIF<?= $kep->kepimpinanID ?>" name="status" value="TIDAK AKTIF" <?php echo ($kep->status == "TIDAK AKTIF") ? "checked" : ""; ?>>
                                                                  <label class="custom-control-label" for="TIDAKAKTIF<?= $kep->kepimpinanID ?>">Tidak Aktif</label>
                                                              </div>

                                                            </div>
                                                            <?php else: ?>
                                                              <input type="hidden" id="status" name="status" value="<?= $kep->status; ?>">
                                                            <?php endif; ?>

                                                            
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
                                         

                                         <a href="<?= base_url('club/deletekepimpinan/'.$warga.'/'.$clubID->clubID.'/'.$kep->kepimpinanID) ?>" ><button type="button" onclick="return confirm('Confirm delete the data?')" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
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
                   
                      $('input[name="staffName1"]').val(data.staffName);
                    
                  }
              });
          });

          $('select[name="advisor2"]').change(function(){
        var advisor2 = $(this).val();
        if (advisor2 !== "") { // Check if the value is not empty
            $.ajax({
                type: 'POST',
                url: '<?= base_url('club/getStaff2')?>',
                data: {advisor2: advisor2},
                dataType: 'json',
                success: function(data){
                    $('input[name="staffName2"]').val(data.staffName);
                }
            });
        } else {
            $('input[name="staffName2"]').val(""); // Clear the value if the select option is set to default
        }
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
  <script>
    // Function to update staff name based on selected advisor
    $('select[name="advisor1"], select[name="advisor2"]').change(function() {
        var selectedAdvisorID = $(this).val();
        var selectedStaffName = $(this).find('option:selected').data('staffname');
        var targetStaffNameInput = $(this).attr('name') === 'advisor1' ? $('input[name="staffName1"]') : $('input[name="staffName2"]');
        targetStaffNameInput.val(selectedStaffName);
    });
</script>
