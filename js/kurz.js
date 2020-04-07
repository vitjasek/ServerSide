$(document).ready(function () {

});

$(document)
  .on("click", ".js_odpoved", function() {
   odpoved($(this).attr(data-answer));
  })

  function odpoved(answer){

    $.ajax({
      type: "post",
      url: "kurz.php",
      async: true,
      data: {
        act: "answer",
        answer: answer
      },
      dataType: "html",
      success: function (response) {
        $("#polozka").html(response);
      }
    });

}