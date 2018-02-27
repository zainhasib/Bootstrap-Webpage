$('#search-btn').on("click", function(e) {
    /* e.preventDefault(); */
    value = $('#search-input').val();
    console.log(value);
});

$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});

$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});