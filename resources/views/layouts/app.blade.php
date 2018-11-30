<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
{{-- 
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>

<script>
var client = algoliasearch('BFBHHRFHJ5', '28035e0d1044cc3b6fa5144553a0f22a');
var index = client.initIndex('books');
//initialize autocomplete on search input (ID selector must match)
autocomplete('#aa-search-input',
{ hint: false }, {
    source: autocomplete.sources.hits(index, {hitsPerPage: 5}),
    //value to be displayed in input control after user's suggestion selection
    displayKey: 'name',
    //hash of templates used when rendering dataset
    templates: {
        //'suggestion' templating function used to render a single suggestion
     suggestion: function(result) {
          return '<span>' +
            result._highlightResult.title+ '</span><span>' +
            result._highlightResult.author + '</span>';
        },

        empty: function(result){

            return 'Sorry we did not find what you are looking for "'+ result.query +'"'
        }
    }
});
</script> --}}
     
</head>
<body style="padding-bottom: 100px ">
    <div id="app">
        @include('layouts.nav')
        @yield('content')

    <flash message="{{ session('flash') }}"></flash>
    </div>
</body>

   <footer class="text-muted">
      <div class="container">
        <p class="float-right">
          <a href="#">Back to top</a>
        </p>
        <p>BookPal Corps all Rights reserved</p>
      </div>
    </footer>
</html>