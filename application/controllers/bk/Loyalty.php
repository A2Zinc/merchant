<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loyalty extends CI_Controller {

	function __construct() {
      	parent::__construct();
		
		$this->auth->check_admin_auth();
        $this->load->model('Loyalty_Model');
    }
    /*---------- COUPON -------*/
    public function manage_coupon(){
        $data['title'] = "All Coupons";
        $data['coupons'] = $this->Loyalty_Model->get_all_coupon();
        // echo '<pre>'; print_r($data);exit;
        $content = $this->parser->parse('loyalty/coupon',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function index(){
        $data['title'] = "Add Coupon";
        $content = $this->parser->parse('loyalty/add_coupon',$data,true);
        $this->template->full_admin_html_view($content);
    }    

    public function insert_coupon(){
        $coupon_type = $this->input->post('coupon_type');
        if($coupon_type == 8){
            $product_id = !empty($this->input->post('product_id')) ? implode(',',$this->input->post('product_id')) : '';
        }elseif($coupon_type == 3){
            $product_id = !empty($this->input->post('product_id')) ? implode('',$this->input->post('product_id')) : '';
        }elseif($coupon_type != 3 || $coupon_type != 8){
            $product_id = '';
        }
        
        $coupon_condition = $this->input->post('coupon_condition');
        if($coupon_condition == '--Select Condition--'){
            $coupon_condition = '';
        }else{
            $coupon_condition = $this->input->post('coupon_condition');
        }
         $startdate = explode('-',$this->input->post('start_date'));
         $enddate = explode('-',$this->input->post('end_date'));
        $data = array(
            'coupon_id'                => $this->auth->generator(15),
            'coupon_name'              => $this->input->post('coupon_name'),
            'coupon_type'              => $coupon_type,
            'product_id'               => $product_id,
            'category_id'              => $this->input->post('category_id'),
            'brand_id'                 => $this->input->post('brand_id'),
            'product_qty'              => (!empty($this->input->post('product_qty'))?$this->input->post('product_qty'):''),
            'coupon_price_type'        => $this->input->post('discount_type'),
            'coupon_amount'            => (!empty($this->input->post('discount_amount'))?$this->input->post('discount_amount'):null),
            'discount_percentage'      => (!empty($this->input->post('discount_percentage'))?$this->input->post('discount_percentage'):null),
            'coupon_condition'         => $coupon_condition,
            'coupon_condition_price'   => $this->input->post('coupon_condition_price'),
            'usetype'                  => $this->input->post('usetype'),
            'autoapply'                => $this->input->post('autoapply'),
            'coupon_apply_type'        => $this->input->post('apply_type'),
             'start_date'               => $startdate[2].'-'.$startdate[0].'-'.$startdate[1],
            'end_date'                 => $enddate[2].'-'.$enddate[0].'-'.$enddate[1],
            'coupon_details'           => $this->input->post('coupon_details'),
            'combo_amount'             =>(!empty($this->input->post('combo_amount'))?$this->input->post('combo_amount'):0),
            'status'                   => 1,
        );
        $data = $this->security->xss_clean($data);
        // echo '<pre>'; print_r($data);exit;
        $insert = $this->Loyalty_Model->add_coupon($data);
        if($insert) {
            $this->session->set_flashdata('success', "Coupon is Successfully Inserted.");
            redirect('Loyalty/manage_coupon');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Loyalty/manage_coupon');
        }  
    }



    public function fetch_product(){  //autoseach functionality
        $searchtxt=$this->input->post('searchtxt');
        $size_i=$this->input->post('size_i');
        $data = $this->Loyalty_Model->fetch_product_name($searchtxt,$size_i);
        echo json_encode($data);
    }

    public function fetch_category(){  //autoseach functionality
        $searchtxt=$this->input->post('searchtxt');
        $data = $this->Loyalty_Model->fetch_category_name($searchtxt);
        echo json_encode($data);
    }

     public function fetch_brand(){  //autoseach functionality
        $searchtxt=$this->input->post('searchtxt');
        $data = $this->Loyalty_Model->fetch_brand_name($searchtxt);
        echo json_encode($data);
    }

    public function delete_coupon(){
        $coupon_id = $this->input->post('coupon_id');
        $data = array('is_deleted'  => 1,);
        if($this->Loyalty_Model->delete_coupon($coupon_id,$data)){
           $this->session->set_flashdata('success','Coupon is Successfully Deleted.');
            redirect('Loyalty/manage_coupon');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Loyalty/manage_coupon');
        }           
    } 

    public function change_status(){
        $change = $this->Loyalty_Model->change_status();
        echo json_encode($change);
        // if($change == TRUE){
        //     $this->session->set_flashdata('success', "Coupon Status is Successfully Changed.");
        //     redirect('Loyalty/manage_coupon');
        // } else {
        //     $this->session->set_flashdata('error', "Something went wrong. Please try again.");
        //     redirect('Loyalty/manage_coupon');
        // }  

    }

    public function edit_coupon(){
        
        $coupon_id = isset($_GET['id']) ? $_GET['id'] : '';
        $data = $this->Loyalty_Model->get_coupon_by_id($coupon_id);
        $data['title'] = "Update Coupon";
        
        $content = $this->parser->parse('loyalty/edit_coupon',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function update_coupon(){
        // echo '<pre>'; print_r($_POST);exit;
        $coupon_type = $this->input->post('coupon_type');
        if($coupon_type == 8){
            $product_id = !empty($this->input->post('product_id')) ? implode(',',$this->input->post('product_id')) : '';
        }elseif($coupon_type == 3){
            $product_id = !empty($this->input->post('product_id')) ? implode('',$this->input->post('product_id')) : '';
        }elseif($coupon_type != 3 || $coupon_type != 8){
            $product_id = '';
        }
         $coupon_id = $this->input->post('coupon_id');
         $startdate = explode('-',$this->input->post('start_date'));
         $enddate = explode('-',$this->input->post('end_date'));
         $data = array(
            'coupon_name'              => $this->input->post('coupon_name'),
            'coupon_type'              => $coupon_type,
            'product_id'               => $product_id,
            'category_id'              => $this->input->post('category_id'),
            'brand_id'                 => $this->input->post('brand_id'),
            'product_qty'              => $this->input->post('product_qty'),
            'coupon_price_type'        => $this->input->post('discount_type'),
            'coupon_amount'            => $this->input->post('discount_amount'),
            'discount_percentage'      => $this->input->post('discount_percentage'),
            'coupon_condition'         => $this->input->post('coupon_condition'),
            'coupon_condition_price'   => $this->input->post('coupon_condition_price'),
            'usetype'                  => $this->input->post('usetype'),
            'autoapply'                => $this->input->post('autoapply'),
            'coupon_apply_type'        => $this->input->post('apply_type'),
            'start_date'               => $startdate[2].'-'.$startdate[0].'-'.$startdate[1],
            'end_date'                 => $enddate[2].'-'.$enddate[0].'-'.$enddate[1],
            'coupon_details'           => $this->input->post('coupon_details'),
            'combo_amount'             =>(!empty($this->input->post('combo_amount'))?$this->input->post('combo_amount'):0),
        );
        $data = $this->security->xss_clean($data);
        if($this->Loyalty_Model->update_coupon($coupon_id,$data)){
           $this->session->set_flashdata('success','Coupon is Successfully Updated.');
            redirect('Loyalty/manage_coupon');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Loyalty/manage_coupon');
        }  
    }

    public function check_coupon(){
        $data = $this->Loyalty_Model->isCouponExist($this->input->post('coupon_name'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }

    public function manage_promotion(){
        $data['title'] = "All Promotion";
        $data['promotion'] = $this->Loyalty_Model->get_all_promotion();
        $content = $this->parser->parse('loyalty/promotion',$data,true);
        $this->template->full_admin_html_view($content);
    }
    public function promotion(){
        $data['title'] = "Add Promotion";
        $data['get_all_size'] = $this->Loyalty_Model->get_all_size();
        $content = $this->parser->parse('loyalty/add_promotion',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function get_product_by_barcode() {
        $data = $this->Loyalty_Model->get_productinfo_by_upc();
        echo json_encode($data);
    }
    
    public function insert_promotion() {
        $pro_id = $this->input->post('product_id');
        $product_id = implode(',',$pro_id);
        $startdate = explode('-',$this->input->post('start_date'));
        $enddate = explode('-',$this->input->post('end_date'));
        $data = array(
            'coupon_id'                => $this->auth->generator(15),
            'coupon_name'              => $this->input->post('promotion_name'),
            'coupon_type'              => $this->input->post('promotion_type'),
            'product_id'               => $product_id,
            'product_qty'              => $this->input->post('product_qty'),
            'usetype'                  => $this->input->post('usetype'),
            'start_date'               => $startdate[2].'-'.$startdate[0].'-'.$startdate[1],
            'end_date'                 => $enddate[2].'-'.$enddate[0].'-'.$enddate[1],
            'coupon_details'           => $this->input->post('promotion_details'),
            'combo_amount'             => $this->input->post('combo_amount'),
            'manage_type'              => 1,
            'status'                   => 1,
        );
        
        $data = $this->security->xss_clean($data);
        $insert = $this->Loyalty_Model->add_promotion($data);
        if($insert) {
            $this->session->set_flashdata('success', "Promotion is Successfully Inserted.");
            redirect('Loyalty/manage_promotion');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Loyalty/manage_promotion');
        }  
    }
    
    public function edit_promotion(){
        $coupon_id = isset($_GET['id']) ? $_GET['id'] : '';
        $data = $this->Loyalty_Model->get_promotion_by_id($coupon_id);
        $data['get_all_size'] = $this->Loyalty_Model->get_all_size();
        $data['title'] = "Update Promotion";
        $content = $this->parser->parse('loyalty/edit_promotion',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function update_promotion(){
        $pro_id = $this->input->post('product_id');
        $product_id = implode(',',$pro_id);
        $coupon_id = $this->input->post('promotion_id');
        $startdate = explode('-',$this->input->post('start_date'));
        $enddate = explode('-',$this->input->post('end_date'));
        $data = array(
            'coupon_name'              => $this->input->post('promotion_name'),
            'coupon_type'              => $this->input->post('promotion_type'),
            'product_id'               => $product_id,
            'product_qty'              => $this->input->post('product_qty'),
            'usetype'                  => $this->input->post('usetype'),
            'start_date'               => $startdate[2].'-'.$startdate[0].'-'.$startdate[1],
            'end_date'                 => $enddate[2].'-'.$enddate[0].'-'.$enddate[1],
            'coupon_details'           => $this->input->post('promotion_details'),
            'combo_amount'             => $this->input->post('combo_amount'),
        );
        $data = $this->security->xss_clean($data);

        if($this->Loyalty_Model->update_promotion($coupon_id,$data)){
           $this->session->set_flashdata('success','Promotion is Successfully Updated.');
            redirect('Loyalty/manage_promotion');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Loyalty/manage_promotion');
        }  
    }
    
    public function delete_promotion(){
        $coupon_id = $this->input->post('promotion_id');
        $data = array('is_deleted'  => 1,);
        if($this->Loyalty_Model->delete_coupon($coupon_id,$data)){
           $this->session->set_flashdata('success','Promotion is Successfully Deleted.');
            redirect('Loyalty/manage_promotion');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Loyalty/manage_promotion');
        }           
    } 
    
    public function change_promotion_status(){
        $change = $this->Loyalty_Model->change_status();
        echo json_encode($change);
    }    




 
 //   public function insert_coupon()
 //    {

 //        $this->form_validation->set_rules('coupon_name', display('coupon_name'), 'trim|required');
 //        $this->form_validation->set_rules('discount_type', display('discount_type'), 'trim|required');
 //        $this->form_validation->set_rules('start_date', display('start_date'), 'trim|required');
 //        $this->form_validation->set_rules('end_date', display('end_date'), 'trim|required');

 //        if ($this->form_validation->run() == FALSE)
 //        {
 //            $data = array(
 //                'title' => display('add_coupon'),
 //            );
 //            $content = $this->parser->parse('coupon/add_coupon',$data,true);
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
 //                'coupon_id'     => $this->auth->generator(15),
 //                'coupon_name'   => $this->input->post('coupon_name'),
 //                'coupon_discount_code'  => $this->auth->generator(5),
 //                'discount_type'     => $this->input->post('discount_type'),
 //                'discount_amount'   => (!empty($discount_amount)?$discount_amount:null),
 //                'discount_percentage' => (!empty($discount_percentage)?$discount_percentage:null),
 //                'start_date'    => $this->input->post('start_date'),
 //                'end_date'      => $this->input->post('end_date'),
 //                'status'        => 1,
 //            );

 //            $result=$this->Coupons->coupon_entry($data);

 //            if ($result == TRUE) {
                    
 //                $this->session->set_userdata(array('message'=>display('successfully_added')));

 //                if(isset($_POST['add-coupon'])){
 //                    redirect(base_url('Ccoupon/manage_coupon'));
 //                }elseif(isset($_POST['add-coupon-another'])){
 //                    redirect(base_url('Ccoupon'));
 //                }

 //            }else{
 //                $this->session->set_userdata(array('error_message'=>display('already_exists')));
 //                redirect(base_url('Ccoupon'));
 //            }
 //        }
 //    }
 //    //Manage coupon
 //    // public function manage_coupon()
 //    // {
 // //        $content =$this->lcoupon->coupon_list();
 //    //  $this->template->full_admin_html_view($content);;
 //    // }
 //    //coupon Update Form
 //    public function coupon_update_form($coupon_id)
 //    {   
 //        $content = $this->lcoupon->coupon_edit_data($coupon_id);
 //        $this->template->full_admin_html_view($content);
 //    }
 //    // coupon Update
 //    public function coupon_update($coupon_id=null)
 //    {

 //        $this->form_validation->set_rules('coupon_name', display('coupon_name'), 'trim|required');
 //        $this->form_validation->set_rules('discount_type', display('discount_type'), 'trim|required');
 //        $this->form_validation->set_rules('start_date', display('start_date'), 'trim|required');
 //        $this->form_validation->set_rules('end_date', display('end_date'), 'trim|required');

 //        if ($this->form_validation->run() == FALSE)
 //        {
 //            $data = array(
 //                'title' => display('add_coupon'),
 //            );
 //            $content = $this->parser->parse('coupon/add_coupon',$data,true);
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
 //                'coupon_name'   => $this->input->post('coupon_name'),
 //                'discount_type'     => $this->input->post('discount_type'),
 //                'discount_amount'   => (!empty($discount_amount)?$discount_amount:null),
 //                'discount_percentage' => (!empty($discount_percentage)?$discount_percentage:null),
 //                'start_date'    => $this->input->post('start_date'),
 //                'end_date'      => $this->input->post('end_date'),
 //                'status'        => 1,
 //            );

 //            $result=$this->Coupons->update_coupon($data,$coupon_id);

 //            if ($result == TRUE) {
 //                $this->session->set_userdata(array('message'=>display('successfully_updated')));
 //                redirect('Ccoupon/manage_coupon');
 //            }else{
 //                $this->session->set_userdata(array('error_message'=>display('already_exists')));
 //                redirect('Ccoupon/manage_coupon');
 //            }
 //        }
 //    }
 //    // coupon Delete
 //    public function coupon_delete($coupon_id)
 //    {
 //        $this->Coupons->delete_coupon($coupon_id);
 //        $this->session->set_userdata(array('message'=>display('successfully_delete')));
 //        redirect('Ccoupon/manage_coupon');
 //    }

 //    //Inactive
 //    public function inactive($id){
 //        $this->db->set('status', 0);
 //        $this->db->where('coupon_id',$id);
 //        $this->db->update('coupon');
 //        $this->session->set_userdata(array('error_message'=>display('successfully_inactive')));
 //        redirect(base_url('Ccoupon/manage_coupon'));
 //    }
 //    //Active 
 //    public function active($id){
 //        $this->db->set('status', 1);
 //        $this->db->where('coupon_id',$id);
 //        $this->db->update('coupon');
 //        $this->session->set_userdata(array('message'=>display('successfully_active')));
 //        redirect(base_url('Ccoupon/manage_coupon'));
 //    }

 //    //prashant code
 //    public function manage_discount()
 //    {
 //        $data['title'] = "All Discount";
 //        $content = $this->parser->parse('loyalty/discount',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }

 //    public function manage_coupon()
 //    {
 //        $data['title'] = "All Coupons";
 //        $content = $this->parser->parse('loyalty/coupon',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }

 //    public function manage_reward()
 //    {
 //        $data['title'] = "All Rewards";
 //        $content = $this->parser->parse('loyalty/reward',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }

 //    public function add_discount()
 //    {
 //        $data['title'] = "Add Discount";
 //        $content = $this->parser->parse('loyalty/add_discount',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }

 //    

 //    public function add_reward()
 //    {
 //        $data['title'] = "Add Reward";
 //        $content = $this->parser->parse('loyalty/add_reward',$data,true);
 //        $this->template->full_admin_html_view($content);
 //    }
}