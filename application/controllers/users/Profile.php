<?php defined('BASEPATH') OR exit('No direct access allowed');

class Profile extends CI_Controller {
    function __construct(){
        parent::__construct();
        $user_login = $this->acl->is_user();
        if(!$user_login){
            show_error("Anda tidak mempunyai akses halaman ini.");
        }
        $this->load->model('back/m_users');
    }

    public function index(){
        $user_id = $this->session->userdata('user_id');
        $content = 'content/user/profile/index';
        $this->data['titleTop'] = 'My Profile';
        $this->data['name_script'] = 'profile';
        $this->data['users'] = $this->m_users->get_user_id($user_id);
        
        $this->theme->backend($content, $this->data);
    }

    public function edit(){
        $user_id = $this->session->userdata('user_id');
        $content = 'content/user/profile/edit';
        $this->data['titleTop'] = 'Edit Profil';
        $this->data['name_script'] = 'profile';
        $current_password = $this->input->post('current_password');

        if($this->form_validation->run('profile_update')!==false){
            $password_check = $this->m_users->current_password_cek($user_id,$current_password);
            if($password_check){
                $update = $this->m_users->update_profile();
                $this->session->set_flashdata('sukses', 'Profile berhasil diperbarui');
                redirect('view/user/profil');
            }else{
                $this->session->set_flashdata('gagal', 'Password lama salah, mohon input data password lama dengan benar');
            }
        }else if(!empty($current_password) && $this->form_validation->run('profile_update')===false){
            $this->session->set_flashdata('gagal', 'Profile gagal diperbarui, '.validation_errors().'');
        }

        $this->data['users'] = $this->m_users->get_user_id($user_id);
        $this->theme->backend($content, $this->data);
    }
}