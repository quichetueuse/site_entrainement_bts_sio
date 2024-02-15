<?php
global $conn;
session_start();
//require "index.php";
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="tp_login_v2.css">
    <script src="tp_login_v2.js"></script>
    <title>Ma page</title>
</head>
<body>
<div id="bg-image"></div>
<h1 id="titre">Base de données, Bienvenue
    <?php echo (array_key_exists("email", $_SESSION)) ? $_SESSION["email"] : "" ?></h1>
<div class="container">
    <form method="post">
        <div class="combo-input-label">
            <label>Entrez votre identifiant</label>
            <input type="text" placeholder="e.g JtE3" name="input_num">
        </div>
        <div class="combo-input-label">
            <label>Entrez votre nom</label>
            <input type="text" id="input_nom" name="input_nom" placeholder="e.g kevin">
        </div>
        <div class="combo-input-label">
            <label>Entrez votre Adresse</label>
            <input type="text" placeholder="e.g 17 rue du charme" name="input_adresse">
        </div>
        <div class="combo-input-label">
            <label>Entrez votre numéro de téléphone</label>
            <input type="text" id="input_tel" name="input_tel" placeholder="e.g banane03!">
        </div>
        <div class="info">
            <p id="p-info"></p>
        </div>
        <div class="div-button">
            <button id="validate" name="validate">valider</button>
        </div>
        <div class="div-button">
            <button id="reset_btn" name="reset_btn" type="reset">Annuler</button>
        </div>
        <div class="div-button">
            <button id="show_btn1" name="show_btn1">Afficher les élèves 1</button>
        </div>
        <div class="div-button">
            <button id="show_btn2" name="show_btn2">Afficher les élèves 2</button>
        </div>
        <div class="div-button">
            <button id="show_btn3" name="show_btn3">Afficher les élèves 3</button>
        </div>
        <div class="div-button">
            <button id="show_btn4" name="show_btn4">Afficher les élèves 4</button>
        </div>
        <div class="div-button">
            <button id="del_btn1" name="del_btn1">supprimer les élèves 1</button>
        </div>
        <div class="div-button">
            <button id="del_btn2" name="del_btn2">supprimer les élèves 2</button>
        </div>
        <div class="div-button">
            <button id="search_btn1" name="search_btn1">rechercher les élèves 1</button>
        </div>
        <div class="div-button">
            <button id="search_btn2" name="search_btn2">rechercher les élèves 2</button>
        </div>
        <div class="div-button">
            <button id="search_btn3" name="search_btn3">rechercher les élèves 3</button>
        </div>
        <div class="div-button">
            <button id="disconnect" name="disconnect">Logout</button>
        </div>

    </form>
</div>
<?php

if(array_key_exists("validate", $_POST)) {
    add_eleve();
}
if(array_key_exists("show_btn1", $_POST)) {
    echo "<script>document.location.href='affichage_eleve1.php'</script>";

}
if(array_key_exists("show_btn2", $_POST)) {
    echo "<script>document.location.href='affichage_eleve2.php'</script>";

}
if(array_key_exists("show_btn3", $_POST)) {
    echo "<script>document.location.href='affichage_eleve3.php'</script>";

}
if(array_key_exists("show_btn4", $_POST)) {
//    echo "<script>document.location.href='affichage_eleves4.php'</script>";
    header("location: affichage_eleves4.php");

}
if(array_key_exists("del_btn1", $_POST)) {
    echo "<script>document.location.href='suppression_eleve.php'</script>";

}
if(array_key_exists("del_btn2", $_POST)) {
    echo "<script>document.location.href='suppression2.php'</script>";

}
if(array_key_exists("search_btn1", $_POST)) {
    echo "<script>document.location.href='rechercher1.php'</script>";

}
if(array_key_exists("search_btn2", $_POST)) {
    echo "<script>document.location.href='rechercher2.php'</script>";

}

if(array_key_exists("search_btn3", $_POST)) {
    echo "<script>document.location.href='rechercher3.php'</script>";

}
if(array_key_exists("disconnect", $_POST)) {
    session_unset();
    session_destroy();
    echo "<script>document.location.href = 'index.php';</script>";

}
function add_eleve()
{
    global $conn;
    $num = $_POST['input_num'];
    $nom = $_POST['input_nom'];
    $adresse = $_POST['input_adresse'];
    $tel = $_POST['input_tel'];

    echo "num : " . $num . " nom: " . $nom . " adresse: " . $adresse . " tel: " . $tel;
    try {
        @include("connecte.php");
//        $conn = mysqli_connect("localhost", "root", "", "bd_user");
    }
    catch (Exception $e)
    {
        echo $e;
        return;
    }
//SELECT * FROM `access` WHERE Email='jean.kevin@gmx.com' AND Password='JeSuisUneCotelette01';
    $requete = "INSERT INTO eleves (`Num`, `Nom`, `Adresse`, `Tel`) VALUES ('$num', '$nom', '$adresse', '$tel')";
    $resultat = mysqli_query($conn, $requete);
    if(mysqli_query($conn, $requete))
    {
        echo "<script>
        document.getElementById('p-info').style.color = 'Green';
        document.getElementById('p-info').innerText = 'ajout de l\'élève reussit';</script>";
    }
    else
    {
        echo "<script>console.log('Error')</script>";
        return;
    }
}
//function check_password()
//{
//    $special = array('/', '[', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', ']', '/', '?', '_');
//    $input_psswd = $_POST['input_password'];
////    print($input_psswd);
//    $cptr_special = 0;
//    $cptr_maj = 0;
//    $cptr_min = 0;
//    $cptr_num = 0;
//
////    $cptr_special = ($input_psswd.match(/is/g) || []).length;
////    preg_replace("/[^a-zA-Z]+/", "", $input_psswd, -1, $cptr_special);
//    foreach (str_split($input_psswd) as $letter)
//    {
//        if (in_array($letter, $special))
//        {
//            $cptr_special++;
//        }
//        if (is_numeric($letter))
//        {
//            $cptr_num++;
//        }
//        if (ctype_upper($letter))
//        {
//            $cptr_maj++;
//        }
//        else if (ctype_lower($letter))
//        {
//            $cptr_min++;
//        }
//    }
////    echo "special : " . $cptr_special . " majuscule: " . $cptr_maj . " number: " . $cptr_num . " minuscule: " . $cptr_min;
//    if( $cptr_special < 2 || $cptr_num < 2 || $cptr_maj < 2 || $cptr_min < 2 || strlen($input_psswd) < 13)
//    {
//        echo "<script>
//        document.getElementById('p-info').style.color = 'Red';
//        document.getElementById('p-info').innerText = 'mot de passe trop faible';</script>";
//        return false;
//    }
//    else
//    {
//        echo "<script>document.getElementById('p-info').innerText = 'Boom boom boom boom';
//        document.getElementById('p-info').style.color = 'Blue';</script>";
//        return true;
//    }
//}
//
//function check_db()
//{
//    $email = $_POST['input_email'];
//    $password = $_POST['input_password'];
//
//    try {
//        $conn = mysqli_connect("localhost", "root", "", "bd_user");
//    }
//    catch (Exception $e)
//    {
//        echo $e;
//        return;
//    }
////SELECT * FROM `access` WHERE Email='jean.kevin@gmx.com' AND Password='JeSuisUneCotelette01';
//    $requete = "SELECT * FROM `access` WHERE Email='$email' AND Password='$password'";
//    if(mysqli_query($conn, $requete))
//    {
//        $resultat = mysqli_query($conn, $requete);
//        if(mysqli_num_rows($resultat) == 0)
//        {
//            echo "<script>
//        document.getElementById('p-info').style.color = 'Red';
//        document.getElementById('p-info').innerText = 'Aucun compte na été trouver avec cette email / mdp incorrect';</script>";
//        }
//        else
//        {
//            echo "<script>console.log('connexion reussit!!!')</script>";
//            echo "<script>document.location.href = 'success.html';</script>";
//        }
//    }
//    else
//    {
//        echo "<script>console.log('Error')</script>";
//        return;
//    }
//}


//?JeSuisUneBanane13?
?>
</body>
</html>
