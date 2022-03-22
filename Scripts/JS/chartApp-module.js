function changeChartSwitch(switcher)
{
    switch (switcher) {
        case "line":
            change("line");
            break;
        case "bar":
            change("bar");
            break;
        case "bubble":
            change("bubble");
            break;
        case "scatter":
            change("scatter");
            break;
        default:
            change("line");
            break;    
    }
}
$(".chartTypes > option").on("dblclick", function() {
    changeChartSwitch(document.querySelector(".chartTypes").value);
});
function setCookie(cname, cvalue)
    {
    const d = new Date();
    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}
function change(newType) 
{
    let canvas = document.getElementById("myChart").getContext("2d");
    if(myChart instanceof Chart) 
    {
        myChart.destroy();
    }

    if(newType == 'scatter')
    {
        userProgressChart.options.scales.y.min = 0; 
    }
    else
    {
        userProgressChart.options.scales.y.min = Math.min(weight);
    }
    setCookie("favChart", newType);

    let temp = jQuery.extend(true, {}, userProgressChart);
    temp.type = newType;
    myChart = new Chart(canvas, temp);
}
function getCookie(cname) 
{
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) 
    {
        let c = ca[i];
        while (c.charAt(0) == ' ') 
        {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) 
        {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
const cookieChartChange = getCookie('favChart');
const saveColor = document.querySelector('.saveColor');
const diffColorRanodom = document.querySelector('.changeGenColor');

saveColor.style.border = "2px solid "+ myChart.config._config.data.datasets[0].borderColor;
saveColor.style.background = "linear-gradient("+ frstStop + ","+ secndStop +")";
$(saveColor).on("click",function(){
    let tab = saveColor.style.background.slice(16,-1).split(",");
    tab = [tab[0] + "," + tab[1] + "," + tab[2] + "," + tab[3], tab[4] + "," + tab[5] + "," + tab[6] + "," + tab[7]];
    let border = saveColor.style.border;
    border = saveColor.style.border.slice(10);
    setCookie("colorChartBorder",saveColor.style.border.substr(10));
    setCookie("colorChartInsideFirst",tab[0]);
    setCookie("colorChartInsideSecond",tab[1]);
    let canvas = document.getElementById("myChart").getContext("2d");
    let gradier = canvas.createLinearGradient(0, 0, 0, 400);
    gradier.addColorStop(0, tab[0]);
    gradier.addColorStop(1, tab[1]);
    myChart.config._config.data.datasets[0].borderColor = border;
    myChart.config._config.data.datasets[0].backgroundColor = gradier;
    // window.location.assign("mojekonto.php?progress");
    if(myChart instanceof Chart) 
    {
        setTimeout(() => {
            myChart.destroy();
            let temp = userProgressChart;
            myChart = new Chart(canvas, temp);
        }, 200);
    }
});
$(diffColorRanodom).on("click",function()
{
    let uno = getRandomFillColor();
    let dos = getRandomFillColor();
    let tres = getRandomFillColor();
    saveColor.style.border = "2px solid "+ uno;
    saveColor.style.background = "linear-gradient("+ dos + ","+ tres +")";
});
const dayBlock = document.querySelectorAll(".calendar > b");
const calendarBlock = document.querySelectorAll(".calendar");
const freeDay = document.querySelectorAll(".freeDay");
const training = document.querySelector('.addTraining');
const overlay = document.querySelector('.overlay');

for (let i = 0; i < amountDays; i++) 
{
    $(freeDay[i]).on('click', function()
    {
        let dayOfNewTraining  = freeDay[i].previousElementSibling.previousElementSibling.outerText.substring(0,10);
        console.log(dayOfNewTraining);
        gsap.to(training,0.55,{autoAlpha:1,display:'block',zIndex:99});
        gsap.to(overlay,0.55,{autoAlpha:1,display:'block',zIndex:99});

        $(overlay).on('click',function(e)
        {   
            if(training.contains(e.target))
            {
                console.log(dayOfNewTraining);
            } 
            else
            {
                gsap.to(training,0.55,{autoAlpha:0,display:'none'});
                gsap.to(overlay,0.55,{autoAlpha:0,display:'none'});
            }
        });
        document.querySelector("#dateInput").value = dayOfNewTraining;

        
    }); 
}