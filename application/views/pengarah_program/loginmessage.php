<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('img/mynemo.jpg')?>" />
  <title><?= $title ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url('dist/temp')?>/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url('dist/temp')?>/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('dist/temp')?>/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('dist/temp')?>/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
</head>

<body style=" background: url(<?= base_url('img/log.jpg')?>);background-repeat:no-repeat;background-size: cover;background-attachment: fixed;" class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
        <?php if( $title == "eKehadiran" ): ?>
                <a style="color:green;font-weight: bold;" href="#"><b>eKehadiran</b></a>
            <?php endif; ?>

            <?php if( $title == "ePendaftaran" ): ?>
                <a style="color:green;font-weight: bold;" href="#"><b>ePendaftaran</b></a>
            <?php endif; ?>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
            <?php if (isset($message)): ?>
                <?= $message; ?>
            <?php endif; ?>
            <p><?= strtoupper($student->studentName); ?> [<?= strtoupper($student->studentID); ?>]</p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    
</body>
</html>