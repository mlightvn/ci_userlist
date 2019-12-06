<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	// public function __construct()
	// {
	// 	parent::__construct();

 //        $user = $this->session->userdata('user');
 //        if(!$user){
	// 		show_error("401 unauthorized.");
	// 	}
	// }

	public function index()
	{
		$this->page(1);
	}
	public function page($page = 1)
	{
        $user = $this->session->userdata('user');
        if(!$user){
			show_error("401 unauthorized.", 401, "401 unauthorized.");
		}

		$this->load->library('cart');

		$this->load->model('user');
		$data['model_list'] = $this->user->paginate(10);

		$data['title'] = "ユーザシステム";

		$this->load->library('pagination');
		$this->load->helper(array('form', 'captcha', 'password'));
		$captcha_words = generatePassword(8);
		$vals = array(
		        'word'          => $captcha_words,
		        'img_path'      => './captcha/',
		        'img_url'       => base_url('captcha'),
		        // 'font_path'     => './path/to/fonts/texb.ttf',
		        'img_width'     => '150',
		        'img_height'    => 30,
		        'expiration'    => 300, // seconds
		        'word_length'   => 6,
		        'font_size'     => 16,
		        'img_id'        => 'Imageid',
		        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

		        // White background and border, black text and green grid
		        'colors'        => array(
		                'background' => array(255, 255, 255),
		                'border' => array(255, 255, 255),
		                'text' => array(0, 0, 0),
		                'grid' => array(40, 255, 40)
		        )
		);

		$captcha = create_captcha($vals);
		// dd($captcha);
		$data['captcha'] = $captcha;

		$data['model_list']['paginate']['base_url'] = base_url('users/page');

		$this->pagination->initialize($data['model_list']['paginate']);

		$this->load->view('layouts/header', $data);
		$this->load->view('users/index', $data);
		$this->load->view('layouts/footer');
	}

	public function create()
	{
        $user = $this->session->userdata('user');
        if(!$user){
			show_error("401 unauthorized.", 401, "401 unauthorized.");
		}

		$this->load->helper(array('form', 'url'));

		$data['title'] = "ユーザシステム";
		$this->load->view('layouts/header', $data);
		$this->load->view('users/create');
		$this->load->view('layouts/footer');
	}

	public function store()
	{
        $user = $this->session->userdata('user');
        if(!$user){
			show_error("401 unauthorized.", 401, "401 unauthorized.");
		}

        $this->load->library('form_validation');
        $errors_validation_range = array(
        	array('field'=>'name', 'label'=>'ユーザ名', 'rules'=>'required', "errors"=>array('required' => 'You must input into %s.')),
        	array('field'=>'email', 'label'=>'email', 'rules'=>'required|is_unique[users.email]', "errors"=>array('required' => 'You must input into %s.'))
        );
        $this->form_validation->set_rules($errors_validation_range);

        if ($this->form_validation->run() === FALSE){
			$this->create();
        }else{
			$this->load->model('user');

			$email_exist = $this->user->email_exist();
			if($email_exist){
				show_error("email ('" . $_REQUEST['email'] . "') is existing in DB.", 501, "Custom error.");
			}else{
				$data["model"] = $this->user->save();

				redirect('/users', 'refresh');
			}
        }
	}

	public function edit($id)
	{
        $user = $this->session->userdata('user');
        if(!$user){
			show_error("401 unauthorized.", 401, "401 unauthorized.");
		}

		$this->load->helper(array('form', 'url'));

		$this->load->model('user');
		$model = $this->user->find($id);
		$model->password = null;
		$data["model"] = $model;
		$data['title'] = "ユーザシステム";

		$this->load->view('layouts/header', $data);
		$this->load->view('users/edit', $data);
		$this->load->view('layouts/footer');
	}

	public function update($id)
	{
        $user = $this->session->userdata('user');
        if(!$user){
			show_error("401 unauthorized.", 401, "401 unauthorized.");
		}

		$this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');
        $errors_validation_range = array(
        	array('field'=>'name', 'label'=>'ユーザ名', 'rules'=>'required', "errors"=>array('required' => 'You must input into %s.')),
        	array('field'=>'email', 'label'=>'email',
        		'rules'=>array(
        			'required',
        			array('unique_email', function($email='') use ($id)
				        {
							$this->load->model('user');
							$user = $this->user->find($id);

							$email_exist = $this->user->exists($id, 'email', $email);

							return (!$email_exist);
				        }
				    ),
        		), 
        		"errors"=>array(
        			'required' => 'You must input into %s.',
        			'unique_email' => 'email must be unique. email is existing in database.'
        		),
        	),
        	// array('field'=>'password', 'label'=>'Password', 'rules'=>'required', "errors"=>array('required' => 'You must input into %s.')),
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
        $user = $this->session->userdata('user');
        if(!$user){
			show_error("401 unauthorized.", 401, "401 unauthorized.");
		}

		$this->load->helper(array('url'));

		$this->load->model('user');
		$data["model"] = $this->user->delete($id);
		redirect('/users', 'refresh');
	}

	public function show($id)
	{
        $user = $this->session->userdata('user');
        if(!$user){
			show_error("401 unauthorized.", 401, "401 unauthorized.");
		}

		$this->load->model('user');
		$data["model"] = $this->user->find($id);
		$data['title'] = "詳細";

		$this->load->view('layouts/header', $data);
		$this->load->view('users/show', $data);
		$this->load->view('layouts/footer');
	}

	public function login()
	{
		$this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

		$data['title'] = "Login";

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->form_validation->set_rules('email', 'email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() == true){
				$this->load->model('user');
                $checkLogin = $this->user->authorized();
                if($checkLogin){
					redirect('/users', 'refresh');
                }else{
                    $data['error_msg'] = 'Wrong email or password, please try again.';
                }
            // }else{ 
            //     $data['error_msg'] = 'Please fill all the mandatory fields.';
            }
		}

		$this->load->view('layouts/header', $data);
		$this->load->view('users/login', $data);
		$this->load->view('layouts/footer');
	}

	public function logout()
	{
		$this->load->model('user');
        $checkLogin = $this->user->deauthorized();
		redirect('/users/login', 'refresh');
	}

	public function cart(string $action, string $id = null)
	{

		$this->load->library('cart');
		$this->load->product_name_safe = false;
		switch ($action) {
			case 'add':
					$this->load->model('user');
					$model = $this->user->find($id);
					$data['id'] = $model->id;
					$data['email'] = $model->email;
					$data['name'] = $model->name;
					$data['qty'] = 1;
					$data['price'] = 0;
					$data['model'] = $model;
					// $data['options'] = json_decode(json_encode($model), true);
					// $data['model'] = json_decode(json_encode($model), true);
					$data['rowid'] = $this->cart->insert($data);

					redirect('/users', 'refresh');
				break;

			case 'remove':
					$this->cart->remove($id);

					redirect('/users/cart/search', 'refresh');
				break;

			case 'search':
					$this->load->helper(array('form', 'url'));

					$data['title'] = "Cart";
					$data['cart'] = $this->cart;

					$this->load->view('layouts/header', $data);
					$this->load->view('users/cart/list', $data);
					$this->load->view('layouts/footer');
				break;

			default:
				break;
		}
	}

}
