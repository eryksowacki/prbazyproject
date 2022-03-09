const progressBar = document.querySelector("#progress-bar");
const section = document.querySelector("#page");
let tmp = 0;
let tmp2 = 0;
const animateProgressBar = () => {
    let scrollDistance = -section.getBoundingClientRect().top;
    let progressWidth = 
    (scrollDistance / 
        (section.getBoundingClientRect().height - document.documentElement.clientHeight)) * 100;
    let value = Math.floor(progressWidth);
    progressBar.style.width = value + "%";
    if(value < 0)
    {
        progressBar.style.width = "0%";
    }
    if(tmp == 0 && value >= -70)
    {
        gsap.fromTo(".trainingPromotionPanel",2,{y:80,autoAlpha:0,display:"none"},{y:0,autoAlpha:1,display:"flex"});
        tmp++;
    }
    if(tmp2 == 0 &&value >= 20) 
    {
        gsap.fromTo(".trainersPresentation > h1",2,{y:80,autoAlpha:0,display:"none"},{y:0,autoAlpha:1,display:"block"});
        gsap.fromTo(".trainerBlock",2,{delay:0.2,y:80,autoAlpha:0,display:"none"},{y:0,autoAlpha:1,display:"block"});
        tmp2++;
    }
}
window.addEventListener("scroll", animateProgressBar);