<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Customers extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('customer/Customerm');
        //$this->load->library('session');

    }

    public function index()
    {
        $data=array('file'=>'customers');

       // print_r( $this->session); echo '----'.$this->session->sitelogo; exit;
        $this->template->full_customers_html_view($data);
    }

    public function customer_test1()  {
        $data=array('file'=>'customers_test');
        $this->template->full_customers_html_view($data);
    }

     public function insert_customer()
    {
        $customer_id=$this->auth->generator(15);
         $custemail=$this->Customerm->customer_email_exist($this->input->post('cust_email'));

        if($custemail)
        {
          echo 'emailexist';

        }else
        {
            $data=array(
                'customer_id'=> $customer_id,
                'first_name'=> $this->input->post('cust_fname'),
                'last_name'=> $this->input->post('cust_lname'),
                'customer_name'=> $this->input->post('cust_fname').' '.$this->input->post('cust_lname'),
                'customer_email'=>$this->input->post('cust_email'),
                'customer_mobile'=>$this->input->post('cust_phno'),
                'status'            => 1,
                'is_active'         => 1,
                'added_on'          => date('Y/m/d H:i:s'),

            );

            $data = $this->security->xss_clean($data);
            $result=$this->Customerm->customer_add($data);

            if ($result) {

                // json_encode(array(
                //         'status' => true,
                //         'message' => 'Customer added successfully',
                //     ));
                echo'success';
            }else
            {
                echo'fail';
            }
        }
    }

     public function update_customer()
    {
     
        $customer_id = $this->input->post('customer_id');

        $data=array(
            'customer_email'=> $this->input->post('customer_email'),
            'first_name'=> $this->input->post('customer_name'),
            'customer_mobile'=> $this->input->post('customer_phone')
        );

        $result=$this->Customerm->customer_update($data,$customer_id);

        if ($result) {
            echo'success';
        }else
        {
            echo'fail';
        }
        
    }

}
