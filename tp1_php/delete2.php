<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Liste ouvrage 3</title>

</head>

<body style="background-color: aquamarine">
<h1 style="font-size: 20px; font-weight: bold; color: red; text-align: center">Suppréssion d'un ouvrage via son code</h1>
<form method="post">
    <button class="ouvrage_btn" onclick="delete_ouvrage()" name="button1">Supprimer cet ouvrage</button>



<?php
if(array_key_exists('button1', $_POST)) {
    delete_ouvrage();
    echo "bouton préssé";
}

function delete_ouvrage()
{
    try {
        $conn = mysqli_connect("localhost", "root", "", "bilbio_v2");
    }
    catch (Exception $e)
    {
        echo $e;
    }
    $code_ouvrage = $_POST['choix_ouvrage'];
    echo "this is $code_ouvrage";
    $requete = "DELETE FROM ouvrage WHERE `CodeOuvrage`= '$code_ouvrage'";
    if(mysqli_query($conn, $requete))
    {
        $resultat = mysqli_query($conn, $requete);
        echo "suppréssion reussit";
    }
    else
    {
        echo "error";
    }


}
?>

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
<select style="text-align: center; font-weight: bold; font-size: 15px;" class="center" name="choix_ouvrage">
    <option value="0">--Choississez un ouvrage--</option>
    <?php
    $i = 1;
    while($enre = mysqli_fetch_array($resultat))
    {
//        header('Content-type: text/plain; charset=utf-8');
        ?>
        <option name="<?php $i?>"><?php echo utf8_encode($enre['CodeOuvrage'])?></option>

        <?php
        $i++;
//        header('Content-type: text/html; charset=utf-8');
    }?>
</select>
</form>
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

    .ouvrage_btn
    {
        background-color: #3498db;
        color: white;
        font-weight: bold;
        border: 1px solid white;
        border-radius: 10px;
        transition: 0.3s ease-in-out;
        width: 125px;
        height: 50px;
        text-align: center;
    }

    .ouvrage_btn:hover
    {
        transform: scale(1.01);
        color: black;
        background-color: darkcyan;

    }


</style>

</body>
</html>

