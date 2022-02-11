let x = 0;
$("#nvbrdrpdwn").on('click' ,function(){

    if(x % 2 ==  0){
        gsap.to('.search', 1, {autoAlpha:1,display:"block"});
        x++;
    }
    else
    {
        gsap.to('.search', 1, {autoAlpha:0,display:"none"});
        x++;
    }
});


let y = 0;
const drop = document.querySelector("#navbarDropdown");
const ulSel = document.querySelector("#navbarSupportedContent > ul > li.nav-item.dropdown > ul");
$(".dropdown").on('mouseover',function(){
    drop.classList.add('show');
    ulSel.classList.add('show');
});
$(".dropdown").on('mouseout',function(){
    drop.classList.remove('show');
    ulSel.classList.remove('show');
});