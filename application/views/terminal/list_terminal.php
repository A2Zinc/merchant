<div class=" container-fluid mt20">
  <div class="row">
    <div class="col-md-12">
      <div class="customcard">
        <div>
          <div class="usercardheader">
            <p class="text-nowrap">All Terminal</p>
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <div id="message"></div>
            </div>
          </div>
          <div class="customcardbody2 ">
            <div class="table-responsive">
              <table class="table table-striped table-sm" id="customer_table">
                <thead>
                    <tr>
                        <th>Merchant ID</th>
                        <th>Terminal ID</th>
                        <th>Store ID</th>
                        <th>Mac Address</th>                        
                        <th>Status</th>
                        <th>Added on</th>
                        <th style='display: none;' style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  if (!empty($terminals)) {
                    foreach ($terminals as $terminal) { ?>
                      <tr>
                        <td><?php print $terminal['merchant_id']; ?></td>
                        <td><?php print $terminal['terminal_id']; ?></td>
                        <td><?php print $terminal['store_id']; ?></td>
                        <td><?php print $terminal['mac_address']; ?></td>
                        
                        <td><?php if ($terminal['is_deleted'] == '0') { ?><span class="badge greenbadge">Active</span><?php } else { ?><span class="badge redbadge">Inactive</span><?php } ?></td>
                        <td><?= date('M d,Y', strtotime($terminal['created_at'])) ?></td>

                        <td  style='display: none;'>                          
                          <a href="<?= base_url('Ccustomer/edit_customer?customerid=' . $customer['customer_id']) ?>" type="button" class="btn btn-outline-dark alluserbtn">Edit
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
                          </a>
                          <button type="button" class="btn btn-outline-dark alluserbtn deleteRecord" data-id="<?= $customer['customer_id'] ?>" data-toggle="modal" data-target="#deleteModal">Delete
                            <svg class="delete" width="22" height="16" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M1 16C1 17.1 1.9 18 3 18H11C12.1 18 13 17.1 13 16V4H1V16ZM14 1H10.5L9.5 0H4.5L3.5 1H0V3H14V1Z" />
                            </svg>
                          </button>

                        </td>
                      </tr>
                  <?php }
                  } ?>

                </tbody>
              </table>
              <!-- modal -->

            </div>

          </div>
          <div class="dataTables_paginate paging_simple_numbers d-flex justify-content-center pagiMarks align-items-center" id="dataTableExample4_paginate">
            <?php echo $links; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>