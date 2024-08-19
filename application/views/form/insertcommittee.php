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
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Maklumat Jawatankuasa</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          
          <!-- /.card-header -->
          <form action="<?= base_url('committee/addcommittee/'.$warga)?>" method="POST">
            <div class="card-body">
                
                <!-- /.form-group -->
                <div class="form-group">
                   <label>Nama Jawatan</label>
                        <input type="text" class="form-control" name="committee" id="committee" placeholder="Nama Jawatan" >
                        <?= form_error('committee', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>
                    <div class="form-group">
                        <label>Merit</label>
                        <input type="number" class="form-control" name="merit" id="merit" placeholder="Merit" >
                        <?= form_error('merit', '<div class="text-small text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label>Kategori Jawatan</label>
                         <select name="categoryRoleID" class="form-control select2bs4" style="width: 100%;">
                         <option selected="selected">Pilih Kategori</option>
                            <?php foreach ($categoryrole as $categoryrole): ?>
                                <option value="<?= $categoryrole->CATEGORYROLEID; ?>"><?= $categoryrole->CATEGORYROLE; ?></option>
                            <?php endforeach; ?>
                         </select>
                        <?= form_error('categoryRoleID', '<div class="text-small text-danger">', '</div>'); ?>
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
  </div>
