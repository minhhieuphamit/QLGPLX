<?php
    include("Config.php");
    $maGLLX = trim($_POST['ma']);
    $hang = trim($_POST['hang']);
    $NgaySinh = trim($_POST['ngay']);
    $sql = "EXEC proc_TimKiemHoSoGPLX '$maGLLX','$hang','$NgaySinh'"; 
    $result = sqlsrv_query( $conn, $sql);
    $row_count = sqlsrv_has_rows($result);
    if ($row_count == true) {
        while ($row = sqlsrv_fetch_array($result)) {
            $data['Hoten'] = $row["Hoten"];
            $data['GioiTinh'] = $row["GioiTinh"];
            $data['NgaySinh'] = $row["NgaySinh"];
            $data['MaHang'] = $row["MaHang"];
            $data['MaGP'] = $row["MaGPLX"];
            $data['NgayCap'] = $row["NgayCap"];
            $data['NgayHetHan'] = $row["NgayHetHan"];
            $data['ttsh'] = $row["ttsh"];
        }
        echo json_encode($data);
    }else {
        $data['Hoten'] = 'Không có dữ liệu';
        $data['GioiTinh'] = 'Không có dữ liệu';
        $data['NgaySinh'] ='Không có dữ liệu';
        $data['MaHang'] = 'Không có dữ liệu';
        $data['MaGP'] =  'Không có dữ liệu';
        $data['NgayCap'] = 'Không có dữ liệu';
        $data['NgayHetHan'] ='Không có dữ liệu';
        $data['ttsh'] = 'Không có dữ liệu';
        echo json_encode($data);
    }
?>
