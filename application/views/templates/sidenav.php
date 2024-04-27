<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">


  <!-- Navbar -->
  <nav style="background-image: url( 'https://pelajar.mynemo.umt.edu.my/endowmen/assets/img/header.svg' );" class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>
    
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside style="background-image: url(header.png);" class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href=""  style="background-image: url( 'https://pelajar.mynemo.umt.edu.my/endowmen/assets/img/header.svg' );" class="brand-link">
      <img src="<?= base_url('img/logo2.png')?>" alt="myNemo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Modul Aktiviti Pelajar</span>
    </a>

    <?php if( $warga == "staff" ): ?>

    <div class="sidebar">   
      <a href="<?= base_url('login/profile/'. $warga)?>" class="nav-item">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
              <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($staff->staffImg); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
            <?php echo $staff->staffName; ?>
            </div>
        </div>
      </a> 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
              
          <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p >
                    ADMIN
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a> 
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p >
                      Pelantikan MPP
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('mpp/index/'.$warga)?>" class="nav-link">
                        <p>Majlis Perwakilan Pelajar</p>
                      </a>
                    </li>
                  </ul>
                </li>
                
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Pendaftaran
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= base_url('category/index/'.$warga)?>" class="nav-link">
                        <p>Daftar Kategori Badan Pelajar</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('categoryrole/index/'.$warga)?>" class="nav-link">
                        <p>Daftar Kategori Jawatankuasa</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('committee/index/'.$warga)?>" class="nav-link">
                        <p>Daftar Jawatankuasa</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= base_url('club/index/'.$warga)?>" class="nav-link">
                        <p>Daftar Badan Pelajar</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/charts/uplot.html" class="nav-link">
                        <p>Semak Keahlian</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                      Kelulusan
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/UI/general.html" class="nav-link">
                        <p>HEPA</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/UI/icons.html" class="nav-link">
                        <p>Maklumat Program</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/UI/buttons.html" class="nav-link">
                        <p>Penasihat</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/UI/sliders.html" class="nav-link">
                        <p>Surat & Syarat Kelulusan</p>
                      </a>
                    </li>
                    
                  </ul>
                  
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Status
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/forms/general.html" class="nav-link">
                        <p>Monitor Program</p>
                      </a>
                    </li>
                    
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Laporan (Pelajar)
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/tables/simple.html" class="nav-link">
                        <p>Peringatan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/tables/data.html" class="nav-link">
                        <p>Kelulusan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/tables/jsgrid.html" class="nav-link">
                        <p>Sebab Kelewatan</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/tables/jsgrid.html" class="nav-link">
                        <p>Transkrip</p>
                      </a>
                    </li>
                  </ul>
                </li>
                
                
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                      Laporan (Admin)
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="pages/mailbox/mailbox.html" class="nav-link">
                        <p>Laporan</p>
                      </a>
                    </li>
                    
                  </ul>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon far fa-plus-square"></i>
                    <p>
                      Setup
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    
                    <li class="nav-item">
                      <a href="pages/examples/lockscreen.html" class="nav-link">
                        <p>Lockscreen</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/legacy-user-menu.html" class="nav-link">
                        <p>Legacy User Menu</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="pages/examples/language-menu.html" class="nav-link">
                        <p>Language Menu</p>
                      </a>
                    </li>
                    
                    
                  </ul>
                </li>
            </ul>
          </li>
          
        </ul>
       <br><br><br>
        <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false" style=" background-color:#343A40ff; position: fixed; bottom: 10px; ">
                  <li class="nav-item">
                    <hr class="dropdown-divider">
                  </li>

                    <li class="nav-item">
                        <a href="<?= base_url('login/logout') ?>" onclick="return confirm('Continue logout?')" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                LOGOUT
                                <i class="fas fa-angle-right right"></i>
                            </p>
                        </a>
                    </li>
                </ul>
      </nav>
    </div>

    <?php endif; ?>
    <?php if( $warga == "student" ): ?>
      <?php if( $student_type == "programdirector" ): ?>
        <div class="sidebar">   
          <a href="<?= base_url('login/profile/'. $warga)?>" class="nav-item">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($student->stuImg); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <?php echo $student->studentName; ?>
                </div>
            </div>
          </a> 
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p >
                        PELAJAR
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a> 
                <ul class="nav nav-treeview">
                      

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-group"></i>
                        <p>
                          Pelantikan
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>AJK & Peserta Program</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>
                          Aktiviti / Program 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Mohon Ubah Maklumat Program</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Batal Aktiviti/Program</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?= base_url('kehadiran/index/'.$warga.'/'.$student->studentID)?>" class="nav-link">
                            <p>Kehadiran</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>
                    
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>
                          Surat Kelulusan 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Surat Kelulusan Program</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-clipboard"></i>
                        <p>
                          Laporan 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?= base_url('laporan/index/'.$warga.'/'.$student->studentID)?>" class="nav-link">
                            <p>Laporan Program</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    
                </ul>
              </li>
              
            </ul>
          <br><br><br>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false" style=" background-color:#343A40ff; position: fixed; bottom: 10px; ">
                      <li class="nav-item">
                        <hr class="dropdown-divider">
                      </li>

                        <li class="nav-item">
                            <a href="<?= base_url('login/logout') ?>" onclick="return confirm('Continue logout?')" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    LOGOUT
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                        </li>
                    </ul>
          </nav>
        </div>
    <?php endif; ?>

    <?php if( $student_type == "member" ): ?>
      <div class="sidebar">   
          <a href="<?= base_url('login/profile/'. $warga)?>" class="nav-item">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($student->stuImg); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <?php echo $student->studentName; ?>
                </div>
            </div>
          </a> 
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p >
                        PELAJAR
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a> 
                <ul class="nav nav-treeview">
                      

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-group"></i>
                        <p>
                          Pendaftaran Ahli
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Daftar Ahli Badan Pelajar</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>
                          Daftar Program 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Mohon Program</p>
                          </a>
                        </li>                       
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-clipboard"></i>
                        <p>
                          Perlantikan 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Pengarah Program</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>AJK & Ahli Program</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    
                </ul>
              </li>
              
            </ul>
          <br><br><br>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false" style=" background-color:#343A40ff; position: fixed; bottom: 10px; ">
                      <li class="nav-item">
                        <hr class="dropdown-divider">
                      </li>

                        <li class="nav-item">
                            <a href="<?= base_url('login/logout') ?>" onclick="return confirm('Continue logout?')" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    LOGOUT
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                        </li>
                    </ul>
          </nav>
        </div>
    <?php endif; ?>

    <?php if( $student_type == "both" ): ?>
      <div class="sidebar">   
          <a href="<?= base_url('login/profile/'. $warga)?>" class="nav-item">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                  <img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($student->stuImg); ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <?php echo $student->studentName; ?>
                </div>
            </div>
          </a> 
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- Add icons to the links using the .nav-icon class
                  with font-awesome or any other icon font library -->
                  
              <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-graduation-cap"></i>
                    <p >
                        PELAJAR
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a> 
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-group"></i>
                        <p>
                          Presiden / Setiausaha
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                      

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-group"></i>
                        <p>
                          Pendaftaran Ahli
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Daftar Ahli Badan Pelajar</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>
                          Daftar Program 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Mohon Program</p>
                          </a>
                        </li>                       
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-clipboard"></i>
                        <p>
                          Perlantikan 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Pengarah Program</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>AJK & Ahli Program</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>
                </ul>
              </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>
                          Pengarah Program 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                      

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-group"></i>
                        <p>
                          Pelantikan
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>AJK & Peserta Program</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-university"></i>
                        <p>
                          Aktiviti / Program 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Mohon Ubah Maklumat Program</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Batal Aktiviti/Program</p>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="<?= base_url('kehadiran/index/'.$warga.'/'.$student->studentID)?>" class="nav-link">
                            <p>Kehadiran</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>
                    
                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-file-text"></i>
                        <p>
                          Surat Kelulusan 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="" class="nav-link">
                            <p>Surat Kelulusan Program</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-clipboard"></i>
                        <p>
                          Laporan 
                          <i class="fas fa-angle-left right"></i>
                        </p>
                      </a>
                      <ul class="nav nav-treeview">
                        <li class="nav-item">
                          <a href="<?= base_url('laporan/index/'.$warga.'/'.$student->studentID)?>" class="nav-link">
                            <p>Laporan Program</p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>

                    
                </ul>
                    </li>
                   
                </ul>
              </li>
              
            </ul>
          <br><br><br>
            <ul class="nav nav-pills nav-sidebar flex-column" role="menu" data-accordion="false" style=" background-color:#343A40ff; position: fixed; bottom: 10px; ">
                      <li class="nav-item">
                        <hr class="dropdown-divider">
                      </li>

                        <li class="nav-item">
                            <a href="<?= base_url('login/logout') ?>" onclick="return confirm('Continue logout?')" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>
                                    LOGOUT
                                    <i class="fas fa-angle-right right"></i>
                                </p>
                            </a>
                        </li>
                    </ul>
          </nav>
        </div>
    <?php endif; ?>

  <?php endif; ?>

    <!-- /.sidebar -->
  </aside>

</div>