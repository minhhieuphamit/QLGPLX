<?php
    include("Config.php");
    $k = $_POST['noiDung'];
    $sql = "Select * from LoiViPham where NoiDungViPham LIKE N'$k'";   
    $result = sqlsrv_query( $conn, $sql);
    while( $row = sqlsrv_fetch_array( $result, SQLSRV_FETCH_ASSOC)) {
        $data['tienphat'] = $row['TienPhat'];
        $data['mavipham'] = $row['MaViPham'];
    }echo json_encode($data);
?>