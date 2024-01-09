<?php
//require "tp_login_v2.php";
//?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="tp_login_v2.css">
    <script src="tp_login_v2.js"></script>
    <title>Creation compte</title>
</head>
<body>
<div id="bg-image"></div>
<h1 id="titre">Creation d'un compte</h1>
<div class="container">
    <form method="post">
        <div class="combo-input-label">
            <label>Entrez votre e-mail</label>
            <input type="email" placeholder="e.g eliot.barrabes@yahoo.free" name="input_email">
        </div>
        <div class="combo-input-label">
            <label>Entrez votre mot de passe</label>
            <input type="password" id="input_password" name="input_password" placeholder="e.g banane03!">
            <label id="cb-show"><input type="checkbox" id="show-password" onclick="view_password()">   Affichez le mot de passe</label>
        </div>
        <div class="combo-input-label">
            <label id="label_long">Confirmez votre mot de passe</label>
            <input type="password" id="input_confirm_password" name="input_confirm_password" placeholder="e.g banane03!">
            <label id="cb-show"><input type="checkbox" id="show-confirm-password" onclick="view_password2()">   Affichez le mot de passe</label>
        </div>
        <div class="info">
            <p id="p-info"></p>
        </div>
        <div class="div-button">
            <button id="sign-in-btn" name="sign-in">Continuer</button>
        </div>
    </form>
</div>
<?php
if(array_key_exists("sign-in", $_POST)) {
    if(check_password() === true)
    {
        create_acc();
//        echo "WOOOOOOOOOOOOOOOOOOOOOOO";

    }
    else
    {
        return;
//        echo "POOP";
    }
//    check_password();
//    echo "<script> check_password()</script>";
//    echo "<script>document.getElementById('p-info').style.color = 'Blue';</script>";
}

function check_password()
{
    $special = array('/', '[', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', ']', '/', '?', '_');
    $input_psswd = $_POST['input_password'];
    $input_confirm_psswd = $_POST['input_confirm_password'];
//    print($input_psswd);
    $cptr_special = 0;
    $cptr_maj = 0;
    $cptr_min = 0;
    $cptr_num = 0;
    if ($input_psswd != $input_confirm_psswd)
    {
        echo "<script>
        document.getElementById('p-info').style.color = 'Red';
        document.getElementById('p-info').innerText = 'Les 2 mots de passe sont différents';</script>";
    }

//    $cptr_special = ($input_psswd.match(/is/g) || []).length;
//    preg_replace("/[^a-zA-Z]+/", "", $input_psswd, -1, $cptr_special);
    foreach (str_split($input_psswd) as $letter)
    {
        if (in_array($letter, $special))
        {
            $cptr_special++;
        }
        if (is_numeric($letter))
        {
            $cptr_num++;
        }
        if (ctype_upper($letter))
        {
            $cptr_maj++;
        }
        else if (ctype_lower($letter))
        {
            $cptr_min++;
        }
    }
//    echo "special : " . $cptr_special . " majuscule: " . $cptr_maj . " number: " . $cptr_num . " minuscule: " . $cptr_min;
    if( $cptr_special < 2 || $cptr_num < 2 || $cptr_maj < 2 || $cptr_min < 2 || strlen($input_psswd) < 13)
    {
        echo "<script>
        document.getElementById('p-info').style.color = 'Red';
        document.getElementById('p-info').innerText = 'mot de passe trop faible';</script>";
        return false;
    }
    else
    {
        echo "<script>document.getElementById('p-info').innerText = 'Boom boom boom boom';
        document.getElementById('p-info').style.color = 'Blue';</script>";
        return true;
    }
}

function create_acc()
{
    $email = $_POST['input_email'];
    $password = $_POST['input_password'];

    try {
        $conn = mysqli_connect("localhost", "root", "", "bd_user");
    }
    catch (Exception $e)
    {
        echo $e;
        return;
    }
//SELECT * FROM `access` WHERE Email='jean.kevin@gmx.com' AND Password='JeSuisUneCotelette01';
    $requete = "INSERT INTO access (Email, Password) VALUES ('$email', '$password')";
    if(mysqli_query($conn, $requete))
    {
        echo "<script>
        document.getElementById('p-info').style.color = 'Green';
        document.getElementById('p-info').innerText = 'creation du compte reussit';</script>";
    }
    else
    {
        echo "<script>console.log('Error')</script>";
        return;
    }
}


//?JeSuisUneBanane13?
?>
</body>
</html>
