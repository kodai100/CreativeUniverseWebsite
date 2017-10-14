//NavResize
$(document).on("scroll",function(){
  if ($(document).scrollTop() > window.innerHeight){
    $("#navbar").removeClass('bottom').addClass('top');
    $("#navbar").css({'bottom': '', 'top': 0});
  }
  else{
    $("#navbar").removeClass('top').addClass('bottom');
    $("#navbar").css({'bottom': 0, 'top': ''});
  }
});


$(document).ready( function(){
  $("#navbar").css('bottom', 0);
  $("#dArrow img").css('left', (window.innerWidth / 2) - 35);
});
