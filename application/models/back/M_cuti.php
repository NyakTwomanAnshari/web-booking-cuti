<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_cuti extends CI_Model {
    function __construct(){
        parent::__construct();
    }

    // for get cuti
    function get_cuti(){
        $this->db->join('users','cuti.user_id = users.user_id');
        $query = $this->db->get('cuti');
        return $query;
    }

    // get mybooking
    function get_mybooking(){
        $id = $this->session->userdata('user_id');
        $this->db->select('cuti_id,users.name,unit,cuti.created_at,from_date,until_date,cuti_jenis,alasan,status_acc');
        $this->db->from('cuti');
        $this->db->join('users','cuti.user_id = users.user_id');
        $this->db->order_by('cuti.user_id','DESC');
        $this->db->where('cuti.status_acc','Disetujui');
        // $this->db->where('users.user_id',$id);
        $query = $this->db->get();
        return $query->result();
    }

    // users cuti tables
    function get_users_cuti(){
        $this->datatables->select('cuti_id,users.name,unit,cuti.created_at,from_date,until_date,cuti_jenis,alasan,status_acc');
        $this->datatables->from('cuti');
        $this->datatables->join('users','cuti.user_id = users.user_id');
        $this->datatables->add_column('action','
            <a href="javascript:void(0);" title="Delete" class="mt-1 delete_record btn btn-danger btn-sm" data-cutikode="$1" data-cutiname="$2">
                <i class="fa fa-trash"></i>
            </a>
            <a href="javascript:void(0);" class="mt-1 ml-3 alasan_record btn btn-success btn-sm" title="Alasan" data-cutikode="$1" data-name="$2" data-created_at="$3" data-cuti_jenis="$6" data-alasan="$7">
                <i class="fa fa-info-circle"></i>
            </a>
            <a href="javascript:void(0);" class="mt-1 ml-2 edit_record btn btn-warning btn-sm" data-cutikode="$1" data-name="$2" data-created="$3" data-from="$4" data-until="$5" data-cutijenis="$6" data-status="$8" title="Persetujuan">
                <i class="fa fa-check"></i>
            </a>
            <span class="text-capitalize pl-2">$8</span>','cuti_id,name,created_at,from_date,until_date,cuti_jenis,alasan,status_acc');
        return $this->datatables->generate();
    }

    // update status by admin
    public function update_status(){
        $id = $this->input->post('cuti_id');
        $data = array(
            'status_acc' => $this->input->post('status_acc')
        );
        $this->db->where('cuti_id', $id);
        $this->db->update('cuti',$data);
    }

    // check range date cuti || revisi
    function range_date(){
        $start_date = $this->input->post('from_date');
        $end_date = $this->input->post('until_date');
        $this->db->select('cuti_id,from_date,until_date, name, unit');
        $this->db->join('users','cuti.user_id = users.user_id');
        $where = '(from_date >= date("'.$start_date.'") AND until_date <= date("'.$end_date.'"))';
        $where = '(until_date >= date("'.$start_date.'") AND from_date <= date("'.$end_date.'"))';
        $this->db->where($where);
        $query = $this->db->get('cuti');
        if($query->num_rows()>=1){
            return $query->result();
        }else{
            return false;
        }
    }

    // check tgl cuti || sebelum revisi || terupload
    // function cek_tgl(){
    //     $start_date = $this->input->post('from_date');
    //     $end_date = $this->input->post('until_date');
    //     $this->db->select('cuti_id,name,unit');
    //     $this->db->join('users','cuti.user_id = users.user_id');
    //     $this->db->where('from_date >=', $start_date);
    //     $this->db->where('until_date <=', $end_date);
    //     $this->db->group_by('cuti_id');
    //     $query = $this->db->get('cuti');
    //     if($query->num_rows()>=1){
    //         return $query->result();
    //     }else{
    //         return false;
    //     }
    // }

    // add cuti by user
    public function add_cuti(){
        $post = $this->input->post();
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'unit' => ucwords(htmlentities(strip_tags($post['unit']))),
            'from_date' => htmlentities(strip_tags($post['from_date'])),
            'until_date' => htmlentities(strip_tags($post['until_date'])),
            'cuti_jenis' => htmlentities(strip_tags($post['cuti_jenis'])),
            'alasan' => htmlentities(strip_tags($post['alasan'])),
            'status_acc' => 'Menunggu',
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('cuti',$data);
    }

    // for get admin email 
    public function get_admin_email() {
        $this->db->select('email');
        return $this->db->get_where('users', array('user_id'=>'1'))->result();
    }

    // for delete cuti
    public function delete_cuti(){
        $id = $this->input->post('cuti_id');
        $this->db->where('cuti_id', $id);
        $this->db->delete('cuti');
    }

}