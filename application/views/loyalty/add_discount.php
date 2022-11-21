 <div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <p>Add a new discount</p>
                         </div>
                         <!-- cardheader -->
                         <div class="customcardbody ">
                           <div class="container mb25">
                            
                               <div class="row">
                                   
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">Discount name</label>
                                        <input type="text" class="form-control customcardinput" id="" aria-describedby="" placeholder="enter the value here">
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share customer's email with anyone else.</small> -->
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                      <label for="exampleFormControlSelect1 customcardlabel">Coupon type</label>
                                      <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                        <option>enter the coupon type</option>
                                        <option>Fixed</option>
                                        <option>Percentage</option>
                                       
                                      </select>
                                    </div>
                                   </div>
                                   
                                   <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Amount</label>
                                        <input type="text" class="form-control customcardinput" id="" aria-describedby="" placeholder="enter the value here">
                                      </div>
                                   </div>
                                   <div class="col-md-3">
                                    <div class="form-group">
                                      <label class="" for=" customcardlabel">Required Prodcuts</label>
                                      <select  multiple="multiple" class="form-control customcardinput js-example-basic-multiple" id="exampleFormControlSelect">
                                          <option>Selected products</option>
                                          <option>OLD Monk</option>
                                          <option>jack Daneles</option>
                                         
                                       
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Selected categories</label>
                                        <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                            <option>enter the value here</option>
                                         
                                        </select>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Validity of discount (In days)</label>
                                       
                                        <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                          <option>enter days</option>
                                       
                                      </select>
                                         
                                        
                                      </div>
                                      <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                        <label class="form-check-label customcardlabel checklabel" for="exampleCheck1">Is Active?</label>
                                      </div>
                                </div>
                                   
                               </div>
                           </div>
                           <!-- container -->
                          
                           
                               <!-- container -->
                              
                         </div>
                         <!-- cardbody -->
                         <div class="customcardfooter">
                            <div style="text-align: center;">
                                <a href="<?=base_url('Ccoupon/manage_discount')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Add</button>
                            </div>
                         </div>
                     </div>
               </div>
             </div>
       </div>