<?php
global $conn;
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>premiers pas</title>
    <link rel="stylesheet" href="style_session.css">

</head>
<body style="background-color: aquamarine">
<div class="div-session">Connecté en tant que <?php echo $_SESSION["email"] ?></div>
<?php

//phpinfo();
try {
    @include("connecte.php");
}
catch (Exception $e)
{
    echo $e;
}

//echo "<script>alert('Connexion reussit')</script>"
$requete = "SELECT * FROM `eleves`";
if(mysqli_query($conn, $requete))
{
    $resultat = mysqli_query($conn, $requete);
}
else
{
    echo "error";
}
?>

<table class="center container" style="border: 1px solid blueviolet;">
    <tr style="color: green; font-weight: bold; text-align: center"><td>Nom</td><td>Suppression</td><td>Recherches avancées</td></tr>
    <?php
    while($enre = mysqli_fetch_array($resultat))
    {
//        header('Content-type: text/plain; charset=utf-8');
        ?>
        <tr style="border: 1px solid violet">
            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><?php echo utf8_encode($enre["Nom"]);?></td>
            <td style="border: 1px solid violet"><?php echo "<a href='delete.php?num=" . $enre['Num'] . "'>Supprimer</a>";?></td>
            <td style="border: 1px solid violet"><?php echo "<a href='rechercher_bis.php?num=" . $enre['Num'] . "'>Recherche</a>";?></td>
        </tr>
        <?php
//        header('Content-type: text/html; charset=utf-8');
    }?>
    <?php mysqli_close($conn)?>
</table>
<a href="success.php" style="text-align: center; display: flex; justify-content: center">Retour</a>

<style>

    .container {
        height: 200px;
        position: relative;
        border: 3px solid green;
    }

    .center {
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
</style>

</body>

</html>

