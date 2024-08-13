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
                                        <?php
                                            $tempDir = "images/"; 
                                            $fileName = $profile->STUIMG;
                                            $pngAbsoluteFilePath = $tempDir.$fileName;
                                            $imageData = file_get_contents($pngAbsoluteFilePath);
                                            $image = base64_encode($imageData);
                                        ?>
                                        <img src="data:image/png;base64, <?=$image?> " class="img-circle img-fluid" alt="User Image">    
                                    </div>
                                </div>
                            </div>

                                <div style="width: 90%; margin: auto;" class="card-body">
                                    <table class="table table-sm">
                                        
                                        <tbody>
                                        <tr>
                                            <td> ID Pelajar </td>
                                            <td> <?php echo ucwords(strtolower($profile->STUDENTID)); ?> </td>
                                        </tr>
                                        <tr>
                                            <td> Nama Pelajar </td>
                                            <td><?php echo ucwords(strtolower($profile->STUDENTNAME)); ?></td>
                                        </tr>
                                        <tr>
                                            <td> No. Telefon </td>
                                            <td><?php echo $profile->PHONENO; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Email </td>
                                            <td><?php echo $profile->STUDENTEMAIL; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Fakulti </td>
                                            <td> <?php echo ucwords(strtolower($profile->FACULTY)); ?></td>
                                        </tr>
                                        <tr>
                                            <td> Program </td>
                                            <td><?php echo ucwords(strtolower($profile->PROGRAM)); ?></td>
                                        </tr>
                                        <tr>
                                            <td> Semester </td>
                                            <td><?php echo $profile->SEMESTER; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Status </td>
                                            <td><?php echo ucwords(strtolower($profile->STATUS)) ; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Jawatan </td>
                                            <td><?php echo ucwords(strtolower($profile->COMMITTEE)) ; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Sesi Pelantikan </td>
                                            <td><?php echo $profile->SESSION; ?></td>
                                        </tr>   
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            
            </div>
            <?php endif; ?>
            <?php if( $type == "kelab" ): ?>
                <div class="card card-widget widget-user">
              
              <div class="row">
                   <div  id="printContent" class="card-body">
                       <div style="width: 98%; margin: auto;" class="card card-outline card-info">
                           <div class="card-header">
                               <h2 class="card-title"><?= $title ?> <?= ucwords(strtolower($clubID->CLUBNAME)); ?></h2>
                           </div>

                           <div style="margin-top: 20px;"class="container">
                               <div class="row justify-content-center">
                                   <div class="col-md-3">
                                    <?php if( $profile->logo != null ): ?>
                                       <img class="img img-fluid" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($profile->LOGO); ?>" alt="User Avatar">
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
                                           <td> <?php echo $profile->ESTABLISHDATE; ?> </td>
                                       </tr>
                                       <tr>
                                           <td> No. Rujukan </td>
                                           <td> <?php echo $profile->REFNO; ?> </td>
                                       </tr>
                                       <tr>
                                           <td> Nama Kelab </td>
                                           <td><?php echo ucwords(strtolower($profile->CLUBNAME)); ?></td>
                                       </tr>
                                       <tr>
                                           <td> Nama Singkatan </td>
                                           <td><?php echo $profile->SHORTNAME; ?></td>
                                       </tr>
                                       <tr>
                                           <td> Kategori Badan Pelajar </td>
                                           <td><?php echo ucwords(strtolower($profile->CATEGORY)); ?></td>
                                       </tr>
                                       <tr>
                                           <td> Penasihat 1 </td>
                                           <td> <?php echo ucwords(strtolower($profile->ADVISOR1_NAME)); ?></td>
                                       </tr>
                                       <?php if( $profile->ADVISOR2_NAME != null ): ?>
                                       <tr>
                                            <td> Penasihat 2 </td>
                                            <td><?php echo ucwords(strtolower($profile->ADVISOR2_NAME)); ?></td>
                                       </tr>
                                       <?php endif ?>
                                       <tr>
                                           <td> Objective </td>
                                           <td><?php echo ucwords(strtolower($profile->OBJECTIVE)); ?></td>
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

                                        <?php if( $profile->COMMITTEE == null ): ?>
                                            <tr>
                                                    <td  colspan="4"  style="text-align: center;"> <?php echo 'Kepimpinan tidak didaftarkan.' ?></td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach( $kepimpinan as $kep ): ?>
                                                <tr>
                                                    <td> <?= ucwords(strtolower($kep->COMMITTEE)) ?></td>
                                                    <td> <?= ucwords(strtolower($kep->STUDENTID)) ?> </td>
                                                    <td> <?= ucwords(strtolower($kep->STUDENTNAME)) ?> </td>
                                                    <td> <?= ucwords(strtolower($kep->STATUS)); ?> </td>
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
 