$(document).ready(function() { 
	$(".dropdown-trigger").dropdown();
	var sidenav = document.getElementById("menu-side");
    var snInstance = M.Sidenav.init(sidenav);
});

function nav(){
    console.log("llegue");
    let elem = document.getElementById("menu-side");
    let instance = M.Sidenav.getInstance(elem);
    instance.open();
}