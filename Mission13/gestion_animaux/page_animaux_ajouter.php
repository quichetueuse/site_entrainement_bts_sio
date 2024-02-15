<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ajout animaux</title>
    <link rel="stylesheet" href="style_iframe_animaux_ajouter.css">
</head>
<body style="padding: 0; margin: 0;">
<form method="post" accept-charset="utf-8">
    <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
        <h1 class="iframe-title">Animaux</h1>
        <div style="display: flex; flex-direction: row; justify-content: center">
            <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px">
                <label class="center-label">Nom:</label><input type="text" id="input-nom" name="input-nom" class="dashboard-input">
                <label class="center-label">Date de naissance:</label><input type="date" id="input-date-naissance" name="input-date-naissance" class="dashboard-input" pattern=pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))"> <!--required pattern="\d{4}-\d{2}-\d{2}"-->
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px;">
                <label class="center-label">Espece:</label>
                <select  id="input-espece" name="input-espece" class="dashboard-input">
                    <?php
                    @include("../connexion_bd.php");
//                    $conn = mysqli_connect("localhost", "root", "", "zoo");
                    $requete = "SELECT nom_race FROM `especes`";
                    if(mysqli_query($conn, $requete))
                    {
                        $resultat = mysqli_query($conn, $requete);
                    }
                    else
                    {
                        echo "error during msqli_query";
                    }
                    while($enre = mysqli_fetch_array($resultat))
                    {?>
                    <option><?php echo htmlentities($enre['nom_race']); ?></option>
                    <?php
                    }?>

                </select>
                <label class="center-label">Sexe:</label>
                <select id="input-sexe" name="input-sexe" class="dashboard-input">
                    <?php
                    $requete = "SELECT * FROM `sexes`";
                    if(mysqli_query($conn, $requete))
                    {
                        $resultat = mysqli_query($conn, $requete);
                    }
                    else
                    {
                        echo "error during msqli_query";
                    }
                    while($enre = mysqli_fetch_array($resultat))
                    {?>
                        <option><?php echo htmlentities($enre['sexe']); ?></option>
                        <?php
                    }?>
                </select>
            </div>
        </div>
        <div style="width: 50%; display: flex; flex-direction: column;  margin-right: auto; margin-left: auto; margin-top: 30px">
            <label>Commentaire:</label><textarea id="input-commentaire" name="input-commentaire" class="comment" style="resize: none;"></textarea>
        </div>
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
    add_animal();
}

function add_animal()
{
    $nom = $_POST['input-nom'];
    $date_naissance = $_POST['input-date-naissance'];

    $espece = $_POST['input-espece'];
//    echo $espece;
    $espece_id = 0;
    $sexe = $_POST['input-sexe'];

    $commentaire = $_POST['input-commentaire'];
//    echo $nom. " | " . $date_naissance. " | " . $espece. " | " . $sexe. " | " . $commentaire. " | ";
//    echo "<script>console.log('Debug Objects:  $espece');</script>";
//    $conn = mysqli_connect("localhost", "root", "", "zoo");
//    $conn.mysqli_set_charset("utf8")
    @include("../connexion_bd.php");
    $requete = "SELECT id FROM especes WHERE nom_race='$espece'";
    $resultat = mysqli_query($conn, $requete);
    if(mysqli_query($conn, $requete))
    {
        $resultat = mysqli_query($conn, $requete);
    }
    else
    {
        echo "<script>
        document.getElementById('label-info').style.color = 'Red';
        document.getElementById('label-info').innerText = 'échec de l\'ajout de l\'animal';</script>";
    }
    while($enre = mysqli_fetch_array($resultat))
    {
        $espece_id = $enre['id'];
        echo "<script>console.log(". $espece_id .")</script>";
    }

// INSERT INTO animaux (date_naissance, nom_animal, commentaire, id_espece, sexe) VALUES ('2019-01-01', 'robert', 'test machin', '2', 'Masculin')
//    $requete = "INSERT INTO access (Email, Password) VALUES ('$email', '$password')";
    $requete = "INSERT INTO animaux (date_naissance, nom_animal, commentaire, id_espece, sexe) VALUES ('$date_naissance', '$nom', '$commentaire', '$espece_id', '$sexe')";
    $resultat = mysqli_query($conn, $requete);
    if($resultat)
    {
//        echo "Success";
        echo "<script>
        document.getElementById('label-info').style.color = 'Green';
        document.getElementById('label-info').innerText = 'ajout de l\'animal reussit';</script>";

    }
    else
    {
        echo "<script>
        document.getElementById('label-info').style.color = 'Red';
        document.getElementById('label-info').innerText = 'échec lors de l\'ajout de l\'animal';</script>";

    }


}


?>
</html>