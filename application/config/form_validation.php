<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$config = array(
    'login' => array(
        array(
            'field' => 'npp',
            'label' => 'npp',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'trim|required'
        )
    ),
    'cuti' => array(
        array(
            'field' => 'cuti_id',
            'label' => 'cuti_id',
            'rules' => 'required'
        ),
        array(
            'field' => 'status_acc',
            'label' => 'status_acc',
            'rules' => 'required'
        )
    ),
    'user_cuti_add' => array(
        array(
            'field' => 'unit',
            'label' => 'unit',
            'rules' => 'required'
        ),
        array(
            'field' => 'from_date',
            'label' => 'from_date',
            'rules' => 'required'
        ),
        array(
            'field' => 'until_date',
            'label' => 'until_date',
            'rules' => 'required'
        ),
        array(
            'field' => 'cuti_jenis',
            'label' => 'cuti_jenis',
            'rules' => 'required'
        ),
        array(
            'field' => 'alasan',
            'label' => 'alasan',
            'rules' => 'required'
        )
    ),
    'users_add' => array(
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required'
        ),
        array(
            'field' => 'npp',
            'label' => 'npp',
            'rules' => 'required'
        )
    ),
    'users_edit' => array(
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required'
        ),
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required'
        ),
        array(
            'field' => 'npp',
            'label' => 'npp',
            'rules' => 'required'
        ),
        array(
            'field' => 'user_role',
            'label' => 'user_role',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'password',
            'rules' => 'required|min_length[6]|max_length[15]'
        )
    ),
    'users_edit_admin' => array(
        array(
            'field' => 'email',
            'label' => 'email',
            'rules' => 'required'
        ),
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required'
        ),
        array(
            'field' => 'npp',
            'label' => 'npp',
            'rules' => 'required'
        ),
        array(
            'field' => 'current_password',
            'label' => 'current_password',
            'rules' => 'required'
        ),
        array(
            'field' => 'new_password',
            'label' => 'new_password',
            'rules' => 'required|min_length[6]|max_length[15]'
        )
    ),
    'profile_update' => array(
        array(
            'field' => 'name',
            'label' => 'name',
            'rules' => 'required'
        ),
        array(
            'field' => 'npp',
            'label' => 'npp',
            'rules' => 'required'
        ),
        array(
            'field' => 'current_password',
            'label' => 'current_password',
            'rules' => 'required'
        ),
        array(
            'field' => 'new_password',
            'label' => 'new_password',
            'rules' => 'required|min_length[6]|max_length[15]'
        )
    ),
);