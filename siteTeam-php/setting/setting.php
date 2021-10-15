<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>설정 페이지</title>

    <link rel="stylesheet" href="/setting/assets/css/style.css">
    <link rel="stylesheet" href="/setting/assets/css/reset.css">
    <link rel="stylesheet" href="/setting/assets/css/fonts.css">
    <link rel="stylesheet" href="/setting/assets/css/var.css">
</head>  <div class="setting">
        <div id="nav">
            <img src="assets/img/Logowhite.png" alt="#">
            <ul>
                <li><a href="#c">비밀번호 변경</a></li>
                <li><a href="#c">개인 정보 약관</a></li>
                <li><a href="#c">공지 사항</a></li>
                <li><a href="#c">회원 탈퇴</a></li>
            </ul>
        </div>
        
            
       
        <div id="head">
            
           <h3>비밀번호 변경</h3>
           <div class="heads">
               <strong class="ir_so">회원 정보 영역</strong>
               <?php if(isset($_SESSION['myMemberID'])) { ?>
                       <p><?=$_SESSION['youEmail']?></p>
                       <button class="btn1"><a href="../login/logout.php">로그아웃</a></button>
             
                       <?php } else { ?>
                       <a href="../login/login.php">로그인</a>
                       <a href="../login/join.php">회원가입</a>
               <?php } ?>
           </div>
            <article class="content-article">
                <div class="boardType">
                    <p>새벽일기의 공지사항이 여기에 나타나요!</p>
                    <div class="board">
                        <div class="board-search">
                            <form action="boardSearch.php" name="boardSearch" method="get">
                                <fieldset>
                                    <legend  class="ir_so">게시판 검색 영역</legend>
                                    <input type="search" name="searchKeyword" class="form-search" placeholder="검색어를 입력하세요" aria-label="search" required>
                                    <select name="searchOption" id="searchOption" class="form-select">
                                        <option value="title">제목</option>
                                        <option value="content">내용</option>
                                        <option value="name">등록자</option>
                                    </select>
                                    <button type="submit" class="form-btn2">검색</button>
                                    <a href="boardWrite.php" class="form-btn black">글쓰기</a>
                                </fieldset>
                            </form>
                        </div>
                        <div class="board-table">
                            <table>
                                <colgroup>
                                    <col style="width: 15%" />
                                    <col />
                                    <col style="width: 15%" />
                                    <col style="width: 12%" />
                                    <col style="width: 15%" />
                                </colgroup>
                                <thead class="thead">
                                    <tr>
                                        <th>번호</th>
                                        <th>제목</th>
                                        <th>등록자</th>
                                        <th>등록일</th>
                                        <th>조회수</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(isset($_GET['page'])){
                                            $page = (int) $_GET['page'];
                                        } else {
                                            $page = 1;
                                        }
                                       

                                        $numView = 7;
                                        $viewLimit = ($numView * $page)  - $numView;

                                        //1~20   : DESC LIMIT 0, 20      --> $page = 1  ($numView * $page)  - $numView
                                        //21~40  : DESC LIMIT 20, 20     --> $page = 2  ($numView * $page)  - $numView
                                        //41~60  : DESC LIMIT 40, 20     --> $page = 3  ($numView * $page)  - $numView
                                        //61~80  : DESC LIMIT 60, 20     --> $page = 4  ($numView * $page)  - $numView
                                        //81~100 : DESC LIMIT 80, 20     --> $page = 5  ($numView * $page)  - $numView

                                        // board + member
                                        $sql = "SELECT b.myBoardID, b.boardTitle, m.youEmail, b.boardView, b.regTime FROM myMember m JOIN myBoard b ON (m.myMemberID = b.myMemberID) ORDER BY myBoardID DESC LIMIT  {$viewLimit }, {$numView}";
                                        $result = $connect -> query($sql);

                                        if($result){
                                            $count = $result -> num_rows;

                                            if($count > 0){
                                                for($i=1; $i<=$count; $i++){
                                                    $info = $result -> fetch_array(MYSQLI_ASSOC);
                                                    echo "<tr>";
                                                    echo "<td>".$info['myBoardID']."</td>";
                                                    echo "<td><a href='boardView.php?boardID={$info['myBoardID']}'>".$info['boardTitle']."</a></td>";
                                                    echo "<td>".$info['youEmail']."</td>";
                                                    echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                                                    echo "<td>".$info['boardView']."</td>";
                                                    echo "</tr>";
                                                }
                                            }
                                        } 
                                    ?>

                                    <!-- <tr>
                                        <td>1</td>
                                        <td>2</td>
                                        <td>3</td>
                                        <td>4</td>
                                        <td>5</td>
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                        <div class="board-page">
                            <ul>
                                <?php
                                    $sql = "SELECT count(myBoardID) FROM myBoard";
                                    $result = $connect -> query($sql);

                                    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
                                    $boardTotalCount = $boardTotalCount['count(myBoardID)'];

                                    // echo "전체 갯수 : " .$boardTotalCount;

                                    // 총 페이지 수
                                    $boardTotalPage = ceil($boardTotalCount/ $numView);

                                    // echo "총 페이지 수 : " .$boardTotalCount;

                                    // 1 2 3 4 5 6 7 8 9 10 11
                                    // 현재 페이지를 기준으로 보여주고싶은 갯수
                                    $pageView = 5;
                                    $startPage =  $page - $pageView;
                                    $endPage = $page + $pageView;

                                    // 처음 페이지 초기화
                                    if($startPage < 1) $startPage = 1;

                                    // 마지막 페이지 초기화
                                    if($endPage >= $boardTotalPage) $endPage = $boardTotalPage;

                                    // 처음으로
                                    if($page != 1){
                                        echo "<li><a href='setting.php?page=1'>처음으로</a></li>";
                                    }

                                    // 이전 페이지
                                    if($page != 1){
                                        $prevPage = $page -1;
                                        echo "<li><a href='setting.php?page={$prevPage}'>이전</a></li>";
                                    }
                                    
                                    for( $i=$startPage; $i<=$endPage; $i++){
                                        $active = '';
                                        if($i == $page) $active = "active";
 
                                        echo "<li class='{$active}'><a href='setting.php?page={$i}'>{$i}</a></li>";
                                    }
 

                                    // 다음 페이지
                                    if( $page != $endPage ){
                                        $nextPage = $page +1;
                                        echo "<li><a href='setting.php?page={$nextPage}'>다음</a></li>";
                                    }

                                    // 마지막으로
                                    if( $page != $endPage ){
                                        echo "<li><a href='setting.php?page={$boardTotalPage}'>마지막</a></li>";
                                    }
                                ?>
                            
                                        <!-- <li><a href="#">처음으로</a></li>
                                        <li><a href="#">처음</a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">6</a></li>
                                        <li><a href="#">7</a></li>
                                        <li><a href="#">다음</a></li>
                                        <li><a href="#">마지막으로</a></li> -->
                                    </ul>
                                </div>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <footer id="footer">
            <div class="footerWrap">
                <div class="fLogo">
                    <img src="assets/img/Logowhite.png" alt="로그인 페이지 이미지입니다.">
                </div>
                <div class="fLogoTitle">
                    <ul>
                        <li>It's a calendar only for you</li>
                        <li>going to work at dawn.</li>
                        <li>I'll share my will with you.</li>
                    </ul>
                </div>
                <div class="textZon">
                    <ul>
                        <li><strong>공수 노트, 월급 계산기, 아르바이트 급여 계산기 @새벽시장</strong></li>
                        <li><strong>만든 프로그램 :</strong> 피그마, 포토샵, 일러스트, 자바스크립트, 제이쿼리, 리엑트, php</li>
                        <li><strong>만든 기간 :</strong> 2021.08.20 ~ </li>
                        <li><strong>만든 이 :</strong> 윤여찬, 허승연, 박세진, 전대섭, 인재연, 조범수, 송지원...</li>
                    </ul>
                </div>
            </div>
        </footer>
     
    <!-- //footer -->
</body>

</html>