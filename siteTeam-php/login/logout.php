<?php
    include "../connect/session.php";

    unset($_SESSION['myMemberID']);
    unset($_SESSION['youEmail']);
?>

<script>
    location.href="../login/login.php";
</script>