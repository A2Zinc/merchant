/**

 * @author Ravi Sanchaniya

 */


jQuery(document).ready(function(){

	//user

	jQuery(document).on("keypress", "#read_barcode", function(e){

		 if(e.which == 13) {
  //       	alert('You pressed enter!');
  //   	}

		var barcode = $("#read_barcode").val();
		// alert(base_url);

		if(barcode!=''){


			jQuery.ajax({

			type : "POST",

			dataType : "json",

			url : base_url+"cashier/scanUPC",

			data : { barcode : barcode }

			}).done(function(data){
				console.log(data);
				//alert(data.products[0].product_id);  //css("color:red");
				if(data.success== 'yes'){
					if(data.products[0].status == 'update'){

						$('#tbl_inventory_filter input').val(barcode);
						$('#'+data.products[0].product_id).addClass('product-select');
						$('#tbl_inventory_filter input').blur();
						//$('#'+data.products[0].product_id).scrollTop($('#'+data.products[0].product_id)[0].scrollHeight);
						$('#tbl_inventory_filter input').trigger('click');

						// $('.inventory-list').removeClass('product-select');
						// $('#'+data.products[0].product_id).addClass('product-select');
						// //$('#'+data.products[0].product_id).scrollTop($('#'+data.products[0].product_id)[0].scrollHeight);

						// var container = $('tbody'), scrollTo = $('#'+data.products[0].product_id);

		    //             container.animate({
		    //                 scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop()
		    //             });
					}else{
						//console.log(JSON.stringify(data));
						$('#product_name').val(data.products[0].product_name);
						$('#nickname').val(data.products[0].product_name);
						$('#brand').val(JSON.stringify(data.products[0].brand));
						$('#details').val(data.products[0].description);
						$('#quantity').val(data.products[0].package_quantity);
						$('#brand').val(data.products[0].brand);
						$('#size').val(data.products[0].size);
						$('#unit').val(data.products[0].unit);
						$('#details').val(data.products[0].product_details);
						$('#tilte').val(data.products[0].meta_title);
						$('#Meta_Key').val(data.products[0].meta_key);
						$('#Description').val(data.products[0].meta_description);

						$('#abv').val(data.products[0].abv);
						$('#proof').val(data.products[0].proof);
						$('#region').val(data.products[0].region);

						$('#supplier_price').val(data.products[0].supplier_price);
						$('#store_sell_price').val(data.products[0].store_sell_price);
						$('#ecommerce_sell_price').val(data.products[0].ecomm_sell_price);

						//$('#category').val();
						$("#category").val(data.products[0].category_id);
						$('#producer').val(data.products[0].manufacturer);
		            	$('#product-img').attr('src', data.products[0].images[0]);
		            	$('#product_hidden_img').val(data.products[0].images[0]);
						//hidden value
						$('#barcode_formats').val(data.products[0].barcode_formats);
						$('#case_upc').val(data.products[0].barcode_number);
						$('#barcode_type').val(data.products[0].barcode_type);
						$('#mpn').val(data.products[0].mpn);
						$('#barcode_json').val(JSON.stringify(data));
					    // e.preventDefault();
						$("#upc_form").submit();
					}
				}else{

					// swal({
     //                    title: "Opps!",
     //                    text: "Product Not Found.",
     //                    icon: "error",
     //                    buttons: false,
     //                })

     //                alert('test');

				swal({
					  title: "Oops!",
					  text: "Product Not Found.",
					  icon: "warning",
					  buttons: {
					  	catch: {
					      text: "Add Product",
					      value: "catch",
					    },
					    cancel: "Cancel",

							//default:

					  },
				})
				.then((value) => {
				  switch (value) {


				    case "catch":
				      window.location.href = base_url+"cashier/inventoryadd?upc="+barcode;
				      break;

				    default:
								$("#read_barcode").focus();
				  }
				});


				}

				$("#read_barcode").val('');

			});

		}
	}

	});


	// ST - Report JS
	/*jQuery(document).on("change", "select[name='payout_summary_type']", function( ) {
		var payout_summary_type = jQuery(this).val();
		$("#payout_summary_heading").empty();
		$("#payout_summary_heading").html(jQuery(this).find(":selected").text());

		if(payout_summary_type == "s") {
			$("#scratcher_payout_summary").show();
			$("#employee_payout_summary,#vendor_payout_summary").hide();
		} else if(payout_summary_type == "e") {
			$("#employee_payout_summary").show();
			$("#scratcher_payout_summary,#vendor_payout_summary").hide();
		} if(payout_summary_type == "v") {
			$("#vendor_payout_summary").show();
			$("#employee_payout_summary,#scratcher_payout_summary").hide();
		}
	});*/

	jQuery(document).on("change", "select[name='frequently_sold_items']", function( ) {
		var cat_id = jQuery(this).val();
		jQuery(".frequently_sold_items_class").hide();
		jQuery("#cat_id_"+cat_id).show();
	});

	jQuery(document).on("change", "select[name='sales_summary_category']", function( ) {
		$("#overlay,.loader").show();
		var sales_summary_category = $(this).val();
		jQuery.ajax({
            url : base_url+"cashier/reports/sales_report",
            type: "POST",
            dataType : "json",
            data : {
            	sales_summary_category: sales_summary_category
            },
            success:function(data){
            	$("#overlay,.loader").hide();
            	if(data.status == "success") {
            		$("#sales_summary_append").empty();
            		$("#sales_summary_append").append(data.html);
            	}
            }
        });
	});

	jQuery(document).on("change", "select[name='sales_report_category']", function(e) {
		$("#overlay,.loader").show();
		var sales_report_category = $(this).val();
		var start_date_filter   = $("input[name='start_date_ss_filter']").val();
        var end_date_filter     = $("input[name='end_date_ss_filter']").val();
		jQuery.ajax({
            url : base_url+"cashier/reports/sales_report_daily_breakdown",
            type: "POST",
            dataType : "json",
            data : {
            	start_date_filter: start_date_filter,
                end_date_filter: end_date_filter,
            	sales_report_category: sales_report_category
            },
            success:function(data) {
            	$("#overlay,.loader").hide();
        		$(".daily_cat_type_breakdown").empty();
        		$(".daily_cat_type_breakdown").append(data.html);
            }
        });
        e.stopImmediatePropagation();
    	return false;
	});
	// EN - Report JS
});
