
<?php if( $title == "QR Kehadiran" ): ?>
<?php
  include('phpqrcode/qrlib.php');
      $tempDir = "qrcodes/"; 
    
      $codeContents = 'http://localhost/HEPA/kehadiran/logmasuk/'.(string)$programID->PROGRAMID;

      
      // we need to generate filename somehow, 
      // with md5 or with database ID used to obtains $codeContents...
      $fileName = '005_file_'.md5($codeContents).'.png';
      
      $pngAbsoluteFilePath = $tempDir.$fileName;
      
      // generating
      if (!file_exists($pngAbsoluteFilePath)) {
          QRcode::png($codeContents, $pngAbsoluteFilePath);
      } 

      
      // Read the image file
  $imageData = file_get_contents($pngAbsoluteFilePath);

  // Convert image data to base64 encoded string
  $qrCode = base64_encode($imageData);
?>
<body>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fa fa-qrcode"></i>  <?= $title ?></h1>
          </div>
          
        </div>
      </div>
    </section>
    <section class="content">
        <div class="container-fluid">
                    <div style="width:95%; margin-left:auto;margin-right:auto;" class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                        Kehadiran <?= ucwords(strtolower($programID->PROGRAMNAME)); ?>
                        </h3>
                    </div>
                    <div class="card-body" style="text-align:center;">
                    <p> Sila imbas kod QR pengesahan kehadiran </p>
                    <img style="height:30%; width:30%;" src="data:image/png;base64, <?=$qrCode?> " />
                    </div>
                    </div>
                
        </div>
    </section>
</div>
    </body>
<?php endif; ?>



<?php if( $title == "QR Pendaftaran" ): ?>
<?php
include('phpqrcode/qrlib.php');
    $tempDir = "qrpendaftaran/"; 
  
    $codeContents = 'http://localhost/HEPA/kehadiran/logmasukpendaftaran/'.(string)$programID->PROGRAMID;

    
    // we need to generate filename somehow, 
    // with md5 or with database ID used to obtains $codeContents...
    $fileName = '005_file_'.md5($codeContents).'.png';
    
    $pngAbsoluteFilePath = $tempDir.$fileName;
    
    // generating
    if (!file_exists($pngAbsoluteFilePath)) {
        QRcode::png($codeContents, $pngAbsoluteFilePath);
    } 

    
    // Read the image file
$imageData = file_get_contents($pngAbsoluteFilePath);

// Convert image data to base64 encoded string
$qrCode = base64_encode($imageData);
?>
<body>
<div class="content-wrapper">
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><i class="fa fa-qrcode"></i>  <?= $title ?></h1>
          </div>
          
        </div>
      </div>
    </section>
    <section class="content">
        <div class="container-fluid">
                    <div style="width:95%; margin-left:auto;margin-right:auto;" class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                        Pendaftaran <?= ucwords(strtolower($programID->PROGRAMNAME)); ?>
                        </h3>
                    </div>
                    <div class="card-body" style="text-align:center;">
                    <p> Sila imbas kod QR pendaftaran penyertaan </p>
                    <img style="height:30%; width:30%;" src="data:image/png;base64, <?=$qrCode?> " />
                    </div>
                    </div>
                
        </div>
    </section>
</div>
    </body>
<?php endif; ?>
