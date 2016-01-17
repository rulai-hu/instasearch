<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Instasearch</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/skeleton.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/instasearch.css') }}">
  </head>
  <body>
    <div class="banner">
      <div class="container">
        <div class="row">
          <div class="offset-by-three six columns text-center title">
            <h2>InstaSearch</h2>
          </div>
        </div>

        <div class="row">
          <div class="offset-by-three six columns search-input">
            <input class="u-full-width" type="text" id="searchInput" placeholder="input type">
          </div>
        </div>

        <div class="row">
          <div class="offset-by-four four columns search-button text-center">
            <button class="button-primary u-full-width" id="searchButton">Search</button>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="results"></div>
      </div>
    </div>

    <script src="{{ asset('js/instasearch.js') }}"></script>

  </body>
</html>