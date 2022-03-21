<footer class="footer"> 
    <div class="contact">
        <a href="mailto: kontaktZN@znanytrener.gmail.com" class="sgdButton"><button class="contactButton">Kontakt</button></a>
        <a href="mailto: kontaktZN@znanytrener.gmail.com" class="sgdButton"><button class="gsfonsga">Regulamin</button></a>
    </div>
    <div class="authors">
        <p class="footerText">Projekt Aplikacje internetowe / Bazy danych <i>Maksymilian Mazurczak</i> <i><a target="_blank" class="github" href="https://github.com/eryksowacki">Eryk Sowacki</a></i> & <i><a target="_blank" class="github" href="https://github.com/Wichtowski">Oskar Wichtowski</a></i></p>
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
<?php
    if(!isset($_COOKIE['acceptCookies']))
    {
        echo <<< COOKIEBAR
            <div class="cookie">
                <div class="cookieText">
                    <p>Używamy ciasteczek, dzięki którym nasza strona jest dla Ciebie bardziej przyjazna i działa niezawodnie. Pozwalają one również dopasować treści i reklamy do Twoich zainteresowań. Jeśli się nie zgodzisz, reklamy nadal będą się wyświetlać, ale nie będą dopasowane do Ciebie.</p>
                </div>
                <div class="cookieButton">
                    <button class="dfsia234">Akceptuje</button>
                </div>
            </div>
            <script>
                gsap.fromTo(".cookie",1.5,{y:90},{y:0,autoAlpha:1,display:"flex"},5);
                $('.dfsia234').on('click', function()
                {
                    const d = new Date();
                    d.setTime(d.getTime() + (30 * 24 * 60 * 60 * 1000));
                    let expires = "expires=" + d.toUTCString();
                    const cookieName = "acceptCookies";
                    const cvalue = 1;
                    document.cookie = cookieName + "=" + cvalue + ";" + expires + ";path=/";
                    gsap.fromTo(".cookie",1.5,{y:0},{y:90,autoAlpha:0,display:"none"});
                });
            </script>
COOKIEBAR;
    }
?>
