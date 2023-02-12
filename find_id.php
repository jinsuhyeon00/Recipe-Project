<?php
$name = $_POST['name']; //값 변수 저장
$email = $_POST['email1'].'@'.$_POST['email2'];

$con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample"); //DB연결
$sql = "select * from members where name='{$name}' AND email='{$email}'"; 

$result = mysqli_query($con, $sql); 
$num = mysqli_num_rows($result);
 if(!$num){
	 echo " <script> alert('가입되지 않은 회원입니다.')
	location.href='member_form.php';
	</script>";
 }else{
	 $row = mysqli_fetch_array($result);
	 
	 echo "<script>
         alert('회원님의 ID는 ".$row[1]."입니다.');
         location.href='login_form.php';
          </script>";
	 mysqli_close($con);
 }




?>
