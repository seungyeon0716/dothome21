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

    <form name='sendmail' action='test.php' method='post'>
        <fieldset>
            <legend class="ir_so">메일 입력폼</legend>
            <div class="member-box">
                <div>
                    <label for="youEmail">이메일</label>
                    <input type="email" name="youEmail" id="youEmail" class="input_early"
                        placeholder="이메일을 입력해주세요" autocmplete="off" autofocus required>
                </div>
            </div>
            <button id="loginBtn" class="joinBtn" type="submit">로그인</button>
        </fieldset>
    </form>

</body>

</html>