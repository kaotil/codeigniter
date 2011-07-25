<?php

class Signup extends CI_Controller {

    function index()
    {
        $this->load->helper('form');

        $this->load->view('signup/index');
    }

    function regist()
    {
        $this->load->library(array('form_validation'));
        if ($this->form_validation->run('signup') == FALSE)
        {
            $this->load->view('signup/index');
            return;
        }



        $this->load->model('Signup_model');

        $post = $this->input->post();

        $return = $this->Signup_model->insert_user($post);

        $this->load->view('signup/result');
    }
}