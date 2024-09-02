<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?= $title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Admin</li>
              <li class="breadcrumb-item">Laporan(Pelajar)</li>
              <li class="breadcrumb-item active"><?= $title ?></li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    
    <section class="content">
      <div class="container-fluid">

        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Peringatan Muatnaik Laporan Aktiviti</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
         
          <div class="card-body">
            <div class="card">
              
              <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    
                      <table id="example1" class="table table-bordered table-hover">
                          <thead>
                              <tr>
                                <th style="text-align: center;">No.</th>
                                <th style="text-align: center;">Badan Pelajar</th>
                                <th style="text-align: center;">Aktiviti</th>
                                <th style="text-align: center;">Tarikh Hantar Permohonan</th>
                                <th style="text-align: center;">Status Program</th>
                                <th style="text-align: center;">Tarikh Aktiviti</th>
                                <th style="text-align: center;">Tempat</th>
                                <th style="text-align: center;">Peringatan (email kepada Pengarah/SU)</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                            <?php $no = 1; foreach($laporan as $list): ?>
                              <?php if (strtotime($list->ENDDATE) < strtotime(date('Y-m-d'))): ?>
                                <?php if($list->STATUSAPPROVAL != 2 && $list->STATUSAPPROVAL != 3): ?>

                                  <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= ucwords(strtolower($list->CLUBNAME)) ?></td>
                                    <td><?= ucwords(strtolower($list->PROGRAMNAME)) ?></td>
                                    <td style="text-align: center;"><?= date('d/m/Y', strtotime($list->DATEAPPLY)) ?></td>
                                    <td <?php if (date('d/m/Y', strtotime($list->ENDDATE)) < strtotime(date('d/m/Y'))) { echo 'style="background-color: #3ae965;text-align: center;"';}else{echo 'style="background-color: #90daff;text-align: center;"';}?>>
                                    <?php echo "Selesai";  ?>
                                    </td>
                                    <td style="text-align: center;"><?= date('d/m/Y', strtotime($list->STARTDATE)) ?><br>-<br><?= date('d/m/Y', strtotime($list->ENDDATE)) ?></td>
                                    <td><?= ucwords(strtolower($list->PROGRAMLOCATION)) ?>, <br><?= ucwords(strtolower($list->STATENAME)) ?></td>
                                    <td style="text-align: center;">
                                    <a href="<?= base_url('email/send_email/' . $list->PENGARAHPROG .'/'. $list->PROGRAMID); ?> " ><button type="button" class="btn btn-info">Hantar Email</button></a>
                                    </td>
                                  </tr>
                                <?php endif ?>
                              <?php endif ?>
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

  	