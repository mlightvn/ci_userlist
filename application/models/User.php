<?php

class User extends CI_Model {

	public $fillable = ['email', 'name', 'password'];

	public function paginate($page_row = 20)
	{
		$per_page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 1;

		$segment = ($per_page - 1) * $page_row;
        // ==================
		foreach ($_REQUEST as $post_name => $post_value) {
			if($post_value){
				$this->db->like($post_name, $post_value);
			}
		}
	    $this->db->from('users');
		$query = $this->db->get();
        $total_rows = $query->num_rows();

        // ==================
		foreach ($_REQUEST as $post_name => $post_value) {
			if($post_value){
				$this->db->like($post_name, $post_value);
			}
		}
	    $this->db->from('users');
	    $this->db->limit($page_row, $segment);
		$query = $this->db->get();

		$this->load->config('pagination');

		// $paginate = array();
		$paginate = $this->config->item('pagination_config');
        $paginate['total_rows'] = $total_rows;

		$paginate['uri_segment'] = 3;
		$paginate['per_page'] = $page_row;
		// $paginate['num_links'] = 20;
		$paginate['use_page_numbers'] = TRUE;
		// $paginate['page_query_string'] = TRUE;

		$result = array('paginate' => $paginate, 'data' => $query->result());

		return $result;
	}

	public function find($id)
	{
		$this->db->select('*');
	    $this->db->from('users');
	    $this->db->where('id', $id);
	    $query = $this->db->get(); 
	    if($query->num_rows() > 0){
	        return $query->row();
	    }

	}

	public function save()
	{
		$this->load->helper('password');

		foreach ($this->fillable as $index => $post_name) {
			$post_value = ($_REQUEST[$post_name] ?? NULL);
			if($post_value){
				if($post_name === 'password'){
					$post_value = getHashedPassword($post_value);
				}
				$this->$post_name = $post_value;
			}
		}

		$this->db->insert('users', $this);
	}

	public function update()
	{
		$this->load->helper('password');

		foreach ($this->fillable as $index => $post_name) {
			$post_value = ($_REQUEST[$post_name] ?? NULL);
			if($post_value){
				if($post_name === 'password'){
					$post_value = getHashedPassword($post_value);
				}
				$this->$post_name  	= $post_value;
			}
		}

		$this->db->from('users');
		$this->db->update('users', $this, array('id' => $_POST['id']));
	}

	public function delete($id)
	{
		$this->db->delete('users', array('id' => $id));
	}

	public function authorized(){
		$this->load->helper('password');

		$this->db->from('users');
		$this->db->where('email', $_REQUEST['email']);
		$this->db->where('password', getHashedPassword($_REQUEST['password']));

		if($query = $this->db->get())
		{
			$user = $query->row();

			if($user){
				$this->session->set_userdata('user', $user); 
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}

	}
     
    public function deauthorized(){
        $this->session->unset_userdata('user');
        $this->session->sess_destroy();
    }
     
    public function isAuth(){
        $user = $this->session->userdata('user');
        return (!!$user);
    }

    public function unique(string $id = NULL, string $columnName = NULL, string $value=NULL)
    {
    	return (!$this->exists($id, $columnName, $value));
    }

    public function exists(string $id = NULL, string $columnName = NULL, string $value=NULL)
    {
    	if($columnName && $value){

			$this->db->from('users');
			if($id === NULL){ // Create new
				$this->db->where($columnName, $value);
			}else{ // Update
				$this->db->where('id <>', $id);
				$this->db->where($columnName, $value);

			}
			$query=$this->db->get();

			if($query->num_rows()>0){
				return true;
			}else{
				return false;
			}
		}

    	return false;
    }

	public function email_exists($email = NULL){
		if($email === NULL){
			$email = $_REQUEST['email'];
		}

		$id = ($_REQUEST['id'] ?? NULL);

		return $this->exists($id, 'email', $email);

	}


}
