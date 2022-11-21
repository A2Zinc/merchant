<!-- Trigger/Open The Modal -->
<!-- <button class="myBtn">Open Modal</button> -->
<style>
    .product_select{
        background:#eaeaea;
        color:black;width: 100% !important;
        border:1px solid #000000;
        appearance: none;
        margin-bottom:3%;
        font-size: 18px;
        padding-left:5px;
        border-radius:0px;
        height:5.2vh;
        margin-top: 10px;
    }
    .shift-out-table{
        width: 94%;
        margin-left: 3%;
        max-height: 350px !important;
        overflow: scroll;
    }
    .new-cust-label{
        margin-left:10%;
        font-size:1.2rem;
        margin-top:3%;
    }
    .modal-height{
        min-height:420px;
    }
    .bin-align{
        margin-left:10% !important;
        margin-right: 41% !important;
        width:40% !important;
    }
    .paydrop {
        height: 40px !important;
    }

     .container {
        width: 600px;
    }

    .cdk {
        font-size: 35px;
        padding: 10px 20px;
    }

    .cdk_pay {
        padding: 15px 30px !important;
    }

    #tab3-tab.active~span.yellow-bar {
        left: 230px;
        width: 100px;
    }

    #tab4-tab.active~span.yellow-bar {
        left: 364px;
        width: 120px;
    }

    .sm-ico {
        width: 50px;
        height: 50px;
    }

    .ui-menu.ui-widget.ui-widget-content.ui-autocomplete.ui-front {
        max-height: 500px;
        overflow: scroll;
    }

    .coupon-table {
        width: 92%;
        margin: 0 auto;
        color: black;
    }

    .bg-black {
        background-color: black !important;
    }

    .coup-cell {

        padding-left: 20px;
    }

    .coup-row {
        background-color: whitesmoke !important;
    }

    .coup-row:hover {
        background-color: white !important;
        color: black !important;
    }

    #age_verify_date {
        width: 200px;
        padding: 1em;
        border: 1px solid lightgrey;
    }

    #age_verify_button {}

    #age_verify_ok_button {
        background: #16c783;
        width: 80px;
        height: 50px;
        margin: 0 20px;
    }

    .w-400 {
        width: 400px;
    }

    .ai-center {
        align-items: center;
    }

    .jc-bet {
        justify-content: space-between
    }

    .fsxx {
        font-size: xx-large !important;
    }

    .keyboard {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        padding: 5px 0;
        background: #18102f;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
        user-select: none;
        transition: bottom 0.4s;
        z-index: 999999999999999999999999999;
    }

    .keyboard--hidden {
        bottom: -100%;
    }

    .keyboard--hidden.numone {
        bottom: -100%;
    }

    .keyboard__keys {
        text-align: center;
    }

    .cd-keys {
        /* font-size:35px; */
    }

    .keyboard__key {
        height: 45px;
        width: 6%;
        max-width: 120px;
        margin: 3px;
        border-radius: 4px;
        border: none;
        background: rgba(255, 255, 255, 0.2);
        color: #ffffff;
        font-size: 1.45rem;
        outline: none;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        vertical-align: top;
        padding: 0;
        -webkit-tap-highlight-color: transparent;
        position: relative;
    }

    .keyboard__key.numonekey {
        width: 125px;
        max-width: unset;
    }

    .keyboard__key:active {
        background: rgba(255, 255, 255, 0.12);
    }

    .keyboard__key--wide {
        width: 12%;
    }

    .keyboard__key--extra-wide {
        width: 36%;
        max-width: 500px;
    }

    .keyboard__key--activatable::after {
        content: '';
        top: 10px;
        right: 10px;
        position: absolute;
        width: 8px;
        height: 8px;
        background: rgba(0, 0, 0, 0.4);
        border-radius: 50%;
    }

    .keyboard__key--active::after {
        background: #08ff00;
    }

    .keyboard__key--dark {
        background: rgba(0, 0, 0, 0.25);
    }

    .keyboard__key.numonekey {
        width: 125px;
        max-width: unset;
    }

    .keyboard.numone {

        width: 405px;
        right: 0;
        left: unset;

        height: fit-content !important;
    }

    .numKeyboardPositioner {
        /* margin-bottom: 26em!important; */
    }

    .ui-menu .ui-menu-item {
        width: 100%;
        border-bottom: 1px solid #e2e2e2;
    }

    .ui-menu .ui-menu-item-wrapper {
        padding-left: 0;
        padding-bottom: 0;
    }

    .moveup {
        position: relative !important;
        top: -9.5em !important;
    }

    .bal {
        font-size: 1.5vw;
    }

    .x {
        z-index: 500 !important;
    }

    #material-tabs>a {
        font-size: 18px;
    }

    #tab2-tab.active~span.yellow-bar {
        left: 22%;
        width: 107px;
    }

    #tab3-tab.active~span.yellow-bar {
        left: 45%;
        width: 116px;
    }

    #tab4-tab.active~span.yellow-bar {
        left: 70%;
        width: 180px;
    }

    .tab-content {
        padding: 20px;
    }

    input.bsinput {
        margin-left: 0;
    }

    .hrms-tile {
        width: 174px;
        height: 138px;
        background: linear-gradient(180deg, #FFFFFF 0%, #F4F4F4 100%);
        box-shadow: 0px 0px 85px rgb(0 0 0 / 10%);
        border-radius: 22px;
        padding: 1em;
        display: block;
        color: black;
    }
</style>
<script>
    //start prasant code 04-06-2021

    $(document).on("click", ".increase", function() {
        var product_id = $(this).attr("data-id");
        var order_quantity = $("#quantity_input_" + product_id).val();
        var product_order_qty = parseInt(order_quantity) + 1;

        var quantity = $("#product_inventory_qty_" + product_id).val();

        var reorder_level = $("#product_reorder_level_" + product_id).val();

        var qty = parseInt(quantity) - 1;
        var reorder_level = parseInt(reorder_level);
        var dat_reord = parseInt(quantity) - order_quantity;
        var alert_qty = quantity - order_quantity;

        var is_scratchable = $("#is_scratchable_" + product_id).val();

        var product_name = $("#product_cart_name_" + product_id).val();
        // alert(dat_reord);
        if(quantity !== undefined){
            if (product_order_qty > qty) { //3
              if(is_scratchable == 0){
                  // alert(alert_qty);
                  if (alert_qty >= 0) {
                    swal({
                      title: "Warning!",
                      text: "Product quantity limit exceeded!",
                      icon: "warning",
                      buttons: false,
                      timer: 2700,
                    });
                  }
              }else if(is_scratchable == 1){
                  if (order_quantity == quantity) {
                    swal({
                        title: "Warning!",
                        text: "Product quantity limit exceeded!",
                        icon: "warning",
                        buttons: false,
                        timer: 2700
                    })
                    $(".reduced").trigger('click');
                    // $('.increase').css('pointer-events','none');
                    // return false;
                  }
              }

            }else if (dat_reord <= reorder_level) {
                swal({
                    title: "Warning!",
                    text: "Quantity of " + product_name + " has reached its threshold reorder level, Please place a new order!",
                    icon: "warning",
                    buttons: false,
                    timer: 2700
                })

            }
        }


    });

    $(document).on("click", ".reduced", function() {
        $('.increase').css('pointer-events', '');
    });

    //end prasant code

    $(function() {
        $('.x').on('click', function() {
            $('#custom_product_name').val('');
            $('#product_upc').val('');
            $('#custom_product_price').val('');
            $('#custom_product_name').val('');
            $('#product_lookup_description').val('');

            KeyboardNum.close()
            Keyboard.close()
        });

    });

    function opendrawer(){
        $.ajax({
                type: "POST",
                url: '<?= base_url("cashier/Cashier/open_drawer") ?>',
                data: {},
                success: function(data) {
                    swal({
                            title: "Success!",
                            text: "Drawer successfully open",
                            icon: "success",
                            buttons: false,
                            timer: 1000
                        });
                    show_cash_button();
                    clearTransaction();
                }
            })
    }
    function removeAtIndex(string, position) {
  var str = string;
  str = str.slice(0, position) + str.slice(position + 1);
  //console.log(str);
  return str;
}
String.prototype.replaceAt = function (index, replacement) {
  return (
    this.substr(0, index) +
    replacement +
    this.substr(index + replacement.length)
  );
};
function addStr(str, index, stringToAdd) {
  return (
    str.substring(0, index) + stringToAdd + str.substring(index, str.length)
  );
}
    function getKeyL(x, y) {
        // //console.log(x,y,'x,y')
        if (y == null) {
            return x._createKeys('full');
        } else {
            return x._createKeys('half');
        }

    }

    function resetKeebPos() {
        let a = $(".keyboard.numone").offset().top;
        let a2 = $(".keyboard.numone").offset().bottom;
        let a3 = $(".keyboard.numone").offset().left;
        let a4 = $(".keyboard.numone").offset().right;
        //console.log(a, a2, a3, a4, 'all p[os')
        $(".keyboard.numone").css('right', '0');
        $(".keyboard.numone").css('left', 'auto');
        $(".keyboard.numone").css('bottom', '0');
    }
    const KeyboardNum = {
        elements: {
            main: null,
            keysContainer: null,
            keys: []
        },

        eventHandlers: {
            oninput: null,
            onclose: null
        },

        properties: {
            value: "",
            capsLock: false,
            firstFocussed: "",
            submitButtonId:""
        },

        init() {
            // Create main elements
            this.elements.main = document.createElement("div");
            this.elements.keysContainer = document.createElement("div");

            // Setup main elements
            this.elements.main.classList.add("keyboard", "keyboard--hidden", "numone");
            this.elements.keysContainer.classList.add("keyboard__keys");
            let x = this;

            this.elements.keysContainer.appendChild(this._createKeys());

            this.elements.keys = this.elements.keysContainer.querySelectorAll(".keyboard__key");

            // Add to DOM
            this.elements.main.appendChild(this.elements.keysContainer);
            document.body.appendChild(this.elements.main);

            // Automatically use keyboard for elements with .use-keyboard-input
            document.querySelectorAll(".use-keyboard-input-num").forEach(element => {

                //console.log(element, 'xxx')
                element.addEventListener("focus", () => {
                    Keyboard.close()
                    $('.modal').addClass('moveup');
                    $('.keyboard.numone').addClass("numKeyboardPositioner");
                    this.open(element.value, currentValue => {

                        if (element.id === 'custom_product_price') {
                            element.value = get_float_value(currentValue)
                        }
                        if (element.id === 'product_lookup_description') {
                            element.value = currentValue.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')
                        }
                        if (element.classList.contains("usefloathere")) {
            //console.log("this one is fliat", currentValue, element.value);
            var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
              val = currentValue.toString().replace(/^0+|\.|,/g, ""),
              res;

            if (val.length) {
              //if (val.length && val.length > 2) {
              res = Array.prototype.reduce
                .call(val, (p, c) => c + p) // reverse the pure numbers string
                .match(rex) // get groups in array
                .reduce((p, c, i) => (i - 1 ? p + c : p + "." + c)); // insert (.) and (,) accordingly
              res += /\.|,/.test(res) ? "" : ".0"; // test if res has (.) or (,) in it
              currentValue = Array.prototype.reduce.call(res, (p, c) => c + p); // reverse the string and display
              element.value = currentValue;
            } else {
              element.value = currentValue; //num;
            }
            //   element.value = get_float_value(currentValue)
          }
                        if( element.classList.contains('usemobilehere')){
                        // element.value = currentValue.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');
                        var input =currentValue.replace(/[^0-9\(\)\s\-]/g, "");
                        var inputlen = input.length;
                        // Get just the numbers in the input
                        var numbers = currentValue.replace(/\D/g, "");
                        var numberslen = numbers.length;
                        // Value to store the masked input
                        var newval = "";
                        // Loop through the existing numbers and apply the mask
                        for (var i = 0; i < numberslen; i++) {
                        if (i == 0) newval = "(" + numbers[i];
                        else if (i == 2) newval += numbers[i] + ") ";
                        else if (i == 6) newval += "-" + numbers[i];
                        else newval += numbers[i];
                        }

                        // Re-add the non-digit characters to the end of the input that the user entered and that match the mask.
                        if (inputlen >= 1 && numberslen == 0 && input[0] == "(") newval = "(";
                        else if (
                        inputlen >= 6 &&
                        numberslen == 3 &&
                        input[4] == ")" &&
                        input[5] == " "
                        )
                        newval += ") ";
                        else if (inputlen >= 5 && numberslen == 3 && input[4] == ")") newval += " ";
                        else if (inputlen >= 6 && numberslen == 3 && input[5] == " ") newval += " ";
                        else if (inputlen >= 10 && numberslen == 6 && input[9] == "-")
                        newval += "-";

                        element.value = newval.substring(0, 14)
    // $(this).val(newval.substring(0, 14));

                    }
                        else {
                            element.value = currentValue;
                        }
                        // element.value = get_float_value(element.value)

                    });
                    this.properties.firstFocussed = this.getInputFocus();
                });
            });



        },
        getInputFocus() {
    let currentFocussed = document.activeElement;
    //console.log(currentFocussed, currentFocussed.id, "active one");
    return currentFocussed;
  },
        _createKeys() {
            const fragment = document.createDocumentFragment();

            const keyLayout2 = [
                "1", "2", "3", "4", "5", "6", "7", "8", "9", ".", "0", "backspace", "done",


                "enter", "tab", "drag"

            ];

            // Creates HTML for an icon
            const createIconHTML = (icon_name) => {
                return `<i class="material-icons">${icon_name}</i>`;
            };

            keyLayout2.forEach(key => {
                const keyElement = document.createElement("button");
                const insertLineBreak = ["backspace", "tab", "enter", "?"].indexOf(key) !== -1;

                // Add attributes/classes
                keyElement.setAttribute("type", "button");
                keyElement.classList.add("keyboard__key", "numonekey");

                switch (key) {
                    case "backspace":
                        keyElement.classList.add("keyboard__key--wide");
                        keyElement.innerHTML = createIconHTML("backspace");

                        keyElement.addEventListener("click", () => {
                            this.properties.value = this.properties.value.substring(0, this.properties.value.length - 1);
                            this._triggerEvent("oninput");
                        });

                        break;

                    case "caps":
                        keyElement.classList.add("keyboard__key--wide", "keyboard__key--activatable");
                        keyElement.innerHTML = createIconHTML("capslock");

                        keyElement.addEventListener("click", () => {
                            this._toggleCapsLock();
                            keyElement.classList.toggle("keyboard__key--active", this.properties.capsLock);
                        });

                        break;

                    case "enter":
                        keyElement.classList.add("keyboard__key--wide");
                        keyElement.innerHTML = createIconHTML("enter");

                        keyElement.addEventListener("click", () => {



                            // this._triggerEvent("oninput");

                          //console.log('id is',this.properties.submitButtonId)
                          if(this.properties.submitButtonId==='walkinsubmit'){
                              let nnum = $("#customer_mobile_no").val();
                            sendWalkin(nnum)
                          }
                            $('#'+this.properties.submitButtonId).trigger('click');

                        });

                        break;

                    case "tab":
                        keyElement.classList.add("keyboard__key--wide");
                        keyElement.innerHTML = createIconHTML("tab");
                        let  f = this.properties.firstFocussed
                        keyElement.addEventListener("click", () => {

                        this.moveInput(f);

                    });

                    break;

                    case "space":
                        keyElement.classList.add("keyboard__key--extra-wide");
                        keyElement.innerHTML = createIconHTML("space");

                        keyElement.addEventListener("click", () => {
                            this.properties.value += " ";
                            this._triggerEvent("oninput");
                        });

                        break;

                    case "done":
                        keyElement.classList.add("keyboard__key--wide", "keyboard__key--dark", "cancelkeeb");
                        keyElement.innerHTML = createIconHTML("hide");

                        keyElement.addEventListener("click", () => {
                            this.close();
                            this._triggerEvent("onclose");
                        });

                        break;
                    case "drag":
                        keyElement.classList.add("keyboard__key", "keyboard__key--dark", "dragkeeb");
                        keyElement.innerHTML = `<i class="fa fa-arrows" style="color:white;" aria-hidden="true"></i>`;

                        // keyElement.addEventListener("click", () => {
                        //     this.close();
                        //     this._triggerEvent("onclose");
                        // });

                        break;
                    default:
                        keyElement.textContent = key.toLowerCase();

                        keyElement.addEventListener("click", () => {
                            this.properties.value += this.properties.capsLock ? key.toUpperCase() : key.toLowerCase();
                            this._triggerEvent("oninput");
                        });

                        break;
                }

                fragment.appendChild(keyElement);

                if (insertLineBreak) {
                    // fragment.appendChild(document.createElement("br"));
                }
            });

            return fragment;
        },
        setSubmitButton(id){

                        this.properties.submitButtonId = id;


        },

        _triggerEvent(handlerName) {
            if (typeof this.eventHandlers[handlerName] == "function") {
                this.eventHandlers[handlerName](this.properties.value);
            }
        },

        _toggleCapsLock() {
            this.properties.capsLock = !this.properties.capsLock;

            for (const key of this.elements.keys) {
                if (key.childElementCount === 0) {
                    key.textContent = this.properties.capsLock ? key.textContent.toUpperCase() : key.textContent.toLowerCase();
                }
            }
        },
moveInput(){
    let start = this.properties.firstFocussed.id;
    let inputs = document.getElementsByClassName("form-control");
    let allIds = [];

    let focussedIndex, nextIndex;
    for (let i = 0; i < inputs.length; i++) {
      allIds.push(inputs[i].id);
      if (start == inputs[i].id) {
        if (
          inputs[i].id === "custom_product_price"
        ) {
          this.close();
          this._triggerEvent("onclose");
        } else {
          nextIndex = i;
        }
      }
    }

    // if (
    //   document.getElementById(inputs[nextIndex].id) == "store_promotion_price"
    // ) {
    //   alert("ckech focuessed");
    // }
    nextIndex = nextIndex + 1;
    document.getElementById(this.properties.firstFocussed.id).blur();

    document.getElementById(inputs[nextIndex].id).focus();
    // document.getElementById(inputs[nextIndex].id).trigger("click");
    //console.log(document.getElementById(inputs[nextIndex].id), "new focused");

    this.properties.firstFocussed.id = inputs[nextIndex].id;
    //console.log("selected inputs ", allIds, nextIndex, start);
        }
,
        open(initialValue, oninput, onclose) {
            this.properties.value = initialValue || "";
            this.eventHandlers.oninput = oninput;
            this.eventHandlers.onclose = onclose;
            $('.keyboard.numone').show();
            this.elements.main.classList.remove("keyboard--hidden");


            // $('.keyboard').addClass('numone');
            // $('.keyboard__key').addClass('numonekey');
        },

        close() {
            //   $('.keyboard').removeClass('numone');
            // $('.keyboard__key').removeClass('numonekey');
            this.properties.value = "";
            this.eventHandlers.oninput = oninput;
            this.eventHandlers.onclose = onclose;
            $('.keyboard.numone').hide();
            this.elements.main.classList.add("keyboard--hidden");
            $('.modal').removeClass('moveup');
            $('.keyboard.numone').removeClass("numKeyboardPositioner");
        }
    };
    const Keyboard = {
        elements: {
            main: null,
            keysContainer: null,
            keys: []
        },

        eventHandlers: {
            oninput: null,
            onclose: null
        },

        properties: {
            value: "",
            capsLock: false,
            firstFocussed: "",
            submitButtonId:"",
            tempInput: false,
    tempEl: "",
    allFocusable: [],
    caret: 0,
        },

        init(type) {
            // Create main elements
            this.elements.main = document.createElement("div");
            this.elements.keysContainer = document.createElement("div");

            // Setup main elements
            this.elements.main.classList.add("keyboard", "keyboard--hidden");
            this.elements.keysContainer.classList.add("keyboard__keys");
            let x = this;

            this.elements.keysContainer.appendChild(this._createKeys(type));

            this.elements.keys = this.elements.keysContainer.querySelectorAll(".keyboard__key");

            // Add to DOM
            this.elements.main.appendChild(this.elements.keysContainer);
            document.body.appendChild(this.elements.main);
            $('.spkey').hide();
            // Automatically use keyboard for elements with .use-keyboard-input
            document.querySelectorAll(".use-keyboard-input").forEach(element => {
                //console.log(element, "xxx");
                 let el = this;
                //console.log(element, 'xxx')
                element.addEventListener("focus", (e) => {
                    setTimeout(() => {
          el.properties.caret = e.target.selectionStart;
          //console.log("Current position: " + e.target.selectionStart);
        }, 10);
        //
        $(element).bind(" click keyup", function (e) {
          //console.log("Current position: " + e.target.selectionStart);
          el.properties.caret = e.target.selectionStart;
        });
        //
        //console.log(element, element.tagName, "opened for");
        if (element.tagName === "TEXTAREA") {
          this._createTempInput(element);
        }


                    KeyboardNum.close()
                    $('.modal').addClass('moveup');
                    this.open(element.value, currentValue => {
                        // element.value = currentValue;
                        let str = currentValue;
          // currentValue[this.properties.caret]
          let newLetter = str[str.length - 1];
          // str = element.value.replaceAt(this.properties.caret - 1, newLetter);
          str = addStr(element.value, this.properties.caret, newLetter);
          //console.log(this.properties.caret,element.value,currentValue,str,newLetter);
          element.value = str;
          this.properties.value = str;
          this.properties.caret = this.properties.caret + 1;
                    });
                    this.properties.firstFocussed = this.getInputFocus();
                });
            });


        },
        setCaretPosition(ctrl, pos) {
    // Modern browsers
    //console.log(ctrl, "move rgiht obj");
    if (ctrl.setSelectionRange) {
      ctrl.focus();
      ctrl.setSelectionRange(pos, pos);

      // IE8 and below
    } else if (ctrl.createTextRange) {
      var range = ctrl.createTextRange();
      range.collapse(true);
      range.moveEnd("character", pos);
      range.moveStart("character", pos);
      range.select();
    }
  },
        _clearField(){
            this.properties.value = '';
        },
        _createKeys(type) {
            const fragment = document.createDocumentFragment();
            const splkeys = ["!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "+", "-"];
            const keyLayout = [...splkeys,
                "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "backspace",
                "q", "w", "e", "r", "t", "y", "u", "i", "o", "p", "tab",
                "caps", "a", "s", "d", "f", "g", "h", "j", "k", "l", "enter",
                "done", "shift", "z", "x", "c", "v", "b", "n", "m", ",", ".", "?",
                "space", "left",
      "right",
            ];
            const keyLayout2 = [
                "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "backspace",

                "enter", "tab",
                "done", ".",

            ];
            let ly;
            if (type == 'full') {
                ly = keyLayout
            } else {
                ly = keyLayout2
            }
            // Creates HTML for an icon
            const createIconHTML = (icon_name) => {
                return `<i class="material-icons">${icon_name}</i>`;
            };

            ly.forEach(key => {
                const keyElement = document.createElement("button");
                const insertLineBreak = ["backspace", "tab", "enter", "?"].indexOf(key) !== -1;

                // Add attributes/classes
                keyElement.setAttribute("type", "button");
                if (key == '1' || key == '2' || key == '3' || key == '4' || key == '5' || key == '6' || key == '7' || key == '8' || key == '9') {
                    keyElement.classList.add("keyboard__key", 'shiftkey');
                }
                if (key == '!' || key == '@' || key == '#' || key == '$' || key == '%' || key == '^' || key == '&' || key == '*' || key == '(' || key == ')' || key == '+' || key == '-') {
                    keyElement.classList.add("keyboard__key", 'spkey');
                } else {
                    keyElement.classList.add("keyboard__key");
                }

                switch (key) {
                    case "backspace":
                        // keyElement.classList.add("keyboard__key--wide");
                        // keyElement.innerHTML = createIconHTML("backspace");

                        // keyElement.addEventListener("click", () => {
                        //     this.properties.value = this.properties.value.substring(0, this.properties.value.length - 1);
                        //     this._triggerEvent("oninput");
                        // });
                        keyElement.classList.add("keyboard__key--wide");
          keyElement.innerHTML = createIconHTML("backspace");

          keyElement.addEventListener("click", () => {
            // this.properties.value = this.properties.value.substring(
            //   0,
            //   this.properties.value.length - 1
            // );
            // this._triggerEvent("oninput");
            let newTxt;
            if (this.properties.caret === 0) {
              newTxt = this.properties.value;
            } else {
              newTxt = removeAtIndex(
                this.properties.value,
                this.properties.caret - 1
              );
            }
            // newTxt = removeAtIndex(
            //   this.properties.value,
            //   this.properties.caret - 1
            // );
            // this.properties.value = this.properties.value.substring(0, newTxt);
            this.properties.value = newTxt;
            this.properties.firstFocussed.value = newTxt;
            let tempCaretPos = this.properties.caret - 1;
            $(this.properties.firstFocussed).focus();
            Keyboard.setCaretPosition(
              this.properties.firstFocussed,
              tempCaretPos
            );
          });
          this._triggerEvent("oninput");
                        break;

                    case "caps":
                        keyElement.classList.add("keyboard__key--wide", "keyboard__key--activatable");
                        keyElement.innerHTML = createIconHTML("capslock");

                        keyElement.addEventListener("click", () => {
                            this._toggleCapsLock();
                            keyElement.classList.toggle("keyboard__key--active", this.properties.capsLock);
                        });

                        break;
                    case "shift":
                        keyElement.classList.add("keyboard__key--wide", "keyboard__key--activatable");
                        keyElement.innerHTML = createIconHTML("shift");

                        keyElement.addEventListener("click", () => {
                            this._toggleShift();
                            keyElement.classList.toggle("keyboard__key--active", this.properties.shift);
                        });

                        break;
                    case "enter":
                        keyElement.classList.add("keyboard__key--wide");
                        keyElement.innerHTML = createIconHTML("enter");

                        keyElement.addEventListener("click", () => {
                            // alert("enter")
                            // this.moveInput(f);
                            // this._triggerEvent("oninput");
                            // $('input[type="submit"]').trigger('click');
                            //console.log('id is',this.properties.submitButtonId)
                            $('#'+this.properties.submitButtonId).trigger('click');

                        });

                        break;

                    case "space":
                        keyElement.classList.add("keyboard__key--extra-wide");
                        keyElement.innerHTML = createIconHTML("space");

                        keyElement.addEventListener("click", () => {
                            this.properties.value += " ";
                            this._triggerEvent("oninput");
                        });

                        break;

                    case "done":
                        keyElement.classList.add("keyboard__key--wide", "keyboard__key--dark");
                        keyElement.innerHTML = createIconHTML("hide");

                        keyElement.addEventListener("click", () => {
                            this.close();
                            this._triggerEvent("onclose");
                        });

                        break;
                        case "left":
          keyElement.classList.add(
            "keyboard__key--wide",
            "keyboard__key--dark"
          );
          keyElement.innerHTML = createIconHTML("&#8592;");
          keyElement.addEventListener("click", () => {
            let el = this.properties.firstFocussed;
            let pos = this.properties.caret;
            this.setCaretPosition(el, pos - 1);
            // this.close();
            // this._triggerEvent("onclose");
          });

          break;
        case "right":
          keyElement.classList.add(
            "keyboard__key--wide",
            "keyboard__key--dark"
          );
          keyElement.innerHTML = createIconHTML("&#8594;");
          keyElement.addEventListener("click", () => {
            // alert("move right");
            // this._moveCaret(window, 1);

            let el = this.properties.firstFocussed;
            let pos = this.properties.caret;
            this.setCaretPosition(el, pos + 1);
            // this.close();
            // this._triggerEvent("onclose");
          });

          break;

                    case "tab":
                        keyElement.classList.add("keyboard__key--wide");
                        keyElement.innerHTML = createIconHTML("tab");
                        let f = this.properties.firstFocussed
                        keyElement.addEventListener("click", () => {
                            // this.properties.value += "\t";
                            // this._triggerEvent("oninput");
                            // alert('test');


                            this.moveInput(f);

                        });

                        break;

                    default:
                        keyElement.textContent = key.toLowerCase();

                        keyElement.addEventListener("click", () => {
                            this.properties.value += this.properties.capsLock ? key.toUpperCase() : key.toLowerCase();
                            this._triggerEvent("oninput");
                        });

                        break;
                }

                fragment.appendChild(keyElement);

                if (insertLineBreak) {
                    fragment.appendChild(document.createElement("br"));
                }
            });

            return fragment;
        },

        _triggerEvent(handlerName) {
            if (typeof this.eventHandlers[handlerName] == "function") {
                this.eventHandlers[handlerName](this.properties.value);
            }
        },

        _toggleCapsLock() {
            this.properties.capsLock = !this.properties.capsLock;

            for (const key of this.elements.keys) {
                if (key.childElementCount === 0) {
                    key.textContent = this.properties.capsLock ? key.textContent.toUpperCase() : key.textContent.toLowerCase();
                }
            }
        },
        _toggleShift() {
            this.properties.shift = !this.properties.shift;
            //console.log($('.spkey').css('display'));
            $('.spkey').toggle();
            this.properties.capsLock = !this.properties.capsLock;

            for (const key of this.elements.keys) {
                if (key.childElementCount === 0) {
                    key.textContent = this.properties.capsLock ? key.textContent.toUpperCase() : key.textContent.toLowerCase();
                }
            }

        },
        setSubmitButton(id){
                        //console.log(this.properties.submitButtonId) ;
                        this.properties.submitButtonId = id;

        },
        open(initialValue, oninput, onclose) {
            this.properties.value = initialValue || "";
            this.eventHandlers.oninput = oninput;
            this.eventHandlers.onclose = onclose;
            this.elements.main.classList.remove("keyboard--hidden");

        },

        close() {
            this.properties.value = "";
            this.eventHandlers.oninput = oninput;
            this.eventHandlers.onclose = onclose;
            this.elements.main.classList.add("keyboard--hidden");
            $('.modal').removeClass('moveup');
        },
        getInputFocus() {
            let currentFocussed = document.activeElement;
            //console.log(currentFocussed, currentFocussed.id, 'active one')
            return currentFocussed;
        },
        moveInput(startx) {
            let start = this.properties.firstFocussed.id;
    let inputs = document.getElementsByClassName("form-control");
    let allIds = [];

    let focussedIndex, nextIndex;
    for (let i = 0; i < inputs.length; i++) {
      allIds.push(inputs[i].id);
      if (start == inputs[i].id) {
        if (
          inputs[i].id === "custom_product_price"

        ) {
          this.close();
          this._triggerEvent("onclose");
        } else {
          nextIndex = i;
        }
      }
    }

    // if (
    //   document.getElementById(inputs[nextIndex].id) == "store_promotion_price"
    // ) {
    //   alert("ckech focuessed");
    // }
    nextIndex = nextIndex + 1;
    document.getElementById(this.properties.firstFocussed.id).blur();

    document.getElementById(inputs[nextIndex].id).focus();
    // document.getElementById(inputs[nextIndex].id).trigger("click");
    //console.log(document.getElementById(inputs[nextIndex].id), "new focused");

    this.properties.firstFocussed.id = inputs[nextIndex].id;
    //console.log("selected inputs ", allIds, nextIndex, start);
        }
    };

    window.addEventListener("DOMContentLoaded", function() {
        Keyboard.init('full');
        KeyboardNum.init();
        $("#keyboard_OPEN").on("click", function () {

    let newSubmitId = "barcodeSiubmit";

    KeyboardNum.setSubmitButton(newSubmitId);

    Keyboard.setSubmitButton(newSubmitId);

    // $('#product_lookup_description').blur();

    // $('#product_lookup_description').focus();
  });

        $("#read_barcode_POS").on("click", function () {

            let newSubmitId = 'barcodeSiubmit'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
            // $('#product_lookup_description').blur();
            // $('#product_lookup_description').focus();

          });


        $("#productlookup").on("click", function () {
            let newSubmitId = 'product_lookup'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
            // $('#product_lookup_description').blur();
            // $('#product_lookup_description').focus();
  });
//  modalopen buttonID
  $("#custom_Product").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'custom_product_insert'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });

  $("#add_customer").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'pos_customer_signup'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });
  //  modalopen buttonID
  $("#couponbtn").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'couponSubmit'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });
    //  modalopen buttonID
    $("#payout").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'payout_confirm'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });

   //  modalopen buttonID
   $("#walk_customer").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'walkinsubmit'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)

  });
   //  modalopen buttonID
   $("#cb").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'pos_cashback_insert'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });

    $("#price_override").on("click", function () {
     //   SubmitButtonId
             let newSubmitId = 'submit_price_override'
             KeyboardNum.setSubmitButton(newSubmitId)
             Keyboard.setSubmitButton(newSubmitId)
   });
    //  modalopen buttonID
    $("#pos_cashback_insert").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'cashBackNote'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });
    //  modalopen buttonclass
    $(".invRights").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'btnSave'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });
   //  modalopen buttonID
      //  modalopen buttonclass
      $(".replicatePro").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'copyinventortsubmit'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });
   //  modalopen buttonID
   $("#shifting").on("click", function () {
    //   SubmitButtonId
            let newSubmitId = 'POS_SHIFT_LOGUT'
            KeyboardNum.setSubmitButton(newSubmitId)
            Keyboard.setSubmitButton(newSubmitId)
  });


    });
</script>
<!-- The Modal -->
<div id="myModal" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2>Modal Header1</h2>
        </div>
        <div class="modal-body">
            <p>Some text in the Modal Body</p>
            <p>Some other text...</p>
        </div>
        <div class="modal-footer">
            <h3>Modal Footer</h3>
        </div>
    </div>

</div>



<!-- Trigger/Open The Modal -->
<!-- <button class="myBtn">Open Modal</button> -->

<!-- The Modal -->
<div id="myModal2" class="modal">

    <!-- Modal content -->
    <div class="modal2-content">
        <div class="modal-header">
            <span class="close">×</span>
            <h2>Modal Header2</h2>
        </div>
        <div class="modal-body">
            <p>Some text in the Modal Body</p>
            <p>Some other text...</p>
        </div>
        <div class="modal-footer">
            <h3>Modal Footer</h3>
        </div>
    </div>

</div>


<!-- <div id="myModalg_print_view" class="modal" style="max-width: 60% !important;">
    <div class="modal-content" style="width:100%;">
        <a href="#close-modal" rel="modal:close" class="print_receipt_view_modal_close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <div class="view_receipt_html"></div>
    </div>
</div> -->

<div id="myModalg_print_view" class="modal" style="max-width: 35% !important; position: unset;">
    <!-- Modal content -->
    <div class="modal-content blue modal_print_data" style="width:auto !important; height:auto !important; color: black; text-align: center;"></div>
</div>

<div id="myModalg" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <a href="#close-modal" rel="modal:close" class="print_receipt_modal_close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <!-- <span class="close">&times;</span> -->
        <p class="m-text1">Are You Sure?</p>
        <p class="m-text2">Do you want to print receipt for current bill
            or do you want to re-print previous transaction?</p>
        <?php /* <a href="#pref" rel="modal:open" class="m-b1">
            <div>Current Transaction</div>
        </a> */ ?>
        <div class="m-b1 print_receipt print_current_transaction" data-order_id="" data-print_type="c" style="pointer-events: none;text-align:center;">Current Transaction</div>
        <div class="m-b1 print_receipt_previous_transaction print_previous_transaction" data-order_id="" data-print_type="p">Previous Transaction</div>
    </div>

</div>
<div id="opencalc" class="modal">

    <!-- Modal content -->
    <div class="modal-content calc">
        <!-- <span class="close">&times;</span> -->
        <div class="viewnum">
            <div>
                <a href="#close-modal" class="opencalc_close" rel="modal:close"><img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
                <div class="dollarCon">
                    <span id='dollarSign'>$</span>
                    <p class="num" id="optxt"></p>

                </div>
                <p class="bal"> <b class="nam" style="position: absolute;left: 5px;font-size: 1.4vw;font-weight: inherit;">Total: $<span><span></b>
                    Balance:$<span id="return_balance_html"></span></p>
            </div>
        </div>
        <div class="flexBoxCal">
            <div class="bbkv gbg n">
                $1
            </div>
            <div class="bbkv gbg n">
                $5
            </div>
            <div class="bbkv gbg n">
                $10
            </div>
            <div class="bbkv gbg n">
                $20
            </div>
            <div class="bbkv n">
                7
            </div>
            <div class="bbkv n">
                8
            </div>
            <div class="bbkv n">
                9
            </div>
            <div class="bbkv gbg n">
                $50
            </div>
            <div class="bbkv n">
                4
            </div>
            <div class="bbkv n">
                5
            </div>
            <div class="bbkv n">
                6
            </div>
            <div class="bbkv gbg n">
                $100
            </div>
            <div class="bbkv n">
                1
            </div>
            <div class="bbkv n">
                2
            </div>
            <div class="bbkv n">
                3
            </div>
            <div class="bbkv ggbg" id="delt">
                <img src="<?php echo base_url(); ?>assets/images/delete2.svg" alt="">
            </div>
            <div class="bbkv n">
                0
            </div>
            <div class="bbkv n">
                00
            </div>
            <div class="bbkv n decimalkey">
                .
            </div>
            <div class="bbkv rbg2" id="del2">
                <svg width="57" height="23" viewBox="0 0 57 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M55.1306 1V16.2436H3.55194L6.91693 12.7688L5.60832 11.4176L0 17.2088L5.60832 23L6.91693 21.6487L3.55194 18.174H57V1H55.1306Z" fill="white" />
                    <path d="M20.775 11H15.891V3.201H20.775V4.631H17.409V6.413H20.456V7.766H17.409V9.57H20.775V11ZM28.9483 11H27.3533L23.8113 5.467V11H22.2933V3.201H24.1853L27.4303 8.36V3.201H28.9483V11ZM36.468 4.642H34.004V11H32.475V4.642H30.011V3.201H36.468V4.642ZM42.4205 11H37.5365V3.201H42.4205V4.631H39.0545V6.413H42.1015V7.766H39.0545V9.57H42.4205V11ZM47.7889 11L46.2599 7.997H45.4679V11H43.9389V3.201H46.9859C47.7339 3.201 48.3352 3.42833 48.7899 3.883C49.2445 4.33767 49.4719 4.90967 49.4719 5.599C49.4719 6.14167 49.3215 6.611 49.0209 7.007C48.7275 7.39567 48.3242 7.66333 47.8109 7.81L49.4829 11H47.7889ZM45.4679 6.688H46.6999C47.0812 6.688 47.3782 6.589 47.5909 6.391C47.8109 6.193 47.9209 5.93267 47.9209 5.61C47.9209 5.28 47.8109 5.016 47.5909 4.818C47.3782 4.62 47.0812 4.521 46.6999 4.521H45.4679V6.688Z" fill="white" />
                </svg>


            </div>


        </div>
    </div>

</div>
<div id="lookup" class="modal mwset">

    <!-- Modal content -->
    <div class="modal-content autoheight blue black">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <!-- <span class="close">&times;</span> -->
        <p class="m-text1">Product Lookup</p>
        <p class="m-text2" style="margin-bottom: 0!important;font-size: 1.7vw;">Scan the Product or enter UPC manually</p>
        <input style="height: 3.1vh;font-size: 2vw;" class="m-b1 b inputFile21 use-keyboard-input-num" name="product_lookup_description" id="product_lookup_description" placeholder="Scan Barcode / Enter UPC" autocomplete="off" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
        <span class="errors" id="lookup_err" style="color:red; font-size:24px"></span>
        <div class="m-b1 smbtn" id="product_lookup" style="font-size: 2vw;">Submit</div>

    </div>

</div>

<div id="customProduct" class="modal mwset">
    <!-- Modal content -->
    <div id='cpmd' class="modal-content autoheight blue black">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <!-- <span class="close">&times;</span> -->
        <p class="m-text1 custPTitle">Add Custom Product</p>

        <label for="cdinput" class="text-nowrap color-black cusProlbl"> Product UPC </label>
        <?php // $now = strtotime('now');
        //             $anotherNow = strtotime('now');
        //             $sameCounter = 0;
        //              while($anotherNow == $now){
        //              $sameCounter++;
        //            $anotherNow = strtotime('now');
        //            }
        //           echo $sameCounter; //8558
        ?>
        <input style="height: 3.1vh;font-size: 2vw;" class="inputforcusP form-control m-b1 b inputFile41 use-keyboard-input-num"  name="product_upc" id="product_upc" placeholder="" readonly="" value="" />
        <span class="errors" id="lookup_err" style="color:red; font-size:24px"></span>
        <label for="cdinput" class="cusProlbl text-nowrap color-black"> Product Name </label>

        <input style="height: 3.1vh;font-size: 2vw;" class=" inputforcusP m-b1 b inputFile51 use-keyboard-input form-control"  name="custom_product_name " id="custom_product_name" placeholder="" value="" oninput="" autocomplete="off" />

        <span class="errors" id="custom_prod_name_err" style="color:red; font-size:14px"></span>
        <label for="cdinput" class="cusProlbl text-nowrap color-black"> Product Price</label>
        <!--        <input style="height: 3.1vh;" class="m-b1 b inputFile52" name="custom_product_price" id="custom_product_price" placeholder="" value=""/>-->
        <div style="position:relative;width:100%">
            <span class="position-absolute" style="position:absolute;top: 50%;transform: translateY(-40%);margin-left: 0.8em;color:black;">$</span>
            <input style="height: 3.1vh;font-size: 2vw;" class=" form-control inputforcusP m-b1 b inputFile52 use-keyboard-input-num usefloathere" id="custom_product_price" type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="  this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
        </div>
        <span class="errors" id="custom_prod_price_err" style="color:red; font-size:14px"></span>
        <div class="d-flex w-100 jc-center" style="margin: 10px 0;">
            <label for="cdinput" class="text-nowrap color-black"> Container Deposit </label><input type="checkbox" name="Applicable_CRV" id="Applicable_CRV" class="w-auto is_container_deposit"  style="transform: scale(1.5);position: relative;top: 2px;left: 5px;">
            <label for="cdinput" class="text-nowrap color-black" style='    margin-bottom: .5em;margin-left: 1em;'> Tax </label><input type="checkbox" name="Applicable_Tax" id="Applicable_Tax" class="w-auto" style="transform: scale(1.5);position: relative;top: 2px;left: 5px;">
        </div>

        <?php
            $data1 = $this->Cashier_model->fetch_all_size();
        ?>

        <div style="width: 100%; display: none;" id="custom_product_size">
            <label for="cdinput" class="cusProlbl text-nowrap color-black"> Size</label>

            <input style="height: 3.1vh;font-size: 1vw;" class="inputforcusP form-control m-b1 b inputFile41"  list="sizes"  name="size" id="size" class=" form-control customcardinput use-keyboard-input" placeholder="-- Select Size --">
              <datalist id="sizes">
                <?php foreach($data1['sizename'] as $s) { ?>
                  <option value="<?=$s['name']?>"></option>
                <?php } ?>
              </datalist>
            <span class="errors" id="size_err" style="color:red; font-size:14px"></span>
        </div>

        <!-- <div class="m-b1 w-100 smbtn" id="custom_product_insert" style="font-size: 2vw;">Submit</div> -->
        <input type="submit" class="m-b1 w-100 smbtn" id="custom_product_insert" value=" Submit" style="font-size: 2vw;padding-top:3px;">

    </div>

</div>


<div id="priceOverride" class="modal mwset">
    <!-- Modal content -->
    <div id='cpmd' class="modal-content autoheight blue black">
        <a href="#close-modal" class="close_price_override" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <!-- <span class="close">&times;</span> -->
        <p class="m-text1 custPTitle">Price Override</p>

        <label for="cdinput" class="text-nowrap color-black cusProlbl">Product Name</label>
        <select class=" form-control m-b1 inputFile29 over_product product_select" ><option style="font-size:15px;">test</option></select>
        <span class="errors" id="select_pro_err" style="color:red; font-size:24px"></span>

        <label for="cdinput" class="cusProlbl text-nowrap color-black"> Product Base Price</label>
        <div style="position:relative;width:100%">
            <span class="position-absolute" style="position:absolute;top: 50%;transform: translateY(-40%);margin-left: 0.8em;color:black;">$</span>
            <input style="height: 3.1vh;font-size: 2vw;" readonly="" class="form-control inputforcusP m-b1 b " id="price_override_price_base" type="tel" value="0.00">
        </div>
        <label for="cdinput" class="cusProlbl text-nowrap color-black"> Product New Price</label>
        <!--        <input style="height: 3.1vh;" class="m-b1 b inputFile52" name="custom_product_price" id="custom_product_price" placeholder="" value=""/>-->
        <div style="position:relative;width:100%">
            <span class="position-absolute" style="position:absolute;top: 50%;transform: translateY(-40%);margin-left: 0.8em;color:black;">$</span>
            <input style="height: 3.1vh;font-size: 2vw;" class="form-control inputforcusP m-b1 b use-keyboard-input-num usefloathere" id="price_override_price" type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="  this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
        </div>
        <span class="errors" id="price_over_price_err" style="color:red; font-size:14px"></span>

        <!-- <div class="m-b1 w-100 smbtn" id="custom_product_insert" style="font-size: 2vw;">Submit</div> -->
        <input type="submit" class="m-b1 w-100 smbtn" id="submit_price_override" value="Submit" style="font-size: 2vw;padding-top:3px;">

    </div>

</div>


<div id="lookup_data" class="modal mwset">
    <!-- Modal content -->
    <div id='cpmd' class="modal-content autoheight blue black ">
        <p class="m-text1 pdetail-header">Product Details</p>

        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <div class="lookupop-con">
            <div class="text-wrap-lookup d-flex">
                <div class="lookuptext text-nowrap">Product Name: </div>
                <div id="product_name"></div>
            </div>
            <div class="text-wrap-lookup d-flex">
                <div class="lookuptext">Product Price:</div>
                <div id="product_price"></div>
            </div>
            <div class="text-wrap-lookup ppcon-lu d-flex ppcon-lu">
                <div class="lookuptext storeLOOk">Promotional Price:</div>
                <div id="store_promotion_Price"></div>
            </div>
        </div>
        <!-- <p class="m-text2" id="product_name" ></p>
        <p class="m-text2" id="product_price" ></p>
        <p class="m-text2" id="store_promotion_Price"> </p> -->
        <!-- <span class="close">&times;</span> -->
    </div>

</div>

<div id="refund" class="modal">
    <!-- Modal content -->
    <div class="modal-content blue recallmodal" style="padding: 10px;"></div>
</div>

<div id="recall" class="modal">
    <!-- Modal content -->
    <div class="mwrapper w-100 recall2modal"></div>
</div>

<div id="refund_previous_transaction" class="modal" style="max-width: 60% !important;">
    <!-- Modal content -->
    <div class="modal-content blue recallmodal"></div>
</div>


<div id="front-login1" class="modal" style="max-width: 643px;">


    <!-- Modal content -->
    <div class="modal-content blue autoheight cdmdl w-100 pdg-0" style='    border-radius: 5px 5px 0px 0px;'>
        <!-- <a href="#close-modal" rel="modal:close" id="close_cash_login"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x' style='right:0;top:0;left:unset;'></a> -->
        <a href="#close-modal" class="arn" rel="modal:close" id="close_shift_login">
            &times;
            <!-- <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x' style='right:0;top:0;left:unset;'> -->
        </a>
        <div class="cashdrop-con w-100">
            <div class="header-clgn text-center" style="font-size: 23px;">Shift Out Login</div>
            <form action="" method="post" class="pos-shift-logout" autocomplete="off">
                <div class="cdTopWrap remove-border w-auto">

                    <div class="col-md-12 m-0 p-0">
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <input type="hidden" name="module" value="">
                                <label for="shift_out_user" class="rolllabel shift0" style="font-size: 21px;">Employee ID: *</label> </label>
                                <input type="tel" autofocus="" style="font-size: 26px;" name="username" id="shift_out_user" class="form-control customcardinput bsinput" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2" autocomplete="off">
                                <span class="errors" id="shift_out1_err" style="color:red; font-size:20px"></span>
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <div class="form-group">
                                <label class="rolllabel" style="font-size: 21px;">Employee Password: *</label> </label>
                                <input type="password" name="password" id="shift_out_pass" style="font-size: 26px;" class="form-control customcardinput bsinput" aria-describedby="" maxlength="4" autocomplete="off">
                                <span class="errors" id="shift_out2_err" style="color:red; font-size:18px;white-space:nowrap;margin-top:10px;"></span>
                            </div>
                            <!-- <button type="submit" class="bigbtnforcd cdk" id="pos_shift_out" style="border:none;font-size: 30px;max-width:unset;margin-top:.8em;transition:all 500ms;visibility: hidden;">Enter</button> -->
                        </div>
                    </div>
                    <div class="popup-keypad-con">
                        <div class="cd-keypad-con">
                            <div class="cd-krow d-flex">
                                <div class="cd-keys cdk log_pay12">7</div>
                                <div class="cd-keys cdk log_pay12">8</div>
                                <div class="cd-keys cdk log_pay12">9</div>
                                <!-- <div class="cd-keys cdk log_pay backBTN">🠔</div> -->
                            </div>
                            <div class="cd-krow d-flex">
                                <div class="cd-keys cdk log_pay12">4</div>
                                <div class="cd-keys cdk log_pay12">5</div>
                                <div class="cd-keys cdk log_pay12">6</div>
                            </div>
                            <div class="cd-krow-col d-flex max-spread">
                                <div class="cdkey-col-wrap d-flex">
                                    <div class="cd-krow d-flex">
                                        <div class="cd-keys cdk log_pay12">1</div>
                                        <div class="cd-keys cdk log_pay12">2</div>
                                        <div class="cd-keys cdk log_pay12">3</div>
                                    </div>
                                    <div class="cd-krow d-flex">
                                        <div class="cd-keys cdk log_pay12 backBTN12">🠔</div>
                                        <div class="cd-keys cdk log_pay12">0</div>
                                        <button type="submit" class="bigbtnforcd cdk" id="shifLogout" style="border:none;font-size: 27px;max-width:80px;transition:all 500ms;">Enter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="clock_out_pos" class="modal" style="max-width: 527px;">
    <!-- Modal content -->
    <div class="modal-content blue autoheight cdmdl w-100 pdg-0" style='    border-radius: 5px 5px 0px 0px;'>
        <a href="#close-modal" class="arn" rel="modal:close" id="">&times;</a>
        <div class="cashdrop-con w-100">
            <div class="header-clgn text-center title12">Clock Out/End Shift</div>
            <div class="cdTopWrap remove-border w-auto" style="width: 90%;">
                <input type="hidden" id="hide_username" value="" name="hide_username">
                <div class="col-md-3 m-0 text-center" id="clock_in_pos">
                    <div class="hrms-tile">
                        <div class="hr-tile-img"><img src="<?php echo base_url(); ?>assets/images/92-926310.png" alt="" style="margin-top: 27px;height: 40px;width: 56px;" /></div>
                        <p class="m-0 hrms-text" style="font-size: 20px;" id="docUser1">Clock Out</p>
                    </div>
                </div>
                <a href="#shift_end_pos" onclick="shiftEnd()" rel="modal:open" id="shift_in1234">
                    <div class="col-md-3 text-center " style="margin-left:36px;">
                        <div class="hrms-tile">
                            <div id="shifting" class="hr-tile-img"> <img src="<?php echo base_url(); ?>assets/images/money 4.png" alt="" class="" style="margin-top: 27px;"></div>
                            <p class="m-0 hrms-text" style="font-size: 20px;"><?php if (empty($this->session->userdata['shiftdata']) || $shiftdat == 1) {
                                                                                    echo 'Start Shift';
                                                                                } elseif (!empty($this->session->userdata['shiftdata']) && $shiftdat == 0) {
                                                                                    echo 'End Shift';
                                                                                } ?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    table tr {
        background-color: #ffffff !important;
        color: #000000 !important;
    }
</style>
<div id="shift_end_pos" class="modal" style="max-width: 643px;">


    <!-- Modal content -->
    <div class="modal-content blue autoheight cdmdl w-100 pdg-0" style='    border-radius: 5px 5px 0px 0px;'>
        <a href="#close-modal" class="arn" rel="modal:close" id="">&times;</a>
        <div class="cashdrop-con w-100">
            <div class="header-clgn text-center" style="font-size: 20px;">End Shift</div>
            <span class="cdalert text-danger" style="font-size: 20px;color: red;padding-left: 4%;"></span>
            <form action="" method="post" class="shift_out_pos" autocomplete="off">

                <div class="remove-border w-auto" style="display: flex;padding-left: 1.5em;padding-right: 0.5em;padding-top: 1em;">

                    <div class="col-md-12 div1" style="height:94px;">
                        <div class="form-group">
                            <!-- <input type="hidden" name="module" value=""> -->
                            <label for="" class="rolllabel" style="font-size: 21px;">Cash in Drawer *</label>
                            <div style="position:relative;">
                                <span style="position:absolute;font-size: 20px;top: 50%;left: 5px; transform: translateY(-50%);">$</span>
                                <input type="tel" autofocus="" style="font-size: 26px;width: 85%;padding-left: 20px;" name="cash_in_drawer" id="pos_cash_in_drawer" class="form-control customcardinput bsinput use-keyboard-input-num usefloathere" aria-describedby="" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
                            </div>
                            <span class="errors" id="pos_cash_in_drawer_err" style="color:red; font-size:18px"></span>
                        </div>
                    </div>

                    <div class="col-md-12 div2" style="height:94px;">
                        <div class="form-group">
                            <label class="rolllabel" style="font-size: 21px;">Coin Dispenser *</label>
                            <div style="position:relative;">
                                <span style="position:absolute;font-size: 20px;top: 50%;left: 5px; transform: translateY(-50%);">$</span>
                                <input type="tel" name="coin_dispenser" id="pos_coin_dispenser" style="font-size: 26px;width: 85%;padding-left: 20px;" class="form-control customcardinput bsinput use-keyboard-input-num usefloathere" aria-describedby="" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
                            </div>
                            <span class="errors" id="pos_coin_dispenser_err" style="color:red; font-size:18px;white-space:nowrap;margin-top:10px;"></span>
                        </div>
                        <!-- <button type="submit" class="bigbtnforcd cdk" id="" style="border:none;font-size: 30px;max-width:unset;margin-top:.8em;transition:all 500ms;visibility: hidden;">Enter</button> -->
                    </div>

                </div>
                <div class="col-md-12 mt-3" >
                    <label class="customcardlabel" style="font-size: 20px!important;margin-left: 3.5%;">Scratcherr Inventory *</label>
                    <table class="table shift-out-table" >
                        <thead class='custommodalheader'>
                            <tr>
                                <th class="text-left color-white" style="font-size: 20px;padding-left: 1%;background:#ec4d4d;"> Bin#</th>
                                <th class='color-white' style="font-size: 20px;padding-left: 10%;background:#ec4d4d;text-align:left;">Last Scratcher No</th>
                            </tr>
                        </thead>
                        <?php $bins1 = $this->Cashier_model->get_all_active_bins(); ?>
                        <tbody id="sbins1">

                        </tbody>
                    </table>
                </div><br>
                <br>
                <div style="text-align: center;">
                    <button style="font-size: 20px;height:42px;width: 21%;background:#ffffff;margin-right: 10px;" type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm close_pos_shift">Close</button>
                    <button style="font-size: 20px;height:42px;width: 21%;background:#000000;color:white;" type="submit" id='POS_SHIFT_LOGUT' class="btn btn-primary customcardfooteraddbtn">End Shift</button>
                </div><br>
            </form>
        </div>
    </div>
</div>

<?php /* <div id="refund" class="modal">

    <!-- Modal content -->
    <div class="modal-content blue  recallmodal">
        <!-- <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>

        <p class="m-text1">Find Receipt</p>
        <p class="m-text2" style="width: 89%;">Enter customer mobile no manually or scan
            the reciept.</p>
        <Input class="m-b1 b" placeholder="Enter Mobile Number" />
        <a href="#makeref" rel="modal:open" class="m-b1">
            <div>Search</div>
        </a>
        </a>
        -->


         <div class="mwrapper w-100">
    <!--  <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a> -->
    <div class="recall-title rftitle pad1 d-flex "> <div class="m-0 w-100">  <label for="rf-date">Date:</label>
  <input type="date" id="rf-date" class='w-auto'name="rf-date"></div> <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x x2'></a> </div>
    <div class="recall-con w-100 d-flex">
        <div class="left-recall w-50">
            <div class="left-wrap newleftwrap">
                <table class="lrc w-100">
                    <thead class='sticky-top'>
                        <tr>
                            <th width='10%'>Id</th>
                            <th width='60%'>Date</th>
                            <th width='20%'>No Of Items</th>
                            <th width='10%'>Amount</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>

                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>
                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>
                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>
                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>
                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>
                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>
                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>
                        <tr class='tr ' >
                            <td style="text-align:center">a</td>
                            <td>b</td>
                            <td style="text-align:center">c</td>
                            <td style="text-align:center">c</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="right-recall w-50">
            <div class="rcpt-wrapper refundwrap product_order_details_append">
            <div class="rcpt-main">
    <table class="rrc w-100">
        <thead>
            <tr>
                <th style=" border-top-left-radius: 8px; "><div class=""><input type='checkbox' class='master-check refundCheck2'/>QTY</div></th>
                <th>ITEM</th>
                <th style=" border-top-right-radius: 8px; ">Total</th>
            </tr>
        </thead>
        <tbody>
        <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>  <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>  <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>  <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>  <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>
            <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>
            <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>
            <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>
            <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>
            <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>
            <tr>
                <td style="text-align:center"><input type='checkbox' class='refundCheck'/>fd</td>
                <td>dfvfdg</td>
                <td style="text-align:center">$54453</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="total-con coupon-total-con">
    <div class="p1">
        <p>Total Items</p>
        <p id="total_item">gdfvv<?php print $total_item; ?></p>
    </div>
    <div class="p1">
        <p>Subtotal</p>
        <p id="sub_total">$32434<?php print $sub_total; ?></p>
    </div>


    <div class="p1">
        <p>Tax</p>
        <p id="tax_html">$453<?php print isset($order_details[0]->tax_amount) ? $order_details[0]->tax_amount : "0.00"; ?></p>
    </div>

    <div class="p1">
        <p>Container Deposit</p>
        <p>$<label id="CRV_box"><?php print isset($order_details[0]->container_deposit) ? $order_details[0]->container_deposit : "0.00"; ?></label></p>
    </div>

    <div class="p1" id="discount_div" style="display: none;">
        <p>Discount <span id="applied_coupon"></span></p>
        <p style="color: red;"><span style="color: red;">(-)</span> $<span id="coupon_discount">0.00</span></p>
    </div>

    <div class="p1">
        <p style="color: black;">Total</p>
        <p style="color: black;" id="grand_total">$<?php print isset($order_details[0]->cart_grand_total) ? $order_details[0]->cart_grand_total : "0.00"; ?></p>
    </div>
    <div class="p1" id="transaction_type" style="display: none;">
        <p>Transaction Type</p>
        <p>Cash</p>
    </div>

    <div class="p1" id="transaction_status" style="display: none;">
        <p>Transaction Status</p>
        <p>
            <font color="green">Success</font>
        </p>
    </div>
    <div class="p1" id="tendered_amt" style="display: none;">
        <p>Amount Tendered</p>
        <p>
            <font color="green" id="transaction_tendered">$0.00</font>
        </p>
    </div>
    <div class="p1" id="transaction_return_balance" style="display: none;">
        <p>Return Balance</p>
        <p>
            <font color="green" id="transaction_return_balance_html">$0.00</font>
        </p>
    </div>

    <div class="p1 coupon_details"></div>

    </div>
    <div class="btn-row-refund w-100 text-center">
     <a href="#refund-second2" rel="modal:open"><button class="recall-btn mbtn  ">Refund</button></a>
    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="actions-row d-flex w-100">
       <a href="#close-modal" rel="modal:close" id="recall_order_modal"><button class="cancel-btn mbtn">Cancel</button></a>
    </div>

    </div>

</div> */ ?>


<div id="refund-second2" class="modal">
    <!-- Modal content -->
    <div class="modal-content blue recallmodal secondrefund ">
        <div class="right-recall w-100" style="margin:auto auto;">
            <div class="rcpt-wrapper refundwrap product_order_details_append">
                <div class="rcpt-main">
                    <form name="refund_order_form" id="refund_order_form">
                        <input type="hidden" name="tax_amount_refund" id="tax_amount_refund">
                        <input type="hidden" name="container_deposit_refund" id="container_deposit_refund">
                        <input type="hidden" name="total_amount_refund" id="total_amount_refund">
                        <input type="hidden" name="refund_reedeem_amount" id="refund_reedeem_amount">
                        <input type="hidden" name="refund_discount_amount" id="refund_discount_amount">
                        <input type="hidden" name="refund_discount_discount_amount" id="refund_discount_discount_amount">


                        <table class="rrc w-100">
                            <thead>
                                <tr>
                                    <th style=" border-top-left-radius: 8px; ">
                                        <div class="">QTY</div>
                                    </th>
                                    <th>ITEM</th>
                                    <th style=" border-top-right-radius: 8px; ">Total</th>
                                </tr>
                            </thead>
                            <tbody id="refund_popup_html"></tbody>
                        </table>
                    </form>
                </div>
                <div class="total-con coupon-total-con">
                    <div class="p1">
                        <p>Total Items</p>
                        <p id="total_item_refund"></p>
                    </div>
                    <div class="p1">
                        <p>Subtotal</p>
                        <p id="sub_total_refund"></p>
                    </div>


                    <div class="p1">
                        <p>Tax</p>
                        <p id="tax_html_refund"></p>
                    </div>

                    <div class="p1">
                        <p>Container Deposit</p>
                        <p>$<label id="CRV_box_refund"></label></p>
                    </div>

                    <div class="p1" id="discount_total_on_popup" style="display:none;">
                        <p>Coupon Discount</p>
                        <p id="discount_total_on_popup_val"></p>
                    </div>

                    <div class="p1" id="reedem_total_on_popup" style="display:none;">
                        <p>Reedem Discount</p>
                        <p id="reedem_total_on_popup_val"></p>
                    </div>

                    <div class="p1" id="total_discount_discount_on_popup" style="display:none;">
                        <p>Custom Discount</p>
                        <p id="total_discount_discount_on_popup_val"></p>
                    </div>





                    <div class="p1">
                        <p style="color: black;">Total</p>
                        <p style="color: black;" id="grand_total_refund"></p>
                    </div>
                    <div class="p1">
                        <p style="color: black;">Order ID</p>
                        <p style="color: black;" id="receipt_no"></p>
                    </div>
                    <div class="p1 coupon_details"></div>

                </div>
                <div class="btn-row-refund w-100 d-flex just-bet">
                    <a href="#close-modal" rel="modal:close"><button class="cancel-btn mbtn">Cancel</button></a>
                    <a href="javascript:;" id="back_to_refund_page" style="margin-left: 120px;"><button class="cancel-btn mbtn" style="background-color: red; font-size: 35px;">🠔</button></a>

                    <button class="recall-btn mbtn complete_refund">Refund</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="recall-order" class="modal ">


    <!-- Modal content -->
    <div class="modal-content blue recallmodal"></div>
</div>

<!-- <div id="payout" class="modal mwset">


     Modal content
    <div class="modal-content blue autoheight pout"> <div class="container"> -->

<div id="payout_modal" class="modal mwset">
    <!-- Modal content -->
    <div class="modal-content blue autoheight pout">
        <div class="container">
            <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x' style='left:0;top:0;'></a>
            <header class='tabheaderpo '>
                <div id="material-tabs">

                    <a id="tab1-tab" href="#tab1" class="active ven">Vendor</a>
                    <a id="tab2-tab" href="#tab2" class="emp">Employee</a>
                    <a id="tab3-tab" href="#tab4" class="scr">Scratcher / Lotto</a>
                    <a id="tab4-tab" href="#tab3" class="prec text-nowrap">Recent Payouts</a>
                    <span class="yellow-bar"></span>
                </div>
            </header>

            <div class="tab-content">
                <div class="pane" id="tab3">
                    <div class="m-0 w-100">
                        <label for="po-date" class='color-black' style="font-size:20px;">Date:</label>
                        <input type="date" class="w-auto" name="po-date" id="payout_date" onchange="GetPayouts_bydate();" max="<?=date('Y-m-d')?>">
                        <div class="left-wrap newleftwrap hadjst" style="min-height: 370px;">
                            <table class="lrc w-100 " id="recent_pay">
                                <thead class="sticky-top" id="recents_payouts">
                                    <tr>
                                        <th style="text-align:left">Date</th>
                                        <th>Name</th>
                                        <th>Amt</th>
                                        <th>Type</th>

                                    </tr>
                                </thead>
                                <tbody id="tbl_payouts">
                                    <?php $all_payouts = $this->Cashier_model->get_all_payouts();
                                    if (empty($all_payouts)) { ?>
                                        <tr class="tr " id="tbl_tr_payout">
                                            <td colspan="4">No Data Found</td>
                                        </tr>

                                        <?php } else {
                                        foreach ($all_payouts as $payouts_list) {
                                            $date_time = $payouts_list['created_at'];
                                            $new_date = date("m/d/Y", strtotime($date_time));
                                        ?>
                                            <tr class="tr " id="tbl_tr_payout">
                                                <td style="text-align:left"><?php echo $new_date; ?></td>
                                                <td style="text-align:center"><?php echo $payouts_list['supplier_emp_name'] ?></td>
                                                <td style="text-align:center">$<?php echo $payouts_list['payout_money'] ?></td>
                                                <td style="text-align:center"><?php echo $payouts_list['payment_type'] ?></td>
                                            </tr>
                                    <?php }
                                    } ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
                <div class="pane" id="tab1">
                    <div class='d-flex' style='display:flex;width:100%;justify-content:space-between;'>
                        <div class="w-100">
                            <?php $supp = $this->Cashier_model->get_all_suppliers();  ?>
                            <input list="payoutVendor" name="payout_vendor" id="payout_vendor" placeholder="--Select Vender--" style="font-size: 20px;width: 94%;margin: 0;height: 64%;border-radius: 2px;border-color: #746e6e;" onchange='CheckVendors(this.value);'>
                            <datalist class='paydrop inputFile26 w-100' id="payoutVendor" >
                              <option value="Others">Others</option>
                              <?php foreach ($supp as $vendorlist) { ?>
                              <option value="<?php echo $vendorlist['supplier_name']; ?>">
                              <?php } ?>
                            </datalist>
                            <span class="errors" id="ext_ven_err" style="color:red; font-size:14px;display: block;margin: 5px 0 0;"></span>
                        </div>
                        <div class="w-100">
                            <?php $category = $this->Cashier_model->get_fix_category();  ?>
                            <input list="payoutCategory" name="category_id" id="category1" placeholder="--Select Category--" style="font-size: 20px;width: 94%;margin: 0;height: 64%;border-radius: 2px;border-color: #746e6e;">
                            <datalist class='paydrop inputFile26 w-100' id="payoutCategory" >
                              <option value="Others">Others</option>
                              <?php foreach ($category as $c) { ?>
                              <option value="<?php echo $c['category_name']; ?>">
                              <?php } ?>
                            </datalist>
                            <span class="errors" id="cat1_err" style="color:red; font-size:14px"></span>
                        </div>
                    </div>

                    <div>
                        <div class="w-100">
                            <!-- <label for=""></label> -->
                            <input type="text" id="more_info" class='m-b1 b  inputFile26 use-keyboard-input' autocomplete="off" placeholder="Enter Vendor Name" style='display:none; width: 95%;margin-left: 5px;font-size: 20px;'>
                            <span class="errors" id="ven_err" style="color:red; font-size:14px;display: block;margin: 5px 0;"></span>
                        </div>
                    </div>
                    <!-- <label for=""></label> -->
                    <input type="text" id="catgoryName1" class='m-b1 b  inputFile26 use-keyboard-input' name="category_name" autocomplete="off" placeholder="Enter Category Name" style="width:96%; margin-left: 1px;display:none;font-size: 20px;">

                    <span class="errors" id="catn_err" style="color:red; font-size:14px"></span>
                    <div>
                        <div class="w-100">
                            <label for=""></label>
                            <input type="text" id="notes1" class='m-b1 b  inputFile26 use-keyboard-input' autocomplete="off" name="notes" placeholder="Notes" style="width:95%;text-align:left;    margin: .5em 0 0;background: floralwhite;border: 1px solid burlywood; font-size:20px;">
                            <span class="errors" id="note1_err" style="color:red; font-size:14px"></span>
                        </div>
                    </div>
                    <div class="keypad-con">keys</div>
                </div>
                <div class='pane' id="tab2">
                    <div>
                        <?php $users_data = $this->Cashier_model->get_all_users(); ?>
                        <!-- <select style="width:100%;font-size:20px;" class='paydrop inputFile26' id="payout_emp" name="payout_emp" onchange='CheckEmps(this.value);'>
                            <option value="">--Select Employee--</option>
                            <?php foreach ($users_data as $employeelist) { ?>
                                <option value="<?php echo $employeelist['first_name'] . ' ' . $employeelist['last_name'] ?>"><?php echo $employeelist['first_name'] . ' ' . $employeelist['last_name']; ?></option>
                            <?php } ?>
                        </select> -->

                        <input list="empName" name="payout_emp" id="payout_emp" placeholder="--Select Employee--" style="font-size:20px; width: 96%;margin: 0;height: 33%;border-radius: 2px;border-color: #746e6e;">
                        <datalist class='paydrop inputFile26' id="empName">
                          <?php foreach ($users_data as $employeelist) { ?>
                          <option value="<?php echo $employeelist['first_name'] . ' ' . $employeelist['last_name'] ?>">
                          <?php } ?>
                        </datalist>
                        <span class="errors" id="em_err" style="color:red; font-size:14px"></span>
                    </div>
                    <div class="pane " id="tab3">
                        <div class="w-100">
                            <label for=""></label>
                            <input type="text" id="notes2" class='m-b1 b  inputFile26 use-keyboard-input' name="notes" autocomplete="off" placeholder="Notes" style="width:95%;text-align:left;    margin: .5em 0 0;background: floralwhite;border: 1px solid burlywood; font-size:20px;">
                            <span class="errors" id="notes2_err" style="color:red; font-size:14px"></span>
                        </div>
                    </div>
                    <label for=""></label>
                    <div class="keypad-con">keys</div>
                </div>
                <div class='pane' id="tab4">
                  <div class='d-flex' style='display:flex;width:100%;margin-bottom: 2%;justify-content:space-between;'>
                      <div class="w-100">
                          <select class='paydrop inputFile26 w-100' class='paydrop inputFile26' id="select_scratcher" name="select_scratcher" style="width:100%;font-size:20px;">
                            <option value="Scratcher">Scratcher</option>
                            <option value="Lotto">Lotto</option>
                          </select>
                      </div>
                  </div>
                  <div class='d-flex scratcher_div' style='display:flex;width:100%;justify-content:space-between;'>
                      <div class="w-100">
                          <?php $scratcher_data = $this->Cashier_model->get_all_scratchers(); ?>
                              <input list="productName" name="product_name" id="scratcher_id" placeholder="--Select Scratcher--" style="font-size:20px; width: 96%;margin: 0;height: 33%;border-radius: 2px;border-color: #746e6e;">
                              <datalist class='paydrop inputFile26' id="productName">
                                <?php foreach ($scratcher_data as $scratcher_list) { ?>
                                <option value="<?php echo $scratcher_list['product_name']; ?>">
                                <?php } ?>
                              </datalist>
                          <span class="errors" id="scratcher_err" style="color:red; font-size:14px"></span>
                      </div>
                </div>
                <div class='d-flex lotto_div' style='display:flex;width:100%;justify-content:space-between;'>
                      <div class="w-100">
                            <input type="text" name="lotto_name" id="lotto_name" class='inputFile26' style="font-size:20px; width: 96%;margin: 0;height: 33%;border-radius: 2px;border-color: #746e6e;" placeholder="Enter Lotto Name">
                            <span class="errors" id="lotto_err" style="color:red; font-size:14px"></span>
                      </div>
                  </div>
                    <div class="pane " id="tab4" style="margin-left: -5px; margin-top:3%">
                        <div class="w-100">
                        </div>
                    </div>
                    <!--  -->
                    <label for=""></label>
                    <div class="keypad-con">keys</div>
                </div>
                <div id='hidinrecent' class="cdTopWrap remove-border" style="padding: 0;border:0;width:100%;justify-content: space-between;">
                    <div class="cd-inputcon" style="padding: 0;width: 180px;">
                        <label class="text-nowrap color-black" style="margin-top: 10px;margin-bottom: 10px;display: block;font-size:24px;font-weight: 600;">Payment Type </label>
                        <select class='paydrop inputFile46 ' id="payment_type" name="payment_type" style="font-size: 24px;text-align:center;width:186px;">
                            <option value="Cash">Cash </option>
                            <option value="Check">Check </option>
                            <!-- <option value="Card">Card </option> -->
                        </select>

                        <label class="text-nowrap color-black checkNo" style="margin-top: 15px;margin-bottom: 10px;display: block;font-size:24px;font-weight: 600;">Check No.</label>
                        <input class=" " name="check_no" placeholder="Check No" style="background: white;border: 2px solid black;padding-left: 12px;font-size:24px; width:94%"   oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="check_no" />
                        <span class="errors" id="check_err" style="color:red; font-size:14px"></span>
                        <label for="cdinput" class="text-nowrap color-black" style="margin-top: 17px;display: block;font-size:24px;font-weight: 600;">Payout Amount </label>
                        <div class="position-relative" style="position:relative;">
                            <span class="position-absolute" style="position: absolute;top: 50%;transform: translateY(-50%);margin-left: 0.5em;color: black;font-size: 20px;margin-top: 0.35em;">$</span>
                            <input class="cashdrop-input color-black inputFile26" name="payout_money" placeholder="Enter Amount" style="background: yellow;border: 2px solid black;padding-left: 22px;margin-top:.5em;font-size:24px;" type="tel" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" id="Payout_amount" />
                        </div>
                        <span class="errors" id="mon_err" style="color:red; font-size:14px"></span>

                    </div>
                    <div class="popup-keypad-con">
                        <div class="cd-keypad-con">
                            <div class="cd-krow d-flex">
                                <div class="cd-keys cdk cdk_pay">7</div>
                                <div class="cd-keys cdk cdk_pay">8</div>
                                <div class="cd-keys cdk cdk_pay">9</div>
                                <!-- <div class="cd-keys cdk cdk_pay">Back</div> -->

                            </div>
                            <div class="cd-krow d-flex">
                                <div class="cd-keys cdk cdk_pay">4</div>
                                <div class="cd-keys cdk cdk_pay">5</div>
                                <div class="cd-keys cdk cdk_pay">6</div>

                            </div>
                            <div class="cd-krow-col d-flex max-spread">
                                <div class="cdkey-col-wrap d-flex">
                                    <div class="cd-krow d-flex">
                                        <div class="cd-keys cdk cdk_pay">1</div>
                                        <div class="cd-keys cdk cdk_pay">2</div>
                                        <div class="cd-keys cdk cdk_pay">3</div>
                                    </div>
                                    <div class="cd-krow d-flex">
                                        <div class="cd-keys cdk cdk_pay">.</div>
                                        <div class="cd-keys cdk cdk_pay">0</div>
                                        <div class="cd-keys cdk cdk_pay">🠔</div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="btns-row d-flex jc-bet mt1em">
                  <a rel='modal:close' id="closePAY">
                    <button style="font-size: 20px;" class='cancel-btn mbtn'>Cancel</button>
                  </a>
                  <button style="font-size: 20px;" class='recall-btn mbtn smbtn' id="payout_confirm">Confirm</button>
                </div>
            </div>
            <!-- end container -->
        </div>
    </div>
    <!--<div id="payout_modal" class="modal">
 Modal content
    <div class="modal-content blue autoheight pout"> <div class="container">
    <header class='tabheaderpo '>
    <div id="material-tabs">
    <a id="tab1-tab" href="#tab1" class="active">Vendor</a>
    <a id="tab2-tab" href="#tab2">Employee</a>
    <span class="yellow-bar"></span>
                </div>
        </header>


        <div class="tab-content">
                <div id="tab1">
                <div >
            <select class='paydrop' >
                <option value="">Select Vendor</option>
                <option value="asdd">2</option>
                <option value="232">3</option>
            </select>


        </div>
        <label for=""></label>
            <input type="text" class='payoutinput' placeholder="More Info">
            <div class="keypad-con">keys</div>
            <div class="cdTopWrap">
                <div class="cd-inputcon">
                    <label for="cdinput" class="text-nowrap color-black">Payout amount </label>
                    <input type="text" class='cashdrop-input' id="poinput">
                </div>
                <div class="popup-keypad-con">
                    <div class="cd-keypad-con">
                        <div class="cd-krow d-flex">
                            <div class="cd-keys cdk">7</div>
                            <div class="cd-keys cdk">8</div>
                            <div class="cd-keys cdk">9</div>
                            <div class="cd-keys cdk">Back</div>
                        </div>
                        <div class="cd-krow d-flex">
                            <div class="cd-keys cdk">4</div>
                            <div class="cd-keys cdk">5</div>
                            <div class="cd-keys cdk">6</div>
                            <div class="cd-keys cdk">Tab</div>
                        </div>
                        <div class="cd-krow-col d-flex">
                            <div class="cdkey-col-wrap d-flex">
                                <div class="cd-krow d-flex">
                                    <div class="cd-keys cdk">1</div>
                                    <div class="cd-keys cdk">2</div>
                                    <div class="cd-keys cdk">3</div>

                                </div>
                                <div class="cd-krow d-flex">
                                    <div class="cd-keys cdk">.</div>
                                    <div class="cd-keys cdk">0</div>
                                    <div class="cd-keys cdk">.</div>

                                </div>

                            </div>
                            <div class="bigbtnforcd cdk">Enter</div>
                        </div>
                    </div>
                </div>
        </div>
            <div class="btns-row d-flex jc-bet mt1em"><button class='recall-btn mbtn'>Confirm</button><button class='cancel-btn mbtn'>Cancel</button></div>


                </div>
                <div id="tab2">
                <div >
            <select class='paydrop' >
                <option value="">Select Employeee</option>
                <option value="asdd">2</option>
                <option value="232">3</option>
            </select>


        </div>
        <label for=""></label>
            <input type="text" class='payoutinput' placeholder="More Info">
            <div class="keypad-con">keys</div>
            <div class="cdTopWrap">
                <div class="cd-inputcon">
                    <label for="cdinput" class="text-nowrap color-black">Payout amount</label>
                    <input type="text" class='cashdrop-input' id="poinput">
                </div>
                <div class="popup-keypad-con">
                    <div class="cd-keypad-con">
                        <div class="cd-krow d-flex">
                            <div class="cd-keys cdk">7</div>
                            <div class="cd-keys cdk">8</div>
                            <div class="cd-keys cdk">9</div>
                            <div class="cd-keys cdk">Back</div>
                        </div>
                        <div class="cd-krow d-flex">
                            <div class="cd-keys cdk">4</div>
                            <div class="cd-keys cdk">5</div>
                            <div class="cd-keys cdk">6</div>
                            <div class="cd-keys cdk">Tab</div>
                        </div>
                        <div class="cd-krow-col d-flex">
                            <div class="cdkey-col-wrap d-flex">
                                <div class="cd-krow d-flex">
                                    <div class="cd-keys cdk">1</div>
                                    <div class="cd-keys cdk">2</div>
                                    <div class="cd-keys cdk">3</div>

                                </div>
                                <div class="cd-krow d-flex">
                                    <div class="cd-keys cdk">.</div>
                                    <div class="cd-keys cdk">0</div>
                                    <div class="cd-keys cdk">.</div>

                                </div>

                            </div>
                            <div class="bigbtnforcd cdk">Enter</div>
                        </div>
                    </div>
                </div>
        </div>
            <div class="btns-row d-flex jc-bet mt1em"><button class='recall-btn mbtn'>Confirm</button><button class='cancel-btn mbtn'>Cancel</button></div>


                </div>

        </div>
</div>
end container </div>
</div>-->
    <div id="cashdrop2" class="modal ">


        <!-- Modal content -->
        <div class="modal-content blue  autoheight cdmdl" style="
    width: auto;
    transform: scale(1.3);
">
            <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x closeRcpt' style='right:0;top:0;left:unset;'></a>
            <div class="cashdrp-con w-100">
                <div class="cdBotWrap">
                    <div class="right-rcptviewer-con">
                        <div class="rcptviewer w-100" id="downloadPDF">
                            <!-- <div class="text-center rcptext-cd pt1em bold">Campus Liquor</div> -->
                            <!-- <div class="text-center rcptext-cd bold">5425 El Cajon Blvd.,</div>
                      <div class="text-center rcptext-cd bold">San Diego, CA 92115</div> -->
                            <div class="text-center rcptext-cd bold">********************************************************</div>
                            <div class="text-center rcptext-cd bold">Cash Drop</div>
                            <div class="text-center rcptext-cd bold">********************************************************</div>
                            <div class="d-flex jc-bet w-94 pt1em">
                                <div class="rcptext-cd">Date:</div>
                                <!-- <div class="rcptext-cd" id="bdate"></div> -->
                                <div class="rcptext-cd" id="print_date" style="font-size: 15px;"></div>
                            </div>
                            <div class="d-flex jc-bet w-94 pt1em">
                                <div class="rcptext-cd">Cashier:</div>
                                <div class="rcptext-cd" id="namec"></div>
                            </div>
                            <div class="d-flex jc-bet w-94">
                                <div class="rcptext-cd">User ID:</div>
                                <div class="rcptext-cd" id="idc"></div>
                            </div>
                            <div class="d-flex jc-bet w-94 ">
                                <div class="rcptext-cd">Drop No:</div>
                                <div class="rcptext-cd" id="pdrop"></div>
                            </div>
                            <div class="d-flex jc-bet w-94">
                                <div class="rcptext-cd">Cash Drop Amount:</div>
                                <div class="rcptext-cd">$ <span id="drpAmt" class="rcptext-cd"></span></div>
                            </div>
                            <!-- <div class="d-flex jc-bet w-94 pt1em">
                          <div class="rcptext-cd">Signatures:</div>
                          <div class="rcptext-cd">______________</div>
                      </div> -->
                            <div class="text-center rcptext-cd bold">********************************************************</div>
                            <div class="d-flex jc-bet w-94 ">
                                <!-- <div class="rcptext-cd bold">Printed On:</div>
                          <div class="rcptext-cd bold" id="print_date"></div> -->
                            </div>
                        </div>
                    </div>
                    <div class="cd-rightbtns">
                        <div class="cd-keys" id="dropPRINT">Print</div>
                        <!-- <div class="cd-keys" id="generatePDF">Save</div> -->
                        <div class="cd-keys" id="closePrint">Close</div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="cashdrop" class="modal ">


        <!-- Modal content -->
        <div class="modal-content blue autoheight cdmdl" style='padding: 1.5em;'>
            <a href="#close-modal" rel="modal:close" id="Close_CASH"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x' style='top:0;left:0;'></a>
            <div class="cashdrop-con w-100">
                <div class="cdTopWrap">
                    <div class="cd-inputcon">
                        <label for="cdinput" class="text-nowrap labelset" style="    font-weight: 600;">Cash Drop Amount</label>
                        <div class="position-relative">
                            <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;font-size: 20px">$</span>
                            <input style="font-size: 20px;" type="tel" class='cashdrop-input' id="cdinput" onkeyup="this.value = get_float_value(this.value)" onclick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">

                        </div>
                        <span class="errors" id="drop_err" style="color:red; font-size:14px;"></span>
                        <!-- <a href='#cashdrop2' rel='modal:open' class="bigbtnforcd cdk" id="cash_Drop" style="margin-top: 1em; font-size:30px;transition:all 500ms;padding: .3em 1.2em;
    margin: 1em 0;">Enter</a> -->
                        <input type="hidden" id="cashUSER_id" value="">
                        <button type="button" class="bigbtnforcd cdk" id="cash_Drop" style="margin-top: 1em; font-size:30px;transition:all 500ms;padding: .3em 1.2em;
    margin: 1em 0; width: 208%;
    max-width: 102%;border-color:white;">Enter</button>
                    </div>
                    <div class="popup-keypad-con">
                        <div class="cd-keypad-con">
                            <div class="cd-krow d-flex">
                                <div class="cd-keys cdk drop_pay">7</div>
                                <div class="cd-keys cdk drop_pay">8</div>
                                <div class="cd-keys cdk drop_pay">9</div>
                                <!-- <div class="cd-keys cdk drop_pay">Back</div> -->
                                <!-- <div class="cd-keys cdk drop_pay">🠔</div> -->
                            </div>
                            <div class="cd-krow d-flex">
                                <div class="cd-keys cdk drop_pay">4</div>
                                <div class="cd-keys cdk drop_pay">5</div>
                                <div class="cd-keys cdk drop_pay">6</div>
                                <!-- <div class="cd-keys cdk">Tab</div> -->
                            </div>
                            <div class="cd-krow-col d-flex max-spread">
                                <div class="cdkey-col-wrap d-flex">
                                    <div class="cd-krow d-flex">
                                        <div class="cd-keys cdk drop_pay">1</div>
                                        <div class="cd-keys cdk drop_pay">2</div>
                                        <div class="cd-keys cdk drop_pay">3</div>

                                    </div>
                                    <div class="cd-krow d-flex">
                                        <div class="cd-keys cdk drop_pay">.</div>
                                        <div class="cd-keys cdk drop_pay">0</div>
                                        <!-- <div class="cd-keys cdk drop_pay">.</div> -->
                                        <div class="cd-keys cdk drop_pay">🠔</div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- cashLogin Modal -->

    <!-- cashLogin Modal -->

    <div id="cash_login" class="modal ">


        <!-- Modal content -->
        <div class="modal-content blue autoheight cdmdl w-100 pdg-0" style='border-radius: 5px 5px 0px 0px;'>
            <!-- <a href="#close-modal" rel="modal:close" id="close_cash_login"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x' style='right:0;top:0;left:unset;'></a> -->
            <a href="#close-modal" class="arn" rel="modal:close" id="close_cash_login">
                &times;
                <!-- <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x' style='right:0;top:0;left:unset;'> -->
            </a>
            <div class="cashdrop-con w-100">
                <div class="header-clgn text-center" style="font-size: 23px;">Cash Drop Login</div>
                <form action="" method="post" class="cash-login" autocomplete="off">
                    <div class="cdTopWrap remove-border w-auto">

                        <div class="col-md-12 m-0 p-0">
                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <input type="hidden" name="module" value="">
                                    <label class="rolllabel" style="font-size: 21px;">Employee ID: *</label> </label>
                                    <input type="tel" autofocus="" style="font-size: 26px;" name="username" id="cid" class="form-control customcardinput inputFile40 bsinput" aria-describedby="" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" maxlength="2">
                                    <span class="errors" id="idpos2_err" style="color:red; font-size:20px"></span>
                                </div>
                            </div>

                            <div class="col-md-12 ">
                                <div class="form-group">
                                    <label class="rolllabel" style="font-size: 21px;">Employee Password: *</label> </label>
                                    <input type="password" name="password" id="cpwd" style="font-size: 26px;" class="form-control customcardinput inputFile40 bsinput" aria-describedby="" maxlength="4">
                                    <span class="errors" id="pwdpos2_err" style="color:red; font-size:18px;white-space:nowrap;margin-top:10px;"></span>
                                </div>
                                <!-- <button type="submit" class="bigbtnforcd cdk" id="cLogin" style="border:none;font-size: 30px;max-width:unset;margin-top:.8em;transition:all 500ms;visibility: hidden;">Enter</button> -->
                            </div>
                        </div>
                        <div class="popup-keypad-con">
                            <div class="cd-keypad-con">
                                <div class="cd-krow d-flex">
                                    <div class="cd-keys cdk log_pay">7</div>
                                    <div class="cd-keys cdk log_pay">8</div>
                                    <div class="cd-keys cdk log_pay">9</div>
                                    <!-- <div class="cd-keys cdk log_pay backBTN">🠔</div> -->
                                </div>
                                <div class="cd-krow d-flex">
                                    <div class="cd-keys cdk log_pay">4</div>
                                    <div class="cd-keys cdk log_pay">5</div>
                                    <div class="cd-keys cdk log_pay">6</div>
                                </div>
                                <div class="cd-krow-col d-flex max-spread">
                                    <div class="cdkey-col-wrap d-flex">
                                        <div class="cd-krow d-flex">
                                            <div class="cd-keys cdk log_pay">1</div>
                                            <div class="cd-keys cdk log_pay">2</div>
                                            <div class="cd-keys cdk log_pay">3</div>

                                        </div>
                                        <div class="cd-krow d-flex">
                                            <!-- <div class="cd-keys cdk" style="font-size: 24px;">abc</div> -->
                                            <!-- <div class="cd-keys cdk">.</div> -->
                                            <!-- <div class="cd-keys cdk log_pay tabBTN" style="font-size: 24px;">Tab</div> -->
                                            <div class="cd-keys cdk log_pay backBTN">🠔</div>
                                            <div class="cd-keys cdk log_pay">0</div>
                                            <button type="submit" class="bigbtnforcd cdk" id="cLogin" style="border:none;font-size: 27px;max-width:80px;transition:all 500ms;">Enter</button>

                                        </div>

                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end cash Login -->

    <!-- end cash Login -->
    <div id="save-order" class="modal ">

        <!-- Modal content -->
        <div class="modal-content blue">
            <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
            <!-- <span class="close">&times;</span> -->
            <p class="m-text1">Order Description</p>

            <Input class="m-b1 b  inputFile20" placeholder="Enter description" id="order_des" />
            <span class="errors" id="des_err" style="color:red; font-size:14px"></span>
            <div class="actions-row d-flex" style="width:89%">
                <button class="recall-btn mbtn" id="save_order">Save</button><a href="#close-modal" rel="modal:close"><button class="cancel-btn mbtn">Cancel</button></a>
            </div>
        </div>

    </div>
    <div id="walk_in_customer_modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content blue">
            <a href="#close-modal" rel="modal:close" class="walk_in_customer_modal_close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
            <!-- <span class="close">&times;</span> -->
            <p class="m-text1">Enter Mobile Number</p>

            <!-- <input class="m-b1 b use-keyboard-input-num" placeholder="Enter Mobile Number" name="customer_mobile_no" id="customer_mobile_no" onkeyup="this.value = formatPhoneNumber(this.value)" /> -->
            <input class="m-b1 b use-keyboard-input-num phoneInput usemobilehere" placeholder="Enter Mobile Number" type="tel" name="customer_mobile_no" id="customer_mobile_no" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />

            <a href="javascript:;" id="walkinsubmit" class="m-b1 search_mobile_number">
                <div>Search</div>
            </a>
        </div>
    </div>

    <div id="add_customer_modal" class="modal">
        <!-- Modal content -->
        <div class="modal-content blue modal-height">
            <a href="#close-modal" rel="modal:close" class="add_customer_modal_close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>

            <p class="m-text1">Add New Customer</p>

            <label for="fname" class="cusProlbl text-nowrap color-black new-cust-label"> First Name <span style="color:#FF0000;">*</span></label>
            <input class="m-b1 b use-keyboard-input form-control valid99" placeholder="First Name" type="text" name="customer_fname" id="customer_first_name" style="text-align:left!important;font-size:18px;" onkeypress="return onlyAlphabets(event,this);"/>
            <span class="errors" id="cfname_err" style="color:red; font-size:16px;margin-right: 10%;"></span>

            <label for="lname" class="cusProlbl text-nowrap color-black new-cust-label"> Last Name <span style="color:#FF0000;">*</span></label>
            <input class="m-b1 b use-keyboard-input form-control valid99" placeholder="Last Name" type="text" name="customer_lname" id="customer_last_name" style="text-align:left!important;font-size:18px;" onkeypress="return onlyAlphabets(event,this);"/>
            <span class="errors" id="clname_err" style="color:red; font-size:16px;margin-right: 10%;"></span>

            <label for="mobile" class="cusProlbl text-nowrap color-black new-cust-label"> Mobile Number <span style="color:#FF0000;">*</span></label>
            <input class="m-b1 b use-keyboard-input-num phoneInput usemobilehere form-control valid99" placeholder="Mobile Number" type="tel" name="customer_phone" id="customer_mobile" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="text-align:left!important;font-size:18px;" />
            <span class="errors" id="cmobile_err" style="color:red; font-size:16px;margin-right: 10%;"></span>

            <label for="email" class="cusProlbl text-nowrap color-black new-cust-label"> Email Address </label>
            <input type="text" class="m-b1 b use-keyboard-input form-control valid99" name="customer_email" id="customer_email" placeholder="Email Address" onkeyup="ValidateCustomerEmail();" style="text-align:left!important;font-size:18px;"/>
            <span class="errors" id="cemail_err" style="color:red; font-size:16px;margin-right: 10%;"></span>

            <button type="submit" class="m-b1 smbtn" id="pos_customer_signup" style="font-size:25px;margin-top:15px!important;">Submit</button>
        </div>
    </div>

    <div id="promo" class="modal wideModal">

        <!-- Modal content -->
        <div class="modal-content greenm " style="position:relative;max-width: 100%!important;
    width: 55vw;
    margin: 0 auto;height: 400px;top: 20px;">
            <!-- <span class="close">&times;</span> -->
            <a href="#close-modal" id="close_promo_modal" rel="modal:close"><img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
            <p class="m-text1">Enter Coupon Code</p>
            <p class="m-text2">If you have a coupon code enter it to save on
                your order.</p>

            <div class="table-container">
                <table class='coupon-table' style="height: 25vh;">
                    <thead style="position: sticky;top: -4px;z-index: 99999999999999;">
                        <tr class="itemTableOne ">
                            <th  class='bg-black' style="text-align:center;">Coupon</th>
                            <th class='bg-black' style="text-align:center; ">Detail</th>
                            <th  class='bg-black' style="text-align:center; ">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        if (!empty($pos_coupon_list)) {
                            foreach ($pos_coupon_list as $key => $value) {
                        ?>
                                <tr class='coup-row'>
                                    <td  style="font-size: 15px;"><?php print $value->coupon_name; ?></td>
                                    <!-- <td class='coup-cell' style="font-size: 15px;"><?php print $value->coupon_details; ?></td> -->
                                    <td  style="font-size: 15px;"><?php print $value->coupon_details; ?></td>
                                    <td ><button id="<?php print $value->coupon_name; ?>" style="max-width: 50px;max-height: 50px;font-size: .7em;margin: 0 auto;" class="b1 green direct_apply_coupon">Apply</button></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- <input class="m-b1 b" placeholder="Enter Promo Code" /> -->
            <input type="text" name="coupon_code" id="PROMO_code" class="m-b1 b use-keyboard-input" placeholder="Enter Coupon Code" autocomplete="off">
            <!-- <div class="m-b1 greenbm">SUBMIT</div> -->
            <button type="button" style="height: 50px;" class="m-b1 greenbm" id="couponSubmit" style="border: none;">SUBMIT</button>

        </div>

    </div>

    <div id="epa" class="modal">

        <!-- Modal content -->
        <div class="modal-content greenm " style="position:relative;">
            <!-- <span class="close">&times;</span> -->
            <a href="#close-modal" rel="modal:close"><img src="<?php echo base_url(); ?>assets/images/x-square.svg" onclick="easy_numpad_done()" alt="" class='x'></a>
            <!-- <p class="m-text1">Enter Price</p> -->
            <div class="select">
                <select id="misceleneous_name_change">
                    <option value="" data-tax="" data-name="" data-auto_id="">--Recent Items--</option>
                    <?php
                    if (!empty($misceleneous_name)) {
                        foreach ($misceleneous_name as $key => $value) { ?>
                            <option data-tax="<?php echo $value->is_taxable; ?>" data-name="<?php echo $value->product_name; ?>" data-auto_id="<?php echo $value->id; ?>" value="<?php echo $value->product_price; ?>"><?php echo $value->product_name; ?></option>
                    <?php }
                    } ?>
                </select>
                <div class="select_arrow">
                </div>
            </div>
            <Input class="m-b1 b" type="text" id="misceleneous_name" value="Miscellaneous" placeholder="Miscellaneous" autocomplete="off" style="width:96%" />
            <div class="easy-numpad-output-container">
                <span class="secondDollarSign">$</span>
                <p class="easy-numpad-output" id="easy-numpad-output" style='position:relative;color:black;font-size: 2vw;
                    padding-right: 10px;text-align: start;'></p>
            </div>
            <div class="checkBoxTax">
                <label for="taxBoolean"> Taxable?</label>
                <input type="checkbox" class='cboxtaxclass' id="taxBoolean" name="taxable" value="taxable-true">
            </div>
            <!-- <Input id="yourElementId" type="number" readonly="true" onclick="show_easy_numpad(this);" class="m-b1 b" placeholder="Enter Price"/> -->
            <!-- <div class="m-b1 greenbm">SUBMIT</div> -->
            <div class="easy-numpad-container">

                <div class="easy-numpad-number-container">
                    <table>
                        <tbody class="tableoverflow">
                            <tr style='background:transparent;'>
                                <td style='padding:0'><a href="7" onclick="easynum(this)">7</a></td>
                                <td style='padding:0'><a href="8" onclick="easynum(this)">8</a></td>
                                <td style='padding:0'><a href="9" onclick="easynum(this)">9</a></td>
                                <td style='padding:0'><a href="Del" class="del" id="del" onclick="easy_numpad_del()"><svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M26.0097 5.0835H7.75677C7.47818 5.0835 7.2125 5.20067 7.02466 5.40665L0.258186 12.8333C-0.0860621 13.2112 -0.0860621 13.7888 0.258186 14.1671L7.02466 21.5937C7.21245 21.7997 7.47818 21.9168 7.75677 21.9168H26.0097C26.5567 21.9168 26.9999 21.4735 26.9999 20.927V6.07374C27 5.52678 26.5567 5.0835 26.0097 5.0835ZM25.0196 19.9364H8.1941L2.33006 13.5L8.1941 7.06356H25.0195V19.9364H25.0196Z" fill="black" />
                                            <path d="M20.8966 10.089C20.5071 9.70475 19.8806 9.70838 19.4961 10.0976L14.1489 15.5107C13.7647 15.8999 13.7683 16.5267 14.1575 16.9113C14.3506 17.1017 14.6018 17.1968 14.8533 17.1968C15.1084 17.1968 15.3642 17.0984 15.558 16.9027L20.9052 11.4895C21.2894 11.1003 21.2858 10.4735 20.8966 10.089Z" fill="black" />
                                            <path d="M20.9296 15.4689L15.5167 10.1221C15.1276 9.73783 14.5004 9.74179 14.1166 10.1306C13.7321 10.5198 13.7357 11.1466 14.1248 11.5312L19.5377 16.8783C19.7308 17.0688 19.9819 17.1638 20.2334 17.1638C20.4886 17.1638 20.7444 17.0654 20.9378 16.8694C21.3224 16.4802 21.3187 15.8534 20.9296 15.4689Z" fill="black" />
                                        </svg></a></td>
                            </tr>
                            <tr style='background:transparent;'>
                                <td style='padding:0'><a href="4" onclick="easynum(this)">4</a></td>
                                <td style='padding:0'><a href="5" onclick="easynum(this)">5</a></td>
                                <td style='padding:0'><a href="6" onclick="easynum(this)">6</a></td>
                                <td style='padding:0'><a href="Clear" class="clear" id="clear" onclick="easy_numpad_clear()">Clear</a></td>
                            </tr>
                            <tr style='background:transparent;'>
                                <td style='padding:0'><a href="1" onclick="easynum(this)">1</a></td>
                                <td style='padding:0'><a href="2" onclick="easynum(this)">2</a></td>
                                <td style='padding:0'><a href="3" onclick="easynum(this)">3</a></td>
                                <td style='padding:0'><a href="#close-modal" rel="modal:close" class="cancel rbg" id="cancel" onclick="easy_numpad_cancel()">Cancel</a></td>
                            </tr>
                            <tr style='background:transparent;'>
                                <td style='padding:0'><a href="±" onclick="easynum(this)">00</a></td>
                                <td style='padding:0'><a href="0" onclick="easynum(this)">0</a></td>
                                <td style='padding:0'><a href="." onclick="easynum(this)">.</a></td>
                                <td style='padding:0'><a href="javascript:;" class="done gbg custom_price_save" rel="modal:close" id="done">Submit</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>



    <div id="discount-old" class="modal">

        <!-- Modal content -->
        <div class="modal-content radio greenm">
            <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x.svg" alt="" class='x'></a>
            <div class="gcon">
                <p class="m-text1 r">Select Discount Method</p>
                <!-- <p class="m-text2 r">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p> -->
                <p style="width:100%;text-align:left; color:black;   margin-top: 0;
    margin-bottom: 1em;"> Lorem Ipsum dolor</p>
                <div class='yada'>
                    <div class="cBorder">
                        <div class='custom-checkbox'>
                            <div id='mycheckbox' class='custom-tick'>
                                <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 2L7 13L2 8" stroke="#2F343D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <!-- <div class="container">
                    <input type="checkbox" class="ycc" id="checker" for="name1">
                </div> -->
                    <input id="name1" name="name1" class='faster' placeholder="Discount By Percentage" />
                </div>
                <div class='yada'>
                    <div class="cBorder">
                        <div class='custom-checkbox2'>
                            <div id='mycheckbox2' class='custom-tick2'>
                                <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 2L7 13L2 8" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>

                            </div>
                        </div>
                    </div>
                    <input id="name2" name="name2" class='faster' placeholder="Discount By Value" />
                </div>
                <div class='yada'>
                    <div class="cBorder">
                        <div class='custom-checkbox3'>
                            <div id='mycheckbox3' class='custom-tick3'>
                                <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18 2L7 13L2 8" stroke="#2F343D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <input id="name3" name="name3" class='faster' placeholder="Enter Pice By Price Override" />
                </div>
                <div class="m-b1 greenbm" style="align-self: flex-end;width:86% ;margin-top:1em;">SUBMIT</div>
            </div>
        </div>
    </div>


    <div id="discount2" class="modal wideModal">
        <div class="modal-content blue discount-modal  ">
              <p class="m-text1">Discount</p>
                <div class="recall-con w-100 d-flex mtop" style="margin-top: 0em;">
                  <div class="row mb-3 align-items-center">
                    <div class="col-md-8 mb-2" >
                        <button class="by_percentage" style="background: #4caf50;border-color: #4caf50; color: #ffffff;border-radius: 0;height: 42px;width: 183px;outline: none; font-size:18px;" >Discount By Percent</button>
                        <button class="by_amount" style="background: #E4E4E4;border-color: #E4E4E4; color: #000000;border-radius: 0;height: 42px;width: 183px;outline: none; font-size:18px;">Discount By Amount</button>
                    </div>
                    <div class="left-recall">
                        <div class="left-wrap remove-border" style="min-height: 364px;">
                            <div class="percentoff-btns discount_div d-flex" id="percentoff_div" style="width: 200%;">
                                <?php if(!empty($discount_type_percentage)){
                                    foreach ($discount_type_percentage as $key => $value) { ?>
                                            <div class="cm3 discbtn apply_custom_discount" id="<?php echo $value->id; ?>" data-min_amount="<?php echo $value->subtotal_amount; ?>" data-type="<?php echo $value->discount_type; ?>" data-value="<?php echo $value->discount_value; ?>"><?php echo $value->discount_title; ?></div>
                                <?php    }
                                }
                                ?>
                            </div>
                            <div class="percentoff-btns discount_div d-flex" id="amountoff_div" style="width: 200%;display:none;">
                                <?php if(!empty($discount_type_amount)){
                                    foreach ($discount_type_amount as $key => $value) { ?>
                                            <div class="cm3 discbtn apply_custom_discount" id="<?php echo $value->id; ?>" data-min_amount="<?php echo $value->subtotal_amount; ?>"  data-type="<?php echo $value->discount_type; ?>" data-value="<?php echo $value->discount_value; ?>"><?php echo $value->discount_title; ?></div>
                                <?php    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                  </div>

                </div>
            <div class="actions-row d-flex w-100">
                <a href="#close-modal" rel="modal:close"><button class="cancel-btn mbtn">Cancel</button></a>
            </div>
        </div>
    </div>

    <div id="makeref" class="modal rec">

        <!-- Modal content -->
        <div class="modal-content recp">
            <div class="rcon">
                <div class="rcol1">
                    <p class="titR">Ester Howard</p>
                    <p class="hr">Mobile #8506789000 </p>
                    <div class="mtableWrap">
                        <table class='mtable'>
                            <tr>
                                <th>Reciept No.</th>
                                <th>Date & Time</th>
                            </tr>

                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="rcol2">
                    <div class="rc2Text">
                        <p class="titR a1">Customer Receipt</p>
                        <p class="hr a2">Receipt #0000000000</p>
                        <table class='lastTable'>
                            <tr>

                                <th> <input class="big" type="radio" />Quantity/Item</th>
                                <th style="text-align: right;padding-right:7px ;">Total</th>
                            </tr>

                            <tr>
                                <td> <input class="big" type="radio" />00000157
                                </td>
                                <td style="text-align: right;padding-right:7px ">1000$
                                </td>
                            </tr>
                            <tr>
                                <td><input class="big" type="radio" />00000157
                                </td>
                                <td style="text-align: right;padding-right:7px ">1000$
                                </td>
                            </tr>
                            <tr>
                                <td><input class="big" type="radio" />00000157
                                </td>
                                <td style="text-align: right;padding-right:7px ">1000$
                                </td>
                            </tr>
                            <tr>
                                <td><input class="big" type="radio" />00000157
                                </td>
                                <td style="text-align: right;padding-right:7px ">1000$
                                </td>
                            </tr>

                        </table>
                        <div class="total-con blcktext">
                            <div class="p1">
                                <p>Sub</p>
                                <p>$ 18,000.00</p>
                            </div>
                            <div class="p1">
                                <p>Discount</p>
                                <p>$18,000.00

                                </p>
                            </div>

                            <div class="p1">
                                <p>Tax</p>
                                <p>$18000.00</p>
                            </div>
                            <div class="p1">
                                <p>CRV</p>
                                <p>$7,900.00

                                </p>
                            </div>
                            <div class="p1">
                                <p>Total</p>
                                <p>$$3,000.00

                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="rc2Buts">
                        <div class="bc">
                            <div class='idk'>Make Refund</div>
                            <div class='idk2'> Cancel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="pref" class="modal rec">

        <!-- Modal content -->
        <div class="modal-content recp">
            <div class="rcon">
                <div class="rcol1">
                    <input type="text" class="fff " style="width: 96%;
                    height: 3.2222222222vh;
                    margin-top: 0.5em;
                    border-radius: 1px;

                    height: 4vh;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Mobile no">
                    <div class="m-b1" style="     margin: 0 auto;
                    margin-top: 0.5em;
                    width: 100%; ">Search</div>
                    <p class="titR">Ester Howard</p>
                    <p class="hr">Mobile #8506789000 </p>
                    <div class="mtableWrap">
                        <table class='mtable'>
                            <tr>
                                <th>Reciept No.</th>
                                <th>Date & Time</th>
                            </tr>

                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td>4/4/18; 08:53:24
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="navbuts">
                        <div class="nb">
                            <img src="<?php echo base_url(); ?>assets/images/arrow.png" alt="arrow" class="arrow" style="transform: scale(0.7);">
                            <a href="cashier.html" class="link">
                                <p>Previous</p>
                            </a>

                        </div>
                        <div class="nb">

                            <a href="cashier.html" class="link">
                                <p>Next </p>
                            </a>
                            <img src="<?php echo base_url(); ?>assets/images/arrow.png" alt="arrow" class="arrow" style="transform: scaleX(-1) scale(0.7);">

                        </div>
                    </div>
                </div>
                <div class="rcol2">
                    <div class="rc2Text">
                        <p class="titR a1">Customer Receipt
                        <p class="inner">Reciept Date:
                            <!-- &#10;&#13; -->
                        <p style="color:black;position: absolute;
                            right: 1%;
                            top: 7%; font-size: 0.933333333334vw;"> 10th October,2020</p>

                        </p>
                        </p>
                        <p class="hr a2">Receipt #0000000000</p>
                        <table class='lastTable'>
                            <tr>

                                <th> Quantity/Item</th>
                                <th style="text-align: right;padding-right:7px ;">Total</th>
                            </tr>

                            <tr>
                                <td> 00000157
                                </td>
                                <td style="text-align: right;padding-right:7px ">1000$
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td style="text-align: right;padding-right:7px ">1000$
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td style="text-align: right;padding-right:7px ">1000$
                                </td>
                            </tr>
                            <tr>
                                <td>00000157
                                </td>
                                <td style="text-align: right;padding-right:7px ">1000$
                                </td>
                            </tr>

                        </table>
                        <div class="total-con blcktext">
                            <div class="p1">
                                <p>Sub</p>
                                <p>$18000</p>
                            </div>
                            <div class="p1">
                                <p>Discount</p>
                                <p>$18,000.00

                                </p>
                            </div>

                            <div class="p1">
                                <p>Tax</p>
                                <p>$18000</p>
                            </div>
                            <div class="p1">
                                <p>CRV</p>
                                <p>$7,900.00

                                </p>
                            </div>
                            <div class="p1">
                                <p>Total</p>
                                <p>$$3,000

                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="rc2Buts">
                        <div class="bc">
                            <div class='idk'>Print</div>
                            <div class='idk2'> Cancel</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div id="shiftreportmodal" class="modal">

    <div class="modal-content black">
        <p class="m-text1">Clock in Clock Out</p>
        <form action="" class="shift-login clockform1" method="post" style="display: flex;width: 100%;height: 100%;flex-direction: column;align-items: center;justify-content: center;">
            <input type="tel" class="m-b1 b inputFile9" placeholder="Enter Employee Id" name="user_id" id="user_id1" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" />
            <span class="errors" id="sid_err" style="color:red; font-size:14px"></span>
            <input type="password" class="m-b1 b inputFile9" placeholder="Enter Employee Password" name="password" id="password1" />
            <span class="errors" id="spass_err" style="color:red; font-size:14px"></span>
            <button type="submit" class="m-b1 greenbm" id="btnShiftReport" style="border:none">SUBMIT</button>
        </form>
        <form action="" class="clockform2" style="display: none;width: 100%;height: 100%;flex-direction: column;align-items: center;justify-content: center;">
            <div class="select">
                <select id="misceleneous_name_change2" name="shift_type">
                    <option value="Morning">Morning</option>
                    <option value="Evening">Evening</option>
                    <option value="Night">Night</option>
                </select>
                <div class="select_arrow">
                </div>
                <span class="errors" id="stype_err" style="color:red; font-size:14px"></span>
            </div>
            <input type="text" class="m-b1 b inputDate" style="width:97%;" placeholder="mm-dd-yyyy" name="shift_date" id="shift_date" />
            <span class="errors" id="sdate_err" style="color:red; font-size:14px"></span>
            <button type="submit" class="m-b1 greenbm" id="submitShift" style="border: none;width:100%">SUBMIT</button>
        </form>

    </div>

</div>

<div id="age-verify-modal" class="modal">
    <!-- Modal content -->
    <div class="modal-content blue jc-bet">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <!-- <span class="close">&times;</span> -->
        <p class="m-text1  fsxx">Age Verification</p>
        <input type="date" id="age_verify_date" name="age_verify_date" max="<?php print date("Y-m-d"); ?>">
        <input type="hidden" id="is_age_verify_custom_product" name="is_age_verify_custom_product" value="0">
        <input type="hidden" id="no_of_misceleneous_item" name="no_of_misceleneous_item" value="0">
        <span class="errors" id="des_err" style="color:red; font-size:14px"></span>
        <div class="actions-row ai-center d-flex w-100">
            <a href="#close-modal" rel="modal:close" id="age-verify-modal-close"><button class="cancel-btn mbtn">Cancel</button></a>
            <button class="mbtn green" id="age_verify_ok_button" style="background: #16c783; width: 100px;">Over 21</button>
            <button class="recall-btn mbtn" id="age_verify_button">Verify</button>
        </div>
    </div>
</div>

<!-- ST - Modal for POS Cashback -->
<div id="pos_cashback_modal" class="modal">
    <div class="modal-content autoheight blue black">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x close_cashback'></a>
        <p class="m-text1 custPTitle">Cashback</p>

        <label class="text-nowrap color-black cusProlbl" style="margin-bottom: 10px;
    font-size: 22px;"><b>Order Amount :</b> $<label id="cashback_order_amount">0.00</label></label>


        <label class="cusProlbl text-nowrap color-black" style="margin-bottom: 10px;
    font-size: 22px;"><b>Cashback Fee :</b> $<?php echo (!empty($get_websettings->cashback_fee)) ? $get_websettings->cashback_fee : '2.75' ?></label>
        <input type="hidden" name="pop_cashback_fee" id="pop_cashback_fee" value="<?php echo (!empty($get_websettings->cashback_fee)) ? $get_websettings->cashback_fee : '2.75' ?>">

        <label class="cusProlbl text-nowrap color-black" style="margin-bottom: 10px;
    font-size: 22px;"><b>Cashback Amount :</b></label>
        <div style="position:relative;width:100%">
            <span class="position-absolute" style="position:absolute;top: 50%;transform: translateY(-40%);margin-left: 0.8em;color:black;">$</span>
            <input style="height: 3.1vh;font-size: 2vw;" class="inputforcusP m-b1 b inputFile52 use-keyboard-input-num usefloathere" id="cashback_amount" value="12" type="tel" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="  this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" autocomplete="off">
        </div>
        <span class="errors" id="cashback_amount_err" style="color:red; font-size:14px"></span>

        <div class="m-b1 w-100 smbtn" id="pos_cashback_insert" style="font-size: 2vw;">Submit</div>

    </div>
</div>
<!-- EN - Modal for POS Cashback -->

<!-- ST - Modal for Redeem Points -->
<div id="pos_redeem_points_modal" class="modal">
    <div class="modal-content autoheight blue black">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <p class="m-text1 custPTitle">Redeem Points</p>

        <label class="text-nowrap color-black cusProlbl" style="margin-bottom: 10px;font-size: 22px;"><b>Total Points :</b> <label id="total_points_append">0</label></label>
        <input type="hidden" name="total_points_input" id="total_points_input">

        <label class="text-nowrap color-black cusProlbl" style="margin-bottom: 10px;font-size: 22px;"><b>Account Balance :</b> $<label id="account_balance_append">0.00</label></label>

        <label class="cusProlbl text-nowrap color-black" style="margin-bottom: 10px;font-size: 22px;"><b>Redeem Amount :</b></label>
        <div style="position:relative;width:100%">
            <span class="position-absolute" style="position:absolute;top: 50%;transform: translateY(-40%);margin-left: 0.8em;color:black;">$</span>
            <input style="height: 3.1vh;font-size: 2vw;" class="inputforcusP m-b1 b inputFile52 use-keyboard-input-num usefloathere" id="redeem_points_input" value="" type="tel" oninput="  this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" autocomplete="off" >
        </div>
        <span class="errors" id="cashback_amount_err" style="color:red; font-size:14px"></span>

        <div class="m-b1 w-100 smbtn" id="submit_redeem_points" style="font-size: 2vw; cursor:pointer;">Submit</div>
        <br>
        <div class="m-b1 w-100 smbtn" id="all_redeem_points" style="font-size: 2vw;cursor:pointer;">Redeem All</div>

    </div>
</div>
<!-- EN - Modal for Redeem Points -->

<!-- ST - Modal for Card Transaction -->
<div id="card_transaction_modal" class="modal">
    <div class="modal-content autoheight blue black">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <br>
        <div class="m-b1 w-100 smbtn" id="card_transaction" style="font-size: 2vw; padding: 5px;">Credit/Debit</div>
        <br>
        <div class="m-b1 w-100 smbtn" id="card_transaction_ebt_payment" style="font-size: 2vw; padding: 5px;">EBT</div>

    </div>
</div>
<!-- EN - Modal for Card Transaction -->

<!-- ST - Modal for Card Transaction EBT Payment -->
<div id="card_transaction_ebt_payment_modal" class="modal">
    <div class="modal-content autoheight blue black">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <br>
        <div class="m-b1 w-100 smbtn" id="card_transaction_ebt" style="font-size: 2vw; padding: 5px;">Payment Accepted</div>
        <br>
        <div class="m-b1 w-100 smbtn" id="card_transaction_ebt_declined" style="font-size: 2vw; padding: 5px;">Payment Declined</div>

    </div>
</div>
<!-- EN - Modal for Card Transaction EBT Payment -->

<div id="payoutNoteModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content black">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <!-- <span class="close">&times;</span> -->
        <p class="m-text1">Payout Note</p>
        <!-- <input type="hidden" id="payout_id" value=""> -->
        <input type="hidden" id="payout_type" value="">

        <input type="hidden" id="payout_category" value="">
        <input type="hidden" id="payout_category_name123" value="">
        <input type="hidden" id="emp_notes123" value="">
        <input type="hidden" id="employee_name123" value="">
        <input type="hidden" id="exist_supplier_id123" value="">
        <input type="hidden" id="payment_type123" value="">
        <input type="hidden" id="payout_amount123" value="">
        <input type="hidden" id="scratcher_id123" value="">
        <input type="hidden" id="vendor_name123" value="">
        <input type="hidden" id="vendor_notes123" value="">
        <input type="hidden" id="check_no123" value="">

        <input type="hidden" id="select_scratcher123" value="">
        <input type="hidden" id="lotto_name123" value="">


        <input style="height: 3.1vh;font-size: 2vw;" class="m-b1 b use-keyboard-input" name="payout_note" id="payout_note" autocomplete="off" />
        <span class="errors" id="pnote_err" style="color:red; font-size:14px"></span>
        <div class="m-b1 smbtn" id="payoutNote" style="font-size: 2vw;">Submit</div>
    </div>
</div>

<div id="cashBackNoteModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content black">
        <a href="#close-modal" rel="modal:close"> <img src="<?php echo base_url(); ?>assets/images/x-square.svg" alt="" class='x'></a>
        <!-- <span class="close">&times;</span> -->
        <p class="m-text1">Cash Back Note</p>

        <input type="hidden" id="append_cashback_amount123" value="">
        <input type="hidden" id="append_cashback_fee123" value="">
        <input type="hidden" id="cashierNm" value="">
        <input type="hidden" id="userIDD" value="">
        <input type="hidden" id="cshDROPAMT" value="">
        <input type="hidden" id="payout_type" value="">

        <input style="height: 3.1vh;font-size: 2vw;" class="m-b1 b use-keyboard-input" name="cash_back_note" id="cash_back_note" autocomplete="off" />
        <span class="errors" id="cashnote_err" style="color:red; font-size:14px"></span>
        <div class="m-b1 smbtn" id="cashBackNote" style="font-size: 2vw;">Submit</div>
    </div>
</div>

<script type="text/javascript">

    let _outputID = "";
    let _minValue = null;
    let _maxValue = null;
    let _isInRange = true;
    let isGreenPressed = false;
    let ff = 0;
    $('.cm').on('click', function() {
        $('.cm').removeClass('selected');
        $(this).addClass('selected');
    })

    $('#opencalc_btn').on('click', function(e) {

        e.preventDefault();
        ff = 0;

        var is_transaction_completed = $("#is_transaction_completed").val();

        if(is_transaction_completed == 1)
            return false;

        var return_bal = $("#return_balance_html").html(0);
        var optxt = $("#optxt,.nam span").html($('#main_cart_grand_total').val());

        $('#dollarSign').css('visibility', 'visible');

        var exist_product_id = $("#exist_product_id").val();

        if (exist_product_id == '') {

            swal({
                icon: "warning",
                title: "Oops!",
                text: 'There are no products in your Cart!',
                icon: "warning",
                buttons: false,
                dangerMode: false,
                timer: 2000
            });

            return false;
        }
        $("#return_balance_html").html('0');
        $("#return_balance_html").addClass('red');

    });




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

    $('.x').on('click', function() {
        //alert('test');
        document.getElementById('optxt').innerHTML = '';
        document.getElementById('easy-numpad-output').innerHTML = '';

    })

    function deltxt() {
        let o = document.getElementById('optxt').innerHTML;

        if (isGreenPressed == true) {
            document.getElementById('optxt').innerHTML = '';
            isGreenPressed = false;

        } else {

            //console.log('yeah', o)
            let newO = o.slice(0, -1);
            if (newO.length < 1) {
                $('#dollarSign').css('visibility', 'hidden')
                document.getElementById('optxt').innerHTML = newO;
                // document.getElementById('optxt').innerHTML = ''

            } else {
                //console.log('object', newO);
                document.getElementById('optxt').innerHTML = newO;
            }

        }

    }


    let n = document.getElementsByClassName('num');
    ////console.log(n[0].innerHTML);

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
        //console.log("cart_grand_total:" + cart_grand_total);
        var currentnum = this.innerHTML;


        let r = this.innerHTML.replace("$", "");
        //r = parseFloat(r.trim());
        r = r.trim();

        //console.log(r);
        let k = $('.num')[0].innerHTML;

        let c = this.id
        if (k == '5,0000') {
            $('.num')[0].innerHTML = ''
        }
        // $('.num')[0].append(r);

        // ST - Calculate Return Balance
        if ($(this).hasClass("gbg")) {

            isGreenPressed = true
            r = parseFloat(r).toFixed(2)
            //console.log('in green', r, isGreenPressed)

        }
        if (ff == 0) {
            $('.num')[0].innerHTML = '';
            ff = 1;
        }

        if ($(this).hasClass("decimalkey")) {

            let hasDeci = k.includes('.')
            //console.log('deci der or no ', hasDeci);
            if (hasDeci) {
                r = ''
            }
        }

        if (c != 'del2') {

            if (isGreenPressed == true) {
                //console.log($(this).hasClass("gbg"), "****************")

                if ($(this).hasClass("gbg") == false) {
                    //console.log('num is pressed and g is true');
                    deltxt()
                }
            }

            $('.num')[0].append(r);
        }

        if ($('.num')[0].innerHTML.length > 0 && cart_grand_total.length > 0) {
            //console.log("num: " + $('.num')[0].innerHTML.length);

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

        } else {
            if (currentnum.indexOf('$') == -1) {
                $('.num')[0].innerHTML = get_float_value($('.num')[0].innerHTML);
            }

            var return_balance_html = parseFloat($('.num')[0].innerHTML)
            $("#return_balance_html").html(return_balance_html.toFixed(2));

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
        // if (easy_numpad_output_val.slice(-2) !== "0." && easy_numpad_output_val.slice(-3) !== "-0.") {
            var easy_numpad_output_val_deleted = easy_numpad_output_val.slice(0, -1);
            document.getElementById("easy-numpad-output").innerText = easy_numpad_output_val_deleted;
            easy_numpad_check_range(Number(easy_numpad_output_val_deleted));
        // }
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
            //console.log("Range limit");

            if (value <= _maxValue && value >= _minValue) {
                outputElement.style.color = "black";
                _isInRange = true;
            } else {
                outputElement.style.color = "red";
                _isInRange = false;
            }
        } else if (_maxValue != null) {
            //console.log("Only upper limit");

            if (value <= _maxValue) {
                outputElement.style.color = "black";
                _isInRange = true;
            } else {
                outputElement.style.color = "red";
                _isInRange = false;
            }
        } else if (_minValue != null) {
            //console.log("Only lower limit");

            if (value >= _minValue) {
                outputElement.style.color = "black";
                _isInRange = true;
            } else {
                outputElement.style.color = "red";
                _isInRange = false;
            }
        } else {
            //console.log("No range limit");
            outputElement.style.color = "black";
            _isInRange = true;
        }
    }
</script>
<script type="text/javascript">
    // $('#refund-second').modal({
    //  closeExisting:false,

    // });

    $('#product_lookup_description').keypress(function(e) {
        if (e.which == 13) { //Enter key pressed
            $('#product_lookup').click(); //Trigger search button click event
        }
    });
    $(document).ready(function() {
        $("#cdinput").keypress('keyup', function(event) {
            if (event.keyCode == 13) {
                $('#cash_Drop').trigger('click');
            }
        });
        $("#cpwd").keypress('keyup', function(event) {
            let we = $("#cpwd").val();
            //console.log('we is ', we)
            if (event.keyCode == 13) {
                $('#cash_Drop').trigger('click');
            }
        });
        $("#cpwd").on('input', function() {
            //console.log($(this).val(), 'cpwd')
            if ($(this).val().length == 4) {
                $('#cLogin').trigger('click');

            }
        });
        $("#cpwd").change(function(event) {
            let we = $("#cpwd").val();
            // //console.log('we is ',we)
            // //console.log($(this).value());
            $("#cpwd").focus();

        });

        $('#tab4-tab').on('click', function() {
            $('#payout_date').val('');
            $('#payout_confirm').hide();
        })
        $('#tab2-tab').on('click', function() {
            $('#payout_emp,#notes2,#Payout_amount').val('');
            $('#payment_type').val('Cash');
            $('.checkNo, #check_no,#mon_err').hide();
            $('#notes2').show();

            $('#payout_confirm').show();
        });
        $('#tab1-tab').on('click', function() {
            $('#payout_vendor,#category1,#more_info,#catgoryName1,#notes1,#Payout_amount,#check_no,#payout_emp,#notes2').val('');
            $('#payment_type').val('Cash');
            $('.checkNo, #check_no, #more_info, #catgoryName1,#mon_err').hide();
            $('#notes1').show();

            $('#payout_confirm').show();
        });

        $('#tab3-tab').on('click', function() {
            $('#scratcher_id,#Payout_amount').val('');
            $('#payment_type').val('Cash');
            $('.checkNo, #check_no,#mon_err').hide();

            $('#payout_confirm').show();
        });
        $('#material-tabs').each(function() {

            var $active, $content, $links = $(this).find('a');

            $active = $($links[0]);
            $active.addClass('active');

            $content = $($active[0].hash);

            $links.not($active).each(function() {
                $(this.hash).hide();
            });

            $(this).on('click', 'a', function(e) {

                $active.removeClass('active');
                $content.hide();

                $active = $(this);
                $content = $(this.hash);

                $active.addClass('active');
                $content.show();

                e.preventDefault();
            });

            $('.emp').on('click', function() {
                $('#hidinrecent').show();
                //  alert(2)
            });
            $('.ven').on('click', function() {
                $('#hidinrecent').show();
                //alert(3)
            });
            $('.prec').on('click', function() {
                $('#hidinrecent').hide();

                //alert(4)
            });

            $('.scr').on('click', function() {
                $('#hidinrecent').show();
                $('.lotto_div').hide();
                $('#select_scratcher').val('Scratcher');
                $('.scratcher_div').show();
                //alert(4)
            });
        });
    });


    $('#select_scratcher').on('change', function(){
      if($(this).val() == 'Lotto'){
        $('.lotto_div').show();
        $('.scratcher_div').hide();
      }else{
        $('.lotto_div').hide();
        $('.scratcher_div').show();
      }

    });


    $(document).ready(function() {
        //    $('.master-check').on('click',function() {
        //     $('.refundCheck').trigger('click');
        //    }
        // );


        $('.refundCheck').attr("checked", false);
        $('.master-check.refundCheck2').click(function() {
            var c = $(this).attr("class");
            //console.log(c, '123');
            if ($('.master-check.refundCheck2').is(":checked")) {
                $("input.refundCheck").attr("checked", true);
            } else {

                $(".refundCheck").attr("checked", false);
            }
        });

    });
    $('#couponSubmit').on('click', function() {


        var exist_product_id = $("#exist_product_id").val();

        if (exist_product_id == '') {

            swal({
                icon: "warning",
                title: "Oops!",
                text: 'There are no products in your Cart!',
                icon: "warning",
                buttons: false,
                dangerMode: false,
                timer: 2000
            });

            return false;
        }

        var coupon_code = $('#PROMO_code').val();
        var exist_product_id = $('#exist_product_id').val();
        var cart_grand_total = $('#main_cart_grand_total').val();
        var exist_coupon = $('#exist_coupon').val();
        var qty = [];
        $("input[name='product_qty[]']").each(function(e) {
            qty.push($(this).val());
        });


        var final_grand_total = parseFloat(cart_grand_total) + parseFloat($('#coupon_discount_total').val());

        cart_grand_total = final_grand_total;

        //check existing coupon


        var is_exist = 0;
        var exist_coupon_ar = exist_coupon.split(',');
        $.grep(exist_coupon_ar, function(value) {
            if (value == coupon_code)
                is_exist = 1;

        });

        if (is_exist == 1) {

            swal({
                icon: "warning",
                title: "Oops!",
                text: 'This coupon is applied!',
                icon: "warning",
                buttons: false,
                dangerMode: false,
                timer: 2000
            });

            $('#PROMO_code').val('');
            $('#close_promo_modal').trigger('click');
            $('.jquery-modal').remove();

        } else {

            $.ajax({
                type: "POST",
                url: '<?= base_url("cashier/Cashier/apply_coupon_new") ?>',
                data: {
                    coupon_code: coupon_code,
                    exist_product_id: exist_product_id,
                    cart_grand_total: cart_grand_total,
                    exist_coupon: exist_coupon,
                    qty_txt: qty.join(',')

                },
                dataType: 'json',
                beforeSend: function(){
                    $("#overlay,.loader").show();
                },
                success: function(data) {
                    $("#overlay,.loader").hide();
                    //console.log(data);
                    var exist_coupon = $('#exist_coupon').val();
                    //exist_coupon


                    if (data.status == 0) {
                        // $('.coupon_error span').html(data.message);
                        // $('.coupon_error').show();
                        // setTimeout(function() {
                        //     $('.coupon_error').hide();
                        // }, 5000);

                        event_flag = 1;
                        $('#promo').modal('hide');


                        //$('#promo').hide();

                        swal({
                            icon: "warning",
                            title: "Oops!",
                            text: data.message,
                            icon: "warning",
                            buttons: false,
                            dangerMode: false,
                            timer: 2000
                        });


                    } else {

                        var exist_coupon_array = [];
                        var discount = 0;

                        $.each(data.coupon_amount, function(key, value) {
                            discount = parseFloat(discount) + parseFloat(value.amount);
                            exist_coupon_array.push(key);
                        })

                        custom_discount =  parseFloat($('#custom_discount_total').val());
                        coupon_discount = parseFloat(discount);

                        discount = discount.toFixed(2);

                        if (discount == 0.00 && custom_discount == 0.00) {
                            $('#discount_div').hide();
                        } else {
                            $('#discount_div').show();
                        }


                        $('#coupon_discount_total').val(discount);

                        final_discount = custom_discount + coupon_discount;

                        $('#coupon_discount').html(final_discount.toFixed(2));


                        $('#exist_coupon').val(exist_coupon_array.join(","));
                        $('#applied_coupon').append('<span class="remove_coupon" id="' + coupon_code + '">' + coupon_code + ' <a href="javascript:;">X</a></span>');

                        var final_amt = data.grand_total;

                        $("#grand_total").text(parseFloat(final_amt).toFixed(2));
                        $("#cart_grand_total").val(parseFloat(final_amt).toFixed(2));
                        $("#main_cart_grand_total").val(parseFloat(final_amt).toFixed(2));

                    }


                    $('#PROMO_code').val('');
                    $('#close_promo_modal').trigger('click');
                    $('.jquery-modal').remove();
                },
            });

        }
    });

    $(document).on('click', '.remove_coupon', function() {

        var event_flag = 0;
        var this_obj = $(this);
        var coupon_code = $(this).attr('id');
        var exist_product_id = $('#exist_product_id').val();
        var cart_grand_total = $('#main_cart_grand_total').val();
        var exist_coupon = $('#exist_coupon').val();

        var final_grand_total = parseFloat(cart_grand_total) + parseFloat($('#coupon_discount_total').val());

        cart_grand_total = final_grand_total;

        //alert(cart_grand_total);

        var exist_coupon_ar = exist_coupon.split(',');
        exist_coupon_ar = $.grep(exist_coupon_ar, function(value) {
            return value != coupon_code;
        });

        var qty = [];

        exist_coupon = exist_coupon_ar.join(',');

        $("input[name='product_qty[]']").each(function(e) {
            qty.push($(this).val());
        });


        $.ajax({
            type: "post",
            async: true,
            dataType: "json",
            url: '<?php echo base_url("cashier/Cashier/remove_coupon_new"); ?>',
            data: {

                exist_product_id: exist_product_id,
                exist_coupon: exist_coupon,
                cart_grand_total: cart_grand_total,
                qty_txt: qty.join(',')

            },
            success: function(data) {

                if (data.status == 2) {


                    var exist_coupon_array = [];
                    var discount = 0;

                    $.each(data.coupon_amount, function(key, value) {
                        discount = parseFloat(discount) + parseFloat(value.amount);
                        exist_coupon_array.push(key);
                    })


                    custom_discount =  parseFloat($('#custom_discount_total').val());
                    coupon_discount = parseFloat(discount);

                    discount = discount.toFixed(2);

                    if (discount == 0.00 && custom_discount == 0.00) {
                        $('#discount_div').hide();
                    } else {
                        $('#discount_div').show();
                    }

                    $('#coupon_discount_total').val(discount);

                    final_discount = custom_discount + coupon_discount;
                    $('#coupon_discount').html(final_discount.toFixed(2));

                    $('#exist_coupon').val(exist_coupon_array.join(","));

                    calculatePOSTotal();
                    // var final_amt = data.grand_total;

                    // $("#grand_total").text(parseFloat(final_amt).toFixed(2));

                    // $.each(exist_coupon_array, function(i, val) {


                    // });

                    $('#' + coupon_code).fadeOut(300, function() {
                        $(this).remove();
                    });

                    /////


                } else {

                    var exist_coupon_array = [];
                    var discount = 0;

                    $.each(data.coupon_amount, function(key, value) {
                        discount = parseFloat(discount) + parseFloat(value.amount);
                        exist_coupon_array.push(key);
                    })


                    custom_discount =  parseFloat($('#custom_discount_total').val());
                    coupon_discount = parseFloat(discount);

                    discount = discount.toFixed(2);

                    if (discount == 0.00 && custom_discount == 0.00) {
                        $('#discount_div').hide();
                    } else {
                        $('#discount_div').show();
                    }

                    $('#coupon_discount_total').val(discount);

                    final_discount = custom_discount + coupon_discount;
                    $('#coupon_discount').html(final_discount.toFixed(2));

                    $('#exist_coupon').val(exist_coupon_array.join(","));


                    $.each(exist_coupon_array, function(i, val) {

                        //$('#applied_coupon').append('<span class="apply_coupon" id="'+coupon_code+'">'+coupon_code+' <a href="javascript:;">X</a></span>');

                    });


                    var final_amt = data.grand_total;

                    $("#grand_total").text(parseFloat(final_amt).toFixed(2));
                    $("#cart_grand_total").val(parseFloat(final_amt).toFixed(2));
                    $('#' + coupon_code).fadeOut(300, function() {
                        $(this).remove();
                    });

                }
                $('#PROMO_code').val('');
                // $('#promo').modal('toggle');
                // //$('#close_promo_modal').trigger('click');
                // $('#promo').modal.close();
            },
            error: function() {
                Swal({
                    type: 'warning',
                    title: '<?php echo display('request_failed') ?>'
                })
            }
        });
    });



    // ST - auto apply promotion

    function auto_apply_promotion(){

        var event_flag = 0;
        var this_obj = $(this);
        var coupon_code = $(this).attr('id');
        var exist_product_id = $('#exist_product_id').val();
        var cart_grand_total = $('#main_cart_grand_total').val();
        var exist_coupon = $('#exist_coupon').val();

        var final_grand_total = parseFloat(cart_grand_total) + parseFloat($('#coupon_discount_total').val());

        cart_grand_total = final_grand_total;

        var qty = [];

        $("input[name='product_qty[]']").each(function(e) {
            qty.push($(this).val());
        });


        $.ajax({
            type: "post",
            async: true,
            dataType: "json",
            url: '<?php echo base_url("cashier/Cashier/autoapply_promotion"); ?>',
            data: {

                exist_product_id: exist_product_id,
                cart_grand_total: cart_grand_total,
                qty_txt: qty.join(','),

            },
            success: function(data) {

                if (data.status == 2) {


                    var exist_coupon_array = [];
                    var discount = 0;

                    $.each(data.coupon_amount, function(key, value) {
                        discount = parseFloat(discount) + parseFloat(value.amount);
                        exist_coupon_array.push(key);
                    })


                    custom_discount =  parseFloat($('#custom_discount_total').val());
                    coupon_discount = parseFloat(discount);

                    discount = discount.toFixed(2);

                    if (discount == 0.00 && custom_discount == 0.00) {
                        $('#discount_div').hide();
                    } else {
                        $('#discount_div').show();
                    }

                    $('#coupon_discount_total').val(discount);

                    final_discount = custom_discount + coupon_discount;
                    $('#coupon_discount').html(final_discount.toFixed(2));

                    $('#exist_coupon').val(exist_coupon_array.join(","));

                    //calculatePOSTotal();
                    // var final_amt = data.grand_total;

                    // $("#grand_total").text(parseFloat(final_amt).toFixed(2));

                    // $.each(exist_coupon_array, function(i, val) {


                    // });

                    $('#' + coupon_code).fadeOut(300, function() {
                        $(this).remove();
                    });

                    /////

                } else {

                    var exist_coupon_array = [];
                    var discount = 0;

                    $.each(data.coupon_amount, function(key, value) {
                        discount = parseFloat(discount) + parseFloat(value.amount);
                        exist_coupon_array.push(key);
                    })


                    custom_discount =  parseFloat($('#custom_discount_total').val());
                    coupon_discount = parseFloat(discount);

                    discount = discount.toFixed(2);

                    if (discount == 0.00 && custom_discount == 0.00) {
                        $('#discount_div').hide();
                    } else {
                        $('#discount_div').show();
                    }

                    $('#coupon_discount_total').val(discount);

                    final_discount = custom_discount + coupon_discount;
                    $('#coupon_discount').html(final_discount.toFixed(2));

                    $('#exist_coupon').val(exist_coupon_array.join(","));

                    var final_amt = data.grand_total;

                    // $("#grand_total").text(parseFloat(final_amt).toFixed(2));
                    // $("#cart_grand_total").val(parseFloat(final_amt).toFixed(2));
                    $('#' + coupon_code).fadeOut(300, function() {
                        $(this).remove();
                    });

                }
                $('#PROMO_code').val('');
                // $('#promo').modal('toggle');
                // //$('#close_promo_modal').trigger('click');
                // $('#promo').modal.close();
                calculatePOSTotal();
            },
            error: function() {
                Swal({
                    type: 'warning',
                    title: '<?php echo display('request_failed') ?>'
                })
            }
        });
    };
    // EN - auto apply promotion


    function Calculate_coupon() {

        var event_flag = 0;
        var this_obj = $(this);
        //var coupon_code = $(this).attr('id');
        var exist_product_id = $('#exist_product_id').val();
        var cart_grand_total = $('#main_cart_grand_total').val();
        var exist_coupon = $('#exist_coupon').val();


        var exist_coupon_ar = exist_coupon.split(',');
        // exist_coupon_ar = $.grep(exist_coupon_ar, function(value) {
        //           return value != coupon_code;
        //         });
        exist_coupon = exist_coupon_ar.join(',');

        var qty = [];
        $("input[name='product_qty[]']").each(function(e) {
            qty.push($(this).val());
        });

        if (exist_coupon != '') {
            $.ajax({
                type: "post",
                async: true,
                dataType: "json",
                url: '<?php echo base_url("cashier/Cashier/remove_coupon_new"); ?>',
                data: {

                    exist_product_id: exist_product_id,
                    exist_coupon: exist_coupon,
                    cart_grand_total: cart_grand_total,
                    qty_txt: qty.join(',')

                },
                success: function(data) {

                    if (data.status == 2) {


                        var exist_coupon_array = [];
                        var discount = 0;

                        $.each(data.coupon_amount, function(key, value) {
                            discount = parseFloat(discount) + parseFloat(value.amount);
                            exist_coupon_array.push(key);
                        })

                        discount = discount.toFixed(2);

                        if (discount == 0.00) {
                            $('#discount_div').hide();
                        } else {
                            $('#discount_div').show();
                        }

                        $('#coupon_discount').html(discount);
                        $('#coupon_discount_total').val(discount);
                        $('#exist_coupon').val(exist_coupon_array.join(","));

                        var final_amt = data.grand_total;

                        $("#grand_total").text(parseFloat(final_amt).toFixed(2));
                        $("#cart_grand_total").val(parseFloat(final_amt).toFixed(2));

                        $.each(exist_coupon_array, function(i, val) {


                        });

                        //$('#'+coupon_code).fadeOut(300, function() { $(this).remove(); });

                        /////


                    } else {

                        var exist_coupon_array = [];
                        var discount = 0;

                        $.each(data.coupon_amount, function(key, value) {
                            discount = parseFloat(discount) + parseFloat(value.amount);
                            exist_coupon_array.push(key);
                        })

                        discount = discount.toFixed(2);

                        if (discount == 0.00) {
                            $('#discount_div').hide();
                        } else {
                            $('#discount_div').show();
                        }

                        $('#coupon_discount').html(discount);
                        $('#coupon_discount_total').val(discount);
                        $('#exist_coupon').val(exist_coupon_array.join(","));


                        $.each(exist_coupon_array, function(i, val) {

                            //$('#applied_coupon').append('<span class="apply_coupon" id="'+coupon_code+'">'+coupon_code+' <a href="javascript:;">X</a></span>');

                        });


                        var final_amt = data.grand_total;

                        $("#grand_total").text(parseFloat(final_amt).toFixed(2));
                        $("#cart_grand_total").val(parseFloat(final_amt).toFixed(2));
                        //$('#'+coupon_code).fadeOut(300, function() { $(this).remove(); });

                    }
                    $('#PROMO_code').val('');
                    // $('#promo').modal('toggle');
                    // //$('#close_promo_modal').trigger('click');
                    // $('#promo').modal.close();
                },
                error: function() {
                    Swal({
                        type: 'warning',
                        title: '<?php echo display('request_failed') ?>'
                    })
                }
            });
        }
    };

    jQuery(document).on("click", ".direct_apply_coupon", function() {
        var coupon_nm = $(this).attr('id');
        $('#PROMO_code').val(coupon_nm);
        $('#couponSubmit').click();

    });
</script>
<script type="text/javascript">
    $('#btnShiftReport').click(function() {

        if ($('#user_id1').val() == '') {
            $("#sid_err").html("Please enter your Employee Id").show();
            return false;
        }
        if ($('#password1').val() == '') {
            $("#spass_err").html("Please enter your Employee Password").show();
            return false;
        }


        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?= base_url("cashier/shift_login") ?>',
            data: $('.shift-login').serialize(),
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                $('.shift-login')[0].reset();
                // $('.clock-in-out').modal('hide');
                if (data == 'password_fail') {
                    swal({
                        title: "Oops!",
                        text: "Password does not match!",
                        icon: "error",
                        buttons: false,
                    });
                    $('.clock-in-out').modal('hide');
                }
                if (data == 'user_not_exist') {
                    swal({
                        title: "Oops!",
                        text: "User does not exists!",
                        icon: "error",
                        buttons: false,
                    });
                    $('.clock-in-out').modal('hide');
                }
                if (data == 'password_fail') {
                    swal({
                        title: "Oops!",
                        text: "Password does not match!",
                        icon: "error",
                        buttons: false,
                    });
                    $('.clock-in-out').modal('hide');
                }

                if (data.shiftdata.shiftLogin == true) {
                    $('.clockform2').css('display', 'flex');
                    $('.clockform1').css('display', 'none');
                }

            },

        });
        return false;
    });


    $('#submitShift').click(function() {

        if ($('#shift').val() == '--Select Shift--') {
            $("#stype_err").html("Please Select Shift").show();
            return false;
        }
        if ($('#shift_date').val() == '') {
            $("#sdate_err").html("Please enter Shift Date").show();
            return false;
        }

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?= base_url("cashier/shift") ?>',
            data: $('.clockform2').serialize(),
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                $('.clockform2')[0].reset();
                location.reload();
            },

        });
        return false;
    });
    /*** Rajeswari Updated on 11-feb for Save Order  start code Here*******/
    function openModal() {
      var transaction = $("#is_transaction_completed").val();
        var product_id = $('#exist_product_id').val();
        if (product_id == '') {
            swal({
                title: "Oops!",
                text: "Please add atleast one product!",
                icon: "error",
                buttons: true,
                //timer :2000
                buttons: false,
            });
            setTimeout(function() {
                location.reload();
            }, 1300);
        }else if(transaction == 1){
            swal({
                title: "Oops!",
                text: "Transaction has been already completed!",
                icon: "error",
                buttons: true,
                timer :2000,
                buttons: false,
            });
        } else {
            // $('#save-order').modal('show');
            // $('#save_order').click(function() {
            $('#read_barcode_POS').blur();
            $('#description').focus();
            var order_des = 'Test Description'; //$('#order_des').val();

            // if (order_des == '') {
            //    $("#des_err").html("Please enter order Description").show();
            //    return false;
            // }

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url("cashier/save_order") ?>',
                data: $('#frmItemCart').serialize() + '&order_des=' + order_des,
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $('#frmItemCart')[0].reset();
                    if (data == 'success') {
                        swal({
                            title: "Success!",
                            text: "Order saved successfully!",
                            icon: "success",
                            buttons: false,
                        });

                        setTimeout(function() {
                            location.reload();
                        }, 2900);
                    }
                },

            });
            return true;

            // });
        }
    }
    /*** Rajeswari Updated on 11-feb for Save Order  End code Here*******/
    $('.inputFile20').bind('change', function() {
        if ($('#order_des').val() == '') {
            $("#des_err").html("Please enter order Description").show();
            return false;
        } else {
            $("#des_err").html("").show();
        }
    });
// Prevent Modal Close functions
    function epa() {
        $("#epa").modal({
            escapeClose: false,
            clickClose: false,
            showClose: false
        });
    }

    function Coupon() {
        $("#promo").modal({
            escapeClose: false,
            clickClose: false,
            showClose: false
        });
    }

    function Discount() {
        $('.by_percentage').css({"background":"#4caf50","border-color":"#4caf50","color": "#ffffff"});
        $('.by_amount').css({"background":"#E4E4E4","border-color":"#E4E4E4","color": "#000000"});

        $('#percentoff_div').show();
        $('#amountoff_div').hide();
        $("#discount2").modal({
            escapeClose: false,
            clickClose: false,
            showClose: false
        });
    }

    function CashDrop() {
        $('#cid').val('');
        $('#cpwd').val('');
        $("#cash_login").modal({
            escapeClose: false,
            clickClose: false,
            showClose: false
        });


    }

    function walk_in_customer() {
        $("#walk_in_customer_modal").modal({
            escapeClose: false,
            clickClose: false,
            showClose: false
        });
    }

    function add_customer() {
        $("#add_customer_modal").modal({
            escapeClose: false,
            clickClose: false,
            showClose: false
        });
    }

    function shiftEnd() {
        $("#shift_end_pos").modal({
            escapeClose: false,
            clickClose: false,
            showClose: false
        });
    }
// Prevent Moal Close Functions end

    /*** Rajeswari Updated on 22-feb for Product Lookup starts code Here*******/
    function ProductLookup() {
        $("#store_promotion_Price,.storeLOOk").hide();
        $('#product_lookup_description').val('');
        $('#store_promotion_Price').text('');
        $('#product_price').text('');

        $('#lookup').modal('show');
        // Prevent Modal Close functions
        $("#lookup").modal({
            escapeClose: false,
            clickClose: false,
            showClose: false
        });

        $('#product_lookup').click(function() {
            $('#read_barcode_POS').blur();
            $('#product_lookup_description').focus();
            var product_lookup = $('#product_lookup_description').val();

            //product_lookup = product_lookup.padStart(8, '0');

            // alert(product_lookup);
            // return false;

            if (product_lookup == '') {
                $("#lookup_err").html("Please Product Name/SKU/Scan Barcode").show();
                return false;
            }
            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?= base_url("cashier/Cashier/product_lookup") ?>',
                data: {
                    barcode: product_lookup
                },
                dataType: 'json',
                beforeSend: function(){
                    $("#overlay,.loader").show();
                },
                success: function(data) {
                    $("#overlay,.loader").hide();
                    if (data == 'fail') {
                        swal({
                            title: "Oops!",
                            text: "Product not found!",
                            icon: "error",
                            buttons: true,
                            timer: 2000,
                            buttons: false,
                        });
                        $('#product_lookup_description').val('');
                        KeyboardNum.close()
                        $('#product_lookup_description').blur();
                        $('#product_lookup_description').focus()
                    } else {
                       KeyboardNum.close()
                       $('#product_lookup_description').focus()
                        if (data.store_promotion_price != 0 || data.store_promotion_price !='null') {
                            $('#product_name').text(data.product_name);
                            //$('#product_price').text(' $'+data.price);
                            var price = parseFloat(data.onsale_price);
                            $('#product_price').text(' $' + price.toFixed(2));
                            $('.ppcon-lu').show();

                            if(data.is_custom_product == 1 || data.store_promotion_price =='null' || data.store_promotion_price == 0){
                                $("#store_promotion_Price,.storeLOOk").hide();
                              // $("#store_promotion_Price").text(' $' + '0.00');
                            }else{
                                if(data.store_promotion_price !=null){
                                    var price1 = parseFloat(data.store_promotion_price);
                                    $("#store_promotion_Price").text(' $' + price1.toFixed(2));
                                    $("#store_promotion_Price,.storeLOOk").show();
                                }
                            }

                        } else {
                            $('#product_name').text(data.product_name);
                            //$('#product_price').text(' $'+data.price);
                            $('#product_price').text(' $' + data.onsale_price);
                            $('.ppcon-lu').hide();
                        }
                        $("#lookup_data").modal("show");
                    }

                },


            });
            return true;

        });
        // }
    }

    $('.inputFile21').bind('change', function() {
        if ($('#product_lookup_description').val() == '') {
            $("#lookup_err").html("Please Product Name/SKU/Scan Barcode").show();
            return false;
        } else {
            $("#lookup_err").html("").show();
        }
    });




    /******* Rajeswari Updated on 25-feb for Payout  start code Here*******/

    $(document).ready(function() {
        let idFlag = false

        $("#Payout_amount").focus(function() {
            currentField = document.activeElement;
            //console.log(currentField)
        });
        $("#check_no").focus(function() {
            currentField = document.activeElement;
            //console.log(currentField)
        });
        $('.cdk_pay').on('click', function() {
            // alert("dasd"); exit;
            // $('#Payout_amount').focus();
            $(currentField).focus()




            newCharacter = this.innerHTML;
            if (newCharacter === "🠔") {
                currentField.value = currentField.value.substring(0, currentField.value.length - 1);
            } else if (newCharacter == '.' ) {

                let str = currentField.value;

                if (str.includes('.') == true) {
                    return
                } else {
                    currentField.value += newCharacter
                }
            } else if (newCharacter === "Tab") {
                if (idFlag == false) {
                    // $('#Payout_amount').focus();
                    $(currentField).focus()
                    idFlag = true
                } else {
                    // $('#Payout_amount').blur();
                    $(currentField).blur()
                    idFlag = false;
                }
            } else if (newCharacter === "Enter") {
                if (idFlag == false) {
                    $('#payout_confirm').click();
                    idFlag = true
                } else {
                    // $('#Payout_amount').blur();
                    $(currentField).blur()
                    idFlag = false;
                }
            } else {

                let valueToAppend = currentField.value;
                valueToAppend += newCharacter;

            if(! $('#check_no').is(':focus') ){
                valueToAppend = get_float_value(valueToAppend)
            }


                //           currentField.value = get_float_value(currentField.value)
                currentField.value = valueToAppend;

            }



        });
    });



    $('#Payout_amount').keypress(function(e) {
        // alert("asd"); exit;
        if (e.which == 13) { //Enter key pressed
            $('#payout_confirm').click(); //Trigger search button click event
        }
    });


    function Payout() {
        $('#tab1-tab').trigger('click');
        // $('#more_info').val('');
        $('.checkNo, #check_no').hide();
        // $('#mon_err').html('').show();
        $('#payout_modal').modal('show');
        $('#payout_confirm').click(function() {


            var Type = $('.active').text();
            var exist_supplier_id = $('#payout_vendor').val();
            var vendor_notes = $('#notes1').val();
            var payout_amount = $('#Payout_amount').val();
            var vendor_name = $('#more_info').val(); //vendor name1
            var category = $('#category1').val(); //category
            var category_name = $('#catgoryName1').val(); //category name
            var payment_type = $('#payment_type').val(); //Paymeny Type
            var employee_name = $('#payout_emp').val();
            var emp_notes = $('#notes2').val();
            var new_emp = $('#new_emp').val();
            var scratcher_id = $('#scratcher_id').val();
            var lotto_name = $('#lotto_name').val();
            var select_scratcher = $('#select_scratcher').val();

            var check_no = $('#check_no').val();

            if (Type == 'Scratcher') {
                if(select_scratcher == 'Scratcher'){
                    if ($('#scratcher_id').val() == '') {
                        $("#scratcher_err").html("Please select Scratcher").show();
                        return false;
                    }
                }else{
                    if (lotto_name == '') {
                        $("#lotto_err").html("Please Enter Lotto Name").show();
                        return false;
                    }
                }

                if(payment_type == 'Check'){
                    if(check_no == ''){
                        $("#check_err").html("Please Enter Check No.").show();
                        return false;
                    }
                }
            }


            if (Type == 'Vendor') {
                if ($('#payout_vendor').val() == '') {
                    $("#ext_ven_err").html("Please select Vendor").show();
                    return false;
                }

                if (category == '') {
                    $("#cat1_err").html("Please Select Category").show();
                    return false;
                }

                if (category == 'Others') {
                    if ($('#catgoryName1').val() == '') {
                        // $("#catn_err").html("Please Enter Category Name").show();
                        return false;
                    }
                }

                if(payment_type == 'Check'){
                    if(check_no == ''){
                        $("#check_err").html("Please Enter Check No.").show();
                        return false;
                    }
                }
            }

            if ($('#payout_vendor').val() == 'Others') {
                if (vendor_name == '') {
                    // $("#ven_err").html("Please Enter New Vendor Name").show();
                    return false;
                }
            }

            if (Type == 'Employee') {
                if ($('#payout_emp').val() == '') {
                    $("#em_err").html("Please select Employee").show();
                    return false;
                }

                if(payment_type == 'Check'){
                    if(check_no == ''){
                        $("#check_err").html("Please Enter Check No.").show();
                        return false;
                    }
                }
            }

            if (payout_amount == '') {
                $("#mon_err").html("Please Enter Payout Amount").show();
                return false;
            }


            swal({
                  text: "Are you sure you want to make this payout of $ "+payout_amount+" ?",
                  buttons: ["Cancel", true],
                  dangerMode: true,
                  //className: "swal-title"
              }).then((willDelete) => {
                  if (willDelete) {
                      // $("#overlay,.loader").show();
                      $.ajax({
                          type: 'ajax',
                          method: 'post',
                          url: '<?= base_url("cashier/Cashier/insert_payout") ?>',
                          data: {category_name: category_name, category: category, vendor_notes:vendor_notes, emp_notes: emp_notes, payout_amount : payout_amount,exist_supplier_id:exist_supplier_id,vendor_name:vendor_name,employee_name:employee_name,new_emp:new_emp,Type :Type,payment_type:payment_type,product_name:scratcher_id,lotto_name : lotto_name, check_no:check_no, select_scratcher:select_scratcher},
                          dataType: 'json',
                          beforeSend: function(){
                              $("#overlay,.loader").show();
                          },
                          success: function(data) {
                            $("#overlay,.loader").hide();
                            //console.log(data);
                            if(data=='success'){
                                //alert(node_setting);
                                if(node_setting == 1){
                                    data = '{"user_id":25}';
                                    socket.emit('send_notification',JSON.parse(data));
                                }
                                  //return false;

                               $('#closePAY').trigger('click');
                                swal({
                                    title: "Success!",
                                    text: "Payout success!",
                                    icon: "success",
                                    buttons: true,
                                    // timer :2000,
                                    buttons: false,
                                });
                                $('#Payout_amount').val('');
                                $('#payout_vendor').val('');
                                $('#more_info').val('');
                                $('#payout_emp').val('');
                                $('#new_emp').val('');


                                setTimeout(function() {
                                    location.reload();
                                }, 2800);


                            }

                            if (data.status == 'payout_note') {
                                $('#payoutNoteModal').modal();
                                // $('#payout_id').val(data.id);
                                $('#payout_type').val(data.insertdata.Type);

                                $('#payout_category').val(data.insertdata.category);
                                $('#payout_category_name123').val(data.insertdata.category_name);
                                $('#emp_notes123').val(data.insertdata.emp_notes);
                                $('#employee_name123').val(data.insertdata.employee_name);
                                $('#exist_supplier_id123').val(data.insertdata.exist_supplier_id);
                                $('#payment_type123').val(data.insertdata.payment_type);
                                $('#payout_amount123').val(data.insertdata.payout_amount);
                                $('#scratcher_id123').val(data.insertdata.scratcher_id);
                                $('#vendor_name123').val(data.insertdata.vendor_name);
                                $('#vendor_notes123').val(data.insertdata.vendor_notes);
                                $('#check_no123').val(data.insertdata.check_no);

                                $('#select_scratcher123').val(data.insertdata.select_scratcher);
                                $('#lotto_name123').val(data.insertdata.lotto_name);

                            }


                        },

                    });
                    return false;
                }
            });
        });
    }

    $('#payment_type').on('change', function() {
        if($(this).val() == 'Check'){
            $('.checkNo, #check_no').show();
        }else{
            $('.checkNo, #check_no').hide();
        }
    });

    $('.inputFile26').bind('change', function() {
        var Type = $('.active').text();
        var exist_supplier_id = $('#payout_vendor').val();
        var vendor_name = $('#more_info').val();
        var category = $('#category1').val(); //category
        var vendor_notes = $('#notes1').val();
        var emp_notes = $('#notes2').val();
        var employee_name = $('#payout_emp').val();
        var payout_amount = $('#Payout_amount').val();
        var new_emp = $('#new_emp').val();


        var scratcher_id = $('#scratcher_id').val();
        var lotto_name = $('#lotto_name').val();
        var select_scratcher = $('#select_scratcher').val();

        if (Type == 'Scratcher') {
              if(select_scratcher == 'Scratcher'){
                  if ($('#scratcher_id').val() == '') {
                      $("#scratcher_err").html("Please select Scratcher").show();
                      $("#lotto_err").html("").show();
                      return false;
                  }
              }else{
                  if (lotto_name == '') {
                      $("#scratcher_err").html("").show();
                      $("#lotto_err").html("Please Enter Lotto Name").show();
                      return false;
                  }
              }

              if(payment_type == 'Check'){
                  if(check_no == ''){
                      $("#check_err").html("Please Enter Check No.").show();
                      return false;
                  }
              }

              if($('#payment_type').val() == 'Check'){
                  if($('#check_no').val() == ''){
                      $("#check_err").html("Please Enter Check No.").show();
                      return false;
                  }else{
                    $("#check_err").html("").show();
                  }
              }
        }

        if (Type == 'Vendor') {
            if ($('#payout_vendor').val() == '') {
                $("#ext_ven_err").html("Please select Vendor").show();
                return false;
            } else {
                $("#ext_ven_err").html("").show();
            }

            if($('#payment_type').val() == 'Check'){
                if($('#check_no').val() == ''){
                    $("#check_err").html("Please Enter Check No.").show();
                    return false;
                }else{
                  $("#check_err").html("").show();
                }
            }

            if ($('#payout_vendor').val() == 'Others') {
                if (vendor_name == '') {
                    // $("#ven_err").html("Please Enter New Vendor Name").show();
                    return false;
                } else {
                    $("#ven_err").html("").show();
                }
            }

            if (category == '') {
                $("#cat1_err").html("Please Select Category").show();
                return false;
            } else {
                $("#cat1_err").html("").show();
            }
            // if(amt == '' || amt == 0){
            //   $('#drop_err').html('Please enter Cash Drop Amount').show();
            //   return false;
            // }
            //$("#overlay,.loader").show();

            if (category == 'Others') {
                if ($('#catgoryName1').val() == '') {
                    // $("#catn_err").html("Please Enter Category Name").show();
                    return false;
                } else {
                    $("#catn_err").html("").show();
                }
            }

        }


        if (Type == 'Employee') {
            if ($('#payout_emp').val() == '') {
                $("#em_err").html("Please select Employee").show();
                return false;
            } else {
                $("#em_err").html("").show();
            }

            if($('#payment_type').val() == 'Check'){
                if($('#check_no').val() == ''){
                    $("#check_err").html("Please Enter Check No.").show();
                    return false;
                }else{
                  $("#check_err").html("").show();
                }
            }
            if (employee_name == 'Others') {
                if (new_emp == '') {
                    // $("#emp_err").html("Please Enter New Employee Name").show();
                    return false;
                } else {
                    $("#emp_err").html("").show();
                }
            }
        }

        if (payout_amount == '') {
            $("#mon_err").html("Please Enter Payout Amount").show();
            return false;
        } else {
            $("#mon_err").html("").show();
        }

    });


    $('#new_emp').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            $("#emp_err").html("Only alphabets allowed").show();
            return false;
        } else {
            $("#emp_err").html("").show();

        }
    });

    function CheckVendors(val) {
        var element = document.getElementById('more_info');
        if (val == 'Others')
            //element.style.display='block';
            element.style.display = 'unset';
        else
            element.style.display = 'none';
    }

    function CheckEmps(val) {
        // alert("das"); exit;
        var element1 = document.getElementById('new_emp');
        if (val == 'Others')
            //element1.style.display='block';
            element1.style.display = 'unset';
        else
            element1.style.display = 'none';
    }
    /******* Rajeswari Updated on 25-feb for Payout  End code Here*******/

    //prashant add code
    $('.custom_cat').on('click', function() {
        var custome_category_id = $(this).data("cus");
        $.ajax({
            url: "<?php echo base_url(); ?>cashier/Cashier/get_cat_wise_buttons",
            method: "POST",
            data: {
                cat_id: custome_category_id
            },
            dataType: 'json',
            success: function(data) {
                // //console.log(data);
                $('.flexB1').html(data); //Add field html
            }
        });
    });

    $('#firstCategoryTab').on('click', function() {
        // var frequentky_sold = $(this).data("cus");
        $.ajax({
            url: "<?php echo base_url(); ?>cashier/Cashier/get_frequently_sold_items",
            method: "POST",
            // data: {cat_id: frequentky_sold},
            dataType: 'json',
            success: function(data) {
                // //console.log(data);
                $('.flexB1').html(data); //Add field html

            }
        });

    });

    $('#cash_Drop').on('click', function() {
        //'echo $this->session->userdata['cashierdata']['username'];';
        var username = $('#cashUSER_id').val();
        var shift_user = '<?php echo $this->session->userdata['shiftdata']['username']; ?>';
        if (username == '') {
            var user_id = shift_user;
        } else {
            var user_id = username;
        }
        // alert(user_id);
        var amt = $('#cdinput').val();

        if (amt == '' || amt == 0) {
            $('#drop_err').html('Please enter Cash Drop Amount').show();
            return false;
        }
        $.ajax({
            url: '<?= base_url("cashier/Cashier/insert_cash_drop"); ?>',
            type: 'post',
            data: {
                user_id: user_id,
                cash_amount: amt
            },
            dataType: 'json',
            beforeSend: function(){
                $("#overlay,.loader").show();
            },
            success: function(data) {
                $("#overlay,.loader").hide();


                if (data.status == 'note') {
                    $('#Close_CASH').trigger('click');
                    swal({
                        title: "Oops!",
                        text: "Insufficient cash in cash drawer ($ " + data.show_alert_amt + ") !",
                        icon: "error",
                        buttons: false,
                        timer: 3000,
                    });
                    setTimeout(function() {
                        location.reload();
                    }, 2200);

                } else {
                    $('#cashdrop2').modal();
                    $('#pdrop').text(data.drop);
                    $('#namec').text(data.name);
                    $('#idc').text(data.user_id);
                    $('#drpAmt').text(data.cash_amount);
                    $('#print_date').text(data.print_date);
                }

                //alert(node_setting);
                if(node_setting == 1){
                    data = '{"user_id":25}';
                    socket.emit('send_notification',JSON.parse(data));
                }
                //return false;
            }
        });

    });

      $('#closePrint').on('click', function() {
          $('.closeRcpt').trigger('click');
      });

    $('.cashdrop-input').bind('change', function() {
        if ($('#cdinput').val() == '') {
            $('#drop_err').html('Please enter Cash Drop Amount').show();
            return false;
        } else {
            $('#drop_err').html('').show();
        }
    });

    $(document).ready(function() {
        let idFlag = false
        $("#cdinput").focus(function() {
            currentField = document.activeElement;
            //console.log(currentField)
        });

        $('.drop_pay').on('click', function() {
            // alert("dasd"); exit;
            $('#cdinput').focus();
            newCharacter = this.innerHTML;
            if (newCharacter === "🠔") {
                currentField.value = currentField.value.substring(0, currentField.value.length - 1);
            } else if (newCharacter == '.') {

                let str = currentField.value;

                if (str.includes('.') == true) {
                    return
                } else {
                    currentField.value += newCharacter
                }
            } else if (newCharacter === "Enter") {
                if (idFlag == false) {
                    $('#cash_Drop').click();
                    idFlag = true
                } else {
                    $('#cdinput').blur();
                    idFlag = false;
                }

            } else {
                let valueToAppend = currentField.value;
                valueToAppend += newCharacter;
                valueToAppend = get_float_value(valueToAppend)
                currentField.value = valueToAppend;
            }

        });
    });

    // cash login
    $('#cLogin').click(function() {
        var user_id = $('#cid').val();
        var password = $('#cpwd').val();
        if (user_id == '') {
            $("#idpos2_err").html("Please enter your Employee Username").show();
            return false;
        }
        if (password == '') {
            $("#pwd2_err").html("Please enter your Employee Password").show();
            return false;
        }
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("cashier/Cashier/cash_login"); ?>',
            data: {
                username: user_id,
                password: password
            },
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                // $.modal.close();
                // $('#cashdrop').modal();

                if (data.message == 'loggedin') {
                    $.modal.close();
                    $('#cashdrop').modal();
                    $("#cdinput").val(data.cash_drop_amt.toFixed(2));
                    $('#cdinput').focus();
                    $('#cashUSER_id').val(user_id);
                }
                if (data == 'password_fail') {
                    swal({
                        title: "Oops!",
                        text: "Password does not match!",
                        icon: "error",
                        buttons: false,
                    });
                    $.modal.close();
                    setTimeout(function() {
                        location.reload();
                    }, 2200);
                }
                if (data == 'user_not_exist') {
                    swal({
                        title: "Oops!",
                        text: "User does not exist!",
                        icon: "error",
                        buttons: false,
                    });
                    $.modal.close();
                    setTimeout(function() {
                        location.reload();
                    }, 2200);
                }
            },

        });
        return false;
    });

    $('.inputFile40').bind('change', function() {
        if ($('#cid').val() == '') {
            $("#idpos2_err").html("Please enter your Employee Username").show();
            return false;
        } else {
            $("#idpos2_err").html("").show();
        }
        if ($('#cpwd').val() == '') {
            $("#pwd2_err").html("Please enter your Employee Password").show();
            return false;
        } else {
            $("#pwd2_err").html("").show();
        }
    });


    $(document).ready(function() {
        let idFlag = false
        $(".bsinput").focus(function() {
            currentField = document.activeElement
            // //console.log(currentField.value)
        });
        $('.log_pay').on('click', function() {
            newCharacter = this.innerHTML;
            // alert(newCharacter)
            // newCharacter = parseInt(newCharacter)
            // added auto tab
            if ($('#cid').val().length >= 2 && $(this).hasClass('backBTN') == false) {
                $('#cpwd').focus();
            }

            if ($('#cpwd').val().length > 3 && $(this).hasClass('backBTN') == false && $(this).hasClass('tabBTN') == false) {
                if ($('#cid').val().length != 2 && $(this).hasClass('backBTN') == false) {
                    $('#cid').focus();
                } else {
                    return false;
                }
            }

            if (newCharacter === "🠔") {
                currentField.value = currentField.value.substring(0, currentField.value.length - 1);
            } else if (newCharacter.length > 5) {
                //            alert('222')
            } else if (newCharacter === "Tab") {
                if (idFlag == false) {
                    $('#cpwd').focus();
                    idFlag = true
                } else {
                    $('#cpwd').blur();
                    $('#cid').focus();
                    idFlag = false;
                }
            } else {
                currentField.value += newCharacter
                if ($('#cpwd').val().length == 4) {
                    $('#cLogin').trigger('click');
                }
            }
        });
    });

    $('.log_pay').on('click', function() {
        if ($('#cid').val() == '') {
            $('#cid').focus();
            $("#idpos2_err").html("").show();
            return false;
        } else {
            $("#idpos2_err").html("").show();
        }
        if ($('#cpwd').val() == '') {
            $("#pwd2_err").html("Please enter your Employee Password").show();
            return false;
            s
        } else {
            $("#pwd2_err").html("").show();
        }


    });


    //add pos-footer.php
    $('#closePAY').click(function() {
        $('#payout_vendor').val('');
        $('#category1').val('');
        $('#notes1').val('');
        $('#notes2').val('');
        $('#Payout_amount').val('');
        $('#payout_emp').val('');
        setTimeout(function() {
            location.reload();
        }, 2800);
    });

    $('#close_cash_login').click(function() {
        $('#cid').val('');
        $('#cpwd').val('');
    });

    $('#category1').on('change', function() {
        var cat = $(this).val();
        var vendor = $('#payout_vendor').val();
        if (cat == 'Others') {
            $('#catgoryName1').show();
        } else {
            $('#catgoryName1').hide();
        }

        if (vendor == 'Others' && cat == 'Others') {
            $('#notes1').hide();
        } else {
            $('#notes1').show();
        }


    });

    $('#payout_vendor').on('change', function() {
        var cat = $('#category1').val();
        var vendor = $('#payout_vendor').val();
        if (vendor == 'Others' && cat == 'Others') {
            $('#notes1').hide();
        } else {
            $('#notes1').show();
        }
    });


    $('#dropPRINT').on('click', function() {
        var printdata = $('.rcptviewer').html();
        var printWindow = window.open('', '', 'height=800,width=1200');
        printWindow.document.write('<html><head><title>Cash Drop Receipt</title>');
        printWindow.document.write(' <link rel="stylesheet" href="<?php echo base_url(); ?>assets/cashier/style/pos2.css" />')
        printWindow.document.write('</head><body style="max-width: 80mm;margin: 0 auto;" >');
        printWindow.document.write(printdata);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        setTimeout(function(){printWindow.print()},2000);

    });

    //rajeshwari code custom product

    function CustomProduct() {
        var current_date = new Date().getTime();
        //    var uniqueNumber= parseInt((new Date().getTime()),8);
        var uniqueNumber = parseInt(current_date);
        //alert(uniqueNumber); exit;
        document.getElementById("product_upc").value = uniqueNumber;
        $('#customProduct').modal('show');
        $('#custom_product_insert').click(function() {
            $('#read_barcode_POS').blur();

            //alert(uniqueNumber);exit;
            //$('#custom_product_name').focus();
            var custom_product_name = $('#custom_product_name').val();
            var custom_product_price = $('#custom_product_price').val();
            var Applicable_Tax = $("#Applicable_Tax").is(':checked') ? 1 : 0;
            var Applicable_CRV = $("#Applicable_CRV").is(':checked') ? 1 : 0;
            var product_upc = $('#product_upc').val();

            if (custom_product_name == '') {
                $('#custom_product_name').focus();
                $("#custom_prod_name_err").html("Please Enter Product Name").show();
                return false;
            }
            if (custom_product_price == '') {
                $('#custom_product_price').focus();
                $("#custom_prod_price_err").html("Please Enter Product Price").show();
                return false;
            }

            if(Applicable_CRV == 1) {

                var val = $("#size").val();

                var obj = $("#sizes").find("option[value='" + val + "']");
                ////console.log("val->"+val+"");
                if(obj != null && obj.length > 0) { // Valid
                    $("#size_err").html("").hide();
                    //return false;
                } else { // don't allow form submission
                    //console.log("Please Select Product Size");
                    $("#size_err").html("Please Select Valid Product Size").show();
                    return false;
                }

            }
            //return false;


            $.ajax({
                type: 'ajax',
                method: 'post',
                url: '<?php echo base_url("cashier/Cashier/insert_custom_product"); ?>',
                data: {
                    custom_product_name: custom_product_name,
                    product_upc: product_upc,
                    custom_product_price: custom_product_price,
                    Applicable_Tax: Applicable_Tax,
                    Applicable_CRV: Applicable_CRV,
                    crv_size :val,
                },
                dataType: 'json',
                beforeSend: function(){
                    $("#overlay,.loader").show();
                },
                success: function(data) {
                    $("#overlay,.loader").hide();
                    if (data == 'success') {
                        swal({
                            title: "Success!",
                            text: "Custom product is successfully inserted!",
                            icon: "success",
                            buttons: false,
                        });
                        $.modal.close();
                        setTimeout(function() {
                            location.reload();
                        }, 2200);
                    }
                }
            });
        });
    }

    $('.inputFile51').bind('change', function() {
        if ($('#custom_product_name').val() == '') {
            $("#custom_prod_name_err").html("Please Enter Product Name").show();
            return false;
        } else {
            $("#custom_prod_name_err").html("").show();
        }
    });

    $('.inputFile52').bind('change', function() {
        if ($('#custom_product_price').val() == '') {
            $("#custom_prod_price_err").html("Please Enter Product Price").show();
            return false;
        } else {
            $("#custom_prod_price_err").html("").show();
        }
    });

    //rajeshwari code Payout By Date
    function GetPayouts_bydate() {
        var payout_date = $('#payout_date').val();
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("cashier/Cashier/get_payouts_by_date"); ?>',
            data: {
                payout_date: payout_date
            },
            dataType: 'json',
            success: function(data) {
                var trHTML = '';
                // trHTML =" ";
                //console.log(data);
                $("#tbl_payouts").empty();
                if (data == 'Not Found') {
                    //$('#tbl_tr_payout').hide();
                    $("#tbl_payouts").empty();
                    $('#tbl_tr_payout').hide();
                    trHTML += '<tr><td colspan="4">No Data Found</td></tr>';
                } else {
                    $("#tbl_payouts").empty();
                    $('#tbl_tr_payout').hide();
                    $.each(data, function(key, value) {
                        date2 = new Date(value.created_at);
                        newDate = date2.toLocaleDateString();

                        trHTML +=
                            '<tr><td>' + newDate +
                            '</td><td>' + value.supplier_emp_name +
                            '</td><td> $' + value.payout_money +
                            '</td><td>' + value.payment_type +
                            '</td></tr>';
                    });
                }

                $('#recent_pay').append(trHTML);
                trHTML += " ";
            }

        });


    }
</script>
<script>
    // auto tab
    $("#cid").keyup(function() {
        if ($(this).val().length == 2) {
            $('#cpwd').focus();
        }
    });
    //auto tab
    $("#cpwd").keyup(function() {
        if ($(this).val().length > 3) {
            return false;
        }
    });

    // $(document).click(function(event) {
    //     //if you click on anything except the modal itself or the "open modal" link, close the modal
    //     if (!$(event.target).closest("#cash_login").length) {
    //         $("#cid").val('');
    //         $("#cpwd").val('');
    //         $("#idpos2_err").html(''); //added prashant
    //         $("#pwd2_err").html('');
    //
    //     }
    // });

    //prashant added 24APR
    $(document).on('click', '#cashdroplaunchbtn', function() {
        isModalOpen = $.modal.isActive();
        setTimeout(function() {
            $('#cid').focus();
            isModalOpen = $.modal.isActive();
            //console.log(isModalOpen, $.modal.isActive());
        }, 100);
        $('.arn').on('click', function() {
          jQuery("#read_barcode_POS").focus();
          $('#read_barcode_POS').removeClass('use-keyboard-input');
        })
        // //console.log(isModalOpen,$.modal.isActive());
    });

    $(document).on('click', '#payoutNote', function() {

       // var id= $("#payout_id").val();
       var Type = $("#payout_type").val();
       var payoutNote = $("#payout_note").val();
       var category = $("#payout_category").val();
       var category_name = $("#payout_category_name123").val();
       var emp_notes = $("#emp_notes123").val();
       var employee_name = $("#employee_name123").val();
       var exist_supplier_id = $("#exist_supplier_id123").val();
       var payment_type = $("#payment_type123").val();
       var payout_amount = $("#payout_amount123").val();
       var scratcher_id = $("#scratcher_id123").val();
       var vendor_name = $("#vendor_name123").val();
       var vendor_notes = $("#vendor_notes123").val();
       var check_no = $("#check_no123").val();

       var select_scratcher = $("#select_scratcher123").val();
       var lotto_name = $("#lotto_name123").val();


        if(payoutNote == ''){
            $("#pnote_err").html('Please enter Payout Note').show();
            return false;
        }
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("cashier/Cashier/insert_payout_with_note"); ?>',
            data: {
                vendor_notes: vendor_notes,
                vendor_name: vendor_name,
                product_name: scratcher_id,
                payout_note: payoutNote,
                Type: Type,
                category: category,
                category_name: category_name,
                emp_notes: emp_notes,
                employee_name: employee_name,
                exist_supplier_id: exist_supplier_id,
                payment_type: payment_type,
                payout_amount: payout_amount,
                check_no : check_no,
                select_scratcher : select_scratcher,
                lotto_name : lotto_name
            },

        dataType: 'json',
        beforeSend: function(){
            $("#overlay,.loader").show();
        },
        success: function(data) {
            $("#overlay,.loader").hide();
            ////console.log(data);
            if (data) {
              swal({
                  title: "Success!",
                  text: "Payout success!",
                  icon: "success",
                  buttons: false,
              });
              $.modal.close();
              setTimeout( function (){
                location.reload();
              },2200);
            }
        }
        });
    });

    $('#payout_note').bind('change', function() {
        var payoutNote = $("#payout_note").val();
        if (payoutNote == '') {
            $("#pnote_err").html('Please enter Payout Note').show();
            return false;
        } else {
            $("#pnote_err").html("").show();
        }
    });


    $(document).on('click', '#cashBackNote', function() {
        var cashBackNote = $("#cash_back_note").val();
        if (cashBackNote == '') {
            $("#cashnote_err").html('Please enter cash back note').show();
            return false;
        }
        var cashback_amount = $("#append_cashback_amount123").val();
        var cashback_fee = $('#append_cashback_fee123').val();
        var main_cart_grand_total = $("#main_cart_grand_total").val();

        $("#cart_cashback_amount,#cart_cashback_fee").show();
        $("#append_cashback_amount").html(cashback_amount);
        $("#append_cashback_fee").html(cashback_fee);

        var cashback_order_total = parseFloat(main_cart_grand_total) + parseFloat(cashback_amount) + parseFloat(cashback_fee);
        cashback_order_total = cashback_order_total.toFixed(2);

        // $("#append_cashback_order_total").html(cashback_order_total);
        $("#grand_total").html("$" + cashback_order_total);

        $(".item_info_section #cashback_fee").val(cashback_fee);
        $(".item_info_section #cashback_amount").val(cashback_amount);

        $("#pos_cashback_amount").val(cashback_amount);
        $("#cashback_note").val(cashBackNote);


        $("#pos_cashback_modal img").trigger("click"); //need

        $(".total-con").scrollTop($(".total-con")[0].scrollHeight);

        $("#read_barcode_POS").focus();
        $('#read_barcode_POS').removeClass('use-keyboard-input');

    });


    $('#cash_back_note').bind('change', function() {
        var cashBackNote = $("#cash_back_note").val();
        if (cashBackNote == '') {
            $("#cashnote_err").html('Please enter cash back note').show();
            return false;
        } else {
            $("#cashnote_err").html("").show();
        }
    });

    // jQuery(document).on('click', '#close_shift_login', function() {
    //     jQuery("#shift_out_user").blur();
    //     jQuery("#read_barcode_POS").focus();
    // });

    // $(document).on('click', '#shifOUT', function() {
    //       // $('#front-login1').modal();
    //       isModalOpen = $.modal.isActive();
    //       setTimeout(function () {
    //           $('#shift_out_user').focus();
    //         isModalOpen = $.modal.isActive();
    //         //console.log(isModalOpen,$.modal.isActive());
    //       }, 100);
    //       $('.arn').on('click',function () {
    //         jQuery("#read_barcode_POS").focus();
    //       })
    //       // //console.log(isModalOpen,$.modal.isActive());
    // });

    $('#close_shift_login').click(function() {
        $('#shift_out_user').val('');
        $('#shift_out_pass').val('');
        $("#shift_out1_err, #shift_out2_err").html("").show();

    });

    $('.close_pos_shift').click(function() {
        location.reload();
    });



    $(document).on('click', '#POS_SHIFT_LOGUT', function() {
        var username = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';

        if ($('#pos_cash_in_drawer').val() == '') {
            $("#pos_cash_in_drawer_err").html("Please enter Cash In Drawer").show();
            $(".div1").css("height", "114px");
            return false;
        }
        if ($('#pos_coin_dispenser').val() == '') {
            $("#pos_coin_dispenser_err").html("Please enter Coin Dispenser").show();
            $(".div2").css("height", "114px");
            return false;
        }

        var is_valid = 0;
        $('.bin_data').each(function() {
            var id = $(this).attr('data-id');
            var value = $(this).val();
            if (value == '') {
                is_valid = 1;
                $('#bin_err_' + id).html('Please enter Bin ' + id + ' Last Scratcher No')
                $('#bin_err_' + id).show();
                return false;
            } else {
                $('#bin_err_' + id).hide();
            }
        });

        if (is_valid == 1) {
            return false;
        }
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("cashier/shift_terminal"); ?>',
            data: $('.shift_out_pos').serialize() + "&username=" + username,
            dataType: 'json',
            beforeSend: function(){
                $("#overlay,.loader").show();
            },
            success: function(data) {
                $("#overlay,.loader").hide();
                if (data == 'end_shift') {
                    swal({
                        title: 'Success!',
                        text: "Shift ended successfully!",
                        icon: "success",
                        buttons: false,
                        //timer: 2500,
                    });
                    $('.shift_out_pos')[0].reset();
                    $('.arn').trigger('click');
                    setTimeout(function() {
                        window.location = '<?= base_url('cashier') ?>';
                    }, 2500);
                }
            },

        });
        return false;
    });

    $('.bsinput').bind('change', function() {
        if ($('#pos_cash_in_drawer').val() == '') {
            $("#pos_cash_in_drawer_err").html("Please enter Cash In Drawer").show();
            $(".div1").css("height", "114px");
            return false;
        } else {
            $("#pos_cash_in_drawer_err").html("").show();
            $(".div1").css("height", "94px");
        }
        if ($('#pos_coin_dispenser').val() == '') {
            $("#pos_coin_dispenser_err").html("Please enter Coin Dispenser").show();
            $(".div2").css("height", "114px");
            return false;
        } else {
            $("#pos_coin_dispenser_err").html("").show();
            $(".div2").css("height", "94px");
        }

    });

    $(document).ready(function() {
        let idFlag = false
        $(".bsinput").focus(function() {
            currentField = document.activeElement
            // //console.log(currentField.value)
        });
        $('.log_pay12').on('click', function() {
            newCharacter = this.innerHTML;

            if ($('#shift_out_user').val().length >= 2 && $(this).hasClass('backBTN12') == false) {
                $('#shift_out_pass').focus();
            }

            if ($('#shift_out_pass').val().length > 3 && $(this).hasClass('backBTN12') == false) {
                if ($('#shift_out_user').val().length != 2 && $(this).hasClass('backBTN12') == false) {
                    $('#shift_out_user').focus();
                } else {
                    return false;
                }
            }

            if (newCharacter === "🠔") {
                currentField.value = currentField.value.substring(0, currentField.value.length - 1);
            } else if (newCharacter.length > 5) {
                //            alert('222')
            } else if (newCharacter === "Tab") {
                if (idFlag == false) {
                    $('#shift_out_pass').focus();
                    idFlag = true
                } else {
                    $('#shift_out_pass').blur();
                    $('#shift_out_user').focus();
                    idFlag = false;
                }
            } else {
                currentField.value += newCharacter
                if ($('#shift_out_pass').val().length == 4) {
                    $('#shifLogout').trigger('click');
                }
            }
        });
    });

    // pos shit out logot
    $("#shift_out_pass").keypress('keyup', function(event) {
        let we = $("#shift_out_pass").val();
        if (event.keyCode == 13) {
            $('#shifLogout').trigger('click');
        }
    });
    $("#shift_out_pass").on('input', function() {
        if ($(this).val().length == 4) {
            $('#shifLogout').trigger('click');

        }
    });
    $("#shift_out_pass").change(function(event) {
        let we = $("#shift_out_pass").val();
        $("#shift_out_pass").focus();

    });

    $("#shift_out_user").keyup(function() {
        if ($(this).val().length == 2) {
            // $('#shift_out_user').blur();
            $('#shift_out_pass').focus();
        }
    });

    // pos shit out login
    $('#shifLogout').click(function() {
        var user_id = $('#shift_out_user').val();
        var password = $('#shift_out_pass').val();
        if (user_id == '') {
            $("#shift_out1_err").html("Please enter your Employee Username").show();
            return false;
        }
        if (password == '') {
            $("#shift_out2_err").html("Please enter your Employee Password").show();
            return false;
        }
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("cashier/Cashier/cash_login"); ?>',
            data: {
                username: user_id,
                password: password
            },
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                var shift_user = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
                if (data.message == 'loggedin') {
                    // alert('');
                    $('#front-login1').modal('hide');
                    $('#clock_out_pos').modal();

                    $('#hide_username').val(data.user_id);

                    if (shift_user != data.user_id) {
                        $("#shift_in1234").css("display", "none");
                        $(".title12").text("Clock Out");
                    } else {
                        $("#shift_in1234").css("display", "");
                        $(".title12").text("Clock Out/End Shift");
                    }

                }
                if (data == 'password_fail') {
                    $('#shift_out_pass').val('');
                    $('#shift_out_pass').focus();
                    swal({
                        title: "Oops!",
                        text: "Password does not match!",
                        icon: "error",
                        buttons: false,
                        timer: 2500,
                    });
                }
                if (data == 'user_not_exist') {
                    $('.pos-shift-logout')[0].reset();
                    $('#shift_out_user').focus();
                    swal({
                        title: "Oops!",
                        text: "User does not exist!",
                        icon: "error",
                        buttons: false,
                        timer: 2500,
                    });
                }
            },

        });
        return false;
    });

    $('.log_pay12').on('click', function() {
        if ($('#shift_out_user').val() == '') {
            $('#shift_out_user').focus();
            $("#shift_out1_err").html("").show();
            return false;
        } else {
            $("#shift_out1_err").html("").show();
        }
        if ($('#shift_out_pass').val() == '') {
            $("#shift_out2_err").html("Please enter your Employee Password").show();
            return false;
        } else {
            $("#shift_out2_err").html("").show();
        }

    });

    $(document).on('click', '#shift_in1234', function() {

        var username = '<?php echo $this->session->userdata["shiftdata"]["username"] ?>';
        //alert(username);
        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("cashier/Cashier/get_current_shift_data"); ?>',
            data: {
                username: username
            },
            dataType: 'json',
            success: function(data) {
                // //console.log(data.bin_data);
                if (data.coin_dispenser == null || data.coin_dispenser == undefined) {
                    coin_dispenser = 0;
                } else {
                    coin_dispenser = data.coin_dispenser;
                }
                if (data.cash_in_drawer <= 0) {
                    $('#pos_cash_in_drawer').val(0.00);
                } else {
                    $('#pos_cash_in_drawer').val(data.cash_in_drawer);
                }

                $('#pos_coin_dispenser').val(coin_dispenser);
                var sessName = '<?php echo isset($this->session->userdata["shiftdata"]["shift_id"]) ? $this->session->userdata["shiftdata"]["shift_id"] : "" ?>';
                if (sessName != '' && data.cash_drop != undefined && parseInt(data.cash_drop) > 0) {
                    $('.cdalert').html('First you need to do cash drop of $' + data.cash_drop + '</span>');
                }


                if (data.bin_data == '') {
                    $('#sbins1').show();
                } else if (data.bin_data != null) {
                    var list = '';
                    for (var i = 0; i < data.bin_count; i++) {
                        list += '<tr><td class="text-left" style="font-size: 20px;">Bin ' + data.bin_data[i].bin + '</td><td ><input type="number" data-id="' + data.bin_data[i].bin + '" name="bin_data[]"  id="bin_data_' + data.bin_data[i].bin + '" class="form-control w-25 use-keyboard-input-num validateShift bin_data bin-align" style="font-size: 20px;" min="1" value="' + data.bin_data[i].scracher_current_no + '" /><span class="errors" id="bin_err_' + data.bin_data[i].bin + '" style="color:red; font-size:17px;"></span></td></tr>';
                        $('#sbins1').html(list);
                    }

                }
            },
        });
        return false;
    });


    $('#clock_in_pos').click(function() {
        var username = $('#hide_username').val();

        $.ajax({
            type: 'ajax',
            method: 'post',
            url: '<?php echo base_url("cashier/Cashier/pos_clockout"); ?>',
            data: {
                username: username
            },
            // async: false,
            dataType: 'json',
            success: function(data) {
                //console.log(data);
                $('#clock_out_pos').modal('hide');
                if (data.status == 'logout') {
                    swal({
                        title: data.fname + " " + data.lname,
                        text: "Clocked out successfully!",
                        icon: "success",
                        buttons: false,
                        // timer: 2700,
                    });
                    $('.arn').trigger('click');
                    setTimeout(function() {
                        window.location = '<?php echo base_url("cashier") ?>'
                    }, 2500);
                }

            },

        });
        return false;
    });

    $(document).on('click', '#pos_customer_signup', function() {
        var customer_fname = $('#customer_first_name').val();
        var customer_lname = $('#customer_last_name').val();
        var customer_mobile = $("#customer_mobile").val();
        var customer_email = $("#customer_email").val();

        if(customer_fname == ''){
          $("#cfname_err").html("Please enter first name").show();
          $("#cfname_err").css("margin-bottom", "-11px");
          return false;
        }
        if(customer_lname == ''){
          $("#clname_err").html("Please enter last name").show();
          $("#clname_err").css("margin-bottom", "-11px");
          return false;
        }
        if(customer_mobile == ''){
          $("#cmobile_err").html("Please enter mobile number").show();
          $("#cmobile_err").css("margin-bottom", "-11px");
          return false;
        }

        if(customer_mobile.length != 14){
          $("#cmobile_err").html("Please enter correct mobile number").show();
          $("#cmobile_err").css("margin-bottom", "-11px");
          return false;
        }

        if(customer_email != ''){
            if(ValidateCustomerEmail(customer_email) == false){
              $("#cemail_err").html("Please enter valid email").show();
              $("#cemail_err").css("margin-bottom", "-11px");
              return false;
            }
        }

        $.ajax({
          type: 'ajax',
          method: 'post',
          url: '<?php echo base_url("cashier/customer_signup"); ?>',
          data: {customer_fname: customer_fname, customer_lname: customer_lname, customer_mobile:customer_mobile, customer_email: customer_email},
          dataType: 'json',
          beforeSend: function(){
              $("#overlay,.loader").show();
          },
          success: function(data) {
            $("#overlay,.loader").hide();
            if (data.status == "success") {
              var customer_name = data.data.customer_name;
              var customer_id = data.data.customer_id;
              var tot_redeem_point = data.data.tot_redeem_point;
              var account_balance = data.account_balance;
              var db_point_amount = data.data.db_point_amount;
              var db_point = data.data.db_point;

              $(".pos-head").html(customer_name);
              $(".pos-head").css("color", "#000");
              $("#walk_in_customer_name").val(customer_name);
              $("#walk_in_customer_id").val(customer_id);
              $("#customer_mobile_no").val("");
              $("#cust_loyalty_points").html(tot_redeem_point);
              $("#cust_loyalty_amount").html(account_balance);

              $("#outbound_point_main").val(db_point);
              $("#outbound_point_amount_main").val(db_point_amount);

              $("a[href='#pos_redeem_points_modal']").attr(
                "data-cust_loyalty_points",
                tot_redeem_point
              );
              $("a[href='#pos_redeem_points_modal']").attr(
                "data-cust_loyalty_amount",
                account_balance
              );
              $('.add_customer_modal_close').trigger('click');
            }else{
                if(data.mobile_err != ''){
                    $("#cmobile_err").html("This mobile number is already exist").show();
                    $("#cmobile_err").css("margin-bottom", "-11px");
                    $("#cmobile_err").css("margin-right", "33%");
                    return false;
                }else{
                    swal({
                        title: "Oops!",
                        text: "Someting went wrong!",
                        icon: "error",
                        buttons: false,
                        timer: 2500,
                    });
                }
            }
          },
        });
        return false;
    });

    $('.valid99').bind('change', function() {
        var customer_fname = $('#customer_first_name').val();
        var customer_lname = $('#customer_last_name').val();
        var customer_mobile = $("#customer_mobile").val();
        var customer_email = $("#customer_email").val();

        if(customer_fname == ''){
          $("#cfname_err").html("Please enter first name").show();
          $("#cfname_err").css("margin-bottom", "-11px");
          return false;
        }else{
          $("#cfname_err").html("").show();
        }
        if(customer_lname == ''){
          $("#clname_err").html("Please enter last name").show();
          $("#clname_err").css("margin-bottom", "-11px");
          return false;
        }else{
          $("#clname_err").html("").show();
        }
        if(customer_mobile == ''){
          $("#cmobile_err").html("Please enter mobile number").show();
          $("#cmobile_err").css("margin-bottom", "-11px");
          return false;
        }else{
          $("#cmobile_err").html("").show();
        }

        if(customer_mobile.length != 14){
          $("#cmobile_err").html("Please enter correct mobile number").show();
          $("#cmobile_err").css("margin-bottom", "-11px");
          return false;
        }else{
          $("#cmobile_err").html("").show();
        }

        if(customer_email != ''){
            if(ValidateCustomerEmail(customer_email) == false){
              $("#cemail_err").html("Please enter valid email").show();
              $("#cemail_err").css("margin-bottom", "-11px");
              return false;
            }else{
              $("#cemail_err").html("").show();
            }
        }

    });

    $(document).on('click','.keyboard__key', function(){
        var customer_fname = $('#customer_first_name').val();
        var customer_lname = $('#customer_last_name').val();
        var customer_mobile = $("#customer_mobile").val();
        var customer_email = $("#customer_email").val();

        if(customer_fname == ''){
          $("#cfname_err").html("Please enter first name").show();
          $("#cfname_err").css("margin-bottom", "-11px");
          return false;
        }else{
          $("#cfname_err").html("").show();
        }
        if(customer_lname == ''){
          $("#clname_err").html("Please enter last name").show();
          $("#clname_err").css("margin-bottom", "-11px");
          return false;
        }else{
          $("#clname_err").html("").show();
        }
        if(customer_mobile == ''){
          $("#cmobile_err").html("Please enter mobile number").show();
          $("#cmobile_err").css("margin-bottom", "-11px");
          return false;
        }else{
          $("#cmobile_err").html("").show();
        }

        if(customer_mobile.length != 14){
          $("#cmobile_err").html("Please enter correct mobile number").show();
          $("#cmobile_err").css("margin-bottom", "-11px");
          return false;
        }else{
          $("#cmobile_err").html("").show();
        }

        if(customer_email != ''){
            if(ValidateCustomerEmail(customer_email) == false){
              $("#cemail_err").html("Please enter valid email").show();
              $("#cemail_err").css("margin-bottom", "-11px");
              return false;
            }else{
              $("#cemail_err").html("").show();
            }
        }

    });


    $('#customer_first_name').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            return false;
        }
    });

    $('#customer_last_name').on('keypress', function() {
        var regex = new RegExp("^[a-zA-Z ]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
            return false;
        }
    });

    $(document).on("click", ".by_amount", function() {
        $('.by_amount').css({"background":"#4caf50","border-color":"#4caf50","color": "#ffffff"});
        $('.by_percentage').css({"background":"#E4E4E4","border-color":"#E4E4E4","color": "#000000"});
        $('#percentoff_div').hide();
        $('#amountoff_div').show();

    });

    $(document).on("click", ".by_percentage", function() {
        $('.by_percentage').css({"background":"#4caf50","border-color":"#4caf50","color": "#ffffff"});
        $('.by_amount').css({"background":"#E4E4E4","border-color":"#E4E4E4","color": "#000000"});
        $('#percentoff_div').show();
        $('#amountoff_div').hide();
    });

    $(document).on('click', '#no_sales', function(){
      $.ajax({
          type: 'ajax',
          url: '<?php echo base_url("cashier/no_sales"); ?>',
          dataType: 'json',
          success: function(data) {
              //console.log(data);
          },
      });
      return false;
    });

</script>
<script>
//always outside imp
function ValidateCustomerEmail(email_id) {
    // var email_id = $("#email").val();
    var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    if (!expr.test(email_id)) {
        $('#cemail_err').html('Please enter valid email').show();
        return false;
    }else{
        $('#cemail_err').html("").show();
    }
}
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js" ></script> -->
<script src="<?php echo base_url(); ?>assets/style/html2pdf.bundle.min.js"></script>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<script>
    $('#generatePDF').click(function() {
        const invoice = document.getElementById("downloadPDF");
        var opt = {
            margin: 3,
            filename: 'cash_drop.pdf',
            image: {
                type: 'jpeg',
                quality: 0.98
            },
            htms2canvas: {
                scale: 2
            },
            jsPDF: {
                unit: 'in',
                format: 'letter',
                orientation: 'portrait'
            }
        };
        html2pdf().from(invoice).set(opt).save();
    });
</script>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet"/> -->
<link href="<?php echo base_url(); ?>assets/style/jquery-ui.css" rel="stylesheet" />
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/style/jquery-ui.min.js"></script>
<script>
    $("#read_barcode_POS").autocomplete({
        source: function(request, response) {
            //var searchtxt = extractLast(request.term);
            var size_i = $('#select_size').val();

            $.ajax({
                type: 'ajax',
                method: 'post',
                url: "<?= base_url("cashier/Cashier/fetch_product") ?>",
                dataType: "json",
                data: {
                    searchtxt: request.term,
                    size_i: size_i
                },
                success: function(data) {
                    response(data);
                    //console.log(data)

                }

            });
        },
        select: function(event, ui) {
            //console.log('selectred vbal is ', ui.item.case_UPC)
            $("#read_barcode_POS").val(ui.item.case_UPC);
            var e = $.Event("keypress");
            e.which = 13;
            $("#read_barcode_POS").trigger(e);
            // $('#product_seleted_name').append('<div id="added_product_div_' + ui.item.value + '">' + ui.item.label + '<span style="color: red;margin-left: 10px;" class="delete_product" id="' + ui.item.value + '">X</span><input type="hidden" class="form-control" name="product_id[]" id="product_id_select" value="' + ui.item.value + '" /></div>');
            // $('#product_name').val('');
            // $('#product_name').focus();

            return false;
        }

    }).data("ui-autocomplete")._renderItem = function(ul, item) {
        //console.log('ul is ****', ul)
        var $li = $('<li>'),
            $img = $('<img >');

        let resThumb = item.image_thumb;
        resThumb = resThumb.substring(2, resThumb.length);
        resThumb = "<?php echo base_url(); ?>" + resThumb;

        $img.attr({
            src: resThumb,
            alt: item.label,
            class: 'sm-ico'
        });

        $li.attr('data-value', item.label);
        $li.append('<a href="#">');
        $li.find('a').append($img).append(item.label);

        return $li.appendTo(ul);
    };


    // check online offline connection

    //function checkOnline() {
    //setTimeout("doOnlineCheck()", 2000);
    //}

    var intervalId = window.setInterval(function() {
        doOnlineCheck();
    }, 5000);

    function doOnlineCheck() {

        var ifConnected = window.navigator.onLine;
        if (ifConnected) {
            //console.log('Connection available');
        } else {
            //console.log('Connection not available');
        }

    }
    $(document).on('click', 'body', function(e) {

        var container = $(".keyboard");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            if (!$("input").is(":focus")) {
                // //console.log("Outerrrrr");
                KeyboardNum.close()
                Keyboard.close()

            }
        } else {
            //console.log("Inerrrrr");
        }
    });


    $(document).on('click', '.is_container_deposit', function(e) {
        var Applicable_CRV = $(this).is(':checked') ? 1 : 0;
        if(Applicable_CRV == 1) {
            $("#custom_product_size").show();
        } else {
            $("#custom_product_size").hide();
        }
    });

    $(document).on('click', '#no_sales', function(e) {
        insert_kpi_data(3,1);
    });

    function KPIClearTransaction() {
        clearTransaction();
        insert_kpi_data(2,1);
        location.reload();
    }

    function insert_kpi_data(kpi_type,kpi_value) {

        $.ajax({
            type: "POST",
            url: '<?= base_url("cashier/Cashier/insert_kpi_data") ?>',
            async: false,
            data: {
                kpi_type: kpi_type,
                kpi_value: kpi_value
            },
            success: function(data) {
            }
        });
    }
</script>
<div class="loader"></div>

<style type="text/css">
    .loader {
        display: none;
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 999999999;
        width: 50px;
        height: 50px;
        margin: -76px 0 0 -76px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #ff5c00;
        border-bottom: 16px solid #4494de;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0px;
            opacity: 1
        }
    }

    @keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }

        to {
            bottom: 0;
            opacity: 1
        }
    }

    #overlay {
        position: fixed;
        width: 100%;
        height: 100%;
        background: black url(spinner.gif) center center no-repeat;
        opacity: 0.8;
        z-index: 9999999;
    }
</style>
</body>
