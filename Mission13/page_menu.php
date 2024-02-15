<?php
//require "index.php";
    session_start();
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Authentification</title>
</head>
<body id="body-menu">
<div id="bg-image"></div>
<header id="header_menu">
    <div id="div-photo">
        <img id="photo-zoo" src="Assets/logo-zoo.png">
    </div>
    <h1 id="titre_header">ZOO</h1>
    <button class="menu-btn" id="btn-admin" onclick="document.location.href = 'gestion_employes/page_gestion_employes.php'">DashBoard Employés</button>
    <button class="menu-btn" onclick="document.location.href ='gestion_animaux/page_gestion_animaux.php';">DashBoard Animaux</button>
    <button class="menu-btn" onclick="document.location.href ='gestion_especes/page_gestion_especes.php';">DashBoard Especes</button>
    <button class="menu-btn">Contact</button>
    <form method="post">
    <button id="disconnect" name="disconnect" onclick="disconnect();">Déconnexion</button>
    </form>
</header>
<h1 id="titre">Bienvenue <?php echo (array_key_exists("prenom", $_SESSION)) ? $_SESSION["prenom"] : "" ?></h1>
</body>

<?php
if ($_SESSION['fonction'] == 'Directeur') //$_SESSION['fonction']
{
    echo '<script>
        document.getElementById("btn-admin").style.visibility = "visible";
        document.getElementById("btn-admin").style.display = "block";
    </script>';
}
else
{
    echo '<script>
        document.getElementById("btn-admin").style.visibility = "hidden";
        document.getElementById("btn-admin").style.display = "none";
</script>';
}

if(array_key_exists('disconnect', $_POST))
{
    session_unset();
    session_destroy();
    header('location: page_auth.php');
}
?>
</html>


