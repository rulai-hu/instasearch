<!DOCTYPE html>
<html>
    <head>
        <title>Instasearch</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{{ asset('css/instasearch.css') }}">
    </head>
    <body>
        <div class="container">
            <div class="content" id="imagesBody">
                <div class="title">InstaSearch</div>
                <!-- <form action="demo_form.asp"> -->
                    <input type="text" id="searchInput" name="fname"></br>
                    <button id="searchButton">Search</button>
                <!-- </form> -->
                <div id="imagesDiv">
                    <!-- <img src="https://scontent.cdninstagram.com/hphotos-xpf1/t51.2885-15/s150x150/e35/c135.0.810.810/12407467_1259312484095593_713811279_n.jpg"> -->
                </div>
            </div>
        </div>
        <script>
            $( document ).ready(function(){
                $( "#searchButton" ).on( "click", function() {
                    var val = $("#searchInput").val();

                    $.get( "/search/" + encodeURI(val), function( data ) {
                        $.each(data[0].data, function(idx, element) {
                            $("#imagesDiv").append("<img class=\"imgElement\" src=" + element.images.thumbnail.url + ">")
                        });

                    });
                });
            });
        </script>
    </body>
</html>