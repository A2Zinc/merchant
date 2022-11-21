<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hrms_Model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}

	public function add_department($data){ 
        try{
            if($this->db->insert('tbl_department', $data)){
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

    public function get_all_department() {
        try{
            $query =$this->db->get('tbl_department');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_departmentdata_by_id(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_department');
            $this->db->where('id', $_POST['department_id']);
            $query = $this->db->get();
            
            $array = array();
            if($this->db->affected_rows() > 0) {
                $array = $query->row();
            } 
            return $array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_department($department_id,$data){
        try{
            $this->db->where('id', $department_id);
            if($this->db->update('tbl_department',$data)){
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

    public function delete_department($department_id){
        try{
            $this->db->where('id', $department_id);
            $this->db->delete('tbl_department');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


    public function add_designation($data){ 
        try{
            if($this->db->insert('tbl_designation', $data)){
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

    public function get_all_designation() {
        try{
            $query =$this->db->get('tbl_designation');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_designationdata_by_id(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_designation');
            $this->db->where('id', $_POST['designation_id']);
            $query = $this->db->get();
            
            $array = array();
            if($this->db->affected_rows() > 0) {
                $array = $query->row();
            } 
            return $array;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_designation($designation_id,$data){
        try{
            $this->db->where('id', $designation_id);
            if($this->db->update('tbl_designation',$data)){
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

    public function delete_designation($designation_id){
        try{
            $this->db->where('id', $designation_id);
            $this->db->delete('tbl_designation');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function add_holiday($data){ 
        try{
            if($this->db->insert('tbl_holiday', $data)){
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

    public function get_all_holiday() {
        try{
            $this->db->select('*');
            $this->db->from('tbl_holiday');
            $this->db->order_by('start_date', 'ASC');
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_holidaydata_by_id(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_holiday');
            $this->db->where('id', $_POST['holiday_id']);
            $query = $this->db->get();
            
            $array = array();
            if($this->db->affected_rows() > 0) {
                $array = array(
                    'id' => $query->row()->id,
                    'holiday_name' => $query->row()->holiday_name,
                    'start_date' => date('d-m-Y', strtotime($query->row()->start_date)),
                    'end_date' => date('d-m-Y', strtotime($query->row()->end_date)),
                    'notes' => $query->row()->notes,
                );
                return $array;
            }else {
                return FALSE;
            }
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function update_holiday($holiday_id,$data){
        try{
            $this->db->where('id', $holiday_id);
            if($this->db->update('tbl_holiday',$data)){
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
        
    public function delete_holiday($holiday_id){
        try{
            $this->db->where('id', $holiday_id);
            $this->db->delete('tbl_holiday');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    } 

    public function get_emp_attendance()
    {
       try{
            
        $query=$this->db->query("SELECT first_name,last_name,ut.timecard_id,ut.user_id,date(ut.datetime) as attendacedate, (SELECT GROUP_CONCAT(DATE_FORMAT(datetime, '%H:%i')) FROM `user_timesheet` where user_action=1 and user_id =ut.user_id ) as clockin, (SELECT GROUP_CONCAT(DATE_FORMAT(datetime, '%H:%i')) FROM `user_timesheet` where user_action=2 and user_id =ut.user_id ) as clockout FROM `user_timesheet` as ut left join users on users.user_id=ut.user_id group by date(datetime)");
            //echo $this->db->last_query();exit;
            //print_r($query->result());exit;
            return $query->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        } 
    }

    //-----Search Employees in all attendance----------

    public function search_empwise_attendance($data)
    {
       
        try{
            $searchquery='';
            if($data['empname'] != '' || $data['fromdate'] != '' || $data['todate'] != '')
               $searchquery="having ";

            if($data['empname'] != '')
            {
            $searchquery = $searchquery . '(users.first_name LIKE "%'.$data['empname'].'%"  || users.last_name LIKE "%'.$data['empname'].'%")'; 
          }

        if($data['fromdate'] != '' || $data['todate'] != '')
        {
             if($data['empname'] != '')
                $searchquery = $searchquery . ' and ';
            
                if($data['fromdate'] != '' && $data['todate'] != '')
                    $searchquery = $searchquery. 'attendacedate between "'.$data['fromdate'].'" and "'.$data['todate'].'"';
                elseif($data['fromdate'] != '')
                    $searchquery = $searchquery.'attendacedate="'.$data['fromdate'].'"';
                elseif($data['todate'] != '')
                    $searchquery = $searchquery.'attendacedate='.$data['todate'].'"';
            

        }
        //echo $data['empname'].'---'.$searchquery;
                    $query=$this->db->query("SELECT first_name,last_name,ut.timecard_id,ut.user_id,date(ut.datetime) as attendacedate, (SELECT GROUP_CONCAT(DATE_FORMAT(datetime, '%H:%i')) FROM `user_timesheet` where user_action=1 and user_id =ut.user_id ) as clockin, (SELECT GROUP_CONCAT(DATE_FORMAT(datetime, '%H:%i')) FROM `user_timesheet` where user_action=2 and user_id =ut.user_id ) as clockout FROM `user_timesheet` as ut left join users on users.user_id=ut.user_id  group by date(ut.datetime) ".$searchquery."");
                    //having (users.first_name LIKE "%%" || users.last_name LIKE "%%") ".$data['datequery']." and (attendacedate between "2020/12/02" and "2020/12/02")
         //   echo $this->db->last_query();exit;
            //print_r($query->result());exit;
            return $query->result();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        } 
    }

    public function emp_attendance_delete(){
        try{
            $this->db->where('user_id',$this->input->post('userid'));
            $this->db->where('date(datetime)',$this->input->post('attdate'));
            $this->db->delete('user_timesheet'); 
            
          

            $respnce['status'] = 'success';
            $respnce['message'] = 'Employee is Successfully Deleted';
            return $respnce;
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

}	