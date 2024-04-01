
<body style=" background: url(https://upuonline.net/wp-content/uploads/2021/09/PicsArt_09-15-09.09.42.jpg);background-repeat:no-repeat;background-size: cover;background-attachment: fixed;" class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a style="color:white;" href="#">Modul Aktiviti Pelajar <b>UMT</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
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
