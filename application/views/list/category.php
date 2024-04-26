<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Kategori Badan Pelajar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Pendaftaran</li>
              <li class="breadcrumb-item active">Daftar Kategori Badan Pelajar</li>
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
              <h3 class="card-title">Senarai Kategori Badan Pelajar</h3>
  
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                
              </div>
            </div>
  
            <!-- /.card-header -->
  
            <div class="card-footer">
              <a href="<?= base_url('category/category/'.$warga)?>"><button class="btn btn-info"><i class="fas fa-plus"></i>  Tambah Kategori</button></a>
            </div>
            <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                    <table id="example1" class="table table-bordered table-hover">
                        
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Keterangan</th>
                                <th style="text-align: center;">Action</th>
                                
                            </tr>
                        </thead>
                        
                        <tbody>
                        <?php $no = 1;
                         foreach($category as $category): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td style="text-align: left;"><?= ucwords(strtolower($category->category)) ?></td>
                                <td style="text-align: left;"><?= ucwords(strtolower($category->descCategory)) ?></td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <button data-toggle="modal" data-target="#editcategory<?= $category->categoryID ?>"  class="btn btn-warning"><i class="fas fa-edit">  Edit</i></button>

                                        <div class="modal fade" id="editcategory<?= $category->categoryID ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                  <div class="modal-content">
                                                    <div class="modal-header">
                                                      <h5 class="modal-title" id="exampleModalLabel">Kemaskini Kategori Badan Pelajar</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                          <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                      <form action="<?= base_url('category/editcategory/'. $warga.'/'.$category->categoryID) ?>" method="POST">
                                                          <div style="text-align: left;" class="card-body">
                                                            
                                                                <div class="form-group">
                                                                  <label>Kategori Badan Pelajar</label>
                                                                  <input type="text" class="form-control" name="category" id="category" value="<?= $category->category ?>" >
                                                                  <?= form_error('category', '<div class="text-small text-danger">', '</div>'); ?>
                                                                </div>

                                                                <div class="form-group">
                                                                  <label for="descCategory">Keterangan</label>
                                                                  <textarea class="form-control" id="descCategory" name="descCategory" placeholder="Tandakan '-' sekiranya tidak berkenaan." rows="3"><?php echo $category->descCategory !== null ? htmlspecialchars($category->descCategory) : ''; ?></textarea>
                                                                </div>
                                                                
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
                                        <a href="<?= base_url('category/deletecategory/'. $warga.'/'.$category->categoryID) ?>" onclick="return confirm('Confirm delete the data?')"><button type="button" class="btn btn-danger"><i class="fas fa-trash">  Padam</i></button></a>
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







