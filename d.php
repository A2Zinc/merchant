<?php 
<script>
    jQuery(document).ready(function($) {
        
        <?php
if(is_front_page()){
?>

<?php
}
        ?>
        
            <?php  if($_GET['type']!='blind'){ ?>
            jQuery('#dataHeight').attr('max','300');
            jQuery('#dataHeight').attr('min','60');
            jQuery('#dataWidth').attr('min','60');
            
            jQuery('#dataWidth,#dataHeight').keyup(function(){
                changecropper();
                price_calculation();
            })
            
            function changecropper(){
                var dw=parseInt(jQuery('#dataWidth').val());
                var dh=parseInt(jQuery('#dataHeight').val());
                var ra=dw/dh;
                jQuery('#aspectRatio1').val(0.5).click();
            }
            function price_calculation(){
                var dw=parseFloat(jQuery('#dataWidth').val());
                var dh=parseFloat(jQuery('#dataHeight').val());
                
                // in mêter
                var dwm=parseFloat(jQuery('#dataWidth').val())/100;
                var dhm=parseFloat(jQuery('#dataHeight').val())/100;
                blindcost=dwm*dhm*0.45;
                jQuery('.price_total').html("$"+blindcost);
                
            }
            
            <?php } ?>
    
        <?php  if($_GET['type']=='blind'){ ?>
        	jQuery('#no_of_panel').val(1);
            jQuery('#dataHeight').attr('max','300');
            jQuery('#dataHeight').attr('min','50');
            jQuery('#dataWidth').attr('min','50');
            jQuery('.inpanel').attr('max','140');
            jQuery('.inpanel').attr('min','50');
            jQuery('#no_of_panel').attr('max','5');

            $("#no_of_panel").blur(function(){
                var Empty=jQuery('#no_of_panel').val();
            if(Empty=="" || Empty==0){
                $("#Single").prop("checked", true);
            }
            }); 
          
            jQuery('.single-product-radio-p').click(function(){
                if(jQuery(this).val()=='Multi'){
					var dataWidth=parseInt(jQuery('#dataWidth').val());
					var panels=parseInt(dataWidth/140);
					var remainder=parseInt(dataWidth)%140;
					var extrapanel=remainder>0?1:0;
					var panels=panels+extrapanel;
					jQuery('.panel-size').val(panels).change();
					jQuery('.panel-size').attr('min',panels);
                    jQuery('#panel_section').show();
                    //jQuery('#dataWidth').attr('readonly','readonly');
                    jQuery('#no_of_panel_section,#panel_section').show();
                    jQuery('#no_of_panel_section input,#panel_section input').removeAttr('disabled');
                    
                    get_panels(panels,140);
                } else{
                    jQuery('#dataWidth').removeAttr('readonly');
                    jQuery('#dataWidth').val(140);
					jQuery('#no_of_panel').val(1);
					jQuery('#panel_section').hide();
                    jQuery('#no_of_panel_section,#panel_section').hide();
                    jQuery('#no_of_panel_section input,#panel_section input').attr('disabled','disabled');
                    
                }
            })
            jQuery('#no_of_panel').keyup(function(){
                var dataWidth=parseInt(jQuery('#dataWidth').val());
                var no_of_panel=parseInt(jQuery(this).val());
                get_panels(no_of_panel,140);  
            })
            
                                        

            
            jQuery('#dataHeight').keyup(function(){
                var dw=parseInt(jQuery('#dataWidth').val());
                var dh=parseInt(jQuery('#dataHeight').val());

                if(jQuery('#dataHeight').val()<150){
                    if(dw>300){
                     jQuery('#dataWidth').val(300);   
                    }
                    jQuery('#dataWidth').attr('max','300');
                }
                changecropper();
                hideshowmulti();
                price_calculation();
            })
            
            
            jQuery('#dataWidth').keyup(function(){
                changecropper();
                hideshowmulti();
            })
			jQuery('.panel-size').keyup(function(){
			price_calculation();
			})
		
			jQuery('body').on('change','.inpanel',function(){
				var totalw=0;
				$( ".inpanel" ).each(function( index ) {
					totalw+=parseInt(jQuery(this).val());
				});
				jQuery('#dataWidth').val(totalw);					 
            })
            
            function changecropper(){
                var dw=parseInt(jQuery('#dataWidth').val());
                var dh=parseInt(jQuery('#dataHeight').val());
                var ra=dw/dh;
                jQuery('#aspectRatio1').val(0.5).click();
            }
            
            function get_panels(no_of_panel,default_width){
                jQuery('#panel_section .inner').html('');
                if(no_of_panel>5){ no_of_panel=5;  }
                for(var i=0;i<no_of_panel;i++){
                    
                    jQuery('#panel_section .inner').append('<input class="panel-size inpanel" value="'+default_width+'" type="number"  placeholder="cm" name="panel_width[]">')
                }
            }
            function hideshowmulti(){
                var dw=parseInt(jQuery('#dataWidth').val());
                var dh=parseInt(jQuery('#dataHeight').val());
                if(dw>=140 && dh>=140){
                    //disable or hide multioptions
                   // jQuery('#Single').show()
                   jQuery('#Multi').removeAttr('disabled');
				} else{
                    jQuery('#Multi').attr('disabled','disabled');
                }
            }
            function price_calculation(){
                var dw=parseFloat(jQuery('#dataWidth').val());
                var dh=parseFloat(jQuery('#dataHeight').val());
                
                // in mêter
                var dwm=parseFloat(jQuery('#dataWidth').val())/100;
                var dhm=parseFloat(jQuery('#dataHeight').val())/100;
                var blackout=jQuery('#Blackout').is(":checked")
                if(jQuery('.single-product-radio-p:checked').val()=='Multi' && jQuery('#no_of_panel').val()!=''){
                    var no_of_panel=parseInt(jQuery('#no_of_panel').val());
                } else{
                    var no_of_panel=parseInt(jQuery('#dataWidth').val()/150);
                    if(parseInt(jQuery('#dataWidth').val())%150!=0){
                        no_of_panel++;
                        
                    }
                }

                var setupcost=20.00;
                var price=50.0;
                var lm=50;
				var extra=0;
				blindcost=no_of_panel*price*dhm + setupcost*no_of_panel+extra;
				if(blackout){
					extra=0.20*blindcost;
				}
				blindcost+=extra;
				
             	
//                 var blindcost=0.0;
//                 if(dh<150){
//                     blindcost=setupcost+(dwm*price/lm);
                       
//                 } 
//                 else if(dh>150 && dw<150){
//                     blindcost=setupcost+(dhm*price/lm);
                
//                 } else{
//                     blindcost=no_of_panel*(setupcost+(dhm*price/lm))
//                 }
					 jQuery('.price_total').html("$"+blindcost);
                
            }
            
        
        <?php } ?>
        $('.toggle_btn').click(function(e) {
            $('#main_menubar').toggleClass('show');
        });

        $('#aniimated-thumbnials').lightGallery({
                download: false,
                zoomFromOrigin: false,
                zoom: false,
                scale: false,
                flipHorizontal: false,
                flipVertical: false,
                rotate: false,
                mode: 'fade',
                share : false,

            });

        $('a[href="#"]').attr("href", "javascript:void(0)");
        $('.uwp-account-notifications').parent().hide();
        $('[data-toggle="tooltip"]').tooltip();

        <?php
        if (is_product()) {
        ?>

        $(".bg-img-ctn").click(function (e) { 
            var imgData= $(this).find("img").attr("src");
            $(".big_data_img").attr("src",imgData);
            $(".big_data").removeClass("hide");
            $(".main_fetured").addClass("hide");
            $(".bg-img-ctn").removeClass("current_slide");
            $(this).addClass("current_slide");
        });
            $(".heart_choose").click(function(e) {
                $(this).toggleClass("heart");

            });


            $('input[name="mural_type"]').on('change', function() {
                $('.disable').removeClass('disable');
                $('.next_section').removeClass("hide");
            });
            $('input[name="product_type"]').on('change', function() {
                $prd_val = $(this).val();
                if ($prd_val == "Blinds") {
                    $(".only_for_blinds").show();
                    $(".only_for_blinds input").prop('required', true);
                } else {
                    $(".only_for_blinds").hide();
                    $(".only_for_blinds input").prop('required', false);
                }

            });

            $(".next_section").click(function(e) {
                $(".hide_default,.hide_default ~ *").fadeIn().css({
                    "opacity": "1",
                    "pointer-events": "auto",
                    "height": "auto"
                });
                $(".big_data").addClass("hide");
            $(".main_fetured").removeClass("hide");
                $(this).hide();
            });

            $('input[name="img_color"]').on('change', function() {
                $('div.imageDiv')
                    .removeClass('original sepia grey')
                    .addClass($(this).val());
                $(".img-container").removeClass("original").removeClass("original").removeClass("sepia").removeClass("grey");
                //alert("weork");
                $(".img-container").addClass($(this).val());
               
            });






        <?php
        }
        ?>
    });
</script>