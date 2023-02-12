<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css?after">
<script>
	var f = ["img/1.jpg","img/2.jpg","img/3.jpg","img/4.jpg","img/5.jpg","img/6.jpg","img/7.jpg","img/8.jpg"];
	var imgs = new Array();
	for(var i=0; i<f.length; i++){
		imgs[i] = new Image();
		imgs[i].src = f[i];
	}
	var next = 1;
	function change(){
		var img = document.getElementById("img");
		var rd = Math.floor(Math.random()*8);
		img.src = f[rd];
	}
	setInterval(change, 2000);
</script>
</head>	
<body onload="change()">
	<div id="aside">
	<div id="image_rand">
		<img id="img" src="img/1.jpg" alt="광고" width="325" height="400">
	</div>
<div id="foot"> 
		<li>홈페이지 관리자</li>
		<li>ID : jinsuhyeon00</li>
		<li>쿠폰 관련 및 기타사항은<br>위 ID로 문의바랍니다!</li>	
	</div>
</div>
</body>
</html>