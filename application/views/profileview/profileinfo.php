<div class="content-wrapper">
    <section class="content-header" style="width: 70%; margin:5% auto;">
        <div class="container-fluid">
            <?php if( $type == "pelajar" ): ?>
            <div class="card card-widget widget-user">
              
               <div class="row">
                    <div  id="printContent" class="card-body">
                        <div style="width: 98%; margin: auto;" class="card card-outline card-info">
                            <div class="card-header">
                                <h2 class="card-title">Maklumat Pelajar</h2>
                            </div>

                            <div style="margin-top: 20px;"class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-3">
                                        <img class="img-circle img-fluid" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($profile->stuImg); ?>" alt="User Avatar">
                                    </div>
                                </div>
                            </div>

                                <div style="width: 90%; margin: auto;" class="card-body">
                                    <table class="table table-sm">
                                        
                                        <tbody>
                                        <tr>
                                            <td> ID Pelajar </td>
                                            <td> <?php echo $profile->studentID; ?> </td>
                                        </tr>
                                        <tr>
                                            <td> Nama Pelajar </td>
                                            <td><?php echo $profile->studentName; ?></td>
                                        </tr>
                                        <tr>
                                            <td> No. Telefon </td>
                                            <td><?php echo $profile->phoneNo; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Email </td>
                                            <td><?php echo $profile->studentEmail; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Fakulti </td>
                                            <td> <?php echo $profile->faculty; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Program </td>
                                            <td><?php echo $profile->program; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Semester </td>
                                            <td><?php echo $profile->semester; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Status </td>
                                            <td><?php echo $profile->status ; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Jawatan </td>
                                            <td><?php echo $profile->committee ; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Sesi Pelantikan </td>
                                            <td><?php echo $profile->session; ?></td>
                                        </tr>   
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            
                <div style="text-align: right; margin:0 20px 20px 0" >
                    <button type="button" style="width:20%;" onclick="window.open('<?= base_url('mpp/printPage/'.$profile->mppID) ?>').print()" class="btn btn-info"><i class="fa fa-print">  Print </i></button>
                </div>
            </div>
            <?php endif; ?>
            <?php if( $type == "kelab" ): ?>
                <div class="card card-widget widget-user">
              
              <div class="row">
                   <div  id="printContent" class="card-body">
                       <div style="width: 98%; margin: auto;" class="card card-outline card-info">
                           <div class="card-header">
                               <h2 class="card-title"><?= $title ?> <?= ucwords(strtolower($clubID->clubName)); ?></h2>
                           </div>

                           <div style="margin-top: 20px;"class="container">
                               <div class="row justify-content-center">
                                   <div class="col-md-3">
                                    <?php if( $profile->logo != null ): ?>
                                       <img class="img img-fluid" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($profile->logo); ?>" alt="User Avatar">
                                       <?php else: ?>
                                        <img class="img img-fluid" src="<?= base_url('img/pic.jpeg')?>" alt="User Avatar">
                                    <?php endif; ?>
                                   </div>
                               </div>
                           </div>

                            
                               <div style="width: 90%; margin: auto;" class="card-body">
                               <h6><b>Maklumat Kelab</b></h6>
                                   <table class="table table-sm">
                                       
                                       <tbody>
                                       <tr>
                                           <td> Tarikh Penubuhan </td>
                                           <td> <?php echo $profile->establishDate; ?> </td>
                                       </tr>
                                       <tr>
                                           <td> No. Rujukan </td>
                                           <td> <?php echo $profile->refNo; ?> </td>
                                       </tr>
                                       <tr>
                                           <td> Nama Kelab </td>
                                           <td><?php echo $profile->clubName; ?></td>
                                       </tr>
                                       <tr>
                                           <td> Nama Singkatan </td>
                                           <td><?php echo $profile->shortName; ?></td>
                                       </tr>
                                       <tr>
                                           <td> Kategori Badan Pelajar </td>
                                           <td><?php echo $profile->category; ?></td>
                                       </tr>
                                       <tr>
                                           <td> Penasihat 1 </td>
                                           <td> <?php echo $profile->advisor1_name; ?></td>
                                       </tr>
                                       <tr>
                                           <td> Penasihat 2 </td>
                                           <td><?php echo $profile->advisor2_name; ?></td>
                                       </tr>
                                       <tr>
                                           <td> Objective </td>
                                           <td><?php echo $profile->objective; ?></td>
                                       </tr>
                                       </tbody>
                                   </table>
                               </div>

                               
                               <div style="width: 90%; margin: auto;" class="card-body">
                               <h6><b>Maklumat Kepimpinan</b></h6>
                                   <table class="table table-sm">
                                       
                                       <tbody>

                                       <tr>
                                           <td> <b>Jawatan </b></td>
                                           <td> <b>Matrik </b></td>
                                           <td> <b>Nama </b></td>
                                           <td> <b>Status </b></td>
                                       </tr>

                                        <?php if( $profile->committee == null ): ?>
                                            <tr>
                                                    <td  colspan="4"  style="text-align: center;"> <?php echo 'Kepimpinan tidak didaftarkan.' ?></td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach( $kepimpinan as $kep ): ?>
                                                <tr>
                                                    <td> <?= $kep->committee ?></td>
                                                    <td> <?= $kep->studentID ?> </td>
                                                    <td> <?= $kep->studentName ?> </td>
                                                    <td> <?= ucwords(strtolower($kep->status)); ?> </td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif; ?>
                                       
                                       </tbody>
                                   </table>
                               </div>
                       </div>
                   </div>
               </div>
           
              
           </div>
            <?php endif; ?>
        </div>
    </section>
</div>
 