<script>
  function check_input_recommend() {
      if (!document.recommend_form.recommend.value)
      {
          alert("재료를 입력하세요!");
          document.recommend_form.recommend.focus();
          return;
      }

      document.recommend_form.submit();
   }
</script>
<div id="nav">
	<div id="my_info">
	<h1>레시피 추천 </h1>
			  <form name="recommend_form" method="post" action="recommend.php">
				  <div>
                   <input type="text" name="recommend" placeholder=" 재료를 입력해주세요.">

              </div>
				  <div id="recommend_button">
					  <img style="cursor:pointer" src="./img/recommend.PNG" width="120" height="70" alt="search" onclick="check_input_recommend()">
				  </div>
			  </form>
	</div>
	<div id="coupon"> 
		<li>게시물을 올리면 포인트 증정!!!</li>
		<li>포인트로 쿠폰을 뽑아보세요!</li>
			<div id="coupon_button">
       <a href="coupon.php"><img src="./img/go.PNG" width="200" height="250" alt="login" onclick="check_input_coupon()"></a>
        </div>
	</div>
</div>