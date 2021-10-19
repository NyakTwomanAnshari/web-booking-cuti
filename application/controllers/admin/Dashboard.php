<?php defined('BASEPATH') OR exit('No direct access allowed');

class Dashboard extends CI_Controller {
    function __construct(){
        parent::__construct();
        $user_login = $this->acl->is_admin();
        if(!$user_login){
            show_error("Anda tidak mempunyai akses mengakses halaman ini.");
        }
    }

    // for view index
    public function index(){
        $this->data['titleTop'] = 'Dashboard Admin';
        $this->load->view('content/admin/dashboard', $this->data);
    }

}