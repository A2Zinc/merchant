<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/core/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style/notify-style.css" >
    </head>
      <style>
          .containermain1{
            width: 100%;
            height: 60px;
            z-index: 999;
            left: 0px;
            position: fixed;
            top: 0px;
            background: #FFFFFF;
          }
          body {
              width: 100%;
              height: 100%;
              background: #f1f1f1;
          }

          .logout{
              padding: .5em;
              margin-left: 0px;
              color: white;
              background: radial-gradient(155.14% 152.5% at 50% -52.5%, #FFB6B6 0%, #F85454 100%);
              word-break: break-word;
              text-align: center;
          }


          .btn-backWrapper {
              display: flex;
              align-items: center;
              justify-content: center;
              width: 50px;
              height: 50px;
              margin-top: 5px;
              border-radius: 15px;
              border: 5px;
              background: #F85454;
          }

          .notifications {
              width: 300px;
              height: 0px;
              opacity: 0;
              position: absolute;
              top: 63px;
              right: 62px;
              border-radius: 5px 0px 5px 5px;
              background-color: #fff;
              box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
              overflow-y: scroll;
              height: auto;
              max-height: 200px;
              overflow-x: hidden;
          }

          .notifications h2 {
              font-size: 14px;
              padding: 10px;
              border-bottom: 1px solid #eee;
              color: #999
          }

          .notifications h2 span {
              color: #f00;
              float:right
          }

          .notifications-item {
              display: flex;
              border-bottom: 1px solid #eee;
              padding: 6px 9px;
              margin-bottom: 0px;
              cursor: pointer
          }

          .notifications-item:hover {
              background-color: #eee
          }

          .notifications-item img {
              display: block;
              width: 50px;
              height: 50px;
              margin-right: 9px;
              border-radius: 50%;
              margin-top: 2px
          }

          .notifications-item .text h4 {
              color: #777;
              font-size: 16px;
              margin-top: 3px
          }

          .notifications-item .text p {
              color: #aaa;
              font-size: 12px
          }

          @media screen and (min-width: 1024px) {
            .notify_icon {
              margin-left: 46%;
              padding-left: 10px;
              width: 55px;
              padding-top: 10px;
              height: 55px;
              margin-right: 5px;
            }
         }
            @media only screen and (min-width: 1440px) {
                .notify_icon {
                  margin-left: 54%;
                  padding-left: 10px;
                  width: 60px;
                  padding-top: 5px;
                  height: 55px;
                  margin-right: 5px;
                }
          }

          .mainscreen {
              width: 200px;
              height: 50px;
              color: white;
              background: radial-gradient(155.14% 152.5% at 50% -52.5%, #838383 0%, #363636 100%);
              border-radius: 48px;
              margin-top: 5px;
              /* margin-right: 15px; */
          }
          a .maindes {
              color: #FFF;
          }
          .maindes {
              font-size: 18px;
              text-align: center;
              padding-top: 10px;
              /* padding-left: 10px; */
          }


       @-webkit-keyframes placeHolderShimmer {
         0% {
           background-position: -468px 0;
         }
         100% {
           background-position: 468px 0;
         }
       }

       @keyframes placeHolderShimmer {
         0% {
           background-position: -468px 0;
         }
         100% {
           background-position: 468px 0;
         }
       }

       .content-placeholder {
          display: inline-block;
          -webkit-animation-duration: 1s;
          animation-duration: 1s;
          -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
          -webkit-animation-iteration-count: infinite;
          animation-iteration-count: infinite;
          -webkit-animation-name: placeHolderShimmer;
          animation-name: placeHolderShimmer;
          -webkit-animation-timing-function: linear;
          animation-timing-function: linear;
          background: #f6f7f8;
          /* background: -webkit-gradient(linear, left top, right top, color-stop(8%, #eeeeee), color-stop(18%, #dddddd), color-stop(33%, #eeeeee)); */
          background: -webkit-linear-gradient(left, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
          background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
          -webkit-background-size: 800px 104px;
          background-size: 800px 104px;
          height: inherit;
          position: relative;
    }

          .post_data{
             padding:24px;
             border:1px solid #f9f9f9;
             border-radius: 5px;
             margin-bottom: 24px;
             box-shadow: 10px 10px 5px #eeeeee;
           }

      </style>
    <body>
        <div class="containermain1">
            <div class="row d-flex justify-content-between w-100" style="flex-wrap: nowrap;">
                <div class>
                    <div class="logobar " style="width: 200px;padding-top: 0px;height: 59px;padding-left: 15px;">
                      <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                        <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
                      <?php }else{?>
                        <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
                      <?php }?>
                    </div>
                </div>
                <?php if (!empty($this->session->userdata['shiftdata'])){?>
                  <div class="icon notify_icon notifi" id="bell"> <img src="<?php echo base_url(); ?>assets/images/notification.png" alt="" id="bell2" style="max-width: 100%;"> </div>
                <?php }?>
                <div class="notifications" id="box">

                </div>


                <?php if (!empty($this->session->userdata['shiftdata'])){?>
                 <div class=" d-flex align-items-center mrem1">
                    <div class="logout">
                       <p style="margin:0;">Logged In : <?php if(strlen($this->session->userdata['shiftdata']['name']) > 13 ){ echo substr($this->session->userdata['shiftdata']['name'], 0, 13) . '...'; }else{ echo $this->session->userdata['shiftdata']['name'];}?></p>
                    </div>
                </div>
                <?php }?>

               <div class="mainscreen">
                 <a href="<?php echo base_url(); ?>cashier">
                  <p class="maindes">MAIN SCREEN</p>
                 </a>

               </div>


            </div>

        </div>
        <section style="background: #F1F1F1;margin-top: 71px; ">
          <div class="container" >
                  <div class="col-md-12" id="load_data">
                  </div>
                  <div id="load_data_message"></div>
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
          </div>
        </section>
    </body>
</html>
<script src="<?php echo base_url(); ?>assets/cashier/js/jquery-3.5.1.js"></script>

<script>
  $(document).ready(function(){

    var limit = 7;
    var start = 0;
    var action = 'inactive';

    function lazzy_loader(limit){
      var output = '';
      for(var count=0; count<limit; count++){
          output += '<div class="post_data">';
          output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
          output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
          output += '</div>';
      }
      $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start){
        $.ajax({
          url:"<?php echo base_url(); ?>cashier/Cashier/fetch_notification",
          method:"POST",
          data:{limit:limit, start:start},
          cache: false,
          success:function(data){
              if(data == ''){
                $('#load_data_message').html('<h3>No More Result Found</h3>');
                action = 'active';
              }else{
                $('#load_data').append(data);
                $('#load_data_message').html("");
                action = 'inactive';
              }
          }
        })
    }

    if(action == 'inactive'){
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive'){
          lazzy_loader(limit);
          action = 'active';
          start = start + limit;
          setTimeout(function(){
            load_data(limit, start);
          }, 1000);
      }
    });

  });
</script>
<script>

$(document).ready(function(){
    var down = false;
    $('#bell').click(function(e){
        var color = $(this).text();
        if(down){
          $('#box').css('height','0px');
          $('#box').css('opacity','0');
          down = false;
        }else{
          $('#box').css('height','auto');
          $('#box').css('opacity','1');
          down = true;
        }
   });

});
$(document).on('click','#bell',function(){

  var shift_sess = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
    $.ajax({
        type: 'ajax',
        method: 'post',
        url: '<?php echo base_url("cashier/user_notification"); ?>',
        data: {user_id : shift_sess},
        dataType: 'json',
        success: function(data) {
          console.log(data);
            if(data == '' ){
                $('#box').html('No Records Found');
            }else{
                $('#box').html(data);
            }
        }
    });
});

$(document).on('click','#btnMain',function(){
  window.location= '<?=base_url('cashier')?>'
});
</script>
