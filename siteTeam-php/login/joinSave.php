<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>새벽일기 회원가입</title>

    <link rel="stylesheet" href="../login/assets/css/fonts.css">
    <link rel="stylesheet" href="../login/assets/css/var.css">
    <link rel="stylesheet" href="../login/assets/css/reset.css">
    <link rel="stylesheet" href="../login/assets/css/style.css">
</head>

<body>

    <div id="skip">
        <a href="#contents">회원가입 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div>
    <!-- //skip -->

    <main id="contents">
        <section id="mainCont" class="gray">
            <article class="content-article join">
                <div class="join-form">
                    <h2>회원가입</h2>
<?php
    include "../connect/connect.php";

    $youEmail = $_POST['youEmail'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $regTime = time();

    // echo $youEmail, $youPass, $youPassC;

    // $sql = "INSERT INTO myMember(youEmail, youPass, regTime) 
    // VALUES('$youEmail', '$youPass', '$regTime')";

    // $result = $connect -> query($sql);

    // if( $result ){
    //     echo "INSERT INTO ture";
    // } else {
    //     echo "INSERT INTO false";
    // }

    // 메세지 출력
    function msg($alert){
        echo "<p class='alert'>{$alert}</p>";
    }

    // 입력 유효성 검사
    if( $youEmail == null || $youEmail == '' ){
        msg("이메일을 입력해주세요!");
        exit;
    }
    if( $youPass == null || $youPass == '' ){
        msg("비밀번호를 입력해주세요!");
        exit;
    }
    if( $youPassC == null || $youPassC == '' ){
        msg("비밀번호 확인을 입력해주세요!");
        exit;
    }

    $check_email = filter_var($youEmail, FILTER_VALIDATE_EMAIL);
    $check_email = preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $youEmail);
    if( $check_email == false ){
        msg("이메일이 잘못되었습니다. <br> 올바른 이메일을 적어주세요!");
        exit;
    }

    // 비밀번호 검사
    if( $youPass !== $youPass ){
        msg("비밀번호가 일치하지 않습니다.<br> 다시 한번 확인해주세요!");
        exit;
    }

    // 이메일 중복 검사
    $isEmailCheck = false;

    $sql = "SELECT youEmail FROM myMember WHERE youEmail = '$youEmail'";
    $result = $connect -> query($sql);

    if( $result ){
        $isEmailCheck -> num_rows;

        if( $count == 0 ){
            $isEmailCheck = true;
        } else {
            msg("이미 회원가입을 하셨습니다! 로그인을 해주세요!");
            exit;
        }
    } else {
        msg("에러발생01 - 관리자에게 문의하세요!");
        exit;
    }

    // 회원가입
    if( $isEmailCheck = true ){
        $sql = "INSERT INTO myMember(youEmail, youPass, regTime) VALUES('$youEmail', '$youPass', '$regTime')";
        $result = $connect -> query($sql);
        if($result){
            msg("회원가입을 축하합니다! 로그인 해주세요!");
        } else {
            msg("에러발생02 -  관리자에게 문의하세요!");
            exit;
        }
    } else {
        msg("이메일 또는 비밀번호가 틀립니다. 다시 한번 확인해주세요!!");
        exit;
    }
?>
                </div>
            </article>
        </section>

    </main>

    <script src="http://code.jquery.com/jquery-3.2.1.js"></script><!-- 최신버전 제이쿼리 -->
    
</body>

</html>