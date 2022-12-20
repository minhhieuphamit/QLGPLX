<?php
    session_start();
    include_once ('config.php');
    if(isset($_SESSION['username'])) {
        session_destroy();
        echo "<script>window.location.href ='index.php'</script>";
    }else {
        echo "<script>window.location.href ='index.php'</script>";
    }
?>