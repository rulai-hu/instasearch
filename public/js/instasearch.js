$( document ).ready(function(){
  $( "#searchButton" ).on( "click", function() {
    var val = $("#searchInput").val();

    $.get("/search/" + encodeURI(val), function(data) {
        $.each(data[0].data, function(idx, element) {
            $(".results").append("<img class=\"imgElement\" src=" + element.images.thumbnail.url + ">")
        });

    });
  });
});