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
                AND MONTH ( tbl_stok_out_bersih.stok_out_dt_masuk ) = $bulan 
                AND YEAR ( tbl_stok_out_bersih.stok_out_dt_masuk ) = $tahun";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_detail_biaya($bulan, $tahun){
            $sql = "SELECT
                tbl_transaksi.tgl_input as tgl_input,
                tbl_transaksi.saldo as saldo,
                tbl_pos.nm_pos as nm_pos,
                tbl_pos.kd_pos as kd_pos 
            FROM
                tbl_transaksi 
            JOIN
                tbl_pos ON tbl_transaksi.kd_pos = tbl_pos.kd_pos
            WHERE
                tbl_transaksi.dt_aktif = 1 
                AND MONTH ( tbl_transaksi.tgl_input ) = $bulan 
                AND YEAR ( tbl_transaksi.tgl_input ) = $tahun";
            $query = $this->db->query($sql);
            return $query->result_array();
        }

        function get_semua_pos(){
            $sql = "SELECT
                * 
            FROM
                tbl_pos
            WHERE
                tbl_pos.dt_aktif = 1";
            $query = $this->db->query($sql);
            return $query->result_array();
        }
    }
?>