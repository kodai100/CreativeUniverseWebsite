$(window).ready(function(){
    iniGeom();
});

$(window).resize(function(){
    iniGeom();
});

function iniGeom(){
    var wWidth = document.body.clientWidth;

      $("#main").css("width", wWidth - 200 + "px");
      $(".article").css("width", ($("#main").width()-180)/3 + "px");
      $(".article").css("height", $(".article").width()*9/16 +"px");

      $("#right").css("height", $("#main").height());

};
