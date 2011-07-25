<?php

class Form extends CI_Controller {

    function index()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

/*
        $this->form_validation->set_rules('username', 'ユーザ名', 'trim|required|min_length[5]|max_length[12]|xss_clean');
        $this->form_validation->set_rules('password', 'パスワード', 'trim|required|matches[passconf]|md5');
        $this->form_validation->set_rules('passconf', 'パスワードの確認', 'trim|required');
        $this->form_validation->set_rules('email', 'メールアドレス', 'trim|required|valid_email');

        $this->form_validation->set_message('required', '必須項目です');
*/
        $data['input'] = $this->input->post();

        if ($this->form_validation->run('form') == FALSE)
        {
            $this->load->view('form/myform');
        }
        else
        {
            $this->load->view('form/formconfirm', $data);
        }
    }

    function regist()
    {
        $this->load->helper('url');

        $data['input'] = $this->input->post();

        $value = array(
           'username' => $data['input']['username'],
           'password' => $data['input']['password'],
           'email' => $data['input']['email']
        );

        $this->db->insert('member', $value);

        $this->load->view('form/formsuccess', $data);

    }

    function view($offset = 0)
    {
$this->benchmark->mark('start');

        $this->load->library('pagination');

        $config['base_url'] = 'http://localhost/codeigniter/form/view/';
        $config['total_rows'] = '500';
        $config['per_page'] = '40';
        $config['num_links'] = 3;

        $this->pagination->initialize($config);
#       data['link'] = $this->pagination->create_links();

        $this->load->helper(array('form', 'url'));

        $this->db->from('member')->order_by('id', 'asc')->limit($config['per_page'], $offset);
        $query = $this->db->get();

        foreach ($query->result() as $row)
        {
           $data['list'][] = $row;
        }

        $data['current_page'] = ($offset / $config['per_page']) + 1;
        $data['next_offset'] = $offset + $config['per_page'];

        $this->load->view('form/view', $data);

$this->benchmark->mark('end');
echo $this->benchmark->elapsed_time('start', 'end');
$this->output->enable_profiler(TRUE);
    }

    function page($page=1)
    {
        $data['page'] = $page;

        $this->load->view('form/page', $data);
    }

    function username_check($str)
    {
        if ($str == 'test')
        {
            $this->form_validation->set_message('username_check', 'フィールド %s に、"test"は使えません');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }
}