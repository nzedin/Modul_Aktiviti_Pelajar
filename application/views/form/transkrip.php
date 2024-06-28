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
                    <div class="card-body">              
                        <div class="card-footer"> 
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Matrik Pelajar: </label>
                                <div class="col-sm-8">
                                    <input type="text" id="studentID" class="form-control" name="studentID" placeholder="Matrik Pelajar">
                                </div>
                                <div class="col-sm-2">
                                    <button onclick="search()" id="submitBtn" class="btn btn-info"><i class="fas fa-search"></i> Cari</button>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
            
            <div id="resultSection" class="card card-info card-outline" style="display: none;">
                
                <div class="card-body">
                    <div id="resultTable">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">

                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">No.</th>
                                        <th style="text-align: center;">Matrik Pelajar</th>
                                        <th style="text-align: center;">Nama Pelajar</th>
                                        <th style="text-align: center;">Jawatan</th>
                                        <th style="text-align: center;">Transkrip</th>
                                    </tr>
                                </thead>
                                <tbody id="table-body">
                                    <!-- Data will be appended here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
</div>

<script>
    function toTitleCase(str) {
        return str.replace(/\w\S*/g, function(txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    }

    function search() {
        var studentID = document.getElementById("studentID").value;
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url('laporan/search_transcript'); ?>',
            data: { studentID: studentID },
            dataType: 'json',
            success: function(data) {
                $('#resultSection').show(); // Show the result section
                $('#table-body').html(''); // Clear the table body
                if (Array.isArray(data) && data.length > 0) {
                    $.each(data, function(index, item) {
                        $('#table-body').append('<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' + toTitleCase(item.studentID) + '</td>' +
                            '<td>' + toTitleCase(item.studentName) + '</td>' +
                            '<td>' + toTitleCase(item.committee) + '</td>' +
                            '<td style="text-align:center;">' +
                            '<button onclick="window.open(\'<?php echo base_url('laporan/curricular_transcript/'); ?>' + item.studentID + '\')" class="btn btn-primary">' +
                            '<i class="fa fa-file-text" aria-hidden="true"></i> Transkrip</button>' +
                            '</td>' +
                        '</tr>');
                    });
                } else {
                    $('#table-body').append('<tr><td colspan="4" style="text-align: center;">Tiada Maklumat Data</td></tr>');
                }
            },
            error: function(xhr, status, error) {
                console.error("Error occurred: " + status + " - " + error);
            }
        });
    }
</script>
