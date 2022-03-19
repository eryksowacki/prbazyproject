const progressBar = document.querySelector("#progress-bar");
const section = document.querySelector("#page");
const trainerBlock = document.querySelectorAll(".trainerBlock");
const panelControl = document.querySelectorAll(".panelControl");

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
    if(tmp == 0 && value >= -50)
    {
        gsap.fromTo(".trainingPromotionPanel",2,{y:80,autoAlpha:0,display:"none"},{y:0,autoAlpha:1,display:"flex"});
        setTimeout(() => {
            gsap.fromTo(panelControl[4],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"flex"});
        }, 200);
        setTimeout(() => {
            gsap.fromTo(panelControl[3],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"flex"});
        }, 400);
        setTimeout(() => {
            gsap.fromTo(panelControl[2],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"flex"});
        }, 600);
        setTimeout(() => {
            gsap.fromTo(panelControl[1],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"flex"});
        }, 800);
        setTimeout(() => {
            gsap.fromTo(panelControl[0],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"flex"});
        }, 1000);
        tmp++;
    }



    if(tmp2 == 0 && value >= 50) 
    {
        gsap.fromTo(".trainersPresentation > h1",2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"block"});
        setTimeout(() => {
            gsap.fromTo(trainerBlock[0],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"block"});
        }, 200);
        setTimeout(() => {
            gsap.fromTo(trainerBlock[1],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"block"});
            
        }, 400);
        setTimeout(() => {
            gsap.fromTo(trainerBlock[2],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"block"});
        }, 600);
        setTimeout(() => {
            gsap.fromTo(trainerBlock[3],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"block"});
            
        }, 800);
        setTimeout(() => {
            gsap.fromTo(trainerBlock[4],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"block"});
            
        }, 1000);
        setTimeout(() => {
            gsap.fromTo(trainerBlock[5],2,{y:80,autoAlpha:0},{y:0,autoAlpha:1,display:"block"});
            
        }, 1200);
        tmp2++;
    }
}
window.addEventListener("scroll", animateProgressBar);