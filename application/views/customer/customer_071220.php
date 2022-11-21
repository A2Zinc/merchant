<div class=" container-fluid mt20">
                <div class="row">
                    <div class="col-md-12">
                        <div class="customcard">
                            <div>
                                <div class="usercardheader">
                                    <p>All Customers</p>
                                    <a href="<?=base_url('Ccustomer')?>" type="button" class="btn btn-outline-dark alluserbtn adduserbtn">Add 
                        
                                        <svg class="add" width="22" height="16" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13.125 10.5C15.0588 10.5 16.625 8.93375 16.625 7C16.625 5.06625 15.0588 3.5 13.125 3.5C11.1912 3.5 9.625 5.06625 9.625 7C9.625 8.93375 11.1912 10.5 13.125 10.5ZM5.25 8.75V6.125H3.5V8.75H0.875V10.5H3.5V13.125H5.25V10.5H7.875V8.75H5.25ZM13.125 12.25C10.7887 12.25 6.125 13.4225 6.125 15.75V17.5H20.125V15.75C20.125 13.4225 15.4613 12.25 13.125 12.25Z" />
                                            </svg>
                                    </a>        
                                </div>
                                <div class="customcardbody2 ">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Customer Name
                                                    </th>
                                                    <th>Email</th>
                                                    <th>Contact number
                                                    </th>
                                                    <th>Address
                                                    </th>
                                                    <th>Total sale

                                                    </th>
                                                    <th>Status
                                                    </th>
                                                    <th>Added on

                                                    </th>
                                                   
                                                   
                                                    <th style="text-align: center;">Action</th>

                                                </tr>
                                                <!-- tr -->

                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge greenbadge">Active</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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
                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge redbadge">Inactive</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"  
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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
                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge redbadge">Inactive</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"  
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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
                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge redbadge">Inactive</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"  
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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
                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge redbadge">Inactive</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"  
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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

                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge redbadge">Inactive</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"  
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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
                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge redbadge">Inactive</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"  
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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
                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge redbadge">Inactive</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"  
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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
                                                <tr>
                                                    <!-- <th scope="row"></th> -->
                                                    
                                                    <td>Customer 1</td>
                                                    <td>customer1@gmail.com</td>
                                                    <td>+911231234</td>

                                                      <td>201/2 LA</td>
                                                      <td>$100</td>
                                                      <td> <span class="badge redbadge">Inactive</span></td>
                                                    <td>July 20 , 2020</td>
                                          
                                                    
                                                
                                                 

                                                    <td style="text-align: center;">
                                                        <button onclick="viewcustomer()"  
                                                            type="button" class="btn btn-outline-dark alluserbtn">View
                                                            <svg class="eye" width="22" height="16" viewBox="0 0 22 16"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11 0.5C6 0.5 1.73 3.61 0 8C1.73 12.39 6 15.5 11 15.5C16 15.5 20.27 12.39 22 8C20.27 3.61 16 0.5 11 0.5ZM11 13C8.24 13 6 10.76 6 8C6 5.24 8.24 3 11 3C13.76 3 16 5.24 16 8C16 10.76 13.76 13 11 13ZM11 5C9.34 5 8 6.34 8 8C8 9.66 9.34 11 11 11C12.66 11 14 9.66 14 8C14 6.34 12.66 5 11 5Z" />
                                                            </svg>
                                                        </button>
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


                                            </tbody>
                                        </table>
                                        <!-- modal -->
                                    
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>