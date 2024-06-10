<head>

    <style>
        p {
            padding: 6px;
        }
        .modal#statusSuccessModal .modal-content, 
        .modal#statusErrorsModal .modal-content,
        .modal#successSubmit .modal-content {
            border-radius: 30px;
        }
        .modal#statusSuccessModal .modal-content svg, 
        .modal#statusErrorsModal .modal-content svg ,
        .modal#successSubmit .modal-content svg {
            width: 100px; 
            display: block; 
            margin: 0 auto;
        }
        .modal#statusSuccessModal .modal-content .path, 
        .modal#statusErrorsModal .modal-content .path,
        .modal#successSubmit .modal-content .path {
            stroke-dasharray: 1000; 
            stroke-dashoffset: 0;
        }
        .modal#statusSuccessModal .modal-content .path.circle, 
        .modal#statusErrorsModal .modal-content .path.circle,
        .modal#successSubmit .modal-content .path.circle  {
            -webkit-animation: dash 0.9s ease-in-out; 
            animation: dash 0.9s ease-in-out;
        }
        .modal#statusSuccessModal .modal-content .path.line, 
        .modal#statusErrorsModal .modal-content .path.line,
        .modal#successSubmit .modal-content .path.line {
            stroke-dashoffset: 1000; 
            -webkit-animation: dash 0.95s 0.35s ease-in-out forwards; 
            animation: dash 0.95s 0.35s ease-in-out forwards;
        }
        .modal#statusSuccessModal .modal-content .path.check, 
        .modal#statusErrorsModal .modal-content .path.check ,
        .modal#successSubmit .modal-content .path.check {
            stroke-dashoffset: -100; 
            -webkit-animation: dash-check 0.95s 0.35s ease-in-out forwards; 
            animation: dash-check 0.95s 0.35s ease-in-out forwards;
        }

        @-webkit-keyframes dash { 
            0% {
                stroke-dashoffset: 1000;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes dash { 
            0% {
                stroke-dashoffset: 1000;
            }
            100%{
                stroke-dashoffset: 0;
            }
        }
        @-webkit-keyframes dash { 
            0% {
                stroke-dashoffset: 1000;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }
        @keyframes dash { 
            0% {
                stroke-dashoffset: 1000;}
            100% {
                stroke-dashoffset: 0;
            }
        }
        @-webkit-keyframes dash-check { 
            0% {
                stroke-dashoffset: -100;
            }
            100% {
                stroke-dashoffset: 900;
            }
        }
        @keyframes dash-check {
            0% {
                stroke-dashoffset: -100;
            }
            100% {
                stroke-dashoffset: 900;
            }
        }
        .box00{
            width: 100px;
            height: 100px;
            border-radius: 50%;
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
                               <input type="hidden" id="laporanID" name="laporanID" value="<?= $program->laporanID; ?>">

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
                                        <label for="programUmt" class="col-sm-4 col-form-label">Penyertaan Program (UMT)</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="programUmt"> <?= ucwords(strtolower($program->programUmt)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="programLuar" class="col-sm-4 col-form-label">Penyertaan Program (Luar)</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="programLuar"> <?= ucwords(strtolower($program->programLuar)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="pencapaian" class="col-sm-4 col-form-label">Pencapaian (Sekiranya ada)</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="pencapaian"> <?= ucwords(strtolower($program->pencapaian)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="syor" class="col-sm-4 col-form-label">Syor</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="syor"> <?= ucwords(strtolower($program->syor)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="objektif" class="col-sm-4 col-form-label">Objektif</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="objektif"> <?= ucwords(strtolower($program->objektif)) ?></p>
                                        </div>
                                    </div>

                                   
                               </div>

                                <h5  style="background: #F2F4F4; padding: 10px; margin:10px;"><b>Bantuan dan Kelulusan HEPA</b></h5>
                                <div style="width: 90%; margin: auto;" class="card-body">
                                   
                                    <div class="form-group row">
                                        <label for="bantuanKewanganHEPA" class="col-sm-4 col-form-label">Bantuan Kewangan HEPA</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="bantuanKewanganHEPA">RM <?= ucwords(strtolower($program->bantuanKewanganHEPA)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="danaTabungAmanah" class="col-sm-4 col-form-label">Dana Tabung Amanah</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="danaTabungAmanah">RM <?= ucwords(strtolower($program->danaTabungAmanah)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kelulusanKenderaan" class="col-sm-4 col-form-label">Kelulusan Kenderaan</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="kelulusanKenderaan"> <?= ucwords(strtolower($program->kelulusanKenderaan)) ?></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kelulusanSijil" class="col-sm-4 col-form-label">Kelulusan Sijil</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="kelulusanSijil" p><?= $program->kelulusanSijil ?>  keping sijil sahaja. Sijil akan ditandatangani oleh TNC(HEPA) manakala selebihnya oleh Ketua Penolong Pendaftar HEPA</p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="lainLainKelulusan" class="col-sm-4 col-form-label">Lain-lain Kelulusan</label>
                                        <p>:</p>
                                        <div class="col-sm-7">
                                            <p id="lainLainKelulusan"> <?= ucwords(strtolower($program->lainLainKelulusan)) ?></p>
                                        </div>
                                    </div>

                                    <?php if (strtotime($program->endDate) < strtotime('+15 days')) { ?>
                                        <div class="form-group row">
                                            <label for="sebabLewat" class="col-sm-4 col-form-label">Alasan Kelewatan</label>
                                            <p>:</p>
                                            <div class="col-sm-7">
                                                <p id="sebabLewat"> <?= ucwords(strtolower($program->sebabLewat)) ?></p>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>

                                
                                <?php if ($program->statusApproval == 3 || $program->statusApproval == 4): ?>
                                    <div class="card-footer">
                                        <div style="padding: 0 5%;" class="form-group row">
                                            <label for="comment" class="col-sm-4 col-form-label">Ulasan</label>
                                            <p>:</p>
                                            <div class="col-sm-7">
                                                <p id="comment"> <?= ucwords(strtolower($program->comment)) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                       </div>
                   </div>
                </div>
                                
              
        </div>
    </section>
</div>
</body>
