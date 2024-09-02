<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            border-bottom: 1px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .header img {
            width: 300px;
        }
        .header h1 {
            font-size: 22px;
            margin: 10px 0;
        }
        .header h2 {
            font-size: 18px;
            margin: 5px 0;
        }
        .details {
            border: 1px solid gray;
            padding: 8px;
            margin-bottom: 20px;
            background-color: lightgray;
        }
        .details .title {
            font-weight: bold;
            background-color: gray;
            color: white;
            text-align: center;
            padding: 10px;
        }
        .details .info {
            display: flex;
            justify-content: space-between;
            padding: 3px;
        }
        .details .info .label {
            flex: 0 0 30%;
            text-align: right;
            font-weight: bold;
        }
        .details .info .value {
            flex: 0 0 65%;
            text-align: left;
            padding-left: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
            border: 1px solid gray;
        }
        .table th, .table td {
            border: 1px solid gray;
            padding: 5px;
        }
        .table thead th{
            text-align: center;
            background-color: lightgray;
            border: 1px solid gray;
        }
        .table tbody .total {
            text-align:right;
            padding-right:40px;
            font-weight: bold;
            border-top: 2px solid gray;
        }
        .calc {
            text-align:center;
            font-weight: bold;
            background-color: lightgray;
            border: 1px solid gray;
        }

        .total {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="<?= base_url('img/umt.png')?>" alt="UMT Logo">
            <h1><b>UNIVERSITI MALAYSIA TERENGGANU</b></h1>
            <h2>21030 Kuala Terengganu, Terengganu Darul Iman</h2>
        </div>
        <div class="details">
            <h3 class="title">TRANSKRIP KOKURIKULUM</h3>
            <div class="info">
                <div class="label">NAMA :</div>
                <div class="value"><?= strtoupper($student_info->STUDENTNAME) ?></div>
            </div>
            <div class="info">
                <div class="label">NO. MATRIK :</div>
                <div class="value"><?= strtoupper($student_info->STUDENTID) ?></div>
            </div>
            <div class="info">
                <div class="label">PROGRAM PENGAJIAN :</div>
                <div class="value"><?= strtoupper($student_info->PROGRAM) ?></div>
            </div>
            <div class="info">
                <div class="label">FAKULTI PENGAJIAN :</div>
                <div class="value"><?= strtoupper($student_info->FACULTY) ?></div>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th width="49%">NAMA BADAN PELAJAR / ORGANISASI</th>
                    <th width="20%">JAWATAN</th>
                    <th>KATEGORI</th>
                    <th width="8%">MERIT</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $totalMerit = 0; 

                if (!empty($transcript) || !empty($transcriptMPP)): 
                    if (!empty($transcript)):
                        foreach ($transcript as $record): 
                            $totalMerit += $record->MERIT; 
                ?>
                            <tr>
                                <td><?= strtoupper($record->CLUB) ?></td>
                                <td><?= strtoupper($record->COMMITTEE) ?></td>
                                <td><?= strtoupper($record->CATEGORYROLE) ?></td>
                                <td style="text-align:center;"><?= $record->MERIT ?></td>
                            </tr>
                <?php 
                        endforeach; 
                    endif;

                    if (!empty($transcriptMPP)):
                        foreach ($transcriptMPP as $record): 
                            $totalMerit += $record->MERIT; 
                ?>
                            <tr>
                                <td>MAJLIS PERWAKILAN PELAJAR</td>
                                <td><?= strtoupper($record->COMMITTEE) ?></td>
                                <td><?= strtoupper($record->CATEGORYROLE) ?></td>
                                <td style="text-align:center;"><?= $record->MERIT ?></td>
                            </tr>
                <?php 
                        endforeach; 
                    endif;
                ?>
                    <tr>
                        <td colspan="3" class="total">JUMLAH KESELURUHAN MERIT</td>
                        <td class="calc"><?= $totalMerit ?></td> 
                    </tr>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align:center;">TIADA</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="total">JUMLAH MERIT</td>
                        <td class="calc">0</td> 
                    </tr>
                    <?php $totalMerit = 0; ?>
                <?php endif; ?>
            </tbody>
        </table>

    </div>
</body>
</html>
