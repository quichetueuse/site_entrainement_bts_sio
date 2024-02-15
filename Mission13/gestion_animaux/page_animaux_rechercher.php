<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Rechercher</title>
    <link rel="stylesheet" href="style_iframe_animaux_ajouter.css">
    <link rel="stylesheet" href="style_iframe_dashboard.css">
</head>
<body style="padding: 0; margin: 0;">
<form method="post">
    <div style="display: flex; flex-direction: column; justify-content: center; align-content: center;">
        <h1 class="iframe-title">Animaux</h1>
<!--        --><?php
//        if (array_key_exists('selecteur_type', $_POST))
//        {
//            echo "amongus";
//        }?>
        <div style="display: flex; flex-direction: row; justify-content: center; width: 30%; margin-left:auto; margin-right: auto; margin-top: 30px;">
<!--            --><?php
//            if (array_key_exists('selecteur_type', $_POST))
//            {
//                echo "amongus";
//            }
//            //array_key_exists
////            echo $_POST['selecteur_type'];
////            echo '<script>console.log("before if");</script>';
//            if (isset($_POST['selecteur_type']))
//            {
//                if ($_POST['selecteur_type'] == 'Animaux')
//                {
//                    echo '<script>console.log("animaux is selected");</script>';
//                    echo $_POST['selecteur_type'];
//                }
//            }
////            ?>

            <select id="select-animaux-search" name="select-animaux-search" class="dashboard-input">
                <?php
//                $conn = mysqli_connect("localhost", "root", "", "zoo");
                @include("../connexion_bd.php");

                $requete = "SELECT nom_animal FROM `animaux`";
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
                    <option><?php echo htmlentities($enre['nom_animal']); ?></option>
                    <?php
                }?>
            </select>
            <button id="btn_search" name="btn_search" class="btn-dashboard">Rechercher</button>
        </div>
        <div id="container2" class="container2" style="width: 50%; justify-content: center; margin: auto; visibility: hidden;" id="container_aff_tableau">
            <div class="div-animaux-table">
                <div style="display: flex; flex-direction: row; justify-content: space-between;">
                    <label>Liste des animaux</label>
<!--                    <select>-->
<!--                        <option>Animaux</option>-->
<!--                        <option>Races</option>-->
<!--                    </select>-->
                </div>
                <div style="overflow:auto; height: 85%; margin-top: 10px;">
                    <table id="affichage-animaux">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>

                            <th>Date de naissance</th>
                            <th>Commentaire</th>

                            <th>id especes</th>
                            <th>Sexe</th>
                            <th>Supprimer</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr style="height: 0px">
                            <td colspan="1000"><hr></td>
                        </tr>

                        <?php
                        if(array_key_exists("btn_search", $_POST)) {
//    echo "entered";
                        //                if(array_key_exists("validate", $_POST))
                        //                {
                        //
                        //                }
                            echo "<script>document.getElementById('container2').style.visibility = 'visible';</script>"; //div-modification

                        $nom = $_POST['select-animaux-search'];
//                        echo $nom;
                        $requete = "SELECT * FROM `animaux` WHERE nom_animal='$nom'";

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
                            <tr>
                                <td><?php echo htmlentities($enre["id"]);?></td>
                                <td><?php echo htmlentities($enre["nom_animal"]);?></td>
                                <td><?php echo htmlentities($enre["date_naissance"]);?></td>
                                <td><?php echo htmlentities($enre["commentaire"]);?></td>
                                <td><?php echo htmlentities($enre["id_espece"]);?></td>
                                <td><?php echo htmlentities($enre["sexe"]);?></td>
                                <td><button class="table-btn-delete" onclick="location.href = 'delete_animaux.php?Id=<?php echo $enre["id"]; ?>'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg></button></td>
                            <tr style="height: 0px">
                                <td colspan="1000"><hr></td>
                            </tr>
                            <?php

                        }
                        }?>
                        <!--                <tr>-->
                        <!--                    <td>309034</td>-->
                        <!--                    <td>Kevin</td>-->
                        <!---->
                        <!--                    <td>10/02/2993</td>-->
                        <!--                    <td>Agréable</td>-->
                        <!---->
                        <!--                    <td>5</td>-->
                        <!--                    <td>Masculin</td>-->
                        <!--                    <td><button class="table-btn-delete" onclick="location.href = 'delete.php?id='"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">-->
                        <!--                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>-->
                        <!--                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>-->
                        <!--                            </svg></button></td>-->
                        <!--                </tr>-->
                        <!--                <tr style="height: 0px">-->
                        <!--                    <td colspan="1000"><hr></td>-->
                        <!--                </tr>-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>
</body>
<!--<script>document.getElementById("container_aff_tableau").visibility = "hidden"</script>-->
</html>

<?php
//if(array_key_exists("btn_search", $_POST)) {
////    echo "entered";
//}
//
//function search()
//{
//    echo "<script>    document.getElementById('div-btn-modif').style.visibility = 'hidden';
//    document.getElementById('div-btn-modif').style.display = 'none';
//    document.getElementById('div-modification').style.visibility = 'visible';
////    document.getElementById('div-btn-modif').style.display = 'none';</script>"; //div-modification
//}
//
//?>

