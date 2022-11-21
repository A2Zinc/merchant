<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- bootstrap css-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/customers/style/bootstrap.min.css">
  <!-- custom_css -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/customers/style/customers.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/keyboard-basic.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/KeyboardPOSStyle.css">
</head>
<?php if($this->session->userdata['node_setting'] == 1){ ?>
<script> var node_setting = 1;</script>
<?php }else{ ?>
<script> var node_setting = 0;</script>
<?php } ?>