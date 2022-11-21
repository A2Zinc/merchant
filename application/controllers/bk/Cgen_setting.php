<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cgen_setting extends CI_Controller {

    function __construct() {
        parent::__construct();
        
        $this->load->model('Gen_settingm');
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
            'title'         => 'Update General Settings',
                   );
        $data['setting_detail'] = $this->Gen_settingm->retrieve_setting_editdata();
        $data['setting_detailCRV'] = $this->Gen_settingm->retrieve_CRVsetting_editdata();
        
        $language       = $this->Gen_settingm->languages();

        //print_r($data['setting_detail']);exit;
        
        $content = $this->parser->parse('general_setting/gen_setting',$data,true);
        $this->template->full_admin_html_view($content);
    }

    //Retrieve Pay Period value
    public function get_paydate()
    {

        $html='';
        $payperiodid = $this->input->post('payperiodid');
        //$data = $this->Gen_settingm->getpayperiod($payid);

        if($payperiodid)
        {
            
                if($payperiodid == '1' || $payperiodid == '2'){
                                   
                                        $html.='<option value="1">same day</option>
                                        <option value="2">next day</option>
                                        <option value="3">next business day</option> ';
                                   
                }else if($payperiodid == '4'){ 
                                     $html.='<option value="1">
                                        Last working day</option>
                                        <option value="2">Last business day</option>
                                        <option value="3">Last calendar day</option> 
                                         <option value="4">
                                        First working day of next month</option>
                                        <option value="5" >First business day of next month</option>
                                        <option value="6" >First calendar day of next month</option>'; 
                } 
                 else
                {
                    $html.='<option value="1">--Select--</option>';
                }
        }
         $this->output->set_output(json_encode(array('definedatehtml'=> $html)));


    }

    // Setting Update
    public function update_setting()
    {
        if ($_FILES['logo']['name']) {
            $config['upload_path']          = 'assets/images/logo/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size']             = "1024";
            $config['max_width']            = "*";
            $config['max_height']           = "*";
            $config['encrypt_name']         = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('logo'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message'=> $this->upload->display_errors()));
                redirect(base_url('Cgen_setting'));
            }
            else
            {
                $image =$this->upload->data();
                $logo = "assets/images/logo/".$image['file_name'];
            }
        }

        if ($_FILES['favicon']['name']) {
            $config['upload_path']          = 'assets/images/logo/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size']             = "1024";
            $config['max_width']            = "*";
            $config['max_height']           = "*";
            $config['encrypt_name']         = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload('favicon'))
            {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message'=> $this->upload->display_errors()));
                redirect(base_url('Cgen_setting'));
            }
            else
            {
                $image =$this->upload->data();
                $favicon = "assets/images/logo/".$image['file_name'];
            }
        }

        

        $old_logo    = $this->input->post('old_logo');
        
        $old_favicon = $this->input->post('old_favicon');

        $language = $this->input->post('language');
        $this->session->set_userdata('language',$language);

       

        $data=array(
            'logo'          => (!empty($logo)?$logo:$old_logo),
            'favicon'       => (!empty($favicon)?$favicon:$old_favicon),
            'language'      => $language,
            'secret_key'    => $this->input->post('secret_key'),
            'name'          => $this->input->post('name'),
            'mobile'          => $this->input->post('mobile'),
            'address'          => $this->input->post('address'),
            'email'          => $this->input->post('email'),
            'website'          => $this->input->post('website'),
            'apps_url'          => $this->input->post('apps_url'),
            'instagram_url'          => $this->input->post('instagram_url'),
            'twitter_url'          => $this->input->post('twitter_url'),
            'facebook_url'          => $this->input->post('facebook_url'),
            'Meta_Title'          => $this->input->post('Meta_Title'),
            'Meta_Key'          => $this->input->post('Meta_Key'),
            'Meta_Desc'          => $this->input->post('Meta_Desc'),
            'pay_period' => $this->input->post('pay_period'),
            'pay_date' => $this->input->post('pay_date'),
            'tax' => $this->input->post('tax'),

        );

        $result = $this->Gen_settingm->update_setting($data);
         $addCRV = $this->Gen_settingm->update_CRV($this->input->post('crv_value'),$this->input->post('crv_size'));




        if($result)
        $this->session->set_userdata(array('message'=>'General Setting is Successfully Updated'));

        redirect(base_url('Cgen_setting'));
    }


}