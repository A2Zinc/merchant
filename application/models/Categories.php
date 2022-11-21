<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Categories extends MY_Model {
	public function __construct()
	{
		parent::__construct();
	}
	//Parent List
	public function category_list()
	{
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('status',1);
		$this->db->order_by('category_name','asc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}	
	//Parent category List
	public function parent_category()
	{
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('status',1);
		$this->db->order_by('category_name','asc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}	
	//Parent category List
	public function parent_category_list($category_id)
	{
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('status',1);
		$this->db->where_not_in('category_id',$category_id);
		$this->db->order_by('category_name','asc');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Category Search Item
	public function category_search_item($category_id)
	{
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('category_id',$category_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	//Count customer
	public function category_entry($data)
	{
		$this->db->insert('product_category',$data);
		return TRUE;
	}
	//Retrieve customer Edit Data
	public function retrieve_category_editdata($category_id)
	{
		$this->db->select('*');
		$this->db->from('product_category');
		$this->db->where('category_id',$category_id);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();	
		}
		return false;
	}
	
	//Update Categories
	/*public function update_category($data,$category_id)
	{
		$this->db->where('category_id',$category_id);
		$this->db->update('product_category',$data);
		return true;
	}*/
	// Delete customer Item
	/*public function delete_category($category_id)
	{
        $image = $this->db->select('cat_image,cat_favicon')->from('product_category')->where('category_id',$category_id)->get()->row();
        $this->db->where('category_id',$category_id);
        $this->db->delete('product_category');

        if(!empty($image)){
            unlink(FCPATH.$image->cat_image);
            unlink(FCPATH.$image->cat_favicon);
        }
        return true;
	}*/

	public function add_category($data){ 
        try{
            if($this->db->insert('product_category', $data)){
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
 	}

 	public function get_all_category($categorytype='1') {
        try{
            $this->db->select('*');
            $this->db->from('product_category');
            if($categorytype=='1'){
            	$this->db->where('cat_type', $categorytype);
            }else{
        		$this->db->where('parent_category_id', $categorytype);
            }
            $this->db->order_by('category_name', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_fix_category() {
        
            try{
                $catogories = array('Alcoholic Beverage','Beverages','Deli Products','General Merchandise','Ice Cream','On-Line Tickets','Scratcher Tickets','Package Food Products','Tobacco');
                $this->db->select('*');
                $this->db->from('product_category');       
                $this->db->where_in('category_name',$catogories);
                $this->db->order_by('category_name', 'ASC');
                $query =$this->db->get();
                return $query->result_array();
            }catch(Exception $ex){
                error_log($ex->getTraceAsString());
                echo $ex->getTraceAsString();
                return FALSE;
            }
        }

    

 	public function delete_category($category_id){
        try{
            $this->db->where('category_id', $category_id);
            $this->db->delete('product_category');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_categorydata_by_id(){
        try{
            $this->db->select('*');
            $this->db->from('product_category');
            $this->db->where('category_id', $_POST['category_id']);
            $query = $this->db->get();
     		
            $catarray = array();
            if($this->db->affected_rows() > 0) {
                $catarray = $query->row();
            } 
            return $catarray;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
 	}

 	public function update_category($category_id,$data){
        try{
            $this->db->where('category_id', $category_id);
    		if($this->db->update('product_category',$data)){
                return TRUE;
    		}else{
                return FALSE;
    		}
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
 	} 

 		public function get_measurement_value($measureid)
    {
        try{
            $this->db->select('*');
            $this->db->from('tbl_size');
            $this->db->where_in('size_type', $measureid);
            $query = $this->db->get();
            //echo $this->db->last_query();exit;
            $catarray = array();
            if($this->db->affected_rows() > 0) {
                $valuearray = $query->result_array();
            } 
            return $valuearray;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //--- update groupsizeid---
    public function update_sizegroupid($sizetype,$sizetypevalue,$data){
        try{
            
            //$this->db->where('size_type',$sizetype);
            $this->db->like('name', $sizetypevalue);
            $this->db->update('tbl_size',$data);
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    } 

    //---Add group size
    public function add_groupsize($data){ 
        try{
            if($this->db->insert('tbl_size_group', $data)){
                
                $insert_id = $this->db->insert_id();
                return $insert_id;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //---Add extra value in sizetype
    public function add_extra_value_sizetype($data){ 
        try{
            if($this->db->insert('tbl_size', $data)){
                
                return TRUE;
            }else{
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    //--- Get size group
    
    public function get_existing_grp($measureid)
    {
        try{
            $this->db->select('*');
            $this->db->from('tbl_size_group');
            $this->db->like('group_size_type', $measureid);
            $query = $this->db->get();
            //echo $this->db->last_query();exit;
            $catarray = array();
            if($this->db->affected_rows() > 0) {
                $valuearray = $query->result_array();
            } 
            return $valuearray;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }
    

    //--- Get size group measure value---   
    public function get_existing_grpvalues($measureid,$groupid)
    {
        try{
            $this->db->select('*');
            $this->db->from('tbl_size');
            $this->db->where('size_type', $measureid);
            $this->db->where('size_groupid', $groupid);
            $query = $this->db->get();
            //echo $this->db->last_query();exit;
           
            if($this->db->affected_rows() > 0) {
                $valuearray = $query->result_array();
            } 
            return $valuearray;
    
            
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

}