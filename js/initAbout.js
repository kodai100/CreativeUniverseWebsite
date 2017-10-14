var animation;

$(window).ready(function(){
    init();
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

    $("#about").css("height", wHeight + "px");
    $("#aboutWeb").css("height", wHeight + "px");
    $("#profile").css("height", wHeight + "px");

};

function iniCanvas(){
    sizing();
    var canvas = document.getElementById('canvas');
    //複数インターバルが存在するのを防止
    if(animation){
        clearInterval(animation);
    }
    
    var drawFunc = Math.floor(Math.random()*4);
    switch(drawFunc){
        case 0 : 
            Draw1(canvas); 
            break;
        case 1:
            Draw2(canvas);
            break;
        case 2:
            Draw3(canvas);
            break;
        case 3:
            Draw4(canvas);
            break;
        default:
            Draw1(canvas);
            break;
    }
};

function sizing(){
    $('#canvas').attr({height:$('#bg').height()});
    $('#canvas').attr({width:$('#bg').width()});
};
