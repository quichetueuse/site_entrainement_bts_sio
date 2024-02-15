<?php
global $conn;
try {
    @include("connecte.php");
}
catch (Exception $e)
{
    echo $e;
}

$num = $_GET["num"];
//echo "<script>alert('Connexion reussit')</script>"
$requete = "DELETE FROM eleves WHERE Num='$num'";
if(mysqli_query($conn, $requete))
{
    $resultat = mysqli_query($conn, $requete);
}
else
{

    echo "error";
}
?>