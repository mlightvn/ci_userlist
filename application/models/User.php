<?php
class User extends ModelBase {

	protected $table = 'users'; // ⭐️⭐️⭐️required⭐️⭐️⭐️
	protected $fillable = ['email', 'name', 'password'];
	// protected $passwordFields = ['password'];

	public function search($request = [])
	{
		if(isset($request['id'])){
			$this->db->where('id', $request['id']);
		}

		if(isset($request['email'])){
			$this->db->like('email', $request['email']);
		}

		if(isset($request['name'])){
			$this->db->like('name', $request['name']);
		}

	    $this->db->from($this->getTableName());

		return $this->db;
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

	public function email_exists($email = NULL, $id = NULL){
		$email = ($email ?? $this->attributes['email'] ?? $_REQUEST['email']);
		$id = ($id ?? $this->attributes['id'] ?? $_REQUEST['id'] ?? NULL);

		return $this->exists($id, 'email', $email);

	}


}
