<?php
class M_welcome extends CI_Model{
    function cek_login($user, $pass){
        $sql = "SELECT * FROM tbl_user WHERE user_username = '$user' AND user_password = md5('$pass')";
        // echo $sqld;
        $hasil = $this->db->query($sql);
        return $hasil;
    }
}
?>