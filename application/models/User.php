<?php

class User extends CI_Model {

	public $email;
	public $name;

	public function paginate($page_row = 20)
	{
		$per_page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 1;

		$segment = ($per_page - 1) * $page_row;
        // ==================
		foreach ($_GET as $post_name => $post_value) {
			if($post_value){
				$this->db->where($post_name, $post_value);
			}
		}
	    $this->db->from('users');
		$query = $this->db->get();
        $total_rows = $query->num_rows();

        // ==================
		foreach ($_GET as $post_name => $post_value) {
			if($post_value){
				$this->db->where($post_name, $post_value);
			}
		}
	    $this->db->from('users');
	    $this->db->limit($page_row, $segment);
		$query = $this->db->get();

		$paginate = array();
        $paginate['total_rows'] = $total_rows;

		$paginate['uri_segment'] = 3;
		$paginate['per_page'] = $page_row;
		// $paginate['num_links'] = 5;
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
		$this->email    = $_POST['email'];
		$this->name  	= $_POST['name'];

		$this->db->insert('users', $this);
	}

	public function update()
	{
		$this->email    = $_POST['email'];
		$this->name  	= $_POST['name'];

		$this->db->update('users', $this, array('id' => $_POST['id']));
	}

	public function delete($id)
	{
		$this->db->delete('users', array('id' => $id));
	}

}
