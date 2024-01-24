
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste ouvrage 4</title>
    <link rel="stylesheet" href="style_session.css">
    <link rel="stylesheet" href="style_affichage4.css">

</head>
<body style="background-color: aquamarine">
<h1 style="font-size: 25px; font-weight: bold; color: red; text-align: center">Affichage des élèves</h1>
<div class="div-session">Connecté en tant que <?php echo $_SESSION["email"] ?></div>
<div style="text-align: center" id="big-container">
<!--        <h2 class="ouvrage_titre">TEST</h2>-->
<!--        <br>-->
<!--        <p>-->
<!--            <span style="text-align: left; color: white">Code ouvrage: </span><span style="font-weight: bold">Livre 111</span><br>-->
<!--            <span style="text-align: left; color: white">Rayon: </span><span style="font-weight: bold">Y13</span>-->
<!--    </div>-->
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
    <?php
    $i = 1;
    while($enre = mysqli_fetch_array($resultat))
    {
//        header('Content-type: text/plain; charset=utf-8');
        ?>
        <div class="ouvrage_container">
            <h2 class="ouvrage_titre"><?php echo utf8_encode($enre['Nom'])?></h2>
            <br>
            <div>
            <span style="text-align: left; color: white">Num: </span><span style="font-weight: bold"><?php echo utf8_encode($enre['Num'])?></span></div>
            <div>
            <span style="text-align: left; color: white">Adresse: </span><span style="font-weight: bold"><?php echo utf8_encode($enre['Adresse'])?></span></div>
            <div>
            <span style="text-align: left; color: white">Tel: </span><span style="font-weight: bold"><?php echo utf8_encode($enre['Tel'])?></span></div>

        </div>
        <?php
        $i++;
//        header('Content-type: text/html; charset=utf-8');
    }?>
</div>
<?php mysqli_close($conn)?>



</body>
</html>

