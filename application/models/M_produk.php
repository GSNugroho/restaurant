<?php
class M_produk extends CI_Model{
    function insert_data_produk_baru($data){
        $this->db->insert('tbl_produk', $data);
    }

    function insert_data_stok_baru($data){
        $this->db->insert('tbl_stok', $data);
    }

    function insert_foto_produk_baru($data){
        $this->db->insert('tbl_produk_foto', $data);
    }

    function insert_batch_produk_stok_in($data){
        $this->db->insert_batch('tbl_stok_in_detail', $data);
    }

    function insert_batch_produk_stok_out($data){
        $this->db->insert_batch('tbl_stok_out_detail', $data);
    }

    function insert_resep_menu_batch($data){
        $this->db->insert_batch('tbl_resep_produk', $data);
    }

    function insert_stok_in($data){
        $this->db->insert('tbl_stok_in', $data);
    }

    function insert_stok_out($data){
        $this->db->insert('tbl_stok_out', $data);
    }

    function hapus_resep_sebelumnya($id){
        $this->db->delete('tbl_resep_produk', $id);
    }

    function update_foto_produk_baru($name){
        $sql = "UPDATE tbl_produk_foto
        SET foto_aktif = 0
        WHERE foto_nama LIKE '%$name%'";
        $query = $this->db->query($sql);
    }

    function update_detail_produk($id, $data){
        $this->db->where('produk_id', $id);
        $this->db->update('tbl_produk', $data);
    }

    function cek_data_nama_stok($produk_id){
        $sql = "SELECT * FROM tbl_stok WHERE produk_id = '$produk_id'";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_kategori(){
        $sql = "SELECT * FROM tbl_kategori";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_data_keterangan_stok_in($id){
        $sql = "SELECT
            stok_in_id,
            DATE_FORMAT(stok_in_dt_masuk, '%d-%m-%Y') as stok_in_dt_masuk,
            stok_in_dt_create,
            stok_in_dt_modif,
            stok_in_user_create,
            stok_in_user_modif,
            stok_in_aktif
        FROM
            tbl_stok_in 
        WHERE
            tbl_stok_in.stok_in_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_produk($id){
        $sql = "SELECT
            tbl_produk.produk_id AS produk_id,
            tbl_produk.produk_nama AS produk_nama,
            tbl_produk.produk_jenis AS produk_jenis,
            tbl_kategori.kategori_nama AS produk_kategori,
            tbl_kategori.kategori_id AS kategori_id,
            tbl_produk.produk_harga AS produk_harga,
            tbl_produk.produk_satuan AS produk_satuan,
            tbl_produk_foto.foto_nama AS produk_gambar
        FROM
            tbl_produk
            JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id
            LEFT JOIN tbl_produk_foto ON tbl_produk.produk_id = tbl_produk_foto.produk_id
        WHERE tbl_produk.produk_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_resep($id){
        $sql = "SELECT
            tbl_produk.produk_nama AS produk_nama,
            tbl_produk.produk_id AS produk_id,
            tbl_resep_produk.resep_produk_jml AS produk_jml 
        FROM
            tbl_resep_produk
            JOIN tbl_produk ON tbl_resep_produk.resep_produk_bb = tbl_produk.produk_id
        WHERE
            tbl_resep_produk.resep_produk_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_produk_pilih($id){
        $sql = "SELECT * FROM tbl_produk WHERE tbl_produk.produk_stok = 1 AND tbl_produk.produk_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    function get_semua_stok_kotor(){
        $sql = "SELECT * FROM tbl_produk WHERE tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_semua_stok_kotor_js(){
        $sql = "SELECT * FROM tbl_produk WHERE tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_produk_stok_in($id){
        $sql = "SELECT
            tbl_stok_in_detail.stok_in_detail_id AS stok_in_detail_id,
            tbl_produk.produk_nama AS produk_nama,
            tbl_stok_in_detail.stok_in_detail_jumlah AS stok_in_detail_jumlah,
            tbl_produk.produk_satuan AS produk_satuan,
            tbl_stok_in_detail.stok_in_detail_harga AS stok_in_detail_harga 
        FROM
            tbl_stok_in_detail
            JOIN tbl_produk ON tbl_stok_in_detail.stok_in_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_stok_in_detail.stok_in_detail_id = '$id'
        ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_semua_produk_jual(){
        $sql = "SELECT
            tbl_produk.produk_id as produk_id,
            tbl_produk.produk_nama as produk_nama,
            tbl_produk.produk_harga as produk_harga,
            tbl_produk_foto.foto_nama as produk_foto,
            tbl_produk.produk_kategori as produk_kategori 
        FROM
            tbl_produk
            JOIN tbl_produk_foto ON tbl_produk.produk_id = tbl_produk_foto.produk_id
            JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id 
        WHERE
            tbl_produk.produk_aktif = 1 
            AND tbl_produk.produk_jual = 1
            AND tbl_produk_foto.foto_aktif = 1
        ORDER BY tbl_kategori.kategori_id, tbl_produk.produk_nama ASC";

        $query = $this->db->query($sql);
        return $query;
    }

    function get_produk_detail($id){
        $sql = "SELECT
            tbl_produk.produk_id as produk_id,
            tbl_produk.produk_nama as produk_nama,
            tbl_produk.produk_harga as produk_harga
        FROM
            tbl_produk
            JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id 
        WHERE
            tbl_produk.produk_aktif = 1 
            AND tbl_produk.produk_jual = 1
            AND tbl_produk.produk_id = '$id'
        ORDER BY tbl_kategori.kategori_id ASC";

        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_data_keterangan_stok_out($id){
        $sql = "SELECT
            id,
            stok_out_id,
            DATE_FORMAT(stok_out_dt_masuk,'%d-%m-%Y') as stok_out_dt_masuk,
            stok_out_dt_create,
            stok_out_dt_modif,
            stok_out_user_create,
            stok_out_user_modif,
            stok_out_aktif
        FROM
            tbl_stok_out 
        WHERE
            tbl_stok_out.stok_out_id = '$id'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_detail_produk_stok_out($id){
        $sql = "SELECT
            tbl_stok_out_detail.stok_out_detail_id AS stok_out_detail_id,
            tbl_produk.produk_nama AS produk_nama,
            tbl_stok_out_detail.stok_out_detail_jumlah AS stok_out_detail_jumlah,
            tbl_produk.produk_satuan AS produk_satuan
        FROM
            tbl_stok_out_detail
            JOIN tbl_produk ON tbl_stok_out_detail.stok_out_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_stok_out_detail.stok_out_detail_id = '$id'
        ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function get_kode_produk(){
        $sql = "SELECT MAX(produk_id) AS maxkode FROM tbl_produk";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_kode_stok_in(){
        $sql = "SELECT MAX(stok_in_id) AS maxkode FROM tbl_stok_in";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_kode_stok_out(){
        $sql = "SELECT MAX(stok_out_id) AS maxkode FROM tbl_stok_out";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_produk(){
        $sql = "SELECT count(*) as allcount FROM tbl_produk
        LEFT JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_produk_search($searchQuery){
        $sql = "SELECT count(*) as allcount FROM tbl_produk
        LEFT JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_produk($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_produk.produk_id as produk_id,
        tbl_produk.produk_nama as produk_nama,
        tbl_kategori.kategori_nama as produk_kategori,
        tbl_produk.produk_harga as produk_harga
        FROM tbl_produk
        LEFT JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_kategori(){
        $sql = "SELECT count(*) as allcount FROM tbl_kategori";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_kategori_search($searchQuery){
        $sql = "SELECT count(*) as allcount FROM tbl_kategori WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_kategori($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_kategori.kategori_id as kategori_id,
        tbl_kategori.kategori_nama as kategori_nama,
        COUNT(tbl_kategori.kategori_nama) as kategori_jumlah
        FROM tbl_kategori
        JOIN
	    tbl_produk ON tbl_kategori.kategori_id = tbl_produk.produk_kategori
        WHERE 1=1 ".$searchQuery." GROUP BY kategori_id, kategori_nama ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_stok(){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok
        JOIN tbl_produk ON tbl_stok.produk_id = tbl_produk.produk_id
        JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_stok_search($searchQuery){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok
        JOIN tbl_produk ON tbl_stok.produk_id = tbl_produk.produk_id
        JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_stok($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_produk.produk_id as produk_id,
        tbl_produk.produk_nama as produk_nama,
        tbl_kategori.kategori_nama as produk_kategori,
        tbl_stok.stok_awal as stok_awal,
        tbl_stok.stok_masuk as stok_masuk,
        tbl_stok.stok_keluar as stok_keluar,
        tbl_stok.stok_penjualan as stok_penjualan,
        tbl_stok.stok_transfer as stok_transfer,
        tbl_stok.stok_penyesuaian as stok_penyesuaian,
        tbl_stok.stok_akhir as stok_akhir,
        tbl_produk.produk_satuan as produk_satuan
        FROM tbl_stok
        JOIN tbl_produk ON tbl_stok.produk_id = tbl_produk.produk_id
        JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_stok_in(){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_in";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_stok_in_search($searchQuery){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_in WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_stok_in($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_stok_in.stok_in_id as stok_in_id,
        DATE_FORMAT(tbl_stok_in.stok_in_dt_create, '%d-%m-%Y %H:%i:%s') as stok_in_dt_create,
        DATE_FORMAT(tbl_stok_in.stok_in_dt_masuk, '%d-%m-%Y') as stok_in_dt_masuk
        FROM tbl_stok_in
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_stok_out(){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_out";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_stok_out_search($searchQuery){
        $sql = "SELECT COUNT(*) as allcount FROM tbl_stok_out WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_stok_out($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_stok_out.stok_out_id as stok_out_id,
        DATE_FORMAT(tbl_stok_out.stok_out_dt_create, '%d-%m-%Y %H:%i:%s') as stok_out_dt_create,
        DATE_FORMAT(tbl_stok_out.stok_out_dt_masuk, '%d-%m-%Y') as stok_out_dt_masuk
        FROM tbl_stok_out
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }

    function all_stok_produk(){
        if(($this->session->userdata('akses') == '1') || ($this->session->userdata('akses') == '10')){
			// $produk_level = 0;
            $sql = "SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id WHERE produk_stok = 1 AND produk_aktif = 1 AND produk_level != 1 ORDER BY produk_id ASC";
		}else if($this->session->userdata('akses') == '11'){
			// $produk_level = 1;
            $sql = "SELECT * FROM tbl_produk JOIN tbl_kategori ON tbl_produk.produk_kategori = tbl_kategori.kategori_id WHERE produk_stok = 1 AND produk_aktif = 1 AND produk_level != 1 ORDER BY produk_id ASC";
		}
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function all_stok_in(){
        $sql = "SELECT
            tbl_produk.produk_id AS produk_id,
            tbl_produk.produk_nama AS produk_nama,
            SUM(CAST(tbl_stok_in_detail.stok_in_detail_jumlah AS FLOAT)) AS produk_jml
        FROM
            tbl_stok_in
            JOIN tbl_stok_in_detail ON tbl_stok_in.stok_in_id = tbl_stok_in_detail.stok_in_detail_id
            JOIN tbl_produk ON tbl_stok_in_detail.stok_in_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif = 1 AND tbl_stok_in.stok_in_aktif = 1
        GROUP BY 
            tbl_produk.produk_id, tbl_produk.produk_nama
        ORDER BY
            tbl_produk.produk_id ASC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function all_stok_out(){
        $sql = "SELECT
            tbl_produk.produk_id AS produk_id,
            tbl_produk.produk_nama AS produk_nama,
            SUM(CAST(tbl_stok_out_detail.stok_out_detail_jumlah AS FLOAT)) AS produk_jml
        FROM
            tbl_stok_out
            JOIN tbl_stok_out_detail ON tbl_stok_out.stok_out_id = tbl_stok_out_detail.stok_out_detail_id
            JOIN tbl_produk ON tbl_stok_out_detail.stok_out_detail_produk_id = tbl_produk.produk_id
        WHERE
            tbl_produk.produk_stok = 1 AND tbl_produk.produk_aktif = 1 AND tbl_stok_out.stok_out_aktif = 1
        GROUP BY 
            tbl_produk.produk_id, tbl_produk.produk_nama
        ORDER BY
            tbl_produk.produk_id ASC";
        
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
?>