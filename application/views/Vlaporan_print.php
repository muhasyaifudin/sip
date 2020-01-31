<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Laporan</title>
        <style>
        @page { margin: 0px; }
        body {
        margin: 0;
        font-size: 12px;
        padding: 20px 35px 20px 35px;
        font-family: open sans, tahoma, sans-serif;
        -webkit-print-color-adjust: exact;
        }
        table {
        border-collapse: collapse;
        }

        .text-right {
            text-align: right;
        }
        </style>
    </head>
    <body>
        <table
            cellpadding="0"
            cellspacing="0"
            width="100%"
            style="table-layout:fixed; margin-top: 0px; padding-top: 0px;"
            >
            <tr>
                <td width="100%">
                    <table
                        cellpadding="3"
                        width="100%"
                        style="table-layout:fixed; border: none;padding-top: 0px; "
                        >
                        <tr>
                            <td style="text-align: center; font-size: 17pt; padding-top: 5px; font-weight: 900" valign="top">
                                Laporan Pengajuan Surat
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: center; font-size: 12pt; padding-top: 3px; font-weight: 900">
                                Desa Kaliangkrik
                            </td>
                        </tr>
                        <tr>
                            <td style="font-size: 8pt; padding-right: 40px;">
                            </td>
                        </tr>
                        
                    </table>
                    <!-- <h2>INVOICE</h2>
                    <h4>FORTUNA STEEL - PENEN</h4>
                    <p>Ruko Penen No 1-3, Jl Gito-Gati, Donoharjo, Ngaglik Sleman</p> -->
                </td>
                
            </tr>
        </table>
        <table
            cellpadding="3"
            cellspacing="0"
            width="100%"
            style="table-layout:fixed; margin-top: 10px; padding-top: 0px;"
            >
            <tr>
                <td width="10%">Tanggal :</td>
                <td width="10%"><?php echo date('d/m/Y'); ?></td>
                <td width="2%">-</td>    
                <td width=""><?php echo date('d/m/Y'); ?></td>
            </tr>
        </table>
        <table
            cellpadding="5"
            cellspacing="0"
            width="100%"
            style="table-layout:fixed; margin-top: 5px; white-space: normal; "
            >
            <tr style="border: 1px solid #000000; text-align: center; font-weight: bold;">
                <td width="10%" colspan="" style="border: 1px solid #000000;">Tanggal</td>
                <td width="15%" style="border: 1px solid #000000;">Pengirim</td>
                <td width="20%" style="border: 1px solid #000000;">Jenis Surat</td>
                <td width="20%" style="border: 1px solid #000000;">Keterangan</td>
                <td width="10%" style="border: 1px solid #000000;">Status</td>
            </tr>
           
            <?php foreach ($reports as $report): ?>
                <tr style="border: 1px solid #000000;">
                    <td colspan="" style="border: 1px solid #000000;">
                        <?php 
                           echo date('d/m/Y', strtotime($report->tanggal));

                        ?>
                    </td>
                    <td style="border: 1px solid #000000;"  class="text-left"><?php echo $report->nama_pengirim; ?></td>
                    <td style="border: 1px solid #000000;"  class="text-left"><?php 
                        if ($report->jenis == 'perpindahan_datang') {
                            echo 'Perpindahan Datang';
                        }
                        elseif ($report->jenis == 'perpindahan_pergi') {
                            echo 'Perpindahan Pergi';
                        }
                        elseif ($report->jenis == 'kematian') {
                            echo 'Kematian';
                        }
                        elseif ($report->jenis == 'lahir_mati') {
                            echo 'Lahir Mati';
                        }
                        elseif ($report->jenis == 'kelahiran') {
                            echo 'Kelahiran';
                        }
                        elseif ($report->jenis == 'permohonan') {
                            echo 'Permohonan';
                        }

                    ?></td>
                    <!-- <td style="border: 1px solid #000000;"  class="text-left"><?php echo $report->sub_jenis; ?></td> -->
                    <td style="border: 1px solid #000000;"  class="text-left"><?php echo $report->keterangan; ?></td>
                    <td style="border: 1px solid #000000;"  class="text-center"><?php
                        if ($report->status_pengajuan == 0) {
                            echo 'Belum Diproses';
                        }
                        else if ($report->status_pengajuan == 0) {
                            echo 'Diproses';
                        }
                     ?></td>
                </tr>
            <?php endforeach ?>
            
        </table>
        
      
       
    </body>
</html>