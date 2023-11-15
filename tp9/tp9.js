function set_bgcolor()
{
    case_div = document.getElementById("div_container");
    color = prompt("Donnez une couleur: ");
    console.log(color)
    case_div.style.backgroundColor = color; //#00AAFF bleu magnifique

    switch (color)
    {
        case "Red" || "RED":
        {
            console.log("Color is Red");
            break
        }
        case "Blue" || "BLUE":
        {
            console.log("Color is Red");
            break
        }
        case "Green" || "GREEN":
        {
            console.log("Color is Red");
            break
        }
    }
}


function create_table()
{
    iframe_affichage = document.getElementById("div_container");
    tableau = "<table border='2px' width='30%'>";
    console.log("OOOO")
    for(i = 0; i <5; i++)
    {
        tableau += "<tr> <td>*</td> <td>*</td> <td>*</td> </tr>";
    }

    tableau += "</table>";

    iframe_affichage.contentWindow.document.open();
    iframe_affichage.contentWindow.document.write(tableau);
    iframe_affichage.contentWindow.document.close();

}


function build_table_v2()
{
    iframe_affichage = document.getElementById("div_container");
    iframe_affichage.src = "about:blank";
    tableau = '<table style="border: 1px solid black;">';
    column = prompt("How many columns do you want ?");
    row = prompt("How many rows do you want ?");

    for(i = 1; i <= row; i++)
    {
        tableau += '<tr>';
        for(j = 1; j <= column; j++)
        {
            tableau += '<td style="border: 1px solid black;">je suis un texte sans importance</td>'
        }
        tableau += '</tr>';
    }
    tableau += '</table>';


    iframe_affichage.contentWindow.document.open();
    iframe_affichage.contentWindow.document.write(tableau);
    iframe_affichage.contentWindow.document.close();


}


function connecter()
{
    iframe_affichage = document.getElementById("div_container");
    iframe_affichage.src = "about:blank";

    user = prompt("donner votre nom dutilisateur");
    password = prompt("donnez votre mot de passe");
    if (user == "admin" && password == "admin")
    {
        iframe_affichage.style.backgroundColor = "green";
        iframe_affichage.contentWindow.document.open();
        iframe_affichage.contentWindow.document.write("Access granted!");
        iframe_affichage.contentWindow.document.close();
    }
    else
    {
        alert("Accès refusé");
    }
}

function seconnecterv2()
{
    window.location.href = "connexion2.html";
}


function seconnecterv3()
{
    i = 0;
    do
    {
        user = prompt("Entrez votre nom d'utilisateur: ");
        password = prompt("Entrez votre mot de passe");

        if( user == "admin" && password == "admin")
        {
            alert("Accès autorisé");
            return
        }
        alert("Accès refusé");
        i++
    } while(i <3)
    alert("nombres d'essaies maximum atteint");
}

function ask_string()
{
    iframe_affichage = document.getElementById("div_container");
    iframe_affichage.src = "about:blank";
    iframe_affichage.style.backgroundColor = "white";
    str = prompt("give me a string");


    iframe_affichage.contentWindow.document.open();
    iframe_affichage.contentWindow.document.write(`your string with full caps: ${str.toUpperCase()} your string contains ${str.length} letters and start with the letter ${str[0]} and end with the letter ${str[str.length-1]}`);
    iframe_affichage.contentWindow.document.close();

}


function addRow()
{

    window.location.href = "ajoutligne.html";
}


function bonus()
{
    liste_art = [];
    liste_prix = [];
    liste_qte = [];
    liste_total = [];

    do
    {
        article = prompt("Donnez le nom de l'article");
        console.log(article);
        prix = prompt("Donnez le prix de l'article");
        console.log(prix)
        qte = prompt("Donnez le nombre d'exemplaire de cette article");
        console.log(qte)
        total = Number(prix) * Number(qte);
        liste_art.push(article);
        liste_prix.push(Number(prix));
        liste_qte.push(Number(qte));
        liste_total.push(Number(total))
        console.log(total);
        mega_total = 0;
        for (i = 0; i< liste_total.length; i++)
        {
            mega_total+= Number(liste_total[i]);
        }
        alert(`La somme total est de ${mega_total}€`);
        if(confirm("Voulez-vous ajouter un autre article") == false) break
    } while (true)

    for (i = 0; i< liste_art.length; i++)
    {
        document.write("Article:" +liste_art[i] + "   |   ")
        document.write("Prix:" +liste_prix[i] + "   |   ")
        document.write("quantité:" + liste_qte[i] + "   |   ")
        document.write("total:" + liste_total[i] + "   |   ")

    }
    document.write(`Total final: ${mega_total}€`)
}