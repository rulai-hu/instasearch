$( document ).ready(function() {
  $("#loadingSpinner").hide();
  $( "#searchButton" ).on( "click", function() {
    $(".img-element").remove();
    $(".errors").hide();
    $(".info").fadeOut(100, function() {
      $("#loadingSpinner").fadeIn(100);
    });
    var val = $("#searchInput").val();

    $.get("/search/" + encodeURI(val), function(response) {
      $("#loadingSpinner").fadeOut(200);

      $.each(response[0].data, function(idx, element) {
        var str = "<img class=\"img-element\" src=\"" + element.images.standard_resolution.url + "\">";
        $("#imagesContainer").append(str).hide().fadeIn();
      });

    }).fail(function(response) {
      $("#loadingSpinner").fadeOut(200, function() {
        $(".errors").empty().show();
        $.each(response.responseJSON.input, function(idx, element) {
          $(".errors").append("<p>" + element + "</p>");
        });
      });
    });
  });
});