<?php defined('BASEPATH') OR exit('No direct access allowed');

class Auth extends CI_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    // for auth process
    public function index(){
        if($this->form_validation->run('login')!==false){
            $npp                = htmlspecialchars($this->input->post('npp'));
            $password           = htmlspecialchars($this->input->post('password'));
            $result             = $this->m_login->cek_login($npp, $password);
            $result_nonactive   = $this->m_login->cek_login_nonactive($npp, $password);
            if(!empty($result_nonactive)){
                $this->session->set_flashdata('message','Akun user dinonaktifkan');
                redirect(base_url().'login');
            }else if(!empty($result)){
                foreach($result as $data){
                    $data_session = array(
                        'user_id'       => $data->user_id,
                        'email'         => $data->email,
                        'name'          => $data->name,
                        'npp'           => $data->npp,
                        'no_tlp'        => $data->no_tlp,
                        'user_role'     => $data->user_role,
                        'updated_at'    => $data->updated_at,
                        'created_at'    => $data->created_at,
                        'logged_in'     => '73ce1da3e9a955cc2dc32bcbf0cb0c03',
                    );
                $this->session->set_userdata($data_session);
                }

                if($this->acl->is_admin()){
                    redirect(base_url().'view/admin/dashboard');
                }elseif($this->acl->is_user()){
                    redirect(base_url().'view/user/dashboard');
                }
                
            }else{
                $this->session->set_flashdata('message','NPP atau Password salah');
                redirect(base_url().'login');
            }
        }else{
            // var_dump($npp, $password);
            redirect(base_url().'login');
        }
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }
}