<footer class="footer"> 

    <div class="contact">
        <a href="kontakt.php"><button class="contactButton">Kontakt</button></a>
    </div>
    <div class="authors">
        <p class="footerText">Projekt Aplikacje internetowe / Bazy danych <i><a target="_blank" href="https://github.com/eryksowacki">Eryk Sowacki</a></i> & <i><a target="_blank" href="https://github.com/Wichtowski">Oskar Wichtowski</a></i></p>
    </div>
    <div class="wrapper">
    <div class="icon facebook">
        <a target="_blank" href="https://facebook.com"><img src="Images/WEBSITE IMAGES/facebook.png" class="footerImages" alt="facebook-icon"></a>
        <div class="tooltip">Facebook</div>
        <span><i class="fab fa-facebook-f"></i></span>
    </div>
    <div class="icon twitter">
        <a target="_blank" href="https://twitter.com"><img src="Images/WEBSITE IMAGES/twitter.png" class="footerImages" alt="twitter-icon"></a>
        <div class="tooltip">Twitter</div>
        <span><i class="fab fa-twitter"></i></span>
    </div>
    <div class="icon instagram">
        <a target="_blank" href="https://instagram.com"><img src="Images/WEBSITE IMAGES/instagram.png" class="footerImages" alt="instagram-icon"></a>
        <div class="tooltip">Instagram</div>
        <span><i class="fab fa-instagram"></i></span>
    </div>
    <div class="icon github eryk">
        <a target="_blank" href="https://github.com/Wichtowski"><img src="Images/WEBSITE IMAGES/github.png" class="footerImages" alt="github-icon"></a>
        <div class="tooltip">Github <i>Oskar Wichtowski</i></div>
        <span><i class="fab fa-github"></i></span>
    </div>
    <div class="icon github oskar">
        <a target="_blank" href="https://github.com/eryksowacki"><img src="Images/WEBSITE IMAGES/github.png" class="footerImages" alt="github-icon"></a>
        <div class="tooltip">Github <i>Eryk Sowacki</i></div>
        <span><i class="fab fa-github"></i></span>
    </div>
    <div class="icon youtube">
        <a target="_blank" href="https://youtube.com"><img src="Images/WEBSITE IMAGES/youtube.png" class="footerImages" alt="youtube-icon"></a>
        <div class="tooltip">Youtube</div>
        <span><i class="fab fa-youtube"></i></span>
    </div>
    </div>
</footer>
<script>
    $('.twitter').on('mouseenter',function(){
        document.querySelector('.twitter > a > img').src = "./Images/WEBSITE%20IMAGES/twitter-white.png";
    });
    $('.twitter').on('mouseleave',function(){
        document.querySelector('.twitter > a > img').src = "./Images/WEBSITE IMAGES/twitter.png";
    });
    $('.facebook').on('mouseenter',function(){
        document.querySelector('.facebook > a > img').src = "./Images/WEBSITE%20IMAGES/facebook-white.png";
    });
    $('.facebook').on('mouseleave',function(){
        document.querySelector('.facebook > a > img').src = "./Images/WEBSITE IMAGES/facebook.png";
    });
    $('.youtube').on('mouseenter',function(){
        document.querySelector('.youtube > a > img').src = "./Images/WEBSITE%20IMAGES/youtube-white.png";
    });
    $('.youtube').on('mouseleave',function(){
        document.querySelector('.youtube > a > img').src = "./Images/WEBSITE IMAGES/youtube.png";
    });
    $('.instagram').on('mouseenter',function(){
        document.querySelector('.instagram > a > img').src = "./Images/WEBSITE%20IMAGES/instagram-white.png";
    });
    $('.instagram').on('mouseleave',function(){
        document.querySelector('.instagram > a > img').src = "./Images/WEBSITE%20IMAGES/instagram.png";
    });

    $('.github.eryk').on('mouseenter',function(){
        document.querySelector('.github.eryk > a > img').src = "./Images/WEBSITE IMAGES/github-white.png";
    });
    $('.github.eryk').on('mouseleave',function(){
        document.querySelector('.github.eryk > a > img').src = "./Images/WEBSITE IMAGES/github.png";
    });

    $('.github.oskar').on('mouseenter',function(){
        document.querySelector('.github.oskar > a > img').src = "./Images/WEBSITE IMAGES/github-white.png";
    });
    $('.github.oskar').on('mouseleave',function(){
        document.querySelector('.github.oskar > a > img').src = "./Images/WEBSITE IMAGES/github.png";
    });
    
</script>