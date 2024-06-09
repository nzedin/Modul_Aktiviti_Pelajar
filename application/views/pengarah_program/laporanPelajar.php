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
              <li class="breadcrumb-item">Laporan</li>
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
            <h3 class="card-title">Senarai Laporan Aktiviti / Program</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              
            </div>
          </div>
          <div class="card-footer">
            <div style="text-align: center;">
              <a href="#" class="btn btn-secondary" style="width:15%;border-radius:0%;" data-toggle="modal" data-target="#nosubmission"><i class="fa fa-tasks"></i> No Submission</a>
              <a href="#" class="btn btn-primary" style="width:15%;border-radius:0%;" data-toggle="modal" data-target="#indraft"><i class="fa fa-save"></i> In Draf</a>
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
                                  <th style="text-align: center;">Tarikh Aktiviti</th>
                                  <th style="text-align: center;">Nama Program</th>
                                  <th style="text-align: center;">Status</th>
                                  <th style="text-align: center;">Cetak Laporan</th>
                                  <th style="text-align: center;">Ulasan Laporan</th>
                              </tr>
                          </thead>
                          
                          <tbody>
                          <?php $no = 1;
                          foreach($laporan as $list): ?>
                              <tr>
                                  <td><?= $no++ ?></td>
                                  <td><?= ucwords(strtolower($list->clubName)) ?></td>
                                  <td><?= $list->startDate ?></td>
                                  <td><?= ucwords(strtolower($list->programName)) ?></td>

                                  <td style="text-align: center;"> <?php
                                        if ($list->statusApproval == null) {
                                          echo "<span class='badge badge-secondary'>No Submission</span>";
                                        }
                                        else if ($list->statusApproval == 1) {
                                          echo "<span class='badge badge-primary'>In Draft</span>";
                                        }
                                        else if ($list->statusApproval == 2) {
                                          echo "<span class='badge badge-warning'>Pending</span>";
                                        }
                                        else if ($list->statusApproval == 3){
                                          echo "<span class='badge badge-success'> Approved</span>";
                                        } else {
                                          echo "<span class='badge badge-danger'> Not Approved</span>";
                                        }
                                      ?>
                                  </td>
                                  <td style="text-align: center;">-</td>

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

  	<!--Modal No Submission-->
    <div class="modal fade" id="nosubmission">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-secondary">
					<div class="card-title">
						<h5>No Submission Report</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Badan Pelajar</th>
                    <th style="text-align: center;">Tarikh Aktiviti</th>
                    <th style="text-align: center;">Nama Program</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Ulasan Laporan</th>
                </tr>
            </thead>
            
            <tbody>
            <?php $no = 1;
            foreach($laporan as $list): ?>
              <?php if ($list->statusApproval == null): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= ucwords(strtolower($list->clubName)) ?></td>
                    <td <?php if (strtotime($list->endDate) < strtotime('+15 days')):?> style="background-color: #c94c4c;color:white;"<?php endif ?>><?= $list->startDate ?></td>
                    <td><?= ucwords(strtolower($list->programName)) ?></td>

                    <td style="text-align: center;"> <?php
                            echo "<span class='badge badge-secondary'>No Submission</span>";
                        ?>
                    </td>

                    <td style="text-align: center;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="<?= base_url($list->statusApproval == 1 || $list->statusApproval == 4 ||  $list->statusApproval === null ? 'laporan/laporanProgram/' . $warga . '/' . $list->programID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
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

  	<!--Modal In Draft-->
  <div class="modal fade" id="indraft">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<div class="card-title">
						<h5>In Draft Report</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table id="example1" class="table table-bordered table-hover">
          <thead>
              <tr>
                  <th style="text-align: center;">No.</th>
                  <th style="text-align: center;">Badan Pelajar</th>
                  <th style="text-align: center;">Tarikh Aktiviti</th>
                  <th style="text-align: center;">Nama Program</th>
                  <th style="text-align: center;">Status</th>
                  <th style="text-align: center;">Ulasan Laporan</th>
              </tr>
          </thead>
          
          <tbody>
          <?php $no = 1;
          foreach($laporan as $list): ?>
            <?php if ($list->statusApproval == 1): ?>
              <tr>
                  <td><?= $no++ ?></td>
                  <td><?= ucwords(strtolower($list->clubName)) ?></td>
                  <td <?php if (strtotime($list->endDate) < strtotime('+15 days')):?> style="background-color: #c94c4c;color:white;"<?php endif ?>><?= $list->startDate ?></td>
                  <td><?= ucwords(strtolower($list->programName)) ?></td>

                  <td style="text-align: center;"> <?php
                          echo "<span class='badge badge-primary'>In Draft</span>";
                      ?>
                  </td>

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
 
  	<!--Modal Pendings-->
  <div class="modal fade" id="pendings">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header bg-warning">
					<div class="card-title">
						<h5>Pending Report</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table id="example1" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th style="text-align: center;">No.</th>
                    <th style="text-align: center;">Badan Pelajar</th>
                    <th style="text-align: center;">Tarikh Aktiviti</th>
                    <th style="text-align: center;">Nama Program</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Ulasan Laporan</th>
                </tr>
            </thead>
            
            <tbody>
            <?php $no = 1;
            foreach($laporan as $list): ?>
              <?php if ($list->statusApproval == 2): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= ucwords(strtolower($list->clubName)) ?></td>
                    <td <?php if (strtotime($list->endDate) < strtotime('+15 days')):?> style="background-color: #c94c4c;color:white;"<?php endif ?>><?= $list->startDate ?></td>
                    <td><?= ucwords(strtolower($list->programName)) ?></td>

                    <td style="text-align: center;"> <?php
                            echo "<span class='badge badge-warning'>Pending</span>";
                        ?>
                    </td>

                    <td style="text-align: center;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="<?= base_url($list->statusApproval == 1 || $list->statusApproval == 4 || $list->statusApproval === null  ? 'laporan/laporanProgram/' . $warga . '/' . $list->programID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
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
                    <th style="text-align: center;">Tarikh Aktiviti</th>
                    <th style="text-align: center;">Nama Program</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Cetak Laporan</th>
                    <th style="text-align: center;">Ulasan Laporan</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1;
            foreach($laporan as $list): ?>
              <?php if ($list->statusApproval == 3): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= ucwords(strtolower($list->clubName)) ?></td>
                    <td><?= $list->startDate ?></td>
                    <td><?= ucwords(strtolower($list->programName)) ?></td>
                    <td style="text-align: center;"> <?php
                            echo "<span class='badge badge-success'>Approved</span>";
                        ?>
                    </td>
                    <td>pdf</td>
                    <td style="text-align: center;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="<?= base_url($list->statusApproval == 1 || $list->statusApproval == 4 || $list->statusApproval === null  ? 'laporan/laporanProgram/' . $warga . '/' . $list->programID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
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
                    <th style="text-align: center;">Tarikh Aktiviti</th>
                    <th style="text-align: center;">Nama Program</th>
                    <th style="text-align: center;">Status</th>
                    <th style="text-align: center;">Ulasan Laporan</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1;
            foreach($laporan as $list): ?>
              <?php if ($list->statusApproval == 4): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= ucwords(strtolower($list->clubName)) ?></td>
                    <td <?php if (strtotime($list->endDate) < strtotime('+15 days')):?> style="background-color: #c94c4c;color:white;"<?php endif ?>><?= $list->startDate ?></td>
                    <td><?= ucwords(strtolower($list->programName)) ?></td>
                    <td style="text-align: center;"> <?php
                            echo "<span class='badge badge-danger'>Not Approved</span>";
                        ?>
                    </td>
                    <td style="text-align: center;">
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <a href="<?= base_url($list->statusApproval == 1 || $list->statusApproval == 4 || $list->statusApproval === null  ? 'laporan/laporanProgram/' . $warga . '/' . $list->programID : 'laporan/submit_Report/' . $warga . '/' . $list->programID) ?> " ><button type="button" class="btn btn-info">Laporan</button></a>
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
 