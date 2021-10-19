<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    function get_users(){
        $query = $this->db->get('users');
        return $query;
    }

    // get user by id
    function get_user_id($user_id){
        $this->db->select('user_id,email,name,npp,no_tlp,user_role,user_status,users.updated_at,users.created_at');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get('users');
        return $query->row();
    }

    // get detail user | datatables
    function get_detail_users(){
        $this->datatables->select('user_id,email,name,npp,no_tlp,user_role,user_status,users.updated_at,users.created_at');
        $this->datatables->from('users');
        $url = 'update/users/';
        $this->datatables->add_column('action','
            <a href="javascript:void(0);" title="Detail User" class="detail_record btn btn-info btn-sm mt-2" data-userkode="$1" data-email="$2" data-name="$3" data-npp="$4" data-no_tlp="$5" data-user_role="$6" data-user_status="$7" data-created_at="$8">
                <i class="fa fa-info-circle"></i>
            </a>
            <a href="javascript:void(0);" title="Edit User" class="edit_record btn btn-warning btn-sm mt-2" data-userkode="$1">
                <i class="fa fa-edit"></i>
            </a>
            <a href="javascript:void(0);" title="Delete User" class="delete_record btn btn-danger btn-sm mt-2" data-userkode="$1" data-name="$3">
                <i class="fa fa-trash"></i>
            </a>','user_id,email,name,npp,no_tlp,user_role,user_status,created_at');
        $this->datatables->add_column('actions','
            <a href="javascript:void(0);" title="Detail Admin" class="detail_record btn btn-info btn-sm mt-2" data-userkode="$1" data-email="$2" data-name="$3" data-npp="$4" data-no_tlp="$5" data-user_role="$6" data-user_status="$7" data-created_at="$8">
                <i class="fa fa-info-circle"></i>
            </a>
            <a href="javascript:void(0);" title="Edit Admin" class="edit_record btn btn-warning btn-sm mt-2" data-userkode="$1">
                <i class="fa fa-edit"></i>
            </a>','user_id,email,name,npp,no_tlp,user_role,user_status,created_at');
        return $this->datatables->generate();
    }

    // tambah user data
    function add_user(){
        $post = $this->input->post();
        $hash = password_hash('123456',PASSWORD_DEFAULT);
        $data = array(
            'user_id' => '',
            'email' => 'ubah.email@ini.com',
            'name' => htmlentities(strip_tags($post['name'])),
            'npp' => htmlentities(strip_tags($post['npp'])),
            'no_tlp' => '+628511ubah',
            'password' => $hash,
            'user_role' => 'us3r',
            'user_status' => '1',
            'created_at' => date('Y-m-d H:i:s'),
        );
        $this->db->insert('users',$data);
    }

    // update user data
    function update_user(){
        $post = $this->input->post();
        $id = htmlentities(strip_tags($post['user_id']));
        if($id ==1){
            $i_password = htmlentities(strip_tags($post['new_password']));
        }else{
            $i_password = htmlentities(strip_tags($post['password']));
        }
        $hash = password_hash($i_password,PASSWORD_DEFAULT);
        $data = array(
            'email' => htmlentities(strip_tags($post['email'])),
            'name' => htmlentities(strip_tags($post['name'])),
            'npp' => htmlentities(strip_tags($post['npp'])),
            'no_tlp' => htmlentities(strip_tags($post['no_tlp'])),
            'password' => $hash,
            'user_role' => htmlentities(strip_tags($post['user_role'])),
            'user_status' => htmlentities(strip_tags($post['user_status'])),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('user_id', $id);
        $this->db->update('users',$data);
    }

    // delete user data
    function delete_user(){
        $id = $this->input->post('user_id');
        $this->db->where('user_id', $id);
        $this->db->delete('users');
    }

    // update profile
    function update_profile(){
        $id = $this->session->userdata('user_id');
        $post = $this->input->post();
        $i_password = htmlentities(strip_tags($post['new_password']));
        $hash = password_hash($i_password,PASSWORD_DEFAULT);
        $data = array(
            'name' => htmlentities(strip_tags($post['name'])),
            'npp' => htmlentities(strip_tags($post['npp'])),
            'password' => $hash,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $this->db->where('user_id', $id);
        $this->db->update('users',$data);
    }

    // check password lama
    function current_password_cek($user_id,$current_password){
        $this->db->from('users');
        $this->db->where('user_id',$user_id);
        $query = $this->db->get();
        $dUser = $query->row_array();
        if(password_verify($current_password, $dUser['password'])){
            return $query->result();
        }else{
            return false;
        }
    }
}