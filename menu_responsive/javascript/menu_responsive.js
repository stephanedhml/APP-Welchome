
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script>
$(function() {
    var pull 		= $('#pull');
    menu 		= $('nav ul');
    menuHeight	= menu.height();

    $(pull).on('click', function(e) {
        menu.slideToggle();
    });
    // Lorsque le menu responsive est activé, le menu est hidden, si on retourne en taille normale il faut faire ressurgir le menu
    $(window).resize(function(){
        var w = $(window).width();
        if(w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
});
</script>