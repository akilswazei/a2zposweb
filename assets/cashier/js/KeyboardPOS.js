$(function () {
  $(".x").on("click", function () {
    $("#custom_product_name").val("");
    $("#product_upc").val("");
    $("#custom_product_price").val("");
    $("#custom_product_name").val("");
    $("#product_lookup_description").val("");

    KeyboardNum.close();
    Keyboard.close();
  });
});
function removeAtIndex(string, position) {
  var str = string;
  str = str.slice(0, position) + str.slice(position + 1);
  console.log(str);
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
  // console.log(x,y,'x,y')
  if (y == null) {
    return x._createKeys("full");
  } else {
    return x._createKeys("half");
  }
}
function resetKeebPos() {
  let a = $(".keyboard.numone").offset().top;
  let a2 = $(".keyboard.numone").offset().bottom;
  let a3 = $(".keyboard.numone").offset().left;
  let a4 = $(".keyboard.numone").offset().right;
  console.log(a, a2, a3, a4, "all p[os");
  $(".keyboard.numone").css("right", "0");
  $(".keyboard.numone").css("left", "auto");
  $(".keyboard.numone").css("bottom", "0");
}
function get_float_value(num) {
  console.log("this si what flaot recifve", num);
  var rex = /(^\d{2})|(\d{1,3})(?=\d{1,3}|$)/g,
    val = num.toString().replace(/^0+|\.|,/g, ""),
    res;

  if (val.length) {
    //if (val.length && val.length > 2) {
    res = Array.prototype.reduce
      .call(val, (p, c) => c + p) // reverse the pure numbers string
      .match(rex) // get groups in array
      .reduce((p, c, i) => (i - 1 ? p + c : p + "." + c)); // insert (.) and (,) accordingly
    res += /\.|,/.test(res) ? "" : ".0"; // test if res has (.) or (,) in it
    num = Array.prototype.reduce.call(res, (p, c) => c + p); // reverse the string and display
    return num;
  } else {
    return num;
  }
}

const KeyboardNum = {
  elements: {
    main: null,
    keysContainer: null,
    keys: [],
  },

  eventHandlers: {
    oninput: null,
    onclose: null,
  },

  properties: {
    value: "",
    capsLock: false,
    firstFocussed: "",
    submitButtonId: "",
    allFocusable: [],
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

    this.elements.keys =
      this.elements.keysContainer.querySelectorAll(".keyboard__key");

    // Add to DOM
    this.elements.main.appendChild(this.elements.keysContainer);
    document.body.appendChild(this.elements.main);

    // Automatically use keyboard for elements with .use-keyboard-input
    document.querySelectorAll(".use-keyboard-input-num").forEach((element) => {
      console.log(element, "xxx");
      element.addEventListener("focus", () => {
        Keyboard.close();
        let ww = element.classList;
        console.log("run this", ww);
        $(".modal").addClass("moveup");
        $(".modal-dialog").addClass("moveup");
        $(".keyboard.numone").addClass("numKeyboardPositioner");
        this.open(element.value, (currentValue) => {

          if (element.value.selectionStart == "number") {
            element.value.selectionStart == 0 && element.value.selectionEnd == element.value.length;
        }
          console.log("this", element.value);
          if (element.id === "custom_product_price") {
            element.value = get_float_value(currentValue);
          }
          if (element.id === "product_lookup_description") {
            element.value = currentValue
              .replace(/[^0-9]/g, "")
              .replace(/(\..*)\./g, "$1");
          }
          if (element.classList.contains("usefloathere")) {
            console.log("this one is fliat", currentValue, element.value);
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
          if (element.classList.contains("limitnumhere")) {
            element.value = currentValue
              .replace(/[^0-9]/g, "")
              .replace(/(\..*)\./g, "$1");
          }
          if (element.classList.contains("usemobilehere")) {
            // element.value = currentValue.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');
            var input = currentValue.replace(/[^0-9\(\)\s\-]/g, "");
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
            if (inputlen >= 1 && numberslen == 0 && input[0] == "(")
              newval = "(";
            else if (
              inputlen >= 6 &&
              numberslen == 3 &&
              input[4] == ")" &&
              input[5] == " "
            )
              newval += ") ";
            else if (inputlen >= 5 && numberslen == 3 && input[4] == ")")
              newval += " ";
            else if (inputlen >= 6 && numberslen == 3 && input[5] == " ")
              newval += " ";
            else if (inputlen >= 10 && numberslen == 6 && input[9] == "-")
              newval += "-";

            element.value = newval.substring(0, 14);
            // $(this).val(newval.substring(0, 14));
          } else {
            element.value = currentValue;
          }
          // element.value = get_float_value(element.value)
        });

        this.properties.firstFocussed = this.getInputFocus();
      });
    });
  },

  _createKeys() {
    const fragment = document.createDocumentFragment();

    const keyLayout2 = [
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      ".",
      "0",
      "backspace",
      "done",

      "enter",
      "tab",
      "drag",
    ];

    // Creates HTML for an icon
    const createIconHTML = (icon_name) => {
      return `<i class="material-icons">${icon_name}</i>`;
    };

    keyLayout2.forEach((key) => {
      const keyElement = document.createElement("button");
      const insertLineBreak =
        ["backspace", "tab", "enter", "?"].indexOf(key) !== -1;

      // Add attributes/classes
      keyElement.setAttribute("type", "button");
      keyElement.classList.add("keyboard__key", "numonekey");

      switch (key) {
        case "backspace":
          keyElement.classList.add("keyboard__key--wide");
          keyElement.innerHTML = createIconHTML("backspace");

          keyElement.addEventListener("click", () => {
            this.properties.value = this.properties.value.substring(
              0,
              this.properties.value.length - 1
            );
            this._triggerEvent("oninput");
          });

          break;

        case "caps":
          keyElement.classList.add(
            "keyboard__key--wide",
            "keyboard__key--activatable"
          );
          keyElement.innerHTML = createIconHTML("capslock");

          keyElement.addEventListener("click", () => {
            this._toggleCapsLock();
            keyElement.classList.toggle(
              "keyboard__key--active",
              this.properties.capsLock
            );
          });

          break;

        case "enter":
          keyElement.classList.add("keyboard__key--wide");
          keyElement.innerHTML = createIconHTML("enter");

          keyElement.addEventListener("click", () => {
            // this._triggerEvent("oninput");
            // $('input[type="submit"]').trigger("click");
            // $(".smbtn").trigger("click");
            // this.properties.value += "\n";
            this._triggerEvent("oninput");
            // $('input[type="submit"]').trigger('click');
            console.log("id is", this.properties.submitButtonId);
            if (this.properties.submitButtonId === "walkinsubmit") {
              let nnum = $("#customer_mobile_no").val();
              sendWalkin(nnum);
            }
            $("#" + this.properties.submitButtonId).trigger("click");
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

        case "tab":
          keyElement.classList.add("keyboard__key--wide");
          keyElement.innerHTML = createIconHTML("tab");
          let f = this.properties.firstFocussed;
          keyElement.addEventListener("click", () => {
            // this.properties.value += "\t";
            // this._triggerEvent("oninput");
            // alert('test');

            this.moveInput(f);
          });

          break;

        case "done":
          keyElement.classList.add(
            "keyboard__key--wide",
            "keyboard__key--dark",
            "cancelkeeb"
          );
          keyElement.innerHTML = createIconHTML("hide");

          keyElement.addEventListener("click", () => {
            this.close();
            this._triggerEvent("onclose");
          });

          break;
        case "drag":
          keyElement.classList.add(
            "keyboard__key",
            "keyboard__key--dark",
            "dragkeeb"
          );
          keyElement.innerHTML = `<i class="fa fa-arrows" style="color:white;" aria-hidden="true"></i>`;

          // keyElement.addEventListener("click", () => {
          //     this.close();
          //     this._triggerEvent("onclose");
          // });

          break;
        default:
          keyElement.textContent = key.toLowerCase();

          keyElement.addEventListener("click", () => {
            this.properties.value += this.properties.capsLock
              ? key.toUpperCase()
              : key.toLowerCase();
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
  setSubmitButton(id) {
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
        key.textContent = this.properties.capsLock
          ? key.textContent.toUpperCase()
          : key.textContent.toLowerCase();
      }
    }
  },

  open(initialValue, oninput, onclose) {
    this.properties.value = initialValue || "";
    this.eventHandlers.oninput = oninput;
    this.eventHandlers.onclose = onclose;
    $(".keyboard.numone").show();
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
    $(".keyboard.numone").hide();
    this.elements.main.classList.add("keyboard--hidden");
    $(".modal").removeClass("moveup");
    $(".modal-dialog").removeClass("moveup");
    $(".keyboard.numone").removeClass("numKeyboardPositioner");
  },

  getInputFocus() {
    let currentFocussed = document.activeElement;
    console.log(currentFocussed, currentFocussed.id, "active one");
    return currentFocussed;
  },

  // moveInput(startx) {
  //   let start = this.properties.firstFocussed.id;
  //   let inputs = document.getElementsByClassName("form-control");
  //   let allIds = [];

  //   let focussedIndex, nextIndex;
  //   var bin_id = $(".bin_data").last().attr("id");

  //   for (let i = 0; i < inputs.length; i++) {
  //     allIds.push(inputs[i].id);

  //     if (start == inputs[i].id) {
  //       if (
  //         inputs[i].id === "store_promotion_price" ||
  //         inputs[i].id === "cprice" ||
  //         inputs[i].id === "store_promotion_price" ||
  //         inputs[i].id === "store_promotion_price" ||
  //         // inputs[i].id === "parent_product" ||
  //         // inputs[i].id === "parent_product_id_select" ||
  //         inputs[i].id === "region" ||
  //         inputs[i].id === bin_id ||
  //         inputs[i].id === "scratcher_no_to" ||
  //         inputs[i].id === "quantity" ||
  //         inputs[i].id === "discount_amount" ||
  //         inputs[i].id === "coupon_condition_price" ||
  //         inputs[i].id === "combo_amount"
  //       ) {
  //         this.close();
  //         this._triggerEvent("onclose");
  //       } else {
  //         nextIndex = i;
  //       }
  //     }
  //   }

  //   // if (
  //   //   document.getElementById(inputs[nextIndex].id) == "store_promotion_price"
  //   // ) {
  //   //   alert("ckech focuessed");
  //   // }
  //   nextIndex = nextIndex + 1;
  //   document.getElementById(this.properties.firstFocussed.id).blur();

  //   document.getElementById(inputs[nextIndex].id).focus();
  //   // document.getElementById(inputs[nextIndex].id).trigger("click");
  //   console.log(document.getElementById(inputs[nextIndex].id), "new focused");

  //   this.properties.firstFocussed.id = inputs[nextIndex].id;
  //   console.log("selected inputs ", allIds, nextIndex, start);
  // },

  /** temp */
  checkIfHidden(id) {
    if (
      id !== "" &&
      id !== "supplier" &&
      id !== "brand_id" &&
      id !== "category"
    ) {
      // for skipping
      let el = document.getElementById(id);
      console.log(id);
      if (el.type == "hidden" || el == null) {
        console.log(el.type);
        return true;
      }
      console.log(el.type);
      return false;
    }
    return true;
  },
  setFocusable(arr) {
    this.properties.allFocusable = arr;
    console.log("props are updated", this.properties.allFocusable);
  },
  moveInput(startx) {
    let start = this.properties.firstFocussed.id;
    let inputs = document.getElementsByClassName("form-control");
    let allIds = this.properties.allFocusable;
    if (start == "store_promotion_price") {
      KeyboardNum.close();
    }
    let focussedIndex,
      nextIndex = 0;
    // category;
    for (let i = 0; i < inputs.length; i++) {
      if (Keyboard.checkIfHidden(inputs[i].id) === true) {
      } else {
        allIds.push(inputs[i].id);
      }
      //seachring
      // if (start == allIds[i]) {
      //   nextIndex = i;
      //   // alert(inputs[i].id);
      //   //  else {
      //   //       nextIndex = i;
      //   //     }
      // }
    }
    Keyboard.setFocusable(allIds);
    console.log(this.properties.allFocusable, "ff");
    for (let i = 0; i < allIds.length; i++) {
      if (start == allIds[i]) {
        nextIndex = i;
      }
    }
    console.log(
      "all focussable",
      allIds,
      allIds[nextIndex],
      allIds[nextIndex + 1],
      start
    );

    // if (allIds[nextIndex + 1] == "store_promotion_price") {
    //   // for closing
    //   KeyboardNum.close();
    // } else {
    nextIndex = nextIndex + 1;
    document.getElementById(this.properties.firstFocussed.id).blur();

    document.getElementById(allIds[nextIndex]).focus();
    // document.getElementById(inputs[nextIndex].id).trigger("click");
    console.log(document.getElementById(allIds[nextIndex]), "new focused");

    this.properties.firstFocussed.id = allIds[nextIndex];
    // }
    // console.log("selected inputs ", allIds, nextIndex, start);
  },
  // temp end
};
const Keyboard = {
  elements: {
    main: null,
    keysContainer: null,
    keys: [],
  },

  eventHandlers: {
    oninput: null,
    onclose: null,
  },

  properties: {
    value: "",
    capsLock: false,
    firstFocussed: "",
    submitButtonId: "",
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

    this.elements.keys =
      this.elements.keysContainer.querySelectorAll(".keyboard__key");

    // Add to DOM
    this.elements.main.appendChild(this.elements.keysContainer);
    document.body.appendChild(this.elements.main);
    $(".spkey").hide();
    // Automatically use keyboard for elements with .use-keyboard-input
    document.querySelectorAll(".use-keyboard-input").forEach((element) => {
      console.log(element, "xxx");
      let el = this;
      element.addEventListener("focus", (e) => {
        setTimeout(() => {
          el.properties.caret = e.target.selectionStart;
          console.log("Current position: " + e.target.selectionStart);
        }, 10);
        $(element).bind(" click keyup", function (e) {
          console.log("Current position: " + e.target.selectionStart);
          el.properties.caret = e.target.selectionStart;
        });
        console.log(element, element.tagName, "opened for");
        if (element.tagName === "TEXTAREA") {
          this._createTempInput(element);
        }

        KeyboardNum.close();
        $(".modal-dialog").addClass("moveup");
        $(".modal").addClass("moveup");
        this.open(element.value, (currentValue) => {
          let str = currentValue;
          // currentValue[this.properties.caret]
          let newLetter = str[str.length - 1];
          // str = element.value.replaceAt(this.properties.caret - 1, newLetter);
          str = addStr(element.value, this.properties.caret, newLetter);
          console.log(
            this.properties.caret,
            element.value,
            currentValue,
            str,
            newLetter
          );
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
    console.log(ctrl, "move rgiht obj");
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

  _createKeys(type) {
    const fragment = document.createDocumentFragment();
    const splkeys = [
      "!",
      "@",
      "#",
      "$",
      "%",
      "^",
      "&",
      "*",
      "(",
      ")",
      "+",
      "-",
    ];
    const keyLayout = [
      ...splkeys,
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "0",
      "backspace",
      "q",
      "w",
      "e",
      "r",
      "t",
      "y",
      "u",
      "i",
      "o",
      "p",
      "tab",
      "caps",
      "a",
      "s",
      "d",
      "f",
      "g",
      "h",
      "j",
      "k",
      "l",
      "enter",
      "done",
      "shift",
      "z",
      "x",
      "c",
      "v",
      "b",
      "n",
      "m",
      ",",
      ".",
      "?",
      "copy",
      "Paste",
      "space",
      "left",
      "right",
    ];
    const keyLayout2 = [
      "1",
      "2",
      "3",
      "4",
      "5",
      "6",
      "7",
      "8",
      "9",
      "0",
      "backspace",

      "enter",
      "done",
      ".",
    ];
    let ly;
    if (type == "full") {
      ly = keyLayout;
    } else {
      ly = keyLayout2;
    }
    // Creates HTML for an icon
    const createIconHTML = (icon_name) => {
      return `<i class="material-icons">${icon_name}</i>`;
    };

    ly.forEach((key) => {
      const keyElement = document.createElement("button");
      const insertLineBreak =
        ["backspace", "tab", "enter", "?"].indexOf(key) !== -1;

      // Add attributes/classes
      keyElement.setAttribute("type", "button");
      if (
        key == "1" ||
        key == "2" ||
        key == "3" ||
        key == "4" ||
        key == "5" ||
        key == "6" ||
        key == "7" ||
        key == "8" ||
        key == "9"
      ) {
        keyElement.classList.add("keyboard__key", "shiftkey");
      }
      if (
        key == "!" ||
        key == "@" ||
        key == "#" ||
        key == "$" ||
        key == "%" ||
        key == "^" ||
        key == "&" ||
        key == "*" ||
        key == "(" ||
        key == ")" ||
        key == "+" ||
        key == "-"
      ) {
        keyElement.classList.add("keyboard__key", "spkey");
      } else {
        keyElement.classList.add("keyboard__key");
      }

      switch (key) {
        case "backspace":
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
          keyElement.classList.add(
            "keyboard__key--wide",
            "keyboard__key--activatable"
          );
          keyElement.innerHTML = createIconHTML("capslock");

          keyElement.addEventListener("click", () => {
            this._toggleCapsLock();
            keyElement.classList.toggle(
              "keyboard__key--active",
              this.properties.capsLock
            );
          });

          break;
        case "shift":
          keyElement.classList.add(
            "keyboard__key--wide",
            "keyboard__key--activatable"
          );
          keyElement.innerHTML = createIconHTML("shift");

          keyElement.addEventListener("click", () => {
            this._toggleShift();
            keyElement.classList.toggle(
              "keyboard__key--active",
              this.properties.shift
            );
          });

          break;
        case "enter":
          keyElement.classList.add("keyboard__key--wide");
          keyElement.innerHTML = createIconHTML("enter");

          keyElement.addEventListener("click", () => {
            console.log("id is", this.properties.submitButtonId);

            $("#" + this.properties.submitButtonId).trigger("click");
            // this._triggerEvent("oninput");
            // $('input[type="submit"]').trigger("click");
            // $(".smbtn").trigger("click");
            // this.properties.value += "\n";

            // $('input[type="submit"]').trigger('click');

            //  this code is comment due to repeatation of input value on enter.
            // this._triggerEvent("oninput");

            if (this.properties.submitButtonId === "walkinsubmit") {
              let nnum = $("#customer_mobile_no").val();
              sendWalkin(nnum);
            }
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

        case "copy":

          keyElement.classList.add("keyboard__key--wide");
          keyElement.innerHTML = createIconHTML("copy");

            $("input[type=text]").focus(function () {
              keyElement.addEventListener("click", () => {

                  navigator.clipboard.writeText(this.value);
                  alert("Copied the text: "+$(this ).val());



              });
               });

          break;

        case "Paste":
          keyElement.classList.add("keyboard__key--wide");
          keyElement.innerHTML = createIconHTML("paste");

          $("input[type=text]").focus(function () {
              keyElement.addEventListener("click", () => {
              // let pasteText = $('input[type=text]')[0];
              // pasteText.value ='';
              this.value="";
              navigator.clipboard.readText().then((text)=>{
              this.value = text;
              // pasteText.value = text;
            })
          });
        });

        break;

        case "tab":
          keyElement.classList.add("keyboard__key--wide");
          keyElement.classList.add("tab_key");
          keyElement.innerHTML = createIconHTML("tab");
          let f = this.properties.firstFocussed;
          keyElement.addEventListener("click", () => {
            // this.properties.value += "\t";
            // this._triggerEvent("oninput");
            // alert('test');
            this.moveInput(f);
          });

          break;

        case "done":
          keyElement.classList.add(
            "keyboard__key--wide",
            "keyboard__key--dark"
          );
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

        default:
          keyElement.textContent = key.toLowerCase();

          keyElement.addEventListener("click", () => {
            this.properties.value += this.properties.capsLock
              ? key.toUpperCase()
              : key.toLowerCase();
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
  // _createTempInput(element) {
  //   console.log(" text");
  //   this.properties.tempEl = element;
  //   let inp = $(document.createElement("input")).attr(
  //     "class",
  //     "use-keyboard-input"
  //   );
  //   $(inp).addClass("form-control");
  //   $(inp).attr("id", "ti");
  //   console.log("inout", inp, $(element).val());
  //   $(inp).val($(element).val());
  //   $(element).replaceWith(inp);
  //   Keyboard.close();
  //   Keyboard.init("full");
  //   this.properties.tempInput = true;
  //   setTimeout(() => {
  //     $(inp).focus();
  //   }, 0);
  // },
  _createTempInput(element) {
    console.log(" text");
    this.properties.tempEl = {
      el: element,
      name: element.name,
      id: element.id,
    };
    let inp = $(document.createElement("input")).attr(
      "class",
      "use-keyboard-input"
    );
    $(inp).addClass("form-control");
    $(inp).attr("id", this.properties.tempEl.id);
    $(inp).attr("name", this.properties.tempEl.name);
    $(inp).attr("type", "text");
    console.log("inout", inp, $(element).val());
    $(inp).val($(element).val());
    $(element).replaceWith(inp);
    Keyboard.close();

    Keyboard.init("full");
    this.properties.tempInput = true;
    setTimeout(() => {
      $(inp).focus();
      // Keyboard.init("full");
    }, 0);

    // $(inp).focusout(function () {

    //   inp = $(document.createElement("TEXTAREA")).attr(
    //     "class",
    //     "use-keyboard-input"
    //   );
    //   $(inp).addClass("form-control");
    //   $(inp).attr("id", this.properties.tempEl.id);
    //   $(inp).attr("name", this.properties.tempEl.name);
    //   console.log("inout", inp, $(element).val());
    //   $(inp).val($(element).val());
    //   $(element).replaceWith(inp);
    // });
  },
  setSubmitButton(id) {
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
        key.textContent = this.properties.capsLock
          ? key.textContent.toUpperCase()
          : key.textContent.toLowerCase();
      }
    }
  },
  _toggleShift() {
    this.properties.shift = !this.properties.shift;
    console.log($(".spkey").css("display"));
    $(".spkey").toggle();
    this.properties.capsLock = !this.properties.capsLock;

    for (const key of this.elements.keys) {
      if (key.childElementCount === 0) {
        key.textContent = this.properties.capsLock
          ? key.textContent.toUpperCase()
          : key.textContent.toLowerCase();
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
    //
    if (this.properties.tempInput) {
      this.properties.tempInput = false;
      // this.properties.tempEl = {
      //   el: element,
      //   name: element.name,
      //   id: element.id,
      // };
      const { el, name, id } = this.properties.tempEl;
      let text = document.getElementById(id).value;
      console.log("el, name ,id", el, id, name, text);
      // let val = document.getElementById("ti").value;
      // console.log("valuet o ebnter", document.getElementById("ti").value);
      let inp = $(document.createElement("textarea")).attr(
        "class",
        "use-keyboard-input"
      );
      $(inp).addClass("form-control");
      $(inp).attr("id", id);
      $(inp).attr("name", name);
      // console.log("inout", inp, $(element).val());
      $(inp).val(text);
      // $(element).replaceWith(inp);
      // console.log("inout", inp);
      // $(inp).val(val);
      $("#" + id).replaceWith(inp);
      Keyboard.close();
      Keyboard.init("full");
    }
    this.properties.value = "";
    this.eventHandlers.oninput = oninput;
    this.eventHandlers.onclose = onclose;
    this.elements.main.classList.add("keyboard--hidden");
    $(".modal").removeClass("moveup");
    $(".modal-dialog").removeClass("moveup");
  },
  getInputFocus() {
    let currentFocussed = document.activeElement;
    console.log(currentFocussed, currentFocussed.id, "active one");
    return currentFocussed;
  },
  checkIfHidden(id) {
    // for skip
    if (
      id !== "" &&
      id !== "supplier" &&
      id !== "brand_id" &&
      id !== "category"
    ) {
      let el = document.getElementById(id);
      console.log(id);
      if (el.type == "hidden" || el == null) {
        console.log(el.type);
        return true;
      }
      console.log(el.type);
      return false;
    }
    return true;
  },

  setFocusable(arr) {
    this.properties.allFocusable = arr;
    console.log("props updated ", this.properties.allFocusable);
  },
  moveInput(startx) {
    let start = this.properties.firstFocussed.id;
    let inputs = document.getElementsByClassName("form-control");
    let allIds = [];
    // if (start == "store_promotion_price") {
    //   alert("close now");
    // }
    let focussedIndex,
      nextIndex = 0;
    for (let i = 0; i < inputs.length; i++) {
      if (Keyboard.checkIfHidden(inputs[i].id) === true) {
      } else {
        allIds.push(inputs[i].id);
      }
      //seachring
      // if (start == allIds[i]) {
      //   nextIndex = i;
      //   // alert(inputs[i].id);
      //   //  else {
      //   //       nextIndex = i;
      //   //     }
      // }
    }
    KeyboardNum.setFocusable(allIds);
    console.log(this.properties.allFocusable, "full keyboard");
    for (let i = 0; i < allIds.length; i++) {
      if (start == allIds[i]) {
        nextIndex = i;
      }
    }
    console.log(
      "all focussable",
      allIds,
      allIds[nextIndex],
      allIds[nextIndex + 1],
      start
    );

    // if (
    //   document.getElementById(inputs[nextIndex].id) == "store_promotion_price"
    // ) {
    //   alert("ckech focuessed");
    // }
    // if (allIds[nextIndex] == "store_promotion_price") {
    //   // for closing
    //   KeyboardNum.close();
    // } else {
    nextIndex = nextIndex + 1;
    document.getElementById(this.properties.firstFocussed.id).blur();

    document.getElementById(allIds[nextIndex]).focus();
    // document.getElementById(inputs[nextIndex].id).trigger("click");
    console.log(document.getElementById(allIds[nextIndex]), "new focused");

    this.properties.firstFocussed.id = allIds[nextIndex];

    // }
  },
};

window.addEventListener("DOMContentLoaded", function () {
  Keyboard.init("full");
  KeyboardNum.init();

  if (window.location.pathname === "/POS/a2zpos-web/customer") {
    let newSubmitId = "searchMobileNumber";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }

  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/inventoryedit" ||
    window.location.pathname === "/cashier/inventoryedit"
  ) {
    let newSubmitId = "btnSave_Edit";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }

  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/add_supplier" ||
    window.location.pathname === "/cashier/add_supplier"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }
  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/supplieredit" ||
    window.location.pathname === "/cashier/supplieredit"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }

  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/customproductedit" ||
    window.location.pathname === "/cashier/customproductedit"
  ) {
    let newSubmitId = "btnSave_Custom";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }
  if (
    window.location.pathname ===
      "/POS/a2zpos-web/cashier/scratcher_inventory_edit" ||
    window.location.pathname === "/cashier/scratcher_inventory_edit"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }

  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/edit_customer" ||
    window.location.pathname === "/cashier/edit_customer"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }
  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/edit_coupon" ||
    window.location.pathname === "/cashier/edit_coupon"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }

  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/edit_promotion" ||
    window.location.pathname === "/cashier/edit_promotion"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }

  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/createpromotion" ||
    window.location.pathname === "/cashier/createpromotion"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }

  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/createcoupon" ||
    window.location.pathname === "/cashier/createcoupon"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }
  if (
    window.location.pathname === "/POS/a2zpos-web/cashier/create_customer" ||
    window.location.pathname === "/cashier/create_customer"
  ) {
    let newSubmitId = "btnSave";

    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  }

  // if (window.location.pathname === base_url + "cashier/inventoryedit") {

  //   let newSubmitId = "btnSave_Edit";
  //   alert(newSubmitId);
  //   KeyboardNum.setSubmitButton(newSubmitId);
  //   Keyboard.setSubmitButton(newSubmitId);
  // }
  //  modalopen buttonID
  $(".invRights").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "btnSave_Edit";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });

  //  modalopen buttonID
  $("#new_register").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "pos_customer_signup";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });

  //  modalopen buttonID
  $("#editMislenius").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "btnMiscellaneous";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });
  //  modalopen buttonID
  $("#new_register").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "pos_customer_signup";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });

  //  modalopen buttonID
  $(".search_mobile_number ").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "save_customer";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });
  //  modalopen buttonID
  $("#shift_in").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "scilogin";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });
  //  modalopen buttonclass
  $(".replicatePro").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "copyinventortsubmit";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });
  //  modalopen buttonclass
  $(".buttons-pdf").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "sndMail";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });

  //  modalopen buttonclass
  $(".addinfo").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "btn_info";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });

  //  modalopen buttonclass
  $("#REQleave").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "fst_sb";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });

  //  modalopen buttonclass
  $("#REQleave").on("click", function () {
    //   SubmitButtonId
    let newSubmitId = "scnd_sb";
    KeyboardNum.setSubmitButton(newSubmitId);
    Keyboard.setSubmitButton(newSubmitId);
  });
});
// keyboard drag code start
$(document).ready(function () {
  var $dragging = null;

  $(document.body).on("mousemove", function (e) {
    if ($dragging) {
      $dragging.offset({
        top: e.pageY,
        left: e.pageX,
      });
    }
  });

  $(document.body).on("mousedown", ".dragkeeb", function (e) {
    $dragging = $(".keyboard.numone");
    console.log("widg & he", $(window).width(), $(window).height());
  });

  $(document.body).on("mouseup", function (e) {
    $dragging = null;
  });
  function doTouch(e) {
    e.preventDefault();
    var touch = e.touches[0];

    console.log("started");
  }
  function doTouch2(e) {
    e.preventDefault();
    var touch = e.touches[0];

    let r = touch.pageX;
    let w = touch.pageY;
  }
  function doTouch3(e) {
    e.preventDefault();
    var touch = e.touches[0];

    console.log("ended touch");
  }
  document.addEventListener(
    "touchstart",
    function (e) {
      setTimeout(function () {}, 0);
    },
    false
  );
  const maxMoveLeft = $(window).width();
  const maxMoveRight = $(window).height();
  $(document).on("touchstart", ".dragkeeb", function (e) {
    e.preventDefault();

    $dragging = $(".keyboard.numone");
  });
  $(document).on("touchmove", ".keyboard.numone", function (e) {
    e.preventDefault();
    var xPos = e.originalEvent.touches[0].pageX;
    var yPos = e.originalEvent.touches[0].pageY;
    let spaceTaken = $(".keyboard.numone")[0].getBoundingClientRect();

    $dragging.offset({
      top: yPos,
      left: xPos,
    });
  });
  $(document).on("touchend click", ".cancelkeeb", function (e) {
    $dragging = null;
    e.preventDefault();
    $(".keyboard.numone").hide();
    $(".keyboard.numone").addClass("keyboard--hidden");
    $(".modal").removeClass("moveup");
    $(".modal-dialog").removeClass("moveup");
  });
  function resetKeebPosition() {
    $(".keyboard.numone").css("top", "unset");
    $(".keyboard.numone").css("left", "unset");
    console.log("ths ran");
  }
  $(document).on("touchend click", ".dragkeeb", function (e) {
    $dragging = null;
    e.preventDefault();
    rect = $(".keyboard.numone")[0].getBoundingClientRect();

    if (
      rect.x + rect.width > window.innerWidth ||
      rect.y + rect.height > window.innerHeight
    ) {
      resetKeebPosition();
    }
  });
});
// keyobard drag code end

// keeb close on outside click
$(document).on("click", "body", function (e) {
  var container = $(".keyboard");
  if (!container.is(e.target) && container.has(e.target).length === 0) {
    if (!$("input").is(":focus")) {
      // console.log("Outerrrrr");
      KeyboardNum.close();
      Keyboard.close();
    }
  } else {
    console.log("Inerrrrr");
  }
});
