(function() {
  $(function() {
    return $('#navicon').click(function() {
      $(this).toggleClass('expanded');
      return $('#mobile-nav').toggleClass('expanded');
    });
  });

}).call(this);
