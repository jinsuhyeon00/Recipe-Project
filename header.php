<script type="text/javascript" src="./js/search.js"></script>
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
   if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
   
?>
        <div id="top">
            <h3>
                <a href="index.php"><img src = "./img/logo.PNG"  height="80" width="120" alt="Logo"></a>
            </h3>
			  <form name="search_form" method="post" action="search.php">
				  <div>
                   <input type="text" name="search" placeholder=" 검색어를 입력해주세요.">
					
              </div>
				  <div id="search_button">
					  <img style="cursor:pointer" src="./img/search.PNG" width="80" height="45" alt="search" onclick="check_input_search()">
				  </div>
			  </form>
  <ul id="top_menu">
<?php
    if(!$userid) {
?>               
                <li><a href="login_form.php">
						로그인</a></li>
<?php
    } else {
                $logged = $username."(".$userid.")님&nbsp;[Level:".$userlevel.", Point:".$userpoint."]<br>";
?>
                <li><?=$logged?> </li>

                <li><a href="logout.php">로그아웃</a></li>
                <li> | </li>
                <li><a href="member_modify_form.php">마이페이지</a></li>
<?php
    }
?>
<?php
    if($userlevel==1) {
?>
                <li> | </li>
                <li><a href="admin.php">관리자모드</a></li>
<?php
    }
?>
		</ul>
        </div>
        <div id="menu_bar">
            <ul>  
                <li><a href="index.php">H&nbsp;O&nbsp;M&nbsp;E</a></li>
                <li><a href="board_form.php">레시피 작성</a></li>                                
                <li><a href="board_list.php">레시피 목록</a></li>
                <li><a href="message_form.php">질의응답</a></li>
            </ul>
        </div>
<!-- <img src = "./img/mylogin_index.PNG" height="40" width="100" alt="login">-->