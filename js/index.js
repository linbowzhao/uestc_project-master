var canvas = document.getElementById('canvas'),
ctx = canvas.getContext('2d'),
    W = window.innerWidth;//画布宽度
H = window.innerHeight;//画布高度

var color1 = "#2fbbca",
	color2 = "#29b1bf";

var vertexes = [],    //顶点坐标
	verNum = 250,     //顶点数
	diffPt = [],      //差分值
	autoDiff = 1000;  //初始差分值

	canvas.width = W;
	canvas.height = H;

	var vPos = 125;  //震荡点
	var dd = 15;     //缓冲
	//生成顶点，初始差分值
	for(var i=0; i<verNum; i++){
		vertexes[i] = new Vertex(W/(verNum-1)*i, H/2, H/2);//波动点的坐标
		diffPt[i] = 0;
	}

	console.log(vertexes);
    //鼠标点击
	canvas.addEventListener('mousedown', function(e){

		var mouse = {x:null, y:null};

		if(e.pageX||e.pageY){
			mouse.x = e.pageX;//判断是否都存在
			mouse.y = e.pageY;//都存在的话就把鼠标当前位置的值传递出来
		}else{
			mouse.x = e.clientX + document.body.scrollLeft +document.documentElement.scrollLeft;//这个意思好像是有的浏览器不支持e.page
            mouse.y = e.clientY + document.body.scrollTop +document.documentElement.scrollTop;
		}

		//重设差分值
		if(mouse.y>(H/2-50) && mouse.y<(H/2 +50)){
			autoDiff = 1000;
			vPos = 1 + Math.floor((verNum - 2) * mouse.x / W);//震荡点
			diffPt[vPos] = autoDiff;//差分值
		}

		console.log(mouse.x, mouse.y)

	}, false)

	//resize
	function resize(){
		W = window.innerWidth;
	    H = window.innerHeight;
	    canvas.width = W;
	    canvas.height = H;
	}
	window.addEventListener("resize", resize);


	//绘制
	function draw(){
		ctx.save()
		ctx.fillStyle = color1;
		ctx.beginPath();
		ctx.moveTo(0, H);
		ctx.lineTo(vertexes[0].x, vertexes[0].y);
		for(var i=1; i<vertexes.length; i++){
			ctx.lineTo(vertexes[i].x, vertexes[i].y);
		}
		ctx.lineTo(W,H);
		ctx.lineTo(0,H);
		ctx.fill();
		ctx.restore();

		ctx.save();
		ctx.fillStyle = color2;
		ctx.beginPath();
		ctx.moveTo(0, H);
		ctx.lineTo(vertexes[0].x, vertexes[0].y+5);
		for(var i=1; i<vertexes.length; i++){
			ctx.lineTo(vertexes[i].x, vertexes[i].y+5);
		}
		ctx.lineTo(W, H);
		ctx.lineTo(0, H);
		ctx.fill();
		ctx.restore();

		ctx.save();
		ctx.fillStyle="#777";
		ctx.font="12px sans-serif";
		ctx.textBaseline="top";
		ctx.fillStyle="#fff";
		ctx.restore();
	}


	//顶点更新
	function update(){
		autoDiff -= autoDiff*0.9;
		diffPt[vPos] = autoDiff;

		//左侧
		for(var i=vPos-1; i>0; i--){
			var d = vPos-i;
			if(d > dd){
				d=dd;
			}
			diffPt[i]-=(diffPt[i] - diffPt[i+1])*(1-0.01*d);
		}
		//右侧
		for(var i=vPos+1; i<verNum; i++){
			var d = i-vPos;
			if(d>dd){
				d=dd;
			}
			diffPt[i] -= (diffPt[i] - diffPt[i-1])*(1-0.01*d);
		}

		//更新Y坐标
		for(var i=0; i<vertexes.length; i++){
			vertexes[i].updateY(diffPt[i]);
		}

	}
	(function drawframe(){
		//更新坐标点
		ctx.clearRect(0, 0, W, H);
		window.requestAnimationFrame(drawframe, canvas);
	    update()
		draw();
	})()

	
