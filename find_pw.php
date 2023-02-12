<?php
$name = $_POST['name']; //값 변수 저장
$id = $_POST['id'];

$con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample"); //DB연결
$sql = "select * from members where name='{$name}' AND id='{$id}'"; 

$result = mysqli_query($con, $sql); 
$num = mysqli_num_rows($result);
 if(!$num){
	 echo " <script> alert('가입되지 않은 회원입니다.')
	location.href='member_form.php';
	</script>";
 }else{
	 $row = mysqli_fetch_array($result);
	 
	 echo "<script>
         alert('회원님의 PW는 ".$row[2]."입니다.');
         location.href='login_form.php';
          </script>";
	 mysqli_close($con);
 }




?>
