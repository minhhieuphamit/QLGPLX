const search = document.querySelector('.js-search')
const modal_1 = document.querySelector('.js-modal-1')
const modal_1_Closes = document.querySelectorAll('.js-modal-1-close')
const modal_1_Container = document.querySelector('.js-modal-1-container')

function required() {
    var ma = document.forms["form1"]["maGPLX"].value;
    var ngay = document.forms["form1"]["Ngay"].value;
    var hang = document.forms["form1"]["Hang"].value;
    if (ma == "" || ngay == ""|| hang == "") {
        return false;
    }else {
        return true;
    }
}

var input = document.getElementById('btn_TraCuu');
input.onclick = function() {
    if(required()==true) {
        GetNoiDung();
        GetViPham();
        openFormSearch();
    }else {
        alert("Vui lòng nhập đầy đủ thông tin !!!");
    }
};

function GetNoiDung() {
    var ma = document.forms["form1"]["maGPLX"].value;
    var ngay = document.forms["form1"]["Ngay"].value;
    var hang = document.forms["form1"]["Hang"].value;
    $.ajax({
        url: 'TraCuu.php',
        method: 'POST',
        data: {
            ma : ma,
            hang : hang,
            ngay : ngay,
        },dataType: "json",
        success:function(data) {
            var starSpan = '<span class="text-content">';
            var endSpan = '</span>';
            $('#Hoten').html(starSpan+data.Hoten+endSpan);  
            $('#GioiTinh').html(starSpan+data.GioiTinh+endSpan);  
            $('#NgaySinh').html(starSpan+data.NgaySinh+endSpan);  
            $('#Ma_Hang').html(starSpan+data.MaHang+endSpan);
            $('#MaGPLX').html(starSpan+data.MaGP+endSpan);
            $('#NgayCap').html(starSpan+data.NgayCap+endSpan);
            $('#NgayHetHan').html(starSpan+data.NgayHetHan+endSpan);
            $('#NgayTrungTuyen').html(starSpan+data.NgayCap+endSpan);
            $('#NoiCap').html(starSpan+data.ttsh+endSpan);
        }
    })
}



function GetViPham() {
    var x = document.getElementById("maGPLX").value;
    $.ajax({
        url: 'GetViPham.php',
        method: 'POST',
        data: {
            ma : x,
        },success:function(data) {
            $('#getViPham').html(data);
        }
    })
}

function openFormSearch() {
    modal_1.classList.add('open')
}

function closeFormSearch() {
    modal_1.classList.remove('open')
}

for (const modal_1_Close of modal_1_Closes) {
    modal_1_Close.addEventListener('click', closeFormSearch)
}

search.addEventListener('click', required)

modal_1.addEventListener('click', closeFormSearch)

modal_1_Container.addEventListener('click', function (event) {
    event.stopPropagation()
})
