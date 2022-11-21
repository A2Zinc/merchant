      <div class=" container-fluid mt20">
        <div class="row ">
          <div class="col-md-12 ">
            <div class="customcard contain-height">
              <div>
                <div class="usercardheader">
                  <div class="col-md-4">
                    <p>Tax Rates <span class="text-secondary">(Manage your Tax Rate)</span></p>
                  </div>
                  <div class="col-md-8">
                    <?php if ($this->session->flashdata('success')) { ?>
                      <div class="alert alert-success alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <?php echo $this->session->flashdata('success'); ?>
                        <!--Msg-->
                      </div>
                    <?php } elseif ($this->session->flashdata('error')) { ?>
                      <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>
                        </button>
                        <?php echo $this->session->flashdata('error'); ?>
                        <!--Msg-->
                      </div>
                    <?php } ?>
                  </div>
                </div>
                <div class="customcardbody ">
                  <!-- <form action="<?= base_url('Ctax/insertTax') ?>" method="post" class="add_tax" autocomplete="off" class="form-inline">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="customcardlabel" for="">Tax</label>
                          <!-- <input type="text" class="form-control customcardinput" id="tax_other" name="tax_setting_others" aria-describedby="" > -->

                  <!--  <input type="number" name="tax_setting_others" class="form-control customcardinput" min="0" id="tax_other" aria-describedby="" >
                          <span class="errors" id="fname_err" style="color:red; font-size:14px"></span>
                        </div>
                      </div> -->

                  <!-- <div class="col-md-12">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary customcardfooteraddbtn " id="btnSave">Add</button>
                        </div>
                    </div> -->



                  <!-- </form> -->
                  <!-- <div class="customcardbody "> -->
                  <form action="<?= base_url('Ctax/updateTax') ?>" method="post" class="add_tax" autocomplete="off">
                    <div class="row">
                      <div class=" d-flex align-items-center text-center" style="padding-left:3em;white-space:nowrap;padding-right:.5em;justify-content:center;">
                        <label class="customcardlabel" for="">Tax : </label>
                      </div>
                      <div class="col-md-3 p-0">
                        <input type="text" class="form-control inputfile" id="tax_other" name="tax_setting_others" onkeypress="return isNumberKey(this, event);" value="<?php echo $tax->tax_setting_others; ?>">
                        <span class="errors" id="tax_err" style="color:red; font-size:14px"></span>
                      </div>

                    </div>
                    <div style="margin-top: 2%;padding-left:4.5em;">
                      <button type="submit" class="btn btn-primary customcardfooteraddbtn " id="btnSave">Submit</button>
                    </div>

                  </form>
                  <!--<table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col" >All your Tax rates</th>

                        </tr>
                        <tr></tr>
                      <tr>
                        <th scope="col">Name</th>

                        <th scope="col" >Tax Rate %</th>
                        <th></th>
                        
                        
                        <th style="text-align: center;" scope="col">Action</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <tr >
                        <!-- <th scope="row"></th> -->
                  <!--  <td class="text_value">CGST @ 18.50%</td>
                        <td class="text_value">18.50%</td>
                        <td></td>
                        
                        
                       
                        <td style="text-align: center;">
                            
                            <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button type="button" class="btn btn-outline-dark alluserbtn">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr>
                      <tr> -->
                  <!-- <th scope="row"></th> -->
                  <!--  <td class="text_value">SGST @ 8.00%</td>
                        <td class="text_value">8.00%</td>
                        <td></td>
                        
                       
                        <td style="text-align: center;">
                            
                            <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button type="button" class="btn btn-outline-dark alluserbtn">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr>
                      <tr> -->
                  <!-- <th scope="row"></th> -->
                  <!--  <td class="text_value">VAT @ 10.00%</td>
                        <td class="text_value">10.00%</td>
                        <td></td>
                       
                        <td style="text-align: center;">
                            
                            <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button type="button" class="btn btn-outline-dark alluserbtn">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr> -->
                  <!-- tr -->

                  <!-- tr -->

                  <!-- tr -->

                  <!-- tr -->

                  <!-- tr -->



                  <!--    </tbody>
                  </table> -->
                  <!-- modal -->

                </div>

              </div>
            </div>
          </div>

        </div>
      </div>


      <!-- <div class=" container-fluid mt20">
        <div class="row ">
          <div class="col-md-12 ">
            <div class="customcard contain-height2">
              <div >
                <div class="usercardheader">
                    <p >Tax groups <span class="text-secondary">(Combination of multiple taxes)</span></p>
                    <button   data-toggle="modal" data-target="#exampleModalCenter1" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add Tax Group
                        
<svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
    </svg>
    
                        </button>
               </div>
               <div class="customcardbody ">
                <table class="table table-striped">
                    <thead>
                        <tr>

                        </tr>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col" >Tax Rate %</th>
                        <th scope="col" >Sub taxes %</th>
                        <th style="text-align: center;" scope="col">Actions</th>
                      
                      </tr>
                    </thead>
                    <tbody>
                      <tr >
                         <!-- <th scope="row"></th> -->
      <!-- <td class="text_value">GST @ 18.50%</td>
                        <td class="text_value">18.50%</td>
                        <td class="text_value">CGST@10% + SGST@8.5%s</td>
                       
                        <td style="text-align: center;">
                            
                            <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button type="button" class="btn btn-outline-dark alluserbtn">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr>
                      <tr > -->
      <!-- <th scope="row"></th> -->
      <!--  <td class="text_value">GST @ 18.50%</td>
                        <td class="text_value">18.50%</td>
                        <td class="text_value">CGST@10% + SGST@8.5%s</td>
                       
                        <td style="text-align: center;">
                            
                            <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button type="button" class="btn btn-outline-dark alluserbtn">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr>   <tr >  -->
      <!-- <th scope="row"></th> -->
      <!-- <td class="text_value">GST @ 18.50%</td>
                        <td class="text_value">18.50%</td>
                        <td class="text_value">CGST@10% + SGST@8.5%s</td>
                       
                        <td style="text-align: center;">
                            
                            <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button type="button" class="btn btn-outline-dark alluserbtn">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr>
                         <tr >  -->
      <!-- <th scope="row"></th> -->
      <!--  <td class="text_value">GST @ 18.50%</td>
                        <td class="text_value">18.50%</td>
                        <td class="text_value">CGST@10% + SGST@8.5%s</td>
                       
                        <td style="text-align: center;">
                            
                            <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button type="button" class="btn btn-outline-dark alluserbtn">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr>
                      <tr >  -->
      <!-- <th scope="row"></th> -->
      <!-- <td class="text_value">GST @ 18.50%</td>
                        <td class="text_value">18.50%</td>
                        <td class="text_value">CGST@10% + SGST@8.5%s</td>
                       
                        <td style="text-align: center;">
                            
                            <button   type="button" class="btn btn-outline-dark alluserbtn">Edit 
                              <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <g clip-path="url(#clip0)">
                              <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                              </g>
                              <defs>
                              <clipPath id="clip0">
                              <rect width="21" height="21" fill="white"/>
                              </clipPath>
                              </defs>
                              </svg>
                              </button>
                            <button type="button" class="btn btn-outline-dark alluserbtn">Delete 
                              <svg class="delete" width="22" height="16"  viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                              </svg>
                              </button>
                          </td>
                      </tr>
                  
                    </tbody>
                  </table>  -->
      <!-- modal -->

      <!-- 
                </div>
               
              </div>
            </div>
          </div>
         
        </div>
      </div>  -->







      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter99" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header custommodalheader">
              <h5 class="modal-title custommodaltitle center" id="exampleModalLongTitle">Add Tax</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
            </div>
            <div class="modal-body modalscroll">
              <div class="form-group">
                <label class="customcardlabel" for="">Name:</label>
                <input type="text" class="form-control customcardinput " id="" aria-describedby="" placeholder="Vat @18">

              </div>
              <div class="form-group">
                <label class="customcardlabel" for="">Tax Rate:</label>
                <input type="text" class="form-control customcardinput" id="" aria-describedby="" placeholder="">

              </div>

            </div>
            <div class="modal-footer">
              <div style="text-align: center;">
                <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Save</button>
              </div>

            </div>
          </div>
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header custommodalheader">
              <h5 class="modal-title custommodaltitle center2" id="exampleModalLongTitle">Add a tax group</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
            </div>
            <div class="modal-body modalscroll">
              <div class="form-group">
                <label class="customcardlabel" for="">Name:</label>
                <input type="text" class="form-control customcardinput " id="" aria-describedby="" placeholder="GST @ 18%">

              </div>
              <div class="form-group">
                <label class="customcardlabel" for="">Subtaxes:</label>
                <input type="text" class="form-control customcardinput" id="" aria-describedby="" placeholder="CGST@10%">

              </div>

            </div>
            <div class="modal-footer">
              <div style="text-align: center;">
                <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Save</button>
              </div>

            </div>
          </div>
        </div>
      </div>

      <script type="text/javascript">
        $('#btnSave').on('click', function() {

          if ($('#tax_other').val() == '') {
            $("#tax_err").html("Please enter tax").show();
            return false;
          }

        });

        $('.inputfile').bind('change', function() {
          if ($('#tax_other').val() == '') {
            $("#tax_err").html("Please enter tax").show();
            return false;
          } else {
            $("#tax_err").html("").show();
          }
        });
      </script>
      <script type="text/javascript">
        function isNumberKey(txt, evt) {
          var charCode = (evt.which) ? evt.which : evt.keyCode;
          if (charCode == 46) {
            //Check if the text already contains the . character
            if (txt.value.indexOf('.') === -1) {
              return true;
            } else {
              return false;
            }
          } else {
            if (charCode > 31 &&
              (charCode < 48 || charCode > 57))
              return false;
          }
          return true;
        }
      </script>