<?php defined('BASEPATH') OR exit ('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    public function __construct() {
        log_message('Debug', 'PHPMailer Class is loaded.');
    }

    public function load(){
        require_once(APPPATH.'third_party/Exception.php');
        require_once(APPPATH.'third_party/PHPMailer.php');
        require_once(APPPATH.'third_party/SMTP.php');

        $mail = new PHPMailer(true);
        return $mail;
    }
}