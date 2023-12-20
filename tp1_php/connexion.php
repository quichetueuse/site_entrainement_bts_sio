<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "bilbio_v2");
    echo "<body style='background-color: green'><br><p style='text-align: center; color: white;font-weight: bold; font-size: 20px'>connexion reussit</p></body>";
}
catch (Exception $e)
{
    echo "<body style='background-color: red'><br><p style='text-align: center; color: white;font-weight: bold; font-size: 20px'>$e</p></body>";
    echo $e;
}
?>
