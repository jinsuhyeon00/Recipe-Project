<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>RECIPE</title>
<link rel="stylesheet" type="text/css" href="./css/common.css?after">
<link rel="stylesheet" type="text/css" href="./css/pw_find.css?after">
<script>
   function check_input()
   {

      if (!document.pw_find_form.name.value) {
          alert("이름을 입력하세요!");    
          document.pw_find_form.name.focus();
          return;
      }

      if (!document.pw_find_form.id.value) {
          alert("ID를 입력하세요!");    
          document.pw_find_form.id.focus();
          return;
      }
		
      document.pw_find_form.submit();
   }

   function reset_form() {
      document.pw_find_form.name.value = "";
      document.pw_find_form.id.value = "";
      return;
   }
</script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
        <div id="main_content">
      		<div id="join_box">
          	<form  name="pw_find_form" method="post" action="find_pw.php">
			    <h2>PW 찾기</h2>
			       	<div class="clear"></div>
			       	<div class="form">
				        <div class="col1">이름</div>
				        <div class="col2">
							<input type="text" name="name">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="form id">
				        <div class="col1">아이디</div>
				        <div class="col2">
							<input type="text" name="id">
				        </div>                 
			       	</div>
			       	<div class="clear"></div>
			       	<div class="bottom_line"> </div>
			       	<div class="buttons">
							<img style="cursor:pointer" src="./img/find.PNG" width="80" onclick="check_input()">&nbsp;
                  		<img id="reset_button" style="cursor:pointer" src="./img/reset.PNG"  width="80" onclick="reset_form()">
	           		</div>
           	</form>
        	</div> <!-- join_box -->
        </div> <!-- main_content -->
	</section> 
	<footer>
    </footer>
</body>
</html>

