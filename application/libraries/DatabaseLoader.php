<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class DatabaseLoader {

 public function __construct() {
         $this->load();
 }

 /**
  * Load the databases and ignore the old ordinary CI loader which only allows one
  */
 public function load(){
    $CI =& get_instance();

    $CI->db = $CI->load->database('default', TRUE);
    $CI->db2 = $CI->load->database('Logs', TRUE);
    $CI->db3 = $CI->load->database('VIP', TRUE);
}



}

     
