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
                    <h3 class="card-title">Carian Transkrip Pelajar</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
           
                <div class="card-body">
                    <form id="transcript" method="POST" action="<?= base_url('laporan/search_transcript/'.$warga) ?>">
                        <div class="card-body">              
                            <div class="card-footer"> 
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Matrik Pelajar: </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="studentID" name="studentID" placeholder="Matrik Pelajar">
                                    </div>
                                    <div class="col-sm-2">
                                        <button type="submit" id="submitBtn" class="btn btn-info"><i class="fas fa-search"></i> Cari</button>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Student Transcript Result Section -->
            <div id="resultSection" class="card card-info" style="display: none;">
                <div class="card-header">
                    <h3 class="card-title">Student Transcript</h3>
                </div>
                <div class="card-body">
                    <div id="resultTable">
                        <!-- Result table will be inserted here -->
                        <table id="example1" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Matrik Pelajar</th>
                                    <th style="text-align: center;">Nama Pelajar</th>
                                    <th style="text-align: center;">Transkrip</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Data will be appended here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>   
</div>

<script>
$(document).ready(function() {
    $('#transcript').on('submit', function(event) {
        event.preventDefault(); 

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            data: $(this).serialize(),
            dataType: 'json', // Ensure the response is handled as JSON
            success: function(response) {
                
                    let students = response.students; // Ensure this matches the actual response data
                    let tableBody = '';

                    students.forEach((student, index) => {
                        tableBody += `
                            <tr>
                                <td style="text-align: center;">${index + 1}</td>
                                <td style="text-align: center;">${student.studentID}</td>
                                <td style="text-align: center;">${student.studentName}</td>
                                <td style="text-align: center;">
                                    <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                        <a href="#"><button type="button" class="btn btn-info">Transkrip</button></a>
                                    </div>
                                </td>
                            </tr>
                        `;
                    });

                    $('#example1 tbody').html(tableBody);
                    $('#resultSection').show();
                
            },
            error: function(xhr, status, error) {
                alert('There was an error submitting the form: ' + error);
            }
        });
    });
});
</script>
