<?php

class ModelBase extends CI_Model {

	protected $table = null; // ⭐️⭐️⭐️required⭐️⭐️⭐️
	protected $fillable = [];
	protected $passwordFields = ['password'];
	protected $fields = [];

	public function getTableName()
	{
		return $this->table;
	}

	public function fill($values = [])
	{
		$this->fields = $values;
	}

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
	    $this->db->from($this->getTableName());
		$query = $this->db->get();
        $total_rows = $query->num_rows();

        // ==================
		foreach ($_REQUEST as $post_name => $post_value) {
			if($post_value){
				$this->db->like($post_name, $post_value);
			}
		}
	    $this->db->from($this->getTableName());
	    $this->db->limit($page_row, $segment);
		$query = $this->db->get();

		$this->load->config('pagination');

		$paginate = $this->config->item('pagination_config');
        $paginate['total_rows'] = $total_rows;

		$result = array('paginate' => $paginate, 'data' => $query->result());

		return $result;
	}

	public function find(...$id)
	{
		$this->db->select('*');
	    $this->db->from($this->getTableName());
	    if(is_numeric($id) || is_string($id)){
		    $this->db->where('id', $id);
	    }elseif(is_array($id)){
	    	if(count($id) === 1){
			    $this->db->where('id', reset($id));
	    	}else{
			    $this->db->where_in('id', $id);
	    	}
	    }
	    $query = $this->db->get(); 

	    if(is_numeric($id) || is_string($id)){
		    if($query->num_rows() > 0){
		        return $query->row();
		    }
	    }elseif(is_array($id)){
	    	if(count($id) === 1){
		        return $query->row();
	    	}else{
		        return $query->result();
		    }
	    }

	    return NULL;

	}

	public function save()
	{
		$this->load->helper('password');

		foreach ($this->fillable as $index => $post_name) {
			$post_value = ($_REQUEST[$post_name] ?? NULL);
			if($post_value){
				foreach ($this->passwordFields as $key => $passwordFieldName) {
					if($post_name === $passwordFieldName){
						$post_value = getHashedPassword($post_value);
					}
				}
				$this->$post_name = $post_value;
			}
		}

		$this->db->insert($this->getTableName(), $this);
	}

	public function update()
	{
		$this->load->helper('password');

		foreach ($this->fillable as $index => $post_name) {
			$post_value = ($_REQUEST[$post_name] ?? NULL);
			if($post_value){
				foreach ($this->passwordFields as $key => $passwordFieldName) {
					if($post_name === $passwordFieldName){
						$post_value = getHashedPassword($post_value);
					}
				}
				$this->$post_name  	= $post_value;
			}
		}

		$this->db->from($this->getTableName());
		$this->db->update($this->getTableName(), $this, array('id' => $_POST['id']));
	}

	public function delete($id)
	{
		$this->db->delete($this->getTableName(), array('id' => $id));
	}

    public function unique(string $id = NULL, string $columnName = NULL, string $value=NULL)
    {
    	return (!$this->exists($id, $columnName, $value));
    }

    public function exists(string $id = NULL, string $columnName = NULL, string $value=NULL)
    {
    	if($columnName && $value){

			$this->db->from($this->getTableName());
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

}
