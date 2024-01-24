
<?php
//require "tp_login_v2.php";
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
<div id="bg-image"></div>
<h1 id="titre">Base de données</h1>
<div class="div-session">Connecté en tant que <?php echo $_SESSION["email"] ?></div>
<div class="container">
    <form method="post">
        <div class="combo-input-label">
            <label>choississez votre individu</label>
            <select name="input_num" size="5" id="input_num">
                <option value="">--Choississez un ouvrage--</option>
                <?php
                //phpinfo();
                try {
                    $conn = mysqli_connect("localhost", "root", "", "bd_user");
                } catch (Exception $e) {
                    echo $e;
                }

                //echo "<script>alert('Connexion reussit')</script>"
                $requete = "SELECT * FROM `eleves`";
                if (mysqli_query($conn, $requete)) {
                    $resultat = mysqli_query($conn, $requete);
                } else {
                    echo "error";
                }


                $i = 1;
                while($enre = mysqli_fetch_array($resultat))
                {
//        header('Content-type: text/plain; charset=utf-8');
                    ?>
                    <option><?php echo "<a href='rechercher_ters.php?nom=" . $enre['Nom'] . "'>Wow</a>";?></option>

                    <?php
                    $i++;
//        header('Content-type: text/html; charset=utf-8');
                }?>
            </select>
        </div>
        <div class="info">
            <p id="p-info"></p>
        </div>
        <div class="div-button">
            <button id="validate" name="validate">Rechercher</button>
        </div>
    </form>
</div>
<?php
if(array_key_exists("validate", $_POST)) {
    rechercher_eleve();
//    check_password();
//    echo "<script> check_password()</script>";
//    echo "<script>document.getElementById('p-info').style.color = 'Blue';</script>";
}

function rechercher_eleve()
{
    echo "<script>document.getElementById('input_num').value;</script>";
    $nom = $_POST['input_num'];
//    header("rechercher_ters.php?nom=");
    echo "<script>window.location.href = 'rechercher_ters.php?nom=' . $nom . '';</script>";
}?>
</body>
</html>

<?php
//
////phpinfo();
//try {
//    $conn = mysqli_connect("localhost", "root", "", "bd_user");
//}
//catch (Exception $e)
//{
//    echo $e;
//}
//
////echo "<script>alert('Connexion reussit')</script>"
//$requete = "SELECT * FROM `eleves`";
//if(mysqli_query($conn, $requete))
//{
//    $resultat = mysqli_query($conn, $requete);
//}
//else
//{
//    echo "error";
//}
//?>
<!--<select style="text-align: center; font-weight: bold; font-size: 15px;" class="center" size="10">-->
<!--    <option value="">--Choississez un ouvrage--</option>-->
<!--    --><?php
//    $i = 1;
//    while($enre = mysqli_fetch_array($resultat))
//    {
////        header('Content-type: text/plain; charset=utf-8');
//        ?>
<!--        <option>--><?php //echo utf8_encode($enre['Nom'])?><!--</option>-->
<!---->
<!--        --><?php
//        $i++;
////        header('Content-type: text/html; charset=utf-8');
//    }?>
<!--</select>-->
<?php //mysqli_close($conn)?>
<!---->
<!---->
<!--<style>-->
<!---->
<!--    .container {-->
<!--        height: 200px;-->
<!--        position: relative;-->
<!--        border: 3px solid green;-->
<!--    }-->
<!---->
<!--    .center {-->
<!--        margin: 0;-->
<!--        position: absolute;-->
<!--        top: 50%;-->
<!--        left: 50%;-->
<!--        -ms-transform: translate(-50%, -50%);-->
<!--        transform: translate(-50%, -50%);-->
<!--        transition: 0.3s ease-in-out;-->
<!--        border-radius: 10px;-->
<!--    }-->
<!---->
<!---->
<!--</style>-->

</body>
</html>


