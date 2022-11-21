<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hrms extends CI_Controller {

	function __construct() {
      	parent::__construct();
		
		$this->auth->check_admin_auth();
        $this->load->model('Hrms_Model');
    }
    /*---------- ATTENDENCE -------*/
    public function manage_attendance($value='')
    {
    	$data['title'] = "All Attendance";
        $data['emp_attendance'] = $this->Hrms_Model->get_emp_attendance();
        //print_r($data['emp_attendance']);exit;
		$content = $this->parser->parse('HRMS/attendance',$data,true);
		$this->template->full_admin_html_view($content);
    }

    public function add_attendance($value='')
    {
        $data['title'] = "Add Attendance";
        $content = $this->parser->parse('HRMS/add_attendance',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function search_attendance()
    {
       $data = array('empname' => $this->input->post('empname'),
                    'todate'=>$this->input->post('todate'),
                    'fromdate'=>$this->input->post('fromdate')
   );


           
       $searchdata = $this->Hrms_Model->search_empwise_attendance($data);

        $displayresult = "";
        if($searchdata){

        foreach($searchdata as $emp)
        {

             $displayresult.='<tr>';
             $displayresult.= '<td>'.date('d/m/Y',strtotime($emp->attendacedate)).'</td>';
              $displayresult.= '<td>'.$emp->first_name.' '.$emp->last_name.'</td>';
              $displayresult.= '<td>'; 
                                $cintime = explode(',',$emp->clockin);
                                $couttime = explode(',',$emp->clockout);
                                $j=1;
                                $calculatetime=array();
                                $totaltime=0;
                                for($i=0;$i<count($cintime);$i++)
                                {
                                    $displayresult.= $cintime[$i].'-'.$couttime[$i];
                                    $calculatetime[$i]=strtotime($couttime[$i])-strtotime($cintime[$i]);
                                    $totaltime+=$calculatetime[$i];                                                                if($j<count($cintime))
                                        $displayresult.=', ';
                                        $j++;
                                }
                    $displayresult.= '</td>';
                    $displayresult.= '<td>'; 
                                                                   $hours = floor($totaltime / 3600);
                                                                    $mins = floor(($totaltime - ($hours*3600)) / 60);
                                                                    $displayresult.=$hours.':'.$mins;                              
                                                                    $displayresult.=abs((strtotime($time2[2])-strtotime($time1[1]))/3600); 
                    $displayresult.= 'hours</td>';
                    $displayresult.='<td style="text-align: center;">
                                                            <button type="button"
                                                                class="btn btn-outline-dark alluserbtn">Edit
                                                                <svg class="pen" width="22" height="16"
                                                                    viewBox="0 0 21 21" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <g clip-path="url(#clip0)">
                                                                        <path
                                                                            d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                                                    </g>
                                                                    <defs>
                                                                        <clipPath id="clip0">
                                                                            <rect width="21" height="21" fill="white" />
                                                                        </clipPath>
                                                                    </defs>
                                                                </svg>
                                                            </button>
                                                            <button type="button"
                                                                class="btn btn-outline-dark alluserbtn">Delete
                                                                <svg class="delete" width="22" height="16"
                                                                    viewBox="0 0 14 18" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                                                </svg>
                                                            </button>
                                                        </td>';


             $displayresult.= '</tr>';
        }
        }
        else
        {
            $displayresult = "<tr><td colspan='5'>No result found</td></tr>";
        }
        //$return_arr['name'] = "name";
        //echo json_encode($searchdata);
        $this->output->set_output(json_encode(array('EmpAttHtml'=> $displayresult)));
       // $this->template->full_admin_html_view($searchdata);
    }

    public function emp_attendance_delete(){
        $data=$this->Hrms_Model->emp_attendance_delete();
        echo json_encode($data);
    } 




    /*-------DEPARTMENT  SECTION--------*/
    public function manage_department()
    {
        $data['title'] = "All Department";
        $data['department'] = $this->Hrms_Model->get_all_department();
        $content = $this->parser->parse('HRMS/department',$data,true);
        $this->template->full_admin_html_view($content);
    }


    public function insert_department()
    {
        $data = array(
            'department_name' => $this->input->post('department'),
            'description' => $this->input->post('description'),
        );
        $insert = $this->Hrms_Model->add_department($data);
        if($insert) {
            $this->session->set_flashdata('success', "Department is Successfully Inserted.");
            redirect('Hrms/manage_department');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_department');
        }
    }

    public function getDepartmentById() {
        $data = $this->Hrms_Model->get_departmentdata_by_id();
        echo json_encode($data);
    }

    public function update_department(){ 

        $department_id = $this->input->post('department_id');
        $data = array(
                'department_name'  => $this->input->post('department'),
                'description' => $this->input->post('description'),
            );
        $data = $this->security->xss_clean($data);
        // echo '<pre>'; print_r($department_id);exit;
        if($this->Hrms_Model->update_department($department_id,$data)){
           $this->session->set_flashdata('success','Department is Successfully Updated.');
            redirect('Hrms/manage_department');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_department');
        }      
      
    }

    public function delete_department(){
        $department_id = $this->input->post('department_id');
        if($this->Hrms_Model->delete_department($department_id)){
           $this->session->set_flashdata('success','Department is Successfully Deleted.');
            redirect('Hrms/manage_department');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_department');
        }           
    } 

    /******ADVANCE CASH******/
    public function manage_advance_cash($value='')
    {
    	$data['title'] = "Advance Cash";
        $data['advance'] = $this->Hrms_Model->get_all_advance();
        // echo '<pre>'; print_r($data);exit;
		$content = $this->parser->parse('HRMS/advance_cash',$data,true);
		$this->template->full_admin_html_view($content);
    }

    public function delete_advance_cash(){
        $cash_id = $this->input->post('cash_id');
        if($this->Hrms_Model->delete_advance_cash($cash_id)){
           $this->session->set_flashdata('success','Advance Cash request is Successfully Deleted.');
            redirect('Hrms/manage_advance_cash');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_advance_cash');
        }           
    } 

    



    

    /*-------HOLIDAY  SECTION--------*/
    public function manage_holiday($value='')
    {
    	$data['title'] = "All Holiday";
        $data['holiday'] = $this->Hrms_Model->get_all_holiday();
		$content = $this->parser->parse('HRMS/holiday',$data,true);
		$this->template->full_admin_html_view($content);
    }

    public function insert_holiday()
    {
        $data = array(
            'holiday_name' => $this->input->post('name'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'notes' => $this->input->post('notes'),
        );
        
        $insert = $this->Hrms_Model->add_holiday($data);
        if($insert) {
            $this->session->set_flashdata('success', "Holiday is Successfully Inserted.");
            redirect('Hrms/manage_holiday');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_holiday');
        }
    }

    public function getHolidayById() {
        $data = $this->Hrms_Model->get_holidaydata_by_id();
        echo json_encode($data);
    }


    public function update_holiday(){ 

        $holiday_id = $this->input->post('holiday_id');
         $data = array(
            'holiday_name' => $this->input->post('name'),
            'start_date' => $this->input->post('start_date'),
            'end_date' => $this->input->post('end_date'),
            'notes' => $this->input->post('notes'),
        );
        $data = $this->security->xss_clean($data);
        if($this->Hrms_Model->update_holiday($holiday_id,$data)){
           $this->session->set_flashdata('success','Holiday is Successfully Updated.');
            redirect('Hrms/manage_holiday');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_holiday');
        }      
      
    }

    public function delete_holiday(){
        $holiday_id = $this->input->post('holiday_id');
        if($this->Hrms_Model->delete_holiday($holiday_id)){
           $this->session->set_flashdata('success','Holiday is Successfully Deleted.');
            redirect('Hrms/manage_holiday');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_holiday');
        }           
    } 


    /*-------DESIGNATION  SECTION--------*/
    public function manage_designation($value='')
    {
        $data['title'] = "All Designation";
        $data['designation'] = $this->Hrms_Model->get_all_designation();
        $content = $this->parser->parse('HRMS/designation',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function insert_designation()
    {
        $data = array(
            'designation_name' => $this->input->post('designation'),
            'description' => $this->input->post('description'),
        );
        $insert = $this->Hrms_Model->add_designation($data);
        if($insert) {
            $this->session->set_flashdata('success', "Designation is Successfully Inserted.");
            redirect('Hrms/manage_designation');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_designation');
        }
    }

    public function getDesignationById() {
        $data = $this->Hrms_Model->get_designationdata_by_id();
        echo json_encode($data);
    }

    public function update_designation(){ 

        $designation_id = $this->input->post('designation_id');
        $data = array(
                'designation_name'  => $this->input->post('designation'),
                'description' => $this->input->post('description'),
            );
        $data = $this->security->xss_clean($data);
        
        if($this->Hrms_Model->update_designation($designation_id,$data)){
           $this->session->set_flashdata('success','Designation is Successfully Updated.');
            redirect('Hrms/manage_designation');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_designation');
        }      
      
    }

    public function delete_designation(){
        $designation_id = $this->input->post('designation_id');
        if($this->Hrms_Model->delete_designation($designation_id)){
           $this->session->set_flashdata('success','Designation is Successfully Deleted.');
            redirect('Hrms/manage_designation');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_designation');
        }           
    }



    /* ------LEAVE SECTION----*/    
    public function manage_leave($value='')
    {
        $this->load->model('Userm');
        $data['title'] = "All Leave";
        $data['employee'] = $this->Userm->get_all_users();
        $data['leave'] = $this->Hrms_Model->get_all_leave();
        // echo '<pre>'; print_r($data);exit;
        $data['leave_type'] = $this->Hrms_Model->get_all_leave_type();
        $content = $this->parser->parse('HRMS/leave',$data,true);
        $this->template->full_admin_html_view($content);
    }

     public function insert_leave(){
        
        $emp_id =  $this->input->post('employee_id');
        $leave_type = $this->input->post('leave_type');
        $start = $this->input->post('start_date');
        $end = $this->input->post('end_date');
        $data = array(
            'employee_id' => $emp_id,
            'start_date' => $start,
            'end_date' => $end,
            'leaveType' => $leave_type,
            'reason' => $this->input->post('reason'),
            'status' => 'Pending',
        );

       
        $maxLeaves = $this->Hrms_Model->getMaxLeaves($leave_type);
         
        $leavesTaken =  ( (strtotime($end) - strtotime($start) )/60/60/24) + 1;   

        $isExist = $this->Hrms_Model->empExits($emp_id,$leave_type);

        if(!$isExist){
            
            $arrayName = array(
                'employee_id' => $emp_id,
                'leave_type' => $leave_type,
                'maximum_leaves' => $maxLeaves->max_leave,
                'leaves_taken' => $leavesTaken,
            );
            $this->Hrms_Model->insert_leave_statistics($arrayName);
        }
        else{

            $arrayName = array(
                'leaves_taken' => $isExist->leaves_taken + $leavesTaken,
            );

            $this->Hrms_Model->update_leave_statistics($arrayName,$emp_id,$leave_type);

        }


        $insert = $this->Hrms_Model->add_leave($data);
        if($insert == 1) {
            $this->session->set_flashdata('success', "Leave is Successfully Applied.");
            redirect('Hrms/manage_leave');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_leave');
        }
    }


    public function getLeaveById() {
        $data = $this->Hrms_Model->get_statusdata_by_id();
        echo json_encode($data);
    }

    public function delete_leave(){
        $leave_id = $this->input->post('leave_id');
        if($this->Hrms_Model->delete_leave($leave_id)){
           $this->session->set_flashdata('success','Leave is Successfully Deleted.');
            redirect('Hrms/manage_leave');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_leave');
        }           
    } 

    public function change_status(){
        $leave_id = $this->input->post('leave_id');
         $data = array(
            'status' => $this->input->post('status'),
            'notes' => $this->input->post('notes'),
        );
        $data = $this->security->xss_clean($data);
        if($this->Hrms_Model->update_status($leave_id,$data)){
           $this->session->set_flashdata('success','Leave Status is Successfully Updated.');
            redirect('Hrms/manage_leave');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_leave');
        }      
    }

    /*-----------LEAVE TYPE----------*/
    public function manage_leave_type($value='')
    {
        $data['title'] = "Leave Type";
        $data['leave_type'] = $this->Hrms_Model->get_all_leave_type();
        $data['timesheet'] = $this->Hrms_Model->get_timesheet();

        $content = $this->parser->parse('HRMS/leave_type',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function updateTimesheet(){
        $data = array(
            'hours_approved_timesheet' => $this->input->post('hours_approved_timesheet'),
            'hours_accrued_leave' => $this->input->post('hours_accrued_leave')
        );

        //$tax_id = 1;
        $update = $this->Hrms_Model->updateTimesheet($data);
        if($update == 1) {
            $this->session->set_flashdata('success', "Timesheet is Successfully Updated.");
            redirect('Hrms/manage_leave_type');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_leave_type');
        }
    }

    public function insert_leave_type()
    {
        $data = array(
        	'leave_type' => $this->input->post('leave_type'),
            'max_leave' => $this->input->post('max_leave'),
            'leave_interval' => $this->input->post('leave_interval'),
        );
        $insert = $this->Hrms_Model->add_leave_type($data);
        if($insert == 1) {
            $this->session->set_flashdata('success', "Leave Type is Successfully Inserted.");
            redirect('Hrms/manage_leave_type');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_leave_type');
        }
    }

    public function delete_leave_type(){
        $leave_id = $this->input->post('leave_id');
        if($this->Hrms_Model->delete_leave_type($leave_id)){
           $this->session->set_flashdata('success','Leave Type is Successfully Deleted.');
            redirect('Hrms/manage_leave_type');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_leave_type');
        }           
    } 

    public function getLeaveTypeById() {
        $data = $this->Hrms_Model->get_leavedata_by_id();
        echo json_encode($data);
    }

    public function update_leave_type(){ 

        $leave_id = $this->input->post('leave_id');
        $data = array(
            'leave_type' => $this->input->post('leave_type'),
            'max_leave' => $this->input->post('max_leave'),
            'leave_interval' => $this->input->post('leave_interval'),
        );

        $arrayName = array(
            'maximum_leaves' => $this->input->post('max_leave')
        );

        $data = $this->security->xss_clean($data);
        $update = $this->Hrms_Model->update_leave_type($leave_id,$data);

        if($this->Hrms_Model->updateStatistics($leave_id,$arrayName)){
           $this->session->set_flashdata('success','Leave Type is Successfully Updated.');
            redirect('Hrms/manage_leave_type');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Hrms/manage_leave_type');
        }      
      
    }

    public function getRemainingLeaveById()
    {
       $data = $this->Hrms_Model->empExits($_POST['employee_id'],$_POST['leave_type']);

       if(empty($data)){
            $result['maxLeave'] = $this->Hrms_Model->get_MaxLeave();
            echo json_encode($result);
       }else{
          $result['maximum'] = $data->maximum_leaves - $data->leaves_taken;
          echo json_encode($result);
       }

      

       // $result = $data->maximum_leaves - $data->leaves_taken;
       
    }


}    