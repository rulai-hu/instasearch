<!DOCTYPE html>
<html lang="en">
  <head>
    <title>InstaSearch</title>

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
          <div class="offset-by-three six columns text-center">
            <h2 class="title">InstaSearch</h2>
          </div>
        </div>
        <form action="/#">
          <div class="row">
            <div class="offset-by-three six columns search-input">
              <input class="u-full-width" type="text" id="searchInput" placeholder="Search Instagram...">
            </div>
          </div>

          <div class="row">
            <div class="offset-by-four four columns search-button text-center">
              <button type="submit" class="button-primary u-full-width" id="searchButton" autofocus>Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="results">
      <div class="container"></div>
        <div class="errors text-center"></div>
        <div id="imagesContainer" class="text-center">
          <div id="loadingSpinner">
            <img src="{{ asset('img/loading.gif') }}">
            <p><strong>Loading Data</strong></p>
          </div>
          <p class="info text-center">No images loaded.</p>
        </div>
      </div>
    </div>

    <script src="{{ asset('js/instasearch.js') }}"></script>

  </body>
</html>