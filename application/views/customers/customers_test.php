<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous">
    <style>
    .body{
        margin: 0%;
        padding: 0%;
        font-family: "Circular Std Book";
        font-size:14px;
        width:100vw;
        height:100vh;
    }
    .container{
        display: flex;
        flex-direction: row;
        background-color:#fff;

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
        padding-top: 90px;
        height: 35vh;
        background: #260707;
        color: #ffffff;
        width:35vw;
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
        width:34.8vw;
        height: 65vh;
    }
    .right{
        float: right;
        width:65vw;
        height:65vh;
    }
    .right-lf{
        width:50%;
        height: 65vh;
        padding-top:7vh;
        padding-left: 3.1vw;
        float: left;
    }
    .right-rg{
        width:50%;
        height: 65vh;
        float: right;
        padding-left: 25px;
    }
    .down-app{
        color: #ffffff;
        font-size: 2rem;
        line-height: 2.4rem;
        margin-top: 10px;
        text-transform: uppercase;
        font-weight: 500;
    }
    .dummy{
        color: #ffffff;
        font-size: 1.15rem;
        padding-right: 15px;
    }


    @media screen and (max-width: 1028px) {
    .down-app{
      font-size: 1.8rem;
    }
    .dummy{
        font-size: 1rem;
    }
    .right-rg img{
        max-height: 36vh;
        width: 22vw;
    }
    .right-lf{
        width:55%;
    }
    .right-rg{
        width: 45%;
    }

}
</style>
</head>
<body class="signback1">
    <div class="container ">
        <div class="left">
            <div >
                <div class="table ">
                    <table>
                       <tr>
                         <th>items</th>
                         <th style="text-align: center;">amount</th>
                       </tr>
                       <tr> <td style="text-align: left;"><span style="padding:0px 15px;">1</span> x  JAMESON Irish Whiskey</td><td style="width:10%;">$1,000</td></tr>
                       <tr> <td style="text-align: left;"><span style="padding:0px 15px;">1</span> x  Tul Blended Whiskey</td><td style="background: #FFEEEE;width:10%;">$1,000</td></tr>
                       <tr> <td style="text-align: left;"><span style="padding:0px 15px;">3</span> x  JAMESON Irish Whiskey</td><td style="width:10%;">$1,000</td></tr>
                       <tr> <td style="text-align: left;"><span style="padding:0px 15px;">1</span> x  JAMESON Irish Whiskey</td><td style="background: #FFEEEE;width:10%;">$1,000</td></tr>
                       <tr> <td style="text-align: left;"><span style="padding:0px 15px;">4</span> x  JAMESON Irish Whiskey</td><td style="width:10%;">$1,000</td></tr>
                       <tr> <td style="text-align: left;"><span style="padding:0px 15px;">2</span> x  JAMESON Irish Whiskey</td><td style="background: #FFEEEE;width:10%;">$1,000</td></tr>
                       <tr> <td style="text-align: left;"><span style="padding:0px 15px;">1</span> x  JAMESON Irish Whiskey</td><td>$1,000</td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="right"style="background: #FBB138;" >
            <div  >
                <div class="right-lf">
                    <img src="<?=base_url('assets/images/teams-image_1.png')?>"  alt=""style="box-sizing: border-box; background:#fff;padding:13px;border-radius:17px;height: 16vh;width: 7.7vw;margin-left:8px;"/>
                    <p class="down-app">Download the<br> Mobile App Now!</p>
                    <p class="dummy">Lorem ipsum dolor sit amet, consectetur elit, sed do incididunt aliqua.</p>
                    <img src="<?=base_url('assets/images/teams-image_3.png')?>" alt="" width="95" height="95" style="margin-top: 15px;"/>
                </div>
                <div class="right-rg">
                 <img src="<?=base_url('assets/images/teams-image_2.png')?>" alt="" style="height: 42vh;width:21vw;margin-top: 90px;z-index: 99.999;"/>
                 <!-- <img class="ellipse1" src="http://localhost/POS/a2zpos-web/uploads/products/ellipse_2.png" alt=""/>
                 <img class="ellipse2" src="http://localhost/POS/a2zpos-web/uploads/products/ellipse_3.png" alt=""/> -->
                </div>
            </div>
        </div>
    </div>

    <div style="width:100vw;">
        <div class="container">
            <div class="lf-div">
                <ul style="list-style: none;">
                    <li> Sub Total<span class="label ">$ 18,000.00</span> </li>
                    <hr class="new1">
                    <li> Discount <span class="label">$ 18,000.00</span> </li>
                    <hr class="new1">
                    <li> Tax <span class="label">$ 7,900.00</span> </li>
                    <hr class="new1">
                    <li> CRV <span class="label">$ 7,900.00</span> </li>
                    <li style="background:#513939;box-sizing: border-box;width:92%;height: 35px;border-radius: 2px;margin-top: 8px;padding-left:5px;"><b> Total <span class="label" style="padding-right: 10px!important;">$3,000</span></b> </li>

                </ul>
            </div>
            <div class="rg-div ">
               <div style="display: flex;flex-direction: row;margin-top: 10px;">
                <h1 class="new-cust">Are You A New Customer ??</h1>
                <button class="reg-btn">Register Now</button></div>
                <p class="offers">Register & get exciting offers</p>
                <p style="font-size:16px;line-height:24px;font-weight:500;color: #616161;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </body>
    </html>


</body>
</html>
