<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste ouvrage 2</title>

</head>
<body style="background-color: aquamarine">
<h1 style="font-size: 20px; font-weight: bold; color: red;"></h1>
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
        $content ='';
        $content .= $i .': ' . $enre["CodeOuvrage"] .', '. $enre["TitreOuvrage"] .', '. $enre["CodeRayon"] . ';'?>

        <p style="text-align: center; font-weight: bold; font-size: 15px">
            <?php echo utf8_encode($content)?>
        </p>

        <?php
        $i++;
//        header('Content-type: text/html; charset=utf-8');
    }?>
<?php mysqli_close($conn)?>
</body>
</html>

