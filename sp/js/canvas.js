var canvas, ctx, animation;

$(document).ready(function(){
  canvas = document.getElementById('canvas');
  ctx = canvas.getContext('2d');
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  draw();
});

$(window).resize(function(){
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
  if(animation){
      clearInterval(animation);
  }
  draw();
});

function draw(){
  var n = 10;
  var e = 0.9;  //反発係数
  var g = 0.5;

  var logn = 128;
  var logIndex = 0;
  var logr = new Array(logn);
  var logs = new Array(logn);
  var logt = new Array(logn);

  var c = new Array(n);
  for(var i = 0; i<n; i++){
    c[i] = {
        r: 3+Math.floor(Math.random()*20),
        m: 0,
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        vx: -1+Math.random()*2,
        vy: -1+Math.random()*2
    };
    c[i].m = c[i].r * c[i].r;

    if(c[i].x < c[i].r || c[i].x > canvas.width - c[i].r){
      i--;
      continue;
    }
    if(c[i].y < c[i].r || c[i].y > canvas.height - c[i].r){
      i--;
      continue;
    }

    var hit = false;
    for(var j = 0; j<i; j++){

      var rr = c[i].r + c[j].r; //radius summary

      var dx = c[i].x + c[i].vx - (c[j].x + c[j].vx);
      if(Math.abs(dx) > rr) continue;

      var dy = c[i].y + c[i].vy - (c[j].y + c[j].vy);
      if(Math.abs(dy) > rr) continue;

      if(dx*dx+dy*dy < rr*rr){
        hit = true;
        break;
      }

    }

    if(hit){
      i--;
      continue;
    }

  }

  animation = setInterval(function(){
    // Hit test
    var i,j;
    for(i = 1; i<n; i++){
      for(j = 0; j<i; j++){
        var rr = c[i].r + c[j].r;
        var dx = c[i].x + c[i].vx - (c[j].x + c[j].vx);
        if(Math.abs(dx) > rr) continue;
        var dy = c[i].y + c[i].vy - (c[j].y + c[j].vy);
        if(Math.abs(dy) > rr) continue;
        // Hit!
        if(dx*dx+dy*dy < rr*rr){
          /*
          var nvxa = ((c[i].m - e * c[j].m) * c[i].vx + (1 + e) * c[j].m * c[j].vx) / (c[i].m + c[j].m);
          var nvxb = ((c[j].m - e * c[i].m) * c[j].vx + (1 + e) * c[i].m * c[i].vx) / (c[i].m + c[j].m);
          var nvya = ((c[i].m - e * c[j].m) * c[i].vy + (1 + e) * c[j].m * c[j].vy) / (c[i].m + c[j].m);
          var nvyb = ((c[j].m - e * c[i].m) * c[j].vy + (1 + e) * c[i].m * c[i].vy) / (c[i].m + c[j].m);
          */
          var normcx = (c[j].x - c[i].x) / Math.sqrt((c[j].x - c[i].x)*(c[j].x - c[i].x)+(c[j].y - c[i].y)*(c[j].y - c[i].y));
          var normcy = (c[j].y - c[i].y) / Math.sqrt((c[j].x - c[i].x)*(c[j].x - c[i].x)+(c[j].y - c[i].y)*(c[j].y - c[i].y));
          var dot = (c[j].vx - c[i].vx) * normcx + (c[j].vy - c[i].vy) * normcy;
          var vxi = (1 + e) * c[j].m / (c[i].m + c[j].m) * dot * normcx + c[i].vx;
          var vyi = (1 + e) * c[j].m / (c[i].m + c[j].m) * dot * normcy + c[i].vy;
          var vxj = (1 + e) * c[i].m / (c[i].m + c[j].m) * (-dot) * normcx + c[j].vx;
          var vyj = (1 + e) * c[i].m / (c[i].m + c[j].m) * (-dot) * normcy + c[j].vy;

          //console.log("Hit! ball <"+h+"> & <"+i+">  v :("+nvxa+","+nvya+"), ("+nvxb+","+nvyb+")\n");

          c[i].vx = vxi;
          c[i].vy = vyi;
          c[j].vx= vxj;
          c[j].vy= vyj;

          logr[logIndex] = j;
          logs[logIndex] = i;
          logt[logIndex] = 10;
          logIndex++;

          if (logIndex == logn) logIndex = 0;

        }
      }
    }

    // Move
    for(i = 0; i<n; i++){
      if(c[i].x < c[i].r || c[i].x > canvas.width - c[i].r) c[i].vx *= -1;
      if(c[i].y < c[i].r || c[i].y > canvas.height - c[i].r ) c[i].vy *= -1;

      c[i].x += c[i].vx;
      c[i].y += c[i].vy;
      //c[i].y += g; // if using gravity
    }


    ctx.fillStyle = '#000';
    ctx.fillRect(0,0,canvas.width, canvas.height);

    for(i = 0; i<n; i++){

      ctx.beginPath();
      ctx.fillStyle = '#333';
      ctx.arc(c[i].x, c[i].y, c[i].r, 0, Math.PI*2, true);
      ctx.fill();

      ctx.strokeStyle = '#333';
      var v;
      for(v = 0; v<n; v++){
        line(c[i].x, c[i].y, c[(i+v)%n].x, c[(i+v)%n].y);
      }
    }

    /*for(var i = 0; i<logn; i++){
      if(logt[i]>0){
        var p = logr[i];
        var q = logs[i];
        ctx.strokeStyle = '#f00';
        line(c[p].x, c[p].y, c[q].x, c[q].y);
      }
    }*/

  }, 1000/60);
}

function line(startX,startY,endX,endY){
  ctx.beginPath();
  ctx.moveTo(startX,startY);
  ctx.lineTo(endX,endY);
  ctx.stroke();
}
