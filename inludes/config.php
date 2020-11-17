<?php
$host="localhost";
$user="root";
$pwd="";
$db="gestion_absence";
$con=mysqli_connect($host,$user,$pwd,$db);
if(!$con)
{
    die("Probléme de Connexion : ".mysqli_connect_error());
}
?>