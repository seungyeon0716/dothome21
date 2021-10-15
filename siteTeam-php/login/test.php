<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    $to = trim($_POST['youEmail']); // 받는사람 메일주소 
    echo $to;
    $subject = '메일 인증'; 
    $message = '메일 인증되셨습니다! 로그인 후 서비스를 이용해주시길 바랍니다.'; 
    // html 메일을 보낼 때 꼭 이헤더가 붙어야한다. 
    // $headers[] = 'MIME-Version: 1.0'; $headers[] = 'Content-type: 
    // /html`; charset=utf-8'; 
    $header = "Content-Type: text/html; charset=utf-8\r\n";
    $header .= "MIME-Version: 1.0\r\n";

    $header .= "Return-Path: <". $mailFrom .">\r\n";
    $header .= "From: ". $nameFrom ." <". $mailFrom .">\r\n";
    $header .= "Reply-To: <". $mailFrom .">\r\n";

    // Additional headers 
    //$headers[] = 'To: Kim<받는사람@gmail.com>'; 
    $headers[] = 'From: ducks1077<받는사람@gmail.com>'; 
    //$headers[] = 'Cc: Kim1<참조인1@naver.com>,Kim2<참조인2@gmail.com>'; 
    //$headers[] = 'Bcc: 숨은참조인3@gmail.com'; 
    mail($to, $subject, $message, $headers); 
    echo "편지를 보냈습니다."; 
        echo "<script language=javascript> alert('메일인증성공!'); location.replace('http://www.ducks1077.cafe24.com/login/findingPw.php'); </script>"; 
?>

</body>
</html>