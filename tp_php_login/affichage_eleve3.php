
<?php
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
    $conn = mysqli_connect("localhost", "root", "", "bd_user");
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
    <tr style="color: green; font-weight: bold; text-align: center"><td>Num</td><td>Nom</td><td>Adresse</td><td>Tel</td><td>Suppression</td></tr>
    <?php
    while($enre = mysqli_fetch_array($resultat))
    {
//        header('Content-type: text/plain; charset=utf-8');
        ?>
        <tr style="border: 1px solid violet">
            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><?php echo utf8_encode($enre["Num"]);?></td>
            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><?php echo utf8_encode($enre["Nom"]);?></td>
            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><?php echo utf8_encode($enre["Adresse"]);?></td>
            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><?php echo utf8_encode($enre["Tel"]);?></td>
            <td style="border: 1px solid violet"><?php echo "<a href='delete.php?num=" . $enre['Num'] . "'>Supprimer</a>";?></td>
            <!--            <td style="border: 1px solid violet">--><?php //echo $enre["date_naissance"];?><!--</td>-->
            <!--            <td style="border: 1px solid violet">--><?php //echo $enre["section"];?><!--</td>-->
        </tr>
        <?php
//        header('Content-type: text/html; charset=utf-8');
    }?>
    <?php mysqli_close($conn)?>
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

