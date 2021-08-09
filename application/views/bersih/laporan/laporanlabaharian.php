<html>
    <head>
        <title>Laporan Laba Harian</title>
        <style>
            #tblArticles{
                font-size: 12px !important;
                font-family: verdana, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }
            #tblArticles tr{
                page-break-before: always;
            }
            #tblArticles td{
                border: 1px solid black;
                /* text-align: center; */
                /*padding: 8px;*/
                padding: 5px;
                margin: 0;
            }
            #tblArticles table.inner{
                width: 100%;
                margin: 0;
            }
            #tblArticles table.inner td{
                padding: 0;
                width: 50%;
                margin: 0;
                padding: 0;
                border: 0;
            }
             #tblArticles table.inner tr td{
                border-bottom: 1px solid black;
            }
            #tblArticles table.inner tr:last-child td{
                border-bottom: none;
            }
            #tblArticles th {
                border: 1px solid black;
                text-align: center;
                padding: 8px;
                background-color: #87cefa;
            }
            #tblLeft{
                position:absolute;
                left:0;
                font-size: 10px !important;
                font-family: verdana, sans-serif;
                border-collapse:collapse;
                width:40%;
            }
            #tblLeft td{
                font-size: 10px !important;
                border: 1px solid black;
                text-align: center;
                padding: 8px;
            }
            #tblLeft th {
                font-size: 10px !important; 
                border: 1px solid black;
                text-align: center;
                padding: 8px;
                background-color: #dddddd;
            }
            #tblRight{
                position:absolute;
                right:0;
                font-size: 10px !important; 
                font-family: verdana, sans-serif;
                border-collapse:collapse; 
                width:20%;
            }
            #tblRight td{
                font-size: 10px !important; 
                text-align: center;
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <center><h3>Laporan Laba Harian Bulan <?= date('M')?></h3></center>
        <table id="tblArticles" style="width: 100%;">
            <thead>
                <tr>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: right;">Kas Awal</th>
                    <th style="text-align: right;">Kas Masuk</th>
                    <th style="text-align: right;">Kas Keluar</th>
                    <th style="text-align: right;">Saldo</th>
                    <th style="text-align: right;">Stok Masuk</th>
                    <th style="text-align: right;">Stok Keluar</th>
                    <th style="text-align: right;">Sisa Stok</th>
                    <th style="text-align: right;">Semua Aset</th>
                    <th style="text-align: right;">Laba</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $uang_masuk = 0;
                    $uang_hpp = 0;
                    $pembelian_bb = 0;
                    $sisa_aset = 0;
                    foreach($modal as $modal){
                        $modal_awal = (int) $modal->saldo;
                        $kas_awal = (int) $modal->saldo;
                    }
                    $stok_awal = 0;
                    $laba = 0;

                    foreach($tanggal as $tanggal){
                        $beli_stok = 0;
                        $harga_jual = 0;
                        $jual_stok = 0;
                        echo '<tr>
                            <td style="text-align: center;">'.$tanggal->stok_in_dt_masuk.'</td>
                            <td style="text-align: right;">'.number_format($kas_awal, 0, ',', '.').'</td>
                        ';

                        foreach($stok_masuk as $row){
                            if($row->stok_in_dt_masuk == $tanggal->stok_in_dt_masuk){
                                $beli_stok = $beli_stok + ((float)$row->jumlah_stok * (float)$row->harga);
                            }
                        }

                        foreach($uang_masuka as $row){
                            if($row->tgl_order == $tanggal->stok_in_dt_masuk){
                                $harga_jual = $harga_jual + ((float)$row->jumlah * (float)$row->harga);
                            }
                        }

                        foreach($stok_jual as $row){
                            if($row->stok_out_dt_masuk == $tanggal->stok_in_dt_masuk){
                                $jual_stok = $jual_stok + ((float)$row->jumlah_stok * (float)$row->harga);
                            }
                        }

                        foreach($stok_jual_nc as $row){
                            if($row->stok_out_dt_masuk == $tanggal->stok_in_dt_masuk){
                                $jual_stok = $jual_stok + ((float)$row->jumlah_stok * (float)$row->harga);
                            }
                        }

                        // kas masuk
                        echo '<td style="text-align: right;">'.number_format($harga_jual, 0, ',','.').'</td>';
                        // kas keluar
                        echo '<td style="text-align: right;">'.number_format($beli_stok, 0, ',', '.').'</td>';
                        // saldo
                        echo '<td style="text-align: right;">'.number_format(($modal_awal - $beli_stok + $harga_jual), 0, ',', '.').'</td>';
                        // stok masuk
                        echo '<td style="text-align: right;">'.number_format($beli_stok, 0, ',', '.').'</td>';
                        // stok keluar
                        echo '<td style="text-align: right;">'.number_format($jual_stok, 0, ',', '.').'</td>';
                        // sisa stok
                        echo '<td style="text-align: right;">'.number_format(($stok_awal + $beli_stok - $jual_stok), 0, ',', '.').'</td>';
                        // semua aset
                        echo '<td style="text-align: right;">'.number_format((($modal_awal - $beli_stok + $harga_jual) + ($stok_awal + $beli_stok - $jual_stok)), 0, ',', '.').'</td>';
                        // laba
                        echo '<td style="text-align: right;">'.number_format(($harga_jual - $jual_stok), 0, ',', '.').'</td>';

                        $modal_awal = $modal_awal - $beli_stok + $harga_jual;
                        $stok_awal = $stok_awal + $beli_stok - $jual_stok;
                        $kas_awal = 0;
                    }

                    echo '</tr>';
                    
                ?>
            </tbody>
        </table>
    </body>
</html>