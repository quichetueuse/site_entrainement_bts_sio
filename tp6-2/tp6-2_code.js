
function calcul_moyenne()
{
    var case_texte = document.getElementById("case_placeholder")
    var n1 = prompt("Donnez la pmremière note: ");
    var n2 = prompt("Donnez la pmremière note: ");
    var n3 = prompt("Donnez la pmremière note: ");
    var total_texte = "";
    var somme = Number(n1) + Number(n2)+ Number(n3);

    //case_texte.innerText = "Voici la somme des 3 notes: " + somme + "<br />";
    total_texte = "Voici la somme des 3 notes: " + somme + "\n";
    var moyenne = somme/3;
    total_texte += "Voici la moyenne: " + moyenne + "\n";
    //case_texte.textContent += "Voici la moyenne: " + moyenne + "<br />";

    if (moyenne < 10)
    {
        //case_texte.textContent += "Vous etes redoublant";
        total_texte += "Vous êtes redoublant";
    }
    else if (moyenne >= 10 && moyenne < 12)
    {
        //case_texte.textContent += "Vous etes admis assez bien";
        total_texte += "Vous etes admis assez bien";
    }
    else if (moyenne >= 12 && moyenne < 14)
    {
        //case_texte.textContent += "Vous etes admis bien";
        total_texte += "Vous etes admis bien";
    }

    else if (moyenne >= 14 && moyenne < 16)
    {
        //case_texte.textContent += "Vous etes admis très bien";
        total_texte += "Vous etes admis très bien";
    }

    else if (moyenne >= 18)
    {
        total_texte += "Vous etes admis jury";
        //case_texte.textContent += "Vous etes admis jury";
    }

    case_texte.style.backgroundColor = "white";
    case_texte.innerText = total_texte;


}

function verif_age()
{
    var case_texte = document.getElementById("case_placeholder")
    var age = prompt("Donnez votre age: ")

    if (Number(age) <18)
    {
        case_texte.style.backgroundColor = "red";
        case_texte.innerText = "Vous êtes mineur(e)";
    }
    else
    {
        case_texte.style.backgroundColor = "green";
        case_texte.innerText = "Vous êtes majeur(e)";
    }
}

function give_name()
{
    var case_texte = document.getElementById("case_placeholder")

    var prenom = prompt("donnez votre prénom: ")
    var nom = prompt("Donnez votre nom: ");

    if (prenom === "King" || nom === "Crimson")
    {
        var audio = new Audio('King_crimson.mp3');
        audio.play();
        case_texte.style.backgroundColor = "crimson";
        case_texte.innerText = "Korega waga king crimson no noruiku da";

    }
    else
    {
        case_texte.style.backgroundColor = "white";
        case_texte.innerText = "Bonjour " + prenom + " " + nom;
    }
}

function change_bg()
{
    var case_texte = document.getElementById("case_placeholder")

    var color = prompt("Donnez une couleur: ");
    case_texte.style.backgroundColor = color;
}