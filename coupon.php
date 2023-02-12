<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css?after">
<link rel="stylesheet" type="text/css" href="./css/coupon.css?after">
<script>
  function check_input_coupon() {
      if (!document.coupon_form.point.value)
      {
          alert("포인트를 입력하세요!");
          document.coupon_form.point.focus();
          return;
      }
	  if (document.coupon_form.point.value<5000)
      {
          alert("5000포인트부터 사용가능합니다.");
          document.coupon_form.point.focus();
          return;
      }
	  if (document.coupon_form.point.value>5000)
      {
          alert("5000포인트만 사용가능합니다.");
          document.coupon_form.point.focus();
          return;
      }	
      document.coupon_form.submit();
	
   }
</script>
</head>

<body> 
<header>
    <?php include "header.php";?>
</header>  
   <?php
	if (!$userid )
	{
		echo("<script>
				alert('로그인 후 이용해주세요!');
				history.go(-1);
				</script>
			");
		exit;
	}
?>
 
<section>
   	<div id="coupon_box">
	    <h3 id="coupon_title">
	    		포인트 뽑기!!!<br>
			   5000포인트에 기회는 한 번입니다.
		</h3>
	    <form  name="coupon_form" method="post" action="coupon_result.php" enctype="multipart/form-data">
	    	 <ul id="coupon_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>		
	    		<li>
	    			<span class="col1">포인트: </span>
	    			<span class="col2"><input name="point" type="text" placeholder="포인트를 입력해주세요!"></span>
	    		</li>

	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input_coupon()">뽑기</button></li>
				<li><button type="button" onclick="">쿠폰함</button></li>
			</ul>
	    </form>
	</div>
	<!-- board_box -->
</section> 
<footer>

</footer>
</body>
</html>
