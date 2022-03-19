let parts = window.location.search.substr(1).split("&");
let $_GET = {};
for (let i = 0; i < parts.length; i++) {
    let temp = parts[i].split("=");
    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
}
const errorField = document.querySelector('.errorParagraph');
if(typeof $_GET['errorNo'] !== 'undefined')
{
    switch($_GET['errorNo']) 
    {
        case "1":
            errorField.textContent = "Email nie istnieje, spróbuj ponownie.";
            break;
        case "2":
            errorField.textContent = "Podano nieprawidłowe hasło, spróbuj ponownie.";
            break;
        case "3":
            errorField.textContent = "Niespodziewany błąd serwera, pracujemy nad jego rozwiązaniem. " +
            "W razie problemów skontaktuj się z administratorem pod adresem admin@znanytrener.gmail.com oraz podaj kod "+ $_GET["PDOexept"] +".";
            break;
        case "5":
        case "4":
            errorField.textContent = "Wprowadzono błędne dane.";
            break;
        case "6":
            errorField.textContent = "Pozostawiono puste pola. Wypełnij jeszcze raz wszystkie pola.";
            break;
        case "7":
            errorField.textContent = "Niezaakceptowano regulaminu sklepu.";
            break;
        case "8":
            errorField.textContent = "Hasła nie są zgodne. Wprowadź hasła ponownie.";
            break;
        case "9":
            errorField.textContent = "Ten email jest używany przez innego użytkownika.";
            break;
        case "10":
            errorField.textContent = "Email nie spełnił oczekiwanych wymagań.";
            break;
        default:
            errorField.textContent = "Wystąpił nieoczekiwany błąd.";
            break;
    }
}
