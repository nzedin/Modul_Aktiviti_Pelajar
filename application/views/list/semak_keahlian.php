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
          </div>
        </div>
      </div>
    </section>

    <?php if ($page == 'carian_jawatankuasa'): ?>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Carian Badan Pelajar</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-body">              
                        <div class="card-footer"> 
                            <form action="<?= base_url('club/carian_badan_pelajar/senarai_jawatankuasa/'.$warga) ?>" method="POST">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Badan Pelajar: </label>
                                    <div class="col-sm-8">
                                        <select name="clubID" id="clubID" class="form-control select2bs4" style="width: 100%;" required>
                                            <option value="" selected disabled>Pilih Badan Pelajar</option>
                                            <?php foreach ($club as $row): ?>
                                                <option value="<?= $row->CLUBID; ?>"><?= ucwords(strtolower($row->CLUBNAME)); ?></option>
                                            <?php endforeach; ?>
                                        </select>                                
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-info"><i class="fas fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </form> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php elseif ($page == 'senarai_jawatankuasa'): ?>
        <div id="flashMessage">
            <?= $this->session->flashdata('reminder'); ?>
        </div>
<section class="content">
    <div class="container-fluid">
        
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Senarai JawatanKuasa Badan Pelajar <?= ucwords(strtolower($clubID->CLUBNAME)); ?></h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            <div class="card-footer">
                <a href="<?= base_url('club/daftar_jawatankuasa/pendaftaran/'.$warga.'/'.$clubID->CLUBID); ?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Daftar Ahli</button></a>
            </div>
            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <table id="example1" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Matrik Pelajar</th>
                                <th style="text-align: center;">Nama Pelajar</th>
                                <th style="text-align: center;">Jawatan</th>
                                <th style="text-align: center;">Status</th>
                                <th style="text-align: center;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php $no = 1;
                          foreach($jawatankuasa as $kep): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($kep->STUDENTID)) ?></td>
                                  <td><?= ucwords(strtolower($kep->STUDENTNAME)) ?></td>
                                  <td><?= ucwords(strtolower($kep->COMMITTEE)) ?></td>
                                  <td><?= ucwords(strtolower($kep->STATUS)) ?></td>
                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                         
                                         <button data-toggle="modal" data-target="#editkepimpinan<?= $kep->KEPIMPINANID ?>"  class="btn btn-warning"><i class="fas fa-edit">  Edit</i></button>
                                         
                                         <div class="modal fade" id="editkepimpinan<?= $kep->KEPIMPINANID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Jawatankuasa Badan Pelajar <?= ucwords(strtolower($clubID->CLUBNAME)); ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('club/edit_jawatankuasa/'.$warga.'/'.$kep->KEPIMPINANID) ?>" method="POST">
                                                            <div style="text-align: left;" class="card-body">
                                                          
                                                            <input type="hidden" id="clubID" name="clubID" value="<?= $clubID->CLUBID; ?>">

                                                            <div class="form-group">
                                                              <label>Matrik Pelajar</label>
                                                              <input type="text" class="form-control" id="studentID" name="studentID" value="<?=  $kep->STUDENTID; ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Nama Pelajar</label>
                                                              <input type="text" class="form-control" id="studentName" name="studentName" value="<?=  $kep->STUDENTNAME; ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Program Pengajian</label>
                                                              <input type="text" class="form-control" id="program" name="program" value="<?=  $kep->PROGRAM; ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                              <label>Semester</label>
                                                              <input type="text" class="form-control" id="semester" name="semester" value="<?= $kep->SEMESTER; ?>" readonly>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                              <label>Jawatan</label>
                                                              <select name="committeeID" class="form-control select2bs4" style="width: 100%;" value="<?= $kep->COMMITTEEID; ?>" required>
                                                                <?php foreach ($committee as $comm): ?>
                                                                    <?php if ($comm->CATEGORYROLE == 'BADAN PELAJAR'): ?>
                                                                      <option value="<?= $comm->COMMITTEEID; ?>" <?php if($comm->COMMITTEEID == $kep->COMMITTEEID) echo 'selected'; ?> ><?= $comm->COMMITTEE; ?></option>
                                                                    <?php endif; ?>
                                                                <?php endforeach; ?>
                                                              </select>
                                                            </div>
                                                          <?php if( $warga == "staff" ): ?>
                                                           <div class="form-group">
                                                              <label>Status Pelajar</label>
                                                              <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" id="AKTIF<?= $kep->KEPIMPINANID ?>" name="status" value="AKTIF" <?php echo ($kep->STATUS == "AKTIF") ? "checked" : ""; ?> required>
                                                                  <label class="custom-control-label" for="AKTIF<?= $kep->KEPIMPINANID ?>">Aktif</label>
                                                              </div>
                                                              <div class="custom-control custom-radio">
                                                                  <input class="custom-control-input" type="radio" id="TIDAKAKTIF<?= $kep->KEPIMPINANID ?>" name="status" value="TIDAK AKTIF" <?php echo ($kep->STATUS == "TIDAK AKTIF") ? "checked" : ""; ?>>
                                                                  <label class="custom-control-label" for="TIDAKAKTIF<?= $kep->KEPIMPINANID ?>">Tidak Aktif</label>
                                                              </div>

                                                            </div>
                                                            <?php else: ?>
                                                              <input type="hidden" id="status" name="status" value="<?= $kep->STATUS; ?>">
                                                            <?php endif; ?>

                                                            
                                                              <div style="text-align: right;" class="card-footer">
                                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal"> Tutup</button>
                                                                  <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>   Simpan</button>
                                                              </div>
                                                        
                                                            </div>
                                                      </form>
                                                    </div>
                                                    
                                                  </div>
                                                </div>
                                              </div>
                                         

                                         <a href="<?= base_url('club/delete_jawatankuasa/'.$warga.'/'.$clubID->CLUBID.'/'.$kep->KEPIMPINANID) ?>" ><button type="button" onclick="return confirm('Confirm delete the data?')" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
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
    
   
</section>

<?php else: ?>

    <section class="content">
      <div class="container-fluid">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Pendaftaran Jawatankuasa Badan Pelajar <?= ucwords(strtolower($clubID->CLUBNAME)); ?></h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          
          <form action="<?= base_url('club/tambah_jawatankuasa/'.$warga .'/'. $clubID->CLUBID)?>" method="POST">
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

<?php endif ?>

  </div>
  
  