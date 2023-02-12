<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css?after">
<link rel="stylesheet" type="text/css" href="./css/board.css?after">
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
	  if (!document.board_form.kind.value)
      {
          alert("종류를 선택하세요!");
          document.board_form.kind.focus();
          return;
      }
	  if (!document.board_form.material.value)
      {
          alert("재료를 입력하세요!");
          document.board_form.material.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
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
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > RECIPE
		</h3>
	    <form  name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text"></span>
	    		</li>
				 <li  id="kinds">
	    			<span class="col1">종류 : </span>
	    			<span class="col2">한식<input name="kind" type="radio" value="한식"></span>
					<span class="col3">양식<input name="kind" type="radio"  value="양식"></span>
					<span class="col4">중식<input name="kind" type="radio"  value="중식"></span>
					<span class="col5">일식<input name="kind" type="radio"  value="일식"></span>
	    		</li>
				<li>
	    			<span class="col1">재료 : </span>
	    			<span class="col2"><input name="material" type="text"></span>
	    		</li>	
				 
	    		<li id="text_area">	
	    			<span class="col1">방법 : </span>
	    			<span class="col2">
	    				<textarea name="content"></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1">음식 사진</span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">완료</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 
<footer>

</footer>
</body>
</html>
