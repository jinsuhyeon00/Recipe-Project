<?php
 $num = $_POST["num"];
 
 $con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample");
 $sql = "select * from com where num='$num'";
 $result = mysqli_query($con, $sql);
 $row = mysqli_fetch_array($result);
  
 while($row){ 
     $com = $row["com"];
	  echo "$com";
}
?>