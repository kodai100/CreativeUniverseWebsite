var animation;

$(window).ready(function(){
    init();
});

$(document).load(function(){
    initGeom();
});

$(window).resize(function(){
    init();
});

function init(){
    iniGeom();
    iniCanvas();
};

function iniGeom(){
    var wHeight = $(window).innerHeight();
    var wWidth = document.body.clientWidth;
    var rWidth = wWidth - 180;


    $("#title").css("height", wHeight + "px");
    var logoPos = wHeight/2 - $("#biglogo").height()/2;
    $("#biglogo").css("margin-top", logoPos + "px");

    $("#about").css("height", wHeight + "px");

    $(".article").css("width", rWidth/3 + "px");
    $(".article").css("height", $(".article").width()*9/16 - 10 +"px");

};

function iniCanvas(){
    sizing();
    var canvas = document.getElementById('canvas');
    //複数インターバルが存在するのを防止
    if(animation){
        clearInterval(animation);
    }

    Draw1(canvas);

};

function sizing(){
    $('#canvas').attr({height:$('#bg').height()});
    $('#canvas').attr({width:$('#bg').width()});
};
