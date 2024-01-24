
<?php
//require "tp_login_v2.php";
session_start();
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="tp_login_v2.css">
    <link rel="stylesheet" href="style_session.css">
    <script src="tp_login_v2.js"></script>
    <title>Ma page</title>
</head>
<body>
<div class="div-session">Connecté en tant que <?php echo $_SESSION["email"] ?></div>
<div id="bg-image"></div>
<h1 id="titre">Base de données</h1>
<div class="container">
    <form method="post">
        <div class="combo-input-label">
            <label>Entrez votre identifiant</label>
            <input type="text" placeholder="e.g JtE3" name="input_num">
        </div>
        <div class="info">
            <p id="p-info"></p>
        </div>
        <div class="div-button">
            <button id="validate" name="validate">Rechercher</button>
        </div>
    </form>
</div>

<?php
if(array_key_exists("validate", $_POST)) {
    delete_eleve();
//    check_password();
//    echo "<script> check_password()</script>";
//    echo "<script>document.getElementById('p-info').style.color = 'Blue';</script>";
}

function delete_eleve()
{
    $num = $_POST['input_num'];


    echo "num : " . $num;
    try {
        $conn = mysqli_connect("localhost", "root", "", "bd_user");
    }
    catch (Exception $e)
    {
        echo $e;
        return;
    }
//SELECT * FROM `access` WHERE Email='jean.kevin@gmx.com' AND Password='JeSuisUneCotelette01';
    $requete = "SELECT * FROM eleves WHERE Num='$num'";
    if(mysqli_query($conn, $requete))
    {
        $resultat = mysqli_query($conn, $requete);
        $enre = mysqli_fetch_array($resultat);
        ?>
<table class="center container" style="border: 1px solid blueviolet;">
    <tr style="color: green; font-weight: bold; text-align: center"><td>Num</td><td>Nom</td><td>Adresse</td><td>Tel</td></tr>
    <td style="border: 1px solid violet"><?php echo utf8_encode($enre["Num"]);?></td>
    <td style="border: 1px solid violet"><?php echo utf8_encode($enre["Nom"]);?></td>
    <td style="border: 1px solid violet"><?php echo utf8_encode($enre["Adresse"]);?></td>
    <td style="border: 1px solid violet"><?php echo utf8_encode($enre["Tel"]);?></td>
    <?php
//        $num = $enre['Num'];
//        $nom = $enre['Nom'];
//        $adresse = $enre['Adresse'];
//        $tel = $enre['Tel'];

//        echo "<script>document.getElementById('p-info').style.color = 'Green';</script>";
//        echo "<script>document.getElementById('p-info').innerHTML = 'Nom: $nom | Num: $num | adresse: $adresse | Tel:  $tel';</script>";
//        echo "nickel ca" . $enre['Adresse'];
    }
    else
    {
//        echo "<script>console.log('Error')</script>";
        echo "c'est op";
        return;
    }
}?>
</body>
</html>
