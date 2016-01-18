$( document ).ready(function() {
  // Hide the loading gif asap
  $("#loadingSpinner").hide();

  // Bind the AJAX call, the pretty transitions to the search button onclick
  $( "#searchButton" ).on("click", function() {
    // Do some clean up first..
    $(".img-element").remove();
    $(".errors").hide();
    $(".info").fadeOut(100, function() {
      $("#loadingSpinner").fadeIn(100);
    });

    var input = $("#searchInput").val();

    $.get("/search/" + encodeURI(input), function(response) {
      $("#loadingSpinner").fadeOut(200);

      $.each(response[0].data, function(idx, element) {
        // Just doing a little more processing here to make the
        // captions look neater.
        var captionText = element.caption.text.length > 80 ? 
          element.caption.text.substring(0, 80) + '...' :
          element.caption.text;

        // If the caption contains no spaces then we prevent an overflow by
        // truncating it early.
        captionText = (captionText.indexOf(' ') > 36 || captionText.indexOf(' ') == -1) ? 
          captionText.substring(0, 50) + '...' :
          captionText;

        var username = '<div class="username">' +
          '<div style="display: table-cell; vertical-align: middle;">' +
          '<div><strong>' + element.user.username + '</strong></div></div></div>'

        // Here we form the overlay that's hidden until a mousehover occurs
        var text = '<div class="four columns" style="overflow:hidden">'
          + username + '</div><div class="eight columns caption">'
          + captionText + '</div>';

        var imageElement = '<div class="img-container"><img class="img-element" src="' 
          + element.images.standard_resolution.url
          + '"><div class="img-text"><div class="row">' + text + '</div></div></div>';

        $("#imagesContainer").append(imageElement).hide().fadeIn();
      });

    }).fail(function(response) {
      $("#loadingSpinner").fadeOut(200, function() {
        $(".errors").empty().show();
        $.each(response.responseJSON.input, function(idx, element) {
          $(".errors").append("<p>" + element + "</p>");
        });
      });
    }).done(function() {
        $(".img-container").hover(function(){
          $(this).find(".img-text").fadeIn(200);
        }, function(){
          $(this).find(".img-text").fadeOut(200);
        });
    });
  });
});