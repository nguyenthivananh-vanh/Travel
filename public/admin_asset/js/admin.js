


// document.addEventListener('DOMContentLoaded', function() {
//     var elems = document.querySelectorAll('.sidenav');
//     var instances = M.Sidenav.init(elems, options);
// });
var sideNavAdmin= document.getElementById('side-nav-admin');
var check=false;
function showSidebar() {
 
    if(check){
        sideNavAdmin.style.display='block'

        check=!check;
    }else{        
        sideNavAdmin.style.display='none';
        check=!check;
    }
}
function closeNav(){
    sideNavAdmin.style.display='none';
    this.check=!this.check;
}