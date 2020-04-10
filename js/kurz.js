$(document).ready(function () {
  obsah_stranky();
});

$(document)
  .on("click", ".js_odpoved", function() {
   odpoved($(this).attr("data-answer"));
  })
  .on("click", ".js_next", function() {
    obsah_stranky();
   })
   .on("click", ".js_zavrit_kurz", function(){
    konec_kurzu();
   })


function konec_kurzu(){
  $.ajax({
    type: "post",
    url: "kurz.php",
    async: true,
    data: {
      act: "konec",
    },
    dataType: "text",
  }).done(function(data){
    window.location.href = "kurzy.php";
  });
}


function odpoved(answer){
  $.ajax({
    type: "post",
    url: "kurz.php",
    async: true,
    data: {
      act: "odpoved",
      answer: answer
    },
    dataType: "html",
    success: function (response) {
      $("#js_odpoved").html(response);
    }
  });
}

function obsah_stranky(){
  $.ajax({
    type: "post",
    url: "kurz.php",
    async: true,
    data: {
      act: "html"
    },
    dataType: "html",
    success: function (response) {
      if(response.length > 10) $("#js_main_section").html(response);
    }
  });
}