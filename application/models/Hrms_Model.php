<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hrms_Model extends MY_Model {
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
                    'start_date' => $query->row()->start_date,
                    'end_date' => $query->row()->end_date,
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
            
        $query=$this->db->query("SELECT first_name,last_name,ut.timecard_id,ut.user_id,date(ut.datetime) as attendacedate, (SELECT GROUP_CONCAT(DATE_FORMAT(datetime, '%H:%i')) FROM `user_timesheet` where user_action=1 and user_id =ut.user_id and date(datetime) = date(ut.datetime) order by id) as clockin, (SELECT GROUP_CONCAT(DATE_FORMAT(datetime, '%H:%i')) FROM `user_timesheet` where user_action=2 and user_id =ut.user_id and date(datetime) = date(ut.datetime) order by id) as clockout FROM `user_timesheet` as ut left join users on users.user_id=ut.user_id group by date(datetime),ut.user_id");
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
               $searchquery=" having ";

            if($data['empname'] != '')
            {
            $searchquery = $searchquery . '(users.first_name LIKE "%'.$data['empname'].'%"  || users.last_name LIKE "%'.$data['empname'].'%")'; 
          }

        if($data['fromdate'] != '' || $data['todate'] != '')
        {
             if($data['empname'] != '')
                $searchquery = $searchquery . ' and ';
            
                if($data['fromdate'] != '' && $data['todate'] != '')
                    $searchquery = $searchquery. '(attendacedate between "'.$data['fromdate'].'" and "'.$data['todate'].'")';
                elseif($data['fromdate'] != '')
                    $searchquery = $searchquery.'attendacedate="'.$data['fromdate'].'"';
                elseif($data['todate'] != '')
                    $searchquery = $searchquery.'attendacedate="'.$data['todate'].'"';
            

        }
       //echo $data['empname'].'---'.$searchquery;
                    $query=$this->db->query("SELECT first_name,last_name,ut.timecard_id,ut.user_id,date(ut.datetime) as attendacedate, (SELECT GROUP_CONCAT(DATE_FORMAT(datetime, '%H:%i')) FROM `user_timesheet` where user_action=1 and user_id =ut.user_id and date(datetime) = date(ut.datetime) order by id) as clockin, (SELECT GROUP_CONCAT(DATE_FORMAT(datetime, '%H:%i')) FROM `user_timesheet` where user_action=2 and user_id =ut.user_id and date(datetime) = date(ut.datetime) order by id) as clockout FROM `user_timesheet` as ut left join users on users.user_id=ut.user_id group by date(datetime),ut.user_id ".$searchquery."");
                    //having (users.first_name LIKE "%%" || users.last_name LIKE "%%") ".$data['datequery']." and (attendacedate between "2020/12/02" and "2020/12/02")
          //echo $this->db->last_query();
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

    public function add_leave($data){ 
        try{
            if($this->db->insert('tbl_emp_leave', $data)){
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

    public function get_all_leave() {
        try{
            $this->db->select('tbl_emp_leave.*,users.first_name,users.last_name,tbl_leave_type.leave_type,max_leave');
            $this->db->from('tbl_emp_leave');
            $this->db->join('user_login', 'user_login.username = tbl_emp_leave.employee_id','LEFT');
                        $this->db->join('users', 'users.user_id = user_login.user_id','LEFT');
            $this->db->join('tbl_leave_type', 'tbl_leave_type.id = tbl_emp_leave.leaveType','LEFT');

            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function get_statusdata_by_id(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_emp_leave');
            $this->db->where('id', $_POST['leave_id']);
            $query = $this->db->get();
            
            $array = array();
            if($this->db->affected_rows() > 0) {
                $array = array(
                    'id' => $query->row()->id,
                    'employee_id' => $query->row()->employee_id,
                    'start_date' => date('d/M/Y', strtotime($query->row()->start_date)),
                    'end_date' => date('d/M/Y', strtotime($query->row()->end_date)),
                    'notes' => $query->row()->notes,
                    'reason' => $query->row()->reason,
                    'status' => $query->row()->status,
                    'leaveType' => $query->row()->leaveType,
                    'updated_at' => date('d/M/Y', strtotime($query->row()->updated_at)),
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

    public function delete_leave($leave_id){
        try{
            $this->db->where('id', $leave_id);
            $this->db->delete('tbl_emp_leave');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }        

    public function add_leave_type($data){ 
        try{
            if($this->db->insert('tbl_leave_type', $data)){
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

    public function get_all_leave_type() {
        try{
            $query =$this->db->get('tbl_leave_type');
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_leave_type($leave_id){
        try{
            $this->db->where('id', $leave_id);
            $this->db->delete('tbl_leave_type');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }     

    public function get_leavedata_by_id(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_leave_type');
            $this->db->where('id', $_POST['leave_id']);
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

    public function update_leave_type($leave_id,$data){
        try{
            $this->db->where('id', $leave_id);
            if($this->db->update('tbl_leave_type',$data)){
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

    public function update_status($leave_id,$data){
        try{
            $this->db->where('id', $leave_id);
            if($this->db->update('tbl_emp_leave',$data)){
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

        public function insert_leave_statistics($arrayName){ 
        try{
            if($this->db->insert('tbl_leave_statistics', $arrayName)){
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

    public function update_leave_statistics($arrayName,$emp_id,$leave_type){
        try{
            $this->db->where('employee_id', $emp_id);
            $this->db->where('leave_type', $leave_type);
            if($this->db->update('tbl_leave_statistics',$arrayName)){
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

    public function getMaxLeaves($leave_type){
        try{
            $this->db->select('max_leave');
            $this->db->from('tbl_leave_type');
            $this->db->where('id', $leave_type);
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

    public function getAccruedLeaves(){
        try{
            $this->db->select('hours_accrued_leave');
            $this->db->from('tbl_timesheet');
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

    // public function empExits($emp_id,$leave_type){
    //     try{
    //         $this->db->select('*');
    //         $this->db->from('tbl_leave_statistics');
    //         $this->db->where('employee_id',$emp_id);
    //         $this->db->where('leave_type',$leave_type);

    //         $query=$this->db->get();
    //         $story_array = array();
    //         if($this->db->affected_rows() > 0){
    //             $story_array = $query->row();
    //             return $story_array;
    //         }else{
    //             return false;
    //         }
    //     }catch(Exception $ex){
    //         error_log($ex->getTraceAsString());
    //         echo $ex->getTraceAsString();
    //         return FALSE;
    //     }
    // }

    public function empExits($emp_id,$leave_type){
        try{
            $this->db->select('*');
            $this->db->from('tbl_leave_statistics');
            $this->db->where('employee_id',$emp_id);
            $this->db->where('leave_type',$leave_type);
            $query=$this->db->get();

            $sto_array = array();
            if($this->db->affected_rows() > 0){
                $sto_array = $query->row();

                $maximum_leaves = $sto_array->maximum_leaves;
                $maximum_hr = $sto_array->maximum_accrued_hr;
                $req_hr = $sto_array->req_leave_hours;
                $leaves_taken = $sto_array->leaves_taken;

                $this->db->select('COUNT("status") as status_count, SUM(hours_requested) as req_hr, SUM(days_requested) as req_day');
                $this->db->from('tbl_emp_leave');
                $this->db->where('employee_id',$emp_id);
                $this->db->where('leaveType',$leave_type);
                $this->db->where('status','Approved');
                $query=$this->db->get();
                $leave_arr = $query->row();
                $status_count = $leave_arr->status_count;
                $hours_requested = $leave_arr->req_hr;
                $days_requested = $leave_arr->req_day;
                $arrayName = array(
                    'maximum_leaves' => $maximum_leaves, 
                    'status_count' => $status_count,
                    'maximum_hr' => $maximum_hr,
                    'requested_hr' => $req_hr,
                    'hours_requested' => $hours_requested,
                    'days_requested' => $days_requested,
                    'leaves_taken' => $leaves_taken,
                );
                return $arrayName;
            }else{
                return false;
            }
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function updateStatistics($leave_id,$data){
        try{
            $this->db->where('leave_type', $leave_id);
            if($this->db->update('tbl_leave_statistics',$data)){
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

    public function get_MaxLeave(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_leave_type');
            $this->db->where('id', $_POST['leave_type']);
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


    //prashnat
    public function updateTimesheet($data){ 
        try{
            $this->db->where('id', 1);
            if($this->db->update('tbl_timesheet',$data)){
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

    public function get_timesheet(){
        try{
            $this->db->select('*');
            $this->db->from('tbl_timesheet');
            
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

    public function get_all_advance() {
        try{
            $this->db->select('tbl_advance.*,users.first_name,users.last_name,users.email,users.phone_no');
            $this->db->from('tbl_advance');            
            $this->db->join('users', 'users.user_id = tbl_advance.employee_id','LEFT'); 
            $query =$this->db->get();
            return $query->result_array();
        }catch(Exception $ex){
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }

    public function delete_advance_cash($cash_id){
        try{
            $this->db->where('id', $cash_id);
            $this->db->delete('tbl_advance');
            return TRUE;
        }catch(Exception $ex) {
            error_log($ex->getTraceAsString());
            echo $ex->getTraceAsString();
            return FALSE;
        }
    }


}	