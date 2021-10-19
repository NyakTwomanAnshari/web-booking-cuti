<?php defined('BASEPATH') OR exit('No direct access allowed');

class Theme {
    protected $CI;
    var $theme_data = array();

    function __construct(){
        $this->CI = &get_instance();
    }

    function set_i($name,$value){
        $this->theme_data[$name] = $value;
    }

    function backend($v = '', $v_data = array(), $return = false){
        if($_SESSION['user_role'] === 'adm1n'){
            $data_header = '';
            $this->set_i('navbar', $this->CI->load->view('layouts/admin/navbar', $data_header, true));
            $this->set_i('content', $this->CI->load->view($v, $v_data, true));
            return $this->CI->load->view('layouts/index', $this->theme_data, $return);
        }elseif($_SESSION['user_role'] === 'us3r'){
            $data_header = '';
            $this->set_i('navbar', $this->CI->load->view('layouts/user/navbar', $data_header, true));
            $this->set_i('content', $this->CI->load->view($v, $v_data, true));
            return $this->CI->load->view('layouts/index', $this->theme_data, $return);
        }
    }
}