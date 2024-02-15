
<?php
global $conn;
//require "index.php";
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
        <div>
            <a href="success.php" style="text-align: center; display: flex; justify-content: center">Retour</a>
        </div>
        <div class="div-button">
            <button id="validate" name="validate">Supprimer</button>
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
    global $conn;
    $num = $_POST['input_num'];


    echo "num : " . $num;
    try {
        @include("connecte.php");
    }
    catch (Exception $e)
    {
        echo $e;
        return;
    }
//SELECT * FROM `access` WHERE Email='jean.kevin@gmx.com' AND Password='JeSuisUneCotelette01';
    $requete = "DELETE FROM eleves WHERE Num='$num'";
    if(mysqli_query($conn, $requete))
    {
        echo "<script>document.getElementById('p-info').style.color = 'Green';</script>";
        echo "<script>document.getElementById('p-info').innerHTML = 'Suppréssion de l\'élève reussit';</script>";

    }
    else
    {
        echo "<script>console.log('Error')</script>";
        return;
    }
}?>
</body>
</html>
