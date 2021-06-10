<?php
class M_administrator extends CI_Model{
    function insert_akun_baru($data){
        $this->db->insert('tbl_user', $data);
    }

    function get_kode_user_id(){
        $sql = "SELECT MAX(user_id) AS maxkode FROM tbl_user";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_user(){
        $sql = "SELECT count(*) as allcount FROM tbl_user";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_user_search($searchQuery){
        $sql = "SELECT count(*) as allcount FROM tbl_user WHERE 1=1 ".$searchQuery;
        $query = $this->db->query($sql);
        return $query;
    }

    function get_fetch_user($searchQuery, $columnName, $columnSortOrder, $baris, $rowperpage){
        $sql = "SELECT 
        tbl_user.user_id as user_id,
        tbl_user.user_username as user_username,
        tbl_user.user_nama as user_nama,
        tbl_user.user_level as user_level,
        tbl_user.user_status as user_status
        FROM tbl_user
        WHERE 1=1 ".$searchQuery." ORDER BY ".$columnName." "
        .$columnSortOrder." LIMIT ".$baris.", ".$rowperpage;
        $query = $this->db->query($sql);
        return $query;
    }
}
?>