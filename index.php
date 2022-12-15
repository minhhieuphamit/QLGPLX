<?php
session_start();
 
include_once ('config.php');
 
//kiem tra cookie xem da tôn tai chua
//neu chua thi minh ha dang nhap;
if (empty($_SESSION['username']))
{
  if (isset($cookie_name))
  {
 
    if (isset($_COOKIE[$cookie_name]))
    {
 
      parse_str($_COOKIE[$cookie_name]);
 
      $sql2 = "select * from User where username='$usr' and password='$hash'";
 
      $result2 = sqlsrv_query($sql2, $conn);
      
 
      if ($result2)
      {
 
        header('location:admin.php');
 
        exit;
 
      }
 
    }
 
  }
 
}
 
else
{
 
  header('location:admin.php'); //chuyển qua trang đăng nhập thành công
  exit;
 
}
 
if (isset($_POST['submit']))
{
 
  $username = $_POST['username'];
 
  $password = ($_POST['password']);
 
 
  if ($username == "" || $password == "")
  {
 
    echo "<script>alert('Vui lòng nhập đầy đủ thông tin');</script>" ;
    echo "<script>window.location.href ='index.php'</script>";
 
  }
 
  else
  {
 
   
    $sql = "select * from [dbo].[User] where username='$username' and password='$password'";
    $result = sqlsrv_query( $conn, $sql ); 
    if (!$result)
    {
 
      echo "loi cau truy van" . sqlsrv_errors();
 
      exit;
 
    }
 
    $row = sqlsrv_fetch_array($result);
    $f_user = $row['username'];
    $f_pass = $row['password'];
    $f_role = $row['idRole'];
    $f_Hoten = $row['nameUser'];

    if ($f_user == $username && $f_pass == $password)
    {
 
      $_SESSION['username'] = $f_user;
      $_SESSION['password'] = $f_pass;
      $_SESSION['idRole'] = $f_role;
      $_SESSION['nameUser'] = $f_Hoten;
      header('location:admin.php'); //chuyền qua trang đăng nhập thành công
      exit;
    }
    else
    {
      echo "<script>alert('Sai tên đăng nhập hoặc mật khẩu');</script>" ;
    }
 
  }
 
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Thông Tin Giấy Phép Lái Xe</title>
    <link rel="icon" type="image/x-icon" href="https://file1.hutech.edu.vn/file/editor/homepage/stories/hinh34/logo%20CMYK-03.png">
    <link rel="stylesheet" href="./assets/css/common.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel="stylesheet" href="./assets/css/content.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/modal.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
</head>

<body>
    <div id="main">
        <div id="module-1" class="header">
            <div class="container">
                <div id="module-2" class="logo">
                    <a href="#" title="Trang chủ">     
                        <img class=" logo-banner" src="./assets/img/logo.png" alt="Logo">
                    </a>
                </div>
                <div id="module-3" class="navigation">
                    <ul class="nav">
                        <li><a href="/">Trang Chủ</a></li>
                        <li><a href="#">Quản Lý Vi Phạm</a></li>
                    </ul>
                    <i class="ti ti-unlock js-login"></i>
                    <i class="ti ti-search"></i>
                </div>
            </div>
        </div>
        <div id="module-4" class="content">
            <div class="container">
                <div id="module-5" class="search-driving-license">
                    <h2 class="search-heading">TRA CỨU THÔNG TIN GIẤY PHÉP LÁI XE</h2>
                    <form name="form1" action="ketqua.php" onsubmit="return  required()" method="post">
                    <label class="label col-left">Số GPLX:</label>
                    <input class="form-control col-right" type="text" id="maGPLX" name="maGPLX" placeholder="Nhập số giấy phép lái xe" ></br></br>
                    <label class="label col-left">Hang:</label>
                    <select class="form-control col-right" id="Hang" name="Hang">
                                                                    <option></option>
                                                                    <option>A1</option>
                                                                    <option>A2</option>
                                                                    <option>A3</option>
                                                                    <option>A4</option>
                                                                    <option>B11</option>
                                                                    <option>D</option>
                                                                    <option>B2</option>
                                                                    <option>C</option>
                                                                    <option>D</option>
                                                                    <option>E</option>
                                                                    <option>FB2</option>
                                                                    <option>FC</option>
                                                                    <option>FD</option>
                                                                    <option>FE</option></select></br></br>
                    <label class="label col-left">Ngày/Tháng/Năm sinh:</label>
                    <input class="form-control col-right" type="date" id="Ngay" name="Ngay" ></br>                                             
                    <input class="btn-send-contact" type="submit" id="btn" value="Tra cứu" name = "submit"/></br></br>
                    </form>
                    <script>
                        function required()
                        {
                            var ma = document.forms["form1"]["maGPLX"].value;
                            var ngay = document.forms["form1"]["Ngay"].value;
                            var hang = document.forms["form1"]["Hang"].value;
                            if (ma == "" || ngay == "" || hang == "")
                            {
                                alert("Vui long nhap day du thong tin");
                                    return false;
                            }
                            else 
                            {
                                //alert('Wait...');
                                return true; 
                            }
                        }
                    </script>
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

    <div class="modal js-modal">
        <div class="modal-container js-modal-container">
            <div class="modal-close js-modal-close">
                <i class="ti-close"></i>
            </div>

            <div class="modal-header">
                <a href="#"><img src="./assets/img/logo.png"></a>
            </div>
            <form action="index.php"  method="post">            
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

    <script>
        const login = document.querySelector('.js-login')
        const modal = document.querySelector('.js-modal')
        const modalClose = document.querySelector('.js-modal-close')
        const modalContainer = document.querySelector('.js-modal-container')

        function openFormLogin() {
            modal.classList.add('open')
        }

        function closeFormLogin() {
            modal.classList.remove('open')
        }

        login.addEventListener('click', openFormLogin)

        modalClose.addEventListener('click', closeFormLogin)



        modalContainer.addEventListener('click', function (event) {
            event.stopPropagation()
        })

        const search = document.querySelector('.js-search')

        search.addEventListener('click', function (event) {
            alert('check')
        })
    </script>

</body>

</html>

