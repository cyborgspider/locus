$ ->
  $('#navicon').click ->
    $(@).toggleClass 'expanded'
    $('#mobile-nav').toggleClass 'expanded'
