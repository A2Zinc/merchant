<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
</div>
<!-- ./wrapper -->

</body>
<!-- Start Core Plugins-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
<script src="<?php echo base_url() ?>assets/core/bootstrap/dist/js/bootstrap.js"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
  integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script
  src="<?php echo base_url() ?>assets/js/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js">
</script>
<script src="<?php echo base_url() ?>assets/core/select2/dist/js/select2.js"></script>


<!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/daterangepicker/daterangepicker.min.js"></script>
<!-- prashant added -->
<script type="text/javascript">
	$('#category').on('change', function() {
    var category_id = $('#category').val();

    $.ajax({
      type: "POST",
      url: '<?= base_url("Cproduct/fetch_size_type") ?>',
      data: {
        category_id: category_id
      },
      dataType: 'json',
      success: function(data) {
        console.log(data);
        var option_list = '';
        $.each(data.sizename, function(index, value) {
          //console.log(value.name);
          option_list += '<option>' + value.name + '</option>';
        });
        $('#sizes').html(option_list);


        //crv
        if (data.Applicable_CRV == 1) {
          $("#CRV").prop("checked", true);
        } else {
          $("#CRV").prop("checked", false);
        }

        // tax 

        if (data.Applicable_Tax == 1) {
          $("#TAX").prop("checked", true);
        } else {
          $("#TAX").prop("checked", false);
        }

        if (data.age_restrict == 0) {
          $('#age').hide();
          $('#restict').hide();
        } else if (data.age_restrict == 1) {
          $('#age').show();
          $('#restict').show();
        }
      },
    });

  });	

	$('#category').change(function() {
    var category_id = $(this).val();  
    // alert(category_id);
    $.ajax({
        type: "POST",
        url: '<?=base_url("Cproduct/fetch_supplier")?>',
        data: {category_id: category_id},
        dataType : 'json', 
        success : function(data){  
          console.log(data);
          var option_list = '';
            $.each(data, function(index, value){
                //console.log(value.name);
               option_list += '<option>'+value.supplier_name+'</option>'; 
            });

          $('#suppliers').html(option_list);
       },
     });

  });
</script>
<script type="text/javascript">
  $(".phoneInput").on("keyup paste", function(event) {
    // Don't run for backspace key entry, otherwise it bugs out
    if(event.which != 8){
        // Remove invalid chars from the input
        var input = this.value.replace(/[^0-9\(\)\s\-]/g, "");
        var inputlen = input.length;
        // Get just the numbers in the input
        var numbers = this.value.replace(/\D/g,'');
        var numberslen = numbers.length;
        // Value to store the masked input
        var newval = "";
        // Loop through the existing numbers and apply the mask
        for(var i=0;i<numberslen;i++){
            if(i==0) newval="("+numbers[i];
            else if(i==2) newval+=numbers[i]+") ";
            else if(i==6) newval+="-"+numbers[i];
            else newval+=numbers[i];
        }

        // Re-add the non-digit characters to the end of the input that the user entered and that match the mask.
        if(inputlen>=1&&numberslen==0&&input[0]=="(") newval="(";
        else if(inputlen>=6&&numberslen==3&&input[4]==")"&&input[5]==" ") newval+=") ";
        else if(inputlen>=5&&numberslen==3&&input[4]==")") newval+=" ";
        else if(inputlen>=6&&numberslen==3&&input[5]==" ") newval+=" ";
        else if(inputlen>=10&&numberslen==6&&input[9]=="-") newval+="-";

        $(this).val(newval.substring(0,14));

    }
});
</script>