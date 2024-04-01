<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori Jawatankuasa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Pendaftaran</li>
              <li class="breadcrumb-item active">Daftar Kategori Jawatankuasa</li>
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
              <h3 class="card-title">Senarai Kategori Jawatankuasa</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                
              </div>
            </div>
  
            <!-- /.card-header -->
  
            <div class="card-footer">
              <a href="<?= base_url('categoryrole/categoryrole/'.$warga)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah Kategori Jawatan</button></a>
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
                                <th>Kategori Jawatankuasa</th>
                                <th style="text-align: center;">Action</th>
                                
                            </tr>
                        </thead>
                        <?php $no = 1;
                         foreach($categoryrole as $categoryrole): ?>
                        <tbody>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td style="text-align: left;"><?= $categoryrole->categoryrole ?></td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button data-toggle="modal" data-target="#editcategoryrole<?= $categoryrole->categoryRoleID ?>"  class="btn btn-warning"><i class="fas fa-edit">Edit</i></button>

                                        <div class="modal fade" id="editcategoryrole<?= $categoryrole->categoryRoleID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Kategori Jawatankuasa</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('categoryrole/editcategoryrole/'.$warga.'/'. $categoryrole->categoryRoleID) ?>" method="POST">
                                                          <div style="text-align: left;" class="card-body">
                                                            
                                                                <div class="form-group">
                                                                  <label>Kategori Jawatankuasa</label>
                                                                  <input type="text" class="form-control" name="categoryrole" id="categoryrole" value="<?= $categoryrole->categoryrole ?>" >
                                                                  <?= form_error('categoryrole', '<div class="text-small text-danger">', '</div>'); ?>
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
                                       <a href="<?= base_url('categoryrole/deletecategoryrole/'.$warga.'/'.$categoryrole->categoryRoleID) ?>" onclick="return confirm('Confirm delete the data?')"><button type="button" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a> 
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







