var settingPost=document.getElementById("listSetting");
function showSettingPost(){
    document.getElementById("listSetting").classList.toggle("displayBlock");
    document.getElementById("btnSettingPost").classList.toggle("btn-click");
}
$(document).ready(function() {
    $('.autoplay').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 1000,
    });
});
// Trang View

function deletePost(){
    document.getElementById('deletePost').style.display='block';
    document.getElementById("listSetting").classList.toggle("displayBlock");
    document.getElementById("btnSettingPost").classList.toggle("btn-click");
}
function editPost(){
    document.getElementById('editPost').style.display='block';
    document.getElementById("listSetting").classList.toggle("displayBlock");
    document.getElementById("btnSettingPost").classList.toggle("btn-click");
}