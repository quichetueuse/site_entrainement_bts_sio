<?php
global $conn;
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
    <link rel="stylesheet" href="style_iframe_employes_ajouter.css">
</head>
<body style="padding: 0; margin: 0;">
<form method="post">
    <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
        <h1 class="iframe-title">Employés</h1>
        <div id="div-btn-modif" style="display: flex; flex-direction: row; justify-content: center; width: 30%; margin-left:auto; margin-right: auto; margin-top: 30px;">
            <select id="select-employes" name="select-employes" class="dashboard-input">
                <?php
                //                $conn = mysqli_connect("localhost", "root", "", "zoo");
                @include("../connexion_bd.php");
                $requete = "SELECT nom FROM `personnels`";
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
                    <option><?php echo htmlentities($enre['nom']); ?></option>
                    <?php
                }?>

            </select>
            <button id="btn_modify" name="btn_modify" class="btn-dashboard">Modifier</button>
        </div>

    </div>
    <div id="div-modification" style="display: flex; flex-direction: column; justify-content: center; align-content: center; visibility: hidden">
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
        <!--        <div style="width: 50%; display: flex; flex-direction: column;  margin-right: auto; margin-left: auto; margin-top: 30px">-->
        <!--            <label>Commentaire:</label><textarea id="input-commentaire" name="input-commentaire" class="comment" style="resize: none;"></textarea>-->
        <!--        </div>-->
        <div style="display: flex; justify-content: center; margin-top: 10px"><label id="label-info"></label></div>
        <div style="margin-top: 50px; width: 35%; margin-left: auto; margin-right: auto;">
            <button id="btn_add" name="btn_apply" class="btn-dashboard">Appliquer</button>
        </div>
    </div>
    <input type="text" id="lbl_id" name="lbl_id" style="visibility: hidden;"></input> <!-- style="display: none; visibility: hidden;" -->
</form>
</body>
<?php

if(array_key_exists("btn_modify", $_POST)) {
//    echo "entered";
    show_modify();
}

if(array_key_exists("btn_apply", $_POST)) {
//    echo "entered";
    apply_changes();
}
//btn_apply
function show_modify()
{
    echo "<script>    document.getElementById('div-btn-modif').style.visibility = 'hidden';
    document.getElementById('div-btn-modif').style.display = 'none';
    document.getElementById('div-modification').style.visibility = 'visible';
//    document.getElementById('div-btn-modif').style.display = 'none';</script>"; //div-modification
    $employes_to_modify = $_POST["select-employes"];
//    $conn = mysqli_connect("localhost", "root", "", "zoo");
    @include("../connexion_bd.php");
    $requete = "SELECT * FROM `personnels` where nom='$employes_to_modify'";
    if(mysqli_query($conn, $requete))
    {
        $resultat = mysqli_query($conn, $requete);
    }
    else
    {
        echo "error during msqli_query";
    }
    while($enre = mysqli_fetch_array($resultat))
    {
        $id_modif = $enre['id'];
        $nom = $enre['nom'];
        $date_naissance = $enre['date_naissance'];
        $prenom = $enre['prenom'];

        $sexe = $enre['sexe'];
        $login = $enre['login'];
        $password = $enre['password'];
        $salaire = $enre['salaire'];

        echo "<script>
document.getElementById('input-nom').value = '$nom';
document.getElementById('input-prenom').value = '$prenom';
document.getElementById('input-date-naissance').value = '$date_naissance';
//console.log(document.getElementById('lbl_id').innerText);
document.getElementById('input-login').value = '$login';
document.getElementById('input-password').value = '$password';
document.getElementById('input-sexe').value = '$sexe';
document.getElementById('input-salaire').value = '$salaire';

document.getElementById('lbl_id').value = '$id_modif';</script>";
    }
}


function apply_changes()
{
    $nom = $_POST['input-nom'];
    $date_naissance = $_POST['input-date-naissance'];
    $prenom = $_POST['input-prenom'];
//    echo $espece;

    $sexe = $_POST['input-sexe'];
    $login = $_POST['input-login'];
    $password = $_POST['input-password'];
    $salaire = $_POST['input-salaire'];

    $id_modif = $_POST['lbl_id'];
//    echo "id modif: " . $id_modif;





//    $conn = mysqli_connect("localhost", "root", "", "zoo");
//    @include("../connexion_bd.php");
//    $requete = "SELECT id FROM especes WHERE nom_race='$espece'";
//    $resultat = mysqli_query($conn, $requete);
//    $row = mysqli_fetch_array($resultat);
//    $id_espece = $row[0];
//
////    $espece_id = "";
////    while($enre = mysqli_fetch_array($resultat))
////        $espece_id = $enre['id'];
//
//    echo "<script>console.log('$row[0]' + '| id de l\'animal a modifier');</script>";


//    echo "<script>
//    console.log('$nom + $date_naissance + $espece + $sexe + $commentaire + ');
//    console.log(" . $id_modif .");
//</script>";
//    $temp_id = $GLOBALS['id'];
//    echo "<script>console.log(" . $id_modif .");</script>";
//    echo $nom. " | " . $date_naissance. " | " . $espece. " | " . $sexe. " | " . $commentaire. " | " . $id_modif . ' | ';
//    $conn = mysqli_connect("localhost", "root", "", "zoo");
    @include("../connexion_bd.php");
    $requete = "UPDATE personnels SET nom='$nom', prenom='$prenom', date_naissance='$date_naissance', login='$login', password='$password', sexe='$sexe', salaire='$salaire' WHERE id='$id_modif'"; // date_naissance='$date_naissance'
//    $requete = "UPDATE animaux SET `date_naissance`='$date_naissance' `nom_animal`='$nom' `commentaire`='$commentaire' `id_espece`='$espece' `sexe`='$sexe' WHERE `id`='1'";
    $resultat = mysqli_query($conn, $requete);
    if($resultat) //todo impossible de mettre des côtes dans les champs utilisateurs
    {
//        echo "Success";
        echo "<script>
        document.getElementById('label-info').style.color = 'Green';
        document.getElementById('label-info').innerText = 'modifications appliquées';</script>";
        $_SESSION['prenom'] = $prenom;

    }
    else
    {
        echo "<script>
        document.getElementById('label-info').style.color = 'Red';
        document.getElementById('label-info').innerText = 'modifications refusées';</script>";
        echo "error";

    }
}

?>
</html>