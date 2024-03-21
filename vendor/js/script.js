//var rcp = document.getElementById('rc');

var ClickHOne = document.querySelector(".right-layer");
var count = 0;

var gvalue = 14.5;
//window.onload=ch(flag);
// function ch(flag){
//   var elem = document.querySelectorAll(".card");
//   for (var i = 0; i < flag; i++) {
//     elem[i].classList.remove("check");
//     elem[i].children[0].children[0].checked = false;
//     elem[i].children[0].children[0].setAttribute("disabled", "true");
//     elem[i].classList.add("disabled");
//   }

//   elem[flag].classList.add("check");
//   elem[flag].children[0].children[0].checked = true;
// }

function abc(flag,re) {
  var progre = document.getElementById("progress");
  var progresNum = document.getElementById("prgssPor");
  var Upeerelm = document.querySelector(".uper-footer");
  if(progre.value == 87.5){
    document.getElementById("switch").innerText = "Terminer";
    document.getElementById("switch").disabled = true;
}
  if(re){
    gvalue = 14.5*(flag);
    progre.value = gvalue;
    progresNum.innerHTML = Math.round(gvalue) + "%";
    if (flag >= 4) {
      Upeerelm.style.transform = "translateX(-70%)";
    }
    
    gvalue += 14.5
    return;
  }
}

    
  
  // if (gvalue <= 100) {
  //   progre.value = gvalue;
  //   progresNum.innerHTML = Math.round(gvalue) + "%";
  //   var num = swirch(flag-1);
  //   if (num === 3) {
  //     Upeerelm.style.transform = "translateX(-85%)";
  //   }
  //   gvalue += 12.5;
  // }
//}
function toggle(which, theClass) {
  var checkbox = document.querySelectorAll(theClass);
  console.log(checkbox);
  for (var i = 0; i < checkbox.length; i++) {
    if (checkbox[i] == which) {
    } else {
      checkbox[i].checked = false;
    }
  }
}
function swirch(flag) {
  var elem = document.querySelectorAll(".card");

  console.log(elem);
  // var elem = document.querySelectorAll(".card");
  // for (var i = 0; i < flag; i++) {
  //   elem[i].classList.remove("check");
  //   elem[i].children[0].children[0].checked = false;
  //   elem[i].children[0].children[0].setAttribute("disabled", "true");
  //   elem[i].classList.add("disabled");
  // }

  // elem[flag].classList.add("check");
  // elem[flag].children[0].children[0].checked = true;

  for (var i = flag; i < elem.length; i++) {
    if (
      elem[i].classList.length == 2 &&
      elem[i].classList[1] === "check" &&
      i < elem.length - 1
    ) {
      console.log(elem[i].classList)
      elem[i].classList.remove("check");
      elem[i].children[0].children[0].checked = false;
      elem[i].children[0].children[0].setAttribute("disabled", "true");
      elem[i].classList.add("disabled");
      elem[i + 1].classList.add("check");
      elem[i + 1].children[0].children[0].checked = true;
      return i;
    }
  }
}
function desacOverFlow(){
  var ins = document.getElementById("ins")
  ins.style.display = "none";
  document.forms[0].addEventListener('submit',(e)=>{
    e.preventDefault();
  });
  console.log('true');
}


function rcaptcha() {
  const rd = Math.floor(Math.random() * 9000) + 1000;
  return rd;
}


const rcaptch = rcaptcha();
document.getElementById("rcp").value = rcaptch;


document.forms[0][2].addEventListener("focusout", (e) => {
  if(rcaptchaCheck() == false){
    document.forms[0][2].classList.add('error');
  }
  else{
    document.forms[0][2].style.borderBottomColor="Black";
  }
});

function rcaptchaCheck() {
  var rc = document.getElementById("rc").value;
  if (parseInt(rc) === parseInt(rcaptch)) {
    return true;
  } else {
    return false;
  }
}

document.forms[0].addEventListener("submit", (e)=>{
  if(rcaptchaCheck() == false){
    alert('reCaptcha incorrect');
    e.preventDefault();
  }
})
