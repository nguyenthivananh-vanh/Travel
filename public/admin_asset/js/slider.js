// showUserMenu();
$(document).ready(function() {
    $('.autoplay-view').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        dots: true,
        arrows: true,
        autoplay: true,
        autoplaySpeed: 1000,
    });
});
var a = document.getElementById("test1");
document.getElementById("test1").addEventListener("click", function() {
    alert("hi")
});