 <div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <p>Add a reward</p>
                         </div>
                         <!-- cardheader -->
                         <div class="customcardbody ">
                           <div class="container mb25">
                            
                               <div class="row">
                                   
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel" for="">System name</label>
                                        <input type="text" class="form-control customcardinput" id="" aria-describedby="" placeholder="enter the value here">
                                        <small id="" class="form-text text-muted">Once the point number has been reached, the selected coupon will be genrated.</small>
                                      </div>
                                   </div>
                                   <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="customcardlabel"> Assign to a coupon</label>
                                        <input type="" class="form-control customcardinput" id="" aria-describedby="emailHelp" placeholder="enter the value here">
                                        <small id="" class="form-text text-muted">It can be the percentage or the fixed amount.</small>
                                      </div>
                                   </div>
                                   
                                   
                                   <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Goal in points</label>
                                        <input type="" class="form-control customcardinput" id="" aria-describedby="emailHelp" placeholder="enter the value here">
                                        <small id="" class="form-text text-muted">Here we must determine the number of points to reach to genarate a cuppon.</small>
                                      </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Validity of Coupon (In days)</label>
                                        <select class="form-control customcardinput" id="exampleFormControlSelect1">
                                            <option>enter days</option>
                                         
                                        </select>
                                        <small id="" class="form-text text-muted">It is neccessary to determins here after how  many days the generated coupon.</small>
                                      </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Expiration Date</label>
                                       
                                          <input type="text" class="form-control customcardinput" id="" aria-describedby="" placeholder="enter the value here">
                                         
                                        
                                      </div>
                                      <small id="" class="form-text text-muted">After the expiry date, the coupon will no longer be usable.</small>
                                      
                                </div>
                                   
                               </div>
                             <div class="item-apend mt-4">
                                <div class="row">
                                    <div class="col-md-4">
                                     <div class="form-group">
                                         <label class="customcardlabel" for="">Required Prodcuts</label>
                                         <input type="text" class="form-control " id="" aria-describedby="" placeholder="enter the value here">
                                        
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                     <div class="form-group">
                                         <label class="customcardlabel" for="">Required Prodcuts</label>
                                         <input type="text" class="form-control " id="" aria-describedby="" placeholder="enter the value here">
                                         
                                       </div>
                                    </div>
                                    <div class="col-md-4">
                                     <button type="button" class="btn btn-light apend_button add_button" href="javascript:void(0);">+</button>
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
                                <a href="<?=base_url('Ccoupon/manage_reward')?>" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Add</button>
                            </div>
                         </div>
                     </div>
               </div>
             </div>
       </div>