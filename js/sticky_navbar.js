$(document).ready(function() {
  //change the integers below to match the height of your upper dive, which I called
  //banner.  Just add a 1 to the last number.  console.log($(window).scrollTop())
  //to figure out what the scroll position is when exactly you want to fix the nav
  //bar or div or whatever.  I stuck in the console.log for you.  Just remove when
  //you know the position.
  $("#mymain-header-fix").hide();
  $(window).scroll(function () { 

    console.log($(window).scrollTop());

    if ($(window).scrollTop() > 60) {

     // $('#slogan').fadeOut(300);
      $('#mymain-header-fix').fadeIn(500);
      
      //$('#mymain-header').addClass('navbar-fixed-top').fadeIn(1000);
     
     
    }

    if ($(window).scrollTop() < 50) {
      //$('#slogan').fadeIn(300);
       $('#mymain-header-fix').fadeOut(500);

      //$('#mymain-header').removeClass('navbar-fixed-top').fadeOut(1000);

     // $('#slogan').addClass('navbar-fixed-top');
    }
  });

  
  
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
});