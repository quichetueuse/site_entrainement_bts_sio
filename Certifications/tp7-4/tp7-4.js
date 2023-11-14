
function calculer_moyenne()
{
    note1 = document.getElementById("note_1");
    console.log(note1.value);
    note2 = document.getElementById("note_2");
    console.log(note2.value);
    note3 = document.getElementById("note_3");
    console.log(note3.value);

    coef1 = document.getElementById("coef_1");
    console.log(coef1.value);
    coef2 = document.getElementById("coef_2");
    console.log(coef2.value);
    coef3 = document.getElementById("coef_3");
    console.log(coef3.value);

    case_moyenne = document.getElementById("moyenne");
    case_mention = document.getElementById("resultat_mention");

    moyenne = (note1.value * coef1.value) + (note2.value * coef2.value) + (note3.value * coef3.value);
    moyenne = moyenne / 3;
    case_moyenne.value = moyenne;
    console.log(moyenne);

    if (moyenne < 10)
    {
        case_mention.value = "Redoublant";
    }
    if (moyenne => 10 && moyenne <=14)
    {
        case_mention.value = "Admis Passable";
    }
    if (moyenne < 14)
    {
        case_mention.value = "Admins bien";
    }
}