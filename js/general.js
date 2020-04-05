function showBurgerMenu() {
  var x = document.getElementById("mobile_menu");
  if(x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function passCheck(){
  var pass = $("#pwd").val();
  var passRep = $("#pwd-repeat").val();
  if(pass !== passRep) {
    $("#message").show();
    return false;
  }
}

