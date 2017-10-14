var ctx;
var menuWidth = 180;

function Draw1(canvas){
  ctx = canvas.getContext('2d');
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
        r: 10+Math.floor(Math.random()*90),
        m: 0,
        x: Math.random() * canvas.width,
        y: Math.random() * canvas.height,
        vx: -1+Math.random()*2,
        vy: -1+Math.random()*2
    };
    c[i].m = c[i].r * c[i].r;

    if(c[i].x < c[i].r + menuWidth || c[i].x > canvas.width - c[i].r){
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
      if(c[i].x < c[i].r + menuWidth|| c[i].x > canvas.width - c[i].r) c[i].vx *= -1;
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

// Many points
function Draw2(canvas){
    ctx = canvas.getContext('2d');
    var n = 60;
    var circles = new Array(n);

    for(var i = 0; i<n; i++){
        circles[i] = {
            radius: 4,
            x: 230+Math.random()*(canvas.width-230),
            y: 50+Math.random()*(canvas.height-50),
            speedX: Math.random()*10,
            speedY: Math.random()*10
        };
    }

    animation = setInterval(function(){

        for(var i = 0; i<n; i++){
          circles[i].x += circles[i].speedX;
          circles[i].y += circles[i].speedY;
          if(circles[i].x < circles[i].radius+180 || circles[i].x > canvas.width-circles[i].radius){
              circles[i].speedX *= -1;
          }
          if(circles[i].y < circles[i].radius || circles[i].y > canvas.height-circles[i].radius){
              circles[i].speedY *= -1;
          }
        }

        ctx.fillStyle = '#000';
        ctx.fillRect(0,0,canvas.width, canvas.height);

        for(var i = 0; i<n; i++){
            ctx.beginPath();
            ctx.fillStyle = '#333';
            ctx.arc(circles[i].x, circles[i].y, circles[i].radius*2, 0, Math.PI*2, true);
            ctx.fill();
        }

    }, 1000/60);
}

// Orbit
function Draw3(canvas){
    ctx = canvas.getContext('2d');
    var n = 10;
    var circles = new Array(n);

    for(var i = 0; i<n; i++){
        circles[i] = {
            radius: Math.random()*20,
            orbital: 100*(i+1),
            speed: Math.random()*2
        };
    }


    var theta = 0;
    animation = setInterval(function(){
        ctx.fillStyle = '#000';
        ctx.fillRect(0,0,canvas.width, canvas.height);

        for(var i = 0; i<n; i++){
            ctx.beginPath();
            ctx.fillStyle = '#333';
            ctx.arc(90+canvas.width/2+circles[i].orbital*Math.cos(theta/100*circles[i].speed), canvas.height/2+circles[i].orbital*Math.sin(theta/100*circles[i].speed), circles[i].radius*2, 0, Math.PI*2, true);
            ctx.fill();

            ctx.beginPath();
            ctx.strokeStyle = '#333';
            ctx.arc(90+canvas.width/2, canvas.height/2, circles[i].orbital, 0, Math.PI*2, true);
            ctx.stroke();
        }

        theta++;

    }, 10);
}

// 結界
function Draw4(canvas){
  ctx = canvas.getContext('2d');
  var n = 3;

  var theta = 0;
  animation = setInterval(function(){
    ctx.fillStyle = '#000';
    ctx.fillRect(0,0,canvas.width, canvas.height);

    for(var i = 0; i<n; i++){
      ctx.beginPath();
      ctx.fillStyle = '#333';
      ctx.arc(90+canvas.width/2+300*Math.cos(theta/100+i*Math.PI*2/3), canvas.height/2+300*Math.sin(theta/100+i*Math.PI*2/3), 50, 0, Math.PI*2, true);
      ctx.fill();

      ctx.beginPath();
      ctx.strokeStyle = '#333';
      ctx.arc(90+canvas.width/2, canvas.height/2, 300, 0, Math.PI*2, true);
      ctx.stroke();

      ctx.strokeStyle = '#333';

      line(90+canvas.width/2+300*Math.cos(theta/100+i*Math.PI*2/n), canvas.height/2+300*Math.sin(theta/100+i*Math.PI*2/n),
           90+canvas.width/2+300*Math.cos(theta/100+(i+1)%n*Math.PI*2/n), canvas.height/2+300*Math.sin(theta/100+(i+1)%n*Math.PI*2/n));

    }

    theta++;

  }, 10);
}

function line(startX,startY,endX,endY){
  ctx.beginPath();
  ctx.moveTo(startX,startY);
  ctx.lineTo(endX,endY);
  ctx.stroke();
}
