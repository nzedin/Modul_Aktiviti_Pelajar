


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
              <li class="breadcrumb-item">Pendaftaran Ahli</li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
            <form method="POST" action="<?= base_url('club/showlist/'.$warga) ?>">
                <div class="card-body">              
                    <div class="card-footer"> 
                        <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Sila Pilih Badan Pelajar:</label>
                                <div class="col-sm-8">
                                    <select name="clubID" class="form-control select2bs4" style="width: 100%;" required>
                                        <option value="" selected disabled>Pilih Badan Pelajar</option>
                                        <?php foreach ($club as $cl): ?>
                                            <option value="<?= $cl->CLUBID; ?>"><?= ucwords(strtolower($cl->CLUBNAME)); ?></option>
                                        <?php endforeach; ?>
                                        
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                <button type="submit" id="submitBtn" class="btn btn-info"><i class="fas fa-save"></i>   Papar</button>
                                </div>
                        </div>
                    </div> 
                </div>
            </form>
       
    </section> 

    
    
       
</div>
