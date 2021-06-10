<?php
class M_bersih extends CI_Model{
    function insert_batch_produk_stok_in($data){
        $this->db->insert_batch('tbl_stok_in_bersih_detail', $data);
    }

    function insert_batch_stok_out_kotor($data){
        $this->db->insert_batch('tbl_stok_out_detail', $data);
    }

    function insert_batch_stok_out_bersih($data){
        $this->db->insert_batch('tbl_stok_out_bersih_detail', $data);
    }

    function insert_batch_order_detail($data){
        $this->db->insert_batch('tbl_order_detail', $data);
    }

    function insert_stok_in($data){
        $this->db->insert('tbl_stok_in_bersih', $data);
    }

    function insert_stok_out_kotor($data){
        $this->db->insert('tbl_stok_out', $data);
    }

    function insert_data_stok_out($data){
        $this->db->insert('tbl_stok_out_bersih', $data);
    }

    function insert_order($data){
        $this->db->insert('tbl_order', $data);
    }

    function update_order_selesai($id, $data){
        $this->db->where('order_id', $id);
        $this->db->update('tbl_order', $data);
    }

    function itung_uang_masuk(){
        $sql = "SELECT
            tbl_order_detail.order_detail_jumlah AS jumlah,
            tbl_produk.produk_harga AS harga ,
            DATE_FORMAT(tbl_order.order_dt_create,'%d-%m-%Y') as tgl_order
        FROM
            tbl_order_detail
            JOIN tbl_order ON tbl_order_detail.order_id = tbl_order.order_id
            JOIN tbl_produk ON tbl_order_detail.order_detail_produk_id = tbl_produk.produk_id
        WHERE MONTH(tbl_order.order_dt_create) = MONTH(NOW()) AND YEAR(tbl_order.order_dt_create) = YEAR(NOW())";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function cek_data_resep($id){
        $sql = "SELECT * FROM tbl_resep_produk
        WHERE tbl_resep_produk.resep_produk_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_stok_masuk(){
        $sql = "SELECT
            tbl_stok_in_bersih_detail.stok_in_detail_produk_id as produk_id,
            tbl_stok_in_bersih_detail.stok_in_detail_jumlah as jumlah_stok,
            tbl_stok_in_bersih_detail.stok_in_detail_harga as harga,
            DATE_FORMAT(tbl_stok_in_bersih.stok_in_dt_masuk, '%d-%m-%Y') as stok_in_dt_masuk
        FROM
            tbl_stok_in_bersih_detail
            JOIN tbl_stok_in_bersih ON tbl_stok_in_bersih_detail.stok_in_detail_id = tbl_stok_in_bersih.stok_in_id 
        WHERE
            MONTH ( tbl_stok_in_bersih.stok_in_dt_masuk ) = MONTH (
            NOW()) 
            AND YEAR ( tbl_stok_in_bersih.stok_in_dt_masuk ) = YEAR (
            tbl_stok_in_bersih.stok_in_dt_masuk)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_stok_jual(){
        $sql = "SELECT
            tbl_stok_out_bersih_detail.stok_out_detail_produk_id AS produk_id,
            tbl_stok_out_bersih_detail.stok_out_detail_jumlah AS jumlah_stok,
            tbl_produk.produk_harga as harga,
            DATE_FORMAT( tbl_stok_out_bersih.stok_out_dt_masuk, '%d-%m-%Y' ) AS stok_out_dt_masuk 
        FROM
            tbl_stok_out_bersih_detail
            JOIN tbl_stok_out_bersih ON tbl_stok_out_bersih_detail.stok_out_detail_id = tbl_stok_out_bersih.stok_out_id 
            JOIN tbl_produk ON tbl_stok_out_bersih_detail.stok_out_detail_produk_id = tbl_produk.produk_id
        WHERE
            MONTH ( tbl_stok_out_bersih.stok_out_dt_masuk ) = MONTH (
            NOW()) 
            AND YEAR ( tbl_stok_out_bersih.stok_out_dt_masuk ) = YEAR (
            tbl_stok_out_bersih.stok_out_dt_masuk)";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_tanggal(){
        $sql = "SELECT DISTINCT DATE_FORMAT(stok_in_dt_masuk,'%d-%m-%Y') as stok_in_dt_masuk FROM tbl_stok_in_bersih WHERE MONTH(stok_in_dt_masuk) = MONTH(NOW())";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function itung_uang_hpp(){
        $sql = "SELECT
                tbl_stok_out_bersih_detail.stok_out_detail_jumlah as jumlah,
                tbl_produk.produk_harga as harga
        FROM
            tbl_stok_out_bersih_detail
            JOIN tbl_produk ON tbl_stok_out_bersih_detail.stok_out_detail_produk_id = tbl_produk.produk_id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function itung_pembelian_bb(){
        $sql = "SELECT
            tbl_stok_in_bersih_detail.stok_in_detail_jumlah as jumlah,
            tbl_stok_in_bersih_detail.stok_in_detail_harga as harga
        FROM
            tbl_stok_in_bersih_detail
            JOIN tbl_stok_in_bersih ON tbl_stok_in_bersih_detail.stok_in_detail_id = tbl_stok_in_bersih.stok_in_id
            JOIN tbl_produk ON tbl_stok_in_bersih_detail.stok_in_detail_produk_id = tbl_produk.produk_id
        WHERE tbl_produk.produk_kategori = 'HT-000002'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function itung_uang_pengeluaran(){
        $sql = "SELECT
            tbl_stok_in_bersih_detail.stok_in_detail_jumlah as jumlah,
            tbl_stok_in_bersih_detail.stok_in_detail_harga as harga
        FROM
            tbl_stok_in_bersih_detail
            JOIN tbl_stok_in_bersih ON tbl_stok_in_bersih_detail.stok_in_detail_id = tbl_stok_in_bersih.stok_in_id
        WHERE 
            tbl_stok_in_bersih.stok_in_user_create LIKE '%Teller 1%'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_data_order_masuk($id){
        $sql = "SELECT
            order_id,
            order_nm_pemesan,
            DATE_FORMAT(order_dt_create,'%d-%m-%Y %H:%i:%s') as order_dt_create,
            order_dt_modif,
            order_user_create,
            order_user_modif,
            order_aktif,
            order_diskon,
            order_bayar,
            order_total_pesanan,
            order_selesai 
        FROM
            tbl_order 
        WHERE
            tbl_order.order_id = '$id' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function cek_data_order_selesai($id){
        $sql = "SELECT * FROM tbl_order_detail WHERE tbl_order_detail.order_id = '$id' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function cek_tgl_stok_out_akhir(){
        $sql = 'SELECT
        stok_out_id, DATE_FORMAT(stok_out_dt_masuk, "%d-%m-%Y") as tgl
        FROM
            tbl_stok_out_bersih 
        ORDER BY
            stok_out_dt_masuk DESC 
        LIMIT 1';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_order_masuk($id){
        $sql = "SELECT
            tbl_order_detail.order_detail_id as order_detail_id,
            tbl_order_detail.order_detail_jumlah as order_detail_jumlah,
            tbl_produk.produk_satuan as produk_satuan,
            tbl_produk.produk_harga as produk_harga,
            tbl_produk.produk_nama as produk_nama,
            (CAST(order_detail_jumlah as FLOAT) * CAST(produk_harga as FLOAT))  as sub_total
        FROM
            tbl_order_detail
            JOIN tbl_order ON tbl_order_detail.order_id = tbl_order.order_id
            JOIN tbl_produk ON tbl_order_detail.order_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_order.order_id = '$id' AND tbl_order.order_aktif = 1";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_data_keterangan_stok_in_bersih($id){
        $sql = "SELECT
            stok_in_id,
            DATE_FORMAT(stok_in_dt_masuk, '%d-%m-%Y') as stok_in_dt_masuk,
            stok_in_dt_create,
            stok_in_dt_modif,
            stok_in_user_create,
            stok_in_user_modif,
            stok_in_aktif
        FROM
            tbl_stok_in_bersih 
        WHERE
            tbl_stok_in_bersih.stok_in_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function all_stok_produk_bersih(){
        $sql = "SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id WHERE produk_stok = 1 AND produk_aktif = 1 ORDER BY produk_id ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function all_stok_in_bersih(){
        $sql = "SELECT
            tbl_produk.produk_id AS produk_id,
            tbl_produk.produk_nama AS produk_nama,
            SUM(CAST(tbl_stok_in_bersih_detail.stok_in_detail_jumlah AS FLOAT)) AS produk_jml
        FROM
            tbl_stok_in_bersih
            JOIN tbl_stok_in_bersih_detail ON tbl_stok_in_bersih.stok_in_id = tbl_stok_in_bersih_detail.stok_in_detail_id
            JOIN tbl_produk ON tbl_stok_in_bersih_detail.stok_in_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif = 1 AND tbl_stok_in_bersih.stok_in_aktif = 1 AND DATE_FORMAT(tbl_stok_in_bersih.stok_in_dt_masuk, '%d-%m-%Y') = DATE_FORMAT(NOW(),'%d-%m-%Y')
        GROUP BY 
            tbl_produk.produk_id, tbl_produk.produk_nama
        ORDER BY
            tbl_produk.produk_id ASC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function all_stok_in_bersih_sblm(){
        $sql = "SELECT
            tbl_produk.produk_id AS produk_id,
            tbl_produk.produk_nama AS produk_nama,
            SUM(CAST(tbl_stok_in_bersih_detail.stok_in_detail_jumlah AS FLOAT)) AS produk_jml
        FROM
            tbl_stok_in_bersih
            JOIN tbl_stok_in_bersih_detail ON tbl_stok_in_bersih.stok_in_id = tbl_stok_in_bersih_detail.stok_in_detail_id
            JOIN tbl_produk ON tbl_stok_in_bersih_detail.stok_in_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif = 1 AND tbl_stok_in_bersih.stok_in_aktif = 1 AND DATE_FORMAT(tbl_stok_in_bersih.stok_in_dt_masuk, '%d-%m-%Y') != DATE_FORMAT(NOW(),'%d-%m-%Y')
        GROUP BY 
            tbl_produk.produk_id, tbl_produk.produk_nama
        ORDER BY
            tbl_produk.produk_id ASC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function all_stok_out_bersih(){
        $sql = "SELECT
            tbl_produk.produk_id AS produk_id,
            tbl_produk.produk_nama AS produk_nama,
            SUM(CAST(tbl_stok_out_bersih_detail.stok_out_detail_jumlah AS FLOAT)) AS produk_jml
        FROM
            tbl_stok_out_bersih
            JOIN tbl_stok_out_bersih_detail ON tbl_stok_out_bersih.stok_out_id = tbl_stok_out_bersih_detail.stok_out_detail_id
            JOIN tbl_produk ON tbl_stok_out_bersih_detail.stok_out_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif = 1 AND tbl_stok_out_bersih.stok_out_aktif = 1 AND DATE_FORMAT(tbl_stok_out_bersih.stok_out_dt_masuk, '%d-%m-%Y') = DATE_FORMAT(NOW(),'%d-%m-%Y')
        GROUP BY 
            tbl_produk.produk_id, tbl_produk.produk_nama
        ORDER BY
            tbl_produk.produk_id ASC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function all_stok_out_bersih_sblm(){
        $sql = "SELECT
            tbl_produk.produk_id AS produk_id,
            tbl_produk.produk_nama AS produk_nama,
            SUM(CAST(tbl_stok_out_bersih_detail.stok_out_detail_jumlah AS FLOAT)) AS produk_jml
        FROM
            tbl_stok_out_bersih
            JOIN tbl_stok_out_bersih_detail ON tbl_stok_out_bersih.stok_out_id = tbl_stok_out_bersih_detail.stok_out_detail_id
            JOIN tbl_produk ON tbl_stok_out_bersih_detail.stok_out_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif = 1 AND tbl_stok_out_bersih.stok_out_aktif = 1 AND DATE_FORMAT(tbl_stok_out_bersih.stok_out_dt_masuk, '%d-%m-%Y') != DATE_FORMAT(NOW(),'%d-%m-%Y')
        GROUP BY 
            tbl_produk.produk_id, tbl_produk.produk_nama
        ORDER BY
            tbl_produk.produk_id ASC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_produk_stok_in_bersih($id){
        $sql = "SELECT
            tbl_stok_in_bersih_detail.stok_in_detail_id AS stok_in_detail_id,
            tbl_produk.produk_nama AS produk_nama,
            tbl_stok_in_bersih_detail.stok_in_detail_jumlah AS stok_in_detail_jumlah,
            tbl_produk.produk_satuan AS produk_satuan,
            tbl_stok_in_bersih_detail.stok_in_detail_harga AS stok_in_detail_harga 
        FROM
            tbl_stok_in_bersih_detail
            JOIN tbl_produk ON tbl_stok_in_bersih_detail.stok_in_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_stok_in_bersih_detail.stok_in_detail_id = '$id'
        ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_semua_stok_kotor(){
        $sql = "SELECT * FROM tbl_produk WHERE tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif = 1";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_semua_stok_kotor_js(){
        $sql = "SELECT * FROM tbl_produk WHERE tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif = 1";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_kode_stok_in_bersih(){
        $sql = "SELECT MAX(stok_in_id) AS maxkode FROM tbl_stok_in_bersih";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_kode_stok_out_id(){
        $sql = "SELECT MAX(stok_out_id) AS maxkode FROM tbl_stok_out_bersih";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_kode_stok_out_kotor(){
        $sql = "SELECT MAX(stok_out_id) AS maxkode FROM tbl_stok_out";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_stok_out_kode_detail(){
        $sql = "SELECT MAX(stok_out_id) AS maxkode FROM tbl_stok_out_bersih";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_kode_order_id(){
        $sql = "SELECT MAX(order_id) AS maxkode FROM tbl_order";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_kode_order_detail_id(){
        $sql = "SELECT MAX(order_detail_id) AS maxkode FROM tbl_order_detail";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_detail_produk_pilih($id){
        $sql = "SELECT * FROM tbl_produk WHERE tbl_produk.produk_stok = 1 AND tbl_produk.produk_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_data_keterangan_stok_out($id){
        $sql = "SELECT * FROM tbl_stok_out_bersih WHERE tbl_stok_out_bersih.stok_out_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_produk_stok_out($id){
        $sql = "SELECT
            tbl_stok_out_bersih_detail.stok_out_detail_id AS stok_out_detail_id,
            tbl_produk.produk_nama AS produk_nama,
            tbl_produk.produk_id AS produk_id,
            tbl_stok_out_bersih_detail.stok_out_detail_jumlah AS stok_out_detail_jumlah,
            tbl_produk.produk_satuan AS produk_satuan
        FROM
            tbl_stok_out_bersih_detail
            JOIN tbl_produk ON tbl_stok_out_bersih_detail.stok_out_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_stok_out_bersih_detail.stok_out_detail_id = '$id'
        ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_all_bersih(){
        $sql = "SELECT count(*) as allcount FROM tbl_order";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_bersih_search($searchQuery){
        $sql = "SELECT count(*) as allcount FROM tbl_order WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_bersih($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_order.order_id as order_id,
        tbl_order.order_nm_pemesan as order_nm_pemesan,
        DATE_FORMAT(tbl_order.order_dt_create, '%d-%m-%Y %H:%i:%s') as order_dt_create,
        tbl_order.order_aktif as order_aktif,
        tbl_order.order_selesai as order_selesai
        FROM tbl_order
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_bersih_stok_in_alat(){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_in_bersih_alat";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_bersih_stok_in_search_alat($searchQuery){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_in_bersih_alat WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_bersih_stok_in_alat($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_stok_in_bersih_alat.stok_in_id as stok_in_id,
        DATE_FORMAT(tbl_stok_in_bersih_alat.stok_in_dt_create, '%d-%m-%Y %H:%i:%s') as stok_in_dt_create,
        DATE_FORMAT(tbl_stok_in_bersih_alat.stok_in_dt_masuk, '%d-%m-%Y') as stok_in_dt_masuk
        FROM tbl_stok_in_bersih_alat
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_bersih_stok_in(){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_in_bersih";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_bersih_stok_in_search($searchQuery){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_in_bersih WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_bersih_stok_in($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_stok_in_bersih.stok_in_id as stok_in_id,
        DATE_FORMAT(tbl_stok_in_bersih.stok_in_dt_create, '%d-%m-%Y %H:%i:%s') as stok_in_dt_create,
        DATE_FORMAT(tbl_stok_in_bersih.stok_in_dt_masuk, '%d-%m-%Y') as stok_in_dt_masuk,
        tbl_stok_in_bersih.catatan as catatan
        FROM tbl_stok_in_bersih
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_stok_out_bersih(){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_out_bersih";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_stok_out_bersih_search($searchQuery){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_out_bersih WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_stok_out_bersih($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_stok_out_bersih.stok_out_id as stok_out_id,
        DATE_FORMAT(tbl_stok_out_bersih.stok_out_dt_create, '%d-%m-%Y %H:%i:%s') as stok_out_dt_create,
        DATE_FORMAT(tbl_stok_out_bersih.stok_out_dt_masuk, '%d-%m-%Y') as stok_out_dt_masuk,
        tbl_stok_out_bersih.catatan as catatan
        FROM tbl_stok_out_bersih
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }
}
?>