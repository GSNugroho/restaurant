<?php
    class M_transaksi extends CI_Model{
        function get_data_penjualan($bulan, $tahun){
            $sql = "SELECT
                SUM(CAST( tbl_order_detail.order_detail_jumlah AS FLOAT ) * CAST(tbl_produk.produk_harga AS FLOAT)) AS total_uang_masuk
            FROM
                tbl_order_detail
                JOIN tbl_order ON tbl_order_detail.order_id = tbl_order.order_id
                JOIN tbl_produk ON tbl_order_detail.order_detail_produk_id = tbl_produk.produk_id 
            WHERE
                tbl_order.order_aktif = 1 
                AND MONTH ( tbl_order.order_dt_create ) = $bulan 
                AND YEAR ( tbl_order.order_dt_create ) = $tahun ";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_data_stok_in_sblm($bulan, $tahun){
            $sql = "SELECT
                SUM(
                CAST( tbl_stok_in_bersih_detail.stok_in_detail_jumlah AS FLOAT ) * CAST( tbl_stok_in_bersih_detail.stok_in_detail_harga AS FLOAT )) AS hpp_masuk 
            FROM
                tbl_stok_in_bersih_detail
                JOIN tbl_stok_in_bersih ON tbl_stok_in_bersih_detail.stok_in_detail_id = tbl_stok_in_bersih.stok_in_id 
            WHERE
                tbl_stok_in_bersih.stok_in_aktif = 1 
                AND MONTH ( tbl_stok_in_bersih.stok_in_dt_masuk ) < $bulan 
                AND YEAR ( tbl_stok_in_bersih.stok_in_dt_masuk ) = $tahun ";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_data_stok_out_sblm($bulan, $tahun){
            $sql = "SELECT
                SUM(
                CAST( tbl_stok_out_bersih_detail.stok_out_detail_jumlah AS FLOAT ) * CAST( tbl_produk.produk_harga AS FLOAT )) AS hpp_keluar 
            FROM
                tbl_stok_out_bersih_detail
                JOIN tbl_stok_out_bersih ON tbl_stok_out_bersih_detail.stok_out_detail_id = tbl_stok_out_bersih.stok_out_id 
                JOIN tbl_produk ON tbl_stok_out_bersih_detail.stok_out_detail_produk_id = tbl_produk.produk_id
            WHERE
                tbl_stok_out_bersih.stok_out_aktif = 1 
                AND MONTH ( tbl_stok_out_bersih.stok_out_dt_masuk ) < $bulan 
                AND YEAR ( tbl_stok_out_bersih.stok_out_dt_masuk ) = $tahun";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_data_stok_in_ini($bulan, $tahun){
            $sql = "SELECT
                SUM(
                CAST( tbl_stok_in_bersih_detail.stok_in_detail_jumlah AS FLOAT ) * CAST( tbl_stok_in_bersih_detail.stok_in_detail_harga AS FLOAT )) AS hpp_masuk 
            FROM
                tbl_stok_in_bersih_detail
                JOIN tbl_stok_in_bersih ON tbl_stok_in_bersih_detail.stok_in_detail_id = tbl_stok_in_bersih.stok_in_id 
            WHERE
                tbl_stok_in_bersih.stok_in_aktif = 1 
                AND MONTH ( tbl_stok_in_bersih.stok_in_dt_masuk ) = $bulan 
                AND YEAR ( tbl_stok_in_bersih.stok_in_dt_masuk ) = $tahun ";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_data_stok_out_ini($bulan, $tahun){
            $sql = "SELECT
                SUM(
                CAST( tbl_stok_out_bersih_detail.stok_out_detail_jumlah AS FLOAT ) * CAST( tbl_produk.produk_harga AS FLOAT )) AS hpp_keluar 
            FROM
                tbl_stok_out_bersih_detail
                JOIN tbl_stok_out_bersih ON tbl_stok_out_bersih_detail.stok_out_detail_id = tbl_stok_out_bersih.stok_out_id 
                JOIN tbl_produk ON tbl_stok_out_bersih_detail.stok_out_detail_produk_id = tbl_produk.produk_id
            WHERE
                tbl_stok_out_bersih.stok_out_aktif = 1
                AND tbl_produk.produk_count = 1
                AND MONTH ( tbl_stok_out_bersih.stok_out_dt_masuk ) = $bulan 
                AND YEAR ( tbl_stok_out_bersih.stok_out_dt_masuk ) = $tahun";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_data_stok_out_ini_nc($bulan, $tahun){
            $sql = "SELECT
                SUM(
                CAST( tbl_stok_out_bersih_detail.stok_out_detail_jumlah AS FLOAT ) * CAST( tbl_produk.produk_harga AS FLOAT )) AS hpp_keluar 
            FROM
                tbl_stok_out_bersih_detail
                JOIN tbl_stok_out_bersih ON tbl_stok_out_bersih_detail.stok_out_detail_id = tbl_stok_out_bersih.stok_out_id 
                JOIN tbl_produk ON tbl_stok_out_bersih_detail.stok_out_detail_produk_id = tbl_produk.produk_id
            WHERE
                tbl_stok_out_bersih.stok_out_aktif = 1
                AND tbl_produk.produk_count = 0 AND tbl_stok_out_bersih.stok_out_user_create NOT LIKE 'Teller 1'
                AND MONTH ( tbl_stok_out_bersih.stok_out_dt_masuk ) = $bulan 
                AND YEAR ( tbl_stok_out_bersih.stok_out_dt_masuk ) = $tahun";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_detail_biaya($bulan, $tahun){
            $sql = "SELECT
                DATE_FORMAT(tbl_transaksi.tgl_input, '%d-%m-%Y') as tgl_input,
                tbl_transaksi.saldo as saldo,
                tbl_pos.nm_pos as nm_pos,
                tbl_pos.kd_pos as kd_pos,
                tbl_transaksi.keterangan as keterangan 
            FROM
                tbl_transaksi 
            JOIN
                tbl_pos ON tbl_transaksi.kd_pos = tbl_pos.kd_pos
            WHERE
                tbl_transaksi.dt_aktif = 1 
                AND MONTH ( tbl_transaksi.tgl_input ) = $bulan 
                AND YEAR ( tbl_transaksi.tgl_input ) = $tahun
            ORDER BY tbl_pos.kd_pos, tbl_transaksi.tgl_input ASC";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_semua_pos(){
            $sql = "SELECT
                * 
            FROM
                tbl_pos
            WHERE
                tbl_pos.dt_aktif = 1
            ORDER BY tbl_pos.kd_pos ASC";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_detail_transaksi($id){
            $sql = "SELECT
                DATE_FORMAT(tbl_transaksi.tgl_input,'%d-%m-%Y') as tgl_input,
                tbl_pos.nm_pos as nm_pos,
                tbl_transaksi.jns_saldo as jns_saldo,
                tbl_transaksi.saldo as saldo,
                tbl_transaksi.keterangan as keterangan
            FROM
                tbl_transaksi
            JOIN tbl_pos ON tbl_transaksi.kd_pos = tbl_pos.kd_pos
            WHERE tbl_transaksi.dt_aktif = 1";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_all_transaksi(){
            $sql = "SELECT count(*) as allcount FROM tbl_transaksi";
            $query = $this->db->query($sql);
            return $query;
        }
    
        function get_all_transaksi_search($searchQuery){
            $sql = "SELECT count(*) as allcount FROM tbl_transaksi WHERE 1=1 ".$searchQuery;
            $query = $this->db->query($sql);
            return $query;
        }
    
        function get_fetch_transaksi($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
            $sql = "SELECT 
            tbl_transaksi.kd_transaksi as kd_transaksi,
            DATE_FORMAT(tbl_transaksi.tgl_input, '%d-%m-%Y') as tgl_input,
            tbl_transaksi.jns_saldo as jns_saldo,
            tbl_transaksi.saldo as saldo,
            tbl_transaksi.keterangan as keterangan,
            tbl_pos.nm_pos as nm_pos
            FROM tbl_transaksi
            JOIN tbl_pos ON tbl_transaksi.kd_pos = tbl_pos.kd_pos
            WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
            .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
            $query = $this->db->query($sql);
            return $query;
        }

        function update_transaksi($id, $data){
            $this->db->where('kd_transaksi', $id);
            $this->db->update('tbl_transaksi', $data);
        }
    }
?>