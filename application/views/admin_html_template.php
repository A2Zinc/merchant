<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title><?php echo (isset($title)) ? $title : "Isshue Multistore System" ?></title>
  <?php
  $CI = &get_instance();
  $CI->load->model('Soft_settings');
  $CI->load->model('Color_backends');
  $Soft_settings = $CI->Soft_settings->retrieve_setting_editdata();
  $colors = $CI->Color_backends->retrieve_color_editdata();

  ?>
  <!-- Favicon and touch icons -->
  <!-- <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/logo.png" type="image/x-icon"> -->
  <link rel="shortcut icon" href="<?php echo base_url() . $this->session->sitefavicon ?>" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/core/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/style/customstyle.css">

  <link href="<?php echo base_url() ?>assets/icon/fontawesome/css/all.css" rel="stylesheet">
  <!-- Scrollbar Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/style/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/style/daterangepicker/daterangepicker.css" />
  <link href="<?php echo base_url() ?>assets/core/select2/dist/css/select2.css" rel="stylesheet" />
  <!-- Format javascript date-time -->
  <script src="<?php echo base_url() ?>assets/js/jquery@3.4.1/jquery.min.js"></script>
  <link href="<?php echo base_url() ?>assets/style/bootstrap4-toggle@3.6.1/bootstrap4-toggle.min.css" rel="stylesheet">
  <script src="<?php echo base_url() ?>assets/js/bootstrap4-toggle@3.6.1/bootstrap4-toggle.min.js"></script>
</head>

<body>
  <div class="wrapper">
    <!-- Sidebar  -->
    <?php $url = $this->uri->segment(1);
    $this->load->view('include/admin_header');
     ?>
    {content}
    <?php
      $this->load->view('include/admin_footer');
    ?>

    <script type="text/javascript">
      $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
          theme: "minimal"
        });
        $('#sidebarCollapse').on('click', function() {
          $('#change').text($('#change').text() == 'Hide Menu' ? ' Show Menu' : 'Hide Menu');
          $('#sidebar, #content').toggleClass('active');
          $('.collapse.in').toggleClass('in');
          $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
      });
    </script>
    <script>
      $(function() {
        $('input[name="daterange"]').daterangepicker({
          opens: 'left'
        }, function(start, end, label) {
          console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
      var options = {
        series: [{
            name: "Sales in $",
            data: [2020, 2021, 2022, 2023, 2024],


          },
          {
            name: "Previous Year",
            data: [2019, 2020, 2021, 2022, 2023]
          },

        ],

        chartOptions: {
          colors: ['#000000']
        },

        theme: {
          monochrome: {
            enabled: true,
            color: '#000000',
            shadeTo: 'light',
            shadeIntensity: 0.65
          }
        },


        chart: {
          height: 250,
          type: 'line',


          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth',

        },
        fill: {
          type: 'solid',
          colors: ['#000000', '#000000', '#000000']
        },


        // title: {
        //   text: 'Product Trends by Month',
        //   align: 'left'
        // },
        grid: {
          row: {
            colors: ['white', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
        },
        yaxis: {
          show: true,
          showAlways: true,
          seriesName: "undefined",
          labels: {
            show: true,
            align: 'right',
            minWidth: 0,
            maxWidth: 160,
            style: {
              colors: [],
              fontSize: '12px',
              fontFamily: 'Helvetica, Arial, sans-serif',
              fontWeight: 400,
              cssClass: 'apexcharts-yaxis-label',
            }
          },
          title: {
            // text: "undefined",
            rotate: -90,
            offsetX: 0,
            offsetY: 0,
            style: {
              color: "red",
              fontSize: '12px',
              fontFamily: 'Helvetica, Arial, sans-serif',
              fontWeight: 600,
              cssClass: 'apexcharts-yaxis-title',
            },
          },
        }

      };

      let showTableForm = true;
      var chart = new ApexCharts(document.querySelector("#yearchart"), options);
      chart.render();
      $("#yearchart").hide()
      $(".lineChartTableForm").show()
      $("#render-chart-btn").on('click', function() {
        $("#yearchart").toggle();
        $(".lineChartTableForm").toggle();
      })
      $("#my_dataviz").hide()
      $(".scroll").show()
      $("#renderDonut").on('click', function() {
        $("#my_dataviz").toggle();
        $(".scroll").toggle();
      })
      $(document).on('click', '#year,#week,#month,#daily', function() {
        var chartval = $(this).attr('data-id')
        var num = [];
        var cate = []
        if (chartval == 'yearchart') {
          numb = [2020, 2021, 2022, 2023]
          // cate = ['jun,''feb']
          $('#yearchart').css('display', 'inherit')
          $('#weekchart').css('display', 'none')
          $('#monthchart').css('display', 'none')
          $('#dailychart').css('display', 'none')
        }

        if (chartval == 'monthchart') {
          numb = [100, 101, 102, 103, 104]
          // cate = ['jun,''feb']
          $('#monthchart').css('display', 'inherit')
          $('#weekchart').css('display', 'none')
          $('#yearchart').css('display', 'none')
          $('#dailychart').css('display', 'none')
        }

        if (chartval == 'weekchart') {
          numb = [20, 22, 21, 55, 98]
          // cate = ['jun,''feb']
          $('#monthchart').css('display', 'none')
          $('#weekchart').css('display', 'grid')
          $('#yearchart').css('display', 'none')
          $('#dailychart').css('display', 'none')
        }

        if (chartval == 'dailychart') {
          numb = [20, 22, 55, 89, 155]
          // cate = ['jun,''feb']
          $('#monthchart').css('display', 'none')
          $('#weekchart').css('display', 'none')
          $('#yearchart').css('display', 'none')
          $('#dailychart').css('display', 'inherit')
        }
        var options = {
          series: [{
              name: "Sales in $",
              data: numb
            },

          ],

          chartOptions: {
            colors: ['#000000']
          },

          theme: {
            monochrome: {
              enabled: true,
              color: '#000000',
              shadeTo: 'light',
              shadeIntensity: 0.65
            }
          },


          chart: {
            height: 250,
            type: 'line',


            zoom: {
              enabled: false
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth',

          },
          fill: {
            type: 'solid',
            colors: ['#000000', '#000000', '#000000']
          },


          // title: {
          //   text: 'Product Trends by Month',
          //   align: 'left'
          // },
          grid: {
            row: {
              colors: ['white', 'transparent'], // takes an array which will be repeated on columns
              opacity: 0.5
            },
          },
          xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          },
          yaxis: {
            show: true,
            showAlways: true,
            seriesName: "undefined",
            labels: {
              show: true,
              align: 'right',
              minWidth: 0,
              maxWidth: 160,
              style: {
                colors: [],
                fontSize: '12px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 400,
                cssClass: 'apexcharts-yaxis-label',
              }
            },
            title: {
              // text: "undefined",
              rotate: -90,
              offsetX: 0,
              offsetY: 0,
              style: {
                color: "red",
                fontSize: '12px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 600,
                cssClass: 'apexcharts-yaxis-title',
              },
            },
          }

        };

        var chart = new ApexCharts(document.querySelector("#" + chartval), options);
        chart.render();

      })
    </script>

    <script>
      // Other important pens.
      // Map: https://codepen.io/themustafaomar/pen/ZEGJeZq
      // Navbar: https://codepen.io/themustafaomar/pen/VKbQyZ

      $(function() {

        'use strict';

        var aside = $('.side-nav'),
          showAsideBtn = $('.show-side-btn'),
          contents = $('#contents'),
          _window = $(window)

        showAsideBtn.on("click", function() {
          $("#" + $(this).data('show')).toggleClass('show-side-nav');
          contents.toggleClass('margin');
        });

        if (_window.width() <= 767) {
          aside.addClass('show-side-nav');
        }

        _window.on('resize', function() {
          if ($(window).width() > 767) {
            aside.removeClass('show-side-nav');
          }
        });

        // dropdown menu in the side nav
        var slideNavDropdown = $('.side-nav-dropdown');

        $('.side-nav .categories li').on('click', function() {

          var $this = $(this)

          $this.toggleClass('opend').siblings().removeClass('opend');

          if ($this.hasClass('opend')) {
            $this.find('.side-nav-dropdown').slideToggle('fast');
            $this.siblings().find('.side-nav-dropdown').slideUp('fast');
          } else {
            $this.find('.side-nav-dropdown').slideUp('fast');
          }
        });

        $('.side-nav .close-aside').on('click', function() {
          $('#' + $(this).data('close')).addClass('show-side-nav');
          contents.removeClass('margin');
        });




      });
    </script>
    <script>
      $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
      });
    </script>
    <script>
      // ic items item number
      $(document).ready(function() {
        var maxField = 6; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.item-apend'); //Input field wrapper
        var fieldHTML =
          //New input field html 
          ' <div class="row"> <div class="col-md-3"> <div class="form-group"> <label class="customcardlabel" for=""> Name</label> <input type="text" class="form-control " id="" aria-describedby="" placeholder="enter the value Employee Name"> </div></div><div class="col-md-3"> <div class="form-group"> <label class="customcardlabel" for="">Start Date</label> <input type="text" class="form-control " id="" aria-describedby="" placeholder="enter the Start Date"> </div></div><div class="col-md-3"> <div class="form-group"> <label class="customcardlabel" for="">End Date</label> <input type="text" class="form-control " id="" aria-describedby="" placeholder="enter the End Date"> </div></div><div class="col-md-3"> <button type="button" class="btn btn-light apend_button removeNominee" href="javascript:void(0);">-</button> </div></div>'
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function() {
          //Check maximum number of input fields
          if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
          }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.removeNominee', function(e) {
          e.preventDefault();
          $(this).parent().parent().remove(); //Remove field html
          x--; //Decrement field counter
        });
      });
    </script>


</html>