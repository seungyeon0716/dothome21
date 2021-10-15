<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardID = $_GET['boardID'];
    $boardID = $connect -> real_escape_string($boardID);

    $sql = "DELETE FROM myBoard WHERE myBoardID = {$boardID}";
    $connect -> query($sql);
?>

<script>
    location.href = "setting.php";
</script>