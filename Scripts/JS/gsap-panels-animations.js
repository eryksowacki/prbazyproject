let replaceParagraph = document.querySelectorAll(".replace > p");
let replaceHeader = document.querySelectorAll(".replace > h3");
let panelImage = document.querySelectorAll(".panelImage");
let piss = document.querySelectorAll(".piss");
let imgButton = document.querySelectorAll(".piss > button");
for(let i = 0; i < panelImage.length; i++){
    replaceParagraph[i].style.display = "none";
    replaceHeader[i].style.display = "none";
    let prev;
    $(piss[i]).on("click", function() 
    {
        if(panelImage[i].style.display != 'none')
        {
            gsap.to(imgButton[i],0.1,{autoAlpha:0,display:"none"});
            gsap.to(panelImage[i],0.3,{delay:0.1,opacity:0.5,display:"none"});
            gsap.to(piss[i],0.2,{delay:0.4,boxShadow:"white 0px 0px 20px 0px, white 0px 0px 0px 0px, rgb(31 73 125 / 80%) 30px -5px 21px -27px, rgb(31 73 125 / 80%) -30px -5px 21px -27px"},"-=0.2");
            gsap.to(replaceParagraph[i],0.2,{delay:0.4,opacity:1,display:"block"});
            gsap.to(replaceHeader[i],0.2,{delay:0.4,opacity:1,display:"block"});
            prev = imgButton[i].textContent;
            gsap.to(imgButton[i],0.1,{delay:0.6,zIndex:20,autoAlpha:1,display:"block"});
            setTimeout(() => {
                $(imgButton[i]).on("click",function(){
                    location.href = prev+".php";
                })
                imgButton[i].textContent = "Dowiedz się więcej";
            },600);
        }
        else
        {
            gsap.to(imgButton[i],0.1,{autoAlpha:0,display:"none"});
            gsap.to(piss[i],0.1,{boxShadow:"none"});
            gsap.to(replaceParagraph[i],0.3,{opacity:0,display:"none"});
            gsap.to(replaceHeader[i],0.3,{opacity:0,display:"none"});
            gsap.to(panelImage[i],0.3,{delay:0.4,opacity:1,display:"block"});
            gsap.to(imgButton[i],0.1,{delay:0.6,zIndex:20,autoAlpha:1,display:"block"});
            setTimeout(() => {
                $(imgButton[i]).unbind("click");
                imgButton[i].textContent = prev;
            }, 600);

        }
    });
}