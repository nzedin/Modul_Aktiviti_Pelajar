<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('img/print.png')?>" />
  <title><?= $title ?></title>

  

  <style>
.content-header {
    width: 70%;
    margin: 5% auto;
}

.container-fluid {
    padding-right: 15px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
}

.container {
    text-align: center;
}

.card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 2px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
    border-top: 3px solid turquoise;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.widget-user {
    width: 100%;
    height: 100%;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
}

.card-header {
    padding-left: 10px;
    margin-top: 0;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
}



.img-circle {
    border-radius: 50%;
}

.img-fluid {
    max-width: 100%;
    height: auto;
    text-align: center;
}

.table {
    width: 100%;
    margin-bottom: 1rem;
    color:#212529;
}

.table-sm {
    font-size: 0.875rem;
}

.table td,
.table th {
    padding: 0.5rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
}

.justify-content-center {
    justify-content: center;
    text-align: center;
    margin: 10px auto;
    -ms-flex: 0 0 25%;
    flex: 0 0 25%;
    max-width: 25%;
}

  </style>
</head>
<body>
    <section class="content-header">
        
                <div class="row">
                        <div class="card-body">
                            <div style="width: 98%; margin: auto;" class="card">
                                <div class="card-header">
                                    <h2>Maklumat Pelajar</h2>
                                </div>

                              
                                    <div class="justify-content-center">
                                       
                                            <img class="img-circle img-fluid" src="<?php echo 'data:image/jpeg;base64,' . base64_encode($profile->stuImg); ?>" alt="User Avatar">
                                       
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
                                            <td><?php echo $profile->status; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Jawatan </td>
                                            <td><?php echo $profile->committee; ?></td>
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
                  
            
           
            
    </section>
</body>
</html>
