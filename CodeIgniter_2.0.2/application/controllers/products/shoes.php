<?php
class Shoes extends CI_Controller {

    public function show($sandals, $id)
    {
        echo $sandals;
        echo $id;
        $this->load->view('products/shoesview');
    }
}