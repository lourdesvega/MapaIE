

$(document).ready(function () {
    $('#buscar').autocomplete('disable');
    $('#buscar').autocomplete({
        type: 'GET',
        serviceUrl: "/autocomplete1",
        onSelect: function () {
        },
        onSearchComplete: function () {
        }
    });
    
});
