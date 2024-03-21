
//Next transistion
document.querySelectorAll('.btn-suivant').forEach(function(btn) {
  btn.addEventListener('click', () => {
      console.log(btn);
      var itms = document.querySelectorAll("#progress-itms");
      for (var i = 0; i <= itms.length; i++) {
          if (itms[i].className === "is-active" ) {
              itms[i].classList.remove("is-active");
              itms[i+1].classList.add("is-active");
              btn.setAttribute('onclik','quitter()');
              cradToogle();
              return true;
          }
          // if(i === itms.length  ){
          //     alert('last');
          // }
      }

  })
});

//Toogle betwen card
function cradToogle() {
  var cards = document.querySelectorAll(".card");
  for (var i = 0; i < cards.length; i++) {
      if (
          cards[i].classList.length === 2 &&
          cards[i].classList[1] === "card-active" && i + 1 <= cards.length
      ) {
          cards[i].classList.remove("card-active");
          cards[i + 1].classList.add("card-active");
          return i;
      }
  }
}

//empecher le tapage de alpha
const input = document.getElementById("number");
input.onkeydown = (evt) => {
  const charCode = evt.keyCode;
  if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57)) {
    evt.preventDefault();
  }
};
