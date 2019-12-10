<?php

class ModelBase extends CI_Model {

	protected $table = null; // ⭐️⭐️⭐️required⭐️⭐️⭐️
	protected $fillable = [];
	protected $passwordFields = ['password'];
	protected $attributes = [];

	public function getTableName()
	{
		return $this->table;
	}

	public function fill($values = [])
	{
		if(!empty($values)){
			$this->attributes = array_merge($this->attributes, $values);
		}
	}

	public function get()
	{
	    $this->db->from($this->getTableName());
	    $this->db->get();
		return $this->db->result();
	}

	public function search($request=[])
	{
	    $this->db->from($this->getTableName());
		return $this->db;
	}

	private function getSearchResult($request=[])
	{
        $this->db->reset_query();

		return $this->search($request);
	}

	public function paginate($page_row = 20)
	{
		$per_page = ($this->uri->segment(3)) ? ($this->uri->segment(3)) : 1;

		$segment = ($per_page - 1) * $page_row;
        // ==================
		$this->getSearchResult($_REQUEST);
		$query = $this->db->get();
        $total_rows = $query->num_rows();
        // ==================
		$this->getSearchResult($_REQUEST);
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

		foreach ($this->fillable as $index => $request_name) {
			$request_value = ($this->attributes[$request_name] ?? NULL);
			if($request_value){
				foreach ($this->passwordFields as $key => $passwordFieldName) {
					if($request_name === $passwordFieldName){
						$request_value = getHashedPassword($request_value);
					}
				}
			}

			if(isset($this->attributes[$request_name])){
				$this->$request_name  	= $request_value;
			}
		}

		$this->db->insert($this->getTableName(), $this);
	}

	public function update($request = [])
	{
		$this->fill($request);

		$this->load->helper('password');

		foreach ($this->fillable as $index => $request_name) {
			$request_value = ($this->attributes[$request_name] ?? NULL);
			if($request_value){
				foreach ($this->passwordFields as $key => $passwordFieldName) {
					if($request_name === $passwordFieldName){
						$request_value = getHashedPassword($request_value);
					}
				}
			}

			if(isset($this->attributes[$request_name])){
				$this->$request_name  	= $request_value;
			}
		}

		$this->db->from($this->getTableName());
		$this->db->update($this->getTableName(), $this, array('id' => $this->attributes['id']));
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

    public function toSql()
    {
    	return $this->db->get_compiled_select();
    }

    public function toJson()
    {
    	header("Content-type: application/json; charset=utf-8");
    	return json_encode($this);
    }
}
