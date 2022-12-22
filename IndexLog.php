<?php session_start();?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang Thông Tin Giấy Phép Lái Xe</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> 
        <link rel="icon" type="image/x-icon" href="https://file1.hutech.edu.vn/file/editor/homepage/stories/hinh34/logo%20CMYK-03.png">
        <link rel="stylesheet" href="./assets/css/common.css">
        <link rel="stylesheet" href="./assets/css/header.css">
        <link rel="stylesheet" href="./assets/css/content.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
        <link rel="stylesheet" href="./assets/css/modal.css">
        <link rel="stylesheet" href="./assets/css/modal-1.css">
        <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
        <script src="https://kit.fontawesome.com/f997a3e2c7.js" crossorigin="anonymous"></script>
    </head>

    <body>
        <div id="main">
            <div id="module-1" class="header">
                <div class="container">
                    <div id="module-2" class="logo">
                        <a href="IndexLog.php" title="Trang chủ">     
                            <img class="logo-banner" src="./assets/img/logo.png" alt="Logo"> 
                        </a>
                    </div>
                    <div id="module-3" class="navigation">
                        <ul class="nav">
                            <li><a href="IndexLog.php">Trang Chủ</a></li>
                            <li><a href="Admin.php">Quản lý hồ sơ</a></li>
                            <li><a href="QuanLyViPham.php">Quản lý vi phạm</a></li>
                        </ul>
                        <a href="Logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                        <i class="hello">Xin chào  <?php echo ($_SESSION['nameUser']);?> </i>
                    </div>
                </div>
            </div>

            <div id="module-4" class="content">
                <div class="container">
                    <div id="module-5" class="search-driving-license">
                        <h2 class="search-heading">Tra Cứu Thông Tin Giấy phép lái xe</h2>
                        <form class="search-form" name="form1" action="" method="post">
                            <div class="search-row">
                                <label class="label col-left">Số GPLX:</label>
                                <input class="form-control col-right" type="text" id="maGPLX" name="maGPLX" placeholder="Nhập số giấy phép lái xe">
                            </div>
                            <div class="search-row">
                                <label class="label col-left">Hạng GPLX:</label>
                                <select class="form-control col-right" id="Hang" name="Hang">
                                    <option value="0"></option>
                                    <option>A1</option>
                                    <option>A2</option>
                                    <option>A3</option>
                                    <option>A4</option>
                                    <option>B11</option>
                                    <option>B12</option>
                                    <option>B2</option>
                                    <option>C</option>
                                    <option>D</option>
                                    <option>E</option>
                                    <option>FB2</option>
                                    <option>FC</option>
                                    <option>FD</option>
                                    <option>FE</option>
                                </select>
                            </div>
                            <div class="search-row">
                                <label class="label col-left">Ngày/Tháng/Năm sinh:</label>
                                <input class="form-control col-right" type="date" id="Ngay" name="Ngay" placeholder="Nhập ngày tháng năm sinh">
                            </div>
                            <button type="button" class="btn-send-contact js-search" id="btn_TraCuu" value="Tra cứu" name="submit">Tra cứu giấy phép lái xe </button>
                        </form>
                    </div>
                </div>
            </div>

            <div id="module-8" class="content">
                <div class="container">
                    <div id="module-9" class="news">
                        <div class="title">
                            <h3 class="news-heading">Tin Tức </h3>
                        </div>
                        <li><a href="https://gplx.gov.vn/tin-tuc2/toan-bo-10-du-an-duong-bo-cap-bach-sap-can-dich.html">TOÀN BỘ 10 DỰ ÁN ĐƯỜNG BỘ CẤP BÁCH SẮP CÁN ĐÍCH</a></li><hr>
                        <li><a href="https://gplx.gov.vn/tin-tuc2/bo-sung-mot-so-tuyen-quoc-lo-vao-quy-hoach.html">BỔ SUNG MỘT SỐ TUYẾN QUỐC LỘ VÀO QUY HOẠCH</a></li><hr>
                        <li><a href="https://gplx.gov.vn/tin-tuc2/van-tai-lech-ve-duong-bo-doi-chi-phi-logistics.html">VẬN TẢI LỆCH VỀ ĐƯỜNG BỘ, ĐỘI CHI PHÍ LOGISTICS</a></li><hr>
                        <li><a href="https://gplx.gov.vn/tin-tuc2/dieu-hanh-tuyen-truyen-luat-giao-thong-duong-bo.html">DIỄU HÀNH TUYÊN TRUYỀN LUẬT GIAO THÔNG ĐƯỜNG BỘ</a></li><hr>
                        <li><a href="https://gplx.gov.vn/tin-tuc2/le-cong-bo-thoa-thuan-hop-tac-giua-tong-cuc-duong-bo-viet-nam-va-truong-dai-hoc-bach-khoa-ha-noi.html">LỄ CÔNG BỐ THỎA THUẬN HỢP TÁC GIỮA TỔNG CỤC ĐƯỜNG BỘ VIỆT NAM VÀ TRƯỜNG ĐẠI HỌC BÁCH KHOA HÀ NỘI</a></li><hr>
                    </div>
                </div>
            </div>

            <div id="module-6" class="footer">
                <div class="container">
                    <div id="module-7" class="address-and-link">
                        <h4 class="address"><strong><a href="Index.php">Trang thông tin điện tử giấy phép lái xe</a></strong></h4>
                        <div class="link">
                            <i class="ti ti-facebook">
                                <span><a href="https://www.facebook.com/ptt27092002">Facebook</a></span>
                            </i>
                            <i class="ti ti-github">
                                <span><a href="https://github.com/minhhieuphamit/QLGPLX-CNPM">Github</a></span>
                            </i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal js-modal">
            <div class="modal-container js-modal-container">

                <div class="modal-close js-modal-close">
                    <i class="ti ti-close"></i>
                </div>

                
                <div class="modal-header">
                    <a href="#"><img src="./assets/img/logo.png"></a>
                </div>
                <form action="Index.php"  method="post">            
                    <div class="modal-body">
                        <div class="modal-login">
                            <div class="modal-title">Đăng Nhập</div>
                            <div class="modal-username login">
                            <i class="ti ti-user"></i>
                            <input class="form-control" type="text" id = "username" name="username"placeholder="Tên đăng nhập hoặc email">
                            </div>
                            <div class="modal-password login">
                            <i class="ti ti-lock"></i>
                            <input class="form-control" type="password" id = "password" name="password" placeholder="Mật khẩu">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="modal-login-button">
                        <button id="submit" value="dang nhap" name = "submit">LOGIN</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        <div class="modal-1 js-modal-1">
            <div class="modal-1-container js-modal-1-container">

                <div class="modal-1-close js-modal-1-close ">
                    <i class="ti ti-close"></i>
                </div>

                <div class="modal-1-header">
                    <center><h2 class="modal-1-title">Thông tin tra cứu</h2></center>
                </div>

                <div class="modal-1-body">
                    <div class="modal-1-info">
                        <div class="pl-10 pr-10">
                            <div class="search-control">
                                <label>Họ và Tên : </label>
                                <span id ="Hoten" class="text-content">:</span>
                            </div>
                        </div>
                        <div class="pl-10 pr-10">
                            <div class="search-control">
                                <label>Giới tính :</label>
                                <span id ="GioiTinh" class="text-content">:</span>
                            </div>
                        </div>
                        <div class="pl-10 pr-10">
                            <div class="search-control">
                                <label>Ngày sinh :</label>
                                <span id ="NgaySinh"class="text-content">:</span>
                            </div>
                        </div>
                        <div class="pl-10 pr-10">
                            <div class="search-control">
                                <label>Số giấy phép lái xe :</label>
                                <span id = "MaGPLX" class="text-content">:</span>
                            </div>
                        </div>
                        <div class="pl-10 pr-10">
                            <div class="search-control">
                                <label>Ngày cấp giấy phép lái xe :</label>
                                <span id = "NgayCap" class="text-content">:</span>
                            </div>
                        </div>
                        <div class="pl-10 pr-10">
                            <div class="search-control">
                                <label>Ngày hết hạn giấy phép lái xe :</label>
                                <span id="NgayHetHan" class="text-content">:</span>
                            </div>
                        </div>
                        <div class="pl-10 pr-10">
                            <div class="search-control">
                                <label>Hạng giấy phép lái xe :</label>
                                <span id = "Ma_Hang" class="text-content">:</span>
                            </div>
                        </div>
                        <div class="pl-10 pr-10">
                            <div class="search-control">
                                <label>Ngày trúng tuyển :</label>
                                <span id ="NgayTrungTuyen" class="text-content">:</span>
                            </div>
                        </div>
                        
                        <div class="pl-10 pr-10 special">
                            <div class="search-control">
                                <label>Trung tâm sát hạch :</label>
                                <span id = "NoiCap" class="text-content">:</span>
                            </div>
                        </div>
                    </div>
                    <table class="modal-1-table">
                        <thead>
                            <tr>
                                <th scope="col">Mã vi phạm</th>
                                <th scope="col">Ngày vi phạm</th>
                                <th scope="col">Nội dung vi phạm</th>
                            </tr>
                        </thead>
                        <tbody id = getViPham>
                            <tr>
                            
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="modal-1-footer">
                    <button type="button" class="modal-1-button js-modal-1-close">Đóng</button>
                </div>
            </div>
        </div>

        <script src="./JavaScript/Login.js"></script>
        <script src="./JavaScript/Search.js"></script>
    </body>
</html>