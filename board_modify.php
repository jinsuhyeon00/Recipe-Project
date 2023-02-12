<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    $subject = $_POST["subject"];
	 $kind = $_POST["kind"];
    $material = $_POST["material"];

    $content = $_POST["content"];
          
    $con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample");
    $sql = "update board set subject='$subject',kind='$kind', material='$material',content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'board_list.php?page=$page';
	      </script>
	  ";
?>

   
