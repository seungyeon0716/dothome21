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
    <link rel="stylesheet" href="/setting/assets/css/boardModify.css">
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
                    <h2>수정하기</h2>
                    <p>게시글의 제목과 내용을 수정할 수 있습니다.</p>

                    <section class="boradModify">
                        <form action="boardModifysave.php" name="boradModify" method="post">
                            <fieldset>
                                <legend class="ir_so">게시판 수정 영역입니다.</legend>
                                 <?php
                                    $boardID = $_GET['boardID'];
                                    $sql = "SELECT b.boardTitle, b.boardContent FROM myBoard b JOIN myMember m ON (b.myMemberID = m.myMemberID) WHERE b.myBoardID = {$boardID}";
                                    $result = $connect -> query($sql);
                                    if( $result ){
                                        $info = $result -> fetch_array(MYSQLI_ASSOC);
                                        // echo "<div><label for='boardTitle'>제목</label>";
                                        // echo "<input type='text' name='boardTitle' id='boardTitle' value='".$info['boardTitle']."'></div>";
                                        // echo "<div><label for='boardContent'>내용</label>";
                                        // echo "<textarea type='text' name='boardContent' id='boardContent' rows='13'>".$info['boardContent']."</textarea></div>";
                                    
                                        echo "<div style='display:none'><label for='boardID'>번호</label>";
                                        echo "<input type='text' name='boardID' id='boardID' value='".$_GET['boardID']."'></div>";
                                        echo "<div><label for='boardTitle'>제목</label>";
                                        echo "<input type='text' name='boardTitle' id='boardTitle' value='".$info['boardTitle']."'></div>";
                                        echo "<div><label for='boardContent'>내용</label>";
                                        echo "<textarea type='text' name='boardContent' id='boardContent' rows='13'>".$info['boardContent']."</textarea></div>";
                                        echo "<div><label for='boardPass'>비밀번호</label>";
                                        echo "<textarea type='text' name='boardPass' id='boardPass' placeholder='로그인 비밀번호를 입력해주세요.' autocomplete='off' required></textarea></div>";
                                    }
                                ?>
                                <div>
                                    <!-- <label class="headline" for="boardTitle">제목</label>
                                    <input type="text" name="boardTitle" id="boardTitle">
                                </div>
                                <div>
                                    <label class="headline" for="boardContent">내용</label>
                                    <textarea type="text" name="boardContent" id="boardContent" rows="13"></textarea>
                                </div>
                           -->
                           <button class="btn" type="submit" value="저장하기">저장</button>
                            </fieldset>
       
                        </form>
                    </section>
                </div>
        </article>
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
    <!-- //footer -->
    </body>
</html>