<?php defined('BASEPATH') OR exit('No direct access allowed');

class Login extends CI_Controller {
    function __construct(){
        parent::__construct();
        $user_login = $this->acl->logged_in();
        if($user_login){
            if($this->acl->is_admin()){
                redirect(base_url().'view/admin/dashboard');
            }elseif($this->acl->is_user()){
                redirect(base_url().'view/user/dashboard');
            }
        }
    }

    // for view index login
    public function index(){
        $this->data[''] = '';
        $this->load->view('login/index', $this->data);
    }
}