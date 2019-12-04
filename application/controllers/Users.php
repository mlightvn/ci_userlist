<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->page(1);
	}
	public function page($page = 1)
	{
// dd($_SERVER['CI_ENV']);
		$this->load->model('user');
		$data['model_list'] = $this->user->paginate(10);

		$data['title'] = "ユーザシステム";

		$this->load->library('pagination');

		$data['model_list']['paginate']['base_url'] = base_url('users/page');

		$this->pagination->initialize($data['model_list']['paginate']);

		$this->load->view('layouts/header', $data);
		$this->load->view('users/index', $data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{
		$this->load->helper(array('form', 'url'));

		$data['title'] = "ユーザシステム";
		$this->load->view('layouts/header', $data);
		$this->load->view('users/create');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
        $this->load->library('form_validation');
        $errors_validation_range = array(
        	array('field'=>'name', 'label'=>'ユーザ名', 'rules'=>'required', "errors"=>array('required' => 'You must input into %s.')),
        	array('field'=>'email', 'label'=>'email', 'rules'=>'required', "errors"=>array('required' => 'You must input into %s.'))
        );
        $this->form_validation->set_rules($errors_validation_range);

        if ($this->form_validation->run() === FALSE){
			$this->create();
        }else{
			$this->load->model('user');

			$data["model"] = $this->user->save();

			redirect('/users', 'refresh');
        }
	}

	public function edit($id)
	{
		$this->load->helper(array('form', 'url'));

		$this->load->model('user');
		$data["model"] = $this->user->find($id);
		$data['title'] = "ユーザシステム";

		$this->load->view('layouts/header', $data);
		$this->load->view('users/edit', $data);
		$this->load->view('layouts/footer');
	}

	public function update($id)
	{
		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $errors_validation_range = array(
        	array('field'=>'name', 'label'=>'ユーザ名', 'rules'=>'required', "errors"=>array('required' => 'You must input into %s.')),
        	array('field'=>'email', 'label'=>'email', 'rules'=>'required', "errors"=>array('required' => 'You must input into %s.')),
        	array('field'=>'password', 'label'=>'Password', 'rules'=>'required', "errors"=>array('required' => 'You must input into %s.')),
        );
        $this->form_validation->set_rules($errors_validation_range);

        if ($this->form_validation->run() === FALSE){
			$this->edit($id);
        }else{
			$this->load->model('user');
			$data["model"] = $this->user->update();
			redirect('/users', 'refresh');
        }
	}

	public function delete($id)
	{
		$this->load->helper(array('url'));

		$this->load->model('user');
		$data["model"] = $this->user->delete($id);
		redirect('/users', 'refresh');
	}

	public function show($id)
	{
		// $this->load->helper(array('url'));

		$this->load->model('user');
		$data["model"] = $this->user->find($id);
		$data['title'] = "詳細";

		$this->load->view('layouts/header', $data);
		$this->load->view('users/show', $data);
		$this->load->view('layouts/footer');
	}

}
