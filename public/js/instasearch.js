$( document ).ready(function(){
  $( "#searchButton" ).on( "click", function() {
    var val = $("#searchInput").val();

    $.get("/search/" + encodeURI(val), function(data) {
      $.each(data[0].data, function(idx, element) {
        var str = "<img class=\"img-element\" src=\"" + element.images.standard_resolution.url + "\">";
        $("#imagesContainer").append(str);
      });

    });
  });
});