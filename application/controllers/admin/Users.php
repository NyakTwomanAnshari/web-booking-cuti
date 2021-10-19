<?php defined('BASEPATH') OR exit('No direct access allowed');

class Users extends CI_Controller {
    function __construct(){
        parent::__construct();
        $user_login = $this->acl->is_admin();
        if(!$user_login){
            show_error("Anda tidak mempunyai akses mengakses halaman ini.");
        }
        $this->load->model('back/m_users');
    }

    // for view index
    public function index(){
        $this->data['titleTop'] = 'Daftar User'; 
        $this->data['name_script'] = 'users';
        $this->data['users'] = $this->m_users->get_users();
        $this->theme->backend('content/admin/users/view', $this->data);
    }

    // tambah user
    public function add(){
        if($this->form_validation->run('users_add')!==false){
            $result = $this->m_users->add_user();
            $this->session->set_flashdata('message', '<span class="text-white">User berhasil ditambahkan</span>');
            redirect('add/users/data');
        }else if(!empty($this->input->post('npp')) && $this->form_validation->run('users_add')===false){
            $this->session->set_flashdata('message', '<span class="text-warning">User gagal ditambahkan, '.validation_errors().'</span>');
        }

        $this->data['titleTop'] = 'Tambah User'; 
        $this->data['name_script'] = 'users';
        $this->theme->backend('content/admin/users/tambah', $this->data);
    }

    // update user
    public function edit($user_id){
        $this->data['titleTop'] = 'Edit User'; 
        $this->data['name_script'] = 'users';
        $this->data['users'] = $this->m_users->get_user_id($user_id);
        $user_id = $this->input->post('user_id');
        if($user_id == 1 && $this->form_validation->run('users_edit_admin')!==false){
            $current_password = $this->input->post('current_password');
            $password_check = $this->m_users->current_password_cek($user_id,$current_password);
            if($password_check){
                $this->m_users->update_user();
                $this->session->set_flashdata('message', 'Data Admin berhasil diperbarui');
                redirect('view/users/data');
            }else{
                $this->session->set_flashdata('gagal', 'Password lama salah, mohon input data password lama dengan benar');
            }
        }elseif($user_id != 1 && $this->form_validation->run('users_edit')!==false){
            $this->m_users->update_user();
            $this->session->set_flashdata('message', 'User berhasil diperbarui');
            redirect('view/users/data');
        }elseif(!empty($user_id) && $this->form_validation->run('users_edit_admin')===false){
                $this->session->set_flashdata('gagal', 'Data Admin gagal diperbarui, '.validation_errors().'');
        }
        $this->theme->backend('content/admin/users/edit', $this->data);
    }

    // hapus user
    public function delete(){
        $this->m_users->delete_user();
        $this->session->set_flashdata('message', 'User berhasil dihapus');
        redirect('view/users/data');
    }

    // data json
    function get_json(){
        header('Content-Type:application/json');
        echo $this->m_users->get_detail_users();
    }
}
