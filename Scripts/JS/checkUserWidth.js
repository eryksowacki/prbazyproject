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