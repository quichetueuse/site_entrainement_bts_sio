<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="tp1_php.css">
    <title>Ajout d'un ouvrage</title>

</head>

<script>

    function update_row()
    {
        tableau = document.getElementById("tableau_retour");
        row_index = tableau.rows.length -1;
        console.log(tableau.rows[1].cells[0].innerHTML)
        new_line = tableau.insertRow(row_index);
        //
        // console.log(new_line.id)
        cell_codeouvrage = new_line.insertCell(0);
        // cell_desc.className = "right_line desc";
        cell_titreouvrage = new_line.insertCell(1);
        // cell_quantite.className = "right_line qte";
        cell_coderayon = new_line.insertCell(2);
        // cell_prix.className = "right_line prx";
        // cell_total = new_line.insertCell(3);
        // cell_total.className = "right_line tt";
        //
        cell_codeouvrage.innerHTML = document.getElementById("code_ouvrage").value;
        console.log(document.getElementById("code_ouvrage").value)
        cell_titreouvrage.innerHTML = document.getElementById("titre_ouvrage").value;
        console.log(document.getElementById("titre_ouvrage").value)
        cell_coderayon.innerHTML = document.getElementById("rayon_ouvrage").value;
        console.log(document.getElementById("rayon_ouvrage").value)
        // cell_desc.innerHTML = "<input type='text' class='input_desc' value=''> ";
        // cell_desc.getElementsByClassName("input_desc")[0].value = document.getElementById("description").value;
        // cell_quantite.innerHTML = "<input type='number' class='input_qte'>";
    }

</script>



<body style="background-color: aquamarine">
<h1 style="font-size: 20px; font-weight: bold; color: red; text-align: center">Ajout d'un ouvrage</h1>
<form method="post" style="text-align: center">
    <h2>Code de l'ouvrage</h2>
    <input required type="text" name="code_ouvrage" placeholder="Entrez le code de l'ouvrage" class="input_ajout" id="code_ouvrage"><br>
    <h2>Titre de l'ouvrage</h2>
    <input required type="text" name="titre_ouvrage" placeholder="Entrez le titre de l'ouvrage" class="input_ajout" id="titre_ouvrage"><br>
    <h2>Rayon de l'ouvrage</h2>
    <select  required name="rayon_ouvrage" class="input_ajout" id="rayon_ouvrage">
        <option value="0">--Choississez un rayon--</option>

                <?php
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
                $i = 1;
                $all_rayon = array();
                while($enre = mysqli_fetch_array($resultat))
                {
                    array_push($all_rayon, $enre['CodeRayon']);
        //        header('Content-type: text/plain; charset=utf-8');
                    ?>
                    <option name="<?php $i?>"><?php echo utf8_encode($enre['CodeRayon'])?></option>

                    <?php
                    $i++;
        //        header('Content-type: text/html; charset=utf-8');
                }
                mysqli_close($conn)?>

    </select><br>
    <button class="ajout_ouvrage_btn" onclick="update_row()" name="button1">Ajouter l'ouvrage</button><br>
    <textarea readonly class="statut_requete" id="case_statut">Reussit</textarea>
    <table style="border: 1px solid blueviolet; text-align: center; margin-right: auto; margin-left: auto;" id="tableau_retour">
        <tr style="color: green; font-weight: bold; text-align: center"><td>CodeOuvrage</td><td>TitreOuvrage</td><td>CodeRayon</td></tr>
        <?php
        update_liste_ouvrage();?>
    </table>



    <?php
    if(array_key_exists('button1', $_POST)) {
        add_ouvrage();
    }

    function add_ouvrage()
    {
        try {
            $conn = mysqli_connect("localhost", "root", "", "bilbio_v2");
        }
        catch (Exception $e)
        {
            echo $e;
        }

        $code_ouvrage = $_POST['code_ouvrage'];

        $titre_ouvrage = $_POST['titre_ouvrage'];

        $code_rayon  = $_POST['rayon_ouvrage'];
        echo "<script type='text/javascript'>alert('êtes vous sur de vouloir ajouter l\'ouvrage <$titre_ouvrage>');</script>";

        $requete = "INSERT INTO ouvrage (CodeOuvrage, TitreOuvrage, CodeRayon) VALUES ('$code_ouvrage', '$titre_ouvrage', '$code_rayon')";

        if(mysqli_query($conn, $requete))
        {
            $resultat = mysqli_query($conn, $requete);
            echo "<script>
document.getElementById('case_statut').value = 'ajout reussit';
document.getElementById('case_statut').style.color = 'green';
</script>";
            //update_liste_ouvrage();
        }
        else
        {
            echo "<script>
document.getElementById('case_statut').value = 'ajout échoué';
document.getElementById('case_statut').style.color = 'red';
</script>";
        }
    }

    function update_liste_ouvrage()
    {
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
        while($enre = mysqli_fetch_array($resultat))
        {
//        header('Content-type: text/plain; charset=utf-8');
            ?>
    <tr style="border: 1px solid violet">
        <td style="border: 1px solid violet"><?php echo utf8_encode($enre["CodeOuvrage"]);?></td>
        <td style="border: 1px solid violet"><?php echo utf8_encode($enre["TitreOuvrage"]);?></td>
        <td style="border: 1px solid violet"><?php echo utf8_encode($enre["CodeRayon"]);?></td>
        <!--            <td style="border: 1px solid violet">--><?php //echo $enre["date_naissance"];?><!--</td>-->
        <!--            <td style="border: 1px solid violet">--><?php //echo $enre["section"];?><!--</td>-->
    </tr>
    <?php
    //        header('Content-type: text/html; charset=utf-8');
    }?>
    <?php mysqli_close($conn);
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
<!--    <select style="text-align: center; font-weight: bold; font-size: 15px;" name="choix_ouvrage">-->
<!--        <option value="0">--Choississez un ouvrage--</option>-->
<!--        --><?php
//        $i = 1;
//        while($enre = mysqli_fetch_array($resultat))
//        {
////        header('Content-type: text/plain; charset=utf-8');
//            ?>
<!--            <option name="--><?php //$i?><!--">--><?php //echo utf8_encode($enre['CodeRayon'])?><!--</option>-->
<!---->
<!--            --><?php
//            $i++;
////        header('Content-type: text/html; charset=utf-8');
//        }?>
<!--    </select>-->
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

    .ajout_ouvrage_btn
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
        margin: 10px;
    }

    .ajout_ouvrage_btn:hover
    {
        transform: scale(1.01);
        color: black;
        background-color: darkcyan;

    }


</style>

</body>
</html>

