<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Lead_model extends CI_Model
{

    public $current_terminal;
    public function __construct()
    {
        parent::__construct();
    }
    public function insert($data){
    	$data['lead_id']=date('ymdhis');
        $data['created_at']=date('Y-m-d h:i:s');
    	$insert_id=$this->db->insert('lead',$data);
    	return $data['lead_id'];
    }
    public function update($data,$lead_id){
    	$this->db->where(['lead_id' => $lead_id]);
    	$this->db->update('lead',$data);
    }
    public function get($lead_id){
    	$this->db->where(['lead_id' => $lead_id]);
    	$result= $this->db->where(['is_delete' => 0])->get('lead')->result();
    	if(!empty($result)){
            return $result[0];
        } else{
            return False;
        }

    }
    public function delete($lead_id){
    	$this->db->where(['lead_id' => $lead_id]);
        $this->db->update('lead',['is_delete' => 1]);
    }
    public function get_all(){
    	$result= $this->db->where(['is_delete' => 0])->get('lead')->result();
    	if(!empty($result)){
            return $result;
        } else{
            return False;
        }
    }

}
