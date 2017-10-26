$(document).ready(function(){
    $('.hide-tr').toggle();
    $('.hide-tr').fadeOut();
    $('.abcde a').click(function(){
        var id = '#tr'+$(this).attr("id");
        $(id).fadeToggle();
    });
});
