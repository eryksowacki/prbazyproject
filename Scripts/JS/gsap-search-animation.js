const search = document.querySelector('.search'); 
// document.querySelector("btn-outline-success")
search.style.opacity = 0;
$("#search-button").prop('disabled', true);


$("#nvbrdrpdwn").on('click' ,function()
{
    if(search.style.opacity !=  0)
    {
        $("#search-bar").prop('disabled', true);
        $("#search-button").prop('disabled', true);
        gsap.to(search, 1, {autoAlpha:0,opacity:0});
    }
    else
    {
        $("#search-bar").prop('disabled', false);
        $("#search-button").prop('disabled', false);
        gsap.to(search, 1, {autoAlpha:1,opacity:1});
    }
});




const drop = document.querySelector(".dropdown-menu");

$(".dropdown-toggler").on('mouseenter',function(){
    gsap.to(drop, 0.5, {y:-5,autoAlpha:1,display:"block"});
});
$(".dropdown").on('mouseleave',function(){
    gsap.to(drop, 0.5, {y:10,autoAlpha:0,display:"none"});
});
