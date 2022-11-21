<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php
$CI = &get_instance();
$CI->load->model('Soft_settings');
$CI->load->model('Reports');
$CI->load->model('Users');
$CI->load->model('Gen_settingm');

$Soft_settings = $CI->Soft_settings->retrieve_setting_editdata();
$users = $CI->Users->profile_edit_data();
$out_of_stock = $CI->Reports->out_of_stock_count();
//$store_wise_products = $CI->Reports->store_wise_product();
//dd($store_wise_products);
$getsitelogo = $CI->Gen_settingm->get_logo_favicon();


$store_wise_products_count = 0;
//if ($store_wise_products) {
//    foreach ($store_wise_products as $store_wise_product) {
//        $product = $store_wise_product['quantity'] - $store_wise_product['sell'];
//        if ($product < 10) {
//            $store_wise_products_count++;
//        }
//    }
//}
?>
<script src="<?php echo base_url(); ?>assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>

<nav id="sidebar">
  <div class="sidebar-header">
     <img style="width: 100px;" src="<?= base_url('assets/') ?>images/logo-bg.svg"> 

    <!-- <img style="width: 170px;" src="<?= base_url('assets/') ?>images/Liquor-011.png">         -->
<!--       <h3>  LOGO <?php   echo $getsitelogo['logo'] ?> </h3>
 -->
    <!-- <img src="logo1.png" alt="logo"> -->

  </div>
  <div class="side-nav">
    <ul class="categories">
      <li>
        <a class="active" href="<?= base_url('Admin_dashboard') ?>"><svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.9797 16.1143C13.5788 16.1143 13.9782 15.7149 13.9782 15.1158V6.12989C13.9782 5.83036 13.8783 5.53083 13.5788 5.33114L7.58814 0.338937C7.18877 0.0394053 6.68955 0.0394053 6.29017 0.338937L0.299532 5.33114C0.099844 5.53083 0 5.83036 0 6.12989V15.1158C0 15.7149 0.399376 16.1143 0.99844 16.1143H4.9922V11.1221H8.98596V16.1143H12.9797Z" fill="white" />
          </svg><span> Dashboard </span></a>
      </li>
      <?php if (!in_array(1, $this->session->userdata('module_id'))) { ?>
        <li>
          <a class="childarrow" href="#">
            <svg width="14" height="17" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.2 9.40445L7.5 7.40445C8.4 6.70445 9 5.70445 9 4.50445V3.70445C9 1.80445 7.6 0.104445 5.7 0.00444541C3.7 -0.0955546 2 1.50445 2 3.50445V4.50445C2 5.70445 2.6 6.70445 3.5 7.40445L0.8 9.50445C0.3 9.90444 0 10.5044 0 11.1044V13.0044C0 13.6044 0.4 14.0044 1 14.0044H10C10.6 14.0044 11 13.6044 11 13.0044V11.0044C11 10.4044 10.7 9.80445 10.2 9.40445Z" />
            </svg><span>User Management</span>
          </a>
          <ul class="side-nav-dropdown">
            <li><a href="<?php echo base_url('User/manage_user') ?>">Users</a></li>
            <li><a href="<?php echo base_url('User/manage_role') ?>">Role</a></li>
            <li><a href="<?php echo base_url('User/manage_frontrole') ?>">Front Role</a></li>

          </ul>
        </li>
      <?php } ?>
      
      <li>
        <a class="childarrow" href="#">
          <svg width="14" height="17" viewBox="0 0 11 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.2 9.40445L7.5 7.40445C8.4 6.70445 9 5.70445 9 4.50445V3.70445C9 1.80445 7.6 0.104445 5.7 0.00444541C3.7 -0.0955546 2 1.50445 2 3.50445V4.50445C2 5.70445 2.6 6.70445 3.5 7.40445L0.8 9.50445C0.3 9.90444 0 10.5044 0 11.1044V13.0044C0 13.6044 0.4 14.0044 1 14.0044H10C10.6 14.0044 11 13.6044 11 13.0044V11.0044C11 10.4044 10.7 9.80445 10.2 9.40445Z" />
          </svg><span>Cashier Management</span>
        </a>
        <ul class="side-nav-dropdown">
          <li><a href="<?php echo base_url('Ccashieruser/manage_cashier') ?>">Cashier</a></li>

        </ul>
      </li>

      <?php if (!in_array(4, $this->session->userdata('module_id'))) { ?>
        <li>
          <a class="childarrow" href="#">
            <svg width="14" height="17" viewBox="0 0 13 18" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M9.71389 4.875C9.29155 4.875 8.94918 5.21737 8.94918 5.63971V6.5C8.94918 6.60774 8.90638 6.71108 8.83019 6.78726C8.75401 6.86345 8.65067 6.90625 8.54293 6.90625C8.43519 6.90625 8.33185 6.86345 8.25567 6.78726C8.17948 6.71108 8.13668 6.60774 8.13668 6.5V5.63971C8.13668 5.21737 7.79431 4.875 7.37197 4.875H4.83888C4.41655 4.875 4.07418 5.21737 4.07418 5.63971V6.5C4.07418 6.60774 4.03138 6.71108 3.95519 6.78726C3.87901 6.86345 3.77567 6.90625 3.66793 6.90625C3.56018 6.90625 3.45685 6.86345 3.38067 6.78726C3.30448 6.71108 3.26168 6.60774 3.26168 6.5V5.63971C3.26168 5.21737 2.91931 4.875 2.49697 4.875H1.89253C1.49731 4.875 1.1672 5.17616 1.13103 5.56971L0.0767204 17.0403C0.035535 17.4884 0.388242 17.875 0.838216 17.875H11.3266C11.7755 17.875 12.1278 17.4902 12.0884 17.0431L11.0763 5.57249C11.0414 5.17774 10.7108 4.875 10.3145 4.875H9.71389ZM3.66793 8.53125C3.58758 8.53125 3.50904 8.50742 3.44223 8.46279C3.37542 8.41815 3.32335 8.3547 3.2926 8.28047C3.26185 8.20623 3.25381 8.12455 3.26949 8.04574C3.28516 7.96694 3.32385 7.89455 3.38067 7.83774C3.43748 7.78092 3.50987 7.74223 3.58867 7.72656C3.66748 7.71088 3.74916 7.71893 3.82339 7.74967C3.89763 7.78042 3.96108 7.83249 4.00571 7.8993C4.05035 7.96611 4.07418 8.04465 4.07418 8.125C4.07418 8.23274 4.03138 8.33608 3.95519 8.41226C3.87901 8.48845 3.77567 8.53125 3.66793 8.53125ZM8.54293 8.53125C8.46258 8.53125 8.38404 8.50742 8.31723 8.46279C8.25042 8.41815 8.19835 8.3547 8.1676 8.28047C8.13686 8.20623 8.12881 8.12455 8.14449 8.04574C8.16016 7.96694 8.19885 7.89455 8.25567 7.83774C8.31248 7.78092 8.38487 7.74223 8.46367 7.72656C8.54248 7.71088 8.62416 7.71893 8.69839 7.74967C8.77263 7.78042 8.83608 7.83249 8.88071 7.8993C8.92535 7.96611 8.94918 8.04465 8.94918 8.125C8.94918 8.23274 8.90638 8.33608 8.83019 8.41226C8.75401 8.48845 8.65067 8.53125 8.54293 8.53125ZM8.13668 2.84375C8.13668 2.30503 7.92267 1.78837 7.54174 1.40744C7.16081 1.02651 6.64415 0.8125 6.10543 0.8125C5.56671 0.8125 5.05005 1.02651 4.66912 1.40744C4.28819 1.78837 4.07418 2.30503 4.07418 2.84375V3.65625C4.07418 3.88062 3.89229 4.0625 3.66793 4.0625C3.44356 4.0625 3.26168 3.88062 3.26168 3.65625V2.84375C3.26168 2.08954 3.56129 1.36622 4.09459 0.832915C4.6279 0.299609 5.35122 0 6.10543 0C6.85964 0 7.58296 0.299609 8.11627 0.832915C8.64957 1.36622 8.94918 2.08954 8.94918 2.84375V3.65625C8.94918 3.88062 8.76729 4.0625 8.54293 4.0625C8.31856 4.0625 8.13668 3.88062 8.13668 3.65625V2.84375Z" />
            </svg>
            <span>Sale</span>
          </a>
          <ul class="side-nav-dropdown">
            <li><a href="#exampleModalCenter" data-toggle="modal" data-target="#exampleModalCenter">POS Terminal</a></li>
            <li><a href="<?php echo base_url('Sell/manage_pos') ?>">List POS</a></li>

          </ul>
        </li>
      <?php } ?>
      <?php if (!in_array(9, $this->session->userdata('module_id'))) { ?>
        <li>
          <a href="<?php echo base_url('Ccustomer/manage_customer') ?>">
            <svg width="14" height="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M7 2C3.1 2 0 5.1 0 9C0 12.9 3.1 16 7 16C10.9 16 14 12.9 14 9H7V2Z" />
              <path d="M9 0V7H16C16 3.1 12.9 0 9 0Z">
            </svg>
            <span>Contacts</span>
          </a>

        </li>
      <?php } ?>

      <?php if (!in_array(3, $this->session->userdata('module_id'))) { ?>
        <li>
          <a class="childarrow" href="#">

            <svg width="14" height="17" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect width="6" height="6" rx="1" fill="white" />
              <rect y="8" width="6" height="6" rx="1" />
              <rect x="8" width="6" height="6" rx="1" />
              <rect x="8" y="8" width="6" height="6" rx="1" />
            </svg>


            <span>Products</span>
          </a>
          <ul class="side-nav-dropdown">
            <li><a href="<?= base_url('Cproduct/manage_product') ?>">List Products</a></li>
            <li><a href="<?= base_url('Cproduct') ?>">Add Products</a></li>
            <li><a href="<?= base_url('Cproduct/import_product') ?>">Import Products</a></li>
            <li><a href="<?= base_url('Cproduct/manage_category') ?>">Category</a></li>
            <li><a href="<?= base_url('Cproduct/manage_brand') ?>">Brand</a></li>
			<li><a href="<?= base_url('Cproduct/manage_supplier') ?>">Supplier</a></li>
          </ul>
        </li>
      <?php } ?>
      <?php if (!in_array(5, $this->session->userdata('module_id'))) { ?>
        <li>
          <a class="childarrow" href="#">

            <svg width="14" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M10.2 12.4L7.5 10.4C8.4 9.7 9 8.7 9 7.5V6.7C9 4.8 7.6 3.1 5.7 3C3.7 2.9 2 4.5 2 6.5V7.5C2 8.7 2.6 9.7 3.5 10.4L0.8 12.5C0.3 12.9 0 13.5 0 14.1V16C0 16.6 0.4 17 1 17H10C10.6 17 11 16.6 11 16V14C11 13.4 10.7 12.8 10.2 12.4Z" />
              <path d="M15.1 7.4L13.3 6.2C13.7 5.8 14 5.2 14 4.5V3.6C14 2.4 13.1 1.2 11.9 1C10.7 0.800001 9.7 1.5 9.2 2.4C10.3 3.4 11 4.8 11 6.4V7.4C11 8.3 10.8 9.2 10.4 9.9C10.4 9.9 11.6 10.8 11.6 10.9H15C15.6 10.9 16 10.5 16 9.9V9.1C16 8.4 15.7 7.8 15.1 7.4Z">
            </svg>


            <span>Loyalty Management</span>
          </a>
          <ul class="side-nav-dropdown">
            <li><a href="<?= base_url('Ccoupon/manage_discount') ?>">Discount Management</a></li>
            <li><a href="<?= base_url('Loyalty/manage_coupon') ?>">Coupon Management</a></li>
            <li><a href="<?= base_url('Loyalty/manage_promotion') ?>">Promotion Management</a></li>
            <li><a href="<?= base_url('Ccoupon/manage_reward') ?>">Reward Management</a></li>
            <li><a href="<?= base_url('LoyaltyPoint/manage_point') ?>">Point Management</a></li>

          </ul>
        </li>

      <?php } ?>
      <?php if (!in_array(6, $this->session->userdata('module_id'))) { ?>
        <li>
          <a class="childarrow" href="#">

            <svg width="14" height="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M14 3V1C14 0.448 13.552 0 13 0H3C2.448 0 2 0.448 2 1V3L0 6H16L14 3Z" />
              <path d="M2 8V15C2 15.552 2.448 16 3 16H6V12H10V16H13C13.552 16 14 15.552 14 15V8H2Z" />
            </svg>


            <span>HRMS</span>
          </a>
          <ul class="side-nav-dropdown">
            <li><a href="<?= base_url('Hrms/manage_attendance') ?>">Attendance</a></li>
            <li><a href="<?= base_url('Hrms/manage_leave') ?>">Leave</a></li>
            <li><a href="<?= base_url('Hrms/manage_leave_type') ?>">Leave Type</a></li>
            <li><a href="<?= base_url('Hrms/manage_holiday') ?>">Holiday List</a></li>
            <li><a href="<?= base_url('Hrms/manage_department') ?>">Department</a></li>
            <li><a href="<?= base_url('Hrms/manage_designation') ?>">Designation</a></li>
            <li><a href="<?= base_url('Hrms/manage_advance_cash') ?>">Advance Cash</a></li>


          </ul>
        </li>
      <?php } ?>
      <li>
        <a href="<?= base_url('Notification') ?>"> <svg width="14" height="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 14H6C6 15.1 6.9 16 8 16C9.1 16 10 15.1 10 14Z" />
            <path d="M15 11H14.5C13.8 10.3 13 9.3 13 8V5C13 2.2 10.8 0 8 0C5.2 0 3 2.2 3 5V8C3 9.3 2.2 10.3 1.5 11H1C0.4 11 0 11.4 0 12C0 12.6 0.4 13 1 13H15C15.6 13 16 12.6 16 12C16 11.4 15.6 11 15 11Z" />
          </svg>

          <span> Notification </span> </a>
      </li>

      <?php if (!in_array(7, $this->session->userdata('module_id'))) { ?>
        <li>
          <a class="childarrow" href="#">
            <svg width="14" height="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.2313 9.86563L13.9 9.09688C14.0344 8.37188 14.0344 7.62813 13.9 6.90313L15.2313 6.13438C15.3844 6.04688 15.4532 5.86563 15.4032 5.69688C15.0563 4.58438 14.4657 3.57813 13.6938 2.74063C13.5751 2.6125 13.3813 2.58125 13.2313 2.66875L11.9 3.4375C11.3407 2.95625 10.6969 2.58438 10 2.34063V0.806252C10 0.631252 9.87817 0.478127 9.7063 0.440627C8.55943 0.184377 7.38443 0.196877 6.2938 0.440627C6.12193 0.478127 6.00005 0.631252 6.00005 0.806252V2.34375C5.3063 2.59063 4.66255 2.9625 4.10005 3.44063L2.77193 2.67188C2.6188 2.58438 2.42818 2.6125 2.30943 2.74375C1.53755 3.57813 0.946926 4.58438 0.600051 5.7C0.546926 5.86875 0.618801 6.05 0.771926 6.1375L2.10318 6.90625C1.9688 7.63125 1.9688 8.375 2.10318 9.1L0.771926 9.86875C0.618801 9.95625 0.550051 10.1375 0.600051 10.3063C0.946926 11.4188 1.53755 12.425 2.30943 13.2625C2.42818 13.3906 2.62193 13.4219 2.77193 13.3344L4.10318 12.5656C4.66255 13.0469 5.3063 13.4188 6.00318 13.6625V15.2C6.00318 15.375 6.12505 15.5281 6.29693 15.5656C7.4438 15.8219 8.6188 15.8094 9.70942 15.5656C9.8813 15.5281 10.0032 15.375 10.0032 15.2V13.6625C10.6969 13.4156 11.3407 13.0438 11.9032 12.5656L13.2344 13.3344C13.3875 13.4219 13.5782 13.3938 13.6969 13.2625C14.4688 12.4281 15.0594 11.4219 15.4063 10.3063C15.4532 10.1344 15.3844 9.95313 15.2313 9.86563ZM8.00005 10.5C6.62193 10.5 5.50005 9.37813 5.50005 8C5.50005 6.62188 6.62193 5.5 8.00005 5.5C9.37818 5.5 10.5 6.62188 10.5 8C10.5 9.37813 9.37818 10.5 8.00005 10.5Z" />
            </svg>



            <span class="active"> Report </span></a>
          <ul class="side-nav-dropdown">
            <li><a href="<?= base_url('Creport/pos_register_report') ?>">Pos Registers Report</a></li>

            <li><a href="<?= base_url('Creport/inventory_report') ?>">Inventory</a></li>
            <li><a href="<?= base_url('Creport/sales_report') ?>">Sales</a></li>



          </ul>
        </li>
      <?php } ?>
      <?php if (!in_array(8, $this->session->userdata('module_id'))) { ?>
        <li>
          <a class="childarrow" href="#">
            <svg width="14" height="17" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M15.2313 9.86563L13.9 9.09688C14.0344 8.37188 14.0344 7.62813 13.9 6.90313L15.2313 6.13438C15.3844 6.04688 15.4532 5.86563 15.4032 5.69688C15.0563 4.58438 14.4657 3.57813 13.6938 2.74063C13.5751 2.6125 13.3813 2.58125 13.2313 2.66875L11.9 3.4375C11.3407 2.95625 10.6969 2.58438 10 2.34063V0.806252C10 0.631252 9.87817 0.478127 9.7063 0.440627C8.55943 0.184377 7.38443 0.196877 6.2938 0.440627C6.12193 0.478127 6.00005 0.631252 6.00005 0.806252V2.34375C5.3063 2.59063 4.66255 2.9625 4.10005 3.44063L2.77193 2.67188C2.6188 2.58438 2.42818 2.6125 2.30943 2.74375C1.53755 3.57813 0.946926 4.58438 0.600051 5.7C0.546926 5.86875 0.618801 6.05 0.771926 6.1375L2.10318 6.90625C1.9688 7.63125 1.9688 8.375 2.10318 9.1L0.771926 9.86875C0.618801 9.95625 0.550051 10.1375 0.600051 10.3063C0.946926 11.4188 1.53755 12.425 2.30943 13.2625C2.42818 13.3906 2.62193 13.4219 2.77193 13.3344L4.10318 12.5656C4.66255 13.0469 5.3063 13.4188 6.00318 13.6625V15.2C6.00318 15.375 6.12505 15.5281 6.29693 15.5656C7.4438 15.8219 8.6188 15.8094 9.70942 15.5656C9.8813 15.5281 10.0032 15.375 10.0032 15.2V13.6625C10.6969 13.4156 11.3407 13.0438 11.9032 12.5656L13.2344 13.3344C13.3875 13.4219 13.5782 13.3938 13.6969 13.2625C14.4688 12.4281 15.0594 11.4219 15.4063 10.3063C15.4532 10.1344 15.3844 9.95313 15.2313 9.86563ZM8.00005 10.5C6.62193 10.5 5.50005 9.37813 5.50005 8C5.50005 6.62188 6.62193 5.5 8.00005 5.5C9.37818 5.5 10.5 6.62188 10.5 8C10.5 9.37813 9.37818 10.5 8.00005 10.5Z" />
            </svg>



            <span> Settings </span></a>
          <ul class="side-nav-dropdown">
            <li><a href="<?= base_url('Ctax/manage_tax') ?>">Tax Settings</a></li>


          </ul>
          <ul class="side-nav-dropdown">
            <li><a href="<?= base_url('Cgen_setting') ?>">General Settings</a></li>


          </ul>
           <ul class="side-nav-dropdown">
            <li><a href="<?= base_url('Crcpt_setting') ?>">Receipt Settings</a></li>


          </ul>
           <ul class="side-nav-dropdown">
            <li><a href="<?= base_url('Ccustomkey_setting') ?>">Customkey Settings</a></li>


          </ul>
        </li>
      <?php } ?>
      <li>
        <a class="active" href="<?= base_url('Admin_dashboard/logout') ?>"><svg width="14" height="17" viewBox="0 0 14 17" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.9797 16.1143C13.5788 16.1143 13.9782 15.7149 13.9782 15.1158V6.12989C13.9782 5.83036 13.8783 5.53083 13.5788 5.33114L7.58814 0.338937C7.18877 0.0394053 6.68955 0.0394053 6.29017 0.338937L0.299532 5.33114C0.099844 5.53083 0 5.83036 0 6.12989V15.1158C0 15.7149 0.399376 16.1143 0.99844 16.1143H4.9922V11.1221H8.98596V16.1143H12.9797Z" fill="white" />
          </svg><span> Logout </span></a>
      </li>





  </div>

  <div>
    <div class="sidebarfooter">
      <p>© Copyright Liquor Wine Time 2020.</p>
      <p>All rights reserved</p>
    </div>
  </div>
</nav>
<!--THIS IS ADDITION PART FOR MODAL -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">

      <div class="modal-body modalscroll">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mt-2 mb-3 "> 
              <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
              <h5 class="text-center">POS TERMINAL</h5>

            </div>
            <!-- <div class="col-md-5 ">
                        <div class="form-group">
                          <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                      </div>
                      <div class="col-md-5 ">
                        <div class="form-group">
                          <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"></textarea>
                        </div>
                      </div> -->
          </div>
        </div>

      </div>
      <div class="mb-5">
        <div style="text-align: center;">
          <button type="button" class="btn btn-outline-dark btn-lg customfootercancelbtn w-45" data-dismiss="modal" data-toggle="modal" data-target="#exampleModalCenter2"><i class="fas fa-key button_style1"></i><span class="set">Open cash register/shift</span> </button>
          <button type="button" class="btn btn-outline-dark btn-lg customfootercancelbtn"> <i class="fas fa-file-alt button_style2"></i><span class="set2"> Make Report</span> </button>

        </div>
      </div>
    </div>
  </div>
</div>


<!--MODAL 2-->
<!-- modal-2 -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle center1" id="exampleModalLongTitle">Open cash register/shift</h5>
        <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button> -->
      </div>
      <div class="modal-body modalscroll">
        <div class="container">
          <div class="row">
            <div class="col-md-4 price_style text-center">
              <p class="info">$ 12,000</p>

            </div>
            <div class="col-md-6 contain  text-center">

              <p class="mt-5 ">Register started by: Rakesh</p>
              <p class="mb-5 ">Time: 19 Aug 2020 | 22:25:50</p>

            </div>

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div style="text-align: center;">
          <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Discard</button>
          <a href="pos.html"> <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Done</button></a>
        </div>

      </div>
    </div>
  </div>
</div>



<!--END ADDITION PART-->
<div id="content">
  <div class="menu-header">
    <button type="button" id="sidebarCollapse" class="btn menu-btn">
      <img src="<?= base_url('assets/') ?>images/menu-left.png">
      <span id="change" class="hidemenu">Hide Menu</span>
    </button>
    
    <div style="float: right;position: relative;top: 4px;">
            <?php if($this->session->userdata('user_type')=='1'){ ?>
            <div class="mana_div">
               <a class="btn menu-btn mer-menu-btn" href="">Merchant Management <i class="arrow down"></i></a>
               <ul  class="merul">
                  <li><a href="<?php echo base_url('Merchant_dashboard') ?>">Merchant Dashboard</a></li>
                  <li><a href="<?php echo base_url('Cstore') ?>">Location</a></li>
                  <li><a href="<?php echo base_url('Cterminal/manage_store_terminal') ?>">Terminals</a></li>
                  <li><a href="<?php echo base_url('StoreUser') ?>">Store Managers</a></li>
              </ul>      
            </div>
          <?php } ?>
              <?php
              if($this->session->userdata('user_type')==2){
                $this->db->where(['user_id' => $this->session->userdata('user_id')]);
                $this->db->select('store_set.store_name,assign_store.*');
                $this->db->join('store_set','assign_store.store_id=store_set.store_id','left');

                $stores=$this->db->where(['assign_store.merchant_id' => $this->session->userdata('merchant_id')])->get('assign_store')->result();
              } else if($this->session->userdata('user_type')==1){
                $stores=$this->db->where(['merchant_id' => $this->session->userdata('merchant_id')])->get('store_set')->result();
             
              }

                ?>  
             <select class="form-control" style="display: inline-flex; width: auto; margin-left: 10px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
         
              <option value="">Select...</option>
            <?php   foreach ($stores as $key => $value) { ?>
              <option <?php echo $value->store_id==$this->session->userdata('s_store_id')?"selected":"" ?> value="<?php echo base_url() ?>/adminlogin/switch_to_store?username=<?php echo $value->store_email ?>&store=<?php echo $value->store_id ?>&merchant_id=<?php echo $this->session->userdata('merchant_id') ?>"><?php   echo $value->store_name ?></option>
            <?php   } ?>
               </option>
            </select>
      <i class="fas fa-search cicon"></i>
      <i class="fas fa-bell cicon"></i>
      <img class="cimg" src="<?= base_url('assets/') ?>images/avatar.png">
      <span>
        <?= $this->session->userdata("user_name") ?>
      </span>
    </div>
    <!-- <span class="menu-text">Page Title</span> -->
  </div>