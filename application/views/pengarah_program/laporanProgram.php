<head>
    <style>
        p {
            padding: 6px;
        }
    </style>
</head>
<body>
<div class="content-wrapper">
    <section class="content-header" >
            
            <div class="card card-widget widget-user" style="width: 95%; margin:5% auto;">
              
              <div class="row">
                   <div  id="printContent" class="card-body">
                       <div class="card card-info">
                           <div class="card-header">
                               <h2 class="card-title"><?= $title ?></h2>
                           </div>

                           <h5  style="background: #F2F4F4; padding: 10px; margin:10px;"><b>Maklumat Program</b></h5>
                               <div style="width: 90%; margin: auto;" class="card-body">
                                    

                               <input type="hidden" id="programID" name="programID" value="<?= $program->programID; ?>">

                                    <div class="form-group row">
                                        <label for="programName" class="col-sm-4 col-form-label">Nama Program</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <p id="programName"> <?= ucwords(strtolower($program->programName)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="clubName" class="col-sm-4 col-form-label">Anjuran Badan Pelajar</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <p id="clubName"> <?= ucwords(strtolower($program->clubName)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Tarikh Pelaksanaan Program</label>
                                        <p >:</p>
                                        <div class="col-sm-2">
                                            <p id="date"> <?= $program->startDate ?> </p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p id="date"><b>sehingga</b></p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p id="date"> <?= $program->endDate ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-4 col-form-label">Tempat</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <p id="tempat"> <?= ucwords(strtolower($program->programLocation)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Penyertaan Program (UMT)</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Penyertaan Program (Luar)</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Pencapaian (Sekiranya ada)</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Syor</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Objektif</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                                   
                               </div>

                               <h5  style="background: #F2F4F4; padding: 10px; margin:10px;"><b>Bantuan dan Kelulusan HEPA</b></h5>
                               <div style="width: 90%; margin: auto;" class="card-body">
                                   
                               <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Bantuan Kewangan HEPA</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Dana Tabung Amanah</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Kelulusan Kenderaan</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Kelulusan Sijil</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-4 col-form-label">Lain-lain Kelulusan</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                                        </div>
                                    </div>
                               </div>

                               <div class="card-footer">
                                    <button type="submit" class="btn btn-info"><i class="fas fa-save"></i>   Simpan</button>
                                    <button type="reset" class="btn btn-primary"><i class="fas fa-check"></i>   Hantar</button>
                               </div>
                       </div>
                   </div>
                </div>
           
              
        </div>
    </section>
</div>
</body>