<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Form_validation extends CI_Form_validation {

    public function __construct()
    {
        parent::__construct();

        $this->_error_prefix = '<p style="color: red; font-size: 11px;">';
        $this->_error_suffix = '</p>';
    }
}