//menu language

$(function () {
  $('.pll-parent-menu-item').on('click', function () {
    console.log('clicked');
    $('.sub-menu').toggle('medium');
  })

  //mobile menu appearance
  $('.ham').on('click', function () {
    console.log('owwww');
    $("#menu-mainmenu").toggle('medium'); //здесь нужно добавить класс языка
  });
  /* $('.menu-item').on('click', function () {
    $("#menu-mainmenu").toggle('medium'); //здесь нужно добавить класс языка
  }); */

  // вернуть меню если экран больше мобильного
  $(window).resize(function () {
      var screen = $(window).width();
      console.log( "screen is = " + screen );
      if (screen > 1232) {
        $("#menu-mainmenu").show('medium');
      } else if (screen < 845) {
        $('.header').addClass('fixed-head');
      }
  });
}); //end ready
