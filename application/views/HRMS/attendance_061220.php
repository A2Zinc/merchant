            <div class="container-fluid mt20">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <ul class="nav nav-pills" role="tablist">
                                <li class="nav-item width25">
                                    <a class="nav-link active" data-toggle="pill" href="#All">All Attendance</a>
                                </li>
                                <li class="nav-item width25">
                                    <a class="nav-link" data-toggle="pill" href="#Shifts">Shifts</a>
                                </li>
                                <li class="nav-item width25 ">
                                    <a class="nav-link" data-toggle="pill" href="#AttendanceShift">Attendance by
                                        Shift</a>
                                </li>
                                <li class="nav-item width25">
                                    <a class="nav-link" data-toggle="pill" href="#Attendancebydate">Attendance by Date</a>
                                </li>
                            </ul>



                        </div>
                    </div>
                </div>
                <!-- pill -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="customcard">
                            <div>
                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <div id="All" class="container tab-pane active" style="height: 400px;"><br>
                                        <div class="usercardheader">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-10"><div id="message"></div> </div>
                                                        <a href="<?=base_url('Hrms/add_attendance')?>"> <button 
                                                            type="button"
                                                            class="btn btn-outline-dark alluserbtn adduserbtn  atbtn" style="    position: initial">Add
                                                            Attendance

                                                            <svg class="add" width="22" height="16" viewBox="0 0 21 21"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                                            </svg>

                                                        </button></a>
                                                    
                                        </div>

                                        <div class="customcardbody ">

                                            <div class="row search">
                                                
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="black" for="email">Employee Name:</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="Enter name" id="empname" name="empname">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="black" for="email">From Date:</label>
                                                        <input name="fromdate" value=""
                                                            type="date" class="form-control" placeholder="Enter from"
                                                            id="fromdate">
                                                          
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="black" for="email">To Date</label>
                                                       
                                                            <input name="todate" value=""
                                                            type="date" class="form-control" placeholder="Enter from"
                                                            id="todate">
                                                    </div>
                                                </div>
                                              



                                            </div>
                                            <table class="table table-striped" id="emp_attendace_table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Date</th>
                                                        <th>Employee</th>
                                                        <th>Clock In — Clock Out</th>
                                                        <th>Work Duration</th>

                                                        <th style="text-align: center;" scope="col">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($emp_attendance as $emp) {?>
                                                    <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td><?=date('d/m/Y',strtotime($emp->attendacedate))?></td>
                                                        <td><?=$emp->first_name.' '.$emp->last_name?></td>
                                                        <td><?php 
                                                                   $cintime = explode(',', $emp->clockin);
                                                                   $couttime = explode(',', $emp->clockout);
                                                                   $j=1;
                                                                   $calculatetime=array();
                                                                   $totaltime=0;
                                                                   for($i=0;$i<count($cintime);$i++)
                                                                   {
                                                                    echo $cintime[$i]. '-'.$couttime[$i];
                                                                    $calculatetime[$i]=strtotime($couttime[$i])-strtotime($cintime[$i]);
                                                                    $totaltime+=$calculatetime[$i];
                                                                                                                                       
                                                                    if($j<count($cintime))
                                                                        echo ', ';

                                                                    $j++;
                                                                   }

                                                        ?>
                                                            </td>
                                                        <td><?php 
                                                                    $hours = floor($totaltime / 3600);
                                                                    $mins = floor(($totaltime - ($hours*3600)) / 60);
                                                                    echo $hours.':'.$mins;
                                                                   
                                                                      
                                                                    //echo abs((strtotime($time2[2])-strtotime($time1[1]))/3600); 
                                                         ?> hours</td>

                                                        <td style="text-align: center;">

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
                                                            <button type="button" class="btn btn-outline-dark alluserbtn deleteRecord" data-id="<?php echo $emp->user_id.','.$emp->attendacedate;?>" data-toggle="modal" data-target="#deleteModal">Delete 
                                <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                </svg>
                                </button>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                                                                    </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!-- fsttab -->
                                    <div id="Shifts" class="container tab-pane fade"><br>
                                        <div>
                                            <div class="df">
                                                <div class="marginleftauto">
                                                   <a><button 
                                                        type="button"
                                                        class="btn btn-outline-dark  atanbtn " data-toggle="modal"  data-target="#exampleModalCenter9">Add
                                                        Category

                                                        <svg class="eye" width="22" height="16" viewBox="0 0 21 21"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                                        </svg>

                                                    </button></a>
                                                </div>
                                            </div>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Name</th>
                                                        <th>Shift</th>
                                                        <th>Start time</th>
                                                        <th>End time</th>
                                                        <th>Holiday</th>

                                                        <th style="text-align: center;" scope="col">Action</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td>Evening Shift</td>
                                                        <td>Fixed shift</td>
                                                        <td>09:00</td>
                                                        <td>16:00</td>
                                                        <td>Sunday, Saturday</td>

                                                        <td style="text-align: center;">

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
                                                            <button data-toggle="modal" data-target="#Assign" type="button"
                                                                class="btn btn-outline-dark alluserbtn">Assign Users

                                                                <svg class="pen" width="22" height="16"
                                                                    viewBox="0 0 24 13" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8 5H5V2H3V5H0V7H3V10H5V7H8V5ZM18 6C19.66 6 20.99 4.66 20.99 3C20.99 1.34 19.66 0 18 0C17.68 0 17.37 0.0499999 17.09 0.14C17.66 0.95 17.99 1.93 17.99 3C17.99 4.07 17.65 5.04 17.09 5.86C17.37 5.95 17.68 6 18 6ZM13 6C14.66 6 15.99 4.66 15.99 3C15.99 1.34 14.66 0 13 0C11.34 0 10 1.34 10 3C10 4.66 11.34 6 13 6ZM19.62 8.16C20.45 8.89 21 9.82 21 11V13H24V11C24 9.46 21.63 8.51 19.62 8.16ZM13 8C11 8 7 9 7 11V13H19V11C19 9 15 8 13 8Z" />
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

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td>Evening Shift</td>
                                                        <td>Fixed shift</td>
                                                        <td>09:00</td>
                                                        <td>16:00</td>
                                                        <td>Sunday, Saturday</td>

                                                        <td style="text-align: center;">

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
                                                            <button data-toggle="modal" data-target="#Assign" type="button"
                                                                class="btn btn-outline-dark alluserbtn">Assign Users

                                                                <svg class="pen" width="22" height="16"
                                                                    viewBox="0 0 24 13" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8 5H5V2H3V5H0V7H3V10H5V7H8V5ZM18 6C19.66 6 20.99 4.66 20.99 3C20.99 1.34 19.66 0 18 0C17.68 0 17.37 0.0499999 17.09 0.14C17.66 0.95 17.99 1.93 17.99 3C17.99 4.07 17.65 5.04 17.09 5.86C17.37 5.95 17.68 6 18 6ZM13 6C14.66 6 15.99 4.66 15.99 3C15.99 1.34 14.66 0 13 0C11.34 0 10 1.34 10 3C10 4.66 11.34 6 13 6ZM19.62 8.16C20.45 8.89 21 9.82 21 11V13H24V11C24 9.46 21.63 8.51 19.62 8.16ZM13 8C11 8 7 9 7 11V13H19V11C19 9 15 8 13 8Z" />
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

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td>Evening Shift</td>
                                                        <td>Fixed shift</td>
                                                        <td>09:00</td>
                                                        <td>16:00</td>
                                                        <td>Sunday, Saturday</td>

                                                        <td style="text-align: center;">

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
                                                            <button data-toggle="modal" data-target="#Assign" type="button"
                                                                class="btn btn-outline-dark alluserbtn">Assign Users

                                                                <svg class="pen" width="22" height="16"
                                                                    viewBox="0 0 24 13" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8 5H5V2H3V5H0V7H3V10H5V7H8V5ZM18 6C19.66 6 20.99 4.66 20.99 3C20.99 1.34 19.66 0 18 0C17.68 0 17.37 0.0499999 17.09 0.14C17.66 0.95 17.99 1.93 17.99 3C17.99 4.07 17.65 5.04 17.09 5.86C17.37 5.95 17.68 6 18 6ZM13 6C14.66 6 15.99 4.66 15.99 3C15.99 1.34 14.66 0 13 0C11.34 0 10 1.34 10 3C10 4.66 11.34 6 13 6ZM19.62 8.16C20.45 8.89 21 9.82 21 11V13H24V11C24 9.46 21.63 8.51 19.62 8.16ZM13 8C11 8 7 9 7 11V13H19V11C19 9 15 8 13 8Z" />
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

                                                        </td>
                                                    </tr> <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td>Evening Shift</td>
                                                        <td>Fixed shift</td>
                                                        <td>09:00</td>
                                                        <td>16:00</td>
                                                        <td>Sunday, Saturday</td>

                                                        <td style="text-align: center;">

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
                                                            <button data-toggle="modal" data-target="#Assign" type="button"
                                                                class="btn btn-outline-dark alluserbtn">Assign Users

                                                                <svg class="pen" width="22" height="16"
                                                                    viewBox="0 0 24 13" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path
                                                                        d="M8 5H5V2H3V5H0V7H3V10H5V7H8V5ZM18 6C19.66 6 20.99 4.66 20.99 3C20.99 1.34 19.66 0 18 0C17.68 0 17.37 0.0499999 17.09 0.14C17.66 0.95 17.99 1.93 17.99 3C17.99 4.07 17.65 5.04 17.09 5.86C17.37 5.95 17.68 6 18 6ZM13 6C14.66 6 15.99 4.66 15.99 3C15.99 1.34 14.66 0 13 0C11.34 0 10 1.34 10 3C10 4.66 11.34 6 13 6ZM19.62 8.16C20.45 8.89 21 9.82 21 11V13H24V11C24 9.46 21.63 8.51 19.62 8.16ZM13 8C11 8 7 9 7 11V13H19V11C19 9 15 8 13 8Z" />
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

                                                        </td>
                                                    </tr>
                                                    <!-- tr -->



                                                </tbody>
                                            </table>
       <!-- modal -->

                                            
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div id="AttendanceShift" class="container tab-pane fade"><br>
                                        <div class="customcardbody ">
                                            <div class="row">
                                               

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="black" for="email">End Date:</label>
                                                        <input name="daterange" value="01/01/2018 - 01/15/2018"
                                                            type="email" class="form-control" placeholder="Enter email"
                                                            id="email">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-3 df">
                                                    <div class="marginleftauto">
                                                        <button 
                                                            type="button"
                                                            class="btn btn-outline-dark alluserbtn adduserbtn  atbtn">Add
                                                            Category

                                                            <svg class="add" width="22" height="16" viewBox="0 0 21 21"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                                            </svg>

                                                        </button>
                                                    </div>
                                                </div> -->




                                            </div>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Shift</th>
                                                        <th>Present</th>
                                                        <th>Absent</th>
                                                       

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td>Evinig Shift</td>
                                                        <td>08</td>
                                                        <td>03</td>
                                                        
                                                    </tr>
                                                    <!-- tr -->
                                                    <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td></td>New
                                                        <td>
                                                            <span class="badge name">Asif</span>
                                                            <span class="badge name">Navdeep</span>
                                                            <span class="badge name">Kuldeep</span>
                                                            <span class="badge name">Aman</span>
                                                          
                                                        </td>
                                                        <td>
                                                            <span class="badge name2">Asif</span>
                                                            <span class="badge name2">Navdeep</span>
                                                           
                                                        </td>
                                                        
                                                    </tr>
                                                      <!-- tr -->
                                                      <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td></td>
                                                        <td>
                                                            <span class="badge name3">Asif noor alam</span>
                                                          
                                                          
                                                        </td>
                                                        <td>
                                                            <span class="badge name4">Asif</span>
                                                           
                                                        </td>
                                                        
                                                    </tr>



                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div id="Attendancebydate" class="container tab-pane fade" style="height: 250px;"><br>
                                        <div class="customcardbody ">
                                            <div class="row">
                                               

                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label class="black" for="email">End Date:</label>
                                                        <input name="daterange" value="01/01/2018 - 01/15/2018"
                                                            type="email" class="form-control" placeholder="Enter email"
                                                            id="email">
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-3 df">
                                                    <div class="marginleftauto">
                                                        <button 
                                                            type="button"
                                                            class="btn btn-outline-dark alluserbtn adduserbtn  atbtn">Add
                                                            Category

                                                            <svg class="add" width="22" height="16" viewBox="0 0 21 21"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                                            </svg>

                                                        </button>
                                                    </div>
                                                </div> -->




                                            </div>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Shift</th>
                                                        <th>Present</th>
                                                        <th>Absent</th>
                                                       

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <!-- <th scope="row"></th> -->
                                                        <td>Evinig Shift</td>
                                                        <td>08</td>
                                                        <td>03</td>
                                                        
                                                    </tr>
                                                    <!-- tr -->
                                              
                                                        
                                                    </tr>
                                                      



                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                    <!--  -->
                                    <div id="Date" class="container tab-pane fade"><br>
                                        <h3>Menu 2</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium
                                            doloremque laudantium, totam rem aperiam.</p>
                                    </div>
                                    <!--  -->
                                </div>
                                <!-- tab -->
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!-- tasbs -->






<!-- Modal Assign Users -->
                                            <div class="modal fade" id="Assign" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-lg"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header custommodalheader">
                                                            <h5 class="modal-title custommodaltitle"
                                                                id="exampleModalLongTitle">Assign Users</h5>
                                                
                                                        </div>
                                                        <div class="modal-body modalscroll">
                                                             <div class="container">
                                                                <div class="item-apend mt-4">
                                                                    <div class="row">
                                                                        <div class="col-md-3">
                                                                         <div class="form-group">
                                                                             <label class="customcardlabel" for=""> Name</label>
                                                                             <input type="text" class="form-control " id="empname" aria-describedby="" placeholder="enter the value Employee Name">
                                                                            
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                         <div class="form-group">
                                                                             <label class="customcardlabel" for="">Start Date</label>
                                                                             <input type="date" class="form-control " id="fromdate" aria-describedby="" placeholder="enter the Start Date" name="fromdate">
                                                                             
                                                                           </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label class="customcardlabel" for="">End Date</label>
                                                                                <input type="date" class="form-control " id="todate" aria-describedby="" placeholder="enter the End Date" name="todate">
                                                                                
                                                                              </div>
                                                                           </div>
                                                                        <div class="col-md-3">
                                                                         <button type="button" class="btn btn-light apend_button add_button" href="javascript:void(0);">+</button>
                                                                        </div>
                                                                    </div>
                                                                 </div>
                                                             </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div style="text-align: center;">
                                                                <button type="button" data-dismiss="modal"
                                                                    class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                                                                <button type="button"
                                                                    class="btn btn-primary customcardfooteraddbtn btn-sm">Add</button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>            





                  <!-- Modal -->
                  <div class="modal fade" id="exampleModalCenter9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                      <div class="modal-content">
                        <div class="modal-header custommodalheader">
                          <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Add Shift</h5>
                          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button> -->
                        </div>
                        <div class="modal-body modalscroll">
                          <div class="container">
                            <div class="row">
                              <div class="col-md-12 ">
                                <div class="form-group">
                                  <label class="rolllabel">Name </label>
                                  <input type="email" class="form-control customcardinput" id="" aria-describedby="" placeholder="Shift Name">
                                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                              </div>
                              <div class="col-md-12 ">
                                <div class="form-group">
                                  <label class="rolllabel">Shift</label> </label>
                                  <input type="email" class="form-control customcardinput" id="" aria-describedby="" placeholder="Flexible/Fixed">
                                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                              </div>
                              <div class="col-md-6 ">
                                <div class="form-group">
                                  <label class="rolllabel">Start time</label> </label>
                                  <input type="time" class="form-control customcardinput" id="" aria-describedby="">
                                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                              </div>
                               <div class="col-md-6 ">
                                <div class="form-group">
                                  <label class="rolllabel">End time</label> </label>
                                  <input type="time" class="form-control customcardinput" id="" aria-describedby="">
                                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                              </div>
                              <div class="col-md-12 ">
                                <div class="form-group">
                                  <label class="rolllabel">Holiday</label> </label>
                                  <input type="email" class="form-control customcardinput" id="" aria-describedby="">
                                  <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                                </div>
                              </div>
                         
                            </div>
                          </div>
                 
                              
                        </div>
                        <div class="modal-footer">
                            <div style="text-align: center;">
                                <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
                                <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Submit</button>
                            </div>
                
                        </div>
                      </div>
                    </div>
                  </div>

                                            <!-- modal --> 
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         <form class="delete-Banner" method="post" action="">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <img src="<?=base_url('assets/images/signlogo.png')?> " class="img-fluid image_center">
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="deleteUserId" id="deleteUserId" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <div style="text-align: center;">
                  <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnDelete">Delete</button>
                </div>
    
            </div>
          </form>
        </div>
                                            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
         <form class="delete-Banner" method="post" action="">
            <div class="modal-body modalscroll">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 mt-2 mb-3 ">
                   <img src="<?=base_url('assets/images/signlogo.png')?> " class="img-fluid image_center">
                   <h5 class="text-center">Are you sure to delete this record ?</h5>

                  </div>
                      <input type="hidden" name="deleteUserId" id="deleteUserId" class="form-control">
                </div>
              </div>
            </div>
            <div class="modal-footer">
                <div style="text-align: center;">
                  <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnDelete">Delete</button>
                </div>
    
            </div>
          </form>
        </div> 
<script type="text/javascript">
 
 //$(document).ready(function(){   
     $(document).on('focusout','.form-control',function(){

         
         $.ajax({
                    type: 'ajax',
                    method: 'post',
                    url: '<?=base_url("Hrms/search_attendance");?>',
                    data: {'empname':$('#empname').val(),'fromdate':$('#fromdate').val(),'todate':$('#todate').val()},
                    async: false,
                    dataType: 'JSON',
                    success: function(data){ 

                         $(".table-striped tbody tr").remove(); 
                         $(".table-striped tbody").append(data.EmpAttHtml);
                     console.log(data.EmpAttHtml);                  
                       
                    },
                    error : function(data) {
                            alert("error"); 
                        }
                });
     });
 //});
</script> 
<script type="text/javascript"> 
    $(document).ready(function() {
        $('#emp_attendace_table').on('click', '.deleteRecord', function() {
            var userId = $(this).data('id');
            $('#deleteModal').modal('show');
            $('#deleteUserId').val(userId);
        });
     $('#btnDelete').on('click', function() {
            var Ids = $('#deleteUserId').val();
           var deleteval = Ids.split(',');
           //alert(deleteval[1]);
            $.ajax({
                type: "POST",
                url: "<?=base_url('Hrms/emp_attendance_delete')?>",
                dataType: "JSON",
                data: {
                    userid: deleteval[0],attdate: deleteval[1]
                },
                success: function(data) {
                    $("#" + userId).remove();
                    $('#deleteUserId').val("");
                    $('#deleteModal').modal('hide');
                     $('#message').html('');
                    if(data.status=='success'){
                      $('#message').append(
                        '<div class="alert alert-success alert-dismissable">'+
                          '<button type="button" class="close" data-dismiss="alert">'+
                              '<span aria-hidden="true">&times;</span>'+
                              '<span class="sr-only">Close</span>'+
                          '</button>'+
                          data.message+
                        '</div>'
                      );
                  }else{
                      $('#message').append(
                        '<div class="alert alert-danger alert-dismissable">'+
                          '<button type="button" class="close" data-dismiss="alert">'+
                              '<span aria-hidden="true">&times;</span>'+
                              '<span class="sr-only">Close</span>'+
                          '</button>'+
                          data.message+
                        '</div>'
                      );
                  }
                  setTimeout(function () {
                    $('#message').fadeOut('slow');
                    window.location.reload();
                  }, 2000); 
                     
                }
            });
            return false;
        });

   });    
</script>     