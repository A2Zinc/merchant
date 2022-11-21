<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class LoyaltyPoint extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->auth->check_admin_auth();
        $this->load->model('Loyalty_Point_Model');
    }
    /*---------- Point -------*/
    public function manage_point(){
        $data['title'] = "All Loyalty Points";
        $data['points'] = $this->Loyalty_Point_Model->get_all_point();
        // echo '<pre>'; print_r($data);exit;
        $content = $this->parser->parse('loyalty/point',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function index(){
        $data['title'] = "Add Point";
        $content = $this->parser->parse('loyalty/add_point',$data,true);
        $this->template->full_admin_html_view($content);
    }    

    public function insert_point(){


        $data = array(
            'point_id'                => $this->auth->generator(15),

            'point_type'              => $this->input->post('point_type'),

            'point_amount'          => (!empty($this->input->post('point_amount'))?$this->input->post('point_amount'):null),
             'point'          => (!empty($this->input->post('point'))?$this->input->post('point'):null),

            'status'                   => 1,
        );
        $data = $this->security->xss_clean($data);
        // echo '<pre>'; print_r($data);exit;
        $insert = $this->Loyalty_Point_Model->add_point($data);
        if($insert) {
            $this->session->set_flashdata('success', "Point is Successfully Inserted.");
            redirect('LoyaltyPoint/manage_point');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('LoyaltyPoint/manage_point');
        }  
    }

    public function fetch_product(){  //autoseach functionality
        $searchtxt=$this->input->post('searchtxt');
        $data = $this->Loyalty_Point_Model->fetch_product_name($searchtxt);
        echo json_encode($data);
    }

    public function delete_point(){
        $point_id = $this->input->post('point_id');
        //$data = array('is_deleted'  => 1,);
        if($this->Loyalty_Point_Model->delete_point($point_id)){
           $this->session->set_flashdata('success','Point is Successfully Deleted.');
            redirect('LoyaltyPoint/manage_point');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('LoyaltyPoint/manage_point');
        }           
    } 

    public function change_status_point(){
        $change = $this->Loyalty_Point_Model->change_status_point();
        echo json_encode($change);
        // if($change == TRUE){
        //     $this->session->set_flashdata('success', "point Status is Successfully Changed.");
        //     redirect('LoyaltyPoint/manage_point');
        // } else {
        //     $this->session->set_flashdata('error', "Something went wrong. Please try again.");
        //     redirect('LoyaltyPoint/manage_point');
        // }  

    }

    public function edit_point(){
        ini_set('display_errors', 'On');

        $data['title'] = "Update point";
        $point_id = isset($_GET['id']) ? $_GET['id'] : '';
        $data['pointdata']  = $this->Loyalty_Point_Model->get_point_by_id($point_id);
        //echo '<pre>'; print_r($data);exit;
        $content = $this->parser->parse('loyalty/edit_point',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function update_point(){
        // echo '<pre>'; print_r($_POST);exit;
         $point_id = $this->input->post('point_id');
        $data = array(
            'point_id'                => $point_id,

            'point_type'              => $this->input->post('point_type'),

            'point_amount'          => (!empty($this->input->post('point_amount'))?$this->input->post('point_amount'):null),
             'point'          =>        (!empty($this->input->post('point'))?$this->input->post('point'):null),

            'status'                   => 1,
        );
        $data = $this->security->xss_clean($data);
        if($this->Loyalty_Point_Model->update_point($point_id,$data)){
           $this->session->set_flashdata('success','Point is Successfully Updated.');
            redirect('LoyaltyPoint/manage_point');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('LoyaltyPoint/manage_point');
        }  
    }

    public function check_point(){
        $data = $this->Loyalty_Point_Model->ispointExist($this->input->post('point_name'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }





 //   public function insert_point()
 //    {

 //        $this->form_validation->set_rules('point_name', display('point_name'), 'trim|required');
 //        $this->form_validation->set_rules('discount_type', display('discount_type'), 'trim|required');
 //        $this->form_validation->set_rules('start_date', display('start_date'), 'trim|required');
 //        $this->form_validation->set_rules('end_date', display('end_date'), 'trim|required');

 //        if ($this->form_validation->run() == FALSE)
 //        {
 //            $data = array(
 //                'title' => display('add_point'),
 //            );
 //            $content = $this->parser->parse('point/add_point',$data,true);
 //            $this->template->full_admin_html_view($content);
 //        }
 //        else
 //        {
 //            $discount_type = $this->input->post('discount_type');
 //            if ($discount_type == 1) {
 //                $discount_amount = $this->input->post('discount_amount');
 //            }else{
 //                $discount_percentage = $this->input->post('discount_percentage');
 //            }

 //            $data=array(
 //                'point_id'     => $this->auth->generator(15),
 //                'point_name'   => $this->input->post('point_name'),
 //                'point_discount_code'  => $this->auth->generator(5),
 //                'discount_type'     => $this->input->post('discount_type'),
 //                'discount_amount'   => (!empty($discount_amount)?$discount_amount:null),
 //                'discount_percentage' => (!empty($discount_percentage)?$discount_percentage:null),
 //                'start_date'    => $this->input->post('start_date'),
 //                'end_date'      => $this->input->post('end_date'),
 //                'status'        => 1,
 //            );

 //            $result=$this->points->point_entry($data);

 //            if ($result == TRUE) {

 //                $this->session->set_userdata(array('message'=>display('successfully_added')));

 //                if(isset($_POST['add-point'])){
 //                    redirect(base_url('Cpoint/manage_point'));
 //                }elseif(isset($_POST['add-point-another'])){
 //                    redirect(base_url('Cpoint'));
 //                }

 //            }else{
 //                $this->session->set_userdata(array('error_message'=>display('already_exists')));
 //                redirect(base_url('Cpoint'));
 //            }
 //        }
 //    }
 //    //Manage point
 //    // public function manage_point()
 //    // {
 // //        $content =$this->lpoint->point_list();
 //    //  $this->template->full_admin_html_view($content);;
 //    // }
 //    //point Update Form
 //    public function point_update_form($point_id)
 //    {   
 //        $content = $this->lpoint->point_edit_data($point_id);
 //        $this->template->full_admin_html_view($content);
 //    }
 //    // point Update
 //    public function point_update($point_id=null)
 //    {

 //        $this->form_validation->set_rules('point_name', display('point_name'), 'trim|required');
 //        $this->form_validation->set_rules('discount_type', display('discount_type'), 'trim|required');
 //        $this->form_validation->set_rules('start_date', display('start_date'), 'trim|required');
 //        $this->form_validation->set_rules('end_date', display('end_date'), 'trim|required');

 //        if ($this->form_validation->run() == FALSE)
 //        {
 //            $data = array(
 //                'title' => display('add_point'),
 //            );
 //            $content = $this->parser->parse('point/add_point',$data,true);
 //            $this->template->full_admin_html_view($content);
 //        }
 //        else
 //        {
 //            $discount_type = $this->input->post('discount_type');
 //            if ($discount_type == 1) {
 //                $discount_amount = $this->input->post('discount_amount');
 //            }else{
 //                $discount_percentage = $this->input->post('discount_percentage');
 //            }

 //            $data=array(
 //                'point_name'   => $this->input->post('point_name'),
 //                'discount_type'     => $this->input->post('discount_type'),
 //                'discount_amount'   => (!empty($discount_amount)?$discount_amount:null),
 //                'discount_percentage' => (!empty($discount_percentage)?$discount_percentage:null),
 //                'start_date'    => $this->input->post('start_date'),
 //                'end_date'      => $this->input->post('end_date'),
 //                'status'        => 1,
 //            );

 //            $result=$this->points->update_point($data,$point_id);

 //            if ($result == TRUE) {
 //                $this->session->set_userdata(array('message'=>display('successfully_updated')));
 //                redirect('Cpoint/manage_point');
 //            }else{
 //                $this->session->set_userdata(array('error_message'=>display('already_exists')));
 //                redirect('Cpoint/manage_point');
 //            }
 //        }
 //    }
 //    // point Delete
 //    public function point_delete($point_id)
 //    {
 //        $this->points->delete_point($point_id);
 //        $this->session->set_userdata(array('message'=>display('successfully_delete')));
 //        redirect('Cpoint/manage_point');
 //    }

 //    //Inactive
 //    public function inactive($id){
 //        $this->db->set('status', 0);
 //        $this->db->where('point_id',$id);
 //        $this->db->update('point');
 //        $this->session->set_userdata(array('error_message'=>display('successfully_inactive')));
 //        redirect(base_url('Cpoint/manage_point'));
 //    }
 //    //Active 
 //    public function active($id){
 //        $this->db->set('status', 1);
 //        $this->db->where('point_id',$id);
 //        $this->db->update('point');
 //        $this->session->set_userdata(array('message'=>display('successfully_active')));
 //        redirect(base_url('Cpoint/manage_point'));
 //    }

 //    //prashant code
 //    public function manage_discount()
 //    {
 //        $data['title'] = "All Discount";
 //        $content = $this->parser->parse('LoyaltyPoint/discount',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }

 //    public function manage_point()
 //    {
 //        $data['title'] = "All points";
 //        $content = $this->parser->parse('LoyaltyPoint/point',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }

 //    public function manage_reward()
 //    {
 //        $data['title'] = "All Rewards";
 //        $content = $this->parser->parse('LoyaltyPoint/reward',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }

 //    public function add_discount()
 //    {
 //        $data['title'] = "Add Discount";
 //        $content = $this->parser->parse('LoyaltyPoint/add_discount',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }

 //    

 //    public function add_reward()
 //    {
 //        $data['title'] = "Add Reward";
 //        $content = $this->parser->parse('LoyaltyPoint/add_reward',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }
} 