
    <style>
        body{
            margin: 0%;
            padding: 0%;
            font-family: "Circular Std Book";
            font-size:14px;
            width:100vw;
            height:100vh;
            font-family: var(--bs-font-sans-serif);
        }
        .container{
            display: flex;
            flex-direction: row;
            background-color:#fff;
            padding: 0px;
        }
        th{
            text-transform: uppercase;  
            background: #D62127;
            color:#fff;
            font-size: 1.1rem;
            line-height: 24px;
            font-weight: 500;
            padding: 12px;
        }
        td{
            text-align: center;
            line-height: 40px;
            font-size: 0.8rem;
            font-weight: 600;
        }
        table{
            width: 100%;
            border-bottom:#EFEFEF;
        }
        .label {
         display: inline;
         float: right;
         padding-right: 30px;
        }
        .reg-btn{
            float: right;
            border: none;
            margin-top: 15px;
            background: #D62127;
            color: #ffffff;
            padding:0px 5px;
            margin-left:35px;
            height: 41px;
            border-radius: 2px;
            font-size: 17px;
            font-weight: 600;
            width:20%
        }

        .reg-btn-sbmt{
            border: none;
            background: #D62127;
            padding:0px 33px;
            color: #ffffff;
            height: 41px;
            border-radius: 2px;
            font-size: 17px;
            font-weight: 600;
            float: right;
            margin-right: 0px;
        }
        .new-cust{
            font-size: 1.65rem !important;
            line-height: 25px;
            margin-top: 25px;
            margin-bottom:20px;
            text-transform: uppercase;
            font-weight: 700;
            color: #000;
            min-width:70%;
        }
        
        .offers{
            font-size: 1.12rem;
            font-style: normal;
            font-weight: 500;
            line-height: 24px;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-top: 25px;
            color: #D62127;
        }
        .lf-div{
            font-size: 0.9rem;
            font-style: normal;
            font-weight: 450;
            line-height: 28px;
            letter-spacing: 0px;
            padding-top: 72px;
            padding-bottom: 5px;
            background: #260707;
            color: #ffffff;
           
        }
        .rg-div{
            width:65vw;
            height:35vh;
            padding: 0px 15px;
        }
        hr.new1 {
             border-top: 1px dotted #ffffff !important;
             opacity: 0.2;
             margin: 0px !important;
             width: 92.5%;
        }
        .table th:last-child{
            background: #B61A20;
        }
        .table th{
            height:50px;
        }
        .table td{
            padding: 0px !important;
        }
        .left{
            float: left;
            width:35vw;
            height: 65vh;
        }
        .right{
            float: right;
            width:65vw;
            height:65vh;
        }

        .customer_details p{
            font-size: 1.5em;
            font-weight: 500;
        }
       
    </style>
    <script src="<?php echo base_url(); ?>assets/cashier/js/bootstrap.min.js"></script> 
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
     <script type="text/javascript">
      var base_url ="<?php echo base_url(); ?>";
    </script>
</head>
<body class="signback1">    
<div class="container">
    <div class="row">
        <div class="col-md-4" style="padding: 0px;">
            <div class="" style="min-height: 330px;">
                <div >
                    <div class="table ">
                        <table >    
                        <thead>
                           <tr>    
                             <th>items</th>
                             <th style="text-align: center;">amount</th>
                           </tr>
                        </thead>
                        <tbody id="customer_append_product"></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="lf-div" style="width:100%;bottom:0px;">
                    <ul style="list-style: none;">
                        <li> Sub Total<span class="label" id="cart_sub_total"></span> </li>
                        <li><hr class="new1"></li>
                        <li> Discount <span class="label" id="cart_discount"></span> </li>
                        <li><hr class="new1"></li>
                        <li> Loyalty Discount <span class="label" id="redeem_points_discount"></span> </li>
                        <li><hr class="new1"></li>
                        <li> Tax <span class="label" id="cart_tax"></span> </li>
                        <li><hr class="new1"></li>
                        <li> CRV <span class="label" id="cart_crv"></span> </li>
                        <li id="cart_cash_back_tr" style="display: none;"> Cashback <span class="label" id="cart_cash_back" ></span> </li>
                        <li><hr class="new1"></li>
                        <li id="cart_cash_back_fee_tr" style="display: none;"> Cashback fee <span class="label" id="cart_cash_back_fee" ></span> </li>
                        <li><hr class="new1"></li>
                        <li style="background:#513939;box-sizing: border-box;width:92%;height: 35px;border-radius: 2px;margin-top: 8px;padding-left:5px;"><b> Total <span class="label" style="padding-right: 10px!important;" id="cart_grand_total"></span></b> </li>
                    </ul>
            </div>
        </div>
        <div class="col-md-8" id="before_login" style="padding: 0px 0px 0px 0px;">
            <div class="promotion before_login_detail" >
                <img src="<?php echo base_url(); ?>assets/customers/images/ad.png"  alt=""style="border:4px solid #000;width:100%; height:62vh;"/>
            </div> 
            <div class="">
               <div style="display: flex;flex-direction: row;margin-top: 10px;"> 
                    <div class="row" style="padding-left: 20px;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-8">
                                <input class="form-control" placeholder="Enter Mobile Number" name="customer_mobile_no" id="customer_mobile_no" onkeyup="this.value = formatPhoneNumber(this.value)">
                            </div>
                            <div class="col-md-4">
                                <button class="reg-btn-sbmt search_mobile_number">Submit</button>
                            </div>
                        </div>
                        <span id="invalid_number" style="color: red;display: none;">Invalid number</span>
                        <span id="valid_number" style="color: green;display: none;">login successfully!!</span>
                    </div>
                    
                    <div class="col-md-12" id="">
                        <h1 class="new-cust">Are You A New Customer ??</h1>
                        <button class="reg-btn">Register Now</button>
                        <p class="offers">Register & get exciting offers</p>
                        <p style="font-size:16px;line-height:24px;font-weight:500;color: #616161;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                    </div>
                </div>    
            </div>
        </div>
        <div class="col-md-8 customer_details" id="after_login" style="padding: 0px 0px 0px 10px;display: none;">
            
                <h1 class="offers new-cust" style="text-align: center;color: #D62127;font-weight: 700;margin: 40px 0px;">Wellcome <span id="customer_name"></span></h1>
                <div class="row">
                    <div class="col-md-6">
                        <p class="">name    : <span id="customer_detail_name"></span></p>
                        <p class="">email   : <span id="customer_email"></span></p>
                        <p class="">Phone   : <span id="customer_phone"></span></p>
                        <p class="">Address : <span id="customer_address"></span></p>
                    </div>
                    <div class="col-md-6">
                        <p class="">Total Points : <span id="total_point"></span></p>
                        <p class="">Account Balance: $<span id="acount_balance"></span></p>        
                    </div>
                </div>
                
                <!-- <p style="font-size:16px;line-height:24px;font-weight:500;color: #616161;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
             -->
        </div>



            
    </div>
    <!-- <div class="row">
        <div class="col-md-6" >
            <div class="promotion before_login_detail" >
                <img src="<?php echo base_url(); ?>assets/customers/images/ad.png"  alt=""style="border:4px solid #000;width:100%; height:65vh;"/>
            </div> 
            <div class="col-md-12" id="after_login" style="display: none;">
                <h1 class="offers new-cust" style="text-align: center;">Wellcome Ravi</h1>
                <div class="row">
                    <div class="col-md-6">
                        <p class="">name : ravi sanchaniya</p>
                        <p class="">email : ravi.sanchaniya@gmail.com</p>
                        <p class="">Phone : (987) 978-7971</p>
                    </div>
                    <div class="col-md-6">
                        <p class="">Total Points : <span>500</span></p>
                        <p class="">Account Balance: $<span>500</span></p>        
                    </div>
                </div>
                
                <p style="font-size:16px;line-height:24px;font-weight:500;color: #616161;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>    
        </div>
        <div class="col-md-6">
           <div class="before_login_detail" style="display: flex;flex-direction: row;margin-top: 10px;"> 
                <div class="row">
                <div class="col-md-12">
                    <input class="form-control" placeholder="Enter Mobile Number" name="customer_mobile_no" id="customer_mobile_no" onkeyup="this.value = formatPhoneNumber(this.value)">
                    <button class="reg-btn search_mobile_number">Submit</button>
                    <span id="invalid_number" style="color: red;display: none;">Invalid number</span>
                    <span id="valid_number" style="color: green;display: none;">login successfully!!</span>
                </div>
                
                <div class="col-md-12" id="">
                    <h1 class="new-cust">Are You A New Customer ??</h1>
                    <button class="reg-btn">Register Now</button>
                    <p class="offers">Register & get exciting offers</p>
                    <p style="font-size:16px;line-height:24px;font-weight:500;color: #616161;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                </div>
            </div>    
        </div>
    </div> -->
</div>   

<div style="width:100%;">
    <div class="container">
        <!-- <div class="lf-div">
            <ul style="list-style: none;">
                <li> Sub Total<span class="label" id="cart_sub_total"></span> </li>
                <li><hr class="new1"></li>
                <li> Discount <span class="label" id="cart_discount"></span> </li>
                <li><hr class="new1"></li>
                <li> Loyalty Discount <span class="label" id="redeem_points_discount"></span> </li>
                <li><hr class="new1"></li>
                <li> Tax <span class="label" id="cart_tax"></span> </li>
                <li><hr class="new1"></li>
                <li> CRV <span class="label" id="cart_crv"></span> </li>
                <li id="cart_cash_back_tr" style="display: none;"> Cashback <span class="label" id="cart_cash_back" ></span> </li>
                <li><hr class="new1"></li>
                <li id="cart_cash_back_fee_tr" style="display: none;"> Cashback fee <span class="label" id="cart_cash_back_fee" ></span> </li>
                <li><hr class="new1"></li>
                <li style="background:#513939;box-sizing: border-box;width:92%;height: 35px;border-radius: 2px;margin-top: 8px;padding-left:5px;"><b> Total <span class="label" style="padding-right: 10px!important;" id="cart_grand_total"></span></b> </li>

                
            </ul>
        </div>
        <div class="rg-div ">
           <div class="before_login_detail" style="display: flex;flex-direction: row;margin-top: 10px;"> 
                <div class="row">
                <div class="col-md-12">
                    <input class="form-control" placeholder="Enter Mobile Number" name="customer_mobile_no" id="customer_mobile_no" onkeyup="this.value = formatPhoneNumber(this.value)">
                    <button class="reg-btn search_mobile_number">Submit</button>
                    <span id="invalid_number" style="color: red;display: none;">Invalid number</span>
                    <span id="valid_number" style="color: green;display: none;">login successfully!!</span>
                </div>
                
                <div class="col-md-12" id="">
                    <h1 class="new-cust">Are You A New Customer ??</h1>
                    <button class="reg-btn">Register Now</button>
                    <p class="offers">Register & get exciting offers</p>
                    <p style="font-size:16px;line-height:24px;font-weight:500;color: #616161;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                </div>
                </div>
            </div>    
        </div> -->
    </div>
</div>
  <script src="<?php echo base_url(); ?>assets/customers/js/main.js"></script>
</body>
</html>
