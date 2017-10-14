//initialize

$(document).ready(function(){
  console.log($('#navbar').height());
    $("#logo").css('height', window.innerHeight - $('#navbar').height());
    $("#lphoto").css('padding-top', (window.innerHeight-366)/2);    //311=ウェルカム画像+矢印の高さ
    $(".fullwindow").css('height', window.innerHeight - $('#navbar').height());
    $(".last-content").css('height', window.innerHeight - 92);
});

$(window).resize(function(){
    $("#logo").css('height', window.innerHeight - $('#navbar').height());
    $("#lphoto").css('padding-top', (window.innerHeight-366)/2);    //311=ウェルカム画像+矢印の高さ
    $(".fullwindow").css('height', window.innerHeight - $('#navbar').height());
    $(".last-content").css('height', window.innerHeight - 92);
});
