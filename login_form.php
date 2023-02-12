<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<title>RECIPE</title>
<link rel="stylesheet" type="text/css" href="./css/common.css?after">
<link rel="stylesheet" type="text/css" href="./css/login.css?after">
<script type="text/javascript" src="./js/login.js"></script>
</head>
<body> 
	<header>
    	<?php include "header.php";?>
    </header>
	<section>
        <div id="main_content">
      		<div id="login_box">
	    		<div id="login_title">
		    		<span>로그인</span>
	    		</div>
	    		<div id="login_form">
          		<form  name="login_form" method="post" action="login.php">		       	
                  <ul>
                    <li><input type="text" name="id" placeholder="아이디" ></li>
                    <li><input type="password" id="pass" name="pass" placeholder="비밀번호" ></li> <!-- pass -->
                  	</ul>
                  	<div id="login_btn">
                      	<a href="#"><img src="./img/mylogin.PNG" width="415" alt="login" onclick="check_input()"></a>
                  	</div>
							<div id="find">
								<ul>
								<li><a href="id_find_form.php">ID 찾기</a></li>
							
								<li><a href="pw_find_form.php">PW 찾기</a></li>
				
								<li><a href="member_form.php">회원가입</a></li>
								</ul>
							</div>
					
           		</form>
        		</div> <!-- login_form -->
    		</div> <!-- login_box -->
        </div> <!-- main_content -->
	</section> 
	
</body>
</html>

