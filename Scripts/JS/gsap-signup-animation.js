
const icons = document.querySelectorAll(".icons");
const icoParagraph = document.querySelectorAll(".icon-promotion > p");
const tl = new gsap.timeline(); 


tl.set(icons,{opacity:0}).set(icoParagraph, {opacity:0});

tl.from(icons[0], 2, {x:-300, opacity:0})
    .addLabel('icons')
    .from(icons[1],2,{x:-300, opacity:0},"-=1.5")
    .from(icons[2],2,{x:-300, opacity:0},"-=1.5")
    .from(icons[3],2,{x:-300, opacity:0},"-=1.5")
    .from(icoParagraph[0], 1, {opacity:0})
    .from(icoParagraph[1],1,{opacity:0},"-=0.5")
    .from(icoParagraph[2],1,{opacity:0},"-=0.5")
    .from(icoParagraph[3],1,{opacity:0},"-=0.5");


    
    
    
    
const labels = document.querySelectorAll(".floating-label");
tl.from(labels, 0.8,{opacity:0,},"icons");
// $(".icon-1").on("mouseover", function() 
// {
//     tl.to(icons[0],)
// });



