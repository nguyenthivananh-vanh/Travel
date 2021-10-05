var settingPost = document.getElementById("listSetting");

function showSettingPost() {
    document.getElementById("listSetting").classList.toggle("displayBlock");
    document.getElementById("btnSettingPost").classList.toggle("btn-click");
}
$(document).ready(function() {
    $('.autoplay-view').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        // dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 1000,
        appendDots: false
    });
});
// Trang View
var deletePostModal= document.getElementById("deletePost");
var editPostModal = document.getElementById("editPost");
window.onclick = function(event) {
    if (event.target == deletePostModal || event.target == editPostModal) {
        deletePostModal.style.display = "none";
        editPostModal.style.display = "none";
    }
}

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
// function deletePost() {
//     document.querySelector('.delete').style.display = 'block';
//     document.querySelector('.wrap').style.display = 'none';
//     document.querySelector('.footer').style.display = 'none';
//     document.querySelector('.post-related').style.display = 'none';
// }
// function editPost(){
//     document.getElementById('editPost').style.display='block';
//     document.getElementById("listSetting").classList.toggle("displayBlock");
//     document.getElementById("btnSettingPost").classList.toggle("btn-click");
// }
// function deletePost() {
//     document.querySelector('.delete').style.display = 'block';
//     document.querySelector('.wrap').style.display = 'none';
//     document.querySelector('.footer').style.display = 'none';
// }

// function editPost() {
//     document.querySelector('.update').style.display = 'block';
//     document.querySelector('.wrap').style.display = 'none';
//     document.querySelector('.footer').style.display = 'none';
//     document.querySelector('.post-related').style.display = 'none';
// }
