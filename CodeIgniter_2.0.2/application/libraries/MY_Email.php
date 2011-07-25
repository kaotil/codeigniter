<?php if ( !defined( 'BASEPATH' ) ) exit( 'No direct script access allowed' );
class MY_Email extends CI_Email {

    function __construct()
    {
        parent::__construct();
    }

    function some_function()
    {
var_dump($this->test);
var_dump($this->_encoding);
        return "some";
    }
}