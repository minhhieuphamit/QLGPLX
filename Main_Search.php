<?php include("config.php");?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/common.css">
        <link rel="icon" type="image/x-icon"
            href="https://file1.hutech.edu.vn/file/editor/homepage/stories/hinh34/logo%20CMYK-03.png">
        <link rel="stylesheet" href="./assets/css/common.css">
        <link rel="stylesheet" href="./assets/css/header.css">
        <link rel="stylesheet" href="./assets/css/content.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
        <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
        <title>Hệ thống tra cứu giấy phép lái xe</title>
    </head>

    <body>
        <div id="main">
            <div id="module-1" class="header">
                <div class="container">
                    <div id="module-2" class="logo">
                        <a href="Sub_ToIndex.php" title="Trang chủ">
                            <img class="logo-banner" src="./assets/img/logo.png" alt="Logo">
                        </a>
                    </div>
                    <div id="module-3" class="navigation">
                        <ul class="nav">
                            <li><a href="Sub_ToIndex.php">Trang Chủ</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div>
                <h1 class="search-heading">
                    <center>­</center>
                </h1>
                <h2 class="search-heading">
                    <center>TRA CỨU THÔNG TIN GIẤY PHÉP LÁI XE</center>
                </h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Số CCCD</th>
                            <th>Họ và tên</th>
                            <th>Giới tính</th>
                            <th>Mã GPLX</th>
                            <th>Mã hạng</th>
                            <th>Ngày sinh</th>
                            <th>Ngày cấp</th>
                            <th>Ngày hết hạn</th>
                            <th>SĐT</th>
                            <th>Địa chỉ</th>
                            <th>Điểm lý thuyết</th>
                            <th>Điểm thực hành</th>
                            <th>Trung tâm</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            if ($conn) {
                                $maGLLX = $_POST['maGPLX'];
                                $hang = $_POST['Hang'];
                                $NgaySinh = $_POST['Ngay'];
                                echo " Hồ sơ :  ";
                                echo $maGLLX;
                                $sql = "EXEC proc_TraCuuHoSoGPLX '$maGLLX','$hang','$NgaySinh'";
                                if (($result = sqlsrv_query($conn, $sql)) !== false) {
                                    while ($obj = sqlsrv_fetch_object($result)) {
                                        echo "<tr>
                                        <td>$obj->SoCCCD</td>
                                        <td>$obj->Hoten</td>
                                        <td>$obj->GioiTinh</td>
                                        <td>$obj->MaGPLX</td>
                                        <td>$obj->MaHang</td>
                                        <td>$obj->NgaySinh</td>
                                        <td>$obj->NgayCap</td>
                                        <td>$obj->NgayHetHan</td>
                                        <td>$obj->SDT</td>
                                        <td>$obj->DiaChi</td>
                                        <td>$obj->DiemLT</td>
                                        <td>$obj->DiemTH</td>
                                        <td>$obj->TenTT</td>
                                        </tr>";
                                    }
                                }
                            }else {
                                die(print_r(sqlsrv_errors(), true));
                            }
                        ?>
                    </tbody>
                </table>
            </div><br><br><br><br><br><br><br><br><br><br>                
            <!-- Footer of Page -->
            <div id="module-6" class="footer">
                <div class="container">
                    <div id="module-7" class="address-and-link">
                        <h4 class="address"><strong><a href="">Trang Thông tin điện tử giấy phép lái xe</a></strong></h4>                      
                        <div class="link">
                            <div class="link-1">
                                <i class="ti ti-facebook"></i>
                                <span><a href="https://www.facebook.com/ptt27092002">Facebook</a></span>
                            </div>
                            <div class="link-2">
                                <i class="ti ti-mobile"></i>
                                <span>0786924515</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
    </body>
</html>