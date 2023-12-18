<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>premiers pas</title>
</head>
<body style="background-color: aquamarine">
<?php
//phpinfo();
try {
    $conn = mysqli_connect("localhost", "root", "", "formation2_bd");
}
catch (Exception $e)
{
    echo $e;
}

//echo "<script>alert('Connexion reussit')</script>"
$requete = "SELECT * FROM Etudiants";
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
    <tr style="color: green; font-weight: bold;"><td>ID</td><td>Nom</td><td>Prenom</td><td>Date_naissance</td><td>Section</td></tr>
    <?php
    while($enre = mysqli_fetch_array($resultat))
    {
    ?>
            <tr style="border: 1px solid violet">
    <td style="border: 1px solid violet"><?php echo $enre["id_etudiant"];?></td>
    <td style="border: 1px solid violet"><?php echo $enre["nom"];?></td>
    <td style="border: 1px solid violet"><?php echo $enre["prenom"];?></td>
    <td style="border: 1px solid violet"><?php echo $enre["date_naissance"];?></td>
    <td style="border: 1px solid violet"><?php echo $enre["section"];?></td>
            </tr>
    <?php
    }?>
</table>


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

