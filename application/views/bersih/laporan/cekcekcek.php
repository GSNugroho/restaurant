<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        <table>
        <?php
            foreach($tanggal as $tanggal){
                $beli_stok = 0;
                $harga_jual = 0;
                $jual_stok = 0;
                echo '<tr><td style="text-align: center;">'.$tanggal->stok_in_dt_masuk.'</td></tr>';

                foreach($stok_masuk as $row){
                    if($row->stok_in_dt_masuk == $tanggal->stok_in_dt_masuk){
                        $beli_stok = $beli_stok + ((int)$row->jumlah_stok * (int)$row->harga);
                    }
                }
                echo '<td style="text-align: right;">'.$beli_stok.'</td>';
            }
        ?>
        </table>
        
        
        <script src="" async defer></script>
    </body>
</html>