$(document).ready(function(){  
    $('#maGPLX').keyup(function() {  
        var query = $(this).val(); 
        if(query != '') {  
            $.ajax({  
                url:"SoGPLX.php",  
                method:"POST",  
                data:{query:query},  
                success:function(data) {  
                    $('#listGPLX').fadeIn();  
                    $('#listGPLX').html(data);  
                }  
            });  
        }  
    });  

    $(document).on('click', 'li', function(){  
         $('#maGPLX').val($(this).text()); 
         $('#listGPLX').fadeOut();  
    });  
}); 

function GetNoiDung() {
    var x = document.getElementById("NoiDung").value;
    $.ajax({
        url: 'GetNoiDung.php',
        method: 'POST',
        data: {
            noiDung : x
        },dataType: "JSON",
        success:function(data) {
            console.log(data.tienphat);
            $('#tienPhat').val(data.tienphat);
            $('#maVP').val(data.mavipham);
        }
    })
}

function up_GetNoiDung(){
    var x = document.getElementById("up_NoiDung").value;
    $.ajax({
        url: 'GetNoiDung.php',
        method: 'POST',
        data: {
            noiDung : x
        },dataType: "JSON",
        success:function(data) {
            console.log(data.tienphat);
            $('#up_tienPhat').val(data.tienphat);
            $('#up_maVP').val(data.mavipham);
        }
    })
}

$(document).ready(function(){
    $('.editbtn').on('click',function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        let NgayLap = (data[3]);
        let NgayLapSplit = NgayLap.split("/");
        let NgayLapSub =NgayLapSplit[2]+"-"+NgayLapSplit[1]+"-"+NgayLapSplit[0];
        $('#up_maBienBan').val(data[0]);
        $('#up_maBienBan_read').val(data[0]);
        $('#up_maGPLX').val(data[1]);
        $('#up_dateLap').val(NgayLapSub);  
    });
});

$(document).ready(function(){
    $('.delbtn').on('click',function(){
        $tr = $(this).closest('tr');
        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();
        console.log(data);
        var test = "<h5>Bạn có muốn xóa biên bản có mã là : " +data[0] +" và có mã giấy phép lái xe là là : " +data[1] + " </h5>";
        $('#id_del_text').val(data[0]);
        $('#id_del').html(test);
    });
});

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
