// When entering .my-gyms close second dropdown and start displaying and animating // 
$(".my-gyms").on('mouseenter', function() {
    gsap.to(".submenu-dropdown-sec", 0.5, {x:10,autoAlpha:0,display:"none"});
    gsap.to(".submenu-dropdown-frst", 0.5, {x:-10,autoAlpha:1,display:"block"});
});

// On leaving only dropdown animate
$(".submenu-dropdown-frst").on('mouseleave', function() {
    gsap.to(".submenu-dropdown-frst", 0.5, {x:10,autoAlpha:0,display:"none"});
});


// When entering .my-trainers close second dropdown and start displaying and animating // 
$(".my-trainers").on('mouseenter', function() {
    gsap.to(".submenu-dropdown-sec", 0.5, {x:-10,autoAlpha:1,display:"block"});
    gsap.to(".submenu-dropdown-frst", 0.5, {x:10,autoAlpha:0,display:"none"});
});

// On leaving only dropdown animate
$(".submenu-dropdown-sec").on('mouseleave', function() {
    gsap.to(".submenu-dropdown-sec", 0.5, {x:10,autoAlpha:0,display:"none"});
});


// On leaving nav-list for both animate 
$(".nav-item-list").on('mouseleave', function() {
    gsap.to(".submenu-dropdown-frst", 0.5, {x:10,autoAlpha:0,display:"none"});
    gsap.to(".submenu-dropdown-sec", 0.5, {x:10,autoAlpha:0,display:"none"});

});
