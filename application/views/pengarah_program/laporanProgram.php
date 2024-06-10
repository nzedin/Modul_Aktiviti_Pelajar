<head>

    <style>
        p {
            padding: 6px;
        }
        .modal#updateApproval .modal-content, 
        .modal#statusSuccessModal .modal-content, 
        .modal#statusErrorsModal .modal-content,
        .modal#successSubmit .modal-content {
            border-radius: 30px;
        }
        .modal#updateApproval .modal-content svg, 
        .modal#statusSuccessModal .modal-content svg, 
        .modal#statusErrorsModal .modal-content svg ,
        .modal#successSubmit .modal-content svg {
            width: 100px; 
            display: block; 
            margin: 0 auto;
        }
        .modal#updateApproval .modal-content .path, 
        .modal#statusSuccessModal .modal-content .path, 
        .modal#statusErrorsModal .modal-content .path,
        .modal#successSubmit .modal-content .path {
            stroke-dasharray: 1000; 
            stroke-dashoffset: 0;
        }
        .modal#updateApproval .modal-content .path.circle, 
        .modal#statusSuccessModal .modal-content .path.circle, 
        .modal#statusErrorsModal .modal-content .path.circle,
        .modal#successSubmit .modal-content .path.circle  {
            -webkit-animation: dash 0.9s ease-in-out; 
            animation: dash 0.9s ease-in-out;
        }
        .modal#updateApproval .modal-content .path.line, 
        .modal#statusSuccessModal .modal-content .path.line, 
        .modal#statusErrorsModal .modal-content .path.line,
        .modal#successSubmit .modal-content .path.line {
            stroke-dashoffset: 1000; 
            -webkit-animation: dash 0.95s 0.35s ease-in-out forwards; 
            animation: dash 0.95s 0.35s ease-in-out forwards;
        }
        .modal#updateApproval .modal-content .path.check,     
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
        <?php if ($warga=='staff'):?>
            <div class="card card-widget widget-user" style="width: 95%; margin:5% auto;">
                <div class="row">
                    <div  id="printContent" class="card-body">
                        <div class="card card-info">
                            <div class="card-header">
                                <h2 class="card-title"><?= $title ?></h2>
                            </div>

                            <form id="approval" action="<?= base_url('laporan/update_Approval/'.$program->programID)?>" method="POST">
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
                                                <p id="Objektif"> <?= ucwords(strtolower($program->objektif)) ?></p>
                                            </div>
                                        </div>

                                    
                                </div>

                                <h5  style="background: #F2F4F4; padding: 10px; margin:10px;"><b>Bantuan dan Kelulusan HEPA</b></h5>
                                    <div style="width: 90%; margin: auto;" class="card-body">
                                    
                                            <div class="form-group row">
                                                <label for="bantuanKewanganHEPA" class="col-sm-4 col-form-label">Bantuan Kewangan HEPA (RM)</label>
                                                <p>: </p>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control" id="bantuanKewanganHEPA" name="bantuanKewanganHEPA" value="<?= $program->bantuanKewanganHEPA ?>" placeholder="Bantuan Kewangan HEPA">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="danaTabungAmanah" class="col-sm-4 col-form-label">Dana Tabung Amanah (RM)</label>
                                                <p>: </p>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control" id="danaTabungAmanah" name="danaTabungAmanah" value="<?= $program->danaTabungAmanah ?>" placeholder="Dana Tabung Amanah">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="kelulusanKenderaan" class="col-sm-4 col-form-label">Kelulusan Kenderaan</label>
                                                <p>:</p>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control" id="kelulusanKenderaan" name="kelulusanKenderaan" value="<?= ucwords(strtolower($program->kelulusanKenderaan)) ?>" placeholder="Kelulusan Kenderaan">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="kelulusanSijil" class="col-sm-4 col-form-label">Kelulusan Sijil</label>
                                                <p>:</p>
                                                <div class="col-sm-7">
                                                    <input type="number" class="form-control" id="kelulusanSijil" name="kelulusanSijil" value="<?= $program->kelulusanSijil ?>" placeholder="Kelulusan Sijil"> keping sijil sahaja. Sijil akan ditandatangani oleh TNC(HEPA) manakala selebihnya oleh Ketua Penolong Pendaftar HEPA</p>
                                                    
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

                                            <div class="form-group row">
                                                <label for="comment" class="col-sm-4 col-form-label">Ulasan</label>
                                                <p>:</p>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control" id="comment" name="comment" placeholder="Ulasan"><?= ucwords(strtolower($program->comment)) ?></textarea>
                                                </div>
                                            </div> 
                                        </div>

                                    <div class="card-footer">
                                        <input type="hidden" id="status" name="status" value="0">
                                        <button type="submit" id="submit-approve" data-bs-toggle="modal" data-bs-target="#updateApproval" class="btn btn-success" onclick="return confirm('Luluskan laporan?')"><i class="fas fa-check"></i>   Approve</button>
                                        <button type="submit" id="submit-reject" data-bs-toggle="modal" data-bs-target="#updateApproval" onclick="return confirm('Laporan Tidak Diluluskan?')" class="btn btn-danger"><i class="fas fa-times"></i>   Reject</button>
                                    </div>
                                </form>
                        </div>
                    </div>
                    </div>

                    <div class="modal fade" id="updateApproval" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
                        <div class="modal-content"> 
                            <div class="modal-body text-center p-lg-4"> 
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                    <circle class="path circle" fill="none" stroke="#198754" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                    <polyline class="path check" fill="none" stroke="#198754" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " /> 
                                </svg> 
                                <h4 class="text-success mt-3">Status Approval Successfully Updated</h4> 
                                <button onclick="window.location.href = '<?= base_url('laporan/report_submission_list/'.$warga)?>'"  class="btn btn-success" style="margin: 10px;width:50%;" data-bs-dismiss="modal">Close</button> 
                            </div> 
                        </div> 
                    </div> 
                </div>
                    
            </div>
        <?php else: ?>
            <div class="card card-widget widget-user" style="width: 95%; margin:5% auto;">
                <div class="row">
                    <div  id="printContent" class="card-body">
                        <div class="card card-info">
                            <div class="card-header">
                                <h2 class="card-title"><?= $title ?></h2>
                            </div>

                            <form id="reportForm" action="<?= base_url('laporan/saveReport/'.$program->programID)?>" method="POST">
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
                                                <textarea class="form-control" id="programUmt" name="programUmt" placeholder="Penyertaan Program (UMT)"><?= $program->programUmt ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="programLuar" class="col-sm-4 col-form-label">Penyertaan Program (Luar)</label>
                                            <p>:</p>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" id="programLuar" name="programLuar" placeholder="Penyertaan Program (Luar) (cth; VVIP,Perasmi,Penceramah,Jururlatih dll)"><?= $program->programLuar ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="pencapaian" class="col-sm-4 col-form-label">Pencapaian (Sekiranya ada)</label>
                                            <p>:</p>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" id="pencapaian" name="pencapaian" placeholder="Pencapaian (Sekiranya ada)"><?= $program->pencapaian ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="syor" class="col-sm-4 col-form-label">Syor</label>
                                            <p>:</p>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" id="syor" name="syor" placeholder="Syor"><?= $program->syor ?></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="objektif" class="col-sm-4 col-form-label">Objektif</label>
                                            <p>:</p>
                                            <div class="col-sm-7">
                                                <textarea class="form-control" id="objektif" name="objektif" placeholder="Objektif"><?= $program->objektif ?></textarea>
                                            </div>
                                        </div>

                                    
                                </div>

                                <h5  style="background: #F2F4F4; padding: 10px; margin:10px;"><b>Bantuan dan Kelulusan HEPA</b></h5>
                                    <div style="width: 90%; margin: auto;" class="card-body">
                                    
                                            <div class="form-group row">
                                                <label for="bantuanKewanganHEPA" class="col-sm-4 col-form-label">Bantuan Kewangan HEPA</label>
                                                <p>:</p>
                                                <div class="col-sm-7">
                                                    <?php if ($program->bantuanKewanganHEPA == null): ?>
                                                        <p id="bantuanKewanganHEPA">RM 0.00</p>
                                                    <?php else: ?>
                                                        <p id="bantuanKewanganHEPA">RM <?= ucwords(strtolower($program->bantuanKewanganHEPA)) ?></p>
                                                    <?php endif ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="danaTabungAmanah" class="col-sm-4 col-form-label">Dana Tabung Amanah</label>
                                                <p>:</p>
                                                <div class="col-sm-7">
                                                    <?php if ($program->danaTabungAmanah == null): ?>
                                                        <p id="danaTabungAmanah">RM 0.00</p>
                                                    <?php else: ?>
                                                        <p id="danaTabungAmanah">RM <?= ucwords(strtolower($program->danaTabungAmanah)) ?></p>
                                                    <?php endif ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="kelulusanKenderaan" class="col-sm-4 col-form-label">Kelulusan Kenderaan</label>
                                                <p>:</p>
                                                <div class="col-sm-7">
                                                    <?php if ($program->kelulusanKenderaan == null || $program->kelulusanKenderaan == '' ): ?>
                                                        <p id="kelulusanKenderaan">-</p>
                                                    <?php else: ?>
                                                        <p id="kelulusanKenderaan"><?= $program->kelulusanKenderaan ?> </p>
                                                    <?php endif ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="kelulusanSijil" class="col-sm-4 col-form-label">Kelulusan Sijil</label>
                                                <p>:</p>
                                                <div class="col-sm-7">
                                                    <?php if ($program->kelulusanSijil == null): ?>
                                                        <p id="kelulusanSijil">0 keping sijil sahaja. Sijil akan ditandatangani oleh TNC(HEPA) manakala selebihnya oleh Ketua Penolong Pendaftar HEPA</p>
                                                    <?php else: ?>
                                                        <p id="kelulusanSijil" p><?= $program->kelulusanSijil ?>  keping sijil sahaja. Sijil akan ditandatangani oleh TNC(HEPA) manakala selebihnya oleh Ketua Penolong Pendaftar HEPA</p>
                                                    <?php endif ?>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="lainLainKelulusan" class="col-sm-4 col-form-label">Lain-lain Kelulusan</label>
                                                <p>:</p>
                                                <div class="col-sm-7">
                                                    <textarea class="form-control" id="lainLainKelulusan" name="lainLainKelulusan" placeholder="Maklumat Lain-lain Kelulusan"><?= $program->lainLainKelulusan ?></textarea>
                                                </div>
                                            </div>

                                            <?php if (strtotime($program->endDate) < strtotime('+15 days')) { ?>
                                                <div class="form-group row">
                                                    <label for="sebabLewat" class="col-sm-4 col-form-label">Alasan Kelewatan</label>
                                                    <p>:</p>
                                                    <div class="col-sm-7">
                                                        <textarea class="form-control" id="sebabLewat" name="sebabLewat" placeholder="Sebab Lewat"><?= $program->sebabLewat ?></textarea>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <?php if ($program->statusApproval == 4): ?>
                                                <div class="form-group row">
                                                    <label for="comment" class="col-sm-4 col-form-label">Ulasan</label>
                                                    <p>:</p>
                                                    <div class="col-sm-7">
                                                        <p id="comment"> <?= ucwords(strtolower($program->comment)) ?></p>
                                                    </div>
                                                </div>
                                            <?php endif ?>

                                            <?php
                                                $currentDate = date('Y-m-d');
                                            ?>

                                            <input type="hidden" name="dateSubmission" value="<?php echo $currentDate; ?>">
                                        </div>

                                <div class="card-footer">
                                        <p>Sila lampirkan penyata kewangan aktiviti, salinan resit pembelian dan gambar aktiviti(bewarna) kepada 
                                        HEPA untuk kelulusan laporan ini selepas mengisi borang laporan ini. Kegagalan pihak saudara/i berbuat demikian 
                                        akan melambatkan proses kelulusan dan pengeluaran sijil AJK.</p><br>
                                        <input type="hidden" id="status" name="status" value="0">

                                        <?php if ($program->statusApproval == 4): ?>
                                            <button type="submit" id="submit-hantar" data-bs-toggle="modal" data-bs-target="#successSubmit" onclick="return confirm('Borang laporan yang telah dihantar tidak dapat dikemaskini lagi. Teruskan?')" class="btn btn-primary"><i class="fas fa-check"></i>   Hantar</button>
                                        <?php else: ?>
                                                <button type="submit" id="submit-simpan" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#statusSuccessModal"><i class="fas fa-save"></i>   Simpan</button>
                                                <button type="submit" id="submit-hantar" data-bs-toggle="modal" data-bs-target="#successSubmit" onclick="return confirm('Borang laporan yang telah dihantar tidak dapat dikemaskini lagi. Teruskan?')" class="btn btn-primary"><i class="fas fa-check"></i>   Hantar</button>
                                        <?php endif ?>
                                </div>
                                </form>
                        </div>
                    </div>
                    </div>
                    <div class="modal fade" id="statusSuccessModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
                            <div class="modal-content"> 
                                <div class="modal-body text-center p-lg-4"> 
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                        <circle class="path circle" fill="none" stroke="#198754" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                        <polyline class="path check" fill="none" stroke="#198754" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " /> 
                                    </svg> 
                                    <h4 class="text-success mt-3">Report Successfully Saved!</h4> 
                                    <button type="button" class="btn btn-success" style="margin: 10px;width:50%;" data-bs-dismiss="modal">Close</button> 
                                </div> 
                            </div> 
                        </div> 
                    </div>
                    <div class="modal fade" id="statusErrorsModal" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
                        <div class="modal-content"> 
                            <div class="modal-body text-center p-lg-4"> 
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                    <circle class="path circle" fill="none" stroke="#db3646" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" /> 
                                    <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="34.4" y1="37.9" x2="95.8" y2="92.3" />
                                    <line class="path line" fill="none" stroke="#db3646" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" x1="95.8" y1="38" X2="34.4" y2="92.2" /> 
                                </svg> 
                                <h4 class="text-danger mt-3">Report Unseccessfully Saved!</h4> 
                                <button type="button" class="btn btn-sm mt-3 btn-danger" data-bs-dismiss="modal">Ok</button> 
                            </div> 
                        </div> 
                    </div> 
                </div>
                <div class="modal fade" id="successSubmit" tabindex="-1" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false"> 
                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document"> 
                        <div class="modal-content"> 
                            <div class="modal-body text-center p-lg-4"> 
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                    <circle class="path circle" fill="none" stroke="#198754" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1" />
                                    <polyline class="path check" fill="none" stroke="#198754" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 " /> 
                                </svg> 
                                <h4 class="text-success mt-3">Report Successfully Submit!</h4> 
                                <button onclick="window.location.href = '<?= base_url('laporan/index/'.$warga.'/'.$student->studentID)?>'"  class="btn btn-success" style="margin: 10px;width:50%;" data-bs-dismiss="modal">Close</button> 
                            </div> 
                        </div> 
                    </div> 
                </div>
            </div>
        <?php endif ?>
    </section>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css"></script>
<script>
$(document).ready(function() {
    $('#reportForm').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        if ($(event.originalEvent.submitter).attr('id') === 'submit-hantar') {
            var statusValue = 2; 
            $('#status').val(statusValue); 
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#successSubmit').modal('show');
                    } 
                },
                error: function(xhr, status, error) {
                    // Handle the error
                    $('#statusErrorsModal').modal('show'); 
                    alert('There was an error submitting the form: ' + error);
                }
            });
        }

        if ($(event.originalEvent.submitter).attr('id') === 'submit-simpan') {
            var statusValue = 1; 
            $('#status').val(statusValue); 
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#statusSuccessModal').modal('show');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error
                    $('#statusErrorsModal').modal('show'); 
                    alert('There was an error submitting the form: ' + error);
                }
            });
        }

    });
});

$(document).ready(function() {
    $('#approval').on('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission

        if ($(event.originalEvent.submitter).attr('id') === 'submit-approve') {
            var statusValue = 3; 
            $('#status').val(statusValue); 
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#updateApproval').modal('show');
                    } 
                },
                error: function(xhr, status, error) {
                    // Handle the error
                    $('#statusErrorsModal').modal('show'); 
                    alert('There was an error submitting the form: ' + error);
                }
            });
        }

        if ($(event.originalEvent.submitter).attr('id') === 'submit-reject') {
            var statusValue = 4; 
            $('#status').val(statusValue); 
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#updateApproval').modal('show');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle the error
                    $('#statusErrorsModal').modal('show'); 
                    alert('There was an error submitting the form: ' + error);
                }
            });
        }

    });
});
</script>
</script>

