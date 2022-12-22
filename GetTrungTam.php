<?php
    include("Config.php");
    $k = $_POST['matt'];
    $k= trim($k);
    $sql = "Select MaTT from TrungTamSatHach where TenTT LIKE N'$k'";
    $result = sqlsrv_query( $conn, $sql);
    while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) {?>
        <option value = "<?php echo($row['MaTT'])?>" ><?php echo($row['MaTT']) ?></option>
    <?php
    }echo $sql;
?>