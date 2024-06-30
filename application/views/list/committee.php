<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jawatankuasa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Pendaftaran</li>
              <li class="breadcrumb-item active">Daftar Jawatankuasa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?= $this->session->flashdata('reminder'); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Senarai Maklumat Jawatankuasa</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                
              </div>
            </div>
  
            <!-- /.card-header -->
  
            <div class="card-footer">
              <a href="<?= base_url('committee/committee/'.$warga)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah Jawatan</button></a>
            </div>
            <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                    <table id="example1" class="table table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jawatan</th>
                                <th>Merit</th>
                                <th>Kategori Jawatan</th>
                                <th style="text-align: center;">Action</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no = 1;
                         foreach($committee as $committee): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= ucwords(strtolower($committee->committee)) ?></td>
                                <td><?= $committee->merit ?></td>
                                <td><?= ucwords(strtolower($committee->categoryrole_name)) ?></td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button data-toggle="modal" data-target="#editcommittee<?= $committee->committeeID ?>"  class="btn btn-warning"><i class="fas fa-edit">  Edit</i></button>

                                        <div class="modal fade" id="editcommittee<?= $committee->committeeID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Jawatankuasa</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('committee/editcommittee/'. $warga.'/'.$committee->committeeID) ?>" method="POST">
                                                          <div style="text-align: left;" class="card-body">
                
                                                              <div class="form-group">
                                                                <label>Nama Jawatan</label>
                                                                <input type="text" class="form-control" name="committee" id="committee" placeholder="Nama Jawatan" value="<?= $committee->committee ?>">
                                                                <?= form_error('committee', '<div class="text-small text-danger">', '</div>'); ?>
                                                              </div>
                                                              <div class="form-group">
                                                                <label>Merit</label>
                                                                <input type="number" class="form-control" name="merit" id="merit" placeholder="Merit" value="<?= $committee->merit ?>">
                                                                <?= form_error('merit', '<div class="text-small text-danger">', '</div>'); ?>
                                                              </div>

                                                              <div class="form-group">
                                                                <label>Kategori Jawatan</label>
                                                                <select name="categoryRoleID" class="form-control select2bs4" style="width: 100%;" value="<?= $committee->categoryroleID ?>">
                                                                <?php foreach ($categoryrole as $catrole): ?>
                                                                  <option value="<?= $catrole->categoryRoleID; ?>" <?php if($committee->categoryRoleID == $catrole->categoryRoleID) echo 'selected'; ?> ><?= $catrole->categoryrole; ?></option>
                                                                <?php endforeach; ?>
                                                                </select>
                                                                <?= form_error('categoryRoleID', '<div class="text-small text-danger">', '</div>'); ?>
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
                                        <a href="<?= base_url('committee/deletecommittee/'.$warga.'/'.$committee->committeeID) ?>" onclick="return confirm('Confirm delete the data?')"><button type="button" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
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








