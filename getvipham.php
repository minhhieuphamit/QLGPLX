<?php
    include("config.php");
    $maGLLX = $_POST['ma'];
    $sql = "select b.MaBienBan, l.NoiDungViPham, CONVERT(varchar, b.NgayLap, 103) as NgayLap from BienBanViPham b, CT_ViPham ct, LoiViPham l where b.MaBienBan = ct.MaBienBan and ct.MaViPham = l.MaViPham and b.MaGPLX ='$maGLLX'"; 
    $result = sqlsrv_query( $conn, $sql);
    $row_count = sqlsrv_has_rows($result);
if ($row_count == true) {
        while ($obj = sqlsrv_fetch_object($result)) {
            echo "<tr>
                  <td>$obj->MaBienBan</td>
                  <td>$obj->NoiDungViPham</td>
                  <td>$obj->NgayLap</td>
                  </tr>";
        }
}
else
{
    
    echo '<td class="text-center" colspan="12">Không có dữ liệu</td>';
}
?>
