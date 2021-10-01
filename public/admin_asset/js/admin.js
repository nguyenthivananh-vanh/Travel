


// document.addEventListener('DOMContentLoaded', function() {
//     var elems = document.querySelectorAll('.sidenav');
//     var instances = M.Sidenav.init(elems, options);
// });
var sideNavAdmin= document.getElementById('side-nav-admin-mobile');
var check=false;
function showSidebar() {
    // sideNavAdmin.style.display="block"
    sideNavAdmin.classList.toggle("display-block");
}
function showNavbar(){
  document.getElementById('sideNavHome').classList.toggle('displayBlock');
  
}



