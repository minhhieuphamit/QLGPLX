<?php session_start();?>
<?php
    include("Config.php");
    $id_role = $_SESSION['idRole'];
    if (isset($_SESSION['username'])) {
        if($id_role == 1) {
            echo "<script>alert('Bạn không có quyền truy cập !!!!');</script>" ;
            echo "<script>window.location.href ='Admin.php'</script>";
        }

        if (isset($_POST['submit_add']) && $id_role !== 1) {
            $MaBB = $_POST['maBienBan'];
            $MaGPLX = $_POST['maGPLX'];
            $NgayLap = $_POST['dateLap'];
            $maVP = $_POST['maVP'];
            $themVP = "insert into BienBanViPham values('$MaBB','$MaGPLX','$NgayLap')";
            $themCTVP = "insert into CT_ViPham values('$MaBB','$maVP')";
            $kq = sqlsrv_query($conn, $themVP);
            $kq2 = sqlsrv_query($conn, $themCTVP);
            if (($kq) !== false && $kq2 !== false) {
                echo "<script>alert('Thêm hồ sơ thành công');</script>";
                echo "<script>window.location.href ='QuanLyViPham.php'</script>";
            }else {
                echo "<script>alert('Sai thông tin. Vui lòng nhập lại');</script>";
            }
        }    

        if (isset($_POST['submit_edit']) && $id_role !== 1) {
            $up_MaBB = $_POST['up_maBienBan'];
            $up_MaBB_read = $_POST['up_maBienBan_read'];
            $up_MaGPLX = $_POST['up_maGPLX'];
            $up_NgayLap = $_POST['up_dateLap'];
            $up_maVP = $_POST['up_maVP'];
            $upVP = "update BienBanViPham set MaBienBan = '$up_MaBB', MaGPLX = '$up_MaGPLX', NgayLap = ' $up_NgayLap' where MaBienBan = '$up_MaBB_read'";
            $upCTVP = "update CT_ViPham set MaViPham = '$up_maVP' where MaBienBan = '$up_MaBB'";
            $kq = sqlsrv_query($conn, $upVP);
            $kq2 = sqlsrv_query($conn, $upCTVP);
            if (($kq) !== false && $kq2 !== false) {
                echo "<script>alert('Sửa hồ sơ thành công');</script>";
                echo "<script>window.location.href ='QuanLyViPham.php'</script>";
            }else {
                echo "<script>alert('Sai thông tin. Vui lòng nhập lại');</script>";
            }
        }

        if (isset($_POST['submit_del']) && $id_role !== 1) {
            $del_MaBB = $_POST['id_del_text'];
            $delvp = "delete from BienBanViPham where MaBienBan = '$del_MaBB'";
            $delctvp = "delete from CT_ViPham where MaBienBan = '$del_MaBB'";
            $kq = sqlsrv_query($conn, $delvp);
            $kq2 = sqlsrv_query($conn, $delctvp);
            if (($kq) !== false && $kq2 !== false) {
                echo "<script>alert('Xóa hồ sơ thành công');</script>";
                echo "<script>window.location.href ='QuanLyViPham.php'</script>";
            }else {
                echo "<script>alert('Sai thông tin. Vui lòng nhập lại');</script>";
            }
        }
    }else {
        echo "<script>alert('Vui lòng đăng nhập');</script>";
        echo "<script>window.location.href ='Index.php'</script>";   
    }  
?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Trang Quản Lý Lỗi Vi Phạm</title>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
        <link rel="icon" type="image/x-icon" href="https://file1.hutech.edu.vn/file/editor/homepage/stories/hinh34/logo%20CMYK-03.png">
        <link rel="stylesheet" href="./assets/css/common.css">
        <link rel="stylesheet" href="./assets/css/header.css">
        <link rel="stylesheet" href="./assets/css/content.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
        <link rel="stylesheet" href="./assets/css/table.css">
        <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
        <script src="https://kit.fontawesome.com/f997a3e2c7.js" crossorigin="anonymous"></script>
        <style>  
            .list-unstyled
            {
            top: 70px;
            left: 0;
            list-style-type: none;
            margin: 0;
            padding: 0;
            background-color:#eee;  
            width: 100%;
            max-height: 100px;
            overflow-y: auto;
            }
            .list-unstyled li
            {
            cursor:pointer;  
            padding:12px; 
            }
            .table {
            zoom: 80%;
            }
        </style>
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

            <div class="col text-center">
                <br><h2>Hệ thống quản lý lỗi vi phạm </h2><br>
                <button type="button" class="btn btn-primary" id ='add'data-bs-toggle="modal" data-bs-target="#modelAdd">
                    Thêm biên bản vi phạm
                </button>
            </div></br>
            
            <div class="container-lg">
                <table class="table table-bordered">
                    <thead>
                        <tr class="table-active center-block ">
                            <th>Mã biên bản </th>
                            <th>Mã giấy phép lái xe</th>
                            <th>Nội dung vi phạm</th>
                            <th>Ngày lập</th>
                            <th>Tiền phạt</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            include_once ('Config.php');
                            $id_role = $_SESSION['idRole'];
                            if(isset($_SESSION['username'])) {
                                $sql2 = "select b.MaBienBan, b.MaGPLX, l.NoiDungViPham, CONVERT(varchar, b.NgayLap, 103) as NgayLap, l.TienPhat from BienBanViPham b, CT_ViPham ct, LoiViPham l where b.MaBienBan = ct.MaBienBan and ct.MaViPham = l.MaViPham";
                                if (($result2 = sqlsrv_query($conn, $sql2)) !== false) {
                                    while ($obj = sqlsrv_fetch_object($result2)) {
                                        echo "<tr>
                                            <td>$obj->MaBienBan</td>
                                            <td>$obj->MaGPLX</td>
                                            <td>$obj->NoiDungViPham</td>
                                            <td>$obj->NgayLap</td>
                                            <td>$obj->TienPhat</td>
                                            <td>
                                            <button type='button' id = 'del' class='btn btn-danger delbtn'  data-bs-toggle='modal' data-bs-target='#modelDel'>Xóa</button>
                                            <button type='button' id = 'edit' class='btn btn-success editbtn' data-bs-toggle='modal' data-bs-target='#modelEdit'>Sửa</button>                  
                                            </td>
                                            </tr>";
                                    }
                                }
                            }else {
                                echo "<script>alert('Bạn chưa đăng nhập. Vui lòng đăng nhập');</script>" ;
                            }
                        ?>
                    </tbody>
                </table>
            </div>
    
            <div id="module-6" class="footer">
                <div class="container">
                    <div id="module-7" class="address-and-link">
                        <h4 class="address"><strong><a href="Index.php">Trang thông tin điện tử giấy phép lái xe</a></strong></h4>
                        <div class="link">
                            <i class="ti ti-facebook">
                                <span><a href="https://www.facebook.com/itHutech">Facebook</a></span>
                            </i>
                            <i class="ti ti-github">
                                <span><a href="https://github.com/minhhieuphamit/QLGPLX-CNPM">Github</a></span>
                            </i>
                        </div>
                    </div>
                </div>
            </div>        
        </div>

        <div class="modal fade" id="modelAdd" tabindex="-1" aria-labelledby="modelAdd" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelAdd">Thêm biên bản vi phạm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form1" action=""  method="post">
                            <div class="container" style="width: 750px;">
                                <label>
                                    <h6>Nhập mã biên bản :</h6>
                                </label>
                                <input type="text" name="maBienBan" id="maBienBan" class="form-control" placeholder="Vui lòng nhập mã biên bản" /><br>
                                
                                <label>
                                    <h6>Nhập mã mã giấy phép lái xe :</h6>
                                </label>
                                <input type="text" name="maGPLX" id="maGPLX" class="form-control" placeholder="Vui lòng nhập mã GPLX" /><br>
                                
                                <div id="listGPLX"></div>
                                <label>
                                    <h6>Nội dung vi phạm :</h6>
                                </label>
                                <select id="NoiDung" onchange="GetNoiDung()" class="form-select">
                                    <option value="0"></option>
                                        <?php
                                            $sql = "select NoiDungViPham from LoiViPham;";
                                            $stmt = sqlsrv_query( $conn, $sql);
                                            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                                                <option value="<?php echo($row['NoiDungViPham'])?>">
                                                    <?php echo($row['NoiDungViPham']) ?>
                                                </option>
                                            <?php
                                            }
                                        ?>
                                </select><br> 

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Ngày lập :</h6>
                                        </label>
                                        <input type="date" class="form-control" id="dateLap" name="dateLap" /><br>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Tiền phạt : </h6>
                                        </label>
                                        <input type="text" name="tienPhat" id="tienPhat" class="form-control" readonly/><br>
                                        <input hidden type="text" name="maVP" id="maVP" class="form-control" readonly/>
                                    </div><br>
                                </div><br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="buttom"  id="submit_add"  name="submit_add">Thêm biên bản vi phạm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modelEdit" tabindex="-1" aria-labelledby="modelEdit" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelEdit">Chỉnh sửa giấy phép lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form name="form1" action=""  method="post">
                            <div class="container" style="width: 750px;">
                                <label>
                                    <h6>Mã biên bản :</h6>
                                </label>
                                <input type="text" name="up_maBienBan" id="up_maBienBan" class="form-control" placeholder="Vui lòng nhập mã biên bản" /><br>
                                <input hidden type="text" name="up_maBienBan_read" id="up_maBienBan_read" class="form-control" readonly/>

                                <label>
                                    <h6>Mã giấy phép lái xe :</h6>
                                </label>
                                <input type="text" name="up_maGPLX" id="up_maGPLX" class="form-control" placeholder="Vui lòng nhập mã GPLX"  /><br>
                                <div id="listGPLX"></div>
                                <label>
                                    <h6>Nội dung vi phạm :</h6>
                                </label>
                                <select id="up_NoiDung" onchange="up_GetNoiDung()" class="form-select">
                                    <option value="0"></option>
                                        <?php
                                            $sql = "select NoiDungViPham from LoiViPham;";
                                            $stmt = sqlsrv_query( $conn, $sql);
                                            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                                                <option value="<?php echo($row['NoiDungViPham'])?>">
                                                    <?php echo($row['NoiDungViPham']) ?>
                                                </option>
                                            <?php
                                            }
                                        ?>
                                </select><br> 

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Ngày lập :</h6>
                                        </label>
                                        <input type="date" class="form-control" id="up_dateLap" name="up_dateLap" /><br>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Tiền phạt : </h6>
                                        </label>
                                        <input type="text" name="up_tienPhat" id="up_tienPhat" class="form-control" readonly/><br>
                                        <input hidden type="text" name="up_maVP" id="up_maVP" class="form-control" readonly/>
                                    </div><br>
                                </div><br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="buttom"  id="submit_edit"  name="submit_edit">Sửa biên bản vi phạm</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modelDel" tabindex="-1" aria-labelledby="modelDel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelDel">Xóa hồ sơ giấy phép lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="form1" action=""  method="post">
                            <div id = 'id_del'></div>
                            <input type="text" class="form-control" id="id_del_text" name="id_del_text"hidden/>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-danger" type="buttom"  id="submit_del"  name="submit_del">Xóa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="./JavaScript/VP.js"></script>
    </body>
</html>
