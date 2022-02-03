<style>
  .modal-body {
    padding: 0.5rem !important;
}
  .p1{
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }
  .p2{
    margin-top: 0.5rem !important;
    margin-bottom: 0.5rem !important;
  }
  .customcardinput {
    height: 45px !important;
}
.tooltips {
  position: relative;
  /* display: inline-block; */
  border-bottom: 1px dotted black;
}
#tbl_leave > tr > td {
  font-size: 18px;
}
#leave_status > thead th {
  font-size: 20px;
}
#cash_adv > thead th {
  font-size: 20px;
}

#tbl_cashadv > tr > td {
  font-size: 18px;
}
.tooltips .tooltipstext {
  visibility: hidden;
  width: 400px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  /* margin-left: -60px; */
  margin-left: -201px;
  opacity: 0;
  transition: opacity 0.3s;
  z-index: 9999;
}

.tooltips .tooltipstext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

.tooltips:hover .tooltipstext {
  visibility: visible;
  opacity: 1;
}
.keyboard {
    position: fixed;
    left: 0;
    bottom: 0;
    width: 100%;
    padding: 5px 0;
    background:#18102f;
    box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
    user-select: none;
    transition: bottom 0.4s;
    z-index:999999999999999999999999999;
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
.cd-keys{
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
.keyboard__key.numonekey{
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
.keyboard__key.numonekey{
    width: 125px;
     max-width: unset;
}
.keyboard.numone{

    width: 405px;
 right: 0;
 left: unset;

    height: fit-content!important;
}
.moveup{
  bottom: 8em;
}

  @media screen and (min-width: 1024px) {
    .notify_icon {
      margin-left:53%;
      padding-left: 10px;
      width: 60px;
      padding-top: 5px;
      height: 55px;
      margin-right: 20px;
    }
 }
    @media only screen and (min-width: 1440px) {
        .notify_icon {
          margin-left:69%;
          padding-left: 10px;
          width: 60px;
          padding-top: 5px;
          height: 55px;
          margin-right: 20px;
        }
  }

/* nav {
    display: flex;
    align-items: center;
    background: #AB47BC;
    height: 60px;
    position: relative;
    border-bottom: 1px solid #495057
}

.icon {
    cursor: pointer;
    margin-right: 50px;
    line-height: 60px
}

.icon span {
    background: #f00;
    padding: 7px;
    border-radius: 50%;
    color: #fff;
    vertical-align: top;
    margin-left: -25px
}
.icon img {
    display: inline-block;
    width: 50px;

}

.icon:hover {
    opacity: .7
} */

/* .logo {
    flex: 1;
    margin-left: 50px;
    color: #eee;
    font-size: 20px;
    font-family: monospace
} */

.notifications {
    width: 300px;
    height: 0px;
    opacity: 0;
    position: absolute;
    top: 63px;
    right: 62px;
    border-radius: 5px 0px 5px 5px;
    background-color: #fff;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    overflow-y: scroll;
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
}

.notifications h2 {
    font-size: 14px;
    padding: 10px;
    border-bottom: 1px solid #eee;
    color: #999
}

.notifications h2 span {
    color: #f00;
    float:right
}

.notifications-item {
    display: flex;
    border-bottom: 1px solid #eee;
    padding: 6px 9px;
    margin-bottom: 0px;
    cursor: pointer
}

.notifications-item:hover {
    background-color: #eee
}

.notifications-item img {
    display: block;
    width: 50px;
    height: 50px;
    margin-right: 9px;
    border-radius: 50%;
    margin-top: 2px
}

.notifications-item .text h4 {
    color: #777;
    font-size: 16px;
    margin-top: 3px
}

.notifications-item .text p {
    color: #aaa;
    font-size: 12px
}


/* Chat containers */
.container-chat {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

/* Darker chat container */
.chat-darker {
  border-color: #ccc;
  background-color: #ddd;
}

/* Clear floats */
.container-chat::after {
  content: "";
  clear: both;
  display: table;
}

/* Style images */
.container-chat img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
  margin-top: 2%;
}

/* Style the right image */
.container-chat img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
  margin-top: 2%;
}

/* Style time text */
.time-right {
  float: right;
  color: #bf1c1c;
}

/* Style time text */
.time-left {
  float: left;
  color: #bf1c1c;
}

.ScrollStyle1
{
    max-height: 290px;
    overflow-y: scroll;
}
</style>
<script>$(function(){
    $('.x').on('click', function(){
        $('#custom_product_name').val('');
        $('#product_upc').val('');
        $('#custom_product_price').val('');
        $('#custom_product_name').val('');
        $('#product_lookup_description').val('');

        KeyboardNum.close()
        Keyboard.close()
    });

});
function getKeyL(x,y) {
    // console.log(x,y,'x,y')
    if(y==null){
   return  x._createKeys('full');
}
else{
    return  x._createKeys('half');
}

}
  function resetKeebPos(){
    let a = $(".keyboard.numone").offset().top;
    let a2 =  $(".keyboard.numone").offset().bottom;
    let a3 =  $(".keyboard.numone").offset().left;
    let a4 =  $(".keyboard.numone").offset().right;
    console.log(a,a2,a3,a4,'all p[os')
    $(".keyboard.numone").css('right','0');
    $(".keyboard.numone").css('left','auto');
    $(".keyboard.numone").css('bottom','0');
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
        capsLock: false
    },

    init() {
        // Create main elements
        this.elements.main = document.createElement("div");
        this.elements.keysContainer = document.createElement("div");

        // Setup main elements
        this.elements.main.classList.add("keyboard", "keyboard--hidden","numone");
        this.elements.keysContainer.classList.add("keyboard__keys");
        let x = this;

        this.elements.keysContainer.appendChild(this._createKeys());

        this.elements.keys = this.elements.keysContainer.querySelectorAll(".keyboard__key");

        // Add to DOM
        this.elements.main.appendChild(this.elements.keysContainer);
        document.body.appendChild(this.elements.main);

        // Automatically use keyboard for elements with .use-keyboard-input
        document.querySelectorAll(".use-keyboard-input-num").forEach(element => {

            console.log(element,'xxx')
            element.addEventListener("focus", () => {
             Keyboard.close()
             let ww = element.classList
             console.log('run this',ww)
               $('.modal').addClass('moveup');
               $('.modal-dialog').addClass('moveup');
               $('.keyboard.numone').addClass("numKeyboardPositioner");
                this.open(element.value, currentValue => {
                  console.log('this',element)
                    if(element.id === 'custom_product_price'){
                        element.value = get_float_value(currentValue)
                    }
                    if(element.id === 'product_lookup_description'){
                        element.value =  currentValue.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1')
                    }
                    if( element.classList.contains('usefloathere')){

                      element.value = get_float_value(currentValue)
                    }
                    else{
                    element.value = currentValue;
                    }
                    // element.value = get_float_value(element.value)

                });
            });
        });



    },

    _createKeys() {
        const fragment = document.createDocumentFragment();

        const keyLayout2 = [
            "1", "2", "3", "4", "5", "6", "7", "8", "9", ".", "0","backspace","done",


            "enter",  "drag"

        ];

        // Creates HTML for an icon
        const createIconHTML = (icon_name) => {
            return `<i class="material-icons">${icon_name}</i>`;
        };

        keyLayout2.forEach(key => {
            const keyElement = document.createElement("button");
            const insertLineBreak = ["backspace", "p", "enter", "?"].indexOf(key) !== -1;

            // Add attributes/classes
            keyElement.setAttribute("type", "button");
            keyElement.classList.add("keyboard__key","numonekey");

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
                        this.properties.value += "\n";
                        this._triggerEvent("oninput");
                        $('input[type="submit"]').trigger('click');
                        $('.smbtn').trigger('click');
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
                    keyElement.classList.add("keyboard__key--wide", "keyboard__key--dark","cancelkeeb");
                    keyElement.innerHTML = createIconHTML("cancel");

                    keyElement.addEventListener("click", () => {
                        this.close();
                        this._triggerEvent("onclose");
                    });

                    break;
                    case "drag":
                    keyElement.classList.add("keyboard__key", "keyboard__key--dark","dragkeeb");
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
        $('.modal-dialog').removeClass('moveup');
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
        capsLock: false
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

            console.log(element,'xxx')
            element.addEventListener("focus", () => {
                KeyboardNum.close()
                $('.modal-dialog').addClass('moveup');
                $('.modal').addClass('moveup');
                this.open(element.value, currentValue => {
                    element.value = currentValue;
                });
            });
        });


    },

    _createKeys(type) {
        const fragment = document.createDocumentFragment();
        const splkeys  = ["!","@","#","$","%","^","&","*","(",")","+","-"]
        const keyLayout = [...splkeys,
            "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "backspace",
            "q", "w", "e", "r", "t", "y", "u", "i", "o", "p",
            "caps", "a", "s", "d", "f", "g", "h", "j", "k", "l", "enter",
            "done","shift", "z", "x", "c", "v", "b", "n", "m", ",", ".", "?",
            "space"
        ];
        const keyLayout2 = [
            "1", "2", "3", "4", "5", "6", "7", "8", "9", "0", "backspace",

            "enter",
            "done",  ".",

        ];
        let ly;
        if(type=='full'){
            ly = keyLayout
        }
        else{
            ly = keyLayout2
        }
        // Creates HTML for an icon
        const createIconHTML = (icon_name) => {
            return `<i class="material-icons">${icon_name}</i>`;
        };

        ly.forEach(key => {
            const keyElement = document.createElement("button");
            const insertLineBreak = ["backspace", "p", "enter", "?"].indexOf(key) !== -1;

            // Add attributes/classes
            keyElement.setAttribute("type", "button");
            if(key=='1'||key=='2'||key=='3'||key=='4'||key=='5'||key=='6'||key=='7'||key=='8'||key=='9'){
                keyElement.classList.add("keyboard__key",'shiftkey');
            }
            if(key=='!'||key=='@'||key=='#'||key=='$'||key=='%'||key=='^'||key=='&'||key=='*'||key=='('||key==')'||key=='+'||key=='-'){
                keyElement.classList.add("keyboard__key",'spkey');
            }

            else{
                keyElement.classList.add("keyboard__key");
            }

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
                        this.properties.value += "\n";
                        this._triggerEvent("oninput");
                        $('.smbtn').trigger('click');
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
                    keyElement.innerHTML = createIconHTML("cancel");

                    keyElement.addEventListener("click", () => {
                        this.close();
                        this._triggerEvent("onclose");
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
        console.log($('.spkey').css('display'));
        $('.spkey').toggle();
        this.properties.capsLock = !this.properties.capsLock;

        for (const key of this.elements.keys) {
            if (key.childElementCount === 0) {
                key.textContent = this.properties.capsLock ? key.textContent.toUpperCase() : key.textContent.toLowerCase();
            }
        }

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
        $('.modal-dialog').removeClass('moveup');
    }
};

window.addEventListener("DOMContentLoaded", function () {
   Keyboard.init('full');
   KeyboardNum.init();


});

</script>

<link rel="stylesheet" href="<?=base_url()?>assets/flatpickr/flatpickr.min.css">
<body class="signback1">
    <div class="containermain1">
        <div class="row d-flex justify-content-between w-100">
            <div class>
                <div class="logobar ">
                  <?php if(file_exists(base_url().$this->session->sitelogo) === 1){ ?>
                    <img src="<?php echo base_url().$this->session->sitelogo; ?>" class="dem sitelogo">
                  <?php }else{?>
                    <img src="<?php echo base_url('assets/images/Liquor-011.png'); ?>" class="dem sitelogo">
                  <?php }?>
                </div>
            </div>
            <?php if (!empty($this->session->userdata['shiftdata'])){ ?>
              <div class="icon notify_icon notifi" id="bell"> <img src="<?php echo base_url(); ?>assets/images/notification.png" alt="" id="bell2">
                <span id="notifications_count" style="color: red;font-size: 16px;position: absolute;border: 0px solid;border-radius: 50%;padding: 2px;"><?php echo ($user_notification_count!=0)?$user_notification_count:''; ?></span>
            </div>
            <div class="notifications" id="box"></div>
            <?php }?>
            <?php if (!empty($this->session->userdata['shiftdata'])){?>
             <div class=" d-flex align-items-center mrem1" id="show_shift">
                <div class="logout show_shift">
                   <p style="margin:0;">Logged In : <?php if(strlen($this->session->userdata['shiftdata']['name']) > 13 ){ echo substr($this->session->userdata['shiftdata']['name'], 0, 13) . '...'; }else{ echo $this->session->userdata['shiftdata']['name'];}?></p>

                </div>
            </div>
          <?php }else{?>

            <div class=" d-flex align-items-center mrem1" id="show_admin" style="display:none;">
               <div class="logout show_admin" style="display:none;">
                  <p style="margin:0;">Logged In : Admin</p>
               </div>
           </div>
         <?php } ?>
        </div>
    </div>

<div class="container m1">
    <div class="row mt-3">
      <div class="col-md-4 col-sm-6 col-xs-12 cash1" >
        <a class="posterminal_one">
            <img src="<?php echo base_url(); ?>assets/images/Bils.png" alt=" Group" class="group ">
            <p class="leave1">Ring Sales</p>
        </a>
      </div>
        <div class="col-md-4 col-sm-6 col-xs-12 " >
       <a class="report_one"><div class="cash2"  data-toggle="modal">
            <img src="<?php echo base_url(); ?>assets/images/pie-chart.png" alt=" chart" class="chart">
            <p class="l2"> Reports</p>
        </div></a>
        <a class="inventory_one"> <div class="col-md-12 cash3">
          <img src="<?php echo base_url(); ?>assets/images/Weekly salary.png" alt=" path" class="path1">
              <p class="leave">Inventory Management</p>
          </div></a>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12 cash4">
        <a class="loyalty_one">  <div class="col-md-12 ">
            <img src="<?php echo base_url(); ?>assets/images/users.png" alt=" path" class="path">
            <p class="l3">Customers / Loyalty</p>
        </div></a>
       <a class="store_one"> <div class="col-md-12 cash5">
        <img src="<?php echo base_url(); ?>assets/images/7.png" alt=" path" class="path2">
            <p class="leave1"> POS Settings</p>
        </div></a></div>
    </div>

    <?php
    if(!empty($this->session->userdata["admindata"]["role_id"]) ) {
        $is_admin = 1;
    }else{
        $is_admin = 0;
    }
    ?>
    <input type="hidden" name="is_admin" id="is_admin" value="<?=$is_admin?>"/>
<div class="row mt-3">
    <div class="col-md-4 col-sm-6 col-xs-12 cash9 ">
       <a class="clock_one"> <div class="col  " data-toggle="modal" >
            <img src="<?php echo base_url(); ?>assets/images/timer 1.png" alt=" path" class="path3">
            <p class="leave02">Clock In / Clock Out</p>
        </div>
        </a>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12 cash6 timecard">
      <a class="timecard_one"> <div class="col" data-toggle="modal">
        <img src="<?php echo base_url(); ?>assets/images/watches-front-view.png" alt=" path" class=" path33">
            <p class="leave3">Submit Timecard</p>
        </div></a>
      </div>
        <div class="col-md-4 col-sm-6 col-xs-12  cash06">
        <a class="hrms_one"> <div class="col " data-toggle="modal" >
          <img src="<?php echo base_url(); ?>assets/images/calendar.png" alt=" path" class="path01">
          <p class="leave2">HRMS</p>
      </div>
      </a></div>
    </div>
    <div class="row mt-3">
      <div class="col-md-4 col-sm-6 col-xs-12 cash7">
                <a class="e_order_one"><div class="col " data-toggle="modal" >
            <img src="<?php echo base_url(); ?>assets/images/4 (2).png" alt=" path" class="path001">
           <a><p class="leave99">E-Order</p></a>
        </div></a>
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12">
       <a class="marketplace_one"> <div class="col cash8">
        <img src="<?php echo base_url(); ?>assets/images/5 (2).png" alt=" path" class="path002">
          <p class="leave1">Market Place</p>
        </div></a>
     </div>
     <div class="col-md-4 col-sm-6 col-xs-12 cash10">
        <a class="help_one"> <div class="col " >
          <img src="<?php echo base_url(); ?>assets/images/6 (2).png" alt=" path" class="path003">
              <p class="leave003">Get Help</p>
          </div></a>
    </div>
  </div>
           <!-- Modal1 -->
        <div class="modal " id="exampleModalCenter9" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered " role="document">
              <div class="modal-content">
                <div class="modal-header custommodalheader">
                  <h5 class="modal-title custommodaltitle reqcenter" id="exampleModalLongTitle">Request Leave</h5>
                </div>
                <div class="modal-body modalscroll">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="rolllabel">Choose type: * </label>
                          <select class="form-control customselect " id="exampleFormControlSelect1">
                            <option>Select leave type</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6 ">
                        <div class="form-group">
                          <label class="rolllabel">Start Date: *</label> </label>
                          <input type="date" class="form-control customcardinput" id="" aria-describedby="">
                        </div>
                      </div>
                       <div class="col-md-6 ">
                        <div class="form-group">
                        <label class="rolllabel">End  Date: *</label> </label>
                              <input type="date" class="form-control customcardinput" id="" aria-describedby="">
                        </div>
                      </div>
                      <div class="col-md-12 ">
                        <div class="form-group">
                          <label class="rolllabel">Reason for leave:</label> </label>
                          <input type="text" class="form-control customcardinput" id="" aria-describedby="" placeholder="Please enter your reason for leave here">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                    <div style="text-align: center;">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Close</button>
                        <button type="button" class="btn btn-primary customcardfooteraddbtn btn-sm">Submit</button>
                    </div>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>

    <!-- Moda31-->
<div class="modal " id="exampleModalCenter31" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered modalcenter1 " role="document">
        <div class="modal-content">
            <div class="modal-header custommodalheader ">
                <h5 class="modal-title custommodaltitle Register_center2"
                    id="exampleModalLongTitle mlauto "> Report</h5>
            </div>
            <div class="modal-body bg_2">
               <p class="main_bg">Lorem ipsum dolor sit amet</p>
                <p class="main_para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                   incididunt ut.Ut enim ad minim veniam, quis nostrud exercitation
                   ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
            </div>
            <div>
              <div class="lp4">
                <img src="assets/images/chevron-left.png" alt="" class="img-fluid arrow1">
                <img src="assets/images/Group (5).png" alt="" class="img-fluid lpimg10">
              <p class="llp10">Sales</p>
              <img src="assets/images/chevron-left (1).png" alt="" class="img-fluid arrow40" >
              </div>
              <div class="lp5">
                <img src="assets/images/Vector (4).png" alt="" class="img-fluid lpimg20">
                <p class="llp">Market Place</p>
              </div>
              <div class="lp6">
                <img src="assets/images/Vector (5).png" alt="" class="img-fluid lpimg30">
                <p class="llp">Hrms</p>
              </div>
              <div class="lp7">
                <img src="assets/images/Vector (6).png" alt="" class="img-fluid lpimg40">
                <p class="llp">E-Orders</p>
                <img src="assets/images/chevron-left (1).png" alt="" class="img-fluid arrow2">
              </div>
           </div>
        </div>
    </div>
</div>


<!-- REQUEST LEAVE MODAL -Tajammul-->
<div class="modal" id="request-leave-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header leaveHeader">
        <h5 class="modal-title reqModalTitle text-center w-100" id="exampleModalLabel" style="font-size:22px;"> Leave Request</h5>
      </div>
      <form action="" method="post" autocomplete="off" class="add-leave">
        <input type='hidden' value='' class="hidden_emp" name="employee_id">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row m-0 p-0">
            <div class="req-modalTabs d-flex justify-content-between mx-auto">
              <div class="col-6 text-center pill1" style="font-size: 19px;" id="one_day">One Day Leave
                <hr class='w-100 mx-auto pillLine p1'>
              </div>
              <div class="col-6 text-center text-nowrap pill2" id="mul_day" style="font-size: 19px;">Multiple Days Leave
                <hr class='w-100 mx-auto pillLine p2'>
              </div>
            </div>
            <div class="col-12 m-0 p-0 w-100">
              <div id='oneday-leave-form'>
                <div class="form-group mb-2">
                  <label for="leave_type" style="font-size: 19px;" class="m-0">Leave Type:*</label>
                  <?php $data = $this->Cashier_model->get_leave_type();?>
                  <select style="font-size: 19px;"class="form-control customcardinput mt-1 inputFile6" name="leave_type" id="leave_type">
                    <optgroup label="Standard Leaves">
                      <?php foreach ($data as $key) { ?>
                      <option id="leave_<?=$key['id']?>" value="<?=$key['id']?>"><?=$key['leave_type']?></option>
                      <?php } ?>
                    </optgroup>
                    <optgroup label="Accrued Leaves">
                      <option value="0">Accrued Leave</option>
                    </optgroup>
                  </select>
                  <span class="errors" id="leave_err" style="color:red; font-size:16px"></span>
                </div>
                <div class="form-group row m-0 w-100 d-flex justify-content-between">
                  <div class="col-12 m-0 p-0 pr-0">
                    <label for="start_date" class="mb-1" style="font-size: 19px;">Date:*</label>
                    <input style="font-size: 19px;" type="text" class="form-control mb-2 inputFile6 inputDate" name="start_date" id="start_date" placeholder="mm-dd-yyyy" style="background-color:#fff;">
                    <span class="errors" id="start_err" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 pr-2" id="standred2">
                    <label style="font-size: 19px;" for="remaining_day" class="mb-2">Remaining Days:*</label>
                    <input style="font-size: 19px;" type="tel" class="form-control mb-2 inputFile6" id="remaining_day" name="remaining_day" readonly="">
                  </div>
                  <div class="col-6 m-0 p-0" id="standred1">
                    <label style="font-size: 19px;" for="requested_day" class="mb-2">Requested Days:*</label>
                    <input style="font-size: 19px;" type="tel" class="form-control mb-2 inputFile6" id="requested_day" name="requested_day" value="1" readonly="">
                  </div>
                  <div class="col-6 m-0 p-0 pr-2" id="accrued2">
                    <label style="font-size: 19px;" for="remaining_hr" class="mb-2">Remaining Hours:*</label>
                    <input style="font-size: 19px;" type="tel" class="form-control mb-2 inputFile6" id="remaining_hr" name="remaining_hr" readonly="">
                    <span class="errors" id="mhrs_err" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 " id="accrued1">
                    <label style="font-size: 19px;" for="requested_hr" class="mb-2">Requested Hours:*</label>
                    <input style="font-size: 19px;" type="number" class="form-control mb-2 inputFile6" id="requested_hr" name="requested_hr" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" min="1" max="8" maxlength="1">
                    <span class="errors" id="rhrs_err" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-12 m-0 p-0">
                    <label style="font-size: 19px;" for="reason" class="mb-2">Reason for leave:*</label>
                    <textarea class="form-control inputFile6 use-keyboard-input" id="reason" name="reason" rows="3"></textarea>
                    <span class="errors" id="notes_err" style="color:red; font-size:16px"></span>
                  </div>
                </div>
              </div>
              <div id='vacation-leave-form'>
                <div class="form-group mb-2">
                  <label for="eleave_type" style="font-size: 19px;"class="m-0">Leave Type:*</label>
                  <select style="font-size: 19px;" class="form-control customcardinput mt-2 inputFile7" name="leave_type" id="eleave_type">
                    <optgroup label="Standard Leaves">
                      <?php foreach ($data as $key) { ?>
                      <option id="eleave_<?=$key['id']?>" value="<?=$key['id']?>"><?=$key['leave_type']?></option>
                      <?php } ?>
                    </optgroup>
                    <optgroup label="Accrued Leaves">
                      <option value="0">Accrued Leave</option>
                    </optgroup>
                  </select>
                  <span class="errors" id="eleave_err" style="color:red; font-size:16px"></span>
                </div>
                <div class="form-group row m-0 w-100 d-flex justify-content-between">
                  <div class="col-6 m-0 p-0 pr-2">
                    <label  style="font-size: 19px;" for="estart_date" class="mb-1"> Start Date:*</label>
                    <input style="font-size: 19px;" type="text" class="form-control mb-2 inputFile7 inputDate" name="start_date" id="estart_date" placeholder="mm-dd-yyyy" style="background-color:#fff;">
                    <span class="errors" id="estart_err" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 pr-0">
                    <label style="font-size: 19px;" for="end_date" class="mb-1"> End Date:*</label>
                    <input style="font-size: 19px;" type="text" class="form-control mb-2 inputFile7 inputDate" name="end_date" id="end_date" placeholder="mm-dd-yyyy" style="background-color:#fff;">
                    <span class="errors" id="end_err" style="color:red; font-size:16px"></span>
                    <span class="errors" id="date_err" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 pr-2" id="standred4">
                    <label style="font-size: 19px;" for="eremaining_day" class="mb-1">Remaining Days:*</label>
                    <input style="font-size: 19px;" type="tel" class="form-control mb-2 inputFile7" id="eremaining_day" name="remaining_day" readonly="">
                  </div>
                  <div class="col-6 m-0 p-0" id="standred3">
                    <label style="font-size: 19px;" for="erequested_day" class="mb-1">Requested Days:*</label>
                    <input style="font-size: 19px;" type="tel" class="form-control mb-2 inputFile7" id="erequested_day" name="requested_day" readonly="">
                  </div>
                  <div class="col-6 m-0 p-0 pr-2" id="accrued4">
                    <label style="font-size: 19px;" for="eremaining_hr" class="mb-1">Remaining Hours:*</label>
                    <input style="font-size: 19px;" type="tel" class="form-control mb-2 inputFile7" id="eremaining_hr" name="remaining_hr" readonly="">
                    <span class="errors" id="emhrs_err" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 " id="accrued3">
                    <label style="font-size: 19px;" for="erequested_hr" class="mb-1">Requested Hours:*</label>
                    <input style="font-size: 19px;" type="number" class="form-control mb-2 inputFile7" id="erequested_hr" name="requested_hr" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" min="1" readonly="">
                    <span class="errors" id="erhrs_err" style="color:red; font-size:16px"></span>
                  </div>
                  <span class="errors" id="days124_err" style="color:red; font-size:16px"></span>
                  <div class="col-12 m-0 p-0">
                    <label style="font-size: 19px;" for="ereason" class="mb-2">Reason for leave:*</label>
                    <textarea  style="font-size: 18px;"class="form-control inputFile7 use-keyboard-input" id="ereason" name="reason" rows="3"></textarea>
                    <span class="errors" id="enotes_err" style="color:red; font-size:16px"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer ">
        <button style="font-size: 19px;" type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn" id="Close_popup">Cancel</button>
        <button style="font-size: 19px;height:38px" type="submit" id="fst_sb" class="btn subbtn-modal first">Submit</button>
        <button style="font-size: 19px; height:38px" type="submit" id="scnd_sb" class="btn subbtn-modal second">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Request Status -->
<div class="modal" id="request_status" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered modal-xl  modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header custommodalheader position-relative">
        <h5 class="modal-title custommodaltitle mx-auto" id="exampleModalLongTitle mlauto " style="font-size: 22px;">Request Status</h5>
            <button class="bckbtn btn-backWrapper newredwrap" id="bleave8" >
                  <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
            </button>
      </div>
      <form action="" method="post" autocomplete="off" class="add-leave">
        <input type="hidden" id="req_status_id" name="req_status_id" value="">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row m-0 p-0">
            <div class="req-modalTabs d-flex justify-content-between mx-auto">
              <div  id="leave" class="col-6 text-center text-nowrap" style="font-size:20px;">Leave Request Status
                <hr class='w-100 mx-auto pillLine p1'>
              </div>
              <div id="cash" class="col-6 text-center pill2 cash_request123" style="font-size:20px;">Cash Advance Status
                <hr class='w-100 mx-auto pillLine p2'>
              </div>
            </div>
            <div class="col-12 m-0 p-0 w-100">
              <div id='leave_data'>
                  <label style="font-size: 20px;height: 35px;">Select Type :</label>
                  <select id="type" onchange="Getall_leave_bytype();" style="font-size:20px;">
                    <option value="">--Select--</option>
                    <option value="week">This Week</option>
                    <option value="month">This Month</option>
                    <option value="DateRange">Date Range</option>
              </select><br>
              <div class="row ttdates" style="display:none;">
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <div id="from_to_date" class="col-3 m-0 p-0 w-100" style="display:none;">
                        <label>From :</label>
                        <input type="text" class="form-control mb-2 inputFile11 inputDate1 flatpickr-input active" name="from_date" id="from_date" placeholder="mm-dd-yyyy" style="background-color:#fff;" >
                        <span class="errors" id="from_err" style="color:red; font-size:14px"></span>
                  </div>&nbsp;&nbsp;&nbsp;
                  <div id="to_dates" class="col-3 m-0 p-0 w-100" style="display:none;">
                        <label>To : </label>
                        <input type="text" class="form-control mb-2 inputFile11 inputDate1 flatpickr-input active" name="to_date" id="to_date" placeholder="mm-dd-yyyy" style="background-color:#fff;" >
                        <span class="errors" id="to_err" style="color:red; font-size:14px"></span>
                  </div>
              </div>
              <p class="errors" id="date_errs" style="color:red; font-size:14px"></p>
                 <div class="m-0 w-100">
                    <div class="left-wrap newleftwrap hadjst">
                    <table class="lrc w-100 table" id="leave_status"  style=" background-repeat:no-repeat; width:450px;margin:0;" cellpadding="0" cellspacing="0" border="2px">
                        <thead class="sticky-top thead-dark" id="recents_payouts" style="">
                            <tr>
                                <th style="text-align:center" >Leave Type</th>
                                <th style="text-align:center" >Date</th>
                                <th style="text-align:center" >Reason</th>
                                <th style="text-align:center" >Status</th>
                                <th style="text-align:center" >Denial Reason</th>
                                <th style="text-align:center" >Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_leave">
                             <?php
                             $all_leave_status= $this->Cashier_model->get_all_leave_hrms();
                             if(empty($all_leave_status))
                             { ?>
                             <tr class="tr " id="tbl_tr_leave">
                               <td colspan="6">No Data Found</td>
                            </tr>
                             <?php } else {
                              foreach($all_leave_status as $all_leave_status_list) {
                            $date_time = $payouts_list['created_at'];
                        $new_date = date("m/d/Y",strtotime($date_time));
                        $leave_type= $all_leave_status_list['leave_type'];
                           ?>

                            <tr class="tr " id="tbl_tr_leave">
                                <td style="width:15%;"><?php if($leave_type=="") { echo "Accrued Leave";} else  { echo $leave_type;}?></td>
                                <td style="width:15%;"><?php echo $all_leave_status_list['start_date']?></td>
                                <td><?php if(strlen($all_leave_status_list['reason']) > 25 ){ echo substr($all_leave_status_list['reason'], 0, 25) . '...'; }else{ echo $all_leave_status_list['reason'];}?></td>
                                <td style="width:1%;"><?php if($all_leave_status_list['status'] == 'Pending' && $all_leave_status_list['notes'] !='') { echo "<a href='#' id='info_Required1' data-chat='".$all_leave_status_list['notes']."' data-chat-id='".$all_leave_status_list['id']."' data-sender-id='".$all_leave_status_list['employee_id']."'><b>Info Required</b></a>"; }else{echo $all_leave_status_list['status'];}?></td>
                                <td><?php if(strlen($all_leave_status_list['deny_reason']) > 25 ){ echo substr($all_leave_status_list['deny_reason'], 0, 10) . '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'.$all_leave_status_list['deny_reason'].'</span></a>'; }else{ echo $all_leave_status_list['deny_reason'];}?></td>
                                <td style="text-align:center;width:20%;">
                                  <button type="button" class="btn btn-success updateLeave" data-leave_id="<?php echo $all_leave_status_list['id']?>" <?php if($all_leave_status_list['status'] != 'Pending'){ echo 'disabled';}else{ echo '';}?>>Edit</button>
                                  <button type="button" class="btn btn-danger ml-2 deleteLeave" data-leave_id="<?php echo $all_leave_status_list['id']?>" <?php if($all_leave_status_list['status'] != 'Pending'){ echo 'disabled';}else{ echo '';}?>>Cancel</button>
                                </td>
                            </tr>
                             <?php } } ?>
                        </tbody>
                        </table>
                        </div>
                </div>
               </div>
              <div id='cash_data'>
                <div class="form-group mb-3">
                  <label style="font-size:20px;height: 35px;">Select Type :</label>
                  <select style="font-size:20px;" id="cash_type" onchange="Getall_cash_bytype();"  style="border-top: 1px solid black;">
                      <option value="">--Select--</option>
                      <option value="week">This Week</option>
                      <option value="month">This Month</option>
                      <option value="DateRange">Date Range</option>
                  </select><br>
                  <div class="row ttcashs" style="display:none;">
                      &nbsp;&nbsp;&nbsp;&nbsp;
                      <div id="from_date_cash" class="col-3 m-0 p-0 w-100" style="display:none;">
                            <label>From :</label>
                            <input type="text" class="form-control mb-2 inputFile12 inputDate1 flatpickr-input active" name="from_cash_date" id="from_cash_date" placeholder="mm-dd-yyyy" style="background-color:#fff;" >
                            <span class="errors" id="from_cash_err" style="color:red; font-size:14px"></span>
                      </div>&nbsp;&nbsp;&nbsp;
                      <div id="to_cashs" class="col-3 m-0 p-0 w-100" style="display:none;">
                            <label>To : </label>
                            <input type="text" class="form-control mb-2 inputFile12 inputDate1 flatpickr-input active" name="to_cash_date" id="to_cash_date" placeholder="mm-dd-yyyy" style="background-color:#fff;" >
                            <span class="errors" id="to_cash_err" style="color:red; font-size:14px"></span>
                      </div>
                  </div>
                  <p class="errors" id="date_cash_errs" style="color:red; font-size:14px"></p>
                  <div class="left-wrap newleftwrap hadjst">
                    <table class="lrc w-100 table" id="cash_adv" style="background-repeat:no-repeat; width:450px;margin:0;" cellpadding="0" cellspacing="0" border="2px">
                        <thead class="sticky-top thead-dark" id="recents_payouts">
                            <tr>
                                <th  style="text-align:center">Amount</th>
                                <th style="text-align:center" >Date</th>
                                <th style="text-align:center" >Reason</th>
                                <th style="text-align:center" >Status</th>
                                <th style="text-align:center" >Denial Reason</th>
                                <th style="text-align:center" >Action</th>
                            </tr>
                        </thead>
                        <tbody id="tbl_cashadv">
                             <?php
                             $all_cash_adv= $this->Cashier_model->get_cash_advance_hrms();
                             if(empty($all_cash_adv))
                             { ?>
                             <tr class="tr " id="tbl_tr_cashadv">
                               <td colspan="6">No Data Found</td>
                            </tr>
                             <?php } else {
                              foreach($all_cash_adv as $all_cash_adv_list) {
                             $date_time = $all_cash_adv_list['created_at'];
                             $new_date = date("m-d-Y",strtotime($date_time));
                             $reason=substr($all_cash_adv_list['reason'],0,30);
                           ?>
                            <tr class="tr " id="tbl_tr_payout">
                               <td style="width: 8%;">$<?php echo $all_cash_adv_list['advance_amount']?></td>
                                <td style="width: 15%;"><?php echo $new_date;?></td>
                                <td style="width: 24%;"><?php if(strlen($all_cash_adv_list['reason']) > 25 ){ echo substr($all_cash_adv_list['reason'], 0, 25) . '...'; }else{ echo $all_cash_adv_list['reason'];}?></td>
                                 <td style="width: 10%;"><?php if($all_cash_adv_list['status'] == 'Pending' && $all_cash_adv_list['notes'] !='') { echo "<a href='#' id='info_required' data-chat='".$all_cash_adv_list['notes']."' data-chat-id='".$all_cash_adv_list['id']."' data-sender-id='".$all_cash_adv_list['employee_id']."' ><b>Info Required</b></a>"; }else{echo $all_cash_adv_list['status'];}?></td>
                                 <td><?php if(strlen($all_cash_adv_list['denied_reason']) > 25 ){ echo substr($all_cash_adv_list['denied_reason'], 0, 15) . '...<a class="tooltips"><b>Read More</b><span class="tooltipstext">'.$all_cash_adv_list['denied_reason'].'</span></a>'; }else{ echo $all_cash_adv_list['denied_reason'];}?></td>
                                 <td style="text-align:center;width:20%;">
                                    <button type="button" class="btn btn-success updateCash" data-cash_id="<?php echo $all_cash_adv_list['id']?>" <?php if($all_cash_adv_list['status'] != 'Pending'){ echo 'disabled';}else{ echo '';}?>>Edit</button>
                                    <button type="button" class="btn btn-danger ml-2 deleteCash" data-cash_id="<?php echo $all_cash_adv_list['id']?>" <?php if($all_cash_adv_list['status'] != 'Pending'){ echo 'disabled';}else{ echo '';}?>>Cancel</button>
                                 </td>
                            </tr>
                             <?php } } ?>
                        </tbody>
                        </table>
                        </div>
                  <span class="errors" id="eleave_err" style="color:red; font-size:14px"></span>
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


<!-- updateREQUEST LEAVE MODAL -Tajammul-->
<div class="modal" id="update-request-leave" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class=" modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header leaveHeader">
        <h5 class="modal-title reqModalTitle text-center w-100" id="exampleModalLabel" style="font-size:22px;">Update Leave Request</h5>
      </div>
      <form action="" method="post" autocomplete="off" class="update-leave">
      <input type="hidden" class="hidden_emp1" name="employee_id">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row m-0 p-0">
            <div class="req-modalTabs d-flex justify-content-between mx-auto">
              <div class="col-6 text-center pill11 " style="font-size: 20px;">One Day Leave
                <hr class='w-100 mx-auto pillLine p11'>
              </div>
              <div class="col-6 text-center pill12 text-nowrap" style="font-size: 20px;">Multiple Days Leave
                <hr class='w-100 mx-auto pillLine p12'>
              </div>
            </div>
            <input type="hidden" name="leave_id" value="" id="lleave_id">
            <div class="col-12 m-0 p-0 w-100">
              <div id='oneday-leave'>
                <div class="form-group mb-2">
                  <label for="leave_type1" style="font-size: 20px;" class="m-0">Leave Type:*</label>
                  <?php $data = $this->Cashier_model->get_leave_type();?>
                  <select style="font-size: 20px;" class="form-control customcardinput mt-2 inputFile60" name="leave_type" id="leave_type1">
                    <optgroup label="Standard Leaves">
                      <?php foreach ($data as $key) { ?>
                      <option value="<?=$key['id']?>"><?=$key['leave_type']?></option>
                      <?php } ?>
                    </optgroup>
                    <optgroup label="Accrued Leaves">
                      <option value="0">Accrued Leave</option>
                    </optgroup>
                  </select>
                  <span class="errors" id="leave_err1" style="color:red; font-size:16px"></span>
                </div>
                <div class="form-group row m-0 w-100 d-flex justify-content-between">
                  <div class="col-12 m-0 p-0 pr-2">
                    <label for="start_date1 " class="mb-2" style="font-size: 20px;">Date:*</label>
                    <input type="text" class="form-control mb-2 inputFile60 inputDate" name="start_date" id="start_date1" placeholder="mm-dd-yyyy" style="background-color:#fff; font-size: 20px;">
                    <span class="errors" id="start_err1" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 pr-2" id="standred12">
                    <label for="remaining_day1" class="mb-2" style="font-size: 20px;">Remaining Days:*</label>
                    <input type="tel" class="form-control mb-2 inputFile60" id="remaining_day1" name="remaining_day" readonly="" style="font-size: 20px;">
                  </div>
                  <div class="col-6 m-0 p-0" id="standred11">
                    <label for="requested_day1" class="mb-2" style="font-size: 20px;">Requested Days:*</label>
                    <input type="tel" class="form-control mb-2 inputFile60" id="requested_day1" name="requested_day" value="1" readonly="" style="font-size: 20px;">
                  </div>
                  <div class="col-6 m-0 p-0 pr-2" id="accrued12">
                    <label for="remaining_hr1" class="mb-2" style="font-size: 20px;">Remaining Hours:*</label>
                    <input type="tel" class="form-control mb-2 inputFile60" id="remaining_hr1" name="remaining_hr" readonly="" style="font-size: 20px;">
                    <span class="errors" id="mhrs_err1" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 " id="accrued11">
                    <label for="requested_hr1" class="mb-2" style="font-size: 20px;">Requested Hours:*</label>
                    <input type="hidden" class="form-control mb-2" id="oldrequested_hr1" name="old_requested_hr">
                    <input type="number" class="form-control mb-2 inputFile60" id="requested_hr1" name="requested_hr" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" min="1" max="8" maxlength="1" style="font-size: 20px;">
                    <span class="errors" id="rhrs_err1" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-12 m-0 p-0">
                    <label for="reason1" class="mb-2" style="font-size: 20px;">Reason for leave:*</label>
                    <textarea class="form-control inputFile60 use-keyboard-input" id="reason1" name="reason" rows="3"></textarea>
                    <span class="errors" id="notes_err1" style="color:red; font-size:16px"></span>
                  </div>
                </div>
              </div>
              <div id='vacation-leave'>
                <div class="form-group mb-2">
                  <label for="eleave_type1" style="font-size: 20px;" class="m-0">Leave Type:*</label>
                  <select class="form-control customcardinput mt-2 inputFile70" name="leave_type" id="eleave_type1" style="font-size: 20px;">
                    <optgroup label="Standard Leaves">
                      <?php foreach ($data as $key) { ?>
                      <option value="<?=$key['id']?>"><?=$key['leave_type']?></option>
                      <?php } ?>
                    </optgroup>
                    <optgroup label="Accrued Leaves">
                      <option value="0">Accrued Leave</option>
                    </optgroup>
                  </select>
                  <span class="errors" id="eleave_err1" style="color:red; font-size:16px"></span>
                </div>
                <div class="form-group row m-0 w-100 d-flex justify-content-between">
                  <div class="col-6 m-0 p-0 pr-2">
                    <label for="estart_date1" class="mb-2" style="font-size: 20px;"> Start Date:*</label>
                    <input type="text" class="form-control mb-2 inputFile70 inputDate" name="start_date" id="estart_date1" placeholder="mm-dd-yyyy" style="background-color:#fff; font-size: 20px;">
                    <span class="errors" id="estart_err1" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 pr-2">
                    <label for="end_date1" class="mb-2" style="font-size: 20px;"> End Date:*</label>
                    <input type="text" class="form-control mb-2 inputFile70 inputDate" name="end_date" id="end_date1" placeholder="mm-dd-yyyy" style="background-color:#fff; font-size: 20px;">
                    <span class="errors" id="end_err1" style="color:red; font-size:16px"></span>
                    <span class="errors" id="date_err1" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 pr-2" id="standred41">
                    <label for="eremaining_day1" class="mb-2" style="font-size: 20px;">Remaining Days:*</label>
                    <input type="tel" class="form-control mb-2 inputFile70" id="eremaining_day1" name="remaining_day" readonly="" style="font-size: 20px;">
                  </div>
                  <div class="col-6 m-0 p-0" id="standred31">
                    <label for="erequested_day1" class="mb-2" style="font-size: 20px;">Requested Days:*</label>
                    <input type="tel" class="form-control mb-2 inputFile70" id="erequested_day1" name="requested_day" readonly="" style="font-size: 20px;">
                  </div>
                  <div class="col-6 m-0 p-0 pr-2" id="accrued41">
                    <label for="eremaining_hr1" class="mb-2" style="font-size: 20px;">Remaining Hours:*</label>
                    <input type="tel" class="form-control mb-2 inputFile70" id="eremaining_hr1" name="remaining_hr" readonly="" style="font-size: 20px;">
                    <span class="errors" id="emhrs_err1" style="color:red; font-size:16px"></span>
                  </div>
                  <div class="col-6 m-0 p-0 " id="accrued31">
                    <label for="erequested_hr1" class="mb-2" style="font-size: 20px;">Requested Hours:*</label>
                    <input type="number" class="form-control mb-2 inputFile70" id="erequested_hr1" name="requested_hr" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" min="1" readonly="" style="font-size: 20px;">
                    <span class="errors" id="erhrs_err1" style="color:red; font-size:16px"></span>
                  </div>
                  <span class="errors" id="days1241_err" style="color:red; font-size:16px"></span>
                  <div class="col-12 m-0 p-0">
                    <label for="ereason1" class="mb-2" style="font-size: 20px;">Reason for leave:*</label>
                    <textarea class="form-control inputFile70 use-keyboard-input" id="ereason1" name="reason" rows="3"></textarea>
                    <span class="errors" id="enotes_err1" style="color:red; font-size:16px"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer ">
        <button style="font-size: 20px;height:40px" type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn" id="Close_popup1">Cancel</button>
        <button style="font-size: 20px;height:40px" type="submit" class="btn subbtn-modal first1">Submit</button>
        <button style="font-size: 20px;height:40px" type="submit" class="btn subbtn-modal second1">Submit</button>
      </div>
    </form>
    </div>
  </div>
</div>


<div class="modal" id="update-request-cash" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
            <div class="modal-header custommodalheader position-relative">
        <h5 class="modal-title custommodaltitle text-center w-100" id="exampleModalLabel" style="font-size: 22px;">Update Cash Advance Request</h5>
      </div>
      <?php
          $store = $this->Cashier_model->get_store_name();
          $paychecks = $this->Cashier_model->get_all_paychecks();
          $paycheck_amt = $this->Cashier_model->get_fontsize();
      ?>
      <form action="" method="post" autocomplete="off" class="advance-update-cash">
        <div class="modal-body modalscroll">
          <div class="container">
            <div class="row">
              <input type="hidden" name="cash_id" value="" id="ccash_id">
              <input type="hidden" name="paycheck_amt" id="paycheckAMT1" value="<?=$paycheck_amt->paycheck_amount?>" >
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="advance_amount1" style="font-size: 20px;">Enter Amount * <span class="text-secondary" style="font-size:13px;">(Max amount allowed is $<?=$paycheck_amt->paycheck_amount?>)</span></label>
                  <div class="position-relative">
                      <span class="position-absolute" style="top: 50%;transform: translateY(-50%);margin-left: 0.3em;">$</span>
                    <input type="tel" name="advance_amount" class="form-control use-keyboard-input-num customcardinput inputFile51" id="advance_amount1" aria-describedby="" placeholder="Enter Amount" onkeyup="this.value = get_float_value(this.value)" onClick="this.select();" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" style="font-size: 20px;">
                  </div>
                  <span class="errors" id="amt_err1" style="color:red; font-size:16px"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <label class="reasonadv2" style="font-size: 20px;">Reason for Advance: *</label>
                  <input type="text" name="reason" class="form-control customcardinput inputFile51 use-keyboard-input" id="reasonadv2" aria-describedby="" placeholder="Enter your Reason" style="font-size: 20px;">
                  <span class="errors" id="reasonadv_err2" style="color:red; font-size:16px;"></span>
                </div>
              </div>
              <div class="col-md-12 ">
                <div class="form-group">
                  <p class="auth p-0 m-0" style="font-size: 16px;">I authorize <?=$store[0]->name?> to deduct my advance from *</p>
                  <select class="form-control customcardinput inputFile51 mt-2" name="paycheck" id="selPaycheck1" style="font-size: 20px;">
                    <?php foreach($paychecks as $p){?>
                      <option value="<?=$p['value']?>"><?php if($p['value'] == 1){ echo 'Next Paycheck';}else{ echo $p['paycheck']; } ?></option>
                    <?php } ?>
                  </select>
                  <span class="errors" id="rdo_err1" style="color:red; font-size:16px"></span>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <div style="text-align: center;">
          <button style="font-size: 20px;height:40px" type="button" data-dismiss="modal"  id="cash_close1" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
            <button style="font-size: 20px;height:40px" type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="btnAdv1">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal" id="info_chat_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered " role="document">
    <div class="modal-content">
      <div class="modal-header custommodalheader">
        <h5 class="modal-title custommodaltitle" id="exampleModalLongTitle" style="padding-left: 36%;">Chat History</h5>
            <button class="bckbtn btn-backWrapper" id="bleave123" style="position: absolute;right: 2%;top: 1.5%;background: darkred;" data-dismiss="modal" >
                    <img src="<?php echo base_url(); ?>assets/images/Vector (11).png" alt="">
            </button>
      </div>
      <form action="" method="post" autocomplete="off" class="custom-key">
        <div class="modal-body modalscroll">
            <div id="chatDIV" class="ScrollStyle1"></div>
            <div class="form-group">
              <input type="hidden" name="chat_id" id="chat_id">
              <input type="hidden" name="sender_id" id="sender_id">
              <input type="hidden" name="chat_leave_id" id="chat_leave_id">
              <textarea name="additional_info" class="form-control customcardinput use-keyboard-input" id="additional_info123" aria-describedby="" placeholder="enter here..." style="font-size: 20px;" rows="4" cols="50"></textarea>
              <span class="errors" id="reasonadv_err2" style="color:red; font-size:16px;"></span>
            </div>
        </div>
        <div class="modal-footer">
            <div style="text-align: center;">
              <button type="button" data-dismiss="modal" class="btn btn-outline-dark btn-sm customfootercancelbtn">Cancel</button>
              <button type="submit" class="btn btn-primary customcardfooteraddbtn btn-sm" id="chat_submit">Send</button>
            </div>
        </div>
      </form>
    </div>
  </div>
</div>


<script src="<?=base_url()?>assets/flatpickr/flatpickr.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

<script src="<?=base_url()?>assets/cashier/js/main_js/cashier_js.js"></script>
