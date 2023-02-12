<meta charset='utf-8'>
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";

    if ( !$userid )
    {
        echo("
                    <script>
                    alert('댓글 달기는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

	 $post_num=$_POST["post_num"];
    $com = $_POST["com"];
    $rv_id =$_POST["rv_id"];
    $sd_id =$_GET["sd_id"];
    $regist_day = date("Y-m-d (H:i)");
 
    $com = htmlspecialchars($com, ENT_QUOTES);

    $con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample");

	 $sql = "insert into com(post_num, rv_id, sd_id, com, regist_day)";
	 $sql .= "values('$post_num','$rv_id','$sd_id','$com','$regist_day')";

	 mysqli_query($con, $sql);
    mysqli_close($con);
   
?>

   
