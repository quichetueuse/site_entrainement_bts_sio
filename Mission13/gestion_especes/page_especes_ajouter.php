<?php
session_start();
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Ajout animaux</title>
        <link rel="stylesheet" href="style_iframe_especes_ajouter.css">
    </head>
    <body style="padding: 0; margin: 0;">
    <form method="post" accept-charset="utf-8">
        <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
            <h1 class="iframe-title">Espèces</h1>
            <div style="display: flex; flex-direction: row; justify-content: center">
                <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px">
                    <label class="center-label">Nom:</label><input type="text" id="input-nom" name="input-nom" class="dashboard-input">
                    <label class="center-label">durée de vie (années)</label><input type="number" value="1" min="1" inputmode="numeric" id="input-duree-vie" name="input-duree-vie" class="dashboard-input">
                </div>
                <div style="display: flex; flex-direction: column; justify-content: center; margin: 10px;">
                    <label class="center-label">est aquatique ?</label>
                    <select  id="input-aquatique" name="input-aquatique" class="dashboard-input">
                        <option>True</option>
                        <option>False</option>

                    </select>
                    <label class="center-label">type de nouriture:</label>
                    <select id="input-nourriture" name="input-nourriture" class="dashboard-input">
                        <?php
                        include("../connexion_bd.php");
//                        $conn = mysqli_connect("localhost", "root", "", "zoo");
                        $requete = "SELECT * FROM `type_nourritures`";
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

                            <option><?php echo $enre['type_nourriture']; ?></option>
                            <?php
                        }?>
                    </select>
                </div>
            </div>
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
    $duree_vie = $_POST['input-duree-vie'];

    $est_aquatique = boolval($_POST['input-aquatique']);
//    echo $espece;
    $type_nourriture = $_POST['input-nourriture'];

//    echo $nom. " | " . $date_naissance. " | " . $espece. " | " . $sexe. " | " . $commentaire. " | ";
//    echo "<script>console.log('Debug Objects:  $espece');</script>";
//    $conn = mysqli_connect("localhost", "root", "", "zoo");
//    $conn.mysqli_set_charset("utf8")


// INSERT INTO animaux (date_naissance, nom_animal, commentaire, id_espece, sexe) VALUES ('2019-01-01', 'robert', 'test machin', '2', 'Masculin')
//    $requete = "INSERT INTO access (Email, Password) VALUES ('$email', '$password')";
    include("../connexion_bd.php");
    $requete = "INSERT INTO `especes` (nom_race, duree_vie_moyenne, aquatique, type_nourriture) VALUES ('$nom', '$duree_vie', '$est_aquatique', '$type_nourriture')";
    $resultat = mysqli_query($conn, $requete);
    if($resultat)
    {
//        echo "Success";
        echo "<script>
        document.getElementById('label-info').style.color = 'Green';
        document.getElementById('label-info').innerText = 'ajout de l\'espece reussit';</script>";

    }
    else
    {
        echo "<script>
        document.getElementById('label-info').style.color = 'Red';
        document.getElementById('label-info').innerText = 'échec lors de l\'ajout de l\'espece';</script>";

    }


}


?>
    </html>
