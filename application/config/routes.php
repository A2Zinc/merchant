<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|   example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
| 
| Please see the user guide for complete details:
|
|   https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|   $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|   $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|   $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|       my-controller/my-method -> my_controller/my_method
*/

//Front end routing start

$route['adminlogin']            = 'Login';
$route['adminlogin/merchant_login']            = 'Login/merchant_login';
$route['adminlogin/merchant_do_login']            = 'Login/merchant_do_login';
$route['adminlogin/switch_to_store']            = 'Login/switch_to_store';
$route['adminlogin/switchback']            = 'Login/switchback';



$route['adminlogin/logout']            = 'Login/logout';

$route['default_controller']                = 'Admin_dashboard';
$route['cabinet']                           = 'website/Cabinet';
//$route['home']                                = 'website/Home';
$route['home/add_to_cart']                  = 'website/Home/add_to_cart';
$route['home/delete_cart/(:any)']           = 'website/Home/delete_cart/$1';
$route['home/update_cart']                  = 'website/Home/update_cart';
$route['home/apply_coupon']                 = 'website/Home/apply_coupon';
$route['checkout']                          = 'website/Home/checkout';
$route['view_cart']                         = 'website/Home/view_cart';
$route['submit_checkout']                   = 'website/Home/submit_checkout';
$route['thankyou']                          = 'website/Home/thankyou';
$route['category/(:any)/(:any)']            = 'website/Category/category_product/$1/$2';
$route['category/p/(:any)/(:any)']          = 'website/Category/category_product/$2';
$route['category/(:any)']                   = 'website/Category/category_product/$1';
$route['product_details/(:any)/(:num)']     = 'website/Product/product_details/$2';
$route['category_product_search']           = 'website/Category/category_product_search';
$route['category_product/(:any)']           = 'website/Category/category_wise_product/$1';
$route['category_product/(:any)/(:num)']    = 'website/Category/category_wise_product/$1/$2';
$route['brand_product/list/(:any)']         = 'website/Product/brand_product/$1';
//Front end routing end

//Admin Dashboard Start
$route['admin']                             = 'Admin_dashboard/login';
$route['autoupdate']                        = 'Autoupdate';
$route['backend/autoupdate/update']         = 'Autoupdate/update';
$route['forget_admin_password']             = 'Admin_dashboard/forget_admin_password'; //ajax call
$route['admin_password_reset/(:num)']       = 'Admin_dashboard/admin_password_reset_form/$1';//after send email get link
$route['admin_password_update']             = 'Admin_dashboard/admin_password_update';

//Admin Dashboard End

//Customer dashboard and profile start
$route['forget_password_form']      = 'website/customer/Login/forget_password_form'; //martbd
$route['forget_password']       = 'website/customer/Login/forget_password'; //ajax call
$route['password_reset/(:num)'] = 'website/customer/Login/password_reset_form/$1';//after send email get link
$route['password_update']       = 'website/customer/Login/password_update';
$route['login']                 = 'website/customer/Login';
$route['logout']                = 'website/customer/Customer_dashboard/Logout';
$route['do_login']              = 'website/customer/Login/do_login';
$route['signup']                = 'website/customer/Signup';
$route['user_signup']           = 'website/customer/Signup/user_signup';
$route['customer/customer_dashboard']   = 'website/customer/Customer_dashboard';
$route['customer/customer_dashboard/edit_profile']   = 'website/customer/Customer_dashboard/edit_profile';
$route['customer/customer_dashboard/update_profile'] = 'website/customer/Customer_dashboard/update_profile';
$route['customer/customer_dashboard/change_password_form']  = 'website/customer/Customer_dashboard/change_password_form';
$route['customer/customer_dashboard/change_password'] = 'website/customer/Customer_dashboard/change_password';
$route['customer/customer_dashboard/wishlist'] = 'website/customer/customer_dashboard/wishlist';
$route['customer/customer_dashboard/wishlist_delete/(:any)'] = 'website/customer/customer_dashboard/wishlist_delete/$1';
//Customer dashboard and profile end

//Customer order start
$route['customer/order']        = 'website/customer/Corder/new_order';
$route['customer/insert_order'] = 'website/customer/Corder/insert_order';
$route['customer/order/manage_order'] = 'website/customer/Corder/manage_order';
//Customer order end

//Customer invoice start
$route['customer/invoice']  = 'website/customer/Cinvoice/manage_invoice';
$route['customer/invoice/invoice_inserted_data/(:any)'] = 'website/customer/Cinvoice/invoice_inserted_data/$1';
//Customer invoice end

//Link page
$route['about_us']          = 'website/Setting/about_us';
$route['contact_us']        = 'website/Setting/contact_us';
$route['delivery_info']     = 'website/Setting/delivery_info';
$route['privacy_policy']    = 'website/Setting/privacy_policy';
$route['terms_condition']   = 'website/Setting/terms_condition';
$route['help']              = 'website/Setting/help';
$route['submit_contact']    = 'website/Setting/submit_contact';
//Link page end


/*** Supplier starts on 25-01-2020*******/
$route['cashier/list_supplier']     = 'cashier/Cashier/supplierlist';
$route['cashier/mailtemplate']     = 'cashier/Cashier/mailtemplate';

$route['cashier/supplierdatalist']  = 'cashier/Cashier/supplierdatalist';
$route['cashier/insert_supplier']   = 'cashier/Cashier/insert_supplier';
$route['cashier/supplieredit']  = 'cashier/Cashier/supplieredit';
$route['cashier/updatesupplier'] = 'cashier/Cashier/updatesupplier';
$route['cashier/deletesupplier'] = 'cashier/Cashier/delete_supplier';
/*** Supplier ends on 25-01-2020*******/


/*** Lottery Starts Here ***/
$route['cashier/lotteryedit']   = 'cashier/Cashier/lotteryedit';
$route['cashier/updatesupplier']    = 'cashier/Cashier/updatesupplier';
$route['cashier/Lotterylist']   = 'cashier/Cashier/Lotterylist';
 /*** Lottery Ends Here ***/

$route['404_override']          = '';
$route['translate_uri_dashes']  = FALSE;



$route['cashier']               = 'cashier/Cashier';

$route['cashier/add_supplier']  = 'cashier/Cashier/supplieradd';


$route['cashier/timesheetreport_by_user']               = 'cashier/Cashier/timesheetreport_by_user';
$route['cashier/timesheetreport']               = 'cashier/Cashier/timesheetreport';
$route['cashier/save_week_timesheet']               = 'cashier/Cashier/save_week_timesheet';
$route['cashier/eorder_detail/([a-zA-Z0-9]+)']     = 'cashier/Cashier/eorder_detail/$1';
$route['cashier/eorderlist']     = 'cashier/Cashier/eorderlist';
$route['cashier/eorder']     = 'cashier/Cashier/eorder';
$route['cashier/root_eorder']     = 'cashier/Cashier/root_eorder';
$route['cashier/inventory']     = 'cashier/Cashier/inventorylist';
$route['cashier/inventorydatalist']     = 'cashier/Cashier/inventorydatalist';
$route['cashier/inventorylistdt']   = 'cashier/Cashier/inventorylistdt';

$route['cashier/inventoryadd']  = 'cashier/Cashier/inventoryadd';
$route['cashier/scanUPC']       = 'cashier/Cashier/UPCbarcodescan';
$route['cashier/scanUPC_POS']   = 'cashier/Cashier/UPCbarcodescan_POS';
$route['cashier/POSterminal']   = 'cashier/Cashier/POSterminal';
$route['cashier/inventoryedit'] = 'cashier/Cashier/inventoryedit';
$route['cashier/insertxlsUPC']  = 'cashier/Cashier/insertxlsUPC';
$route['cashier/insertxlsUPCCollegeArco'] = 'cashier/Cashier/insertxlsUPCCollegeArco';
$route['cashier/insertxlsUPCROCKSTAR'] = 'cashier/Cashier/insertxlsUPCROCKSTAR';
$route['cashier/insertxlsUPCConversion'] = 'cashier/Cashier/insertxlsUPCConversion';

$route['cashier/customer_signup']  = 'cashier/Cashier/pos_customer_signup';

$route['cashier/insertproduct'] = 'cashier/Cashier/insertproduct';
$route['cashier/updateproduct'] = 'cashier/Cashier/updateproduct';
$route['cashier/deleteproduct'] = 'cashier/Cashier/delete_product';
$route['cashier/deleteproductimage'] = 'cashier/Cashier/deleteproductimage';

$route['cashier/update_onsale_price'] = 'cashier/Cashier/update_onsale_price';
$route['cashier/update_supplier_price'] = 'cashier/Cashier/update_supplier_price';
$route['cashier/update_store_promotion_price'] = 'cashier/Cashier/update_store_promotion_price';
$route['cashier/update_qty'] = 'cashier/Cashier/update_qty';

$route['cashier/customproductedit'] = 'cashier/Cashier/customproductedit';
$route['cashier/CustomProduct_list'] = 'cashier/Cashier/CustomProduct_list';


$route['cashier/loyalty']   = 'cashier/Cashier/loyaltylist';
$route['cashier/coupon']    = 'cashier/Cashier/couponlist';

$route['cashier/testecommerceplugin']   = 'cashier/Cashier/testecommerceplugin';
$route['cashier/POSterminalCheckout']   = 'cashier/Cashier/POSterminalCheckout';
$route['cashier/POSterminalCheckoutCard']   = 'cashier/Cashier/POSterminalCheckoutCard';
$route['cashier/POSterminalCheckoutCardAuth']   = 'cashier/Cashier/POSterminalCheckoutCardAuth';
$route['cashier/POSterminalCheckoutCardEBT']   = 'cashier/Cashier/POSterminalCheckoutCardEBT';
$route['cashier/POSterminalInquireCardAmount']   = 'cashier/Cashier/POSterminalInquireCardAmount';
$route['cashier/addmisceleneous_name']  = 'cashier/Cashier/addmisceleneous_name';

$route['cashier/no_sales']   = 'cashier/Cashier/no_sales';

$route['cashier/getcustomerByPhone']    = 'cashier/Cashier/getcustomerByPhone';

$route['cashier/apply_coupon_new']  = 'cashier/Cashier/apply_coupon_new';

// POS Receipt
$route['cashier/pos_rcpt/([a-zA-Z0-9]+)']   = 'cashier/Cashier/pos_rcpt/$1';
$route['cashier/pos_rcpt_view/([a-zA-Z0-9]+)']   = 'cashier/Cashier/pos_rcpt_view/$1';

//clock in-out
$route['cashier/employee_login']    = 'cashier/Cashier/employee_login';
$route['cashier/createcoupon']  = 'cashier/Cashier/insertcoupon';
$route['cashier/createpromotion']   = 'cashier/Cashier/insertpromotion';
$route['cashier/add_coupon']    = 'cashier/Cashier/add_coupon';
$route['cashier/add_promotion']     = 'cashier/Cashier/add_promotion';
$route['cashier/edit_promotion'] = 'cashier/Cashier/edit_promotion';
$route['cashier/update_promotion'] = 'cashier/Cashier/update_promotion';
$route['cashier/edit_coupon']   = 'cashier/Cashier/edit_coupon';
$route['cashier/update_coupon'] = 'cashier/Cashier/update_coupon';
$route['cashier/save_order']     = 'cashier/Cashier/save_order';
$route['cashier/promotion'] = 'cashier/Cashier/promotionlist';

//customers
$route['customer'] = 'customers/Customers';
$route['customer/update_customer'] = 'customers/Customers/update_customer/$1';
$route['customers/customer_test1'] = 'customers/customers/customer_test1';

$route['cashier/shift_terminal'] = 'cashier/Cashier/shift_terminal';

// store settings
$route['cashier/settings']  = 'cashier/Cashier/store_settings';
$route['cashier/insert_user']   = 'cashier/Cashier/insert_user';
$route['cashier/update_user']   = 'cashier/Cashier/update_user';
$route['cashier/delete_user']   = 'cashier/Cashier/delete_user';
$route['cashier/updateTax']     = 'cashier/Cashier/updateTax';
$route['cashier/update_setting']= 'cashier/Cashier/update_setting';
$route['cashier/update_cashRegister'] = 'cashier/Cashier/update_cashRegister';
$route['cashier/update_bins'] = 'cashier/Cashier/update_bins';
$route['cashier/update_point'] = 'cashier/Cashier/update_point';
$route['cashier/update_card_transaction'] = 'cashier/Cashier/update_card_transaction';
$route['cashier/update_date_setting'] = 'cashier/Cashier/update_date_setting';
$route['cashier/change_point_status'] = 'cashier/Cashier/change_point_status';
$route['cashier/update_mail_settings'] = 'cashier/Cashier/update_mail_settings';
$route['cashier/get_miscellaneous_product_by_id'] = 'cashier/Cashier/get_miscellaneous_product_by_id';
$route['cashier/update_miscellaneous'] = 'cashier/Cashier/update_miscellaneous';
$route['cashier/delete_miscellaneous_product'] = 'cashier/Cashier/delete_miscellaneous_product';
$route['cashier/add_miscellaneous'] = 'cashier/Cashier/add_miscellaneous';
$route['cashier/store_notifiction']  = 'cashier/Cashier/store_notifiction';

//FRONT LOGIN
$route['cashier/front_login']   = 'cashier/Cashier/front_login';
$route['cashier/pos_clockout']  = 'cashier/Cashier/pos_clockout';



// FRONT RECALL ORDER
$route['cashier/get_recall_order']  = 'cashier/Cashier/get_recall_order';
$route['cashier/get_recall_order_detail']   = 'cashier/Cashier/get_recall_order_detail';
$route['cashier/order_recall_cart']     = 'cashier/Cashier/order_recall_cart';
$route['cashier/remove_recall_order']   = 'cashier/Cashier/remove_recall_order';

// FRONT REFUND ORDER
$route['cashier/get_refund_order']  = 'cashier/Cashier/get_refund_order';
$route['cashier/get_refund_order_detail']   = 'cashier/Cashier/get_refund_order_detail';
$route['cashier/complete_refund_order']     = 'cashier/Cashier/complete_refund_order';
$route['cashier/get_refund_order_using_barcode']    = 'cashier/Cashier/get_refund_order_using_barcode';
$route['cashier/get_refund_order_previous_transaction']     = 'cashier/Cashier/get_refund_order_previous_transaction';

//leave approval
$route['cashier/leaves']    = 'cashier/Cashier/leave_approval';
$route['cashier/cashAdv']   = 'cashier/Cashier/cash_approval';

$route['cashier/userPerm']  = 'cashier/Cashier/userPermission';

//customer
$route['cashier/create_customer'] = 'cashier/Cashier/create_customer';
$route['cashier/insert_customer'] = 'cashier/Cashier/insert_customer';
$route['cashier/edit_customer'] = 'cashier/Cashier/edit_customer';
$route['cashier/update_customer'] = 'cashier/Cashier/update_customer';
$route['cashier/delete_customer'] = 'cashier/Cashier/delete_customer';


// Scratcher Inventory
$route['cashier/scratcher_inventory']   = 'cashier/Cashier/scratcher_inventory_list';
$route['cashier/scratcher_inventory_data_list']     = 'cashier/Cashier/scratcher_inventory_data_list';
$route['cashier/scratcher_inventory_edit'] = 'cashier/Cashier/scratcher_inventory_edit';
$route['cashier/scratcher_inventory_add']   = 'cashier/Cashier/scratcher_inventory_add';
$route['cashier/scratcher_inventory_insert_product'] = 'cashier/Cashier/scratcher_inventory_insert_product';
$route['cashier/scratcher_inventory_update_product'] = 'cashier/Cashier/scratcher_inventory_update_product';
$route['cashier/scratcher_inventory_delete_product'] = 'cashier/Cashier/scratcher_inventory_delete_product';
$route['cashier/activate_scratcher'] = 'cashier/Cashier/activate_scratcher';
$route['cashier/scratcherArchive'] = 'cashier/Cashier/scratcherArchive';
$route['cashier/change_scratcher_status'] = 'cashier/Cashier/change_scratcher_status';

$route['cashier/get_all_supplier'] = 'cashier/Cashier/get_all_supplier';
$route['cashier/update_onchange_supplier'] = 'cashier/Cashier/update_onchange_supplier';

//PRODUCT UPC - Print Labels

$route['cashier/print_product_UPC']     = 'cashier/Cashier/print_product_UPC';
$route['cashier/print_labels']  = 'cashier/Cashier/print_labels';

$route['cashier/generateBarcode_reciept']   = 'cashier/Cashier/generateBarcode_reciept';
$route['cashier/get_leaverequests_by_type']     = 'cashier/Cashier/get_leaverequests_by_type';
$route['cashier/get_cashadv_by_type']   = 'cashier/Cashier/get_cashadv_by_type';
$route['cashier/get_leaverequests_in_dates']    = 'cashier/Cashier/get_leaverequests_in_dates';
$route['cashier/get_cashrequests_in_dates']     = 'cashier/Cashier/get_cashrequests_in_dates';


// Reports
$route['cashier/reports']   = 'cashier/Cashier/reports';
$route['cashier/reports/payout_reports_go']  = 'cashier/Cashier/payout_reports_go';
$route['cashier/reports/card_transaction_go']  = 'cashier/Cashier/card_transaction_go';
$route['cashier/reports/shift_report_go']  = 'cashier/Cashier/shift_report_go';
$route['cashier/reports/audit_log_report_go']  = 'cashier/Cashier/audit_log_report_go';
$route['cashier/reports/scratcher_inventory_summary_go']  = 'cashier/Cashier/scratcher_inventory_summary_go';
$route['cashier/reports/inventory_report_go']  = 'cashier/Cashier/inventory_report_go';
$route['cashier/reports/sendemail']  = 'cashier/Cashier/sendemail';
$route['cashier/reports/shift_report_export_email']  = 'cashier/Cashier/shift_report_export_email';

$route['cashier/reports/top_selling_items']  = 'cashier/Cashier/top_selling_items';
$route['cashier/reports/shift_report']  = 'cashier/Cashier/shift_report';
$route['cashier/reports_details/(:any)/(:any)(/:any)?(/:any)?(/:any)?']  = 'cashier/Cashier/reports_details';
$route['cashier/kpi_price_override_detail/(:any)(/:any)?(/:any)?']  = 'cashier/Cashier/kpi_price_override_detail';
$route['cashier/kpi_detail_void_no_sale/(:any)(/:any)?(/:any)?(/:any)?']  = 'cashier/Cashier/kpi_detail_void_no_sale';
$route['cashier/kpi_detail_open_close_bal(/:any)?(/:any)?']  = 'cashier/Cashier/kpi_detail_open_close_bal';
$route['cashier/kpi_detail_cash_drops(/:any)?(/:any)?']  = 'cashier/Cashier/kpi_detail_cash_drops';

$route['cashier/sm_reports_details(/:any)?(/:any)?(/:any)?(/:any)?']  = 'cashier/Cashier/sm_reports_details';
$route['cashier/payout_reports_details(/:any)?(/:any)?(/:any)?(/:any)?']  = 'cashier/Cashier/payout_reports_details';
$route['cashier/reports/sales_report']  = 'cashier/Cashier/sales_report';
$route['cashier/reports/sales_report_daily_breakdown']  = 'cashier/Cashier/sales_report_daily_breakdown';
$route['cashier/ssreports/(:any)(/:any)?(/:any)?']    = 'cashier/Cashier/ssreportsdata/$1';
$route['cashier/reports/(:any)(/:any)?(/:any)?']    = 'cashier/Cashier/reportsdata/$1';
$route['cashier/cbdreports/(:any)(/:any)?(/:any)?']    = 'cashier/Cashier/cbdreports/$1';

$route['cashier/chartajax/sales_margin/(:any)']    = 'cashier/Cashier/reportsajaxdata/$1';
$route['cashier/reconciliation_report_ajax']    = 'cashier/Cashier/reconciliation_report_ajax';
$route['cashier/timesheet_report_ajax']    = 'cashier/Cashier/timesheet_report_ajax';
$route['cashier/report_scheduler_ajax']    = 'cashier/Cashier/report_scheduler_ajax';
$route['cashier/copy_report_scheduler_ajax']    = 'cashier/Cashier/copy_report_scheduler_ajax';
$route['cashier/set_shift_schedule']  = 'cashier/Cashier/set_shift_schedule';
$route['cashier/overview_report_ajax']    = 'cashier/Cashier/overview_report_ajax';
$route['cashier/overview_report_load']    = 'cashier/Cashier/overview_report_load';


// report menu actions
$route['cashier/shift_reports_ajax']    = 'cashier/Cashier/shift_reports_ajax/$1';
$route['cashier/sales_report_ajax']    = 'cashier/Cashier/sales_report_ajax/$1';
$route['cashier/recon_report_ajax']    = 'cashier/Cashier/recon_report_ajax/$1';
$route['cashier/pay_report_ajax']    = 'cashier/Cashier/pay_report_ajax/$1';
$route['cashier/timesheet_report_menu_ajax']    = 'cashier/Cashier/timesheet_report_menu_ajax/$1';
$route['cashier/card_transaction_report_ajax']    = 'cashier/Cashier/card_transaction_report_ajax/$1';
$route['cashier/audit_log_report_ajax']    = 'cashier/Cashier/audit_log_report_ajax/$1';
$route['cashier/scartch_summary_report_ajax']    = 'cashier/Cashier/scartch_summary_report_ajax/$1';
$route['cashier/inventory_report_ajax']    = 'cashier/Cashier/inventory_report_ajax/$1';

$route['cashier/get_user_notification_count_ajax']    = 'cashier/Cashier/get_user_notification_count_ajax';

//Roles
$route['cashier/add_role']  = 'cashier/Cashier/addRole';
$route['cashier/update_role']   = 'cashier/Cashier/updateRole';
$route['cashier/delete_role']   = 'cashier/Cashier/deleteRole';

$route['cashier/couponArchive'] = 'cashier/Cashier/coupon_archive';
$route['cashier/promotionArchive'] = 'cashier/Cashier/promotion_archive';

$route['cashier/expire_scratcher'] = 'cashier/Cashier/expire_scratcher';

//notification
$route['cashier/user_notification'] = 'cashier/Cashier/user_notification';
$route['cashier/all_notification'] = 'cashier/Cashier/all_notification';


/* clover payment - ravi - 9-9-2021 */

$route['clover'] = 'clover/Clover';
