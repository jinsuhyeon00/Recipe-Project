# Recipe-Project
### MySQL 서버를 이용하여 데이터베이스에 대해 이해하고 MySQL 조작을 배웠다.
### 이를 활용하여 기본 웹 사이트 예제를 통해 나만의 웹 사이트를 만들어 보았다.
***
# 제작 기간 2020.10 ~ 2020.12(2개월)
# 구현 기능과 설명 - 기존 게시판 홈페이지 코드 변형 및 기능 추가
***
![image](https://user-images.githubusercontent.com/79950254/218302720-6053d1b1-eb5d-4edd-808d-dcc9363b5bc3.png)
![image](https://user-images.githubusercontent.com/79950254/218302743-b64e47c6-2da2-4de0-82f6-9d5792b62514.png)
![image](https://user-images.githubusercontent.com/79950254/218303198-e2e896a9-67e0-47cd-b4c2-70bd055cf1e4.png)


### 기존 기능(로그인, 회원가입, 관리자, 쪽지)<br/>
    기존 기능은 CSS만 변경하였다.
![image](https://user-images.githubusercontent.com/79950254/218302769-de9074b8-ff7e-4634-a252-3aca96d71503.png)
![image](https://user-images.githubusercontent.com/79950254/218303028-01440a47-8595-4caa-8813-68a1f905910a.png)
![image](https://user-images.githubusercontent.com/79950254/218303041-63041d7e-c2cf-4361-87c7-8fd1f8635df4.png)
![image](https://user-images.githubusercontent.com/79950254/218303055-07af7330-f955-4613-af00-5c7cf43aba5d.png)

### ID/PW 찾기 <br/>
      관련 파일 : id_find.css, pw_find.css , id_find_form.php, pw_find_form.php, find_id.php, find_pw.php <br/>
      ▶ check_input() - 함수로 폼에 값이 없으면 경고창 출력한다. <br/>
      ▶ db연결 후, $sql = "select * from members where name='{$name}' AND email='{$email}'";로 가입된 이름과 이메일 찾았다.<br/>
          맞는 이름과 이메일이 있으면 $row =    mysqli_fetch_array($result); 을 이용하여 $row[1]에 있는 아이디를 출력한다.<br/>
      ▶ pw도 같은 방법으로 찾아준다.
![image](https://user-images.githubusercontent.com/79950254/218302798-d466c5ce-6162-4e4f-a39d-d7e0c43ac40b.png)
 ### 검색 기능 <br/>
      관련 파일 : common.css, header.php, search.php, search.js
      ▶ header.php에 검색 폼을 생성하였다.
      ▶ check_input_search()함수로 폼에 값이 없으면 경고창 출력한다.
      ▶ db연결 후, $sql = "select * from board where subject like '%$search%'order by num desc"; 로 특정 단어 게시물을 찾았다.
![image](https://user-images.githubusercontent.com/79950254/218302813-7ff1b258-88b5-466e-a41e-a7f1c646fa08.png)
### 레시피 입력 기능 <br/>
     관련 파일 : Board_form.php
![image](https://user-images.githubusercontent.com/79950254/218302962-5bffd4f0-171a-4c56-818e-146cadaa1d77.png)

![image](https://user-images.githubusercontent.com/79950254/218302937-f8740cc7-955f-4e53-a015-451e3d6479d8.png)

### 추천 버튼 기능 <br/>
    관련 파일 : board.sql ,common.css, board_viwe.php, board_list.php, best_list.php
      ▶ board.sql에 best 필드 생성
      ▶ board_viwe.php에 추천 버튼 생성하여 클릭 시 값을  best_list.php. 로 보낸 후
      ▶ $new_best = $best + 1;
      $sql = "update board set best=$new_best where num=$num"; 을 이용하여 추천 버튼 클릭 시 best 값 1씩 증가하게 하여 DB에 저장하였다.
      DB에 있는 best값 가져와 best_list에 출력하였다.
![image](https://user-images.githubusercontent.com/79950254/218303000-85757b8a-c322-4836-b202-133644ca1c55.png)

![image](https://user-images.githubusercontent.com/79950254/218302993-c1f72807-f645-4be2-81b6-0506b14f88d5.png)

### 레시피 추천 기능
    관련 파일 : nav.php, common.css, recommend.php
    ▶ nav.php 에 검색 폼을 생성하였다.
    ▶ check_input_recommend()  함수로 폼에 값이 없으면 경고창 출력한다.
    ▶ db연결 후 $sql = "select * from board where material like '%$recommend%'order by num desc";로 특정 재료가 있는 게시물을 찾았다.
![image](https://user-images.githubusercontent.com/79950254/218303120-db37bbf7-215b-4e4a-84b5-a5c2dc5fa926.png)


### 쿠폰 뽑기 기능
    관련 파일 : nav.php, common.css, coupon.php, coupon_list.php, coupon_result.sql, coupon.sql 
    ▶ coupon_result.sql, coupon.sql 두개의 DB을 생성하였다.
    ▶ nav.php 에 쿠폰 폼을 생성하였다.
    ▶ check_input_coupon() 함수로 폼에 값이 없으면 경고창 출력한다.
    포인트가 5000미만이거나 이상일 때 경고창 출력한다.
    ▶ db연결 후, $sql = "select point from members where id='$userid'"; $userid의 $point 값을 찾아 
    $r = $row["point"];
	  if($r>=5000){
	  $new_point = $row["point"] - $point_down;
	  $sql = "update members set point=$new_point where id='$userid'";
    포인트을 감소하여 다시 저장한다.
    ▶ $sql = "select * from coupon order by rand() LIMIT 5";
		  $result = mysqli_query($con, $sql);
	  	$row = mysqli_fetch_array($result);
		  $p = $row["coupon"]; 
    DB에 저장되어 있는 쿠폰값을 랜덤으로 가져온 후 출력한다.
		   echo "<b>{$p}에 당첨되셨습니다!!<b><br>";
		   echo "<b>남은 포인트는 $new_point 입니다.<b>";
    출력한 쿠폰 값을 다시 변수에 저장하여, coupon_result DB에 저장한다.
		  $coupon_result = $p;
               $coupon_result = htmlspecialchars($coupon_result, ENT_QUOTES);
      $sql = "insert into coupon_result(id, coupon_result)";
              $sql.="values('$userid','$coupon_result')";
     이렇게 저장된 쿠폰을 coupon_list.php에서 $sql = "select * from coupon_result where id='{$userid}' order by num desc"; 로그인 된 아이디의 쿠폰만 보여준다. 
![image](https://user-images.githubusercontent.com/79950254/218303145-c91a601a-50ce-4999-971c-1685e4b0d74f.png)
![image](https://user-images.githubusercontent.com/79950254/218303150-3d5093f3-eb11-4327-864e-41c8ba1b78ad.png)
![image](https://user-images.githubusercontent.com/79950254/218303160-1005f940-72c0-4a96-828e-45f2af68232e.png)

### 광고 기능
    관련 파일 : aside.php, common.css 
     ▶ html을 이용하여 배열 변수에 이미지 저장 후, 
     ▶ function change(){
		    var img = document.getElementById("img");
		    var rd = Math.floor(Math.random()*8);
		    img.src = f[rd];
	      } 을 이용하여 랜덤으로 이미지 경로 값을 바꿔준다.
      ▶ 2초마다 랜덤 이미지 함수을 출력해 준다. setInterval(change, 2000);
  ![image](https://user-images.githubusercontent.com/79950254/218302628-fc81592f-fabe-4359-aa7a-bb315ed73572.png)

### 댓글 기능 - 실패
    관련 파일 : com.sql , com_view.php, com_insert.php, borad.view.php
    ▶ borad.view.php에 댓글 폼과 버튼 생성
    ▶ 게시물 값을 가져와 com.sql에 저장 한 후, com_view.php에서 보여지게 할라고 시도하였으나 게시물 고유 값이 action="com_insert.php?으로 넘어가, com_view에서는 게시물 고유 넘버 값을 가져오지 못하여 오류가 발생하였다.






