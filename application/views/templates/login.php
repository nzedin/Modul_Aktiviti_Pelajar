
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Background</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden;
        }
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            z-index: -1;
        }
        .login-box {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1;
            text-align: center;
            width: 35%;
        }
        .login-box .card-header {
            font-size: 35px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <video autoplay muted loop id="video-background">
        <source src="<?= base_url('img/umtvid.mp4')?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="login-box">
      
        <div class="card card-primary">
        <div class="card-header text-center">
            <a href="#">Modul Aktiviti Pelajar <b>UMT</b></a>
        </div>
            <div class="card-body ">
            <p class="login-box-msg">Log Masuk</p>

            <form action="<?= base_url('login/login')?>" method="POST">
                <div class="form-group">
                    <div class="row">
                        <div class="col-3">
                        </div>
                        <div class="col-3">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="staff" name="warga" value="staff" required>
                                <label class="custom-control-label" for="staff">Staf</label>
                            </div>
                        </div>
                    
                        <div class="col-2">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="student" name="warga" value="student" >
                                <label class="custom-control-label" for="student">Pelajar</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                <input type="text" name="wargaID" class="form-control" placeholder="User ID" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                    </div>
                </div>
                </div>
                
                <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                    </div>
                </div>
                </div>
                <?= $this->session->flashdata('reminder'); ?>

                <div class="row">
                <div class="col-8">
                
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Log In</button>
                </div>
               
                <!-- /.col -->
                </div>
            </form>

            
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    
</body>
