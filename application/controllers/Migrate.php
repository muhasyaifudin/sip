<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migrate extends CI_Controller {

    function __construct() {
        parent::__construct();
    }	

    public function index($version)
    {
    	$this->load->library('migration');

        if (!$this->migration->version($version))
        {
            show_error($this->migration->error_string());
        }
        else {
            echo 'Migrations ran successfully!';
        }  
    }
}