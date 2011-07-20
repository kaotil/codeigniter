<?php
class Signup_model extends CI_Model {

    function __construct()
    {
        // Model クラスのコンストラクタを呼び出す
        parent::__construct();
    }

    function insert_user($input)
    {
        $this->load->library('encrypt');

        $value = array(
           'user_name' => $input['user_name'],
           'email' => $input['email'],
           'pass' => $this->encrypt->encode($input['pass']),
           'ipaddress' => $this->input->ip_address()
        );

        $this->db->set('created', 'NOW()', FALSE);
        $this->db->insert('users', $value);
    }
}