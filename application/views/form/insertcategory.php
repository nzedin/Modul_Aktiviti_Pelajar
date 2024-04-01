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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Maklumat Kategori Badan Pelajar</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>

          <!-- /.card-header -->

          <form action="<?= base_url('category/addcategory/'.$warga)?>" method="POST">
          <div class="card-body">
            
                <div class="form-group">
                  <label>Kategori Badan Pelajar</label>
                  <input type="text" class="form-control" name="category" id="category" placeholder="Kategori Badan Pelajar" >
                  <?= form_error('category', '<div class="text-small text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                  <label for="descCategory">Keterangan</label>
                  <textarea class="form-control" id="descCategory" name="descCategory" placeholder="Tandakan '-' sekiranya tidak berkenaan." rows="3"></textarea>
                </div>
              
          <!-- /.card-body -->
          <div class="card-footer">
              <button type="reset" class="btn btn-danger"><i class="fas fa-trash"></i>   Reset</button>
              <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>   Simpan</button>
            </div>
         
            </div>
            </form>
         <!-- /.card -->

        </div>
     
    </section>
    <!-- /.content -->
  </div>