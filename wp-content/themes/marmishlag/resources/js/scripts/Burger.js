jQuery(document).ready(function ($) {
  $("#nav-burger").click(function () {
    $("#header__center").toggleClass("translate-x-full");
    $("#header__ul").toggleClass("hidden");
  });

  $("#header__ul li").click(function () {
    $("#header__center").toggleClass("translate-x-full");
   
  });

  $("#header__ul .c-dropdown li").click(function () {
    $("#header__center").toggleClass("translate-x-full");
   
  });

});
