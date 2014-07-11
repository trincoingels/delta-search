$(function () {

  // Here comes the code for the actual search page

  var selectedContext = null;

  $('[data-context]').click(function (e) {
    e.preventDefault();
    selectedContext = $(this).attr('data-context');
    if (selectedContext == 'null') selectedContext = null;

    $('[data-context]').removeClass('active');
    $(this).addClass('active');

    if (selectedContext != null) {
      $('[data-contexts]').hide();
      $('[data-contexts*='+selectedContext+']').fadeIn();
    } else {
      $('[data-contexts]').fadeIn();
    }


    if (selectedContext != null)
      $('.search-everywhere').fadeIn();
    else
      $('.search-everywhere').fadeOut();

    var count = $(this).attr('data-count');

    if (count == 1)
      var zoekresultaten = 'zoekresultaat';
    else
      var zoekresultaten = 'zoekresultaten';

    if (selectedContext != null)
      $('.count-string').text(count+' '+zoekresultaten+' in de context '+$(this).attr('data-context-name'));
    else
      $('.count-string').text(count+' '+zoekresultaten+'');

  });

});