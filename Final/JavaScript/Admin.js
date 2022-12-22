$(document).ready(function(){  
    $('#SoCMND').keyup(function(){  
         var query = $(this).val();  
         if(query != '') {  
            $.ajax({  
                url:"SoCMND.php",  
                method:"POST",  
                data:{query:query},  
                success:function(data) {  
                    $('#listCMND').fadeIn();  
                    $('#listCMND').html(data);  
                }  
            });  
        }  
    }); 

    $(document).on('click', 'li', function() {  
         $('#SoCMND').val($(this).text()); 
         $('#listCMND').fadeOut();  
    });  

    $(document).on('click', 'li', function(){ 
        var x = document.getElementById("SoCMND").value;
        $.ajax({
            url: 'GetThongTin.php',
            method: 'POST',
            data: {
                id : x
            },success:function(data) {
                $("#test").html(data);
            }
        })
    });  
});

function GetTT() {
    var x = document.getElementById("TT").value;
    $.ajax({
        url: 'GetTrungTam.php',
        method: 'POST',
        data: {
            matt : x
        },success:function(data){
            $("#MaTT").html(data);
        }
    })
}

function GetTT_Update() {
    var x = document.getElementById("up_TT").value;
    $.ajax({
        url: 'GetTrungTam.php',
        method: 'POST',
        data: {
            matt : x
        },success:function(data) {
            $("#up_MaTT").html(data);
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

function checkNull(){
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
