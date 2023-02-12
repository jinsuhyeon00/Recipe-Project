<?php

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample");
    $sql = "select * from board where num = $num";

    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"]; //파일 첨부 확인

	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);  //연결 끊기
    }

    $sql = "delete from board where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_list.php?page=$page';
	     </script>
	   ";
?>

