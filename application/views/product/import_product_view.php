 <div class="container-fluid mt20">
             <div class="row">
               <div class="col-md-12">
                     <div class="customcard">
                         <div class="customcardheader">
                              <p>Bulk Upload</p>
                         </div>                        

                         <!-- cardheader -->
                         <form action="<?=base_url('Cproduct/uploadCsv')?>" enctype="multipart/form-data" method="post" enctype="multipart/form-data">
                         <div class="customcardbody ">
                           <div class="container mb25">
                            
                               <div class="row">
                                  
                                   <div class="col-md-12">

                                    <?php
                                        $message = $this->session->userdata('message');
                                        if (isset($message)) {
                                            ?>
                                            <div class="alert alert-info alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <?php echo $message ?>
                                            </div>
                                            <?php
                                            $this->session->unset_userdata('message');
                                        }
                                        $error_message = $this->session->userdata('error_message');
                                        if (isset($error_message)) {
                                            ?>
                                            <div class="alert alert-danger alert-dismissable">
                                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                <?php echo $error_message ?>
                                            </div>
                                            <?php
                                            $this->session->unset_userdata('error_message');
                                        }
                                    ?>

                                     <div>
                                      <div class="form-group">
                                        <label class="customcardlabel" for="">Choose the CSV file to import:</label>
                                        <input type="file" name="upload_csv_file" class="form-control customcardinput" id="" aria-describedby="" placeholder="enter Product Name" required>
                                        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share customer's email with anyone else.</small> -->
                                      </div>
                                      <span>Please <a href="<?php print base_url()."import_product.csv"; ?>" target="_blank">click here</a> download sample file</span>
                                     </div>
                                   </div>

                                   
                                   <div class="col-md-12">
                                       <div class="bulkbox">
                                           <p class="inp">Instructions:</p>
                                           <p class="inp2">Follow the instructions carefully before importing the file.
                                             
                                            </p>
                                            <p class="inp3">
                                                The columns of the file should be in the following order:
                                            </p>
                                            <div class="table-responsive">
                                                <table class="table table-borderless">
                                                    <thead>
                                                      <tr>
                                                        <th><b class="tabb">#</b> </th>
                                                        <th> <b class="tabb">Coloumn name</b></th>
                                                        <th> <b class="tabb">Instruction</b></th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <td  class="ctd">1</td>
                                                        <td class="ctd">Prodcut Name </td>
                                                        <td class="ctdd2">Name of the product</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">2</td>
                                                        <td class="ctd">Prodcut Short Name </td>
                                                        <td class="ctdd2">Short Name of the product</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">3</td>
                                                        <td class="ctd">Supplier Name </td>
                                                        <td class="ctdd2">Supplier Name of the product</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">4</td>
                                                        <td  class="ctd">Category</td>
                                                        <td class="ctdd2">Name of the category.</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">5</td>
                                                        <td  class="ctd">Case UPC</td>
                                                        <td class="ctdd2">Case UPC (Barcode Number) of the product.</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">6</td>
                                                        <td  class="ctd">Supplier Price</td>
                                                        <td class="ctdd2">Supplier Price of the product.</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">7</td>
                                                        <td  class="ctd">Sale Price</td>
                                                        <td class="ctdd2">Sale Price of the product.</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">8</td>
                                                        <td  class="ctd">Unit</td>
                                                        <td class="ctdd2">Unit of the product.</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">9</td>
                                                        <td  class="ctd">Quantity</td>
                                                        <td class="ctdd2">Quantity of the product.</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">10</td>
                                                        <td  class="ctd">Brand Name</td>
                                                        <td class="ctdd2">Brand Name of the product.</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">11</td>
                                                        <td  class="ctd">Size</td>
                                                        <td class="ctdd2">Size Name of the product.</td>
                                                      </tr>
                                                      <tr>
                                                        <td  class="ctd">12</td>
                                                        <td  class="ctd">Applicable CRV</td>
                                                        <td class="ctdd2">If product is Applicable for CRV then 1 else 0.</td>
                                                      </tr>  
                                                      <tr>
                                                        <td  class="ctd">13</td>
                                                        <td  class="ctd">Applicable Tax</td>
                                                        <td class="ctdd2">If product is Applicable for Tax then 1 else 0.</td>
                                                      </tr>  
                                                    </tbody>
                                                  </table>
                                            </div>
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
                                <a href=<?=base_url('Cproduct/manage_product')?> type="button" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</a>
                                <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm">Add</button>
                            </div>
                         </div>
                       </form>
                     </div>
               </div>
             </div>
       </div>