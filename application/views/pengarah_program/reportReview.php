<head>

    <style>
        p {
            padding: 6px;
       
        }
        
    </style>
</head>
<body>
<div class="content-wrapper">
    <section class="content-header">
            
            <div class="card card-widget widget-user" style="width: 95%; margin:5% auto;">
              
              <div class="row">
                   <div class="card-body">
                       <div class="card card-info">
                           <div class="card-header">
                               <h2 class="card-title"><?= $title ?></h2>
                           </div>

                           <h5  style="background: #F2F4F4; padding: 10px; margin:10px;"><b>Maklumat Program</b></h5>
                               <div style="width: 90%; margin: auto;" class="card-body">
                                    

                               <input type="hidden" id="programID" name="programID" value="<?= $program->PROGRAMID; ?>">
                               <input type="hidden" id="laporanID" name="laporanID" value="<?= $program->LAPORANID; ?>">

                                    <div class="form-group row">
                                        <label for="programName" class="col-sm-4 col-form-label">Nama Program</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <p id="programName"> <?= ucwords(strtolower($program->PROGRAMNAME)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="clubName" class="col-sm-4 col-form-label">Anjuran Badan Pelajar</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <p id="clubName"> <?= ucwords(strtolower($program->CLUBNAME)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="date" class="col-sm-4 col-form-label">Tarikh Pelaksanaan Program</label>
                                        <p >:</p>
                                        <div class="col-sm-2">
                                            <p id="date"> <?= $program->STARTDATE ?> </p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p id="date"><b>sehingga</b></p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p id="date"> <?= $program->ENDDATE ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tempat" class="col-sm-4 col-form-label">Tempat</label>
                                        <p >:</p>
                                        <div class="col-sm-7">
                                            <p id="tempat"> <?= ucwords(strtolower($program->PROGRAMLOCATION)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="programUmt" class="col-sm-4 col-form-label">Penyertaan Program (UMT)</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="programUmt"> <?= ucwords(strtolower($program->PROGRAMUMT)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="programLuar" class="col-sm-4 col-form-label">Penyertaan Program (Luar)</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="programLuar"> <?= ucwords(strtolower($program->PROGRAMLUAR)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pencapaian" class="col-sm-4 col-form-label">Pencapaian (Sekiranya ada)</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="pencapaian"> <?= ucwords(strtolower($program->PENCAPAIAN)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="syor" class="col-sm-4 col-form-label">Syor</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="syor"> <?= ucwords(strtolower($program->SYOR)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="objektif" class="col-sm-4 col-form-label">Objektif</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="objektif"> <?= ucwords(strtolower($program->OBJEKTIF)) ?></p>
                                        </div>
                                    </div>

                                   
                               </div>

                                <h5  style="background: #F2F4F4; padding: 10px; margin:10px;"><b>Bantuan dan Kelulusan HEPA</b></h5>
                                <div style="width: 90%; margin: auto;" class="card-body">
                                   
                                    <div class="form-group row">
                                        <label for="bantuanKewanganHEPA" class="col-sm-4 col-form-label">Bantuan Kewangan HEPA</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="bantuanKewanganHEPA">RM <?= ucwords(strtolower($program->BANTUANKEWANGANHEPA)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="danaTabungAmanah" class="col-sm-4 col-form-label">Dana Tabung Amanah</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="danaTabungAmanah">RM <?= ucwords(strtolower($program->DANATABUNGAMANAH)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kelulusanKenderaan" class="col-sm-4 col-form-label">Kelulusan Kenderaan</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="kelulusanKenderaan"> <?= ucwords(strtolower($program->KELULUSANKENDERAAN)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kelulusanSijil" class="col-sm-4 col-form-label">Kelulusan Sijil</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="kelulusanSijil" p><?= $program->KELULUSANSIJIL ?>  keping sijil sahaja. Sijil akan ditandatangani oleh TNC(HEPA) manakala selebihnya oleh Ketua Penolong Pendaftar HEPA</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lainLainKelulusan" class="col-sm-4 col-form-label">Lain-lain Kelulusan</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="lainLainKelulusan"> <?= ucwords(strtolower($program->LAINLAINKELULUSAN)) ?></p>
                                        </div>
                                    </div>

                                    <?php if (strtotime($program->ENDDATE) < strtotime('+15 days')) { ?>
                                        <div class="form-group row">
                                            <label for="sebabLewat" class="col-sm-4 col-form-label">Alasan Kelewatan</label>
                                            <p>:</p>
                                            <div class="col-sm-7">
                                                <p id="sebabLewat"> <?= ucwords(strtolower($program->SEBABLEWAT)) ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                                
                                <?php if ($program->STATUSAPPROVAL == 3 || $program->STATUSAPPROVAL == 4): ?>
                                    <div class="card-footer">
                                        <div style="padding: 0 5%;" class="form-group row">
                                            <label for="comment" class="col-sm-4 col-form-label">Ulasan</label>
                                            <p>:</p>
                                            <div class="col-sm-7">
                                                <p id="comment"> <?= ucwords(strtolower($program->COMMENT)) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                       </div>

                        <div class="col-12">
                            <button type="button" onclick="window.print(location.href='<?= base_url('laporan/print_Report/'.$program->PROGRAMID)?>')" class="btn btn-info float-right"><i class="fa fa-print" aria-hidden="true"></i>  Print</button>
                        </div>
                   </div>
                </div> 

        </div>
    </section>
</div>

</body>
