function checkWidth(params) 
{   
    let navbar = document.querySelector('.navbar-nav').getBoundingClientRect().right;
    let p = document.querySelector('.sidebar').getBoundingClientRect().right;
    let f = document.querySelector('.gridInGrid').getBoundingClientRect().right;
    if (p + f + 24 != navbar) {
        let m = document.querySelectorAll(".calendar");
        let cellWidth = parseInt((navbar - p) / 7 - 24);
        for (let i = 0; i < m.length; i++) {
            m[i].style.width = cellWidth + "px";
        }
    }
}


const chartBtn = document.querySelector("#weightProggress");
const myTrainingSchedule = document.querySelector('#myTrainingSchedule');

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


document.querySelector("#weightValue").value = weight[weight.length - 1];
window.onresize = function() 
{
    checkWidth();    
}