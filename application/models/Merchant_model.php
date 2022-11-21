<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Merchant_model extends CI_Model
{

    public $current_terminal;
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($data){
    	$data['merchant_id']=date('ymdhis');
        $data['created_at']=date('Y-m-d h:i:s');
    	$insert_id=$this->db->insert('merchant',$data);
    	return $data['merchant_id'];
    }
    public function update($data,$merchant_id){
    	$this->db->where(['merchant_id' => $merchant_id]);
    	$this->db->update('merchant',$data);
    }
    public function get($merchant_id){
    	$this->db->where(['merchant_id' => $merchant_id]);
    	$result= $this->db->where(['is_delete' => 0])->get('merchant')->result();
    	if(!empty($result)){
            return $result[0];
        } else{
            return False;
        }

    }
    public function delete($merchant_id){
    	$this->db->where(['merchant_id' => $merchant_id]);
        $this->db->update('merchant',['is_delete' => 1]);
    }
    public function get_all(){
    	$result= $this->db->where(['is_delete' => 0])->get('merchant')->result();
    	if(!empty($result)){
            return $result;
        } else{
            return False;
        }
    }
    public function get_terminals($merchant_id){
    	$this->db->where(['merchant_id' => $merchant_id]);
    	$result= $this->db->get('terminal')->result();
        if(!empty($result)){
            return $result;
        } else{
            return False;
        }
    }
    public function count_terminals($merchant_id){
        if($this->get_terminals($merchant_id)===false){
            return 0;
        }
        return count($this->get_terminals($merchant_id));
    }
    public function insert_terminals($data,$merchant_id){
    	if(!empty($data['mac_address'])){
	    	foreach ($data['mac_address'] as $key => $value) {
	    		if($value!=''){
		    		$terminal['merchant_id']=$merchant_id;
		    		$terminal['mac_address']=$value;
		    		$this->insert_terminal($terminal);    			
	    		}
	    	}    		
    	}
    }
    public function update_terminals($data){
    	foreach ($data['terminal_id'] as $key => $terminal) {
    		$this->update_terminal(['mac_address' => $data['mac_address'][$key]],$terminal);
    	}
    }
    public function delete_terminals($data){
    	if(!empty($data['terminal_id'])){
	    	foreach ($data['terminal_id'] as $key => $terminal) {
	    		$this->delete_terminal($terminal);
	    	}    		
    	}
    }

    public function insert_terminal($data){
    	$data['terminal_id']=date('ymdhis').rand(1,10000);
    	$this->db->insert('terminal',$data);
    }
    public function update_terminal($data, $terminal_id){
    	$this->db->update('terminal',$data,['terminal_id' => $terminal_id]);
    }
    public function delete_terminal($terminal_id){
    	$this->db->delete('terminal',['terminal_id' => $terminal_id]);
    }
}
