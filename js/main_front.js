jQuery(document).ready(function($) {

  $('.but').click(function(event) {
    /* Act on the event */
    $(this).toggleClass('expand');
    $(this).next('.cont').toggleClass('expand');
  });

});