// A $( document ).ready() block.
$( document ).ready(function() {
    $(".hamburger").click(function(){
        $("nav").slideToggle();
        console.log('ok');
    });
});