<?php

//phpinfo();
//header("Content-Type: text/html;charset=utf-8");
header("Content-Type: text/html; charset=utf-8");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style_espece_summary.css">
</head>
<body style="margin: 0; padding: 0; background-color: #ebe4f0;">

<div class="container">
    <!--    <div class="container2">-->
    <div class="div-stats">
        <div class="small_container">
            <label style="margin">Especes</label>
            <hr>
            <label id="nombre_especes" style="font-size: 26px;">
                <?php
                //                echo "<script>console.log('>OOOOOOOO')</script>";
                include("../connexion_bd.php");
                //                $conn = mysqli_connect("localhost", "root", "", "zoo");
                $requete = "SELECT count(*) AS nbre_especes FROM `especes`";
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
                    echo $enre['nbre_especes'];
                }
                ?></label>
        </div>
        <div class="small_container">
            <label>Animaux</label>
            <hr>
            <label id="nombre_animaux" style="font-size: 26px;">
                <?php
                $requete = "SELECT count(*) AS nbre_animaux FROM `animaux`";
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
                    echo $enre['nbre_animaux'];
                }
                ?></label>
        </div>
    </div>
    <!--    -->
    <div class="container2">
        <div class="div-animaux-table">
            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                <label>Liste des espèces</label>
<!--                <select>-->
<!--                    <option>Animaux</option>-->
<!--                    <option selected="selected">Espèces</option>-->
<!--                </select>-->
            </div>
            <div style="overflow:auto; height: 85%; margin-top: 10px;">
                <table id="affichage-animaux">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>

                        <th>Durée de vie</th>
                        <th>est aquatique ?</th>

                        <th>Type de nourriture</th>
                        <th>Supprimer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr style="height: 0px">
                        <td colspan="1000"><hr></td>
                    </tr>

                    <?php
                    //                if(array_key_exists("validate", $_POST))
                    //                {
                    //
                    //                }

                    $requete = "SELECT * FROM `especes`";
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
                            <td><?php echo htmlentities($enre["nom_race"]);?></td>
                            <td><?php echo htmlentities($enre["duree_vie_moyenne"]);?></td>
                            <td><?php
                                if ($enre["aquatique"] == 0) echo "False";
                                else echo "True";?></td> <!--echo htmlentities($enre["aquatique"]);-->
                            <td><?php echo htmlentities($enre["type_nourriture"]);?></td>
                            <td><button class="table-btn-delete" onclick="location.href = 'delete_especes.php?Id=<?php echo $enre["id"]; ?>'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                    </svg></button></td>
                        <tr style="height: 0px">
                            <td colspan="1000"><hr></td>
                        </tr>
                        <?php

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
</body>
</html>