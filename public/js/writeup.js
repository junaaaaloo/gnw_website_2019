$(document).ready(function() {

    $('#comment-writeup').each(function() {
        word_count();
        $(this).keyup(function() { word_count() });
    });

});

function word_count() {

    var number = 0;
    var matches = $('#comment-writeup').val().match(/\b/g);
    if(matches) {
        number = matches.length/2;
    }
    $('#words-left').text( (80-number) + ' word' + (number != 1 ? 's' : '') + ' left');

    if((80-number) < 0) {
        $("#writeupbtn").attr("disabled", "disabled");
        $("#status").val("dlsu0gnw");
    } else {
        $("#writeupbtn").removeAttr("disabled");
        $("#status").val("dlsu1gnw");
    }

}