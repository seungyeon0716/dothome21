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
    <link rel="stylesheet" href="/setting/assets/css/boardView.css">
    <link rel="stylesheet" href="/setting/assets/css/reset.css">
    <link rel="stylesheet" href="/setting/assets/css/fonts.css">
    <link rel="stylesheet" href="/setting/assets/css/var.css">
</head>
<div class="setting">
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
        <h3>공지사항</h3>
        <div class="heads">
            <p>younyc0413@gmail.com</p>
            <button class="btn1">로그아웃</button>
        </div>
        <main id="contents">
            <section id="mainCont">
                <h2 class="ir_so">메인 컨텐츠</h2>
                <article class="content-article">
                    <div class="boardType">
                        <h2>게시판</h2>
                        <p>가장 빠른 새소식 업데이트</p>
                        <div class="board">
                            <div class="board-table mt30">
                                <table>
                                    <colgroup>
                                        <col style="width: 30%" />
                                        <col style="width: 70%" />
                                    </colgroup>
                                    <tbody>
                                        <?php
                                            $boardID = $_GET['boardID'];
                                            $sql = "SELECT b.boardTitle, b.boardContent, b.boardView, m.youEmail, b.regTime FROM myBoard b JOIN myMember m ON(b.myMemberID = m.myMemberID) WHERE b.myBoardID = {$boardID}";
                                            $result = $connect -> query($sql);
                                            $view = "UPDATE myBoard SET boardView = boardView+1 WHERE myBoardID = {$boardID}";
                                            $connect -> query($view);
                                            if($result){
                                                $info = $result -> fetch_array(MYSQLI_ASSOC);
                                                echo "<tr><th>제목</th><td class='left'>".$info['boardTitle']."</td></tr>";
                                                echo "<tr><th>글쓴이</th><td class='left'>".$info['youEmail']."</td></tr>";
                                                echo "<tr><th>등록일</th><td class='left'>".date('Y-m-d H:i', $info['regTime'])."</td></tr>";
                                                echo "<tr><th>조회수</th><td class='left'>".$info['boardView']."</td></tr>";
                                                echo "<tr><th class='height'>내용</th><td class='left'>".$info['boardContent']."</td></tr>";
                                            } 
                                        ?>
                                        <!-- <tr>
                                                <th>제목</th>
                                                <td class="left">안녕하세요!</td>
                                            </tr>
                                            <tr>
                                                <th>글쓴이</th>
                                                <td class="left">윤여찬</td>
                                            </tr>
                                            <tr>
                                                <th>등록일</th>
                                                <td class="left">-------</td>
                                            </tr>
                                            <tr>
                                                <th>조회수</th>
                                                <td class="left">-------</td>
                                            </tr>
                                            <tr>
                                                <th class="height">내용</th>
                                                <td class="left">반가워요!</td>
                                            </tr> -->
                                    </tbody>
                                </table>
                                <div class="btn">
                                    <a href="boardModify.php?boardID=<?=$_GET['boardID']?>">수정하기</a>
                                    <a class="del" href="boardRemove.php?boardID=<?=$_GET['boardID']?>">삭제하기</a>
                                    <a href="setting.php">목록보기</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </articel>
            </section>
        </main>
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
    <script>

        const comRemoveBtn = document.querySelector(".del");
                comRemoveBtn.addEventListener("click",e=>{
                    if ( confirm("정말로 해당 댓글을 삭제 하시겠습니까?") == true ){
                    } else {
                        console.log("취소");
                        e.preventDefault();
                        // e.stopPropagation();
                    }
        });
        
    </script>
    <!-- //footer -->
    </body>
</html>