<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cashier - LWT POS System</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/core/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/customstyle.css">
    <!-- commoncss -->
    <!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/commonstyle.css"> -->
    <!-- slick -->
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>application/views/website/themes/shatu/assets/plugins/slick/slick.css">
    <link rel="stylesheet"  type="text/css" href="<?php echo base_url(); ?>application/views/website/themes/shatu/assets/plugins/slick/slick-theme.css">

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/KeyboardPOSStyle.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/dashboard.scss">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/keyboard-basic.css">
    <link href="<?php echo base_url(); ?>assets/cashier/icon/fontawesome/css/all.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/core/select2/dist/css/select2.css" rel="stylesheet" />
    <link  rel="stylesheet" src="<?php echo base_url(); ?>assets/cashier/bootstrap-datepicker/bootstrap-datepicker.css"></link>
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/cashier/style/datatable@1.10.22/jquery.dataTables.css"/>

    <link rel="shortcut icon" href="<?php echo base_url().$this->session->sitefavicon; ?>" type="image/x-icon">

    <link rel="stylesheet" href="<?=base_url()?>assets/style/simple-notify.min.css" />

    <!-- slick -->



    <script src="<?php echo base_url(); ?>assets/cashier/js/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url(); ?>assets/cashier/js/bootstrap.min.js"></script>



    <script src="<?php echo base_url(); ?>assets/cashier/js/jquery-3.5.1.min.js"></script>


    <script src="<?=base_url()?>assets/cashier/js/datatable@1.10.22/jquery.dataTables.js"></script>

    <script src="<?php echo base_url(); ?>assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/cashier/js/cashier.js"></script>
    <script src="<?php echo base_url(); ?>assets/cashier/js/KeyboardPOS.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/simple-notify.min.js"></script>
</head>
<body>
<div id="overlay" style="display: none;"></div>

<?php if($this->session->userdata['node_setting'] == 1){ ?>
<script> var node_setting = 1;</script>
<script src="http://localhost:3000/socket.io/socket.io.js?EIO=4&transport=websocket"></script>
<?php }else{ ?>
<script> var node_setting = 0;</script>
<?php } ?>
<input type="hidden" name="shift_user_id_node" id="shift_user_id_node" value="<?php echo $this->session->userdata['shiftdata']['username']; ?>">

<script type="text/javascript">

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
</script>

<style>
  .dynamic_font_size{
    font-size: <?php echo  $this->dymamic_size; ?>px !important;
  }
  .dynamic_font_size_err{
    font-size: <?php echo  $this->dymamic_size - 4; ?>px !important;
  }
  /* .dynamic_font_header1{
    font-size: <?php echo  $this->dymamic_size + 4; ?>px !important;
  } */
  /*.dynamic_font_header2{
    font-size: <?php echo  $this->dymamic_size + 2; ?>px !important;
  }*/
  input::placeholder {
  font-size:<?php echo  $this->dymamic_size; ?>px !important;
  }
  textarea::placeholder {
  font-size:<?php echo  $this->dymamic_size; ?>px !important;
  }
</style>
