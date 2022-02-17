const chartBtn = document.querySelector("#weightProggress");
const myTrainingSchedule = document.querySelector('#myTrainingSchedule');


function calendarAnimation() 
{
    const dayAnimation = document.querySelectorAll('.calendar');
    const tl = gsap.timeline();
    const from = {y:-10,opacity:0}; 
    const to = {y:0,opacity:1};

    tl.fromTo(dayAnimation[0],0.75,from,to)
    .fromTo(dayAnimation[1],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[2],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[3],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[4],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[5],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[6],0.75,from,to,"-=0.75")

    .fromTo(dayAnimation[7],0.75,from,to)
    .fromTo(dayAnimation[8],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[9],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[10],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[11],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[12],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[13],0.75,from,to,"-=0.75")

    .fromTo(dayAnimation[14],0.75,from,to)
    .fromTo(dayAnimation[15],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[16],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[17],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[18],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[19],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[20],0.75,from,to,"-=0.75")

    .fromTo(dayAnimation[21],0.75,from,to)
    .fromTo(dayAnimation[22],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[23],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[24],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[25],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[26],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[27],0.75,from,to,"-=0.75")

    .fromTo(dayAnimation[28],0.75,from,to)
    .fromTo(dayAnimation[29],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[30],0.75,from,to,"-=0.75")
    .fromTo(dayAnimation[31],0.75,from,to,"-=0.75");
    if(typeof dayAnimation[32] == "undefined")
    {
        // pass
    }
    else
    {
        gsap.fromTo(dayAnimation[32],0.75,from,to,"-=0.75");
        if(typeof dayAnimation[33] == "undefined")
        {
            // pass
        }
        else
        {
            gsap.fromTo(dayAnimation[33],0.75,from,to,"-=0.75");
            if(typeof dayAnimation[34] == "undefined")
            {
                // pass
            }
            else
            {
                gsap.fromTo(dayAnimation[34],0.75,from,to,"-=0.75");
                if(typeof dayAnimation[35] == "undefined")
                {
                    // pass
                }
                else
                {
                    gsap.fromTo(dayAnimation[35],0.75,from,to,"-=0.75");
                }
            }
        }
    }
    
}
    


// TRAINER REVIEWS
$('#myTrainerReviews').on("click", function() {
    gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
    gsap.to(wholeChart,0.5,{y:0,opacity:0}); // chart
    if(reviewsBlock.style.display != 'none')
    {
        gsap.to(reviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"}); // rev
    }
    else
    {
        setTimeout(() => {
            wholeChart.style.display = 'none';
            gsap.to(reviewsBlock,0.65,{y:20,autoAlpha:1,display:"block"}); 
        },700);
    }
});


// CHART
$(chartBtn).on("click", function() {
    gsap.to(reviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
    gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
    if(wholeChart.style.display != 'none')
    {
        gsap.to(wholeChart,0.5,{y:-10,opacity:0}); // if displaying click again to peacefully turn off
        setTimeout(() => {
            wholeChart.style.display = 'none';
        }, 700);
    }
    else                                            // else display block after 700ms
    {
        setTimeout(() => {
            myChart.destroy()
            gsap.to(wholeChart,0.5,{y:10,autoAlpha:1,display: 'block'});    // chart
            wholeChart.style.display = 'block';
            myChart = new Chart(canvas, userProgressChart);
        }, 700);

    }
});


// TRAINING SCHEDULE
$(myTrainingSchedule).on('click', function (){
    if(mySchedual.style.display != 'none') 
    {
        gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});
    }
    else
    {
        gsap.to(wholeChart,0.5,{y:0,opacity:0}); // chart
        gsap.to(reviewsBlock,0.65,{y:0,autoAlpha:0,display:"none"}); // rev
        setTimeout(() => {
            wholeChart.style.display = 'none';
            gsap.to(mySchedual,0.65,{y:20,autoAlpha:1,display:"block"});
            calendarAnimation();
        }, 700);
    }
});
