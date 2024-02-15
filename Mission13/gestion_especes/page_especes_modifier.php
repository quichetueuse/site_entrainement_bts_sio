<?php
global $conn;
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modifier</title>
    <link rel="stylesheet" href="style_iframe_especes_ajouter.css">
</head>
<body style="padding: 0; margin: 0;">
<form method="post">
    <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
        <h1 class="iframe-title">Espèces</h1>
        <div id="div-btn-modif" style="display: flex; flex-direction: row; justify-content: center; width: 30%; margin-left:auto; margin-right: auto; margin-top: 30px;">
            <select id="select-especes" name="select-especes" class="dashboard-input">
                <?php
                //                $conn = mysqli_connect("localhost", "root", "", "zoo");
                @include("../connexion_bd.php");
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
            <button id="btn_modify" name="btn_modify" class="btn-dashboard">Modifier</button>
        </div>

    </div>
    <div id="div-modification" style="display: flex; flex-direction: column; justify-content: center; align-content: center; visibility: hidden">
        <div style="display: flex; flex-direction: row; justify-content: center">
            <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px">
                <label class="center-label">Nom:</label><input type="text" id="input-nom" name="input-nom" class="dashboard-input">
                <label class="center-label">Durée de vie:</label><input type="number" min="1" inputmode="numeric" id="input-duree-vie" name="input-duree-vie" class="dashboard-input">
            </div>
            <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px;">
                <label class="center-label">Est aquatique ?</label>
                <select  id="input-aquatique" name="input-aquatique" class="dashboard-input">
                    <option>True</option>
                    <option>False</option>
<!--                    --><?php
//                    @include("../connexion_bd.php");
//                    //                        $conn = mysqli_connect("localhost", "root", "", "zoo");
//                    $requete = "SELECT aquatique FROM `especes`";
//                    if(mysqli_query($conn, $requete))
//                    {
//                        $resultat = mysqli_query($conn, $requete);
//                    }
//                    else
//                    {
//                        echo "error during msqli_query";
//                    }
//                    while($enre = mysqli_fetch_array($resultat))
//                    {?>
<!--                        <option>--><?php //echo htmlentities($enre['aquatique']); ?><!--</option>-->
<!--                        --><?php
//                    }?>

                </select>
                <label class="center-label">Type de nourriture:</label>
                <select id="input-nourriture" name="input-nourriture" class="dashboard-input">
                    <?php
                    $requete = "SELECT type_nourriture FROM `type_nourritures`"; //todo recuperer id sexe "SELECT * FROM 'sexes' WHERE"
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
                        <option selected="selected"><?php echo htmlentities($enre['type_nourriture']); ?></option>
                        <?php
                    }?>
                </select>
            </div>
        </div>
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
    $especes_to_modify = $_POST["select-especes"];
//    $conn = mysqli_connect("localhost", "root", "", "zoo");
    @include("../connexion_bd.php");
    $requete = "SELECT * FROM `especes` where nom_race='$especes_to_modify'";
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
        $nom = $enre['nom_race'];
        $duree_de_vie = $enre['duree_vie_moyenne'];
        $type_nourriture = $enre['type_nourriture'];
//        $commentaire = $enre['commentaire'];
        $est_aquatique = null;
        if ($enre['aquatique'] == 0) $est_aquatique = 'False';
        else $est_aquatique = 'True';
//        define('id_modif', $enre['id']);
        $id_modif = $enre['id'];
//        $temp_id = $GLOBALS['id'];
//        echo "<script>console.log($temp_id + 'WOOOO');</script>";
//        echo $id_modif . "Wwowowoow";
        echo "<script>
document.getElementById('input-nom').value = '$nom';
document.getElementById('input-duree-vie').value = '$duree_de_vie';
//console.log(document.getElementById('lbl_id').innerText);
document.getElementById('input-nourriture').value = '$type_nourriture';
document.getElementById('input-aquatique').value = '$est_aquatique';
document.getElementById('lbl_id').value = '$id_modif';</script>";
    }
}


function apply_changes()
{
    $nom = $_POST['input-nom'];
    $duree_vie = $_POST['input-duree-vie'];

    $est_aquatique = boolval($_POST['input-aquatique']);
    $type_nourriture = $_POST['input-nourriture'];

    $id_modif = $_POST['lbl_id'];
//    echo "id modif: " . $id_modif;



    $bool_aquatique = null;


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
    $requete = "UPDATE especes SET nom_race='$nom', duree_vie_moyenne='$duree_vie', aquatique='$est_aquatique', type_nourriture='$type_nourriture' WHERE id='$id_modif'"; // date_naissance='$date_naissance'
//    $requete = "UPDATE animaux SET `date_naissance`='$date_naissance' `nom_animal`='$nom' `commentaire`='$commentaire' `id_espece`='$espece' `sexe`='$sexe' WHERE `id`='1'";
    $resultat = mysqli_query($conn, $requete);
    if($resultat) //todo impossible de mettre des côtes dans les champs utilisateurs
    {
//        echo "Success";
        echo "<script>
        document.getElementById('label-info').style.color = 'Green';
        document.getElementById('label-info').innerText = 'modifications appliquées';</script>";

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