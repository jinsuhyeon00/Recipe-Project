<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>PHP 프로그래밍 입문</title>
<link rel="stylesheet" type="text/css" href="./css/common.css?after">
<link rel="stylesheet" type="text/css" href="./css/board.css?after">
	<script>
 function check_input() {
      document.best_form.submit();
   }
		
function check_input_com() {
		if(!document.com_form.com.value)
      {
          alert("댓글을 입력하세요!");
          document.com_form.com.focus();
          return;
      }
      document.com_form.submit();
   }
		</script>
</head>
<body> 
<header>
    <?php include "header.php";?>
</header>  
<section>

   	<div id="board_box">
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$kind       =$row["kind"];
	$material = $row["material"];
	$content    = $row["content"];
	$file_name    = $row["file_name"];
	$file_type    = $row["file_type"];
	$file_copied  = $row["file_copied"];
	$hit          = $row["hit"];
	$best =$row["best"];

	$content = str_replace(" ", "&nbsp;", $content);
	$content = str_replace("\n", "<br>", $content);

	$new_hit = $hit + 1;
	$sql = "update board set hit=$new_hit where num=$num";   
	mysqli_query($con, $sql);
	
?>		
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name?> | <?=$regist_day?></span>
		
			 </li>
			  <li>
				  <span class="col1"><b>재료 :</b> <?=$material?></span>
				  <span class="col2"><b>종류 :</b><?=$kind?></span>
			 </li>
		
			<li>
				<?php
					if($file_name) {
						$real_name = $file_copied;
						$file_path = "./data/".$real_name;
						$file_size = filesize($file_path);

						echo "▷ 첨부파일 : $file_name ($file_size Byte) &nbsp;&nbsp;&nbsp;&nbsp;
			       		<a href='download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>[저장]</a><br><br>";
			           	}
				?>
				<?=$content?>
			</li>		
	    </ul>
	    <ul class="buttons">
				<li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
				<li><button onclick="location.href='board_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
				<li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
				<li><button onclick="location.href='board_form.php'">글쓰기</button></li>
			   <form name="best_form" method="post" action="best_list.php">
		      <li><button type="button" onclick="check_input()">추천</button></li>
				</form>
		</ul>
      <div>
			<form name="com_form" method="post" action="com_insert.php?sd_id=<?=$userid?>">
				<input type="hidden" name="rv_id" value="<?=$id?>">
				<input type="hidden" name="post_num" value="<?=$num?>">
				<input name="com" type="text" placeholder="댓글을 남겨주세요">
				<button type="button" onclick="location.href='com_view.php?num=<?=$num?>'">등록</button>
			</form>
			</div>
			<div>
			  <?php include "com_view.php";?>
			</div>
	</div>
</section> 
<footer>
   
</footer>
</body>
</html>
