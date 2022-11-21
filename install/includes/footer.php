    </div>
</div>   

<script type="text/javascript" src="js/main.js" ></script>
<script>
    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
	$(this).parent(".sub-menu").children("ul").slideToggle("100");
	$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    });

    /*$(document).ready(function(){
        $('.app-sidebar__inner ul li a').click(function() {
            $('li a').removeClass("active");
            $(this).addClass("active");
        });
    });*/

</script>
<script type = "text/javascript">
    function showForm1() {

        $('.app-sidebar__inner ul li a').removeClass("active");
        $('.business_information').addClass("active");

        document.getElementById("showForm1").style.display = "block";
        document.getElementById("store_information").style.display = "none";
        document.getElementById("tax_information").style.display = "none";
        document.getElementById("card_processor_settings").style.display = "none";
        document.getElementById("cash_register_information").style.display = "none";
        document.getElementById("showForm6").style.display = "none";
        document.getElementById("showForm7").style.display = "none";
    }

    function showForm2() {
        $('.app-sidebar__inner ul li a').removeClass("active");
        $('.store_information').addClass("active");

        document.getElementById("showForm1").style.display = "none";
        document.getElementById("store_information").style.display = "block";
        document.getElementById("tax_information").style.display = "none";
        document.getElementById("card_processor_settings").style.display = "none";
        document.getElementById("cash_register_information").style.display = "none";
        document.getElementById("showForm6").style.display = "none";
        document.getElementById("showForm7").style.display = "none";
    }

    function showForm3() {
        $('.app-sidebar__inner ul li a').removeClass("active");
        $('.tax_settings').addClass("active");

        document.getElementById("showForm1").style.display = "none";
        document.getElementById("store_information").style.display = "none";
        document.getElementById("tax_information").style.display = "block";
        document.getElementById("card_processor_settings").style.display = "none";
        document.getElementById("cash_register_information").style.display = "none";
        document.getElementById("showForm6").style.display = "none";
        document.getElementById("showForm7").style.display = "none";

    }

    function showForm4() {
        $('.app-sidebar__inner ul li a').removeClass("active");
        $('.card_processor_settings').addClass("active");

        document.getElementById("showForm1").style.display = "none";
        document.getElementById("store_information").style.display = "none";
        document.getElementById("tax_information").style.display = "none";
        document.getElementById("card_processor_settings").style.display = "block";
        document.getElementById("cash_register_information").style.display = "none";
        document.getElementById("showForm6").style.display = "none";
        document.getElementById("showForm7").style.display = "none";
    }

    function showForm5() {
        $('.app-sidebar__inner ul li a').removeClass("active");
        $('.cash_register_settings').addClass("active");

        document.getElementById("showForm1").style.display = "none";
        document.getElementById("store_information").style.display = "none";
        document.getElementById("tax_information").style.display = "none";
        document.getElementById("card_processor_settings").style.display = "none";
        document.getElementById("cash_register_information").style.display = "block";
        document.getElementById("showForm6").style.display = "none";
        document.getElementById("showForm7").style.display = "none";
    }

    function showForm6() {
        document.getElementById("showForm1").style.display = "none";
        document.getElementById("store_information").style.display = "none";
        document.getElementById("tax_information").style.display = "none";
        document.getElementById("card_processor_settings").style.display = "none";
        document.getElementById("cash_register_information").style.display = "none";
        document.getElementById("showForm6").style.display = "block";
        document.getElementById("showForm7").style.display = "none";
    }

    function showForm7() {
        $('.app-sidebar__inner ul li a').removeClass("active");
        $('.summary').addClass("active");

        document.getElementById("showForm1").style.display = "none";
        document.getElementById("store_information").style.display = "none";
        document.getElementById("tax_information").style.display = "none";
        document.getElementById("card_processor_settings").style.display = "none";
        document.getElementById("cash_register_information").style.display = "none";
        document.getElementById("showForm6").style.display = "none";
        document.getElementById("showForm7").style.display = "block";
    }
    function showForm(){
    document.getElementById("showForm1").style.display ="none";
    document.getElementById("store_information").style.display ="none";
    document.getElementById("tax_information").style.display ="none";
    document.getElementById("card_processor_settings").style.display ="none";
    document.getElementById("cash_register_information").style.display ="none";
    document.getElementById("showForm6").style.display ="none";

    }
</script>
<div class="loader"></div>
</body>
</html>