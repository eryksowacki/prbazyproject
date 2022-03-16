function checkWidth() 
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
function changeChartSwitch(switcher)
{
    switch(switcher) {
        case "line":
            return change("line");
            break;
        case "bar":
            return change("bar");
            break;
        case "bubble":
            return change("bubble");
            break;
        case "scatter":
            return change("scatter");
            break;
        default:
            return change("line");
            break;    
    }
}
const chartBtn = document.querySelector("#weightProggress");
const myTrainingSchedule = document.querySelector('#myTrainingSchedule');
const myGymReviews = document.querySelector('#myGymReviews');

// TRAINER REVIEWS
$('#myTrainerReviews').on("click", function() {
    gsap.to(gymReviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"});    // gym rev
    gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
    gsap.to(wholeChart,0.65,{y:-20,opacity:0}); // chart
    gsap.to(personalInfo,0.65,{y:-20,autoAlpha:0,display:"none"});

    if(reviewsBlock.style.display != 'none')
    {
        gsap.to(reviewsBlock,0.65,{y:-10,autoAlpha:0,display:"none"}); // rev
    }
    else
    {
        setTimeout(() => {
            wholeChart.style.display = 'none';
            gsap.fromTo(reviewsBlock,0.65,{y:-20},{y:0,autoAlpha:1,display:"block"}); 
        },700);
    }
});

$(myGymReviews).on("click", function() {
    gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
    gsap.to(wholeChart,0.65,{y:-20,opacity:0}); // chart
    gsap.to(reviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
    gsap.to(personalInfo,0.65,{y:-20,autoAlpha:0,display:"none"});

    if(gymReviewsBlock.style.display != 'none')
    {
        gsap.to(gymReviewsBlock,0.65,{y:-10,autoAlpha:0,display:"none"}); // rev
    }
    else
    {
        setTimeout(() => {
            wholeChart.style.display = 'none';
            gsap.fromTo(gymReviewsBlock,0.65,{y:-20},{y:0,autoAlpha:1,display:"block"});
        },700);
    }
});


// CHART
$(chartBtn).on("click", function() {
    gsap.to(gymReviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"});    // gym rev
    gsap.to(reviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
    gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});    // rev
    gsap.to(personalInfo,0.65,{y:-20,autoAlpha:0,display:"none"});
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
            if(myChart instanceof Chart) 
            {
                changeChartSwitch(cookieChartChange);
            }
            myChart.destroy();
            gsap.fromTo(wholeChart,0.5,{y:-10,autoAlpha:0,display: 'none'},{y:0,autoAlpha:1,display: 'block',marginTop: 10});    // chart
            wholeChart.style.display = 'block';
            myChart = new Chart(canvas, userProgressChart);
        }, 700);

    }
});

$("#accountPersonali").on('click', function (){
    gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});    // gym rev
    gsap.to(wholeChart,0.65,{y:-20,opacity:0}); // chart
    gsap.to(reviewsBlock,0.65,{y:0,autoAlpha:0,display:"none"}); // rev
    gsap.to(gymReviewsBlock,0.65,{y:-10,autoAlpha:0,display:"none"}); // rev

    if(personalInfo.style.display != 'none') 
    {
        gsap.to(personalInfo,0.65,{y:-20,autoAlpha:0,display:"none"});
    }
    else
    {
        setTimeout(() => {
            wholeChart.style.display = 'none';
            gsap.fromTo(personalInfo,0.65,{y:-20},{y:0,autoAlpha:1,display:"block"});
        }, 700);
    }
});
// TRAINING SCHEDULE
$(myTrainingSchedule).on('click', function (){
    gsap.to(gymReviewsBlock,0.65,{y:-20,autoAlpha:0,display:"none"});    // gym rev
    gsap.to(wholeChart,0.65,{y:-20,opacity:0}); // chart
    gsap.to(reviewsBlock,0.65,{y:0,autoAlpha:0,display:"none"}); // rev
    gsap.to(personalInfo,0.65,{y:-20,autoAlpha:0,display:"none"});

    if(mySchedual.style.display != 'none') 
    {
        gsap.to(mySchedual,0.65,{y:-20,autoAlpha:0,display:"none"});
    }
    else
    {
        setTimeout(() => {
            wholeChart.style.display = 'none';
            gsap.to(mySchedual,0.65,{y:20,autoAlpha:1,display:"block"});
        }, 700);
    }
});

document.querySelector("#weightValue").value = weight[weight.length - 1];
window.onresize = function() 
{
    checkWidth();    
}
