<?php session_start();?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"/>
        <link rel="stylesheet" href="./assets/css/common.css">
        <link rel="stylesheet" href="./assets/css/header.css">
        <link rel="stylesheet" href="./assets/css/content.css">
        <link rel="stylesheet" href="./assets/css/footer.css">
        <link rel="stylesheet" href="./assets/css/hoSo.css">
        <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
    </head>

    <body onload= 'disableBtn()'>
        <!-- Header -->
        <div id="module-1" class="header">
            <div class="container">
                <div id="module-2" class="logo">
                    <a href="Main_Index_Login.php" title="Trang chủ"><img class="logo-banner" src="./assets/img/logo.png" alt="Logo"></a> 
                </div>
                <div id="module-3" class="navigation">
                    <ul class="nav">
                        <li><a href="Main_Index_Login.php">Trang Chủ</a></li>
                        <li><a href="Main_HS.php">Quản Lý Hồ Sơ</a></li>
                        <li><a href="Main_VP.php">Quản Lý Vi Phạm</a></li>
                    </ul>
                    <i class="hello"> Xin chào  <?php echo ($_SESSION['nameUser']);?> </i>
                </div>
            </div>
        </div>
        <!-- Content  -->
        <div class="col text-center">
            <br><h2>Hệ thống quản lý giấy phép lái xe</h2><br>
            <button type="button" class="btn btn-primary" id ='add' data-bs-toggle="modal"  data-bs-target="#modelAdd" 
                <?php
                    $id_role = $_SESSION['idRole'];
                    if($id_role==2) {
                        echo 'disabled=disabled';            
                    }
                ?>> Thêm hồ sơ
            </button>
            <a type="button" href="Sub_Logout.php" class="btn btn-danger" >Đăng xuất</a><br>
        </div></br>

        <div class="container-fluid">
            <table class="table table-bordered table-sm ">
                <thead>
                    <tr class="table-active center-block text-center">
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
                        <th>Điểm LT</th>
                        <th>Điểm TH</th>
                        <th>Trung tâm</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        include_once ('config.php');
                        $id_role = $_SESSION['idRole'];
                        if(isset($_SESSION['username'])){
                            $sql2 = "EXEC proc_HoSoGPLX";
                            if ($id_role == 2) {
                                if (($result2 = sqlsrv_query($conn, $sql2)) !== false) {
                                    while ($obj = sqlsrv_fetch_object($result2)) {
                                        echo "<tr>
                                        <td>$obj->SoCCCD</td>
                                        <td>$obj->Hoten</td>
                                        <td class ='center-block text-center'>$obj->GioiTinh</td>
                                        <td>$obj->MaGPLX</td>
                                        <td class ='center-block text-center'>$obj->MaHang</td>
                                        <td>$obj->NgaySinh</td>
                                        <td>$obj->NgayCap</td>
                                        <td>$obj->NgayHetHan</td>
                                        <td>$obj->SDT</td>
                                        <td>$obj->DiaChi</td>
                                        <td class ='center-block text-center'>$obj->DiemLT</td>
                                        <td class ='center-block text-center'>$obj->DiemTH</td>
                                        <td>$obj->TenTT</td>
                                        <td>
                                        <button disabled type='button' id = 'del' class='btn btn-danger delbtn'  data-bs-toggle='modal' data-bs-target='#modelDel'>Xóa</button>
                                        <button disabled type='button' id = 'edit' class='btn btn-success editbtn' data-bs-toggle='modal' data-bs-target='#modelEdit'>Sửa</button>                  
                                        </td>
                                        </tr>";
                                    }
                                }
                            }
                            if ($id_role == 1) {
                                if (($result2 = sqlsrv_query($conn, $sql2)) !== false) {
                                    while ($obj = sqlsrv_fetch_object($result2)) {
                                        echo "<tr>
                                        <td>$obj->SoCCCD</td>
                                        <td>$obj->Hoten</td>
                                        <td class ='center-block text-center'>$obj->GioiTinh</td>
                                        <td>$obj->MaGPLX</td>
                                        <td class ='center-block text-center'>$obj->MaHang</td>
                                        <td>$obj->NgaySinh</td>
                                        <td>$obj->NgayCap</td>
                                        <td>$obj->NgayHetHan</td>
                                        <td>$obj->SDT</td>
                                        <td>$obj->DiaChi</td>
                                        <td class ='center-block text-center'>$obj->DiemLT</td>
                                        <td class ='center-block text-center'>$obj->DiemTH</td>
                                        <td>$obj->TenTT</td>
                                        <td>
                                        <button  type='button' id = 'del' class='btn btn-danger delbtn'  data-bs-toggle='modal' data-bs-target='#modelDel'>Xóa</button>
                                        <button  type='button' id = 'edit' class='btn btn-success editbtn' data-bs-toggle='modal' data-bs-target='#modelEdit'>Sửa</button>                  
                                        </td>
                                        </tr>";
                                    }
                                }
                            }
                        }else {
                            echo "<script>alert('Bạn chưa đăng nhập. Vui lòng đăng nhập');</script>" ;
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Modal Add -->
        <div class="modal fade" id="modelAdd" tabindex="-1" aria-labelledby="modelAdd" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelAdd">Thêm hồ sơ giấy phép lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="form1" action=""  method="post">
                            <div class="container" style="width: 750px;">
                                <label><h6>Nhập số CMND/CCCD :</h6></label>
                                <input type="text" name="SoCMND" id="SoCMND" class="form-control" placeholder="Vui lòng nhập số CMND hoặc CCCD"/><br/>
                                <label><h6>Họ và tên :</h6></label>
                                <select id="test" class="form-select" disabled></select><br/>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Nhập số GPLX :</h6></label>
                                        <input type="number" name="SoGPLX" id="SoGPLX" class="form-control" placeholder="Vui lòng nhập số giấy phép lái xe" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Hạng :</h6></label>
                                        <select class="form-select" id="MaHang" name="MaHang">
                                            <option value="0"></option>
                                            <?php
                                                $sql = "Select MaHang  from HangGPLX;";
                                                $stmt = sqlsrv_query( $conn, $sql);
                                                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC)) {?>
                                                    <option value="<?php echo($row['MaHang'])?>"> <?php echo($row['MaHang'])?></option>
                                                <?php
                                                }?>
                                        </select>
                                    </div>
                                </div>

                                <br><div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Ngày cấp :</h6></label>
                                        <input type="date" class="form-control" id="dateCap" name="dateCap"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Ngày hết hạn</h6></label>
                                        <input type="date" class="form-control" id="dateHan" name="dateHan" />
                                    </div>
                                </div><br/>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Điểm lý thuyết :</h6>
                                        </label>
                                        <input type="number" class="form-control" id="diemLT" name="diemLT" />
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">
                                            <h6>Điểm thực hành :</h6>
                                        </label>
                                        <input type="number" class="form-control" id="diemTH" name="diemTH" />
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div>
                                        <label><h6>Trung tâm sát hạch :</h6></label><br/>
                                        <select class="form-select" onchange="GetTT()" id="TT" name="TT">
                                            <option value="0"></option>
                                            <?php
                                                $sql = "Select TenTT  from TrungTamSatHach;";
                                                $stmt = sqlsrv_query( $conn, $sql);
                                                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                                                    <option value="<?php echo($row['TenTT'])?>"><?php echo($row['TenTT'])?></option>
                                                <?php
                                                }?>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label><h6>­</h6></label>
                                        <select hidden class="form-select" id="MaTT" name="MaTT" readonly> </select>
                                    </div>
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="buttom"  id="submit_add"  name="submit_add">Thêm hồ sơ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Edit-->
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
                                <label><h6>Họ và tên :</h6></label>
                                <input type="text" name="up_Name" id="up_Name" class="form-control" readonly/><br/>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Số GPLX :</h6></label>
                                        <input type="number" name="up_SoGPLX" id="up_SoGPLX" class="form-control" readonly/>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Hạng :</h6></label>
                                        <select class="form-select" id="up_MaHang" name="up_MaHang">
                                            <?php
                                                $sql = "Select MaHang  from HangGPLX;";
                                                $stmt = sqlsrv_query( $conn, $sql);
                                                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                                                    <option value="<?php echo($row['MaHang'])?>"> <?php echo($row['MaHang']) ?></option>
                                                <?php
                                                }?>
                                        </select>
                                    </div>
                                </div><br>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Ngày cấp :</h6></label>
                                        <input type="date" class="form-control" id="up_dateCap" name="up_dateCap" />
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Ngày hết hạn</h6></label>
                                        <input type="date" class="form-control" id="up_dateHan" name="up_dateHan" />
                                    </div>
                                </div><br>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Điểm lý thuyết :</h6></label>
                                        <input type="number" class="form-control" id="up_diemLT" name="up_diemLT" />
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label"><h6>Điểm thực hành :</h6></label>
                                        <input type="number" class="form-control" id="up_diemTH" name="up_diemTH" />
                                    </div>
                                </div><br/>

                                <div class="row">
                                    <div>
                                        <label><h6>Trung tâm sát hạch :</h6></label><br/>
                                        <select class="form-select" onchange="GetTT_Update()" id="up_TT" name="up_TT">
                                            <?php
                                                $sql = "Select TenTT  from TrungTamSatHach;";
                                                $stmt = sqlsrv_query( $conn, $sql);
                                                while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {?>
                                                    <option value="<?php echo($row['TenTT'])?>"><?php echo($row['TenTT']) ?></option>
                                                <?php
                                                }?>
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <label><h6>­</h6></label>
                                        <select hidden class="form-select" id="up_MaTT" name="up_MaTT" readonly> </select>
                                    </div>
                                </div><br>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button class="btn btn-primary" type="buttom"  id="submit_edit"  name="submit_edit">Chỉnh sửa hồ sơ</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Delete-->
        <div class="modal fade" id="modelDel" tabindex="-1" aria-labelledby="modelDel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modelDel">Xóa hồ sơ giấy phép lái xe</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form name="form1" action="" method="post">
                            <div id ='id_del'></div>
                            <input type="text" class="form-control" id="id_del_text" name="id_del_text" hidden/>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-danger" type="buttom"  id="submit_del"  name="submit_del">Xóa</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><br>
    </body>
</html>

<script>
    $(document).ready(function() {
        // Push Data CMND to Web  
        $('#SoCMND').keyup(function() {  
            var query = $(this).val();  
            if(query != '') {  
                $.ajax({  
                url:"Sub_Get_CCCD.php",  
                method:"POST",  
                data:{query:query},  
                success:function(data)  {  
                    $('#listCMND').fadeIn();  
                    $('#listCMND').html(data);  
                }});  
            }
        });
        //Click CMND 
        $(document).on('click', 'li', function(){  
            $('#SoCMND').val($(this).text()); 
            $('#listCMND').fadeOut();  
        });  
        // Get Info CMND
        $(document).on('click', 'li', function(){ 
            var x = document.getElementById("SoCMND").value;
            $.ajax({
                url: 'Sub_GetName.php',
                method: 'POST',
                data: {
                    id : x
                },
                success:function(data) {
                    $("#test").html(data);
                }
            })
        });  
    });  
    //Get Info Trung Tam SH
    function GetTT() {
        var x = document.getElementById("TT").value;
        $.ajax({
            url: 'Sub_Get_MaTT.php',
            method: 'POST',
            data: {
                matt : x
            },
            success:function(data){
                $("#MaTT").html(data);
            }
        })
    }
    //Edit TTSH
    function GetTT_Update() {
        var x = document.getElementById("up_TT").value;
        $.ajax({
            url: 'Sub_Get_MaTT.php',
            method: 'POST',
            data: {
                matt : x
            },
            success:function(data){
                $("#up_MaTT").html(data);
            }
        })
    }

    $(document).ready(function(){
        $('.editbtn').on('click',function(){
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
                var select = "<option>"+data[4]+"</option>";
                var string = "22/07/1992"
                var ngaycap =string.split("/");
            }).get();

            console.log(data);
            let ngaycap = (data[6]);
            let NgayCapSplit = ngaycap.split("/");
            let NgayCapSub =NgayCapSplit[2]+"-"+NgayCapSplit[1]+"-"+NgayCapSplit[0];
            let ngayhethan = (data[7]);
            let NgayHetHanSplit = ngayhethan.split("/");
            let NgayHetHanSub =NgayHetHanSplit[2]+"-"+NgayHetHanSplit[1]+"-"+NgayHetHanSplit[0];
            let MaHang = "<option selected='selected' value="+data[4]+">"+data[4]+"</option>";
            console.log(MaHang);

            $('#up_Name').val(data[1]);
            $('#up_SoGPLX').val(data[3]);
            $('#up_dateCap').val(NgayCapSub);
            $('#up_dateHan').val(NgayHetHanSub);
            $('#up_diemLT').val(data[10]);
            $('#up_diemTH').val(data[11]);
        });
    });
    
    $(document).ready(function(){
        $('.delbtn').on('click',function(){
            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);
            var test = "<h5>Bạn có muốn xóa hồ sơ có tên là : " +data[1] +" và có mã là : " +data[3] + " </h5>";
            $('#id_del_text').val(data[3]);
            $('#id_del').html(test);
        });
    });

    function disableBtn() {
        <?php
        $id_role = $_SESSION['idRole'];
            if($id_role==1) {}
        ?>
    }

    function checkNull() {
        var SoCMND = document.forms["form1"]["SoCMND"].value;
        var SoGPLX = document.forms["form1"]["SoGPLX"].value;
        var MaHang = document.forms["form1"]["MaHang"].value;
        var dateCap = document.forms["form1"]["dateCap"].value;
        var dateHang = document.forms["form1"]["dateHang"].value;
        var diemLT = document.forms["form1"]["diemLT"].value;
        var diemTH = document.forms["form1"]["diemTH"].value;
        var Tt = document.forms["form1"]["TT"].value;
        if (SoCMND == "" || SoGPLX == "" || MaHang == ""|| dateCap == ""|| dateHang == ""|| diemLT == ""|| diemTH == ""|| Tt == "") {
            alert("Vui lòng nhập đầy đủ thông tin");
                return false;
        }else {
            return true; 
        }
    }
</script>

<!-- Phần PHP Thêm Xóa Sửa -->
<?php
    include("config.php");
    //Thêm hồ sơ
    if(isset($_POST['submit_add'])) {
        if(isset($_SESSION['username'])) {
            $MaGPLX = $_POST['SoGPLX'];
            $SoCMND = $_POST['SoCMND'];
            $MaHang = $_POST['MaHang'];
            $NgayCap = $_POST['dateCap'];
            $NgayHetHan = $_POST['dateHan'];
            $ma = $_POST['MaTT'];
            $DiemLT = $_POST['diemLT'];
            $DiemTH = $_POST['diemTH'];
            $them = "insert into HoSoGPLX values('$MaGPLX','$SoCMND','$MaHang','$NgayCap','$NgayHetHan','$ma','$DiemLT','$DiemTH')";
            $kq = sqlsrv_query($conn, $them);
            if(($kq) !== false) {
                echo "<script>alert('Thêm hồ sơ thành công');</script>";
                echo "<script>window.location.href ='Main_HS.php'</script>";
            }else {
                echo "<script>alert('Sai thông tin. Vui lòng nhập lại');</script>";
            }
        }else {
            echo "<script>alert('Vui lòng đăng nhập');</script>" ;
            echo "<script>window.location.href ='index.php'</script>";
        }
    }
    //Sửa hồ sơ
    if(isset($_POST['submit_edit'])) {
        if (isset($_SESSION['username'])) {
            $up_MaGPLX = $_POST['up_SoGPLX'];
            $up_MaHang = $_POST['up_MaHang'];
            $up_NgayCap = $_POST['up_dateCap'];
            $up_NgayHetHan = $_POST['up_dateHan'];
            $up_ma = $_POST['up_MaTT'];
            $up_diemLT = $_POST['up_diemLT'];
            $up_diemTH =$_POST['up_diemTH'];
            $sua = "update HoSoGPLX set MaHang = '$up_MaHang', NgayCapGPLX = '$up_NgayCap', NgayHetHanGPLX = '$up_NgayHetHan', DiemLT = '$up_diemLT', DiemTH = '$up_diemTH', MaTT = '$up_ma' where MaGPLX = '$up_MaGPLX'";
            echo ($sua);
            $kq = sqlsrv_query( $conn, $sua);
            if(($kq)   !== false) {
                echo "<script>alert('Chỉnh sửa hồ sơ thành công');</script>" ;
                echo "<script>window.location.href ='Main_HS.php'</script>"; 
            }else {
                echo "<script>alert('Sai thông tin chỉnh sửa');</script>" ;
            }
        }else {
            echo "<script>alert('Vui lòng đăng nhập');</script>" ;
            echo "<script>window.location.href ='index.php'</script>";
        }
    }
    //Xóa hồ sơ
    if(isset($_POST['submit_del'])) {
        if (isset($_SESSION['username'])) {
            $del_maGPLX = $_POST['id_del_text'];
            $xoa = "EXEC proc_XoaHoSoGPLX '$del_maGPLX'";
            $kq = sqlsrv_query( $conn, $xoa);
            if(($kq)   !== false) {
                echo "<script>alert('Xóa hồ sơ thành công');</script>" ;
                echo "<script>window.location.href ='Main_HS.php'</script>";
            }else {
                echo "<script>alert('Sai thông tin xóa');</script>" ;
            }
        }else {
            echo "<script>alert('Vui lòng đăng nhập');</script>" ;
            echo "<script>window.location.href ='index.php'</script>";
        }
    }
?>