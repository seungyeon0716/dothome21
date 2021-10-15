<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>

    <!-- style -->
    <link rel="stylesheet" href="../login/assets/css/fonts.css">
    <link rel="stylesheet" href="../login/assets/css/var.css">
    <link rel="stylesheet" href="../login/assets/css/reset.css">
    <link rel="stylesheet" href="../login/assets/css/style.css">
</head>

<body>

    <div id="skip">
        <a href="#contents">로그인 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!-- //skip -->

    

    <main id="contents">
        <section id="mainCont" class="gray">
            <article class="content-article">
                <div class="member-form">
<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];

    // 메세지 출력
    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }

    //이메일 검사
    if( !filter_var($youEmail, FILTER_VALIDATE_EMAIL) ){
        msg("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!!");
        exit;
    }

    //비밀번호 검사
    if( $youPass == null || $youPass == ''){
        msg("비밀번호를 입력해주세요!~");
        exit;
    }

    // 데이터 가져오기
    $sql = "SELECT myMemberID, youEmail, youPass FROM myMember WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if( $result){
        $count =  $result -> num_rows;

        if( $count == 0 ){
            msg("이메일 또는 비밀번호가 틀렸습니다.");
            exit;
        } else {
            // 로그인 성공
            $memberInfo =  $result -> fetch_array(MYSQLI_ASSOC);

            $_SESSION['myMemberID'] = $memberInfo['myMemberID'];
            $_SESSION['youEmail'] = $memberInfo['youEmail'];
            msg("로그인이 되었습니다!");
        }
    } else {
        msg("에러발생 - 관리자에게 문의하세요!");
    }
?>
                    <!-- 이미지 -->
                    <div class="login-left">
                        <img src="../login/assets/img/login-img.jpg" alt="로그인">
                    </div>
                    
                    <!-- 입력폼 -->
                    <!-- <div class="login-right">
                        <div class="logo">
                            <img src="../login/assets/img/logoTitle.svg" class="logoBlack" alt="로고">
                        </div>

                        <form name="login" action="loginSave.php" method="POST">
                            <fieldset>
                                <legend class="ir_so">로그인 입력폼</legend>
                                <div class="member-box">
                                    <div>
                                        <label for="youEmail">이메일</label>
                                        <input type="email" name="youEmail" id="youEmail" class="input_early"
                                            placeholder="이메일을 입력해주세요" autocmplete="off" autofocus required>
                                    </div>
                                    <div>
                                        <label for="youPass">비밀번호</label>
                                        <input type="password" name="youPass" id="youPass" class="input_early"
                                            maxlength="20" placeholder="비밀번호를 입력해주세요" autocmplete="off" required>
                                    </div>
                                </div>
                            </fieldset>
                            <button id="loginBtn" class="btn_submit" type="submit">로그인</button>
                            <div class="loginBtn-bottom">
                                <button class="joinBtn" type="button" onclick="location.href='join.php'">회원가입</button>
                                <button class="findPw" type="button" onclick="location.href='#'">비밀번호 찾기</button>
                            </div>
                        </form>
                    </div> -->


                </div>
            </article>
        </section>
    </main>
    <!-- //contents -->

    <footer id="footer">
        <div class="footerWrap">
            <div class="fLogo">
                <img src="../login/assets/img/Logowhite.png" alt="로그인 페이지 이미지입니다.">
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


    <!-- Code injected by live-server -->
</body>

</html>

