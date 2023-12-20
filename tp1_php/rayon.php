<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste Rayons</title>

</head>
<body style="background-color: aquamarine">
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
$requete = "SELECT * FROM `rayons`";
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
    <tr style="color: green; font-weight: bold; text-align: center"><td>CodeRayon</td><td>IntituleRayon</td></tr>
    <?php
    while($enre = mysqli_fetch_array($resultat))
    {
//        header('Content-type: text/plain; charset=utf-8');
        ?>
        <tr style="border: 1px solid violet">
            <td style="border: 1px solid violet"><?php echo $enre["CodeRayon"];?></td>
            <td style="border: 1px solid violet"><?php echo $enre["IntituleRayon"];?></td>
<!--            <td style="border: 1px solid violet">--><?php //echo $enre["CodeRayon"];?><!--</td>-->
            <!--            <td style="border: 1px solid violet">--><?php //echo $enre["date_naissance"];?><!--</td>-->
            <!--            <td style="border: 1px solid violet">--><?php //echo $enre["section"];?><!--</td>-->
        </tr>
        <?php
//        header('Content-type: text/html; charset=utf-8');
    }?>
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

