<?php defined('BASEPATH') OR exit('No direct access allowed');

class Acl {
    protected $CI;

    function __construct() {
        $this->CI = &get_instance();
    }

    function logged_in() {
        if(empty($_SESSION['logged_in'])){
            return false;
        }elseif($_SESSION['logged_in'] === '73ce1da3e9a955cc2dc32bcbf0cb0c03'){
            return true;
        }else{
            return false;
        }
    }

    //:: kode admin adalah 45
    function is_admin() {
        if(empty($_SESSION['user_role'])){
            redirect(base_url().'login');
        }elseif($_SESSION['user_role'] === 'adm1n'){
            return true;
        }
    }

    // :: kode user adalah 55
    function is_user() {
        if(empty($_SESSION['user_role'])){
            redirect(base_url().'login');
        }elseif($_SESSION['user_role'] === 'us3r'){
            return true;
        }
    }
}