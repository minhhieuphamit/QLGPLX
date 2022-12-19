<?php
    session_start();
    include_once ('config.php');
    if(isset($_SESSION['username'])) {
        session_destroy();
        echo "<script>window.location.href ='Main_Index.php'</script>";
    }else {
        echo "<script>window.location.href ='Main_Index.php'</script>";
    }
?>