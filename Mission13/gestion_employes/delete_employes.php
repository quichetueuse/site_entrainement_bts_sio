<?php
//try {
//    $conn = mysqli_connect("localhost", "root", "", "zoo");
//}
//catch (Exception $e)
//{
//    echo $e;
//}
include ("../connexion_bd.php");
$id = $_GET["Id"];
//echo "<script>alert('Connexion reussit')</script>"
$requete = "DELETE FROM personnels WHERE id='$id'";
if(mysqli_query($conn, $requete))
{
//    echo "success";
    $resultat = mysqli_query($conn, $requete);
//    header("location: page_animaux_summary.php");
//    header("location:javascript://history.go(-1)");
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else
{

    echo "<script>console.log('error during msqli_query');</script>";
}
?>