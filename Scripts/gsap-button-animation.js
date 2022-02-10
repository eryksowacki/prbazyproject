

// const icon = document.querySelector(".icon-1");
$(".icon-1").on("mouseover", function() {
    gsap.fromTo(".icon-1", 2,
            {rotation: 360},
            {rotation: -360});
});