<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
	<?php
        require_once "Scripts/PHP/page_look_head.php";
    ?>
    <title>Znany trener</title>
</head>
<body>
	<?php
		require_once 'Scripts\PHP\navbar-content.php';
	?>	
    <div class="frequentQuestions">
        <div class="question">
            <h3>1</h3>
            <details>
                <summary>Ile muszę mieć lat, aby móc zostać Klientem?</summary>        
                <p class="answer">Aby móc zostać Klientem, musisz mieć ukończony 15. rok życia i okazać dokument tożsamości ze zdjęciem. Podpisanie Umowy członkowskiej przez osobę niepełnoletnią wymaga obecności przedstawiciela ustawowego (np. rodzica).</p>
            </details>
        </div>
        <hr>
        <div class="question">
            <h3>2</h3>
            <details>
                <summary>Jak długo trzeba czekać na uzyskanie karty MemberCard</summary>        
                <p class="answer">Kartę można odebrać w swojej siłowni w której mamy wykupiony pakiet, lub napisać maila do swojej siłowni o przesłanie jej na podany adres mailowy.</p>
            </details>
        </div>
        <hr>
        <div class="question">
            <h3>3</h3>
            <details>
                <summary>Na czym polega trening próbny w siłowniach?</summary>        
                <p class="answer">Trening próbny to możliwość bezpłatnego i niezobowiązującego poznania Studia twojego wyboru. Aby go odbyć, zawierasz Umowę na okres próbny 8 dni ze studiem, w trakcie których możesz 1 raz wejść do Studia bez limitu czasowego. Do zawarcia Umowy na okres próbny potrzebny Ci będzie tylko dowód osobisty.</p>
            </details>
        </div>
        <hr>
        <div class="question">
            <h3>4</h3>
            <details>
                <summary>Czy siłownie rzeczywiście otwarte są 365 dni w roku?</summary>        
                <p class="answer">W Polsce większość siłowni jest otwartych przez 24 godziny na dobę przez 365 dni w roku*. Recepcje klubów czynne są w godz. 8.00-22.00..</p>
                <h6>*Godziny otwarcia studiów mogą być różne poza granicami Polski.</h6>
            </details>
        </div>
        <hr>
        <div class="question">
            <h3>5</h3>
            <details>
                <summary>Zmieniły się moje dane (adres, numer telefonu komórkowego, numer rachunku bankowego itp.). Gdzie mogę zgłosić te zmiany?</summary>        
                <p class="answer">Każdą zmianę danych powinieneś zgłosić w Studiu lub edytować w zakładce presonalizacja konta. Jeśli zmienił się tylko Twój numer telefonu komórkowego lub adres e-mail, możesz też wysłać mail na adres </p>
            </details>
        </div>
        <hr>
        <div class="question">
            <h3>6</h3>
            <details>
                <summary>Zgubiłem MemberCard. Co powinienem zrobić?</summary>        
                <p class="answer">Zgłoś ten fakt w Studiu. Opiekun Klienta wyda Ci nową MemberCard, a zagubiona MemberCard zostanie automatycznie zablokowana. Za ponowne wystawienie MemberCard zostanie pobrana opłata aktywacyjna.</p>
            </details>
        </div>
        <hr>
        <script>
            let answer = document.querySelectorAll(".answer");
            let summary = document.querySelectorAll("summary");
            for (let i = 0; i < summary.length; i++) 
            {
                $(summary[i]).on("click",function(){
                    gsap.fromTo(answer[i],1,{opacity:0},{opacity:1});
                });
            }
            
        </script>
    </div>
<script src="Scripts/JS/progressionBarApp.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-panels-animations.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/gsap-search-animation.js" crossorigin="anonymous"></script>
<script src="Scripts/JS/footer-icon-change.js" crossorigin="anonymous"></script>

</body>
</hmtl>