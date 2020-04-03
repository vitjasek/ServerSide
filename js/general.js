function showBurgerMenu() {
  var x = document.getElementById("mobile_menu");
  if(x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

document.addEventListener('DOMContentLoaded', function() {
  var pass = document.getElementById("pwd");
  var passRep = document.getElementById("pwd-repeat");
  passRep.onkeyup = function() {
      if(pass.value !== passRep.value) {
          document.getElementById("message").style.display = "block";
      } else {
          document.getElementById("message").style.display = "none";
      }
  };
})

