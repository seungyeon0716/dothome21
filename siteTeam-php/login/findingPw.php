
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
<script>
        $youEmail = mysql_escape_string($_POST['youEmail']);
        $emailKey = mysql_escape_string($_POST['emailKey']);
                    
                    
        if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $youEmail)){
    // Return Error - Invalid Email
            $msg = '이메일 형식이 틀렸습니다. 다시 입력해주세요!';
        }else{
            // Return Success - Valid Email
            $msg = '인증번호 전송이 완료되었습니다. 이메일 확인 후 인증번호를 입력해주세요!';
        }
</script>

    <!-- <div id="skip">
        <a href="#contes">로그인 바로가기</a>
        <a href="#footer">푸터 바로가기</a>
    </div> -->
    <!-- //skip -->

    

    <main id="contents">
        <section id="mainCont" class="gray">
            <article class="content-article">
                <div class="findPw-form">
                    
                    <!-- 입력폼 -->
                        <form name="findingPw" action="test.php" method="POST"> <!--수정-->
                            <fieldset>
                                <legend class="ir_so">비밀번호 찾기 입력 폼</legend>
                                <div class="member-box">
                                    <h1>비밀번호 찾기</h1>
                                    <p>비밀번호 찾기를 진행해주세요.</p>
                                    <div class="findPw-box">
                                        <div class="findPw-one">
                                            <div>
                                                <label for="youEmail">이메일, 인증번호 전송</label>
                                            </div>
                                            <input type="email" name="youEmail" id="youEmail" class="input_write" autocmplete="off" autofocus require>
                                            <div class="join-btn1">
                                                <button>전송</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="findPw-box">
                                        <div class="findPw-two">
                                            <div>
                                                <label for="emailKey">인증번호 입력</label>
                                            </div>
                                            <input type="text" name="emailKey" id="emailKey" class="input_write" autocmplete="off" autofocus require>
                                            <div class="join-btn1">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <button id="joinBtn" onclick="location.href='login.php'" class="btn_submit" type="submit">확인</button>

                            </fieldset>
                        </form>
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