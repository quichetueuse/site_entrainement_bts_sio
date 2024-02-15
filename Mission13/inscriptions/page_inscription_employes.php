<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscriptions</title>
    <link rel="stylesheet" href="style_pages_inscription.css">
    <link rel="stylesheet" href="../gestion_employes/style_iframe_employes_ajouter.css">
</head>
<body style="padding: 0; margin: 0; ">
<div id="container">
    <!--        <div id="head-div">-->
    <!--            <label style="text-align: center; margin-right: auto; margin-left: auto;"> 🐒Inscrivez-vous en tant que directeur! 🐒</label>-->
    <!--            <label></label>-->
    <!--        </div>-->
    <div class="action-bar2">

        <div id="text-header">
            <!--            <img src="../Assets/logo-zoo.png" id="logo-zoo">-->
            <label>Zoo</label>
            <label>Employé</label> <!--style="margin: auto 0;"-->
        </div>

        <div id="div-image-boss" style="display: flex; justify-content: center; margin: 20px; height: 600px;">
            <img src="../Assets/john-smiling2.png" width="275px">
        </div>
        <hr>

        <div class="div-button">
            <button id="logout_btn" onclick="document.location.href = '../page_auth.php'"></button>
        </div>
    </div>
    <div style="display: flex; flex-direction: column; text-align: center; width: 85%;background-image: url('../Assets/desert.png'); background-size: cover;">
        <label style="text-align: center; margin-right: auto; margin-left: auto; font-weight: bold; font-size: 42px; margin-top: 10px; color: white">🐒Inscrivez-vous en tant qu'employé ! 🐒</label>
        <form method="post">
            <!--    <div style="display: flex; flex-direction: column; ">-->
            <!--        -->
            <!--        -->
            <!--    </div>-->
            <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
                <!--        <select class="choice_animaux_espece">-->
                <!--                            <option>Animaux</option>-->
                <!--            <option>Employes</option>-->
                <!--        </select>-->
                <!--                    <h1 style="text-align: center; font-weight: bold; font-size: 42px; color: mediumslateblue;">Directeurs</h1>-->
                <div style="display: flex; flex-direction: row; justify-content: center; ">
                    <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px">
                        <label class="center-label" style="color: white; font-size: 20px;">Nom:</label><input type="text" id="input-nom" name="input-nom" class="dashboard-input">
                        <label class="center-label" style="color: white; font-size: 20px;">Date de naissance</label><input type="date" id="input-date-naissance" name="input-date-naissance" class="dashboard-input" pattern=pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">


                        <label class="center-label" style="color: white; font-size: 20px;">Login:</label>
                        <input type="text"  id="input-login" name="input-login" class="dashboard-input">


                    </div>
                    <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px;">
                        <label class="center-label" style="color: white; font-size: 20px;">Prénom:</label>
                        <input type="text"  id="input-prenom" name="input-prenom" class="dashboard-input">

                        <label class="center-label" style="color: white; font-size: 20px;">Sexe:</label>
                        <select id="input-sexe" name="input-sexe" class="dashboard-input">
                            <?php
                            include("../connexion_bd.php");
                            //                        $conn = mysqli_connect("localhost", "root", "", "zoo");
                            $requete = "SELECT * FROM `sexes`";
                            if(mysqli_query($conn, $requete))
                            {
                                $resultat = mysqli_query($conn, $requete);
//                            echo '<script>console.log("oo")</script>';
                            }
                            else
                            {
                                echo "error during msqli_query";
                            }
                            while($enre = mysqli_fetch_array($resultat))
                            {?>

                                <option><?php echo $enre['sexe']; ?></option>
                                <?php
                            }?>
                        </select>

                        <label class="center-label" style="color: white; font-size: 20px;">Mot de passe:</label>
                        <input type="text" id="input-password" name="input-password" class="dashboard-input">
                    </div>
                </div>
                <!--        <label class="center-label">Salaire:</label>-->
                <!--        <input type="text"  id="input-salaire" name="input-salaire" class="dashboard-input">-->
                <!--            <div style="width: 50%; display: flex; flex-direction: column;  margin-right: auto; margin-left: auto; margin-top: 30px">-->
                <!--                <label>Commentaire:</label><textarea id="input-commentaire" name="input-commentaire" class="comment"></textarea>-->
                <!--            </div>-->
                <div style="display: flex; justify-content: center; margin-top: 10px"><label id="label-info"></label></div>

                <div style="margin-top: 50px; width: 35%; margin-left: auto; margin-right: auto; display: flex; justify-content: center;">
                    <button id="btn-register" name="btn-register">S'enregistrer</button>
                </div>

            </div>
        </form>
    </div>
    <!--        <div id="iframe-div">-->
    <!--            <iframe src="iframe_inscription_directeurs.php"></iframe>-->
    <!--    </div>-->
</body>
<?php


if(array_key_exists("btn-register", $_POST)) {
    if(check_password() === true)
    {
        add_employe();

    }
    else
    {
        return;
    }
}

function check_password()
{
    $special = array('/', '[', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', ']', '/', '?', '_');
    $input_psswd = $_POST['input-password'];
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
//    echo $cptr_special.$cptr_num.$cptr_min.$cptr_maj. strlen($input_psswd);
//    echo "special : " . $cptr_special . " majuscule: " . $cptr_maj . " number: " . $cptr_num . " minuscule: " . $cptr_min;
    if( $cptr_special < 2 || $cptr_num < 2 || $cptr_maj < 2 || $cptr_min < 2 || strlen($input_psswd) < 13)
    {
        echo "<script>
        document.getElementById('label-info').style.color = 'Red';
        document.getElementById('label-info').innerText = 'mot de passe trop faible';</script>";
        return false;
    }
    else
    {
//        echo "<script>document.getElementById('p-info').innerText = 'Boom boom boom boom';
//        document.getElementById('p-info').style.color = 'Blue';</script>";
        return true;
    }
}

function add_employe()
{
    $nom = $_POST['input-nom'];
    $date_naissance = $_POST['input-date-naissance'];
    $prenom = $_POST['input-prenom'];
//    echo $espece;

    $sexe = $_POST['input-sexe'];
    $login = $_POST['input-login'];
    $password = $_POST['input-password'];


//    echo $nom. " | " . $date_naissance. " | " . $espece. " | " . $sexe. " | " . $commentaire. " | ";
//    echo "<script>console.log('Debug Objects:  $espece');</script>";
//    $conn = mysqli_connect("localhost", "root", "", "zoo");
//    $conn.mysqli_set_charset("utf8")


// INSERT INTO animaux (date_naissance, nom_animal, commentaire, id_espece, sexe) VALUES ('2019-01-01', 'robert', 'test machin', '2', 'Masculin')
//    $requete = "INSERT INTO access (Email, Password) VALUES ('$email', '$password')";
    include("../connexion_bd.php");
    $requete = "INSERT INTO `personnels` (nom, prenom, date_naissance, login, password, salaire, sexe, fonction) VALUES ('$nom', '$prenom', '$date_naissance', '$login', '$password', 0, '$sexe', 'Employe')";
    $resultat = mysqli_query($conn, $requete);
    if($resultat)
    {
//        echo "Success";
        echo "<script>
//        document.getElementById('label-info').style.color = 'Green';
//        document.getElementById('label-info').innerText = ' Enregistrement reussit';
        document.location.href = '../page_auth.php';</script>";

//        header('Location: ' . $_SERVER['HTTP_REFERER']);
//        header("location: ../page_auth.php");

    }
    else
    {
        echo "<script>
        document.getElementById('label-info').style.color = 'Red';
        document.getElementById('label-info').innerText = 'Enregistrement échoué';</script>";

    }


}


?>
</html>