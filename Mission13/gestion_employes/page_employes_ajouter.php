<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout animaux</title>
    <link rel="stylesheet" href="style_iframe_employes_ajouter.css">
</head>
<body style="padding: 0; margin: 0;">
<form method="post" accept-charset="utf-8">
    <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
        <h1 class="iframe-title">Employés</h1>
        <div style="display: flex; flex-direction: row; justify-content: center">
            <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px">
                <label class="center-label">Nom:</label><input type="text" id="input-nom" name="input-nom" class="dashboard-input">
                <label class="center-label">Date de naissance</label><input type="date" id="input-date-naissance" name="input-date-naissance" class="dashboard-input" pattern=pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">


                <label class="center-label">Login:</label>
                <input type="text"  id="input-login" name="input-login" class="dashboard-input">


            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px;">
                <label class="center-label">Prénom:</label>
                <input type="text"  id="input-prenom" name="input-prenom" class="dashboard-input">

                <label class="center-label">Sexe:</label>
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

                <label class="center-label">Mot de passe:</label>
                <input type="text" id="input-password" name="input-password" class="dashboard-input">
            </div>
        </div>
        <label class="center-label">Salaire:</label>
        <input type="text"  id="input-salaire" name="input-salaire" class="dashboard-input">
        <!--            <div style="width: 50%; display: flex; flex-direction: column;  margin-right: auto; margin-left: auto; margin-top: 30px">-->
        <!--                <label>Commentaire:</label><textarea id="input-commentaire" name="input-commentaire" class="comment"></textarea>-->
        <!--            </div>-->
        <div style="display: flex; justify-content: center; margin-top: 10px"><label id="label-info"></label></div>

        <div style="margin-top: 50px; width: 35%; margin-left: auto; margin-right: auto;">
            <button id="btn_add" name="btn_add" class="btn-dashboard">Ajouter</button>
        </div>

    </div>
</form>
</body>
<?php


if(array_key_exists("btn_add", $_POST)) {
//    echo "entered";
    add_espece();
}

function add_espece()
{
    $nom = $_POST['input-nom'];
    $date_naissance = $_POST['input-date-naissance'];
    $prenom = $_POST['input-prenom'];
//    echo $espece;

    $sexe = $_POST['input-sexe'];
    $login = $_POST['input-login'];
    $password = $_POST['input-password'];
    $salaire = $_POST['input-salaire'];


//    echo $nom. " | " . $date_naissance. " | " . $espece. " | " . $sexe. " | " . $commentaire. " | ";
//    echo "<script>console.log('Debug Objects:  $espece');</script>";
//    $conn = mysqli_connect("localhost", "root", "", "zoo");
//    $conn.mysqli_set_charset("utf8")


// INSERT INTO animaux (date_naissance, nom_animal, commentaire, id_espece, sexe) VALUES ('2019-01-01', 'robert', 'test machin', '2', 'Masculin')
//    $requete = "INSERT INTO access (Email, Password) VALUES ('$email', '$password')";
    include("../connexion_bd.php");
    $requete = "INSERT INTO `personnels` (nom, prenom, date_naissance, login, password, salaire, sexe, fonction) VALUES ('$nom', '$prenom', '$date_naissance', '$login', '$password', '$salaire', '$sexe', 'Employe')";
    $resultat = mysqli_query($conn, $requete);
    if($resultat)
    {
//        echo "Success";
        echo "<script>
        document.getElementById('label-info').style.color = 'Green';
        document.getElementById('label-info').innerText = 'ajout de l\'employé reussit';</script>";

    }
    else
    {
        echo "<script>
        document.getElementById('label-info').style.color = 'Red';
        document.getElementById('label-info').innerText = 'échec lors de l\'ajout de l\'employé';</script>";

    }


}


?>
</html>
