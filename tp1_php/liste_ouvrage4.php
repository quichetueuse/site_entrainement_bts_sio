<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste ouvrage 4</title>

</head>
<body style="background-color: aquamarine">
<h1 style="font-size: 25px; font-weight: bold; color: red; text-align: center">Affichage des ouvrages</h1>
<div style="text-align: center">
<div class="ouvrage_container">
    <h2 class="ouvrage_titre">TEST</h2>
<br>
    <p>
        <span style="text-align: left; color: white">Code ouvrage: </span><span style="font-weight: bold">Livre 111</span><br>
        <span style="text-align: left; color: white">Rayon: </span><span style="font-weight: bold">Y13</span>
    </p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <button class="ouvrage_btn">Plus de détail</button>
</div>
<?php

//phpinfo();
try {
    $conn = mysqli_connect("localhost", "root", "", "bilbio_v2");
}
catch (Exception $e)
{
    echo $e;
}

//echo "<script>alert('Connexion reussit')</script>"
$requete = "SELECT * FROM `ouvrage`";
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
            <h2 class="ouvrage_titre"><?php echo utf8_encode($enre['TitreOuvrage'])?></h2>
            <br>
            <p>
                <span style="text-align: left; color: white">Code ouvrage: </span><span style="font-weight: bold"><?php echo utf8_encode($enre['CodeOuvrage'])?></span><br>
                <span style="text-align: left; color: white">Rayon: </span><span style="font-weight: bold"><?php echo utf8_encode($enre['CodeRayon'])?></span>
            </p>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <button class="ouvrage_btn">Plus de détail</button>
        </div>
        <?php
        $i++;
//        header('Content-type: text/html; charset=utf-8');
    }?>
</div>
<?php mysqli_close($conn)?>


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
        transition: 0.3s ease-in-out;
    }

    .ouvrage_container
    {
        float: left;
        border-radius: 10px;
        border: 1px solid white;
        background-color: darkslategray;
        width: 15%;
        height: 300px;
        text-align: center;
        margin: 5px;
    }

    .ouvrage_btn
    {
        background-color: #3498db;
        color: white;
        font-weight: bold;
        border: 1px solid white;
        border-radius: 10px;
        transition: 0.3s ease-in-out;
        width: 90%;
        height: 50px;
    }

    .ouvrage_btn:hover
    {
        transform: scale(1.01);
        color: black;
        background-color: darkcyan;

    }

    .ouvrage_titre
    {
        color: white;
        font-size: 15px;
    }


</style>

</body>
</html>

