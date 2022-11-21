<?php //ini_set('display_errors', 'On');
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Cproduct extends CI_Controller
{

    public $product_id;
    function __construct()
    {
        parent::__construct();
        $CI = &get_instance();
        $CI->load->model('Products');
        $CI->load->model('Categories');
        //$this->load->model('Galleries');
        $CI->load->library('lproduct');
        $CI->load->model('Cashier_model');
        $CI->load->model('Common_model');
        $this->load->library('super_auth');
        if($this->super_auth->is_logged()===false){
            redirect('/');
        }
    }


    public function upload_file($file, $tmp_file, $path)
    {
        $name = time() . "." . $file;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        if ($ext == "jpg" || $ext == "png" || $ext == "jpeg" || $ext == "JPG" || $ext == "PNG" || $ext == "JPEG") {
            move_uploaded_file($tmp_file, $path . $name);
            return $name;
        } else {
            return FALSE;
        }
    }

    //Index page load
    // public function index()
    // {
    //     $CI =& get_instance();
    //     $CI->auth->check_admin_auth();
    //     $CI->load->library('lproduct');
    //     $content = $CI->lproduct->product_add_form();
    //     $this->template->full_admin_html_view($content);
    // }

    //Insert Product and upload
    /*public function insert_product()
    {
        $CI =& get_instance();
        $CI->load->library('form_validation');
        $this->form_validation->set_rules('product_name','Product Name','trim|required|xss_clean');
        $this->form_validation->set_rules('category_id','Category Name','trim|required|xss_clean');
        $this->form_validation->set_rules('onsale','Offer','trim|required|xss_clean');
        $this->form_validation->set_rules('price','Price','trim|required|xss_clean');
        $this->form_validation->set_rules('supplier_price','Supplier Price','trim|required|xss_clean');
        $this->form_validation->set_rules('model','Supplier Model','trim|required|xss_clean');
        $this->form_validation->set_rules('supplier_id','Supplier Id','trim|required|xss_clean');
        $this->form_validation->set_rules('variant[]','Variant','trim|required|xss_clean');
        if($this->form_validation->run() == false)
        {
            $CI =& get_instance();
            $CI->auth->check_admin_auth();
            $CI->load->library('lproduct');
            $content = $CI->lproduct->product_add_form();
            $this->template->full_admin_html_view($content);
        }
        else
        {
            if ($_FILES['image_thumb']['name']) {
                //Chapter chapter add start
                $config['upload_path']          = './my-assets/image/product/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
                $config['max_size']             = "*";
                $config['max_width']            = "*";
                $config['max_height']           = "*";
                $config['encrypt_name']         = TRUE;
                $this->upload->initialize($config);
                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload('image_thumb'))
                {
                    $this->session->set_userdata(array('error_message'=>  $this->upload->display_errors()));
                    redirect('Cproduct');
                }
                else
                {
                    $image =$this->upload->data();
                    $image_url = "my-assets/image/product/".$image['file_name'];

                    //Resize image config
                    $config['image_library']    = 'gd2';
                    $config['source_image']     = $image['full_path'];
                    $config['maintain_ratio']   = FALSE;
                    $config['width']            = 400;
                    $config['height']           = 400;
                    $config['new_image']        = 'my-assets/image/product/thumb/'.$image['file_name'];
                    $this->upload->initialize($config);
                    $this->load->library('image_lib', $config);
                    $resize = $this->image_lib->resize();
                    //Resize image config

                    $thumb_image = $config['new_image'];
                }
            }
            $variant        = $this->input->post('variant');
            $onsale_price   = $this->input->post('onsale_price');
            $default_variant=$this->input->post('default_variant');
            $product_id =  $this->generator(8);
            $data=array(
                'product_id'            =>$product_id,
                'product_name'          => $this->input->post('product_name'),
                'supplier_id'           => $this->input->post('supplier_id'),
                'category_id'           => $this->input->post('category_id'),
                'price'                 => $this->input->post('price'),
                'supplier_price'        => $this->input->post('supplier_price'),
                'unit'                  => $this->input->post('unit'),
                'product_model'         => $this->input->post('model'),
                'product_details'       => $this->input->post('details'),
                'brand_id'              => $this->input->post('brand'),
                'variants'              => implode(",", (array)$variant),
                'default_variant'       => $default_variant,
                'type'                  => $this->input->post('type'),
                'best_sale'             => $this->input->post('best_sale'),
                'onsale'                => $this->input->post('onsale'),
                'onsale_price'          => (!empty($onsale_price)?$onsale_price:null),
                'review'                => $this->input->post('review'),
                'video'                 => $this->input->post('video'),
                'description'           => stripslashes($this->input->post('description', FALSE)),
                'tag'                   => $this->input->post('tag'),
                'specification'         => stripslashes($this->input->post('specification', FALSE)),
                'invoice_details'       => $this->input->post('invoice_details'),
                'image_large_details'   => (!empty($image_url)?$image_url:'my-assets/image/product.png'),
                'image_thumb'           => (!empty($thumb_image)?$thumb_image:'my-assets/image/product.png'),
                'status'                => 1,
            );

            $result=$this->lproduct->insert_product($data);

//gallery image insert start===============
            $dataInfo = [];
            $this->load->library('upload');
            $files = $_FILES;
            if(!empty($_FILES['imageUpload']['name'][0])) {
                $cpt = count($_FILES['imageUpload']['name']);

                for ($i = 0; $i < $cpt; $i++) {
                    $_FILES['imageUpload']['name'] = $files['imageUpload']['name'][$i];
                    $_FILES['imageUpload']['type'] = $files['imageUpload']['type'][$i];
                    $_FILES['imageUpload']['tmp_name'] = $files['imageUpload']['tmp_name'][$i];
                    $_FILES['imageUpload']['error'] = $files['imageUpload']['error'][$i];
                    $_FILES['imageUpload']['size'] = $files['imageUpload']['size'][$i];
                    $_FILES['encrypt_name'] = TRUE;
                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload('imageUpload');
                    $dataInfo[] = $this->upload->data();
                    $image_url = "my-assets/image/gallery/" . $dataInfo[$i]['file_name'];

                    $imagedata = [
                        'image_gallery_id' => $this->auth->generator(15),
                        'product_id' => $product_id,
                        'image_url' => $image_url,
                        'img_thumb' => 'null',
                    ];
                    $result2 = $CI->Galleries->image_entry($imagedata);
                }
            }
//gallery image insert end=================


            if ($result == 1) {
                $this->session->set_userdata(array('message'=>display('successfully_added')));
                if(isset($_POST['add-product'])){
                    redirect(base_url('Cproduct/manage_product'));
                    exit;
                }elseif(isset($_POST['add-product-another'])){
                    redirect(base_url('Cproduct'));
                    exit;
                }
            }else{
                $this->session->set_userdata(array('error_message'=>display('product_model_already_exist')));
                redirect(base_url('Cproduct'));
            }
        }
    }*/

    private function set_upload_options()
    {
        //upload an image options
        $config = array();
        $config['upload_path'] = './my-assets/image/gallery/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = '0';
        $config['overwrite'] = FALSE;
        $config['encrypt_name'] = TRUE;

        return $config;
    }

    //Manage Product
    // public function manage_product()
    // {
    //     $CI =& get_instance();
    //     $this->auth->check_admin_auth();
    //     $CI->load->library('lproduct');
    //     $CI->load->model('Products');

    //     #
    //     #pagination starts
    //     #
    //     $config["base_url"] = base_url('Cproduct/manage_product/');
    //     $config["total_rows"] = $this->Products->product_list_count();
    //     $config["per_page"] = 10;
    //     $config["uri_segment"] = 3;
    //     $config["num_links"] = 5;
    //     /* This Application Must Be Used With BootStrap 3 * */
    //     $config['full_tag_open'] = "<ul class='pagination'>";
    //     $config['full_tag_close'] = "</ul>";
    //     $config['num_tag_open'] = '<li>';
    //     $config['num_tag_close'] = '</li>';
    //     $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    //     $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    //     $config['next_tag_open'] = "<li>";
    //     $config['next_tag_close'] = "</li>";
    //     $config['prev_tag_open'] = "<li>";
    //     $config['prev_tagl_close'] = "</li>";
    //     $config['first_tag_open'] = "<li>";
    //     $config['first_tagl_close'] = "</li>";
    //     $config['last_tag_open'] = "<li>";
    //     $config['last_tagl_close'] = "</li>";
    //     /* ends of bootstrap */
    //     $this->pagination->initialize($config);
    //     $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
    //     $links = $this->pagination->create_links();
    //     #
    //     #pagination ends
    //     #

    //     $content = $CI->lproduct->product_list($links,$config["per_page"],$page);
    //     $this->template->full_admin_html_view($content);
    // }
    //Product Update Form
    public function product_update_form($product_id)
    {
        $CI = &get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_edit_data($product_id);
        $this->template->full_admin_html_view($content);
    }

    // Product Update
    public function product_update()
    {
        $image = null;
        if ($_FILES['image_thumb']['name']) {
            //Chapter chapter add start
            $config['upload_path']          = './my-assets/image/product/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size']             = "*";
            $config['max_width']            = "*";
            $config['max_height']           = "*";
            $config['encrypt_name']         = TRUE;
            $this->upload->initialize($config);
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image_thumb')) {
                $this->session->set_userdata(array('error_message' =>  $this->upload->display_errors()));
                redirect('Cproduct');
            } else {
                $image = $this->upload->data();
                $image_url = "my-assets/image/product/" . $image['file_name'];
                //Resize image config
                $config['image_library']    = 'gd2';
                $config['source_image']     = $image['full_path'];
                $config['maintain_ratio']   = FALSE;
                $config['width']            = 400;
                $config['height']           = 400;
                $config['new_image']        = 'assets/images/product/thumb/' . $image['file_name'];
                $this->upload->initialize($config);
                $this->load->library('image_lib', $config);
                $resize = $this->image_lib->resize();
                //Resize image config
                $thumb_image = $config['new_image'];

                //Old image delete
                $old_image = $this->input->post('old_img_lrg');
                $old_file =  substr($old_image, strrpos($old_image, '/') + 1);
                @unlink(FCPATH . 'assets/images/product/' . $old_file);

                //Thumb image delete
                $old_img_thumb = $this->input->post('old_thumb_image');
                $old_file_thumb =  substr($old_img_thumb, strrpos($old_img_thumb, '/') + 1);
                @unlink(FCPATH . 'assets/images/product/thumb/' . $old_file_thumb);
            }
        }

        $old_img_lrg        = $this->input->post('old_img_lrg');
        $old_thumb_image    = $this->input->post('old_thumb_image');
        $product_id         = $this->input->post('product_id');
        $onsale_price       = $this->input->post('onsale_price');
        $variant            = $this->input->post('variant');

        $data = array(
            'product_name'          => $this->input->post('product_name'),
            'supplier_id'           => $this->input->post('supplier_id'),
            'category_id'           => $this->input->post('category_id'),
            'price'                 => $this->input->post('price'),
            'supplier_price'        => $this->input->post('supplier_price'),
            'unit'                  => $this->input->post('unit'),
            'product_model'         => $this->input->post('model'),
            'product_details'       => $this->input->post('details'),
            'brand_id'              => $this->input->post('brand'),
            'variants'              => implode(",", (array)$variant),
            'default_variant'       => $this->input->post('default_variant'),
            'video'                 => $this->input->post('video'),
            'type'                  => $this->input->post('type'),
            'best_sale'             => $this->input->post('best_sale'),
            'onsale'                => $this->input->post('onsale'),
            'onsale_price'          => (!empty($onsale_price) ? $onsale_price : null),
            'invoice_details'       => $this->input->post('invoice_details'),
            'review'                => $this->input->post('review'),
            'description'           => stripslashes($this->input->post('description', FALSE)),
            'tag'                   => $this->input->post('tag'),
            'specification'         => stripslashes($this->input->post('specification', FALSE)),
            'image_large_details'   => (!empty($image_url) ? $image_url : $old_img_lrg),
            'image_thumb'           => (!empty($thumb_image) ? $thumb_image : $old_thumb_image),
            'status'                => 1
        );

        $result = $this->Products->update_product($data, $product_id);

        $old_gallery_image =  $this->input->post('old_gallery_image');

        $dataInfo = [];
        $dataInfo2 = [];
        $this->load->library('upload');
        $files = $_FILES;
        $cpt = count($_FILES['imageUpload']['name']);
        $m = 0;
        $n = 0;
        for ($i = 0, $j = 0; $i < $cpt; $i++, $j++) {

            if (!empty($old_gallery_image[$j])) {
                //update existing image
                if (!empty($files['imageUpload']['name'][$i])) {
                    $_FILES['imageUpload']['name'] = $files['imageUpload']['name'][$i];
                    $_FILES['imageUpload']['type'] = $files['imageUpload']['type'][$i];
                    $_FILES['imageUpload']['tmp_name'] = $files['imageUpload']['tmp_name'][$i];
                    $_FILES['imageUpload']['error'] = $files['imageUpload']['error'][$i];
                    $_FILES['imageUpload']['size'] = $files['imageUpload']['size'][$i];
                    $_FILES['encrypt_name'] = TRUE;
                    $this->upload->initialize($this->set_upload_options());
                    $this->upload->do_upload('imageUpload');
                    $dataInfo[] = $this->upload->data();
                    $image_url = "assets/images/product/" . $dataInfo[$m]['file_name'];
                    $data = array(
                        'product_id' => $product_id,
                        'image_url' => $image_url,
                        'img_thumb' => 'null',
                    );

                    $result2 = $this->Galleries->update_gallery_image($data, $old_gallery_image[$i]);
                    unlink(FCPATH . $old_gallery_image[$i]);
                    $m++;
                }
            } else {
                //insert new image
                $_FILES['imageUpload']['name'] = $files['imageUpload']['name'][$i];
                $_FILES['imageUpload']['type'] = $files['imageUpload']['type'][$i];
                $_FILES['imageUpload']['tmp_name'] = $files['imageUpload']['tmp_name'][$i];
                $_FILES['imageUpload']['error'] = $files['imageUpload']['error'][$i];
                $_FILES['imageUpload']['size'] = $files['imageUpload']['size'][$i];
                $_FILES['encrypt_name'] = TRUE;
                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('imageUpload');
                $dataInfo2[] = $this->upload->data();

                $image_url = "assets/images/product/" . $dataInfo2[$n]['file_name'];
                $imagedata = [
                    'image_gallery_id' => $this->auth->generator(15),
                    'product_id' => $product_id,
                    'image_url' => $image_url,
                    'img_thumb' => 'null',
                ];
                $result2 = $this->Galleries->image_entry($imagedata);
                $n++;
            }
        }
        if ($result == true) {
            $this->session->set_userdata(array('message' => display('successfully_updated')));
            redirect('Cproduct/manage_product');
        } else {
            $this->session->set_userdata(array('error_message' => display('product_model_already_exist')));
            redirect('Cproduct/manage_product');
        }
    }
    // Product Delete
    public function product_delete($product_id)
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Products');
        $result = $CI->Products->delete_product($product_id);
    }
    //Retrieve Single Item  By Search
    public function product_by_search()
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $product_id = $this->input->post('product_id');
        $content = $CI->lproduct->product_search_list($product_id);
        $this->template->full_admin_html_view($content);
    }
    //Retrieve Single Item  By Search
    public function product_details($product_id)
    {
        $this->product_id = $product_id;
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_details($product_id);
        $this->template->full_admin_html_view($content);
    }

    //Retrieve Single Item  By Search
    public function product_details_single()
    {
        $product_id = $this->input->post('product_id');
        $this->product_id = $product_id;
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->library('lproduct');
        $content = $CI->lproduct->product_details_single($product_id);
        $this->template->full_admin_html_view($content);
    }

    //Add supplier by ajax
    // public function add_supplier()
    // {
    //     $this->load->model('Suppliers');
    //     $this->form_validation->set_rules('supplier_name', display('supplier_name'), 'required');
    //     $this->form_validation->set_rules('mobile', display('mobile'), 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         echo '3';
    //     } else {
    //         $data = array(
    //             'supplier_id'   => $this->auth->generator(20),
    //             'supplier_name' => $this->input->post('supplier_name'),
    //             'address'       => $this->input->post('address'),
    //             'mobile'        => $this->input->post('mobile'),
    //             'details'       => $this->input->post('details'),
    //             'status'        => 1
    //         );

    //         $supplier = $this->Suppliers->supplier_entry($data);

    //         if ($supplier == TRUE) {
    //             $this->session->set_userdata(array('message' => display('successfully_added')));
    //             echo '1';
    //         } else {
    //             $this->session->set_userdata(array('error_message' => display('already_exists')));
    //             echo '2';
    //         }
    //     }
    // }
    // Insert category by ajax
    /* public function insert_category()
    {
        $this->load->model('Categories');
        $category_id=$this->auth->generator(15);


        $this->form_validation->set_rules('category_name', display('category_name'), 'required');

        if ($this->form_validation->run() == FALSE){
            echo '3';
        }else{
            //Customer  basic information adding.
            $data=array(
                'category_id'           => $category_id,
                'category_name'         => $this->input->post('category_name'),
                'status'                => 1
            );

            $result=$this->Categories->category_entry($data);

            if ($result == TRUE) {
                $this->session->set_userdata(array('message'=>display('successfully_added')));
                echo '1';
            }else{
                $this->session->set_userdata(array('error_message'=>display('already_exists')));
                echo '2';
            }
        }
    }*/

    //Add Product CSV
    public function add_product_csv()
    {
        $CI = &get_instance();
        $data = array(
            'title' => display('import_product_csv')
        );
        $content = $CI->parser->parse('product/add_product_csv', $data, true);
        $this->template->full_admin_html_view($content);
    }

    //CSV Upload File
    function uploadCsv() {

        $temp_file_ext = pathinfo($_FILES['upload_csv_file']['name'], PATHINFO_EXTENSION);
        if($temp_file_ext == "csv") {
            
            $fp = fopen($_FILES['upload_csv_file']['tmp_name'], 'r') or die("can't open file");

            if (($handle = fopen($_FILES['upload_csv_file']['tmp_name'], 'r')) !== FALSE) {

                $flag = true;
                while ($csv_line = fgetcsv($fp, 1024)) {

                    if($flag) { 
                        $flag = false; 
                        continue; 
                    }

                    /*echo '<pre>';
                    print_r($csv_line);
                    exit();*/

                    //keep this if condition if you want to remove the first row
                    for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
                        
                        $insert_csv                           = array();
                        $insert_csv['product_name']           = (!empty($csv_line[0]) ? $csv_line[0] : '');
                        $insert_csv['product_short_name']     = (!empty($csv_line[1]) ? $csv_line[1] : '');
                        $insert_csv['supplier_name']          = (!empty($csv_line[2]) ? $csv_line[2] : '');
                        $insert_csv['category_name']          = (!empty($csv_line[3]) ? $csv_line[3] : '');
                        $insert_csv['case_upc']               = (!empty($csv_line[4]) ? $csv_line[4] : '');
                        $insert_csv['supplier_price']         = (!empty($csv_line[5]) ? $csv_line[5] : '');
                        $insert_csv['sale_price']             = (!empty($csv_line[6]) ? $csv_line[6] : '');
                        $insert_csv['unit']                   = (!empty($csv_line[7]) ? $csv_line[7] : '');
                        $insert_csv['quantity']               = (!empty($csv_line[8]) ? $csv_line[8] : '');
                        $insert_csv['brand_name']             = (!empty($csv_line[9]) ? $csv_line[9] : '');
                        $insert_csv['size']                   = (!empty($csv_line[10]) ? $csv_line[10] : '');
                        $insert_csv['applicable_crv']         = (!empty($csv_line[11]) ? $csv_line[11] : '');
                        $insert_csv['applicable_tax']         = (!empty($csv_line[12]) ? $csv_line[12] : '');
                    }


                    $store_id               = $_SESSION['store_id'];
                    $image_thumb            = './uploads/products/600px-No_image_available.svg (2).png';
                    $status                 = '1';

                    // Find supplier_id
                    $this->Common_model->db->select('supplier_id');
                    $this->Common_model->db->from('supplier_information');                    
                    $this->Common_model->db->like('supplier_name', $insert_csv['supplier_name']);
                    $result_supplier_information = $this->Common_model->db->get()->result_array();
                    $supplier_id = "";
                    if(!empty($result_supplier_information)) {
                        $supplier_id = $result_supplier_information[0]['supplier_id'];
                    }

                    // Find category_id
                    $this->Common_model->db->select('category_id');
                    $this->Common_model->db->from('product_category');
                    $this->Common_model->db->like('category_name', $insert_csv['category_name']);
                    $result_product_category = $this->Common_model->db->get()->result_array();
                    $category_id = "";
                    if(!empty($result_product_category)) {
                        $category_id = $result_product_category[0]['category_id'];
                    }

                    // Find brand_id
                    $this->Common_model->db->select('brand_id');
                    $this->Common_model->db->from('brand');
                    $this->Common_model->db->like('brand_name', $insert_csv['brand_name']);
                    $result_brand = $this->Common_model->db->get()->result_array();
                    $brand_id = "";
                    if(!empty($result_brand)) {
                        $brand_id = $result_brand[0]['brand_id'];
                    }

                    //Data organizaation for insert to database
                    $data = array(
                        'product_id'                           => $this->generator(8),
                        'store_id'                             => $store_id,
                        'supplier_id'                          => $supplier_id,
                        'supplier'                             => $insert_csv['supplier_name'],
                        'category_id'                          => $category_id,
                        'case_UPC'                             => $insert_csv['case_upc'],
                        'product_name'                         => $insert_csv['product_name'],
                        'short_name'                           => $insert_csv['product_short_name'],
                        'supplier_price'                       => $insert_csv['supplier_price'],
                        'price'                                => $insert_csv['supplier_price'],
                        'onsale_price'                         => $insert_csv['sale_price'],
                        'unit'                                 => $insert_csv['unit'],
                        'quantity'                             => $insert_csv['quantity'],
                        'image_thumb'                          => $image_thumb,
                        'brand_id'                             => $brand_id,
                        'size'                                 => $insert_csv['size'],
                        'status'                               => $status,
                        'Applicable_CRV'                       => $insert_csv['applicable_crv'],
                        'Applicable_Tax'                       => $insert_csv['applicable_tax']
                    );

                    $result = $this->Common_model->db->select('*')
                        ->from('product_information')
                        ->where('case_UPC', $insert_csv['case_upc'])
                        ->get()
                        ->num_rows();

                    if ($result == 0) { // Add Product

                        $this->Common_model->db->insert('product_information', $data);
                        
                        /*$this->Common_model->db->select('*');
                        $this->Common_model->db->from('product_information');
                        $this->Common_model->db->where('status', 1);
                        $query = $this->Common_model->db->get();
                        
                        foreach ($query->result() as $row) {
                            $json_product[] = array('label' => $row->product_name . "-(" . $row->product_model . ")", 'value' => $row->product_id);
                        }

                        $cache_file = './my-assets/js/admin_js/json/product.json';
                        $productList = json_encode($json_product);
                        file_put_contents($cache_file, $productList);*/

                    } else { // Update Product

                        $this->Common_model->db->where('case_UPC', $insert_csv['case_upc']);
                        $this->Common_model->db->update('product_information', $data);

                        /*$this->Common_model->db->select('*');
                        $this->Common_model->db->from('product_information');
                        $this->Common_model->db->where('status', 1);
                        $query = $this->Common_model->db->get();

                        foreach ($query->result() as $row) {
                            $json_product[] = array('label' => $row->product_name . "-(" . $row->product_model . ")", 'value' => $row->product_id);
                        }

                        $cache_file = './my-assets/js/admin_js/json/product.json';
                        $productList = json_encode($json_product);
                        file_put_contents($cache_file, $productList);*/
                    }
                }
            }

            fclose($fp) or die("can't close file");
            $this->session->set_userdata(array('message' => "Products imported successfully."));

            redirect(base_url('Cproduct/import_product'));
            exit;
            
        } else {
            $this->session->set_userdata(array('error_message' => "Please upload only CSV file"));
            redirect(base_url('Cproduct/import_product'));
            exit;
        }
    }

    //This function is used to Generate Key
    public function generator($lenth)
    {
        $CI = &get_instance();
        $this->auth->check_admin_auth();
        $CI->load->model('Products');

        $number = array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
        for ($i = 0; $i < $lenth; $i++) {
            $rand_value = rand(0, 8);
            $rand_number = $number["$rand_value"];

            if (empty($con)) {
                $con = $rand_number;
            } else {
                $con = "$con" . "$rand_number";
            }
        }

        $result = $this->Products->product_id_check($con);

        if ($result === true) {
            $this->generator(8);
        } else {
            return $con;
        }
    }


    public function get_default_variant()
    {
        $variants = $this->input->post('variants');

        $variant_list = $this->Common_model->db->select('*')->from('variant')->where_in('variant_id', $variants)->get()->result();
        $html = '';
        foreach ($variant_list as $variant) {
            $html .= '<option value="' . $variant->variant_id . '">' . $variant->variant_name . '</option>';
        }
        echo  $html;
    }


    public function delete_gallery_image()
    {
        $imageId = $this->input->post('imageId');

        $gallery_image = $this->Common_model->db->select('image_url')->from('image_gallery')->where('image_gallery_id', $imageId)->get()->result();
        if ($gallery_image) {
            unlink(FCPATH . $gallery_image->image_url);
        }

        $this->Common_model->db->where('image_gallery_id', $imageId);
        $this->Common_model->db->delete('image_gallery');
    }

    //prashant code
    public function index()
    {

        $data['title'] = "Add Product";

        $this->load->model('Categories');
        //$data=array('file'=>'new-product');
        $data['category'] = $this->Categories->get_all_category();
        foreach ($data['category']  as $key => $value) {
            $data['category'][$key]['sub_cat'] = $this->Categories->get_all_category($value['category_id']);
            foreach ($data['category'][$key]['sub_cat']  as $key_sub => $value_sub) {
                $data['category'][$key]['sub_cat'][$key_sub]['child_cat'] = $this->Categories->get_all_category($value_sub['category_id']);
                foreach ($data['category'][$key]['sub_cat'][$key_sub]['child_cat']  as $key_child => $value_child) {
                    $data['category'][$key]['sub_cat'][$key_sub]['child_cat'][$key_child]['grand_cat'] = $this->Categories->get_all_category($value_child['category_id']);
                }
            }
        }

        //prashant add
        $data['brand'] = $this->Products->get_all_brand();
        $data['units'] = $this->Cashier_model->get_all_units();
        $data['sizes'] = $this->Cashier_model->get_all_sizes();
        $data['supplier'] = $this->Cashier_model->get_all_supplier();
        //prashnt close
        $content = $this->parser->parse('product/add_product_view', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function import_product()
    {
        $data['title'] = "Add Products";
        $content = $this->parser->parse('product/import_product_view', $data, true);
        $this->template->full_admin_html_view($content);
    }



    /*--------PRODUCT SECTION-------*/
    public function manage_product()
    {
        $data['title'] = "All Products";
        $data['products'] = $this->Products->get_all_products();
        $content = $this->parser->parse('product/product', $data, true);
        $this->template->full_admin_html_view($content);
    }
    public function insert_product()
    {
        // echo '<pre>'; print_r($_FILES);exit;
        // $file = $_FILES['product_hidden_img']['name'];
        // $tmp_file = $_FILES['product_hidden_img']['tmp_name'];
        // $path = './uploads/products/'.$upc_code.'_'.$img_name;
        // $lib = $this->upload_file($file, $tmp_file, $path);
        // $photo = 'assets/uploads/left_advertise/'.$lib;
        // $data = array(
        //     'photo' => $photo,

        // );
        $product_id =  $this->auth->generator(8);
        $brand_id =  $this->auth->generator(15);
        $insert = $this->Products->add_product($product_id,$brand_id);

        if ($insert) {
            $this->session->set_flashdata('success', "Product is Successfully Inserted.");
            redirect('Cproduct/manage_product');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_product');
        }
    }

    public function check_product()
    {
        $data = $this->Products->isProductExist($this->input->post('product_name'));
        if ($data == '') {
            echo 'success';
        } else {
            echo 'fail';
        }
    }


public function edit_product()
    {
        $data['title'] = "Update Product";
        $data['brand'] = $this->Products->get_all_brand();
        $product_id = isset($_GET['id']) ? $_GET['id'] : '';

        $data['category'] = $this->Categories->get_all_category();
        foreach ($data['category']  as $key => $value) {
            $data['category'][$key]['sub_cat'] = $this->Categories->get_all_category($value['category_id']);
            foreach ($data['category'][$key]['sub_cat']  as $key_sub => $value_sub) {
                $data['category'][$key]['sub_cat'][$key_sub]['child_cat'] = $this->Categories->get_all_category($value_sub['category_id']);
                foreach ($data['category'][$key]['sub_cat'][$key_sub]['child_cat']  as $key_child => $value_child) {
                    $data['category'][$key]['sub_cat'][$key_sub]['child_cat'][$key_child]['grand_cat'] = $this->Categories->get_all_category($value_child['category_id']);
                }
            }
        }
        $data['product'] = $this->Products->get_product_by_id($product_id);
        $data['units'] = $this->Products->get_all_units();
        $data['sizes'] = $this->Products->get_all_sizes();
        $data['supplier'] = $this->Products->get_all_supplier();



        //print_r($data['productdata']);exit;
        $content = $this->parser->parse('product/edit_product_view', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function updateproduct(){
        $data = $this->Products->update_product();
        echo json_encode($data);
    }

    public function update_product()
    {

        $product_id = $this->input->post('product_id');

        if (!empty($_FILES['photo']['name'])) {


            $file = $_FILES['photo']['name'];
            $tmp_file = $_FILES['photo']['tmp_name'];
            $path = './uploads/products/';
            $lib = $this->upload_file($file, $tmp_file, $path);
            $photo = $path . $lib;


            //unlink($this->input->post('product_old_image'));
        }



        $data = array(
            'product_name'          => $this->input->post('product_name'),
            'short_name'            => $this->input->post('product_nickname'),
            'category_id'           => (!empty($this->input->post('category_id')) ? $this->input->post('category_id') : '0'),
            // 'Unit_pack_UPC'         => $this->input->post('Unit_pack_UPC'),
            //  'case_UPC'              => $this->input->post('case_UPC'),
            //  'barcode_type'          => $this->input->post('barcode_type'),
            //   'barcode_formats'       => $this->input->post('barcode_formats'),
            //   'mpn'                   => $this->input->post('mpn'),
            //   'manufacturer'          => $this->input->post('manufacturer'),
            'Meta_Title'            => $this->input->post('Meta_Title'),
            'Meta_Key'              => $this->input->post('Meta_Key'),
            'Meta_Desc'             => $this->input->post('Meta_Desc'),
            //   'slug'                  => $this->input->post('slug'),
            'price'                 => $this->input->post('store_sell_price'),
            'supplier_price'        => $this->input->post('supplier_price'),
            'unit'                  => $this->input->post('unit'),
            // 'product_model'         => $this->input->post('model'),
            'product_details'       => stripslashes($this->input->post('description', FALSE)),
            //             'image_thumb'           => (!empty($photo)?$photo:'my-assets/image/product.png'),
            'brand_id'              => $this->input->post('brand_id'),
            //           'variants'              => implode(",", (array)$this->input->post('variant')),
            //             'default_variant'       => $this->input->post('default_variant'),
            //              'type'                  => $this->input->post('type'),
            //              'best_sale'             => $this->input->post('best_sale'),
            //               'onsale'                => $this->input->post('onsale'),
            'SKU'                  =>  $this->input->post('sku'),
            'supplier_price'        => number_format($supplier_price, 2),
            //             'profit_store'          => $this->input->post('profit_store'),
            //             'profit_ecommerce'      => $this->input->post('profit_ecommerce'),
            'onsale_price'          => $this->input->post('store_sell_price'),
            //             'invoice_details'       => $this->input->post('invoice_details'),
            'image_large_details'   => (!empty($photo) ? $photo : ''),
            //             'review'                => $this->input->post('review'),
            //    'tag'                  => $this->input->post('tag'),
            //             'video'              => $this->input->post('video'),
            'size'                     => $this->input->post('size'),
            'abv'                  => $this->input->post('abv'),
            'region'                => $this->input->post('region'),
            'producer'                 => $this->input->post('producer'),
            //             'about_producer'         => $this->input->post('about_producer'),
            //             'distributor_notes'  => $this->input->post('distributor_notes'),
            //             'gift'                   => $this->input->post('gift'),
            //             'special'                => $this->input->post('special'),
            //             'Sold_out'               => $this->input->post('Sold_out'),
            //             'is_promotion_page'  => $this->input->post('is_promotion_page'),
            'status'               => 1,

        );



        $data = $this->security->xss_clean($data);
        // echo $product_id;exit;
        //print_r($data);exit;
        $update = $this->Products->update_product($product_id, $data);
        if ($update) {
            $this->session->set_flashdata('success', "Product is Successfully Updated.");
            redirect('Cproduct/manage_product');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_product');
        }
    }

    public function delete_product()
    {
        $product_id = $this->input->post('product_id');
        if ($this->Products->delete_product($product_id)) {
            $this->session->set_flashdata('success', "Product is Successfully Deleted.");
            redirect('Cproduct/manage_product');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_product');
        }
    }


    public function get_product_by_upc()
    {

        $response = $this->need_lib->get_product_by_upc();
        $data = json_decode($response);
        echo '<pre>';
        print_r($data);
    }

    /*----------CATEGORY SECTION--------------*/
    public function manage_category()
    {
        $this->load->model('Categories');
        $data['title'] = "All Category";
        $data['category'] = $this->Categories->get_all_category();

        // foreach ($data['category']  as $key => $value) {
        //     $data['category'][$key]['sub_cat'] = $this->Categories->get_all_category($value['category_id']);
        // }

        foreach ($data['category']  as $key => $value) {
            $data['category'][$key]['sub_cat'] = $this->Categories->get_all_category($value['category_id']);
            foreach ($data['category'][$key]['sub_cat']  as $key_sub => $value_sub) {
                $data['category'][$key]['sub_cat'][$key_sub]['child_cat'] = $this->Categories->get_all_category($value_sub['category_id']);
                foreach ($data['category'][$key]['sub_cat'][$key_sub]['child_cat']  as $key_child => $value_child) {
                    $data['category'][$key]['sub_cat'][$key_sub]['child_cat'][$key_child]['grand_cat'] = $this->Categories->get_all_category($value_child['category_id']);
                }
            }
        }

        //$data['super'] = $this->Categories->category_list();
        //echo '<pre>'; print_r($data['category']);exit;
        $content = $this->parser->parse('product/category_list', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function insert_category()
    {

        $parent_category = $this->input->post('parent_category');
        $sizetypevalue = implode(",", $this->input->post('size_value'));

        //-- Check extra measure value---
        if ($this->input->post('extrasize_value') != '') {
            $extra = explode(',', $this->input->post('extrasize_value'));

            for ($i = 0; $i < count($extra); $i++) {
                $extravalue = array(
                    'name'        => $extra[$i],
                    'size_type'     => $this->input->post('size_type'),
                );
                $insertextra = $this->Categories->add_extra_value_sizetype($extravalue);
            }
            $sizetypevalue .= ',' . $this->input->post('extrasize_value');
        }

        //---save group name
        if ($this->input->post('group_name') != '') {
            $grpdatedata = array(
                'group_name'        => $this->input->post('group_name'),
                'group_value'         => $sizetypevalue,
                'group_size_type'     => implode(',', $this->input->post('size_type')),
            );

            $insertgrpnameid = $this->Categories->add_groupsize($grpdatedata);
            $updatedata = array(
                'size_groupid'     => $insertgrpnameid,
            );

            $sizetypevalarray = explode(',', $sizetypevalue);
            //echo count($sizetypevalarray);exit;
            for ($j = 0; $j < count($sizetypevalarray); $j++) {

                $updatesizegrpid = $this->Categories->update_sizegroupid(implode(',', $this->input->post('size_type')), $sizetypevalarray[$j], $updatedata);
            }
        }
        $data = array(
            'category_id'        => $this->auth->generator(15),
            'category_name'      => $this->input->post('category_name'),
            'parent_category_id' => $parent_category,
            'description'        => $this->input->post('description'),
            'status'             => 1,
            'cat_type'           => (!empty($parent_category) ? '2' : '1'),
            'measurement_type'   => implode(',', $this->input->post('size_type')),
            'measurement_value'  => $sizetypevalue,
            'reorder_cat_level'  => $this->input->post('reorder_cat_level'),

        );

        if (NULL !== $this->input->post('size_grp'))
            $data['measurement_group'] = $insertgrpnameid;

        // --Add CRV and TAX field ------


        if (NULL !== $this->input->post('Applicable_CRV'))
            $data['Applicable_CRV'] = "1";
        if (NULL !== $this->input->post('Applicable_Tax'))
            $data['Applicable_Tax'] = "1";
        if (NULL !== $this->input->post('age_restrict'))
            $data['age_restrict'] = "1";
        if (NULL !== $this->input->post('alcoholic_type'))
            $data['alcoholic_type'] = "1";
        if (NULL !== $this->input->post('is_EBT'))
            $data['is_EBT'] = "1";
        
        //print_r($data);

        $data = $this->security->xss_clean($data);
        $insert = $this->Categories->add_category($data);



        if ($insert == 1) {
            $this->session->set_flashdata('success', "Category is Successfully Inserted.");
            redirect('Cproduct/manage_category');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_category');
        }
    }

    public function delete_category()
    {
        $this->load->model('Categories');
        $category_id = $this->input->post('category_id');
        if ($this->Categories->delete_category($category_id)) {
            $this->session->set_flashdata('success', 'Category is Successfully Deleted.');
            redirect('Cproduct/manage_category');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_category');
        }
    }

    public function getCategoryById()
    {
        $this->load->model('Categories');
        $data = $this->Categories->get_categorydata_by_id();
        echo json_encode($data);
    }

    public function update_category()
    {
        // echo '<pre>';print_r($this->input->post('Applicable_CRV'));exit;
        $this->load->model('Categories');
        $category_id = $this->input->post('category_id');
        $parent_category = $this->input->post('parent_category');

        $sizetypevalue = implode(",", $this->input->post('size_value'));

        //-- Check extra measure value---
        if ($this->input->post('extrasize_value') != '') {
            $extra = explode(',', $this->input->post('extrasize_value'));

            for ($i = 0; $i < count($extra); $i++) {
                $extravalue = array(
                    'name'        => $extra[$i],
                    'size_type'     => $this->input->post('size_type'),
                );
                $insertextra = $this->Categories->add_extra_value_sizetype($extravalue);
            }
            $sizetypevalue .= ',' . $this->input->post('extrasize_value');
        }

        //---save group name
        if ($this->input->post('group_name') != '') {
            $grpdatedata = array(
                'group_name'        => $this->input->post('group_name'),
                'group_value'         => $sizetypevalue,
                'group_size_type'     => implode(',', $this->input->post('size_type')),
            );

            $insertgrpnameid = $this->Categories->add_groupsize($grpdatedata);
            $updatedata = array(
                'size_groupid'     => $insertgrpnameid,
            );

            $sizetypevalarray = explode(',', $sizetypevalue);
            //echo count($sizetypevalarray);exit;
            for ($j = 0; $j < count($sizetypevalarray); $j++) {

                $updatesizegrpid = $this->Categories->update_sizegroupid(implode(',', $this->input->post('size_type')), $sizetypevalarray[$j], $updatedata);
            }
        }


        $data = array(
            'category_name'      => $this->input->post('category_name'),
            'parent_category_id' => $parent_category,
            'description'        => $this->input->post('description'),
            'cat_type'           => (!empty($parent_category) ? '2' : '1'),
            'measurement_type'   => implode(',', $this->input->post('size_type')),
            'measurement_value'  => $sizetypevalue,
            'reorder_cat_level'  => $this->input->post('reorder_cat_level'),
        );
        if (NULL !== $this->input->post('size_grp'))
            $data['measurement_group'] = $insertgrpnameid;

        // --Add CRV and TAX field ------
        //echo NULL !== $this->input->post('Applicable_CRV');

        if (NULL !== $this->input->post('Applicable_CRV'))
            $data['Applicable_CRV'] = "1";
        else
            $data['Applicable_CRV'] = "0";
        if (NULL !== $this->input->post('Applicable_Tax'))
            $data['Applicable_Tax'] = "1";
        else
            $data['Applicable_Tax'] = "0";

        if (NULL !== $this->input->post('age_restrict'))
            $data['age_restrict'] = "1";
        else
            $data['age_restrict'] = "0";

        if (NULL !== $this->input->post('alcoholic_type'))
            $data['alcoholic_type'] = "1";
        else
            $data['alcoholic_type'] = "0";


        if (NULL !== $this->input->post('is_EBT'))
            $data['is_EBT'] = "1";
        else
            $data['is_EBT'] = "0";

        // if($data['Applicable_CRV'] = "1"){
        // 	$this->Common_model->db->set('Applicable_CRV', 1);
        // 	$this->Common_model->db->where('category_id',$category_id);
        // 	$this->Common_model->db->or_where('parent_category_id',$category_id);
        // 	$this->Common_model->db->update('product_category');
        // }elseif(empty()){
        // 	$this->Common_model->db->set('Applicable_CRV', 0);
        // 	$this->Common_model->db->where('category_id',$category_id);
        // 	$this->Common_model->db->or_where('parent_category_id',$category_id);
        // 	$this->Common_model->db->update('product_category');
        // }

        if ($this->input->post('Applicable_CRV') == '1') {
            $this->Common_model->db->set('Applicable_CRV', 1);
            $this->Common_model->db->where('category_id', $category_id);
            $this->Common_model->db->or_where('parent_category_id', $category_id);
            $this->Common_model->db->update('product_category');
        }
        if (NULL == $this->input->post('Applicable_CRV')) {
            $this->Common_model->db->set('Applicable_CRV', 0);
            $this->Common_model->db->where('category_id', $category_id);
            $this->Common_model->db->or_where('parent_category_id', $category_id);
            $this->Common_model->db->update('product_category');
        }

        if ($this->input->post('Applicable_Tax') == '1') {
            $this->Common_model->db->set('Applicable_Tax', 1);
            $this->Common_model->db->where('category_id', $category_id);
            $this->Common_model->db->or_where('parent_category_id', $category_id);
            $this->Common_model->db->update('product_category');
        }
        if (NULL == $this->input->post('Applicable_Tax')) {
            $this->Common_model->db->set('Applicable_Tax', 0);
            $this->Common_model->db->where('category_id', $category_id);
            $this->Common_model->db->or_where('parent_category_id', $category_id);
            $this->Common_model->db->update('product_category');
        }

        if ($this->input->post('age_restrict') == '1') {
            $this->Common_model->db->set('age_restrict', 1);
            $this->Common_model->db->where('category_id', $category_id);
            $this->Common_model->db->or_where('parent_category_id', $category_id);
            $this->Common_model->db->update('product_category');
        }
        if (NULL == $this->input->post('age_restrict')) {
            $this->Common_model->db->set('age_restrict', 0);
            $this->Common_model->db->where('category_id', $category_id);
            $this->Common_model->db->or_where('parent_category_id', $category_id);
            $this->Common_model->db->update('product_category');
        }

        $data = $this->security->xss_clean($data);
        if ($this->Categories->update_category($category_id, $data)) {
            $this->session->set_flashdata('success', 'Category is Successfully Updated.');
            redirect('Cproduct/manage_category');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_category');
        }
    }

    /*---------Brand SECTION--------------*/
    public function manage_brand()
    {
        $this->load->model('Brands');
        $data['title'] = "All Brand";
        $data['brand'] = $this->Brands->brand_list();
        $content = $this->parser->parse('product/brand_list', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function insert_brand()
    {
        $this->load->model('Brands');
        $data = array(
            'brand_id'    => $this->auth->generator(15),
            'brand_name'  => $this->input->post('brand_name'),
            'description' => $this->input->post('description'),
            'status'      => 1,
        );
        $data = $this->security->xss_clean($data);
        $insert = $this->Brands->add_brand($data);
        if ($insert == 1) {
            $this->session->set_flashdata('success', "Brand is Successfully Inserted.");
            redirect('Cproduct/manage_brand');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_brand');
        }
    }

    public function delete_brand()
    {
        $this->load->model('Brands');
        $brand_id = $this->input->post('brand_id');
        if ($this->Brands->delete_brand($brand_id)) {
            $this->session->set_flashdata('success', 'Brand is Successfully Deleted.');
            redirect('Cproduct/manage_brand');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_brand');
        }
    }

    public function getBrandById()
    {
        $this->load->model('Brands');
        $data = $this->Brands->get_branddata_by_id();
        echo json_encode($data);
    }

    public function update_brand()
    {
        $this->load->model('Brands');
        $brand_id = $this->input->post('brand_id');
        $data = array(
            'brand_name'  => $this->input->post('brand_name'),
            'description' => $this->input->post('description'),
        );
        $data = $this->security->xss_clean($data);
        if ($this->Brands->update_brand($brand_id, $data)) {
            $this->session->set_flashdata('success', 'Brand is Successfully Updated.');
            redirect('Cproduct/manage_brand');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_brand');
        }
    }

    //---Get Measurement group value---
    public function getMeasureValue()
    {
        $this->load->model('Categories');
        $values = $this->Categories->get_measurement_value($this->input->post('measureid'));
        $exist_grp = $this->Categories->get_existing_grp(implode(',', $this->input->post('measureid')));

        $selecthtml .= '<label class="customcardlabel">Existing Group:</label>
                    <select class="form-control customcardinput" id="existing_grp" name="existing_grp" >';
        $selecthtml .= '<option value="">--Select Group--</option>';

        if ($exist_grp) {
            foreach ($exist_grp as $grp) {
                $selecthtml .= '<option value="' . $grp['id'] . '">' . $grp['group_name'] . '</option>';
            }
        }

        $selecthtml .= '</select>';

        $selecthtml .= '<label class="customcardlabel">Measurement Value:</label>
                    <select style="min-height:92px" class="form-control customcardinput" id="size_value" name="size_value[]" multiple="multiple">';


        if ($values) {
            foreach ($values as $value) {

                $selecthtml .= '<option value="' . $value['name'] . '">' . $value['name'] . '</option>';
            }
        }
        $selecthtml .= '</select>';
        $selecthtml .= '<label class="customcardlabel">Add more measurement value:</label><br/><input type="text" value="" data-role="tagsinput" name="extrasize_value" id="extrasize_value"/>';
        $selecthtml .= '<div class="form-group" id="grptextbox"><input type="checkbox" id="size_grp" name="size_grp" value=""><label class="customcardlabel">Save Group</label></div>';
        $this->output->set_output(json_encode(array('measurehtml' => $selecthtml)));
    }

    //---Get Measurement group value edit category---
    public function geteditMeasureValue()
    {
        $this->load->model('Categories');
        $valarray = explode(',', $this->input->post('measureid'));
        $values = $this->Categories->get_measurement_value($valarray);
        $exist_grp = $this->Categories->get_existing_grp($this->input->post('measureid'));
        $editexistgrpid  = $this->input->post('measuregrpid');
        $editexistvalue  = explode(',', $this->input->post('measurevalue'));


        $selecthtml .= '<label class="customcardlabel">Existing Group:</label>
                    <select class="form-control customcardinput" id="existing_grp" name="existing_grp" >';
        //$selecthtml.='<option value="">--Select Group--</option>';

        if ($exist_grp) {
            foreach ($exist_grp as $grp) {
                $selecthtml .= '<option value="' . $grp['id'] . '" ';
                $selecthtml .= ($grp['id'] == $editexistgrpid) ? "Selected" : "";
                $selecthtml .= '>' . $grp['group_name'] . '</option>';
            }
        }

        $selecthtml .= '</select>';

        $selecthtml .= '<label class="customcardlabel">Measurement Value:</label>
                    <select style="min-height:92px" class="form-control customcardinput" id="size_value" name="size_value[]" multiple="multiple">';


        if ($values) {
            foreach ($values as $value) {

                $selecthtml .= '<option value="' . $value['name'] . '"';
                $selecthtml .= in_array($value['name'], $editexistvalue) ? "Selected" : "";
                $selecthtml .= '>' . $value['name'] . '</option>';
            }
        }
        $selecthtml .= '</select>';
        $selecthtml .= '<label class="customcardlabel">Add more measurement value:</label><br><input type="text" value="" data-role="tagsinput" name="extrasize_value" id="extrasize_value"/>';
        $selecthtml .= '<div class="form-group" id="grptextbox"><input type="checkbox" id="size_grp" name="size_grp" value=""><label class="customcardlabel">Save Group</label></div>';
        $this->output->set_output(json_encode(array('measurehtml' => $selecthtml)));
    }

    public function getMeasureValue_grpwise()
    {
        $this->load->model('Categories');
        //echo $this->input->post('measureid');exit;
        $exist_grp_value = $this->Categories->get_existing_grpvalues(implode(',', $this->input->post('measureid')), $this->input->post('groupid'));

        foreach ($exist_grp_value as $grp) {
            $select_grpvalues_arr[] =  $grp['name'];
        }



        echo json_encode($select_grpvalues_arr);
    }

    /***********SUPPLIER************/
    public function manage_supplier(){
        $this->load->model('Suppliers');
        $data['title'] = "All Supplier";
        $data['supplier'] = $this->Suppliers->get_all_supplier();
        $content = $this->parser->parse('product/supplier_list', $data, true);
        $this->template->full_admin_html_view($content);
    }

    public function add_supplier(){
        $data['title'] = "Add Supplier";

        $data['category'] = $this->Categories->get_fix_category();
        // foreach ($data['category']  as $key => $value) {
        //     $data['category'][$key]['sub_cat'] = $this->Categories->get_all_category($value['category_id']);
        //     foreach ($data['category'][$key]['sub_cat']  as $key_sub => $value_sub) {
        //         $data['category'][$key]['sub_cat'][$key_sub]['child_cat'] = $this->Categories->get_all_category($value_sub['category_id']);
        //         foreach ($data['category'][$key]['sub_cat'][$key_sub]['child_cat']  as $key_child => $value_child) {
        //             $data['category'][$key]['sub_cat'][$key_sub]['child_cat'][$key_child]['grand_cat'] = $this->Categories->get_all_category($value_child['category_id']);
        //         }
        //     }
        // }

        $content = $this->parser->parse('product/add_supplier',$data,true);
        $this->template->full_admin_html_view($content);
    }
    public function insert_supplier(){
        $this->load->model('Suppliers');
        // $data = array(
        //     'supplier_id'   => $this->auth->generator(20),
        //     'supplier_name' => $this->input->post('supplier_name'),
        //     'mobile'        => $this->input->post('mobile'),
        //     'email'         => $this->input->post('email'),
        //     'address'       => $this->input->post('address'),
        //     'details'       => $this->input->post('details'),
        //     'status'        => 1
        // );
        // $data = $this->security->xss_clean($data);
        // $insert = $this->Suppliers->insert_supplier($data);
        // if($insert) {
        //     $this->session->set_flashdata('success', "Supplier is Successfully Inserted.");
        //     redirect('Cproduct/manage_supplier');
        // } else {
        //     $this->session->set_flashdata('error', "Something went wrong. Please try again.");
        //     redirect('Cproduct/manage_supplier');
        // }
        $data= $this->Suppliers->insert_supplier();
        echo json_encode($data);

    }
    public function edit_supplier(){
        $this->load->model('Suppliers');
        $data['title'] = "Update Supplier";
        $supplier_id = isset($_GET['id']) ? $_GET['id'] : '';

        $data['category'] = $this->Categories->get_fix_category();
        // foreach ($data['category']  as $key => $value) {
        //     $data['category'][$key]['sub_cat'] = $this->Categories->get_all_category($value['category_id']);
        //     foreach ($data['category'][$key]['sub_cat']  as $key_sub => $value_sub) {
        //         $data['category'][$key]['sub_cat'][$key_sub]['child_cat'] = $this->Categories->get_all_category($value_sub['category_id']);
        //         foreach ($data['category'][$key]['sub_cat'][$key_sub]['child_cat']  as $key_child => $value_child) {
        //             $data['category'][$key]['sub_cat'][$key_sub]['child_cat'][$key_child]['grand_cat'] = $this->Categories->get_all_category($value_child['category_id']);
        //         }
        //     }
        // }

        $data['supplier'] = $this->Suppliers->get_supplier_by_id($supplier_id);
        $content = $this->parser->parse('product/edit_supplier',$data,true);
        $this->template->full_admin_html_view($content);
    }

    public function update_supplier(){
        $this->load->model('Suppliers');
        $data=$this->Suppliers->update_supplier();
        echo json_encode($data);
    }

    public function delete_supplier(){
        $this->load->model('Suppliers');
        $supplier_id = $this->input->post('supplier_id');
        if($this->Suppliers->delete_supplier($supplier_id)){
           $this->session->set_flashdata('success','Supplier is Successfully Deleted.');
            redirect('Cproduct/manage_supplier');
        } else {
            $this->session->set_flashdata('error', "Something went wrong. Please try again.");
            redirect('Cproduct/manage_supplier');
        }
    }

    public function check_supplier_name(){
        $this->load->model('Suppliers');
        $data = $this->Suppliers->isNameExist($this->input->post('supplier_name'));
        if($data == ''){
            echo 'success';
        }else{
            echo 'fail';
        }
    }

    public function check_supplier_mobile(){
        $this->load->model('Suppliers');
        $data = $this->Suppliers->isMobileExist($this->input->post('supplier_mobile'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }

    public function check_supplier_email(){
        $this->load->model('Suppliers');
        $data = $this->Suppliers->isEmailExist($this->input->post('supplier_email'));
        if($data == ''){
            echo'success';
        }else{
            echo'fail';
        }
    }

    public function fetch_size_type(){
        $category_id = $_POST['category_id'];
        $data = $this->Products->fetch_size($category_id);
        echo json_encode($data);

    }
    public function fetch_supplier(){
        $category_id = $_POST['category_id'];
        $data = $this->Products->fetch_supplier($category_id);
        echo json_encode($data);
    }

    // public function check_product_upc(){
    //     echo json_encode($_POST);exit;
    //     $data = $this->Products->isUPCExist($this->input->post('case_UPC'));
    //     if($data == ''){
    //         echo 'success';
    //     }else{
    //         echo 'fail';
    //     }
    // }

}
