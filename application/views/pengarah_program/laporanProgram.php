<head>

    <style>
        p {
            padding: 6px;
        }
        .modal#statusSuccessModal .modal-content{
            border-radius: 30px;
        }
        .modal#statusSuccessModal .modal-content svg{
            width: 100px; 
            display: block; 
            margin: 0 auto;
        }
        .modal#statusSuccessModal .modal-content .path {
            stroke-dasharray: 1000; 
            stroke-dashoffset: 0;
        }
        .modal#statusSuccessModal .modal-content .path.circle{
            -webkit-animation: dash 0.9s ease-in-out; 
            animation: dash 0.9s ease-in-out;
        }
        .modal#statusSuccessModal .modal-content .path.line {
            stroke-dashoffset: 1000; 
            -webkit-animation: dash 0.95s 0.35s ease-in-out forwards; 
            animation: dash 0.95s 0.35s ease-in-out forwards;
        }
        .modal#statusSuccessModal .modal-content .path.check{
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
            width: 300px;
            height: 150px;
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

                           <form id="reportForm" action="<?= base_url('laporan/saveReport/'.$warga.'/'.$program->programID)?>" method="POST">
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
                                            <textarea class="form-control" id="programLuar" name="programLuar" placeholder="Penyertaan Program (Luar)"><?= $program->programLuar ?></textarea>
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
                                        <textarea class="form-control" id="bantuanKewanganHEPA" name="bantuanKewanganHEPA" placeholder="Maklumat Bantuan Kewangan HEPA"><?= $program->bantuanKewanganHEPA ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="danaTabungAmanah" class="col-sm-4 col-form-label">Dana Tabung Amanah</label>
                                    <p>:</p>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="danaTabungAmanah" name="danaTabungAmanah" placeholder="Maklumat Dana Tabung Amanah"><?= $program->danaTabungAmanah ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kelulusanKenderaan" class="col-sm-4 col-form-label">Kelulusan Kenderaan</label>
                                    <p>:</p>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="kelulusanKenderaan" name="kelulusanKenderaan" placeholder="Maklumat Kelulusan Kenderaan"><?= $program->kelulusanKenderaan ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="kelulusanSijil" class="col-sm-4 col-form-label">Kelulusan Sijil</label>
                                    <p>:</p>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="kelulusanSijil" name="kelulusanSijil" placeholder="Maklumat Kelulusan Sijil"><?= $program->kelulusanSijil ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lainLainKelulusan" class="col-sm-4 col-form-label">Lain-lain Kelulusan</label>
                                    <p>:</p>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="lainLainKelulusan" name="lainLainKelulusan" placeholder="Maklumat Lain-lain Kelulusan"><?= $program->lainLainKelulusan ?></textarea>
                                    </div>
                                </div>

                               </div>

                               <div class="card-footer">
                                <p>Sila lampirkan penyata kewangan aktiviti, salinan resit pembelian dan gambar aktiviti(bewarna) kepada 
                                HEPA untuk kelulusan laporan ini selepas mengisi borang laporan ini. Kegagalan pihak saudara/i berbuat demikian 
                                akan melambatkan proses kelulusan dan pengeluaran sijil AJK.</p><br>

                                    <input type="hidden" name="status" value="0">
                                    <button type="submit" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#statusSuccessModal"><i class="fas fa-save"></i>   Simpan</button>
                                    
                                    <button type="submit" onclick="return confirm('Borang laporan yang telah dihantar tidak dapat dikemaskini lagi. Teruskan?')" class="btn btn-primary"><i class="fas fa-check"></i>   Hantar</button>
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
                                                <button type="button" class="btn btn-success" style="margin: 10px;width:50%;" data-bs-dismiss="modal">Ok</button> 
                                            </div> 
                                        </div> 
                                    </div> 
                                </div>
              
        </div>
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

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                if (response.success) {
                    // Show success modal
                    $('#statusSuccessModal').modal('show');
                } else {
                    // Handle other cases, if needed
                }
            },
            error: function(xhr, status, error) {
                // Handle the error
                alert('There was an error submitting the form: ' + error);
            }
        });
    });
});
</script>