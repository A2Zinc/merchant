<footer>

    <!-- jquery -->
    <script src="<?php echo base_url(); ?>assets/customers/js/jquery-3.5.1.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url(); ?>assets/customers/js/bootstrap/bootstrap.min.js"></script>
    
    <script type="text/javascript">
      var base_url ="<?php echo base_url(); ?>";
    </script>
    <?php if($this->session->userdata("node_setting") == 1){ ?>
        <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <?php } ?>
    <script src="<?php echo base_url(); ?>assets/customers/js/main.js"></script>
    <script src="<?php echo base_url(); ?>assets/cashier/sweetalert@2.1.2/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/cashier/js/KeyboardPOS.js"></script>
    <!--screensaver  -->
    <script>
        $(document).ready(function() {

            $('#new_register').click(function(){
                $('.right-section').hide();
                $('#customer_new').show();
            });

            $("#myModal").modal('show');
            $("#panel").hide();
            var mousetimeout;
            var screensaver_active = false;
            var idletime = 10;
            // screensever
            function show_screensaver() {
                $("#panel").show();
                $("#panel").slideDown("slow");
                $('#screensaver').fadeIn();
                screensaver_active = true;
                screensaver_animation();
            }

            function stop_screensaver() {
                $("#panel").slideUp("fast");
                $('#screensaver').fadeOut();
                screensaver_active = false;
            }

            function getRandomColor() {
                var letters = '0123456789ABCDEF'.split('');
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.round(Math.random() * 15)];
                }
                return color;
            }

            $(document).click(function() {
                clearTimeout(mousetimeout);

                if (screensaver_active) {
                    stop_screensaver();
                }

                mousetimeout = setTimeout(function() {
                    //show_screensaver();
                }, 500 * idletime); // 5 secs			
            });

            $(document).mousemove(function() {
                clearTimeout(mousetimeout);

                mousetimeout = setTimeout(function() {
                    //show_screensaver();
                }, 1000 * idletime); // 5 secs			
            });

            function screensaver_animation() {
                if (screensaver_active) {
                    $('#screensaver').animate({
                            backgroundColor: getRandomColor()
                        },
                        400,
                        screensaver_animation);
                }
            }
        });
    </script>
    <!-- Screen saver panel -->
    <div id="panel">
        <!-- you can put any content under this div for now its a slider -->
        <div id="demo" class="carousel slide" data-ride="carousel">
            <!-- The slideshow -->
            <div class="carousel-inner full-height">
                <div class="carousel-item full-height active">
                    <img class="full-height" src="<?php echo base_url(); ?>assets/customers/images/idleimage.png" alt="" />
                </div>
                <div class="carousel-item full-height">
                    <img class="full-height" src="<?php echo base_url(); ?>assets/customers/images/idleimage.png" alt="" />
                </div>
                <div class="carousel-item full-height">
                    <img class="full-height" src="<?php echo base_url(); ?>assets/customers/images/idleimage.png" alt="" />
                </div>
            </div>
        </div>
    </div>


</footer>


</body>

</html>