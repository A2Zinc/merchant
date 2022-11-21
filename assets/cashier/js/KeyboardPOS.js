(function($){
  function Key(params) {
  if (Object.prototype.toString.call(params) == "[object Arguments]") {
    this.keyboard = params[0];
  } else {
    this.keyboard = params;
  }

  this.$key = $("<li/>");
  this.current_value = null;
}

Key.prototype.render = function() {
  if (this.id) {
    this.$key.attr("id", this.id);
  }

  return this.$key;
};

Key.prototype.setCurrentValue = function() {
  if (this.keyboard.upperRegister()) {
    this.current_value = this.preferences.u ? this.preferences.u : this.default_value;
  } else {
    this.current_value = this.preferences.d ? this.preferences.d : this.default_value;
  }
  this.$key.text(this.current_value);
};

Key.prototype.setCurrentAction = function() {
  var _this = this;

  this.$key.unbind("click.mlkeyboard");
  this.$key.bind("click.mlkeyboard", function(){
    _this.keyboard.keep_focus = true;

    if (typeof(_this.preferences.onClick) === "function") {
      _this.preferences.onClick(_this);
    } else {
      _this.defaultClickAction();
    }
  });
};

Key.prototype.defaultClickAction = function() {
  this.keyboard.destroyModifications();

  if (this.is_modificator) {
    this.keyboard.deleteChar();
    this.keyboard.printChar(this.current_value);
  } else {
    this.keyboard.printChar(this.current_value);
  }

  if (this.preferences.m && Object.prototype.toString.call(this.preferences.m) === '[object Array]') {
    this.showModifications();
  }

  if (this.keyboard.active_shift) this.keyboard.toggleShift(false);
};

Key.prototype.showModifications = function() {
  var _this = this;

  this.keyboard.modifications = [];

  $.each(this.preferences.m, function(i, modification) {
    var key = new Key(_this.keyboard);
    key.is_modificator = true;
    key.preferences = modification;
    _this.keyboard.modifications.push(key);
  });

  this.keyboard.showModifications(this);
};

Key.prototype.toggleActiveState = function() {
  if (this.isActive()) {
    this.$key.addClass('active');
  } else {
    this.$key.removeClass('active');
  }
};

Key.prototype.isActive = function() {
  return false;
};
  function KeyDelete() {
  Key.call(this, arguments);

  this.id = "mlkeyboard-backspace";
  this.default_value = 'Backspace';
}

KeyDelete.prototype = new Key();
KeyDelete.prototype.constructor = KeyDelete;

KeyDelete.prototype.defaultClickAction = function() {
  this.keyboard.deleteChar();
};
  function KeyTab() {
  Key.call(this, arguments);

  this.id = "mlkeyboard-tab";
  this.default_value = 'tab';
}

KeyTab.prototype = new Key();
KeyTab.prototype.constructor = KeyTab;

KeyTab.prototype.defaultClickAction = function() {
  
  $(":input[type=text],input[type=url],input[type=email],input[type=password],textarea").eq($(":input[type=text],input[type=url],input[type=email],input[type=password],textarea").index(this.keyboard.$current_input)+1).focus();
}; 

  function KeyCapsLock() {
  Key.call(this, arguments);

  this.id = "mlkeyboard-capslock";
  this.default_value = 'caps lock';
}

KeyCapsLock.prototype = new Key();
KeyCapsLock.prototype.constructor = KeyCapsLock;

KeyCapsLock.prototype.isActive = function() {
  return this.keyboard.active_caps;
};

KeyCapsLock.prototype.defaultClickAction = function() {
  this.keyboard.toggleCaps();
};

  function KeyReturn() {
  Key.call(this, arguments);

  this.id = "mlkeyboard-return";
  this.default_value = 'Enter';
}

KeyReturn.prototype = new Key();
KeyReturn.prototype.constructor = KeyReturn;

KeyReturn.prototype.defaultClickAction = function() {
  var e = $.Event("keypress", {
    which: 13,
    keyCode: 13
  });
  this.keyboard.$current_input.trigger(e);
};
  function KeyShift() {
  Key.call(this, arguments);

  this.id = "mlkeyboard-"+arguments[1]+"-shift";
  this.default_value = 'shift';
}

KeyShift.prototype = new Key();
KeyShift.prototype.constructor = KeyShift;

KeyShift.prototype.isActive = function() {
  return this.keyboard.active_shift;
};

KeyShift.prototype.defaultClickAction = function() {
  this.keyboard.toggleShift();
};

function Keyhide(){
  Key.call(this, arguments);

  this.id = "mlkayboard-hide";
  this.default_value ="hide";
}

Keyhide.prototype = new Key();
Keyhide.prototype.constructor = Keyhide;

Keyhide.prototype.defaultClickAction = function() {
  this.keyboard.hideKeyboard(); 
  // document.getElementById('mlkeyboard').style.display = 'none';
  
  
 };


function Keycopy(){
  Key.call(this, arguments);
  
  this.id ="mlkeyboard-copy";
  this.default_value = "copy";
}

Keycopy.prototype = new Key();
Keycopy.prototype.constructor = Keycopy;

Keycopy.prototype.defaultClickAction = function() {
  // const textcopy = $("input[type=text]")[0]; 
  var textcopy = document.querySelectorAll("input[type=text]");   
  for(var q = 0; q < textcopy.length; q++){
    var cpyxt = textcopy[q];         
    cpyxt.select();
    navigator.clipboard.writeText(cpyxt.value);           
    alert("Copied the text: "+cpyxt.val());   
  }
};

function Keypaste(){
  Key.call(this, arguments);
  
  this.id ="mlkeyboard-paste";
  this.default_value = "paste";
}

Keypaste.prototype = new Key();
Keypaste.prototype.constructor = Keypaste;

Keypaste.prototype.defaultClickAction = function() {

  const pasteText = $('input[type=text]')[0];
  pasteText.value ='';    
  navigator.clipboard.readText().then((text)=>{    
  pasteText.value = text;
  })

  // var pasteText = document.querySelectorAll("input[type=text]");   
  //   for(var n = 0; n < pasteText.length; n++){
  //     var pstxt = pasteText[n]; 
  //     pstxt.value ='';
  //     navigator.clipboard.readText().then((text)=>{    
  //     pstxt.value = text;
  //     });  
  // }
};

  function KeySpace() {
  Key.call(this, arguments);

  this.id = "mlkeyboard-space";
  this.default_value = ' ';
}

KeySpace.prototype = new Key();
KeySpace.prototype.constructor = KeySpace; 

function Keyleft() {
  Key.call(this, arguments);

  this.id = "mlkeyboard-left-arrow";
  this.default_value = '>';
}

Keyleft.prototype = new Key();
Keyleft.prototype.constructor = Keyleft;

Keyleft.prototype.defaultClickAction = function() {
  
};

function Keyright() {
  Key.call(this, arguments);

  this.id = "mlkeyboard-right-arrow";
  this.default_value = '<';
}

Keyright.prototype = new Key();
Keyright.prototype.constructor = Keyright; 

  var KEYS_COUNT = 57;
function Keyboard(selector, options){
  this.defaults = {
    layout: 'en_US',
    active_shift: true,
    active_caps: false,
    is_hidden: true,
    open_speed: 300,
    close_speed: 100,
    show_on_focus: true,
    hide_on_blur: true,
    trigger: undefined,
    enabled: true
  };

  this.global_options = $.extend({}, this.defaults, options);
  this.options = $.extend({}, {}, this.global_options);

  this.keys = [];

  this.$keyboard = $("<div/>").attr("id", "mlkeyboard");
  this.$modifications_holder = $("<ul/>").addClass('mlkeyboard-modifications');
  this.$current_input = $(selector);
}

Keyboard.prototype.init = function() {
  this.$keyboard.append(this.renderKeys());
  this.$keyboard.append(this.$modifications_holder);
  $("body").append(this.$keyboard);

  if (this.options.is_hidden) this.$keyboard.hide();

  this.setUpKeys();
};

Keyboard.prototype.setUpKeys = function() {
  var _this = this;

  this.active_shift = this.options.active_shift;
  this.active_caps = this.options.active_caps;

  $.each(this.keys, function(i, key){

    key.preferences = mlKeyboard.layouts[_this.options.layout][i];
    key.setCurrentValue();
    key.setCurrentAction();
    key.toggleActiveState();
  });
};

Keyboard.prototype.renderKeys = function() {
  var $keys_holder = $("<ul/>");

  for (var i = 0; i<= KEYS_COUNT; i++) {
    var key;

    switch(i) {
    case 13:
      key = new KeyDelete(this);
      break;
    case 14:
      key = new KeyTab(this);
      break;
    case 28:
      key = new KeyCapsLock(this);
      break;
    case 40:
      key = new KeyReturn(this);
      break;
    case 41:
      key = new KeyShift(this, "left");
      break;      
    case 52:
      key = new Keyhide(this);
      break;   
    case 53:
        key = new Keycopy(this);
        break; 
    case 54:
        key = new Keypaste(this);
      break; 
    case 55:
        key = new KeySpace(this);
      break; 
    case 56:
        key = new Keyright(this);
        break;   
    case 57:
          key = new Keyleft(this);
          break;
    default:
        key = new Key(this);
      break;
    }

    this.keys.push(key);
    $keys_holder.append(key.render());
  }

  return $keys_holder;
};

Keyboard.prototype.setUpFor = function($input) {
  var _this = this;

  if (this.options.show_on_focus) {
    $input.bind('focus', function() { _this.showKeyboard($input); });
  }

  if (this.options.hide_on_blur) {
    $input.bind('blur', function() {
      var VERIFY_STATE_DELAY = 500;

      // Input focus changes each time when user click on keyboard key
      // To prevent momentary keyboard collapse input state verifies with timers help
      // Any key click action set current inputs keep_focus variable to true
      clearTimeout(_this.blur_timeout);

      _this.blur_timeout = setTimeout(function(){
        if (!_this.keep_focus) { _this.hideKeyboard(); }
        else { _this.keep_focus = false; }
      }, VERIFY_STATE_DELAY);
    });
  }

  if (this.options.trigger) {
    var $trigger = $(this.options.trigger);
    $trigger.bind('click', function(e) {
      e.preventDefault();

      if (_this.isVisible) { _this.hideKeyboard(); }
      else {
        _this.showKeyboard($input);
        $input.focus();
      }
    });
  }
};

Keyboard.prototype.showKeyboard = function($input) {
  var input_changed = !this.$current_input || $input[0] !== this.$current_input[0];

  if (!this.keep_focus || input_changed) {
    if (input_changed) this.keep_focus = true;

    this.$current_input = $input;
    this.options = $.extend({}, this.global_options, this.inputLocalOptions());

    if (!this.options.enabled) {
      this.keep_focus = false;
      return;
    }

    if (this.$current_input.val() !== '') {
      this.options.active_shift = false;
    }
    this.dragboard(); 
    this.setUpKeys();

    if (this.options.is_hidden) {
      this.isVisible = true;
      this.$keyboard.slideDown(this.options.openSpeed);
    }
  }
};

//  leave input keyboard will hide
Keyboard.prototype.hideKeyboard = function() {
  if (this.options.is_hidden) {
    this.isVisible = false;       
    this.$keyboard.slideUp(this.options.closeSpeed);
  }
};

Keyboard.prototype.inputLocalOptions = function() {
  var options = {};
  for (var key in this.defaults) {
    var input_option = this.$current_input.attr("data-mlkeyboard-"+key);
    if (input_option == "false") {
      input_option = false;
    } else if (input_option == "true") {
      input_option = true;
    }
    if (typeof input_option !== 'undefined') { options[key] = input_option; }
  }

  return options;
};

Keyboard.prototype.printChar = function(char) {
  var selStart = this.$current_input[0].selectionStart;
  var selEnd = this.$current_input[0].selectionEnd;
  var textAreaStr = this.$current_input.val();
  var value = textAreaStr.substring(0, selStart) + char + textAreaStr.substring(selEnd);

  this.$current_input.val(value).focus();
  this.$current_input[0].selectionStart = selStart+1, this.$current_input[0].selectionEnd = selStart+1;

};

Keyboard.prototype.deleteChar = function() {
  var selStart = this.$current_input[0].selectionStart;
  var selEnd = this.$current_input[0].selectionEnd;

  var textAreaStr = this.$current_input.val();
  var after = textAreaStr.substring(0, selStart-1);
  var value = after + textAreaStr.substring(selEnd);
  this.$current_input.val(value).focus();
  this.$current_input[0].selectionStart = selStart-1, this.$current_input[0].selectionEnd = selStart-1;

};

Keyboard.prototype.showModifications = function(caller) {
  var _this = this,
      holder_padding = parseInt(_this.$modifications_holder.css('padding'), 10),
      top, left, width;

  $.each(this.modifications, function(i, key){
    _this.$modifications_holder.append(key.render());

    key.setCurrentValue();
    key.setCurrentAction();
  });

  // TODO: Remove magic numbers
  width = (caller.$key.width() * _this.modifications.length) + (_this.modifications.length * 6);
  top = caller.$key.position().top - holder_padding;
  left = caller.$key.position().left - _this.modifications.length * caller.$key.width()/2;

  this.$modifications_holder.one('mouseleave', function(){
    _this.destroyModifications();
  });

  this.$modifications_holder.css({
    width: width,
    top: top,
    left: left
  }).show();
};

Keyboard.prototype.destroyModifications = function() {
  this.$modifications_holder.empty().hide();
};

Keyboard.prototype.upperRegister = function() {
  return ((this.active_shift && !this.active_caps) || (!this.active_shift && this.active_caps));
};

Keyboard.prototype.toggleShift = function(state) {
  this.active_shift = state ? state : !this.active_shift;
  this.changeKeysState();
};

Keyboard.prototype.toggleCaps = function(state) {
  this.active_caps = state ? state : !this.active_caps;
  this.changeKeysState();
};

Keyboard.prototype.changeKeysState = function() {
  $.each(this.keys, function(_, key){
    key.setCurrentValue();
    key.toggleActiveState();
  });
};

Keyboard.prototype.setCaretPosition = function(ctrl, pos) { 
    // Modern browsers
    if (ctrl.setSelectionRange) {
      ctrl.focus();
      ctrl.setSelectionRange(pos, pos);
    
    // IE8 and below
    } else if (ctrl.createTextRange) {
      var range = ctrl.createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }  
  
};

// drag function**** start***********
Keyboard.prototype.dragboard = function() {

  //Make the DIV element draggagle:
dragElement(document.getElementById("mlkeyboard"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id)) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id).onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";

  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

};

// drag function**** end***********

  $.fn.mlKeyboard = function(options) {
    var keyboard = new Keyboard(this.selector, options);
    keyboard.init();

    this.each(function(){
      keyboard.setUpFor($(this));
    });
  };

})(jQuery);

var mlKeyboard = mlKeyboard || {layouts: {}};

mlKeyboard.layouts.en_US = [
  {d: '`', u: '~'},
  {d: '1',u: '!'},
  {d: '2',u: '@'},
  {d: '3',u: '#'},
  {d: '4',u: '$'},
  {d: '5',u: '%'},
  {d: '6',u: '^'},
  {d: '7',u: '&'},
  {d: '8',u: '*'},
  {d: '9',u: '('},
  {d: '0',u: ')'},
  {d: '-',u: '_'},
  {d: '=',u: '+'},
  {}, // Delete
  {}, // Tab
  {d: 'q',u: 'Q'},
  {d: 'w',u: 'W'},
  {d: 'e',u: 'E'},
  {d: 'r',u: 'R'},
  {d: 't',u: 'T'},
  {d: 'y',u: 'Y'},
  {d: 'u',u: 'U'},
  {d: 'i',u: 'I'},
  {d: 'o',u: 'O'},
  {d: 'p',u: 'P'},
  {d: '[',u: '}'},
  {d: ']',u: '{'},
  {d: '\\',u: '|'},
  {}, // Caps lock
  {d: 'a',u: 'A'},
  {d: 's',u: 'S'},
  {d: 'd',u: 'D'},
  {d: 'f',u: 'F'},
  {d: 'g',u: 'G'},
  {d: 'h',u: 'H'},
  {d: 'j',u: 'J'},
  {d: 'k',u: 'K'},
  {d: 'l',u: 'L'},
  {d: ';',u: ':'},
  {d: '\'',u: '"'},
  {}, // Return
  {}, // Left shift
  {d: 'z',u: 'Z'},
  {d: 'x',u: 'X'},
  {d: 'c',u: 'C'},
  {d: 'v',u: 'V'},
  {d: 'b',u: 'B'},
  {d: 'n',u: 'N'},
  {d: 'm',u: 'M'},
  {d: ',',u: '<'},
  {d: '.',u: '>'},
  {d: '/',u: '?'},
  {}, // Right shift
  {}, // Right arrow
  {}, // left arrow
  {}, // Space
  {}, // copy
  {}  // paste
];



// ***************************Number Keyboard start here************************************

(function($){
  function Key(paramnum) {
  if (Object.prototype.toString.call(paramnum) == "[object Arguments]") {
    this.keyboard = paramnum[0];
  } else {
    this.keyboard = paramnum;
  }

  this.$key = $("<li/>");
  this.current_value = null;
}

Key.prototype.render = function() {
  if (this.id) {
    this.$key.attr("id", this.id);
  }

  return this.$key;
};

Key.prototype.setCurrentValue = function() {
  if (this.keyboard.upperRegister()) {
    this.current_value = this.preferences.u ? this.preferences.u : this.default_value;
  } else {
    this.current_value = this.preferences.d ? this.preferences.d : this.default_value;
  }
  this.$key.text(this.current_value);
};

Key.prototype.setCurrentAction = function() {
  var _this = this;

  this.$key.unbind("click.mlkeyboardnum");
  this.$key.bind("click.mlkeyboardnum", function(){
    _this.keyboard.keep_focus = true;

    if (typeof(_this.preferences.onClick) === "function") {
      _this.preferences.onClick(_this);
    } else {
      _this.defaultClickAction();
    }
  });
};

Key.prototype.defaultClickAction = function() {
  this.keyboard.destroyModifications();

  if (this.is_modificator) {
    this.keyboard.deleteChar();
    this.keyboard.printChar(this.current_value);
  } else {
    this.keyboard.printChar(this.current_value);
  }

  if (this.preferences.m && Object.prototype.toString.call(this.preferences.m) === '[object Array]') {
    this.showModifications();
  }

  if (this.keyboard.active_shift) this.keyboard.toggleShift(false);
};

Key.prototype.showModifications = function() {
  var _this = this;

  this.keyboard.modifications = [];

  $.each(this.preferences.m, function(i, modification) {
    var key = new Key(_this.keyboard);
    key.is_modificator = true;
    key.preferences = modification;
    _this.keyboard.modifications.push(key);
  });

  this.keyboardnum.showModifications(this);
};

Key.prototype.toggleActiveState = function() {
  if (this.isActive()) {
    this.$key.addClass('active');
  } else {
    this.$key.removeClass('active');
  }
};

Key.prototype.isActive = function() {
  return false;
};
  function KeyDelete() {
  Key.call(this, arguments);

  this.id = "mlkeyboardnum-backspace";
  this.class = "fas";
  // this.default_value = "";
  
 
}

KeyDelete.prototype = new Key();
KeyDelete.prototype.constructor = KeyDelete;

KeyDelete.prototype.defaultClickAction = function() {
  this.keyboard.deleteChar();
};
function KeyTab() {
  Key.call(this, arguments);

  this.id = "mlkeyboardnum-tab";
  this.default_value = 'Tab';
}

KeyTab.prototype = new Key();
KeyTab.prototype.constructor = KeyTab;

KeyTab.prototype.defaultClickAction = function() {
  
  $(":input[type=tel]").eq($(":input[type=tel]").index(this.keyboard.$current_input)+1).focus();

};

  function KeyReturn() {
  Key.call(this, arguments);

  this.id = "mlkeyboardnum-return";
  this.default_value = 'Enter';
}

KeyReturn.prototype = new Key();
KeyReturn.prototype.constructor = KeyReturn;

KeyReturn.prototype.defaultClickAction = function() {
  var e = $.Event("keypress", {
    which: 13,
    keyCode: 13
  });
  this.keyboard.$current_input.trigger(e);
};


  var KEYS_COUNT = 14;
function Keyboard(selector, options){
  this.defaults = {
    layout: 'en_US',
    active_shift: true,
    active_caps: false,
    is_hidden: true,
    open_speed: 300,
    close_speed: 100,
    show_on_focus: true,
    hide_on_blur: true,
    trigger: undefined,
    enabled: true
  };

  this.global_options = $.extend({}, this.defaults, options);
  this.options = $.extend({}, {}, this.global_options);

  this.keys = [];

  this.$keyboard = $("<div/>").attr("id", "mlkeyboardnum");
  this.$modifications_holder = $("<ul/>").addClass('mlkeyboardnum-modifications');
  this.$current_input = $(selector);
}

Keyboard.prototype.init = function() {
  this.$keyboard.append(this.renderKeys());
  this.$keyboard.append(this.$modifications_holder);
  $("body").append(this.$keyboard);

  if (this.options.is_hidden) this.$keyboard.hide();

  this.setUpKeys();
 
};


// Keyboardnum.prototype.hidekeynum = function() {
 
 
// };

Keyboard.prototype.setUpKeys = function() {
  var _this = this;

  this.active_shift = this.options.active_shift;
  this.active_caps = this.options.active_caps;

  $.each(this.keys, function(i, key){

    key.preferences = mlkeyboardnum.layouts[_this.options.layout][i];
    key.setCurrentValue();
    key.setCurrentAction();
    key.toggleActiveState();
  });
};

Keyboard.prototype.renderKeys = function() {
  var $keys_holder = $("<ul/>");

  for (var i = 0; i<= KEYS_COUNT; i++) {
    var key;

    switch(i) {    
    case 12:
      key = new KeyTab(this);
      break; 
    case 13:
      key = new KeyReturn(this);
      break;
    case 14:
      key = new KeyDelete(this);
      break;
    // case 14:
    //     key = new Keyhide(this);
    //     break;     
         
    default:
        key = new Key(this);
      break;
    }

    this.keys.push(key);
    $keys_holder.append(key.render());
  }

  return $keys_holder;
};

Keyboard.prototype.setUpFor = function($input) {
  var _this = this;

  if (this.options.show_on_focus) {
    $input.bind('focus', function() { _this.showKeyboard($input); });
  }

  if (this.options.hide_on_blur) {
    $input.bind('blur', function() {
      var VERIFY_STATE_DELAY = 500;

      // Input focus changes each time when user click on keyboard key
      // To prevent momentary keyboard collapse input state verifies with timers help
      // Any key click action set current inputs keep_focus variable to true
      clearTimeout(_this.blur_timeout);

      _this.blur_timeout = setTimeout(function(){
        if (!_this.keep_focus) { _this.hideKeyboard(); }
        else { _this.keep_focus = false; }
      }, VERIFY_STATE_DELAY);
    });
  }

  if (this.options.trigger) {
    var $trigger = $(this.options.trigger);
    $trigger.bind('click', function(e) {
      e.preventDefault();

      if (_this.isVisible) { _this.hideKeyboard(); }
      else {
        _this.showKeyboard($input);
        $input.focus();
      }
    });
  }
};


Keyboard.prototype.showKeyboard = function($input) {
  var input_changed = !this.$current_input || $input[0] !== this.$current_input[0];

  if (!this.keep_focus || input_changed) {
    if (input_changed) this.keep_focus = true;

    this.$current_input = $input;
    this.options = $.extend({}, this.global_options, this.inputLocalOptions());

    if (!this.options.enabled) {
      this.keep_focus = false;
      return;
    }

    if (this.$current_input.val() !== '') {
      this.options.active_shift = false;
    }
    this.dragboard(); 
    this.setUpKeys();

    if (this.options.is_hidden) {
      this.isVisible = true;
      this.$keyboard.slideDown(this.options.openSpeed);
    }
  }
};

//  leave input keyboard will hide
Keyboard.prototype.hideKeyboard = function() {
  if (this.options.is_hidden) {
    this.isVisible = false;       
    this.$keyboard.slideUp(this.options.closeSpeed);
  }
};

Keyboard.prototype.inputLocalOptions = function() {
  var options = {};
  for (var key in this.defaults) {
    var input_option = this.$current_input.attr("data-mlkeyboardnum-"+key);
    if (input_option == "false") {
      input_option = false;
    } else if (input_option == "true") {
      input_option = true;
    }
    if (typeof input_option !== 'undefined') { options[key] = input_option; }
  }

  return options;
};

Keyboard.prototype.printChar = function(char) {
  var selStart = this.$current_input[0].selectionStart;
  var selEnd = this.$current_input[0].selectionEnd;
  var textAreaStr = this.$current_input.val();
  var value = textAreaStr.substring(0, selStart) + char + textAreaStr.substring(selEnd);

  this.$current_input.val(value).focus();
  this.$current_input[0].selectionStart = selStart+1, this.$current_input[0].selectionEnd = selStart+1;

};

Keyboard.prototype.deleteChar = function() {
  var selStart = this.$current_input[0].selectionStart;
  var selEnd = this.$current_input[0].selectionEnd;

  var textAreaStr = this.$current_input.val();
  var after = textAreaStr.substring(0, selStart-1);
  var value = after + textAreaStr.substring(selEnd);
  this.$current_input.val(value).focus();
  this.$current_input[0].selectionStart = selStart-1, this.$current_input[0].selectionEnd = selStart-1;

};

Keyboard.prototype.showModifications = function(caller) {
  var _this = this,
      holder_padding = parseInt(_this.$modifications_holder.css('padding'), 10),
      top, left, width;

  $.each(this.modifications, function(i, key){
    _this.$modifications_holder.append(key.render());

    key.setCurrentValue();
    key.setCurrentAction();
  });

  // TODO: Remove magic numbers
  width = (caller.$key.width() * _this.modifications.length) + (_this.modifications.length * 6);
  top = caller.$key.position().top - holder_padding;
  left = caller.$key.position().left - _this.modifications.length * caller.$key.width()/2;

  this.$modifications_holder.one('mouseleave', function(){
    _this.destroyModifications();
  });

  this.$modifications_holder.css({
    width: width,
    top: top,
    left: left
  }).show();
};

Keyboard.prototype.destroyModifications = function() {
  this.$modifications_holder.empty().hide();
};

Keyboard.prototype.upperRegister = function() {
  return ((this.active_shift && !this.active_caps) || (!this.active_shift && this.active_caps));
};

Keyboard.prototype.toggleShift = function(state) {
  this.active_shift = state ? state : !this.active_shift;
  this.changeKeysState();
};

Keyboard.prototype.toggleCaps = function(state) {
  this.active_caps = state ? state : !this.active_caps;
  this.changeKeysState();
};

Keyboard.prototype.changeKeysState = function() {
  $.each(this.keys, function(_, key){
    key.setCurrentValue();
    key.toggleActiveState();
  });
};

// drag function**** start***********
Keyboard.prototype.dragboard = function() {

  //Make the DIV element draggagle:
dragElement(document.getElementById("mlkeyboardnum"));

function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id)) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id).onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }

  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }

  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";

  }

  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}

};

// drag function**** end***********

  $.fn.mlkeyboardnum = function(options) {
    var keyboard = new Keyboard(this.selector, options);
    keyboard.init();

    this.each(function(){
      keyboard.setUpFor($(this));
    });
  };

})(jQuery);

var mlkeyboardnum = mlkeyboardnum || {layouts: {}};

mlkeyboardnum.layouts.en_US = [

  {d: '1',u: '1'},
  {d: '2',u: '2'},
  {d: '3',u: '3'},
  {d: '4',u: '4'},
  {d: '5',u: '5'},
  {d: '6',u: '6'},
  {d: '7',u: '7'},
  {d: '8',u: '8'},
  {d: '9',u: '9'}, 
  {d: '.',u: '.'},
  {d: '0',u: '0'},
  {d: ',',u: ','},
  {}, // Delete
  {}, // Tab 
  {}, // Return
 
 
];




