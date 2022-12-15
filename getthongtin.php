<?php
    include("config.php");
    $k = $_POST['id'];
    $k= trim($k);
    $sql="Select Holot+' '+ ten as Hoten from LyLich where SoCCCD ='$k';";
    $result = sqlsrv_query( $conn, $sql);
    while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC) ) 
                    {
                    ?>
                        <option><?php echo($row['Hoten'])?></option>
                    <?php
                    }
    echo $sql;

?>