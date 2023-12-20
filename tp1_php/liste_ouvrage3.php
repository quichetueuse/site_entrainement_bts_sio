<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste ouvrage 3</title>

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
<select style="text-align: center; font-weight: bold; font-size: 15px;" class="center">
    <option value="">--Choississez un ouvrage--</option>
<?php
$i = 1;
while($enre = mysqli_fetch_array($resultat))
{
//        header('Content-type: text/plain; charset=utf-8');
    ?>
    <option><?php echo utf8_encode($enre['TitreOuvrage'])?></option>

<?php
    $i++;
//        header('Content-type: text/html; charset=utf-8');
}?>
</select>
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
        border-radius: 10px;
    }


</style>

</body>
</html>

