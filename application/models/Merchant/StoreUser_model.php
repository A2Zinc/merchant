<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class StoreUser_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	//Check valid user
	public function get_all($merchant_id=''){
		if($merchant_id!=''){
			$this->db->where(['merchant_id' => $merchant_id]);
		}
		return $this->db->from('user_login')->get()->result_array();
	}
	public function check_unique_user_email($id,$email){
		$this->db->where('username', $email);
        if($id) {
            $this->db->where_not_in('user_id', $id);
        }
        return $this->db->get('user_login')->num_rows();
	}
	public function get($user_id,$merchant_id=''){
		$where=['user_id' => $user_id];
		if($merchant_id!=''){
			$where['merchant_id'] = $merchant_id;
		}
		$this->db->where($where);
		$query=$this->db->from('user_login')->get();
		if ($query->num_rows() > 0) {
			return $query->row();
		}
		return false;
		
	}
	public function add($data,$merchant_id=''){
		$data['merchant_id']=$merchant_id;
		$result= $this->db->insert('user_login',$data);
		if($result!==false){
			return $this->db->insert_id();
		} else{
			return false;
		}
	}
	public function update($user_id,$data,$merchant_id=''){
		$where=['user_id' => $user_id];
		if($merchant_id!=''){
			$where['merchant_id'] = $merchant_id;
		}
		
		return $this->db->update('user_login',$data,$where);
	}
	public function assign_stores($user_id,$store_ids,$merchant_id){
		$data['merchant_id']=$merchant_id;
		$data['user_id']=$user_id;
		$this->db->where(['user_id' => $user_id])->delete('assign_store');
		if(is_array($store_ids)){
			foreach ($store_ids as $key => $value) {
				$data['store_id']=$value;
				$this->db->insert('assign_store',$data);
			}			
		}
	}
	public function get_assigned_stores($user_id,$merchant_id){
		$this->db->where(['user_id' => $user_id, $merchant_id=>$merchant_id]);
		$query=$this->db->from('assign_store')->get();
		if ($query->num_rows() > 0) {
			return $query->result_array();
		}
		return false;
	}

}