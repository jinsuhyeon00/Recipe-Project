		<div id="main_content">
            <div id="latest">
                <h4> NEW RECIPE</h4>
                <ul>
<!-- 최근 게시 글 DB에서 불러오기 -->
<?php	

    $con = mysqli_connect("localhost", "jinsuhyeon", "1528", "sample");
    $sql = "select * from board order by num desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "게시판 DB 테이블(board)이 생성 전이거나 아직 게시글이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
        {
            $regist_day = substr($row["regist_day"], 0, 10);
			
			   $num = $row["num"];
			   $subject= $row["subject"];
?>
                <li>
                    <span><a href="board_view.php?num=<?=$num?>"><?=$subject?></a></span>
            
                    <span><?=$row["name"]?></span>
                    <span><?=$regist_day?></span>
                </li>
<?php
        }
    }
?>
            </ul>
            </div>
            <div id="point_rank">
                <h4>BEST RECIPE</h4>
                <ul>
<!-- 포인트 랭킹 표시하기 -->
<?php
    $rank = 1;
    $sql = "select * from board order by best desc limit 5";
    $result = mysqli_query($con, $sql);

    if (!$result)
        echo "회원 DB 테이블(members)이 생성 전이거나 아직 가입된 회원이 없습니다!";
    else
    {
        while( $row = mysqli_fetch_array($result) )
			  
        {   $num = $row["num"];
			   $subject= $row["subject"];
                
            $id = $row["id"];
			   $best = $row["best"];
            $id = mb_substr($id, 0, 3)." *** ".mb_substr($id, 2, 1);
?>
                <li>
						 
                    <span><?=$rank?></span>
						  <span><a href="board_view.php?num=<?=$num?>"><?=$subject?></a></span>
                    <span><?=$id?></span>
               
						  <span>추천 수&nbsp; <?=$best?></span>
                </li>
<?php
            $rank++;
        }
    }

    mysqli_close($con);
?>
                </ul>
            </div>
        </div>