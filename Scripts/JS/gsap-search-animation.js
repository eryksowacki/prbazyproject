const search = document.querySelector('.search'); 
search.style.display = 'none';

$("#nvbrdrpdwn").on('click' ,function()
{
    if(search.style.display !=  'none')
    {
        $("#search-bar").prop('disabled', true);
        gsap.to(search, 1, {autoAlpha:0,display:"none"});
    }
    else
    {
        $("#search-bar").prop('disabled', false);
        gsap.to(search, 1, {autoAlpha:1,display:"inline"});
    }
});




const drop = document.querySelector(".dropdown-menu");

$(".dropdown-toggler").on('mouseenter',function(){
    gsap.to(drop, 0.5, {y:-10,autoAlpha:1,display:"block"});
});
$(".dropdown").on('mouseleave',function(){
    gsap.to(drop, 0.5, {y:10,autoAlpha:0,display:"none"});
});
