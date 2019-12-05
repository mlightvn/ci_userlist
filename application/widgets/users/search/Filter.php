<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Filter extends CI_Controller {

  public function process(Array $data = array()) {
	// $this->load->library('pagination');
	// $this->load->helper(array('form', 'captcha'));
	$this->load->view('widgets/users/search/filter', $data);
  }
}
