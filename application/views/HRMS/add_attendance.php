
      <div class=" container-fluid mt20">
        <div class="row">
          <div class="col-md-12">
            <div class="customcard">
              <div>
                <div class="usercardheader">
                    <p>Add latest Attendance</p>
                   
                        


    
<svg class="leave" width="22" height="16"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3.01 3.9 3.01 5L3 19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19ZM7 10H12V15H7V10Z" />
    </svg>
    

               </div>
               <div>
                <p class="pl-4 pt-4">Select Employee</p>
               
                    



<svg class="leave" width="22" height="16"  viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M19 3H18V1H16V3H8V1H6V3H5C3.89 3 3.01 3.9 3.01 5L3 19C3 20.1 3.89 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19ZM7 10H12V15H7V10Z" />
</svg>


                    </button>
           </div>

           <div class="form-group col-md-12">
            <label for="exampleFormControlSelect1"></label>
            <select class="form-control" id="participants">
              <option>Select employee name</option>
              <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            </select>
          </div>


               <div class="customcardbody ">
                   <div class="table-responsive">
                    <table class="table" id="participantTable">
                        <thead>
                          <tr>
                            <th scope="col">Employee</th>
                            <th scope="col">Clock in time</th>
                            <th scope="col">Clock out time</th>
                            <th scope="col">Shift</th>
                            <th scope="col">Clock in Note</th>
                            <th scope="col">Clock Out Note</th>
                          </tr>
                        </thead>
                        <tbody id='newrecord'>
                          
                          <!-- tr -->
                        
                          <!-- tr -->
                        
                        
      
                        </tbody>
                      </table>
                      <div>
                                    <hr style="width: 100%;!important">
                          <div class="col-md-12 text-center">
                             <button style="  height: 21.71px;
                             font-family: Circular Std;
                             font-style: normal;
                             font-weight: 500;
                             font-size: 14px;
                             line-height: 24px;
                             color:#979797;
                             align-items: center;
                             text-align: center;
                             width: 110px;
                             height: 31.22px;
                             left: 889px;
                             top: 839px;
                             border: 1px solid #234438;
                             border-radius: 2px;
                             cursor: pointer;"  data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
                     
                     
                     
                       <button class="save">
                        Save</button>
                                                        
     </div>
          </div>
               
                  <!-- modal -->



              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>



                  <!-- Modal apply leave -->
<div class="modal fade" id="applyleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header custommodalheader">
          <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Apply for a leave</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body modalscroll">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        <!-- <div class="form-group">
                            <label class="customcardlabel" for=" ">Employee name</label>
                            <select   style="width: 100%" class="form-control customcardinput mySelect for" id="exampleFormControlSelect1">
                              
                             
                            </select>
                          </div> -->
                          <div class="form-group">
                            <label class="customcardlabel" for=" ">Employee name</label>
                            <select   style="width: 100%" class="form-control customcardinput js-example-basic-single" id="exampleFormControlSelect1">
                              
                                <option value="AL">Tony Stark</option>
                            </select>
                          </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label customcardlabel" for="date-of-birth"><b>Start Date: *</b> </label>
                            <input type="text" class="datepicker form-control" id="date-of-birth" placeholder="Start Date">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-control-label customcardlabel" for="date-of-birth"><b>End Date: *</b> </label>
                            <input type="text" class="datepicker form-control" id="date-of-birth" placeholder="End Date">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="customcardlabel" for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <div style="text-align: center;">
                <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Submit</button>
            </div>

        </div>
      </div>
    </div>
  </div>







         <!-- Modal apply leave -->
<div class="modal fade" id="status" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
      <div class="modal-content">
        <div class="modal-header custommodalheader">
          <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Change status of a Leave</h5>
          <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
        </div>
        <div class="modal-body modalscroll">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">

                        
                          <div class="form-group">
                            <label class="customcardlabel" for=" ">Status</label>
                            <select   style="width: 100%" class="form-control customcardinput js-example-basic-single" id="exampleFormControlSelect1">
                              
                                <option value="AL">Pending</option>
                            </select>
                          </div>
                    </div>
                    
                   
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="customcardlabel" for="exampleFormControlTextarea1">Notes</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                    </div>
                
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
               </div>



                 <!-- activity -->
               <div class="modal fade" id="activity" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered " role="document">
                  <div class="modal-content">
                    <div class="modal-header custommodalheader">
                      <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">View Activity</h5>
                      <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> -->
                    </div>
                    <div class="modal-body modalscroll">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <div class="df">
                                        <p class="activity">Leave: <span>08/Aug/2020</span> </p>
                                        <p class="activity marginleftauto">End date:<span> 25/Aug/2020</span>  </p>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                            <th scope="col">Changed By</th>
                                            <th scope="col">Note</th>
                                            
                                       
                                          
                                          </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <!-- <th scope="row"></th> -->
                                            <td>24/Aug/2020 </td>
                                            <td>Updated</td>
                                            <td>Admin</td>
                                            <td>Approved</td>
                                           
                                            
                                          </tr>
                                          <!-- tr -->
                                         
                                        
                      
                                        </tbody>
                                      </table>
                                </div>
                            
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
                           </div>


<script>
    var data = ["Apple", "Banana", "Cherry", "Date", "ElderberriesElderberry"]; // Programatically-generated options array with > 5 options
var placeholder = "select employee";
$(".mySelect").select2({
    data: data,
    placeholder: placeholder,
    allowClear: false,
    minimumResultsForSearch: 5
});
</script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();

});
</script>
<script>
    $(document).ready(function(){
    $('.datepicker').datepicker();

   
});



$(document).on('change','#participants',function(){

    var number = $(this).val()
    var html = ''

    for(i=0;i<number;i++){
        html += " <tr id='remv_"+i+"' style='background: #F5F6FA;mix-blend-mode: normal; opacity: 0.63;' class='participantRow'><td>Mr Admin</td><td><div class='form-row align-items-center'><div class='col-md-12'><label class='sr-only' for'inlineFormInput'>Name</label><input type='text' class='form-control mb-2' id='inlineFormInput' placeholder='9:00 Am'></div></div></td><td><div class='form-row align-items-center'><div class='col-md-12'><label class='sr-only' for='inlineFormInput'>Name</label><input type='text' class='form-control mb-2' id='inlineFormInput' placeholder='9:00 Am'></div></div></td><td> <div style='width:100px !important;' class='form-group '><label for='exampleFormControlSelect1'></label><select class='form-control' id='exampleFormControlSelect1'><option >Fixed</option><option></option><option></option><option></option><option></option></select></div></td><td><div class='form-row align-items-center'><div class='col-md-8'><label class='sr-only' for='inlineFormInput'>Name</label> <input type='text' class='form-control mb-2' id='inlineFormInput' placeholder=''> </div></div></td> <td><div class='form-row align-items-center'> <div class='col-md-8'> <label class='sr-only' for='inlineFormInput'>Name</label>  <input type='text' class='form-control mb-2' id='inlineFormInput' placeholder=''> </div>  </div> </td>   <td><button id='remove_id_"+i+"' style='border:none;' data-id='"+i+"' class=' remove' type='button'><i class='far fa-times-circle' style='color:red; font-size: 20px;'></i></button></td> </tr>"
    }

    $('#newrecord').html(html)

  
})

$(document).on('click','.remove',function(){
    var id = $(this).attr('data-id')
    // alert('remv_'+id)
    $('#remv_'+id).remove()
})
</script>

