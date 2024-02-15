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
    <link rel="stylesheet" href="style_employes_summary.css">
</head>
<body style="margin: 0; padding: 0; background-color: #ebe4f0;">

<div class="container">
    <!--    <div class="container2">-->
    <div class="div-stats">
        <div class="small_container">
            <label style="margin">Employés</label>
            <hr>
            <label id="nombre-directeurs" style="font-size: 26px;">
                <?php
                //                echo "<script>console.log('>OOOOOOOO')</script>";
                include("../connexion_bd.php");
                //                $conn = mysqli_connect("localhost", "root", "", "zoo");
                $requete = "SELECT count(*) AS nbre_employes FROM `personnels` WHERE fonction='Employes'";
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
                    echo $enre['nbre_employes'];
                }
                ?>
            </label>
        </div>
        <div class="small_container">
            <label>Directeurs</label>
            <hr>
            <label id="nombre-employes" style="font-size: 26px;">
                <?php
                $requete = "SELECT count(*) AS nbre_directeurs FROM `personnels` WHERE fonction='Directeur'";
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
                    echo $enre['nbre_directeurs'];
                }
                ?>
            </label>
        </div>
    </div>
    <!--    -->
    <div class="container2">
        <div class="div-animaux-table">
            <div style="display: flex; flex-direction: row; justify-content: space-between;">
                <label>Liste du personnels</label>
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

                        <th>Prénom</th>
                        <th>Date de naissance</th>

                        <th>identifiant</th>
                        <th>Mot de passe</th>

                        <th>Salaire (€)</th>
                        <th>Sexe</th>

                        <th>Fonction</th>
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

                    $requete = "SELECT * FROM `personnels`";
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
                            <td><?php echo htmlentities($enre["nom"]);?></td>
                            <td><?php echo htmlentities($enre["prenom"]);?></td>
                            <td><?php echo htmlentities($enre["date_naissance"]);?></td>
                            <td><?php echo htmlentities($enre["login"]);?></td>
                            <td><?php echo htmlentities($enre["password"]);?></td>
                            <td><?php echo htmlentities($enre["salaire"]);?></td>
                            <td><?php echo htmlentities($enre["sexe"]);?></td>
                            <td><?php echo htmlentities($enre["fonction"]);?></td>
                            <td><button class="table-btn-delete" onclick="location.href = 'delete_employes.php?Id=<?php echo $enre["id"]; ?>'"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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