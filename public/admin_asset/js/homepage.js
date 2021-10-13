
var navBar = document.getElementById('hy');

function showNavMobile(){
    document.getElementById('hy').classList.toggle("displayBlock");
}

    window.onclick = function(event) {
    if (event.target == navBar) {
        document.getElementById('hy').style.display = "none";
    }
  }

//Slider
var slideIndex = 0;

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var dots = document.getElementsByClassName("dot");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    // for (i = 0; i < dots.length; i++) {
    //   dots[i].className = dots[i].className.replace(" active", "");
    // }
    slides[slideIndex - 1].style.display = "block";
    // dots[slideIndex-1].className += " active";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
}
showSlides();



// show User menu
var userMenu = document.getElementById('headerUserMenu');

function showUserMenu() {
    userMenu.classList.toggle("displayBlock");
}
// showUserMenu();
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
//test
// var a = document.getElementById("test");
// document.getElementById("test1").addEventListener("click", function() {
//     alert("hi")
// });


//Show setting post
var settingPost=document.getElementById("listSetting");
function showSettingPost(){
    document.getElementById("listSetting").classList.toggle("displayBlock");
    document.getElementById("btnSettingPost").classList.toggle("btn-click");
}

function popUpDelete(){
    document.getElementById('id01').style.display='block';
}
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

function post(){
    document.getElementById('modalPost').style.display='block';
}

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
function saveEditPost(){
    document.getElementById('saveEdit').style.display='block';
}
function deleteEdit(){
    document.getElementById('deleteEdit').style.display='block';
}










//updateView.php
function deleteUpdateView(){
    document.getElementById('deleteEditView').style.display='block';
  
}
function editUpdateView(){
    document.getElementById('saveEditView').style.display='block';
    
}
var deleteUpdateViewModal= document.getElementById("deleteEditView");
var editUpdateViewModal = document.getElementById("saveEditView");
window.onclick = function(event) {
    if (event.target == deleteUpdateViewModal || event.target == editUpdateViewModal) {
        deleteUpdateViewModal.style.display = "none";
        editUpdateViewModal.style.display = "none";
    }
}
//updateVideo.php
function deleteUpdateVideo(){
    document.getElementById('deleteEditVideo').style.display='block';
  
}
function editUpdateVideo(){
    document.getElementById('saveEditVideo').style.display='block';
    
}
var deleteUpdateVideoModal= document.getElementById("deleteEditVideo");
var editUpdateVideoModal = document.getElementById("saveEditVideo");
window.onclick = function(event) {
    if (event.target == deleteUpdateViewModal || event.target == editUpdateViewModal) {
        deleteUpdateVideoModal.style.display = "none";
        editUpdateVideoModal.style.display = "none";
    }
}


//reply.php

var deleteNewsModal = document.getElementById("deleteNews");
var postNewsModal = document.getElementById("postNews");
function deleteNews(){
    document.getElementById('deleteNews').style.display='block';
   
}
function createNews(){
    document.getElementById('postNews').style.display='block';
   
}

window.onclick = function(event) {
    if (event.target == deleteNewsModal || event.target == postNewsModal) {
        deleteNewsModal.style.display = "none";
        postNewsModal.style.display = "none";
    }
}



