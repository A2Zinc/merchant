<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<div class="container-fluid mt20">
  <?php
  //echo 'Session Module Id :</br>' ;
  // print_r($this->session->userdata('module_id'));
  //echo '</br>Session Module data :</br>' ; 
  //print_r($this->session->userdata('module_data')); 
  ?>
  <div class="row">
    <div class="col-md-6"><h3>Dashboard: Merchant(report of all stores)</h3></div>
  </div>
  <div class="row">

    <div class="col-md-4">
      <div class="widgetcard">
        <div class="todaysale">

          <svg width="40" height="50" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M21.7188 11.6875C21.1665 11.6875 20.7188 12.1352 20.7188 12.6875V13.8125C20.7188 13.9534 20.6628 14.0885 20.5632 14.1882C20.4635 14.2878 20.3284 14.3438 20.1875 14.3438C20.0466 14.3438 19.9115 14.2878 19.8119 14.1882C19.7122 14.0885 19.6563 13.9534 19.6563 13.8125V12.6875C19.6563 12.1352 19.2085 11.6875 18.6563 11.6875H15.3438C14.7915 11.6875 14.3438 12.1352 14.3438 12.6875V13.8125C14.3438 13.9534 14.2878 14.0885 14.1882 14.1882C14.0885 14.2878 13.9534 14.3438 13.8125 14.3438C13.6716 14.3438 13.5365 14.2878 13.4369 14.1882C13.3372 14.0885 13.2813 13.9534 13.2813 13.8125V12.6875C13.2813 12.1352 12.8335 11.6875 12.2813 11.6875H11.4908C10.974 11.6875 10.5423 12.0813 10.495 12.596L9.11632 27.596C9.06246 28.1819 9.52369 28.6875 10.1121 28.6875H23.8277C24.4147 28.6875 24.8754 28.1843 24.8238 27.5996L23.5003 12.5996C23.4548 12.0834 23.0224 11.6875 22.5042 11.6875H21.7188ZM13.8125 16.4688C13.7074 16.4688 13.6047 16.4376 13.5174 16.3792C13.43 16.3208 13.3619 16.2379 13.3217 16.1408C13.2815 16.0437 13.271 15.9369 13.2915 15.8339C13.312 15.7308 13.3626 15.6361 13.4369 15.5618C13.5112 15.4876 13.6058 15.437 13.7089 15.4165C13.8119 15.396 13.9187 15.4065 14.0158 15.4467C14.1129 15.4869 14.1959 15.555 14.2542 15.6424C14.3126 15.7297 14.3438 15.8324 14.3438 15.9375C14.3438 16.0784 14.2878 16.2135 14.1882 16.3132C14.0885 16.4128 13.9534 16.4688 13.8125 16.4688ZM20.1875 16.4688C20.0824 16.4688 19.9797 16.4376 19.8924 16.3792C19.805 16.3208 19.7369 16.2379 19.6967 16.1408C19.6565 16.0437 19.646 15.9369 19.6665 15.8339C19.687 15.7308 19.7376 15.6361 19.8119 15.5618C19.8862 15.4876 19.9808 15.437 20.0839 15.4165C20.1869 15.396 20.2937 15.4065 20.3908 15.4467C20.4879 15.4869 20.5709 15.555 20.6292 15.6424C20.6876 15.7297 20.7188 15.8324 20.7188 15.9375C20.7188 16.0784 20.6628 16.2135 20.5632 16.3132C20.4635 16.4128 20.3284 16.4688 20.1875 16.4688ZM19.6563 9.03125C19.6563 8.32677 19.3764 7.65114 18.8783 7.153C18.3801 6.65485 17.7045 6.375 17 6.375C16.2955 6.375 15.6199 6.65485 15.1218 7.153C14.6236 7.65114 14.3438 8.32677 14.3438 9.03125V10.0938C14.3438 10.3872 14.1059 10.625 13.8125 10.625C13.5191 10.625 13.2813 10.3872 13.2813 10.0938V9.03125C13.2813 8.04498 13.6731 7.0991 14.3705 6.4017C15.0679 5.7043 16.0137 5.3125 17 5.3125C17.9863 5.3125 18.9322 5.7043 19.6296 6.4017C20.327 7.0991 20.7188 8.04498 20.7188 9.03125V10.0938C20.7188 10.3872 20.4809 10.625 20.1875 10.625C19.8941 10.625 19.6563 10.3872 19.6563 10.0938V9.03125Z" fill="#0054FE" />
          </svg>

        </div>
        <div class="widgettext">
          <h4>$<?php echo number_format($grand_total_sales,2) ?></h4>
          <p>Total Sales</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="widgetcard">
        <div class="todaytotal">


          <svg width="40" height="50" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M28.1562 12.75V13.8125C28.1562 13.9534 28.1003 14.0885 28.0007 14.1882C27.901 14.2878 27.7659 14.3438 27.625 14.3438C27.4841 14.3438 27.349 14.2878 27.2493 14.1882C27.1497 14.0885 27.0938 13.9534 27.0938 13.8125V12.75H24.5801L25.7052 25.5H31.8101L30.339 12.75H28.1562ZM27.625 16.4688C27.5199 16.4688 27.4172 16.4376 27.3299 16.3792C27.2425 16.3208 27.1744 16.2379 27.1342 16.1408C27.094 16.0437 27.0835 15.9369 27.104 15.8339C27.1245 15.7308 27.1751 15.6361 27.2493 15.5618C27.3236 15.4876 27.4183 15.437 27.5214 15.4165C27.6244 15.396 27.7312 15.4065 27.8283 15.4467C27.9254 15.4869 28.0083 15.555 28.0667 15.6424C28.1251 15.7297 28.1562 15.8324 28.1562 15.9375C28.1562 16.0784 28.1003 16.2135 28.0007 16.3132C27.901 16.4128 27.7659 16.4688 27.625 16.4688ZM20.7188 11.6875V13.8125C20.7188 13.9534 20.6628 14.0885 20.5632 14.1882C20.4635 14.2878 20.3284 14.3438 20.1875 14.3438C20.0466 14.3438 19.9115 14.2878 19.8118 14.1882C19.7122 14.0885 19.6562 13.9534 19.6562 13.8125V11.6875H14.3438V13.8125C14.3438 13.9534 14.2878 14.0885 14.1882 14.1882C14.0885 14.2878 13.9534 14.3438 13.8125 14.3438C13.6716 14.3438 13.5365 14.2878 13.4368 14.1882C13.3372 14.0885 13.2812 13.9534 13.2812 13.8125V11.6875H10.5785L9.01598 28.6875H24.9198L23.4198 11.6875H20.7188ZM13.8125 16.4688C13.7074 16.4688 13.6047 16.4376 13.5174 16.3792C13.43 16.3208 13.3619 16.2379 13.3217 16.1408C13.2815 16.0437 13.271 15.9369 13.2915 15.8339C13.312 15.7308 13.3626 15.6361 13.4368 15.5618C13.5111 15.4876 13.6058 15.437 13.7089 15.4165C13.8119 15.396 13.9187 15.4065 14.0158 15.4467C14.1129 15.4869 14.1958 15.555 14.2542 15.6424C14.3126 15.7297 14.3438 15.8324 14.3438 15.9375C14.3438 16.0784 14.2878 16.2135 14.1882 16.3132C14.0885 16.4128 13.9534 16.4688 13.8125 16.4688ZM20.1875 16.4688C20.0824 16.4688 19.9797 16.4376 19.8924 16.3792C19.805 16.3208 19.7369 16.2379 19.6967 16.1408C19.6565 16.0437 19.646 15.9369 19.6665 15.8339C19.687 15.7308 19.7376 15.6361 19.8118 15.5618C19.8861 15.4876 19.9808 15.437 20.0839 15.4165C20.1869 15.396 20.2937 15.4065 20.3908 15.4467C20.4879 15.4869 20.5708 15.555 20.6292 15.6424C20.6876 15.7297 20.7188 15.8324 20.7188 15.9375C20.7188 16.0784 20.6628 16.2135 20.5632 16.3132C20.4635 16.4128 20.3284 16.4688 20.1875 16.4688ZM6.90625 12.75V13.8125C6.90625 13.9534 6.85028 14.0885 6.75065 14.1882C6.65102 14.2878 6.5159 14.3438 6.375 14.3438C6.2341 14.3438 6.09898 14.2878 5.99935 14.1882C5.89972 14.0885 5.84375 13.9534 5.84375 13.8125V12.75H3.66098L2.18988 25.5H8.24188L9.41375 12.75H6.90625ZM6.375 16.4688C6.26993 16.4688 6.16722 16.4376 6.07985 16.3792C5.99249 16.3208 5.9244 16.2379 5.88419 16.1408C5.84398 16.0437 5.83346 15.9369 5.85396 15.8339C5.87446 15.7308 5.92505 15.6361 5.99935 15.5618C6.07365 15.4876 6.16831 15.437 6.27136 15.4165C6.37441 15.396 6.48123 15.4065 6.5783 15.4467C6.67537 15.4869 6.75834 15.555 6.81672 15.6424C6.87509 15.7297 6.90625 15.8324 6.90625 15.9375C6.90625 16.0784 6.85028 16.2135 6.75065 16.3132C6.65102 16.4128 6.5159 16.4688 6.375 16.4688ZM11.1562 10.625C11.1562 10.0614 10.9324 9.52091 10.5339 9.1224C10.1353 8.72388 9.59484 8.5 9.03125 8.5C8.46767 8.5 7.92716 8.72388 7.52865 9.1224C7.13013 9.52091 6.90625 10.0614 6.90625 10.625V11.6875H5.84375V10.625C5.84375 9.77962 6.17958 8.96887 6.77735 8.3711C7.37512 7.77332 8.18587 7.4375 9.03125 7.4375C9.87663 7.4375 10.6874 7.77332 11.2852 8.3711C11.8829 8.96887 12.2188 9.77962 12.2188 10.625H11.1562ZM24.9688 8.5C24.4054 8.50063 23.8652 8.72472 23.4668 9.1231C23.0685 9.52147 22.8444 10.0616 22.8438 10.625H21.7812C21.7812 9.77962 22.1171 8.96887 22.7148 8.3711C23.3126 7.77332 24.1234 7.4375 24.9688 7.4375C25.8141 7.4375 26.6249 7.77332 27.2227 8.3711C27.8204 8.96887 28.1562 9.77962 28.1562 10.625V11.6875H27.0938V10.625C27.0931 10.0616 26.869 9.52147 26.4707 9.1231C26.0723 8.72472 25.5321 8.50063 24.9688 8.5ZM19.6562 9.03125C19.6562 8.32677 19.3764 7.65114 18.8783 7.153C18.3801 6.65485 17.7045 6.375 17 6.375C16.2955 6.375 15.6199 6.65485 15.1217 7.153C14.6236 7.65114 14.3438 8.32677 14.3438 9.03125V10.625H13.2812V9.03125C13.2812 8.04498 13.673 7.0991 14.3704 6.4017C15.0678 5.7043 16.0137 5.3125 17 5.3125C17.9863 5.3125 18.9322 5.7043 19.6296 6.4017C20.327 7.0991 20.7188 8.04498 20.7188 9.03125V10.625H19.6562V9.03125Z" fill="#4AB8FF" />
          </svg>


        </div>
        <div class="widgettext">
          <h4>$<?php echo $sales_amount ?></h4>
          <p>Today's Sales</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="widgetcard">
        <div class="totalemployee">

          <svg width="40" height="50" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12.7488 15.2524L9.37526 12.7535C10.4998 11.8789 11.2495 10.6294 11.2495 9.13007V8.1305C11.2495 5.75651 9.5002 3.63242 7.12622 3.50748C4.62729 3.38253 2.5032 5.38167 2.5032 7.8806V9.13007C2.5032 10.6294 3.25288 11.8789 4.3774 12.7535L1.00384 15.3774C0.379112 15.8772 0.00427246 16.6269 0.00427246 17.3765V19.7505C0.00427246 20.5002 0.504058 21 1.25374 21H12.4989C13.2486 21 13.7484 20.5002 13.7484 19.7505V17.2516C13.7484 16.5019 13.3735 15.7522 12.7488 15.2524Z" fill="#FDCC0C" />
            <path d="M18.8711 9.00514L16.6221 7.50579C17.1219 7.006 17.4967 6.25632 17.4967 5.3817V4.25718C17.4967 2.75782 16.3722 1.25846 14.8728 1.00857C13.3735 0.758678 12.124 1.6333 11.4993 2.75782C12.8737 4.00729 13.7483 5.75654 13.7483 7.75568V9.00514C13.7483 10.1297 13.4984 11.2542 12.9986 12.1288C12.9986 12.1288 14.498 13.2533 14.498 13.3783H18.7462C19.4958 13.3783 19.9956 12.8785 19.9956 12.1288V11.1292C19.9956 10.2546 19.6208 9.50493 18.8711 9.00514Z" fill="#FDCC0C" />
          </svg>

        </div>
        <div class="widgettext">
          <h4><?php echo $total_product ?></h4>
          <p>Total Products</p>
        </div>
      </div>
    </div>


  </div>
</div>
<!-- widget con -->
<div class="container-fluid mt20">
  <div class="row">
    <?php /* <div class="col-md-6">
      <div class="tablecard">
        <div class="table-card-header d-flex d-inline-block justify-content-between">
          <p>Sales Current Financial Year</p>
          <div class="filter">
            <button type="button" id='render-chart-btn' class="btn btn-outline-dark btn-sm m-0 customfootercancelbtn">Filter</button>

          </div>
        </div>
        <div class="lineChartTableForm">
          <div class="container m-0 p-0">
            <div class="d-flex justify-content-between align-items-center w-50 mx-auto mb-2">
              <label>Filter By Range</label>
              <!-- <input type="checkbox" checked data-toggle="toggle" data-style="ios"> -->
              <label class="switch"><input type="checkbox" />
                <div></div>
              </label>
              <label>Filter By Date</label>
            </div>
            <div class="row border-between  m-0 p-0">

              <div class="col-md-6 tableformpadding">
                <p class="lightText">Current Year</p>
                <label for="StartDateF" class="startD">Start Date *</label>
                <input value="" type="date" class="form-control">
                <label for="StartDateF" class="startD">End Date *</label>
                <input value="" type="date" class="form-control">
              </div>
              <div class="col-md-6 tableformpadding">
                <p class="lightText">Comparison Year</p>
                <label for="StartDateF" class="startD">Start Date *</label>
                <input value="" type="date" class="form-control">
                <label for="StartDateF" class="startD">End Date *</label>
                <input value="" type="date" class="form-control">
              </div>
              <div style="text-align: center; margin: 3% auto;margin-bottom: 0;">
                <a href="http://3.129.61.135/POS_system/project/User/manage_user" class="btn btn-outline-dark btn-sm customfootercancelbtn tableFC">cancel</a>
                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm tableFC" id="btnSave">Save</button>
              </div>
            </div>
          </div>

        </div>
        <div id='yearchart'></div>
        <div id='monthchart'></div>
        <div id='weekchart'></div>
        <div id='dailychart'></div>





      </div>

    </div> */ ?>
    <div class="col-md-6">
      <div class="tablecard table-height ">
        <!-- <p>Product Stock Alert</p> -->
        <div class="table-card-header d-flex d-inline-block justify-content-between">
          <p>User Attendence(last day)</p>
        </div>
        <div id="my_dataviz" style="position:relative;width:90%;margin:0 auto;">

        </div>

        <div class="scroll">

          <table class="table table-striped">
            <thead>
              <tr>

                <th scope="col">User ID</th>
                <th scope="col">User Name</th>
                <th scope="col">Hours</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($user_report as $skey => $svalue) {
              ?>
              <tr>
                <td><?php echo $svalue['username'] ?></td>
                <td><?php echo $svalue['current_user_name'] ?></td>
                <td><?php echo isset($svalue['daily_hours']) && $svalue['daily_hours']!=0?$svalue['daily_hours']:"Absent" ?></td>
              </tr>
            
              <?php } ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="tablecard table-height ">
        <!-- <p>Product Stock Alert</p> -->
        <div class="table-card-header d-flex d-inline-block justify-content-between">
          <p>Terminals</p>
          
        </div>
        

        <div class="scroll">

          <table class="table table-striped">
            <thead>
              <tr>

                <th scope="col">Terminal ID</th>
                <th scope="col">Mac Address</th>
                <th scope="col">Status</th>
                <th scope="col">Current User</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($terminals as $skey => $svalue) {
              ?>
              <tr>
                <td><?php echo $svalue['terminal_id'] ?></td>
                <td><?php echo $svalue['mac_address'] ?></td>
                <td><?php echo isset($svalue['active']) && $svalue['active']==1?"Active":"Inactive" ?></td>
                <td><?php echo $svalue['current_user_name'] ?></td>
              </tr>
            
              <?php } ?>
              
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- graph con -->
<div class=" container-fluid mt20">
  <div class="row">
    <div class="col-md-9">
      <div class="tablecard">
        <p>Recent Orders</p>
        <div class="scroll">

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">INV#</th>
                <th scope="col">Shift</th>
                <th scope="col">Terminal</th>
                <th scope="col">Date</th>
                <th scope="col">Ammount</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <!-- <th scope="row"></th> -->
                <?php foreach ($last_sales as $skey => $svalue) {
              ?>
              <tr>
                <td><?php echo $svalue['order_id'] ?></td>
                <td>Shift: <?php echo $svalue['shift_no'] ?></td>
                <td><?php echo $svalue['terminal'] ?></td>
                <td><?php echo date('m-d-Y',strtotime($svalue['order_date'])) ?></td>
                <td><?php echo $svalue['total_amount'] ?></td>
                <td><button data-toggle="modal" data-target="#exampleModalCenter<?php echo $svalue['order_id'] ?>" type="button" class="btn btn-outline-dark alluserbtn">View
                    <svg class="eye" width="22" height="16" viewBox="0 0 22 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                    </svg>
                  </button></td>
              </tr>
            
              <?php } ?>
              </tr>


            </tbody>
          </table>

          <!-- Modal -->
          <?php foreach ($last_sales as $skey => $svalue) { 
              
            ?>
          <!-- Modal -->
          <div class="modal fade" id="exampleModalCenter<?php echo $svalue['order_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header custommodalheader">
                  <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle mlauto">Sales Details</h5>
                </div>
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="df">
                          <div>
                            <h1 class="vname">INV# (POS-<?php  echo $svalue['order_id'] ?>)</h1>
                            <p class="vc">Contact Name & Add: <span>KANE
                                SKAIKRU</span>
                            </p>
                            <p class="vc">221 B, Baker Steet, London,
                              GHB1 67N
                            </p>
                            <p class="vc">Phone Number: <span>+1 987 679
                                0533</span> </p>
                          </div>
                          <div class="ml-auto mt-5">
                            <div>
                              <p class="vc"> Date: <span><?php echo date('d M,Y',strtotime($svalue['order_date'])) ?></span> </p>
                              <p class="vc"> Status: <span class="badge greenbadge">Paid</span> </p>
                            </div>


                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="row mt-4">
                      <div class="col-md-12">
                        <div class="table-responsive">
                          <table class="table table-striped table-sm">
                            <thead>
                              <tr>
                                <th>#
                                </th>
                                <th>Product Name </th>
                                <th>Qty
                                </th>
                                <th>Unit Price
                                </th>
                                <th>Total

                                </th>


                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($svalue['order_details'] as $odkey => $odvalue) { ?>
                              <tr>
                                <!-- <th scope="row"></th> -->
                                <td><?php echo $odvalue['order_details_id'] ?></td>
                                <td><?php echo $odvalue['product_name'] ?></td>
                                <td><?php echo $odvalue['quantity'] ?></td>
                                <td>$ <?php echo $odvalue['rate'] ?></td>
                                <td>$ <?php echo $odvalue['total_price'] ?></td>
                              </tr>

                              <?php } ?>

                              <!-- tr -->




                            </tbody>
                          </table>
                        </div>
                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-6">
                        <p class="vc mt-4  ">Payment Information </p>
                        <div class="df selldiv">
                          <p class="pc">Paid via cash</p>
                          <p class="pm ml-auto">$ <?php echo $svalue['total_amount'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <div style="text-align: center;">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                    <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Print</button>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="tablecard">
        <p>Best Selling Product</p>
        <div class="scroll">
          <form >
            <select class='form-control period_type'>
              <option value="" >Over all</option>
              <option value="1" >Last Month</option>
              <option value="3">Last 3 Months</option>
              <option value="6">last 6 Months</option>
              <option value="12">last 12 Months</option>
            </select>
          </form>

          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Saled Count</th>

              </tr>
            </thead>
            <tbody  class="bsp">
               <?php foreach ($best_selling_products as $skey => $svalue) {
              ?>
              <tr>
                <td><?php echo $svalue['product_name'] ?></td>
                <td><?php echo $svalue['sale_count'] ?></td>
              </tr>
            
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<style>
  .r>ul {
    list-style: none;
  }

  .r>ul li span::before {
    content: "\2022";
    color: red;
    font-weight: bold;
    display: inline-block;
    width: 1em;
    margin-left: -1em;

  }
</style>
<script src="https://d3js.org/d3.v4.js"></script>
<script>
 $(document).ready(function(){
    $('.period_type').change(function(){
      $.ajax({
        type: "POST",
        url: '<?= base_url("Admin_dashboard/best_selling_product") ?>',
        data: {
            period: $(this).val(),
        },
        success: function(data) {
          $('.bsp').html(data);
        }
      })
  })
 })
  // set the dimensions and margins of the graph
  var width = 250
  height = 250
  margin = 50

  // The radius of the pieplot is half the width or half the height (smallest one). I subtract a bit of margin.
  var radius = Math.min(width, height) / 2 - margin

  // append the svg object to the div called 'my_dataviz'
  var svg = d3.select("#my_dataviz")
    .append("svg")
    .attr("width", width)
    .attr("height", height)
    .append("g")
    .attr("transform", "translate(" + width / 2 + "," + height / 2 + ")")



  // Create dummy data
  var data = {
    a: 9,
    b: 20,
    c: 30,
    d: 8,
    e: 12
  }

  // set the color scale
  var color = d3.scaleOrdinal()
    .domain(data)
    .range(["red", "red", "red", "red", "red"])

  // Compute the position of each group on the pie:
  var pie = d3.pie()
    .value(function(d) {
      return d.value;
    })
  var data_ready = pie(d3.entries(data))
  var array = Object.keys(data_ready).map((key) => data_ready[key].value);
  var arrayMax = Math.max(...array);
  var arrayMin = Math.min(...array);
  array = array.sort(function(a, b) {
    return a - b;
  });
  array = array.reverse()
  console.log(array)
  let minMax = array.reduce((previous, current) => {
    console.log(current, current / (arrayMax))
  }, )
  // Build the pie chart: Basically, each part of the pie is a path that we build using the arc function.

  svg
    .selectAll('whatever')
    .data(data_ready)
    .enter()
    .append('path')
    .attr('d', d3.arc()
      .innerRadius(radius) // This is the size of the donut hole
      .outerRadius(function(d, i) {
        console.table(d3.format(".2f")(d.value / 69) * 100, data_ready[i].value, 'radius is ', radius);
        return d3.format(".2f")(d.value / 69) * 100 + radius
      })
    )
    .attr('fill', function(d) {
      return ("red")
    })
    .attr("stroke", "black")
    .style("stroke-width", "0px")
    .style("opacity", function(d) {
      return d.value / (arrayMax)
    })
  d3.select("#my_dataviz svg").append('text')
    .attr("x", "50%")
    .attr("y", "50%")
    .attr("dominant-baseline", "middle")
    .attr("text-anchor", "middle")
    .text("Value")
    .attr("font-family", "sans-serif")
    .attr("font-size", "20px")
    .attr("fill", "black")
    .attr("font-weight", "700");

  svg
    .selectAll('whatever')
    .data(data_ready)
    .enter()
    .append('path')
    .attr('d', d3.arc()
      .innerRadius(radius - 5) // This is the size of the donut hole
      .outerRadius(radius - 5)
    )
    // <text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle">TEXT</text>
    .attr('fill', function(d) {
      return ("red")
    })
    .attr("stroke", "red")
    .style("stroke-width", "1px")
    .style("opacity", 1)
</script>