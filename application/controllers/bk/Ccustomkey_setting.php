<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ccustomkey_setting extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Customkey_settingm');
        $this->auth->check_admin_auth();

        //User validation check
        if ($this->session->userdata('user_type') == '2') {
            $this->session->set_userdata(array('error_message'=>display('you_are_not_access_this_part')));
            redirect('Admin_dashboard');
        }
    }
    //Default loading for tax system.
    public function index()
    {
       
        $data = array(
            'title'         => 'Update Custom Key Setting',
                   );
        
        $data['setting_detail'] = $this->Customkey_settingm->retrieve_setting_editdata();
               
       
       // print_r($data['setting_detail']);exit;
        
        $content = $this->parser->parse('customkey_setting/customkey_setting',$data,true);
        $this->template->full_admin_html_view($content);
    }

    
    public function addcustomkey()
    {
        $customkey_name = $this->input->post('customkey_name');
        $custom_price_value = $this->input->post('custom_price_value');
        $tax = $this->input->post('tax');
        $customkeyid= $this->input->post('customkey_id');
        $this->Customkey_settingm->addcustomkey_name($customkeyid,$customkey_name,$custom_price_value,$tax);
    }

    public function removecustomkey()
    {
        $customkeyid= $this->input->post('customkey_id');
        $this->Customkey_settingm->removecustomkey_name($customkeyid);
    }

}