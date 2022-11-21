<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/pos2.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/core/select2/docs/themes/learn2/css/font-awesome.min.css">
    <link rel="shortcut icon" href="<?php echo base_url().$this->session->sitefavicon; ?>" type="image/x-icon">
    <title>Ring Sales</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/core/vendor/jquery-3.4.1.min.js"></script>

    <!-- jQuery Modal -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/jquery.modal.min.css" />
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->

    <link rel="stylesheet" href="<?=base_url()?>assets/style/simple-notify.min.css" />
    <script src="<?php echo base_url(); ?>assets/js/simple-notify.min.js"></script>

    <?php if($this->session->userdata['node_setting'] == 1){ ?>
    <script> var node_setting = 1;</script>
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <?php }else{ ?>
    <script> var node_setting = 0;</script>
    <?php } ?>
    <script src="<?php echo base_url(); ?>assets/cashier/js/POS.js"></script>
    <script type="text/javascript">
      var base_url ="<?php echo base_url(); ?>";
      $("#custom-close").modal({
  closeClass: 'icon-remove',
  closeText: '!'
});
    </script>
</head>
<body >
<input type="hidden" name="shift_user_id_node" id="shift_user_id_node" value="<?php echo $this->session->userdata['shiftdata']['username']; ?>">
<div id="overlay" style="display: none;"></div>
<script type="text/javascript">
    // node setting - ST

if(node_setting == 1){
    var socket,strokes = [],currentStroke = null;
    //socket = io.connect("http://localhost:3000");
    socket = io("http://localhost:3000",{transports: ['websocket', "polling"],rememberUpgrade:true,upgrade: false});
    //socket = io("http://localhost:3000",{transports: ['websocket'], upgrade: false});
    const users = [];

    $(document).ready(function(){
      setTimeout( function (){
        var username = $('#shift_user_id_node').val();
        if(username!=''){
          //alert(socket.id);
          data = '{"socketId":"'+socket.id+'","user_id":"'+username+'"}';
          socket.emit('user_connect',JSON.parse(data));

        }
      },5000);
    });
}
    // node setting - EN

</script>
