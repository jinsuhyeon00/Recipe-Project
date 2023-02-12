<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="./css/common.css?after">
<link rel="stylesheet" type="text/css" href="./css/coupon.css?after">
</head>
<body>
	<header>
    <?php include "header.php";?>
</header>  

	<div id="coupon_box">
	<h3 id="coupon_title">뽑기 결과!!!</h3>
<?php
	
	   $point_down = $_POST["point"];
	
      $con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample");
	   $sql = "select point from members where id='$userid'";
	   $result = mysqli_query($con, $sql);
	   $row = mysqli_fetch_array($result);
	   $r = $row["point"];
	 	
	  if($r>=5000){
	   $new_point = $row["point"] - $point_down;
	
	   $sql = "update members set point=$new_point where id='$userid'";
	   mysqli_query($con, $sql);
       
		$sql = "select * from coupon order by rand() LIMIT 5";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$p = $row["coupon"];
		 
		  echo "<b>{$p}에 당첨되셨습니다!!<b><br>";
		  echo "<b>남은 포인트는 $new_point 입니다.<b>";
		  
		  $coupon_result = $p;
        $coupon_result = htmlspecialchars($coupon_result, ENT_QUOTES);
        
        $sql = "insert into coupon_result(id, coupon_result)";
        $sql.="values('$userid','$coupon_result')";
        mysqli_query($con, $sql);
		 
	  }else{
			 echo "포인트가 부족하여 상품권을 뽑지 못하였습니다.";
		}
?>    <ul class="buttons">

				<li><button type="button" onclick="location.href='coupon_list.php'">쿠폰함</button></li>
			</ul>
</div>

</body>
</html>

