<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "bd_user");
}
catch (Exception $e)
{
    echo $e;
}

$nom = $_GET["nom"];
//echo "<script>alert('Connexion reussit')</script>"
$requete = "SELECT * FROM eleves WHERE Nom='$nom'";
if(mysqli_query($conn, $requete))
{
    $resultat = mysqli_query($conn, $requete);
    ?>
    <div id="container-tableau">
        <h1 style="text-align: center">Affichage des information concernant l'individu <?php echo $nom ?></h1>
    <table class="center container" style="border: 1px solid blueviolet;">
        <tr style="color: green; font-weight: bold; text-align: center"><td>Num</td><td>Nom</td><td>Adresse</td><td>Tel</td></tr>
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
            </tr>
            <?php
//        header('Content-type: text/html; charset=utf-8');
        }?>
        <?php mysqli_close($conn)?>
    </table>
    </div>
    <?php
}
else
{

    echo "error";
}

?>

<style>

    #container-tableau
    {
        display: flex;
        justify-content: center;
        flex-direction: column;
    }

</style>

