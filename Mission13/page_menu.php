<?php
//require "tp_login_v2.php";
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">

    <!--    <script src="tp_login_v2.js"></script>-->
    <title>Authentification</title>
</head>
<body id="body-menu">
<div id="bg-image"></div>
<header id="header_menu">
    <div id="div-photo">
        <img id="photo-zoo" src="Assets/logo-zoo.png">
    </div>
    <h1 id="titre_header">ZOO</h1>
    <button class="menu-btn" id="btn-admin">DashBoard Employés</button>
    <button class="menu-btn">DashBoard Animaux</button>
    <button class="menu-btn">Contact</button>
    <button id="disconnect">Déconnection</button>

    
    
</header>
<h1 id="titre">Bienvenue {utilisateur}</h1>
<?php
if(array_key_exists("sign-in", $_POST)) {
    if(check_password() === true)
    {
        check_db();
//        echo "WOOOOOOOOOOOOOOOOOOOOOOO";

    }
    else
    {
        return;
//        echo "POOP";
    }
//    check_password();
//    echo "<script> check_password()</script>";
//    echo "<script>document.getElementById('p-info').style.color = 'Blue';</script>";
}

function check_password()
{
    $special = array('/', '[', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', ']', '/', '?', '_');
    $input_psswd = $_POST['input_password'];
//    print($input_psswd);
    $cptr_special = 0;
    $cptr_maj = 0;
    $cptr_min = 0;
    $cptr_num = 0;

//    $cptr_special = ($input_psswd.match(/is/g) || []).length;
//    preg_replace("/[^a-zA-Z]+/", "", $input_psswd, -1, $cptr_special);
    foreach (str_split($input_psswd) as $letter)
    {
        if (in_array($letter, $special))
        {
            $cptr_special++;
        }
        if (is_numeric($letter))
        {
            $cptr_num++;
        }
        if (ctype_upper($letter))
        {
            $cptr_maj++;
        }
        else if (ctype_lower($letter))
        {
            $cptr_min++;
        }
    }
//    echo "special : " . $cptr_special . " majuscule: " . $cptr_maj . " number: " . $cptr_num . " minuscule: " . $cptr_min;
    if( $cptr_special < 2 || $cptr_num < 2 || $cptr_maj < 2 || $cptr_min < 2 || strlen($input_psswd) < 13)
    {
        echo "<script>
        document.getElementById('p-info').style.color = 'Red';
        document.getElementById('p-info').innerText = 'mot de passe trop faible';</script>";
        return false;
    }
    else
    {
        echo "<script>document.getElementById('p-info').innerText = 'Boom boom boom boom';
        document.getElementById('p-info').style.color = 'Blue';</script>";
        return true;
    }
}

function check_db()
{
    $email = $_POST['input_email'];
    $password = $_POST['input_password'];

    try {
        $conn = mysqli_connect("localhost", "root", "", "bd_user");
    }
    catch (Exception $e)
    {
        echo $e;
        return;
    }
//SELECT * FROM `access` WHERE Email='jean.kevin@gmx.com' AND Password='JeSuisUneCotelette01';
    $requete = "SELECT * FROM `access` WHERE Email='$email' AND Password='$password'";
    if(mysqli_query($conn, $requete))
    {
        $resultat = mysqli_query($conn, $requete);
        if(mysqli_num_rows($resultat) == 0)
        {
            echo "<script>
        document.getElementById('p-info').style.color = 'Red';
        document.getElementById('p-info').innerText = 'Aucun compte na été trouver avec cette email / mdp incorrect';</script>";
        }
        else
        {
            echo "<script>console.log('connexion reussit!!!')</script>";
            echo "<script>document.location.href = 'success.html';</script>";
        }
    }
    else
    {
        echo "<script>console.log('Error')</script>";
        return;
    }
}


//?JeSuisUneBanane13?
?>
</body>
<script>
    statut = "admin";
    if (statut === "admin")
    {
        document.getElementById("btn-admin").style.visibility = "visible";
    }
    else
    {
        document.getElementById("btn-admin").style.visibility = "hidden";
    }



</script>
</html>
