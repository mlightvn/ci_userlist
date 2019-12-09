<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function error_404()
	{
		$this->output->set_status_header('404');

		$data['title'] = "404 page not found";

		$this->load->view('layouts/header', $data);
		$this->load->view('errors/html/404', $data);
		$this->load->view('layouts/footer');
	}

}
