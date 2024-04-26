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
              <li class="breadcrumb-item">Pelantikan MPP</li>
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
            <h3 class="card-title">Senarai Majlis Perwakilan Pelajar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

            <div class="card-footer">
              <a href="<?= base_url('mpp/mpp/'.$warga)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah MPP</button></a>
              <button onclick="saveAdmin();" class="btn btn-info"><i class="fas fa-save"></i>  Simpan Admin MPP</button>

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
                                  <th>Jawatan</th>
                                  <th>Sesi Semester</th>
                                  <th>Status</th>
                                  <th>Nama</th>
                                  <th>Matrik</th>
                                  <th style="text-align: center;">Admin</th>
                                  <th style="text-align: center;">Action</th>
                              </tr>
                          </thead>
                          <?php $no = 1;
                          foreach($mpp as $mpp): ?>
                          <tbody>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= $mpp->committee ?></td>
                                  <td><?= $mpp->session ?></td>
                                  <td><?= $mpp->status ?></td>
                                  <td><?= $mpp->studentName ?></td>
                                  <td><?= $mpp->studentID ?></td>
                                  <td style="text-align: center;">
                                      <input type="hidden" class="mppID" value="<?= $mpp->mppID ?>">
                                      <input type="checkbox" class="adminCheckbox table-admin-checkbox" data-mppid="<?= $mpp->mppID ?>" <?= $mpp->adminMPP == 1 ? 'checked' : '' ?>>
                                  </td>

                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                         <button type="button"  onclick="window.open('<?= base_url('mpp/profile/'.$warga.'/pelajar/'.$mpp->mppID) ?>')" class="btn btn-info"><i class="fa fa-external-link">  Lihat Profil</i></button>
                                         
                                         <button data-toggle="modal" data-target="#editmpp<?= $mpp->mppID ?>"  class="btn btn-warning"><i class="fas fa-edit">  Edit</i></button>
                                         
                                         <div class="modal fade" id="editmpp<?= $mpp->mppID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Majlis Perwakilan Pelajar</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('mpp/editmpp/'.$warga.'/'. $mpp->mppID) ?>" method="POST">
                                                            <div style="text-align: left;" class="card-body">
                                                          
                                                            <div class="form-group">
                                                              <label>Matrik Pelajar</label>
                                                              <input type="text" class="form-control" id="studentID" name="studentID" value="<?=  $mpp->studentID; ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Nama Pelajar</label>
                                                              <input type="text" class="form-control" id="studentName" name="studentName" value="<?=  $mpp->studentName; ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Program Pengajian</label>
                                                              <input type="text" class="form-control" id="program" name="program" value="<?=  $mpp->program; ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Semester</label>
                                                              <input type="text" class="form-control" id="semester" name="semester" value="<?= $mpp->semester; ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Sesi Semester</label>
                                                              <select name="session" class="form-control select2bs4" style="width: 100%;" >
                                                              <?php foreach ($sesi as $row): ?>
                                                                  <option value="<?= $row->sesi; ?>" <?php if($row->sesi == $mpp->session) echo 'selected'; ?>><?= $row->sesi; ?></option>
                                                              <?php endforeach; ?>
                                                              </select>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Jawatan</label>
                                                              <select name="positionMpp" class="form-control select2bs4" style="width: 100%;" value="<?= $mpp->committeeID; ?>">
                                                                <?php foreach ($committee as $comm): ?>
                                                                    <?php if ($comm->categoryrole == 'MPP'): ?>
                                                                      <option value="<?= $comm->committeeID; ?>" <?php if($comm->committeeID == $mpp->positionMpp) echo 'selected'; ?> ><?= $comm->committee; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                              </select>
                                                            </div>

                                                           <div class="form-group">
                                                              <label>Status Pelajar</label>
                                                              <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" id="aktif<?= $mpp->mppID ?>" name="status" value="Aktif" <?php echo ($mpp->status == "Aktif") ? "checked" : ""; ?>>
                                                                  <label class="custom-control-label" for="aktif<?= $mpp->mppID ?>">Aktif</label>
                                                              </div>
                                                              <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" id="tidakaktif<?= $mpp->mppID ?>" name="status" value="Tidak Aktif" <?php echo ($mpp->status == "Tidak Aktif") ? "checked" : ""; ?>>
                                                                  <label class="custom-control-label" for="tidakaktif<?= $mpp->mppID ?>">Tidak Aktif</label>
                                                              </div>

                                                            </div>

                                                            <div class="form-group">
                                                              <label for="adminMPP<?= $mpp->mppID ?>">Admin MPP</label><br>
                                                              <div class="custom-control custom-checkbox">
                                                                  <input class="custom-control-input" type="checkbox" id="adminMPP<?= $mpp->mppID ?>" name="adminMPP" value="1" <?php echo $mpp->adminMPP ? 'checked' : ''; ?>>
                                                                  <label class="custom-control-label" for="adminMPP<?= $mpp->mppID ?>" style="color:blue;">*tandakan (/) sekiranya pelajar admin MPP</label>
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
                                         

                                         <a href="<?= base_url('mpp/deletempp/'.$warga.'/'.$mpp->mppID) ?>" ><button type="button" onclick="return confirm('Confirm delete the data?')" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
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
     
    </section>   
  </div>
        <script>
              function saveAdmin() {
                  var checkboxData = [];

                  // Loop through each checkbox to gather data
                  $('.adminCheckbox').each(function() {
                      var mppID = $(this).data('mppid'); 
                      var adminMPP = $(this).prop('checked') ? 1 : 0; 

                      checkboxData.push({ mppID: mppID, adminMPP: adminMPP });
                  });

                  $.ajax({
                      type: "POST",
                      url: "<?= base_url('mpp/adminmpp/'.$warga) ?>",
                      data: { checkboxData: checkboxData },
                      success: function(response) {
                          
                        $('#flashMessage').html('<div class="alert alert-success alert-dismissible fade show" role="alert"> Admin MPP Berjaya Disimpan! <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button></div>');
                        setTimeout(function() {
                              location.reload();
                          }, 1000);
                      }
                  });
              }

        </script>
