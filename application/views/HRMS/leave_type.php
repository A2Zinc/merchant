      <div class=" container-fluid mt20">
        <div class="row">
          <div class="col-md-12">
            <div class="customcard">
              <div>
                <div class="usercardheader" style='background: #d8d9dd'>
                  <div class="col-md-2 d-flex">
                    <button id='header-text' style="
    background: transparent;
    white-space: nowrap;
    padding: 2%;
    margin: 0 2%;
    border: 1px solid gray;
    border-radius: 4px;">Standard Leave</button>
                    <button id='header-text2' style="background: transparent;
    white-space: nowrap;
    padding: 2%;
    margin: 0 2%;
    border: 1px solid gray;
    border-radius: 4px;">Accrued Leave</button>
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
                  <button id='leaveTypeBtn' style="margin-top:6.2em;" data-toggle="modal" data-target="#addModal" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">
                    Add Leave Type

                    <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                    </svg>
                  </button>
                </div>
                <div id='leaveTable' class="customcardbody " style="margin-top: 3.5em;">
                  <table class="table table-striped" id="tbl_leave_type">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Leave type</th>
                        <th scope="col">Max leave count (in days)</th>

                        <th style="text-align: center;" scope="col">Action</th>

                      </tr>
                    </thead>
                    <tbody>
                      <?php $i = 1;
                      if (!empty($leave_type)) {
                        foreach ($leave_type as $l) { ?>
                          <tr>
                            <!-- <th scope="row"></th> -->
                            <td><?= $i ?></td>
                            <td><?= $l['leave_type'] ?></td>
                            <td><?= $l['max_leave'] ?></td>

                            <td style="text-align: center;">

                              <button type="button" data-id="<?php echo $l['id']; ?>" class="btn btn-outline-dark alluserbtn editRecord" data-toggle="modal" data-target="#editModal">Edit
                                <svg class="pen" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <g clip-path="url(#clip0)">
                                    <path d="M2 15.25V19H5.75L16.81 7.94L13.06 4.19L2 15.25ZM19.71 5.04C20.1 4.65 20.1 4.02 19.71 3.63L17.37 1.29C16.98 0.899998 16.35 0.899998 15.96 1.29L14.13 3.12L17.88 6.87L19.71 5.04Z" />
                                  </g>
                                  <defs>
                                    <clipPath id="clip0">
                                      <rect width="21" height="21" fill="white" />
                                    </clipPath>
                                  </defs>
                                </svg>
                              </button>
                              <button type="button" data-id="<?php echo $l['id']; ?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete
                                <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                </svg>
                              </button>
                            </td>
                          </tr>
                      <?php $i++;
                        }
                      } ?>



                    </tbody>
                  </table>
                  <!-- modal -->
                  <!-- Modal -->

                </div>

              </div>
            </div>
          </div>

        </div>
      </div>

      <div class=" container-fluid mt20">
        <div class="row ">
          <div class="col-md-12 ">
            <div id="leaveForm" class="customcard contain-height2">
              <div>
                <div class="usercardheader">
                  <!-- <p >For Every </p> -->
                </div>
                <div class="customcardbody  ">

                  <form action="<?php echo base_url('Hrms/updateTimesheet'); ?>" method="post" class="add_timesheet" autocomplete="off">
                    <div class="row " style="padding-left:15px">
                      <div class='d-flex align-items-center'>
                        <label class="customcardlabel" for="">For Every</label>
                      </div>
                      <div style="width:5%;margin:0 1%">
                        <input type="text" class="form-control inputfile3" id="hours_approved_timesheet" name="hours_approved_timesheet" onkeypress="return isNumberKey(this, event);" value="<?php echo $timesheet->hours_approved_timesheet; ?>">
                        <span class="errors" id="tax_err" style="color:red; font-size:14px"></span>
                      </div>
                      <div class='d-flex align-items-center'>
                        <label class="customcardlabel " for="">Hours of approved timesheet</label>
                      </div>
                      <div style="width:5%;margin:0 1%">
                        <input type="text" class="form-control inputfile3" id="hours_accrued_leave" name="hours_accrued_leave" onkeypress="return isNumberKey(this, event);" value="<?php echo $timesheet->hours_accrued_leave; ?>">
                        <span class="errors" id="tax1_err" style="color:red; font-size:14px"></span>
                      </div>
                      <div class='d-flex align-items-center'>
                        <label class="customcardlabel " for="">Hours of accrued leave</label>


                      </div>

                    </div>
                    <div>
                      <button type="submit" class="btn btn-primary customcardfooteraddbtn " id="btnSave" style="margin:1% 0">Submit</button>
                    </div>

                  </form>


                </div>

              </div>
            </div>
          </div>

        </div>
      </div>






      <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <div class="modal-header custommodalheader">
              <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Add a leave type</h5>
              <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
            </div>
            <form action="<?= base_url('Hrms/insert_leave_type') ?>" method="post">
              <div class="modal-body modalscroll">
                <div class="form-group">
                  <label class="customcardlabel" for="">Leave Name</label>
                  <input type="text" name="leave_type" class="form-control customcardinput inputfile" id="leave_type" aria-describedby="" placeholder="enter the leave type" onkeypress="return onlyAlphabets(event,this);">
                  <span class="errors" id="leave_err" style="color:red; font-size:14px"></span>
                </div>
                <div class="form-group">
                  <label class="customcardlabel" for="">Max leave Count (in days)</label>
                  <input type="number" name="max_leave" class="form-control customcardinput inputfile" min="0" id="max_leave" aria-describedby="" placeholder="enter max leave count">
                  <span class="errors" id="cleave_err" style="color:red; font-size:14px"></span>
                </div>
                <div>
                  <div>
                    <label class="customcardlabel">Leave count interval: *</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input inputfile" type="radio" name="leave_interval" id="inlineRadio1" value="monthly">
                    <label class="form-check-label" for="inlineRadio1">Current month</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input inputfile" type="radio" name="leave_interval" id="inlineRadio2" value="yearly">
                    <label class="form-check-label" for="inlineRadio2">Financial year</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input inputfile" type="radio" name="leave_interval" id="inlineRadio3" value="none" checked="checked">
                    <label class="form-check-label" for="inlineRadio3">None</label>
                  </div>

                </div>
                <span class="errors" id="int_err" style="color:red; font-size:14px"></span>
              </div>
              <div class="modal-footer">
                <div style="text-align: center;">
                  <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm btnADD">Save</button>
                </div>

              </div>
            </form>
          </div>

        </div>
      </div>

      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
          <div class="modal-content">
            <form class="delete-Role" method="post" action="<?php echo base_url('Hrms/delete_leave_type'); ?>">
              <div class="modal-body modalscroll">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 mt-2 mb-3 ">
                      <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                      <h5 class="text-center">Are you sure to delete this record ?</h5>

                    </div>
                    <input type="hidden" name="leave_id" id="delete_id" class="form-control">
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
        </div>
      </div>


      <!-- Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">

          <div class="modal-content">
            <form action="<?= base_url('Hrms/update_leave_type') ?>" method="post">
              <div class="modal-header custommodalheader">
                <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Update leave type</h5>
                <input type="hidden" name="leave_id" id="edit_leave_id" class="form-control customcardinput">

              </div>
              <div class="modal-body modalscroll">
                <div class="form-group">
                  <label class="customcardlabel" for="">Leave Type</label>
                  <input type="text" name="leave_type" class="form-control customcardinput inputfile2" id="editLeaveType" aria-describedby="" placeholder="enter the leave type" onkeypress="return onlyAlphabets(event,this);">
                  <span class="errors" id="eleave_err" style="color:red; font-size:14px"></span>
                </div>
                <div class="form-group">
                  <label class="customcardlabel" for="">Max leave Count (in days)</label>
                  <input type="number" name="max_leave" class="form-control customcardinput inputfile2" min="0" id="editMaxLeave" aria-describedby="" placeholder="entter max leave count">
                  <span class="errors" id="ecleave_err" style="color:red; font-size:14px"></span>
                </div>
                <div>
                  <div>
                    <label class="customcardlabel">Leave count interval: *</label>
                  </div>

                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="leave_interval" id="inlineRadio4" value="monthly">
                    <label class="form-check-label" for="inlineRadio1">Current month</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="leave_interval" id="inlineRadio5" value="yearly">
                    <label class="form-check-label" for="inlineRadio2">Financial year</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="leave_interval" id="inlineRadio6" value="none">
                    <label class="form-check-label" for="inlineRadio3">None</label>
                  </div>

                </div>
              </div>
              <div class="modal-footer">
                <div style="text-align: center;">
                  <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                  <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnUpdate">Submit</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>


      <script type="text/javascript">
        $('#leaveForm').hide();
        $('#leaveTable').show();
        $('#leaveTypeBtn').show();
        $('#header-text').on('click', function() {
          $('#leaveForm').hide();
          $('#leaveTable').show();
          $('#leaveTypeBtn').show();
        })
        $('#header-text2').on('click', function() {
          $('#leaveForm').show();
          $('#leaveTable').hide();
          $('#leaveTypeBtn').hide();

        })
        $('.btnADD').on('click', function() {
          if ($('#leave_type').val() == '') {
            $("#leave_err").html("Please enter Leave Type").show();
            return false;
          }
          if ($('#max_leave').val() == '' || $('#max_leave').val() == 0) {
            $("#cleave_err").html("Please enter Max Leave Count").show();
            return false;
          }

          if (!($('#inlineRadio1:checked').val() || $('#inlineRadio2:checked').val() || $('#inlineRadio3:checked').val())) {
            $("#int_err").html("Please select Leave Interval").show();
            return false;
          }
        });

        $('.inputfile').bind('change', function() {
          if ($('#leave_type').val() == '') {
            $("#leave_err").html("Please enter Leave Type").show();
            return false;
          } else {
            $("#leave_err").html("").show();
          }
          if ($('#max_leave').val() == '' || $('#max_leave').val() == 0) {
            $("#cleave_err").html("Please enter Max Leave Count").show();
            return false;
          } else {
            $("#cleave_err").html("").show();
          }
          if (!($('#inlineRadio1:checked').val() || $('#inlineRadio2:checked').val() || $('#inlineRadio3:checked').val())) {
            $("#int_err").html("Please select Leave Interval").show();
            return false;
          } else {
            $("#int_err").html("").show();
          }
        });

        $('#leave_type').on('keypress', function() {
          var regex = new RegExp("^[a-zA-Z ]+$");
          var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
          if (!regex.test(key)) {
            $("#leave_err").html("Only alphabets allowed").show();
            return false;
          } else {
            $("#leave_err").html("").show();

          }
        });

        $('#editLeaveType').on('keypress', function() {
          var regex = new RegExp("^[a-zA-Z ]+$");
          var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
          if (!regex.test(key)) {
            $("#eleave_err").html("Only alphabets allowed").show();
            return false;
          } else {
            $("#eleave_err").html("").show();

          }
        });

        $('#btnUpdate').click(function() {

          if ($('#editLeaveType').val() == '') {
            $("#eleave_err").html("Please enter Leave Type").show();
            return false;
          }
          if ($('#editMaxLeave').val() == '' || $('#editMaxLeave').val() == 0) {
            $("#ecleave_err").html("Please enter Max Leave Count").show();
            return false;
          }

        });

        $('.inputfile2').bind('change', function() {
          if ($('#editLeaveType').val() == '') {
            $("#eleave_err").html("Please enter Leave Type").show();
            return false;
          } else {
            $("#eleave_err").html("").show();
          }
          if ($('#editMaxLeave').val() == '' || $('#editMaxLeave').val() == 0) {
            $("#ecleave_err").html("Please enter Max Leave Count").show();
            return false;
          } else {
            $("#ecleave_err").html("").show();
          }
        });

        $('#tbl_leave_type').on('click', '.editRecord', function() {
          var leave_id = $(this).data('id');
          $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?= base_url("Hrms/getLeaveTypeById") ?>',
            data: {
              leave_id: leave_id
            },
            dataType: 'json',
            success: function(data) {
              console.log(data);
              $('#edit_leave_id').val(data.id);
              $('#editLeaveType').val(data.leave_type);
              $('#editMaxLeave').val(data.max_leave);

              if (data.leave_interval == 'monthly') {
                $('#inlineRadio4').prop("checked", true);
              } else {
                $('#inlineRadio4').prop("checked", false);
              }
              if (data.leave_interval == 'yearly') {
                $('#inlineRadio5').prop("checked", true);
              } else {
                $('#inlineRadio5').prop("checked", false);
              }
              if (data.leave_interval == 'none') {
                $('#inlineRadio6').prop("checked", true);
              } else {
                $('#inlineRadio6').prop("checked", false);
              }
            }
          });
        });

        $('#tbl_leave_type').on('click', '.deleteRecord', function() {
          var delete_id = $(this).data('id');
          $('#delete_id').val(delete_id);
          $('#deleteModal').modal('show');
        });
      </script>
      <script type="text/javascript">
        $('#btnSave').on('click', function() {

          if ($('#hours_approved_timesheet').val() == '') {
            $("#tax_err").html("Please enter Hours of approved timesheet").show();
            return false;
          }
          if ($('#hours_accrued_leave').val() == '') {
            $("#tax1_err").html("Please enter Hours of accrued leave").show();
            return false;
          }

        });

        $('.inputfile3').bind('change', function() {
          if ($('#hours_approved_timesheet').val() == '') {
            $("#tax_err").html("Please enter Hours of approved timesheet").show();
            return false;
          } else {
            $("#tax_err").html("").show();
          }
          if ($('#hours_accrued_leave').val() == '') {
            $("#tax1_err").html("Please enter Hours of accrued leave").show();
            return false;
          } else {
            $("#tax1_err").html("").show();
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