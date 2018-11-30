(function (){



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
             suggestion: function(suggestion) {
                  return '<span>' +
                    suggestion.title+ '</span><span>' +
                    suggestion.author + '</span>';
                }
            }
    });
} )();