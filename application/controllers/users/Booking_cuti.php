<?php defined('BASEPATH') OR exit('No direct access allowed');

class Booking_cuti extends CI_Controller {
    function __construct(){
        parent::__construct();
        $user_login = $this->acl->is_user();
        if(!$user_login){
            show_error("Anda tidak mempunyai akses mengakses halaman ini.");
        }
        $this->load->model('back/m_cuti');
    }

    function send_mail($name_p,$unit_p,$jenis){
        $this->load->library('mailer'); //load library
        $mail = $this->mailer->load(); //load phpmailer object

        $start_date = longdate_indo($this->input->post('from_date'));
        $end_date = longdate_indo($this->input->post('until_date'));

        // start configuration SMTP
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
        $mail->Username = 'mybookingcutibni@gmail.com';
        $mail->Password = 'cutibni6547';
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';

        $mail->setFrom('mybookingcutibni@gmail.com','Booking Info');
        $mailAdmin = $this->m_cuti->get_admin_email();
        foreach($mailAdmin as $rows){
            $email = $rows->email;
            $mail->addAddress($email); // email tujuan
        }
        $mail->Subject = 'Ada Pengajuan Cuti dari '.ucwords($name_p);
        $mail->isHTML(true);
        $content = '
        <html>
            <head>
                <div style="background-color:#f8f9fa; color:#333;text-align:center;
                            font-weight: bold;padding: 10px; text-transform: uppercase;
                            margin-left: 20px;margin-right: 20px;margin-bottom: 20px; font-size:15px;">
                    Pengajuan Cuti Baru
                    <br>
                    BNI Booking Cuti
                </div>
            </head>
            <body>
                <div style="text-align:left; padding: 7px; margin-left: 20px; margin-right: 20px;">Pengajuan cuti atas nama <b>'.$name_p.'</b> dari unit '.$unit_p.', dengan jenis izin '.$jenis.'.</div>
                <div style="text-align:left; padding: 7px; margin-left: 20px; margin-right: 20px;">Cuti dimulai pada '.$start_date.' dan berakhir pada '.$end_date.'.</div>
            </body>
            <footer>
                <div style="background-color:#f8f9fa; color:#333;text-align:center;
                            padding: 10px; margin: 20px; font-size:10px;">
                    BNI Booking Cuti | bookingcutibni.com
                </div>
            </footer>
        </html>
        ';
        $mail->Body = $content;

        if(!$mail->send()){
            echo 'Pesan tidak terkirim';
            // echo 'Mailer error '.$mail->ErrorInfo;
        }else{
            echo 'Pesan terkirim';
        }

    }

    // add permohonan cuti || revisi
    public function add(){
        $this->data['mybooking']    = $this->m_cuti->get_mybooking();
        $this->data['titleTop']     = 'Booking Cuti';
        $this->data['name_script']  = 'cuti';
        $name_p = $this->session->userdata('name');
        $unit_p = $this->input->post('unit');
        $jenis = $this->input->post('cuti_jenis');

        if($this->form_validation->run('user_cuti_add')!==false){
            $rangeDate = $this->m_cuti->range_date();
            if($rangeDate !== false){
                echo $this->session->set_flashdata('gagal_b', '<h3><span class="text-warning">SILAKAN AJUKAN TANGGAL LAIN, TANGGAL SUDAH DIBOOKING OLEH :</span></h3>');
                $this->data['cek'] = $this->m_cuti->range_date();
                // var_dump($rangeDate );
            }else{
                // var_dump($rangeDate);
                $this->m_cuti->add_cuti();
                $this->send_mail($name_p,$unit_p,$jenis);
                $this->session->set_flashdata('sukses', '<h3>SUKSES BOOKING CUTI</h3>'.'<div class="text-justify h6">'.'<span class="text-warning">Nama:</span> '.$name_p .', <span class="text-warning">Unit:</span> '.$unit_p.'</div>');
                redirect('add/booking/cuti');
            }
        }else if($this->input->post('cuti_name') && $this->form_validation->run('user_cuti_add')===false){
            $this->session->set_flashdata('gagal_a', '<span class="text-warning">Permohonan cuti gagal ditambahkan, '.validation_errors().'</span>');
        }
        $this->theme->backend('content/user/cuti/view', $this->data);
    }

    // add permohonan cuti || sebelum revisi || terupload
    // public function add(){
    //     $this->data['titleTop'] = 'Booking Cuti';
    //     $this->data['name_script'] = 'cuti';
    //     $name_p = $this->session->userdata('name');
    //     $unit_p = $this->input->post('unit');
    //     $jenis = $this->input->post('cuti_jenis');

    //     if($this->form_validation->run('user_cuti_add')!==false){
    //         $cek_tgl = $this->m_cuti->cek_tgl();
    //         if($cek_tgl == false){
    //             $this->m_cuti->add_cuti();
    //             $this->send_mail($name_p,$unit_p,$jenis);
    //             $this->session->set_flashdata('sukses', '<h3>SUKSES BOOKING CUTI</h3>'.'<div class="text-justify h6">'.'<span class="text-warning">Nama:</span> '.$name_p .', <span class="text-warning">Unit:</span> '.$unit_p.'</div>');
    //             redirect('add/booking/cuti');
    //         }else{
    //             echo $this->session->set_flashdata('gagal_b', '<h3><span class="text-warning">SILAKAN AJUKAN TANGGAL LAIN, TANGGAL SUDAH DIBOOKING OLEH :</span></h3>');
    //             $this->data['cek'] = $this->m_cuti->cek_tgl();
    //         }
    //     }else if($this->input->post('cuti_name') && $this->form_validation->run('user_cuti_add')===false){
    //         $this->session->set_flashdata('gagal_a', '<span class="text-warning">Permohonan cuti gagal ditambahkan, '.validation_errors().'</span>');
    //     }
    //     $this->theme->backend('content/user/cuti/view', $this->data);
    // }
}
