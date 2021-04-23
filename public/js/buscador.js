// constructs the suggestion engine
var products = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.whitespace,
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: '/search/json'
});
$('#buscar').typeahead({
    hint: true,
    highlight: true,
    minLength: 1,
}, {
    name: 'products',
    source: products
});
