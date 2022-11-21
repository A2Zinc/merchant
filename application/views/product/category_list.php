     <style>
       #grptextbox {
         margin-bottom: 0 !important;
         margin-top: 1em;
       }

       #editmeasurevalue {
         margin-bottom: 0 !important;
       }

       .bootstrap-tagsinput {
         width: 100%;
       }

       #extrasize_value {
         width: 100%;
       }
     </style>
     <div class=" container-fluid mt20">
       <div class="row">
         <div class="col-md-12">
           <div class="customcard">
             <div>
               <div class="usercardheader">
                 <div class="col-md-2">
                   <p>All Category</p>
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
                 <button data-toggle="modal" data-target="#addModal" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add Category

                   <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                   </svg>

                 </button>

               </div>
               <div class="customcardbody ">
                 <table class="table table-striped" id="tbl_category">
                   <thead>
                     <tr>
                       <th scope="col">Category name</th>
                       <!-- <th scope="col">Parent Category</th> -->
                       <th scope="col">Description</th>


                       <th style="text-align: center;" scope="col">Action</th>

                     </tr>
                   </thead>
                   <tbody>
                     <?php foreach ($category as $s) { ?>

                       <tr>
                         <td>
                           <?php if (!empty($s['parent_category_id'])) { ?>
                             <img src="<?= base_url() ?>assets/images/sub.svg">
                           <?php } ?>
                           <?= $s['category_name'] ?>
                         </td>

                         <td>
                           <?= $s['description'] ?>
                         </td>
                         <td style="text-align: center;">

                           <button type="button" data-id="<?php echo $s['category_id']; ?>" class="btn btn-outline-dark alluserbtn editRecord" data-toggle="modal" data-target="#editModal">Edit
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


                           <button type="button" data-id="<?php echo $s['category_id']; ?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete
                             <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                             </svg>
                           </button>
                         </td>
                       </tr>

                       <?php if (!empty($s['sub_cat'])) {

                          foreach ($s['sub_cat'] as $sub_ct) { ?>

                           <tr>
                             <td>
                               <?php if (!empty($sub_ct['parent_category_id'])) { ?>
                                 <img src="<?= base_url() ?>assets/images/sub.svg">
                               <?php } ?>
                               <?= $sub_ct['category_name'] ?>
                             </td>

                             <td>
                               <?= $sub_ct['description'] ?>
                             </td>
                             <td style="text-align: center;">

                               <button type="button" data-id="<?php echo $sub_ct['category_id']; ?>" class="btn btn-outline-dark alluserbtn editRecord" data-toggle="modal" data-target="#editModal">Edit
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


                               <button type="button" data-id="<?php echo $sub_ct['category_id']; ?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete
                                 <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                   <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                 </svg>
                               </button>
                             </td>
                           </tr>

                           <?php if (!empty($sub_ct['child_cat'])) {
                              foreach ($sub_ct['child_cat'] as $child_ct) { ?>

                               <tr>
                                 <td>
                                   <?php if (!empty($child_ct['parent_category_id'])) { ?>
                                     <img src="<?= base_url() ?>assets/images/sub.svg"> <img src="<?= base_url() ?>assets/images/sub.svg">
                                   <?php } ?>
                                   <?= $child_ct['category_name'] ?>
                                 </td>

                                 <td>
                                   <?= $child_ct['description'] ?>
                                 </td>
                                 <td style="text-align: center;">

                                   <button type="button" data-id="<?php echo $child_ct['category_id']; ?>" class="btn btn-outline-dark alluserbtn editRecord" data-toggle="modal" data-target="#editModal">Edit
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


                                   <button type="button" data-id="<?php echo $child_ct['category_id']; ?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete
                                     <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                     </svg>
                                   </button>
                                 </td>
                               </tr>


                               <?php if (!empty($child_ct['grand_cat'])) {
                                  foreach ($child_ct['grand_cat'] as $grand_ct) { ?>
                                   <!-- <p><?php echo $grand_ct['category_name']; ?></p>   -->

                                   <tr>
                                     <td>
                                       <?php if (!empty($grand_ct['parent_category_id'])) { ?>
                                         <img src="<?= base_url() ?>assets/images/sub.svg"> <img src="<?= base_url() ?>assets/images/sub.svg"> <img src="<?= base_url() ?>assets/images/sub.svg">
                                       <?php } ?>
                                       <?= $grand_ct['category_name'] ?>
                                     </td>

                                     <td>
                                       <?= $grand_ct['description'] ?>
                                     </td>
                                     <td style="text-align: center;">

                                       <button type="button" data-id="<?php echo $grand_ct['category_id']; ?>" class="btn btn-outline-dark alluserbtn editRecord" data-toggle="modal" data-target="#editModal">Edit
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


                                       <button type="button" data-id="<?php echo $grand_ct['category_id']; ?>" class="btn btn-outline-dark alluserbtn deleteRecord">Delete
                                         <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                           <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                                         </svg>
                                       </button>
                                     </td>
                                   </tr>


                     <?php }
                                }
                              }
                            }
                          }
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


     <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered " role="document">
         <form action="<?= base_url('Cproduct/insert_category') ?>" method="post">
           <div class="modal-content">
             <div class="modal-header custommodalheader">
               <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Add a new category</h5>
               <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> -->
             </div>
             <div class="modal-body modalscroll">
               <div class="container">
                 <div class="row">
                   <div class="col-md-12 ">
                     <div class="form-group">
                       <label class="customcardlabel">Category name: </label>
                       <input type="text" class="form-control customcardinput" id="category" name="category_name" aria-describedby="" placeholder="Please enter your Category name">
                       <span class="errors" id="name_err" style="color:red; font-size:14px"></span>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group">
                       <label class="customcardlabel">Parent Category: </label>
                       <select class="form-control customcardinput" id="parent_cat" name="parent_category">
                         <option value="">--- Select Parent Category ---</option>
                         <?php foreach ($category as $c) { ?>
                           <option value="<?= $c['category_id'] ?>"><?= $c['category_name'] ?></option>
                           <?php if (!empty($c['sub_cat'])) {
                              foreach ($c['sub_cat'] as $sub_ct1) { ?>
                               <option value="<?= $sub_ct1['category_id'] ?>">
                                 <?= $c['category_name'] ?> > <?= $sub_ct1['category_name'] ?>
                               </option>
                               <?php if (!empty($sub_ct1['child_cat'])) {
                                  foreach ($sub_ct1['child_cat'] as $sub_ct2) { ?>
                                   <option value="<?= $sub_ct2['category_id'] ?>"><?= $c['category_name'] ?> > <?= $sub_ct1['category_name'] ?> > <?= $sub_ct2['category_name'] ?>
                                   </option>
                                   <?php if (!empty($sub_ct2['grand_cat'])) {
                                      foreach ($sub_ct2['grand_cat'] as $grnd_ct) { ?>
                                       <option value="<?= $grnd_ct['category_id'] ?>"> <?= $c['category_name'] ?> > <?= $sub_ct1['category_name'] ?> > <?= $sub_ct2['category_name'] ?> > <?= $grnd_ct['category_name'] ?> </option>

                         <?php }
                                    }
                                  }
                                }
                              }
                            }
                          } ?>
                       </select>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group">
                       <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description :</label>
                       <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="description" placeholder="Please enter Description"></textarea>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group">
                       <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Reorder Level :</label>
                       <input type="text" class="form-control customcardinput" id="reorder_cat_level"  name="reorder_cat_level" placeholder="Please enter Reorder Level">
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="customcardlabel">Measurement :</label>
                       <select style="min-height:92px;" class="form-control customcardinput" id="sizes" name="size_type[]" multiple="multiple">
                         <option value="0">-- Select Size --</option>
                         <option value="1">oz</option>
                         <option value="2">liter</option>
                         <option value="3">ml</option>
                       </select>
                       <span class="errors" id="sizes_err" style="color:red; font-size:14px"></span>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group" id="measurevalue" style="margin-bottom:0;">

                     </div>
                     <span class="errors" id="grpname_err" style="color:red; font-size:14px"></span>
                   </div>

                   <div class="col-md-12 ">
                     <div class="form-group" style="margin-bottom: 0px;">
                       <input type="checkbox" id="CRV" name="Applicable_CRV" value="0">
                       <label class="customcardlabel">Container Deposit</label>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group" style="margin-bottom: 0px;">
                       <input type="checkbox" id="TAX" name="Applicable_Tax" value="0">
                       <label class="customcardlabel">Taxable</label>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group" style="margin-bottom: 0px;">
                       <input type="checkbox" id="Age" name="age_restrict" value="0">
                       <label class="customcardlabel"> Age Restricted</label>
                     </div>
                   </div>

                   <div class="col-md-12 ">
                     <div class="form-group" style="margin-bottom: 0px;">
                       <input type="checkbox" id="is_EBT" name="is_EBT" value="0">
                       <label class="customcardlabel">EBT</label>
                     </div>
                   </div>

                   <!-- <div class="col-md-12 ">
                <div class="form-group" style="margin-bottom: 0px;">
                 <input type="checkbox" id="Alcoholic" name="alcoholic_type" value="0">
                 <label class="customcardlabel">Non-Alcoholic</label>
                </div>
              </div> -->

                 </div>
               </div>
             </div>
             <div class="modal-footer">
               <div style="text-align: center;">
                 <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                 <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnSave">Add</button>
               </div>

             </div>
           </div>
         </form>
       </div>
     </div>



     <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered " role="document">
         <div class="modal-content">
           <form class="delete-Role" method="post" action="<?php echo base_url('Cproduct/delete_category'); ?>">
             <div class="modal-body modalscroll">
               <div class="container">
                 <div class="row">
                   <div class="col-md-12 mt-2 mb-3 ">
                     <center><img src="<?=base_url()?>assets/images/sign.png " class="img-fluid"></center>
                     <h5 class="text-center">Are you sure to delete this record ?</h5>

                   </div>
                   <input type="hidden" name="category_id" id="delete_id" class="form-control">
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


     <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered " role="document">
         <form action="<?= base_url('Cproduct/update_category') ?>" method="post">
           <div class="modal-content">
             <div class="modal-header custommodalheader">
               <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle">Update category</h5>
               <input type="hidden" name="category_id" id="edit_category_id" class="form-control customcardinput">
             </div>
             <div class="modal-body modalscroll">
               <div class="container">
                 <div class="row">
                   <div class="col-md-12 ">
                     <div class="form-group">
                       <label class="customcardlabel">Category name: </label>
                       <input type="text" class="form-control customcardinput" id="editCategory" name="category_name" aria-describedby="" placeholder="Please enter your Category name">
                       <span class="errors" id="cname_err" style="color:red; font-size:14px"></span>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group">
                       <label class="customcardlabel">Parent Category: </label>
                       <select class="form-control customcardinput" id="edit_parent_cat" name="parent_category">
                         <option value="">--- Select Parent Category ---</option>
                         <?php foreach ($category as $c) { ?>
                           <option value="<?= $c['category_id'] ?>"><?= $c['category_name'] ?></option>
                           <?php if (!empty($c['sub_cat'])) {
                              foreach ($c['sub_cat'] as $sub_ct1) { ?>
                               <option value="<?= $sub_ct1['category_id'] ?>">
                                 <?= $c['category_name'] ?> > <?= $sub_ct1['category_name'] ?>
                               </option>
                               <?php if (!empty($sub_ct1['child_cat'])) {
                                  foreach ($sub_ct1['child_cat'] as $sub_ct2) { ?>
                                   <option value="<?= $sub_ct2['category_id'] ?>"><?= $c['category_name'] ?> > <?= $sub_ct1['category_name'] ?> > <?= $sub_ct2['category_name'] ?>
                                   </option>
                                   <?php if (!empty($sub_ct2['grand_cat'])) {
                                      foreach ($sub_ct2['grand_cat'] as $grnd_ct) { ?>
                                       <option value="<?= $grnd_ct['category_id'] ?>"> <?= $c['category_name'] ?> > <?= $sub_ct1['category_name'] ?> > <?= $sub_ct2['category_name'] ?> > <?= $grnd_ct['category_name'] ?> </option>

                         <?php }
                                    }
                                  }
                                }
                              }
                            }
                          } ?>

                       </select>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group">
                       <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Description</label>
                       <textarea class="form-control" id="editDescription" rows="2" name="description"></textarea>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group">
                       <label class="customcardlabel customcardlabel" for="exampleFormControlTextarea1">Reorder Level :</label>
                       <input type="text" class="form-control customcardinput" id="editReorder"  name="reorder_cat_level" placeholder="Please enter Reorder Level">
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group">
                       <label class="customcardlabel">Measurement</label>
                       <select style='min-height:92px!important;' class="form-control customcardinput" id="editsize" name="size_type[]" multiple="multiple">
                         <option value="0">--Select Option--</option>
                         <option value="1">oz</option>
                         <option value="2">liter</option>
                         <option value="3">ml</option>
                       </select>
                       <span class="errors" id="size_err" style="color:red; font-size:14px"></span>
                     </div>
                   </div>
                   <div class="col-md-12">
                     <div class="form-group" id="editmeasurevalue">
                     </div>
                     <span class="errors" id="grpname_err" style="color:red; font-size:14px"></span>
                   </div>

                   <div class="col-md-12 ">
                     <div class="form-group" style="margin-bottom: 0px;">
                       <input type="checkbox" id="editApplicable_CRV" name="Applicable_CRV" value="0">
                       <label class="customcardlabel">Container Deposit</label>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group" style="margin-bottom: 0px;">
                       <input type="checkbox" id="editApplicable_Tax" name="Applicable_Tax" value="0">
                       <label class="customcardlabel">Taxable</label>
                     </div>
                   </div>
                   <div class="col-md-12 ">
                     <div class="form-group" style="margin-bottom: 0px;">
                       <input type="checkbox" id="editAge" name="age_restrict" value="0">
                       <label class="customcardlabel"> Age Restricted</label>
                     </div>
                   </div>

                   <div class="col-md-12 ">
                     <div class="form-group" style="margin-bottom: 0px;">
                       <input type="checkbox" id="edit_is_EBT" name="is_EBT" value="0">
                       <label class="customcardlabel"> EBT</label>
                     </div>
                   </div>

                   <!-- <div class="col-md-12 ">
                <div class="form-group" style="margin-bottom: 0px;">
                 <input type="checkbox" id="editAlcoholic" name="alcoholic_type" value="0">
                 <label class="customcardlabel"><span id="alcohol"></span></label>
                </div>
              </div> -->

                 </div>
               </div>
             </div>
             <div class="modal-footer">
               <div style="text-align: center;">
                 <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
                 <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnUpdate">Update</button>
               </div>

             </div>
           </div>
         </form>
       </div>
     </div>
     <script src="<?= base_url() ?>assets/core/bootstrap/dist/js/bootstrap-tagsinput.min.js"></script>
     <link rel="stylesheet" href="<?= base_url() ?>assets/core/bootstrap/dist/css/bootstrap-tagsinput.css">

     <script type="text/javascript">
       $('#tbl_category').on('click', '.deleteRecord', function() {
         var delete_id = $(this).data('id');
         $('#delete_id').val(delete_id);
         $('#deleteModal').modal('show');
       });

       $('#tbl_category').on('click', '.editRecord', function() {
         var category_id = $(this).data('id');
         $.ajax({
           type: 'ajax',
           method: 'post',
           url: '<?= base_url("Cproduct/getCategoryById") ?>',
           data: {
             category_id: category_id
           },
           dataType: 'json',
           success: function(data) {
             console.log(data);
             $('#edit_category_id').val(data.category_id);
             $('#editCategory').val(data.category_name);
             $('#edit_parent_cat').val(data.parent_category_id);
             $('#editDescription').val(data.description);
             $('#editReorder').val(data.reorder_cat_level);
             // $('#editsize').val(data.measurement_type);
             var dataarray = (data.measurement_type).split(",");

             // Set the measurement value
             $("#editsize").val(dataarray);
             // Then refresh
             //$("#editsize").multiselect("refresh");

             //----get existing value----
             if (data.measurement_type != '0') {
               $.ajax({
                 type: 'ajax',
                 method: 'post',
                 url: '<?= base_url("Cproduct/geteditMeasureValue") ?>',
                 data: {
                   measureid: data.measurement_type,
                   measuregrpid: data.measurement_group,
                   measurevalue: data.measurement_value,

                 },
                 dataType: 'json',
                 success: function(data) {

                   $("#editmeasurevalue").html("");
                   $("#editmeasurevalue").append(data.measurehtml);
                   $('#extrasize_value').tagsinput({
                     allowDuplicates: false
                   });

                   console.log(data.measurehtml);


                 },
                 error: function(data) {
                   alert("error");
                 }

               });
             }

             if (data.Applicable_CRV == 1) {
               $('#editApplicable_CRV').attr('checked', true);
             } else {
               $('#editApplicable_CRV').attr('checked', false);
             }
             if (data.Applicable_Tax == 1) {
               $('#editApplicable_Tax').attr('checked', true);
             } else {
               $('#editApplicable_Tax').attr('checked', false);
             }
             if (data.age_restrict == 1) {
               $('#editAge').attr('checked', true);
             } else {
               $('#editAge').attr('checked', false);
             }
             if (data.is_EBT == 1) {
               $('#edit_is_EBT').attr('checked', true);
             } else {
               $('#edit_is_EBT').attr('checked', false);
             }
             if (data.alcoholic_type == 1) {
               $('#alcohol').text('Alcoholic');
               $('#editAlcoholic').attr('checked', true);
             } else {
               $('#alcohol').text('Non-Alcoholic');
               $('#editAlcoholic').attr('checked', false);
             }
           }
         });
       });

       $('#btnSave').click(function() {
         if ($('#category').val() == '') {
           $("#name_err").html("Please enter Category Name").show();
           return false;
         }

         if ($("#size_grp").is(':checked') && $('#group_name').val() == '') {
           $("#grpname_err").html("Please enter Group Name").show();
           return false;
         }


       });

       $('.customcardinput').bind('change', function() {
         if ($('#category').val() == '') {
           $("#name_err").html("Please enter Category Name").show();
           return false;
         } else {
           $("#name_err").html("").show();
         }
       });


       $('#btnUpdate').click(function() {
         if ($('#editCategory').val() == '') {
           $("#cname_err").html("Please enter Category Name").show();
           return false;
         }

         if ($("#size_grp").is(':checked') && $('#group_name').val() == '') {
           $("#grpname_err").html("Please enter Group Name").show();
           return false;
         }


       });


       $('#category').on('keypress', function(event) {
         var regex = new RegExp("^[a-zA-Z,& ]+$");
         var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
         if (!regex.test(key)) {
           event.preventDefault();
           $("#name_err").html("Only alphabets and symbol(,&) allowed").show();
           return false;
         } else {
           $("#name_err").html("").show();

         }
       });

       $('#editCategory').bind('change', function() {
         if ($('#editCategory').val() == '') {
           $("#cname_err").html("Please enter Category Name").show();
           return false;
         } else {
           $("#cname_err").html("").show();
         }
       });
     </script>

     <script type="text/javascript">
       $('#sizes').bind('change', function() {


         if ($(this).val() != '0') {
           $.ajax({
             type: 'ajax',
             method: 'post',
             url: '<?= base_url("Cproduct/getMeasureValue") ?>',
             data: {
               measureid: $(this).val()
             },
             dataType: 'json',
             success: function(data) {
               $("#measurevalue").html("");
               $("#measurevalue").append(data.measurehtml);
               $('#extrasize_value').tagsinput({
                 allowDuplicates: false
               });
               console.log(data.measurehtml);

             },
             error: function(data) {
               alert("error");
             }

           });
         } else {
           $("#measurevalue").html("");
         }



       });

       $('#editsize').bind('change', function() {

         if ($(this).val() != '0') {
           $.ajax({
             type: 'ajax',
             method: 'post',
             url: '<?= base_url("Cproduct/getMeasureValue") ?>',
             data: {
               measureid: $(this).val()
             },
             dataType: 'json',
             success: function(data) {
               $("#editmeasurevalue").html("");
               $("#editmeasurevalue").append(data.measurehtml);
               $('#extrasize_value').tagsinput({
                 allowDuplicates: false
               });
               console.log(data.measurehtml);

             },
             error: function(data) {
               alert("error");
             }

           });
         } else {
           $("#editmeasurevalue").html("");
         }



       });



       $(document).on('change', '#existing_grp', function() {

         var measuretype = '';

         //alert($('#sizes').val());
         if ($(this).closest("div").attr("id") == 'editmeasurevalue') {
           measuretype = $('#editsize').val();
         } else if ($(this).closest("div").attr("id") == 'measurevalue') {
           measuretype = $('#sizes').val();
         }


         if ($(this).val() != '') {

           $.ajax({
             type: 'ajax',
             method: 'post',
             url: '<?= base_url("Cproduct/getMeasureValue_grpwise") ?>',
             data: {
               measureid: measuretype,
               groupid: $(this).val(),
             },
             dataType: 'json',
             success: function(data) {
               alert(data.length);

               for (var i = 0; i < data.length; i++) {

                 $("#size_value option").each(function(a, b) {
                   if ($(this).html() == data[i]) $(this).attr("selected", "selected");
                 });
               }
             },
             error: function(data) {
               alert("error");
             }

           });
         } else {
           $("#size_value option:selected").removeAttr("selected");
         }

       });


       $(document).on('click', 'input[id=size_grp]', function() {
         //alert($(this).is(':checked'));

         if ($(this).is(':checked')) {

           $("#grptextbox").append('<input type="text" id="group_name" name="group_name" value="" class="form-control customcardinput" placeholder="Group Name"/>');

         } else {
           $('#group_name').remove()
         }
       });
     </script>
     <script type="text/javascript">
       $('#editApplicable_CRV').change(function() {
         if (this.checked) {
           $(this).val(1);
         } else {
           $(this).val(0);
         }
       });
       $('#editApplicable_Tax').change(function() {
         if (this.checked) {
           $(this).val(1);
         } else {
           $(this).val(0);
         }
       });

       $('#editAge').change(function() {
         if (this.checked) {
           $(this).val(1);
         } else {
           $(this).val(0);
         }
       });
     </script>
