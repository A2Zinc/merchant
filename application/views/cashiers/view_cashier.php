    <div class="container-fluid mt20">
        <div class="row">
            <div class="col-md-12">
                <div class="customcramb">
                <p class="customcrambli"><a href="<?=base_url('Ccashieruser/manage_cashier')?>">All Cashiers</a></p>
                <span class="customscrambspan">></span>
                <p class="customcrambli2"></p>
                </div>
            </div>
        </div>
        <div class="row customrow">
            <div class="col-md-12">
                <div class="">

                    <div class="row ">

                        <div class="col-md-5">
                            <div class="shadowcard">
                                <div style="text-align: center;padding-top: 5px;padding-bottom: 5px;">
                                    <img src="<?=base_url('assets/images/avatar2.svg')?>">
                                    <p class="usertitle"><?=$userdata['first_name'];?> <span class="userboldtitle"><?=$userdata['last_name'];?></span> </p>
                                </div>

                                <div>
                                    <div class="pad10">
                                        <div class="row">
                                            <div class="col-md-5 mb-2">
                                                <p class="shadowcardlabel">Role : <span>Cashier</span></p>
                                                <p class="shadowcardlabel">Status : <?php if($userdata['status'] == 1){?><span
                                                        class="badge greenbadge">Active</span><?php }else{?><span
                                                        class="badge redbadge">Inactive</span><?php } ?>
                                                    </p>
                                            </div>
                                            <div class="col-md-7 mb-2">
                                                <p class="shadowcardlabel">Email : <span><?=$userdata['email'];?></span>
                                                </p>
                                                <p class="shadowcardlabel">Phone Number :
                                                    <span><?=$userdata['phone_no'];?></span></p>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="shadowcardfooter">
                                    <div style="text-align: center;">

                                        <a href="<?=base_url('Ccashieruser/cashier_update_form?id='.$userdata['cashier_id'])?>"
                                            class="btn btn-primary usereditbtn btn-sm">

                                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.5 14.3751V17.5001H5.625L14.8417 8.28346L11.7167 5.15846L2.5 14.3751ZM17.2583 5.8668C17.5833 5.5418 17.5833 5.0168 17.2583 4.6918L15.3083 2.7418C14.9833 2.4168 14.4583 2.4168 14.1333 2.7418L12.6083 4.2668L15.7333 7.3918L17.2583 5.8668Z"
                                                    fill="white" />
                                            </svg>
                                            <span>Edit</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-7">
                            <div class="shadowcard">
                                <div class="shadowcardheader">
                                    <h5>User Information</h5>
                                </div>

                                <div style="padding-top: 10px;">
                                    <div class="pad10">
                                        <div class="row">
                                            <div class="col-md-12  mb-2">
                                                <p class="shadowcardlabel">Sales Commission (%): <span> 0.00%
                                                    </span></p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel">Date of birth :
                                                    <span><?=date('d-m-Y', strtotime($userdata['date_of_birth']))?></span></p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel">Blood Group: <span><?=$userdata['blood_group'];?></span></p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel">Gender: <span><?=$userdata['gender'];?></span></p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel"> Marital Status: <span><?=ucfirst($userdata['marital_status']);?></span>
                                                </p>

                                            </div>
                                            <div class="col-md-12  mb-2">
                                                    <p class="shadowcardlabel"> Country: <span><!-- India --></span></p>

                                            </div>

                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel"> ID Proof: <span> <!-- PAN CARD --> </span>
                                                </p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel"> ID Proof number: <span> <!-- AANEP2210G -->
                                                    </span></p>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- container -->
                <div class=" mt20">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="shadowcard">
                                <div class="shadowcardheader">
                                    <h5>Address Details</h5>
                                </div>

                                <div style="padding-top: 10px;">
                                    <div class="pad10">
                                        <div class="row">
                                            <div class="col-md-12  mb-2">
                                                <p class="shadowcardlabel">Permanent address: <span><?=$userdata['permanent_address'];?></span></p>

                                            </div>
                                            <div class="col-md-12  mb-2">
                                                <p class="shadowcardlabel">Temporary address:<span> <?=$userdata['current_address'];?></span></p>

                                            </div>



                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-7">
                            <div class="shadowcard">
                                <div class="shadowcardheader">
                                    <h5>Bank Details</h5>
                                </div>

                                <div style="padding-top: 10px;">
                                    <div class="pad10">
                                        <div class="row">

                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel">Account Holder’s Name:
                                                    <span><?=$userdata['account_holder_name'];?></span></p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel">Bank Name: <span><?=$userdata['bank_name'];?></span>
                                                </p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel">Account Number:
                                                    <span><?=$userdata['account_number'];?></span></p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel"> Bank IFSC Code:
                                                    <span><!-- SCB910015 --></span>
                                                </p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel"> Tax Payer ID:
                                                    <span><!-- LOREM-IPSUM-99 --></span></p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel"> Branch: <span><?=$userdata['branch_name'];?></span></p>

                                            </div>


                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                        <!-- col -->
                        <div class="col-md-7 ml-auto mt20">
                            <div class="shadowcard">
                                <div class="shadowcardheader">
                                    <h5>HRMS Details</h5>
                                </div>

                                <div style="padding-top: 10px;">
                                    <div class="pad10">
                                        <div class="row">

                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel">Department:
                                                    <span><?=$userdata['department_name']?></span></p>

                                            </div>
                                            <div class="col-md-6  mb-2">
                                                <p class="shadowcardlabel">Designation:  <span><?=$userdata['designation_name']?></span>
                                                </p>

                                            </div>





                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
