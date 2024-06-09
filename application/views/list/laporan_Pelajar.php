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
            <h3 class="card-title">Senarai Ulasan Laporan Program</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          <div class="card-footer">
            <div style="text-align: center;">
              <a href="#" class="btn btn-warning" style="width:15%;border-radius:0%;" data-toggle="modal" data-target="#pendings"><i class="fa fa-spinner"></i> Pendings</a>
              <a href="#" class="btn btn-success" style="width:15%;border-radius:0%;" data-toggle="modal" data-target="#approved"><i class="fa fa-check"></i> Approved </a>
              <a href="#" class="btn btn-danger" style="width:15%;border-radius:0%;" data-toggle="modal" data-target="#disapproved"><i class="fa fa-exclamation-circle"></i> Disapproved </a>
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
                                <th style="text-align: center;">Tarikh Hantar Laporan</th>
                                <th style="text-align: center;">Ulasan Laporan</th>
                                <th style="text-align: center;">Kelulusan</th>
                                <th style="text-align: center;">Cetak Ulasan Laporan</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                            <?php $no = 1; foreach($laporan as $list): ?>
                                <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($list->clubName)) ?></td>
                                  <td><?= ucwords(strtolower($list->programName)) ?></td>
                                  <td style="text-align: center;"><?= $list->dateApply ?></td>
                                  <td <?php if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) { echo 'style="background-color: #3ae965;text-align: center;"';}else{echo 'style="background-color: #90daff;text-align: center;"';}?>>
                                  <?php
                                    if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) {
                                      echo "Selesai";
                                    }
                                    else{
                                      echo 'On-Going';
                                    } 
                                  ?>
                                  </td>
                                  <td style="text-align: center;"><?= $list->startDate ?><br>-<br><?= $list->endDate ?></td>
                                  <td><?= ucwords(strtolower($list->programLocation)) ?>, <br><?= ucwords(strtolower($list->stateName)) ?></td>
                                  <td style="text-align: center;"><?= $list->dateSubmission ?></td>
                                  <td style="text-align: center;"><?php
                                      if ($list->comment == null) {
                                        echo "<span class='badge badge-secondary'>Not Assign</span>";
                                      }
                                      else{
                                        echo ucwords(strtolower($list->comment));
                                      } 
                                    ?>
                                  </td>
                                  <td style="text-align: center;"> 
                                    <?php
                                      if ($list->statusApproval == 2) {
                                        echo "<span class='badge badge-warning'>Pending</span>";
                                      }
                                      else if ($list->statusApproval == 3){
                                        echo "<span class='badge badge-success'> Approved</span>";
                                      } else {
                                        echo "<span class='badge badge-danger'> Not Approved</span>";
                                      }
                                    ?>
                                  </td>
                                  <td style="text-align: center;">
                                      <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                      <a href="<?= base_url($list->statusApproval == 1 || $list->statusApproval == 4 || $list->statusApproval === null ? 'laporan/laporanProgram/' . $warga . '/' . $list->programID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
                                      </div>
                                  </td>
                                </tr>
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

  	
  	<!--Modal Pendings-->
  <div class="modal fade" id="pendings">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<div class="card-title">
						<h5>Pending Approval Report</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
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
                    <th style="text-align: center;">Tarikh Hantar Laporan</th>
                    <th style="text-align: center;">Ulasan Laporan</th>
                    <th style="text-align: center;">Kelulusan</th>
                    <th style="text-align: center;">Cetak Ulasan Laporan</th>
                  </tr>
              </thead>
              
              <tbody>
                <?php $no = 1; foreach($laporan as $list): ?>
                  <?php if ($list->statusApproval == 2): ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= ucwords(strtolower($list->clubName)) ?></td>
                      <td><?= ucwords(strtolower($list->programName)) ?></td>
                      <td style="text-align: center;"><?= $list->dateApply ?></td>
                      <td <?php if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) { echo 'style="background-color: #3ae965;text-align: center;"';}else{echo 'style="background-color: #90daff;text-align: center;"';}?>>
                      <?php
                        if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) {
                          echo "Selesai";
                        }
                        else{
                          echo 'On-Going';
                        } 
                      ?>
                      </td>
                      <td style="text-align: center;"><?= $list->startDate ?><br>-<br><?= $list->endDate ?></td>
                      <td><?= ucwords(strtolower($list->programLocation)) ?>, <br><?= ucwords(strtolower($list->stateName)) ?></td>
                      <td style="text-align: center;"><?= $list->dateSubmission ?></td>
                      <td style="text-align: center;"><?php
                          if ($list->comment == null) {
                            echo "<span class='badge badge-secondary'>Not Assign</span>";
                          }
                          else{
                            echo ucwords(strtolower($list->comment));
                          } 
                        ?>
                      </td>
                      <td style="text-align: center;"> <?php echo "<span class='badge badge-warning'>Pending</span>"; ?></td>
                      <td style="text-align: center;">
                          <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                          <a href="<?= base_url($list->statusApproval == 1 || $list->statusApproval == 4 || $list->statusApproval === null ? 'laporan/laporanProgram/' . $warga . '/' . $list->programID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
                          </div>
                      </td>
                    </tr>
                    <?php endif ?>
                <?php endforeach ?>
              </tbody>
          </table>
				</div>
			</div>
		</div>
	</div>
 
  	<!--Modal Approved-->
    <div class="modal fade" id="approved">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<div class="card-title">
						<h5>Approved Report</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
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
                      <th style="text-align: center;">Tarikh Hantar Laporan</th>
                      <th style="text-align: center;">Ulasan Laporan</th>
                      <th style="text-align: center;">Kelulusan</th>
                      <th style="text-align: center;">Cetak Ulasan Laporan</th>
                    </tr>
                </thead>
                
                <tbody>
                  <?php $no = 1; foreach($laporan as $list): ?>
                    <?php if ($list->statusApproval == 3): ?>
                      <tr>
                        <td><?= $no++ ?></td>
                        <td><?= ucwords(strtolower($list->clubName)) ?></td>
                        <td><?= ucwords(strtolower($list->programName)) ?></td>
                        <td style="text-align: center;"><?= $list->dateApply ?></td>
                        <td <?php if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) { echo 'style="background-color: #3ae965;text-align: center;"';}else{echo 'style="background-color: #90daff;text-align: center;"';}?>>
                        <?php
                          if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) {
                            echo "Selesai";
                          }
                          else{
                            echo 'On-Going';
                          } 
                        ?>
                        </td>
                        <td style="text-align: center;"><?= $list->startDate ?><br>-<br><?= $list->endDate ?></td>
                        <td><?= ucwords(strtolower($list->programLocation)) ?>, <br><?= ucwords(strtolower($list->stateName)) ?></td>
                        <td style="text-align: center;"><?= $list->dateSubmission ?></td>
                        <td style="text-align: center;"><?php
                            if ($list->comment == null) {
                              echo "<span class='badge badge-secondary'>Not Assign</span>";
                            }
                            else{
                              echo ucwords(strtolower($list->comment));
                            } 
                          ?>
                        </td>
                        <td style="text-align: center;"> <?php echo "<span class='badge badge-success'>Approved</span>"; ?></td>
                        <td style="text-align: center;">
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="<?= base_url($list->statusApproval == 1 || $list->statusApproval == 4 || $list->statusApproval === null ? 'laporan/laporanProgram/' . $warga . '/' . $list->programID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
                            </div>
                        </td>
                      </tr>
                      <?php endif ?>
                  <?php endforeach ?>
                </tbody>
            </table>
				</div>
			</div>
		</div>
	</div>

  <!--Modal Disapproved-->
  <div class="modal fade" id="disapproved">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<div class="card-title">
						<h5>Disapproved Report</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
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
                  <th style="text-align: center;">Tarikh Hantar Laporan</th>
                  <th style="text-align: center;">Ulasan Laporan</th>
                  <th style="text-align: center;">Kelulusan</th>
                  <th style="text-align: center;">Cetak Ulasan Laporan</th>
                </tr>
            </thead>
            
            <tbody>
              <?php $no = 1; foreach($laporan as $list): ?>
                <?php if ($list->statusApproval == 4): ?>
                  <tr>
                    <td><?= $no++ ?></td>
                    <td><?= ucwords(strtolower($list->clubName)) ?></td>
                    <td><?= ucwords(strtolower($list->programName)) ?></td>
                    <td style="text-align: center;"><?= $list->dateApply ?></td>
                    <td <?php if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) { echo 'style="background-color: #3ae965;text-align: center;"';}else{echo 'style="background-color: #90daff;text-align: center;"';}?>>
                    <?php
                      if (strtotime($list->endDate) < strtotime(date('Y-m-d'))) {
                        echo "Selesai";
                      }
                      else{
                        echo 'On-Going';
                      } 
                    ?>
                    </td>
                    <td style="text-align: center;"><?= $list->startDate ?><br>-<br><?= $list->endDate ?></td>
                    <td><?= ucwords(strtolower($list->programLocation)) ?>, <br><?= ucwords(strtolower($list->stateName)) ?></td>
                    <td style="text-align: center;"><?= $list->dateSubmission ?></td>
                    <td style="text-align: center;"><?php
                        if ($list->comment == null) {
                          echo "<span class='badge badge-secondary'>Not Assign</span>";
                        }
                        else{
                          echo ucwords(strtolower($list->comment));
                        } 
                      ?>
                    </td>
                    <td style="text-align: center;"> <?php echo "<span class='badge badge-danger'>Not Approved</span>"; ?></td>
                    <td style="text-align: center;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="<?= base_url($list->statusApproval == 1 || $list->statusApproval == 4 || $list->statusApproval === null ? 'laporan/laporanProgram/' . $warga . '/' . $list->programID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
                        </div>
                    </td>
                  </tr>
                  <?php endif ?>
              <?php endforeach ?>
            </tbody>
          </table>
				</div>
			</div>
		</div>
	</div>
 