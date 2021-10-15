<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>게시판 수정하기</title>
</head>
<body>
    <?php
       include "../connect/connect.php";
       include "../connect/session.php";
       include "../connect/sessionCheck.php";

       $boardID = $_POST['boardID'];
       $boardTitle = $_POST['boardTitle'];
       $boardContent = $_POST['boardContent'];
       $boardPass = $_POST['boardPass'];

       // echo $boardID, $boardTitle, $boardContent, $boardPass;
       // echo "<pre>";
       // var_dump($_SESSION);
       // echo "</pre>";

       $boardTitle = $connect -> real_escape_string($boardTitle);
       $boardContent = $connect -> real_escape_string($boardContent);
       $memberID = $_SESSION['myMemberID'];

       $sql = "SELECT * FROM myMember WHERE myMemberID = {$memberID}";
       $result = $connect -> query($sql);

       if($result){
           $info = $result -> fetch_array(MYSQLI_ASSOC);

           // echo "<pre>";
           // var_dump($_SESSION);
           // echo "</pre>";

           //아이디, 비밀번호 확인
           if( $info['youPass'] == $boardPass && $info['myMemberID'] == $memberID){
               //업데이트
               $sql = "UPDATE myBoard SET boardTitle = '{$boardTitle}', boardContent = '{$boardContent}' WHERE myBoardID = '{$boardID}'";
               $result = $connect -> query($sql);
           } else {
               echo "<script>alert('비밀번호가 일치하지 않습니다. 다시 한번 확인해주세요.'); history.back(1);</script>";
           }
       }
    
    ?>
        <script>
            location.href="setting.php";
        </script>
</body>
</html>