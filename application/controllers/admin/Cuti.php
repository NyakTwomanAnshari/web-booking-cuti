<?php defined('BASEPATH') OR exit('No direct access allowed');

class Cuti extends CI_Controller {
    function __construct(){
        parent::__construct();
        $user_login = $this->acl->is_admin();
        if(!$user_login){
            show_error("Anda tidak mempunyai akses mengakses halaman ini.");
        }
        $this->load->model('back/m_cuti');
    }

    // for view index
    public function index(){
        $this->data['titleTop'] = 'Daftar Pegawai Mengajukan Cuti';
        $this->data['name_script'] = 'cuti';
        $this->data['cuti'] = $this->m_cuti->get_cuti();
        $this->theme->backend('content/admin/cuti/view', $this->data);
    }

    // update status permohonan
    public function update_acc(){
        if($this->form_validation->run('cuti')!==false){
            $this->m_cuti->update_status();
            $this->session->set_flashdata('message', 'Status permohonan berhasil diperbarui');
            redirect('view/cuti/users');
        }
    }

    // hapus cuti
    function delete(){
        $this->m_cuti->delete_cuti();
        $this->session->set_flashdata('message', 'Data cuti berhasil dihapus');
        redirect('view/cuti/users');
    }

    // data json
    function get_json(){
        header('Content-Type:application/json');
        echo $this->m_cuti->get_users_cuti();
    }
}
