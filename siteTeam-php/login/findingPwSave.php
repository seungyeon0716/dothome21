
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 찾기</title>

    <!-- style -->
    <link rel="stylesheet" href="../login/assets/css/fonts.css">
    <link rel="stylesheet" href="../login/assets/css/var.css">
    <link rel="stylesheet" href="../login/assets/css/reset.css">
    <link rel="stylesheet" href="../login/assets/css/style.css">
</head>

<body>

    <!-- <div id="skip">
        <a href="#contes">로그인 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div> -->
    <!-- //skip -->

    

    <main id="contents">
        <section id="mainCont" class="gray">
            <article class="content-article">
                <div class="findPw-form">
<?php
    if(isset($_POST['youEmail']) && !empty($_POST['youEmail']) AND isset($_POST['emailKey']) && !empty($_POST['emailKey'])){
        // Form Submited
    }       
     
?>
                    <!-- 입력폼 -->
                        <!-- <form name="findingPw" action="findingPwSave.php" method="POST">
                            <fieldset>
                                <legend class="ir_so">비밀번호 찾기 입력 폼</legend>
                                <div class="member-box">
                                    <h1>비밀번호 찾기</h1>
                                    <p>비밀번호 찾기를 진행해주세요.</p>
                                    <div class="join-box">
                                        <div class="join-two">
                                            <div>
                                                <label for="youEmail">이메일, 인증번호 전송</label>
                                            </div>
                                            <input type="email" name="youEmail" id="youEmail" class="input_write" autocmplete="off" autofocus require>
                                            <div class="join-btn1">
                                                <button>전송</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="join-box">
                                        <div class="join-two">
                                            <div>
                                                <label for="youEmail">인증번호 입력</label>
                                            </div>
                                            <input type="email" name="youEmail" id="youEmail" class="input_write" autocmplete="off" autofocus require>
                                            <div class="join-btn1">
                                                <button>전송</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <button id="loginBtn" class="btn_submit" type="submit">확인</button>
                        </form> -->

<?php
    mysql_connect("localhost", "youEmail", "emailKey") or die(mysql_error()); // Connect to database server(localhost) with username and password.
    mysql_select_db("myUser") or die(mysql_error()); // Select registrations database.   
?>
                </div>
            </article>
        </section>
    </main>
    <!-- //contents -->

    <!-- <footer id="footer">

    </footer> -->
    <!-- //footer -->

    
</body>

</html>