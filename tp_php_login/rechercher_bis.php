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
$requete = "SELECT * FROM eleves WHERE Num='$num'";
if(mysqli_query($conn, $requete))
{
    $resultat = mysqli_query($conn, $requete);
    ?>
        <form method="post">
    <table class="center container" style="border: 1px solid blueviolet;">
    <tr style="color: green; font-weight: bold; text-align: center"><td>Num</td><td>Nom</td><td>Adresse</td><td>Tel</td></tr>
    <?php
    while($enre = mysqli_fetch_array($resultat))
    {
//        header('Content-type: text/plain; charset=utf-8');
        ?>
        <tr style="border: 1px solid violet">

            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><input readonly type="text" name="text_num" value='<?php echo utf8_encode($enre["Num"]);?>'></td>
            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><input type="text" name="text_nom" value='<?php echo utf8_encode($enre["Nom"]);?>'></td>
            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><input type="text" name="text_adresse" value='<?php echo utf8_encode($enre["Adresse"]);?>'></td>
            <td style="border: 1px solid violet" id=<?php $enre['Num']?>><input type="text" name="text_tel" value='<?php echo utf8_encode($enre["Tel"]);?>'></td>
        </tr>
        <?php
//        header('Content-type: text/html; charset=utf-8');
    }?>
    <?php mysqli_close($conn)?>
</table>
<?php
}
else
{

    echo "error";
}

?>

<button name="btn_update">Update</button>
</form>
<a href="success.php" style="text-align: center; display: flex; justify-content: center">Retour</a>

<?php

if(isset($_POST['btn_update']))
{

    $num = $_POST['text_num'];
    $nom = $_POST['text_nom'];
    $adresse = $_POST['text_adresse'];
    $tel = $_POST['text_tel'];

    @include "connecte.php";
    $requete = "UPDATE eleves SET Nom='$nom', Adresse='$adresse', Tel='$tel' WHERE Num='$num'";
    $resultat = mysqli_query($conn, $requete);
    if($resultat)
    {
        echo "Success";
//        echo "<script>
//        document.getElementById('label-info').style.color = 'Green';
//        document.getElementById('label-info').innerText = 'modifications appliquées';</script>";

    }
    else
    {
//        echo "<script>
//        document.getElementById('label-info').style.color = 'Red';
//        document.getElementById('label-info').innerText = 'échec';</script>";
        echo "error";

    }

}


?>



