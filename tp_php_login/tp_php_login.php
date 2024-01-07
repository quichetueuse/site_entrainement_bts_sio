<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Page de connexion</title>
    <link rel="stylesheet" href="tp_php_login.css">
    <script src="tp_php_login.js"></script>

</head>
<body style="padding: 0;">
<h1 class="big_title">Page de connexion</h1>
<form method="post">
    <div class="container">
        <div class="container2">
            <label class="small_label">Your E-mail</label>
            <br>
            <input type="text" required id="input_email" class="input_login" name="input_email" placeholder="ex: jesuisune.crevette@free">
            <br>
            <label class="small_label">Your Password</label>
            <br>
            <input type="password" required id="input_password" class="input_login" name="input_password" placeholder="ex: gr00vyD0mi0s__">
            <br>
            <label><input type="checkbox" onclick="view_password()" placeholder="Show Password">Show Password</label>
            <br>
            <button id="btn_login" name="btn_login">Sign In</button>
            <br>
            <div id="div_link">
            <a class="redirect_link" id="no_account" href="">Don't have an account?</a>
            <a class="redirect_link" id="forgot_password" href="">Forgot password?</a>
            </div>
        </div>
    </div>
</form>


<script>
    function view_password() {
        var input_p = document.getElementById("input_password");
        if (input_p.type === "password") {
            input_p.type = "text";
        } else {
            input_p.type = "password";
        }
    }
</script>


<?php
    if(array_key_exists('btn_login', $_POST)) {
        verify_login();
    }


    function verify_login()
    {

        $email = $_POST['input_email'];
        $password = $_POST['input_password'];
//        echo $email . "  |  " . $password . "------------------";
//        echo "<script>console.log($email + ' | ' + $password)</script>";

        try {
            $conn = mysqli_connect("localhost", "root", "", "bd_user");
        }
        catch (Exception $e)
        {
            echo $e;
            return;
        }
//SELECT * FROM `access` WHERE Email='jean.kevin@gmx.com' AND Password='JeSuisUneCotelette01';
        $requete = "SELECT * FROM `access` WHERE Email='$email' AND Password='$password'";
        if(mysqli_query($conn, $requete))
        {
            $resultat = mysqli_query($conn, $requete);
            if(mysqli_num_rows($resultat) == 0)
            {
                echo "<script>console.log('aucuns individus avec cette email/mdp dans cette base de données')</script>";
            }
            else
            {
                echo "<script>console.log('connexion reussit!!!')</script>";
            }
        }
        else
        {
            echo "<script>console.log('Error')</script>";
            return;
        }
//        if (empty($resultat))
//        {
//            echo "votre adresse e-mail n'est pas dans la base de donnée du site, veuillez creer un compte";
//            return;
//        }
//        echo $resultat[0]["Email"] . "  |  " . $resultat[0]['Password'];
//        while($enre = mysqli_fetch_array($resultat))
//        {
//            echo $enre["Email"] . "  |  " . $enre['Password'];
//            if(($enre["Email"] == $email && $enre['Password'] == $password))
//            {
//                echo "connexion reussit!";
//                return;
//            }
//        }
    }?>
<!--    --><?php
//
//    //phpinfo();
//    try {
//        $conn = mysqli_connect("localhost", "root", "", "bilbio_v2");
//    }
//    catch (Exception $e)
//    {
//        echo $e;
//    }
//
//    //echo "<script>alert('Connexion reussit')</script>"
//    $requete = "SELECT * FROM `ouvrage`";
//    if(mysqli_query($conn, $requete))
//    {
//        $resultat = mysqli_query($conn, $requete);
//    }
//    else
//    {
//        echo "error";
//    }
//    ?>
<!--    --><?php
//    $i = 1;
//    while($enre = mysqli_fetch_array($resultat))
//    {
////        header('Content-type: text/plain; charset=utf-8');
//        ?>
<!--        --><?php
//        $i++;
////        header('Content-type: text/html; charset=utf-8');
//    }?>
<!--</div>-->
<?php //mysqli_close($conn)?>


<!--<style>-->
<!---->
<!---->
<!---->
<!---->
<!--    .center {-->
<!--        margin: 0;-->
<!--        position: absolute;-->
<!--        top: 50%;-->
<!--        left: 50%;-->
<!--        -ms-transform: translate(-50%, -50%);-->
<!--        transform: translate(-50%, -50%);-->
<!--        transition: 0.3s ease-in-out;-->
<!--    }-->
<!---->
<!--    .ouvrage_container-->
<!--    {-->
<!--        float: left;-->
<!--        border-radius: 10px;-->
<!--        border: 1px solid white;-->
<!--        background-color: darkslategray;-->
<!--        width: 15%;-->
<!--        height: 300px;-->
<!--        text-align: center;-->
<!--        margin: 5px;-->
<!--    }-->
<!---->
<!--    .ouvrage_btn-->
<!--    {-->
<!--        background-color: #3498db;-->
<!--        color: white;-->
<!--        font-weight: bold;-->
<!--        border: 1px solid white;-->
<!--        border-radius: 10px;-->
<!--        transition: 0.3s ease-in-out;-->
<!--        width: 90%;-->
<!--        height: 50px;-->
<!--    }-->
<!---->
<!--    .ouvrage_btn:hover-->
<!--    {-->
<!--        transform: scale(1.01);-->
<!--        color: black;-->
<!--        background-color: darkcyan;-->
<!---->
<!--    }-->
<!---->
<!--    .ouvrage_titre-->
<!--    {-->
<!--        color: white;-->
<!--        font-size: 15px;-->
<!--    }-->
<!---->
<!---->
<!--</style>-->

</body>
</html>

