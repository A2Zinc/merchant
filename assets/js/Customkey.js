
    let _outputID = "";
    let _minValue = null;
    let _maxValue = null;
    let _isInRange = true;
    $('.cm').on('click', function() {
        $('.cm').removeClass('selected');
        $(this).addClass('selected');
    })

    




    // function get_float_value(e){
    //   var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
    //       val = this.value.replace(/^0+|\.|,/g,""),
    //       res;

    //   if (val.length) {
    //     res = Array.prototype.reduce.call(val, (p,c) => c + p)            // reverse the pure numbers string
    //                .match(rex)                                            // get groups in array
    //                .reduce((p,c,i) => i - 1 ? p + "," + c : p + "." + c); // insert (.) and (,) accordingly
    //     res += /\.|,/.test(res) ? "" : ".0";                              // test if res has (.) or (,) in it
    //     this.value = Array.prototype.reduce.call(res, (p,c) => c + p);    // reverse the string and display
    //   }
    // }

    // var ni = document.getElementById("numin");

    // ni.addEventListener("keyup", get_float_value);

    function get_float_value(num) {
        //num = document.getElementById('num').value;


        // var disp;
        // var str2 = ".";
        // if (num.indexOf(str2) != -1) {
        //     return num;
        // }

        // if (num.length >= 3) {

        //     var first_num = num.substring(0, num.length - 2);
        //     var last_num = num.substr(num.length - 2);
        //     disp = first_num + "." + last_num;
        // } else {
        //     disp = num + ".00";
        // }

        var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
            val = num.toString().replace(/^0+|\.|,/g, ""),
            res;

        if (val.length) {
            //if (val.length && val.length > 2) {
            res = Array.prototype.reduce.call(val, (p, c) => c + p) // reverse the pure numbers string
                .match(rex) // get groups in array
                .reduce((p, c, i) => i - 1 ? p + c : p + "." + c); // insert (.) and (,) accordingly
            res += /\.|,/.test(res) ? "" : ".0"; // test if res has (.) or (,) in it
            num = Array.prototype.reduce.call(res, (p, c) => c + p); // reverse the string and display
            return num;
        } else {
            return num;
        }

        //return disp;

    }


    // $('.x').on('keyup', function() {

    // });


    function deltxt() {
        let o = document.getElementById('optxt').innerHTML;
        //  alert(o)
        console.log('yeah', o)
        let newO = o.slice(0, -1);
        if (newO.length < 1) {
            $('#dollarSign').css('visibility', 'hidden')
            document.getElementById('optxt').innerHTML = newO;
            // document.getElementById('optxt').innerHTML = ''

        } else {
            console.log('object', newO);
            document.getElementById('optxt').innerHTML = newO;
        }

    }
    let n = document.getElementsByClassName('num');
    console.log(n[0].innerHTML);

    $('#delt').on('click', function() {
        deltxt()
        var cart_grand_total = $("#cart_grand_total").val();
        $('.num')[0].innerHTML = get_float_value($('.num')[0].innerHTML);
        var return_balance_html = parseFloat($('.num')[0].innerHTML) - parseFloat(cart_grand_total);
        $("#return_balance_html").html(return_balance_html.toFixed(2));
        if ($('.num')[0].innerHTML.length == 0) {
            $("#return_balance_html").html('0');
            $("#return_balance_html").addClass('red');
        }

        if (parseFloat(return_balance_html) < 0) {
            $("#return_balance_html").addClass('red');
        } else {
            $("#return_balance_html").removeClass('red');
        }
    })
    $('.n').click(function() {
        $('#dollarSign').css('visibility', 'visible')
        var cart_grand_total = $("#cart_grand_total").val();
        console.log("cart_grand_total:" + cart_grand_total);
        var currentnum = this.innerHTML;


        let r = this.innerHTML.replace("$", "");
        //r = parseFloat(r.trim());
        r = r.trim();

        console.log(r);
        let k = $('.num')[0].innerHTML;

        let c = this.id
        if (k == '5,0000') {
            $('.num')[0].innerHTML = ''
        }
        // $('.num')[0].append(r);

        // ST - Calculate Return Balance        
        if ($(this).hasClass("gbg")) {
            $('.num')[0].innerHTML = '';
        }

        if (c != 'del2') {
            $('.num')[0].append(r);
        }

        if ($('.num')[0].innerHTML.length > 0 && cart_grand_total.length > 0) {
            console.log("num: " + $('.num')[0].innerHTML.length);

            // alert($('.num')[0].innerHTML);
            // $('.num')[0].innerHTML = get_float_value($('.num')[0].innerHTML);
            //alert(currentnum.indexOf('$'));
            if (currentnum.indexOf('$') == -1) {
                $('.num')[0].innerHTML = get_float_value($('.num')[0].innerHTML);
            }


            var return_balance_html = parseFloat($('.num')[0].innerHTML) - parseFloat(cart_grand_total);
            $("#return_balance_html").html(return_balance_html.toFixed(2));

            if (parseFloat(return_balance_html) < 0) {
                $("#return_balance_html").addClass('red');
            } else {
                $("#return_balance_html").removeClass('red');
            }
        }
        if ($('.num')[0].innerHTML.length == 0) {
            $("#return_balance_html").html('0');
            $("#return_balance_html").addClass('red');
        }
        // EN - Calculate Return Balance
        //alert()



    });

    // document.getElementById('checker').onchange = function() {
    //     if (this.checked == true) {
    //         document.getElementById("name1").disabled = false;
    //         document.getElementById("name1").focus();
    //     } else {
    //         document.getElementById("name1").disabled = true;
    //     }
    // };
    // document.getElementById('checker2').onchange = function() {
    //     if (this.checked == true) {
    //         document.getElementById("name2").disabled = false;
    //         document.getElementById("name2").focus();
    //     } else {
    //         document.getElementById("name2").disabled = true;
    //     }
    // };
    // document.getElementById('checker3').onchange = function() {
    //     if (this.checked == true) {
    //         document.getElementById("name3").disabled = false;
    //         document.getElementById("name3").focus();
    //     } else {
    //         document.getElementById("name3").disabled = true;
    //     }
    // };

    //keypad js



    function show_easy_numpad(thisElement) {
        let easy_numpad = document.createElement("div");
        easy_numpad.id = "easy-numpad-frame";
        easy_numpad.className = "easy-numpad-frame";
        easy_numpad.innerHTML = `
    <div class="easy-numpad-container">
        <div class="easy-numpad-output-container">
            <p class="easy-numpad-output" id="easy-numpad-output" style='color:white;font-size: 2em;
    padding-right: 10px;'></p>
        </div>
        <div class="easy-numpad-number-container">
            <table>
                <tr style='background:transparent;'>
                    <td style='padding:3% 3%'><a href="7" onclick="easynum(this)">7</a></td>
                    <td style='padding:3% 3%'><a href="8" onclick="easynum(this)">8</a></td>
                    <td style='padding:3% 3%'><a href="9" onclick="easynum(this)">9</a></td>
                    <td style='padding:3% 3%'><a href="Del" class="del" id="del" onclick="easy_numpad_del()">Del</a></td>
                </tr>
                <tr style='background:transparent;'>
                    <td style='padding:3% 3%'><a href="4" onclick="easynum(this)">4</a></td>
                    <td style='padding:3% 3%'><a href="5" onclick="easynum(this)">5</a></td>
                    <td style='padding:3% 3%'><a href="6" onclick="easynum(this)">6</a></td>
                    <td style='padding:3% 3%'><a href="Clear" class="clear" id="clear" onclick="easy_numpad_clear()">Clear</a></td>
                </tr>
                <tr style='background:transparent;'>
                    <td style='padding:3% 3%'><a href="1" onclick="easynum(this)">1</a></td>
                    <td style='padding:3% 3%' ><a href="2" onclick="easynum(this)">2</a></td>
                    <td style='padding:3% 3%'><a href="3" onclick="easynum(this)">3</a></td>
                    <td style='padding:3% 3%'><a href="Cancel" class="cancel rbg" id="cancel" onclick="easy_numpad_cancel()">Cancel</a></td>
                </tr>
                <tr style='background:transparent;'>
                    <td style='padding:3% 3%'><a href="±" onclick="easynum(this)"></a></td>
                    <td style='padding:3% 3%'><a href="0"onclick="easynum(this)">0</a></td>
                    <td style='padding:3% 3%'><a href="." onclick="easynum(this)"></a></td>
                    <td style='padding:3% 3%'><a href="Done" class="done gbg" id="done" onclick="easy_numpad_done()">Done</a></td>
                </tr>
            </table>
        </div>
    </div>
    `;

        // document.getElementsByTagName('body')[0].appendChild(easy_numpad);
        _outputID = thisElement.id;
        _minValue = document.getElementById(thisElement.id).getAttribute("min");
        _maxValue = document.getElementById(thisElement.id).getAttribute("max");

        let useDefault = document.getElementById(thisElement.id).getAttribute("data-easynumpad-use_default");
        if (useDefault != "false") {
            document.getElementById("easy-numpad-output").innerText = thisElement.value;
        }
    }

    function easy_numpad_close() {
        let elementToRemove = document.querySelectorAll("div.easy-numpad-frame")[0];
        elementToRemove.parentNode.removeChild(elementToRemove);
    }

    function easynum(thisElement) {
        event.preventDefault();
        $(".secondDollarSign").css('visibility', 'visible');
        $('#ept').remove();




        let currentValue = document.getElementById("easy-numpad-output").innerText;
        //currentValue = get_float_value(currentValue);
        // currentValue = get_float_value(currentValue);
        //alert(currentValue);

        switch (thisElement.innerText) {



            case "±":
                if (currentValue.startsWith("-")) {
                    document.getElementById("easy-numpad-output").innerText = currentValue.substring(1, currentValue.length);
                } else {
                    document.getElementById("easy-numpad-output").innerText = "-" + currentValue;
                }
                break;
            case ".":
                if (_isInRange) {
                    if (currentValue.length === 0) {
                        document.getElementById("easy-numpad-output").innerText = "0.";
                    } else if (currentValue.length === 1 && currentValue === "-") {
                        document.getElementById("easy-numpad-output").innerText = currentValue + "0.";
                    } else {
                        if (currentValue.indexOf(".") < 0) {
                            document.getElementById("easy-numpad-output").innerText += ".";
                        }
                    }
                }
                break;
            case "0":
                if (_isInRange) {
                    if (currentValue.length === 0) {
                        document.getElementById("easy-numpad-output").innerText = "0.";
                    } else if (currentValue.length === 1 && currentValue === "-") {
                        document.getElementById("easy-numpad-output").innerText = currentValue + "0.";
                    } else {
                        //alert(thisElement.innerText);
                        document.getElementById("easy-numpad-output").innerText += thisElement.innerText;
                        //document.getElementById("easy-numpad-output").innerText += currentValue;
                    }
                }
                break;
            default:
                if (_isInRange) {
                    //alert(thisElement.innerText);
                    document.getElementById("easy-numpad-output").innerText += thisElement.innerText;
                    //document.getElementById("easy-numpad-output").innerText += currentValue;
                }
                break;
        }

        currentValue = document.getElementById("easy-numpad-output").innerText;
        currentValue = get_float_value(currentValue);
        document.getElementById("easy-numpad-output").innerText = currentValue;

        let newValue = Number(document.getElementById("easy-numpad-output").innerText);

        easy_numpad_check_range(newValue);
    }

    function easy_numpad_del() {
        event.preventDefault();
        let easy_numpad_output_val = document.getElementById("easy-numpad-output").innerText;
        if (easy_numpad_output_val.length <= 1) {
            $('.secondDollarSign').css('visibility', 'hidden');
        }
        if (easy_numpad_output_val.slice(-2) !== "0." && easy_numpad_output_val.slice(-3) !== "-0.") {
            var easy_numpad_output_val_deleted = easy_numpad_output_val.slice(0, -1);
            document.getElementById("easy-numpad-output").innerText = easy_numpad_output_val_deleted;
            easy_numpad_check_range(Number(easy_numpad_output_val_deleted));
        }
    }

    function easy_numpad_clear() {
        event.preventDefault();
        document.getElementById("easy-numpad-output").innerText = "";
    }

    function easy_numpad_cancel() {
        jQuery("#easy-numpad-output").html('');
        event.preventDefault();

        if (_isInRange) {
            easy_numpad_close();
        }
    }

    function easy_numpad_done() {

        // var txt3 = document.createElement("p");
        // txt3.setAttribute('id','ept')
        // txt3.innerHTML='Enter Price';
        easy_numpad_clear()
        // $("#easy-numpad-output").append(txt3);


        event.preventDefault();

        if (_isInRange) {
            let easy_numpad_output_val = document.getElementById("easy-numpad-output").innerText;

            if (easy_numpad_output_val.indexOf(".") === (easy_numpad_output_val.length - 1)) {
                easy_numpad_output_val = easy_numpad_output_val.substring(0, easy_numpad_output_val.length - 1);
            }

            document.getElementById(_outputID).value = easy_numpad_output_val;
            easy_numpad_close();
        }
    }

    function easy_numpad_check_range(value) {
        let outputElement = document.getElementById("easy-numpad-output");
        if (_maxValue != null && _minValue != null) {
            console.log("Range limit");

            if (value <= _maxValue && value >= _minValue) {
                outputElement.style.color = "black";
                _isInRange = true;
            } else {
                outputElement.style.color = "red";
                _isInRange = false;
            }
        } else if (_maxValue != null) {
            console.log("Only upper limit");

            if (value <= _maxValue) {
                outputElement.style.color = "black";
                _isInRange = true;
            } else {
                outputElement.style.color = "red";
                _isInRange = false;
            }
        } else if (_minValue != null) {
            console.log("Only lower limit");

            if (value >= _minValue) {
                outputElement.style.color = "black";
                _isInRange = true;
            } else {
                outputElement.style.color = "red";
                _isInRange = false;
            }
        } else {
            console.log("No range limit");
            outputElement.style.color = "black";
            _isInRange = true;
        }
    }
    
    