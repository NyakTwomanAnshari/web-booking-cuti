<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    // check login active user
    public function cek_login($npp, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_status', '1');
        $this->db->where('npp', $npp);
        $query = $this->db->get();
        $dUser = $query->row_array();
        if(password_verify($password, $dUser['password'])){
            return $query->result();
        }else{
            return false;
        }
    }

    // check login nonactive user
    public function cek_login_nonactive($npp, $password){
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('user_status', '0');
        $this->db->where('npp', $npp);
        $query = $this->db->get();
        $dUser = $query->row_array();
        if(password_verify($password, $dUser['password'])){
            return $query->result();
        }else{
            return false;
        }
    }
}