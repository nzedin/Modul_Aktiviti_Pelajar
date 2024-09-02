<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('img/mynemo.jpg')?>" />
  <title><?= $title ?></title>
  <style>
    .card {
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
        background-color: #fff;
    }

    h2 {
        background-color: #17a2b8;
        color: white;
        padding: 10px 20px;
        border-radius: 8px 8px 0 0;
    }

    .card-title {
        margin: 0;
        font-size: 1.5em;
    }

    .card-footer {
        background-color: #f2f4f4;
        padding: 10px 0;
        border-radius: 0 0 8px 8px;
    }

    h4 {
        background: #F2F4F4; 
        padding: 10px; 
        margin:10px;
    }

    .form-group {
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
    }

    .col-form-label {
        flex: 0 0 33%;
        max-width: 33%;
        font-weight: bold;
    }

    .col-sm-4, .col-sm-7, .col-sm-2 {
        padding: 0 15px;
    }

    .col-sm-4 {
        flex: 0 0 33%;
        max-width: 33%;
    }

    .col-sm-7 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .col-sm-2 {
        flex: 0 0 14%;
        max-width: 14%;
    }

    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }

    label {
        margin-bottom: 0;
        display: inline-block;
    }

    p {
        margin: 0;
        display: inline-block;
    }

    .float-right {
        float: right !important;
    }

    </style>
</head>
<body onload="window.print()">
<div class="content-wrapper">
    <section class="content-header">
            
            <div class="card card-widget widget-user" style="width: 95%; margin:5% auto;">
              
                   <div class="card-body">
                       <div class="card card-info">
                           <div class="cardheader">
                               <h2 class="card-title"><?= $title ?></h2>
                           </div>

                           <h4><b>Maklumat Program</b></h4>
                               <div style="width: 90%; margin: auto;" class="card-body">
                                    

                               <input type="hidden" id="programID" name="programID" value="<?= $program->PROGRAMID; ?>">

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
                                            <p id="date"> <?= date('d/m/Y', strtotime($program->STARTDATE)) ?> </p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p id="date"><b>sehingga</b></p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p id="date"> <?= date('d/m/Y', strtotime($program->ENDDATE)) ?></p>
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

                                <h4><b>Bantuan dan Kelulusan HEPA</b></h4>
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

                                <br><br>
                       </div>

                </div> 

        </div>
    </section>
</div>

</body>
