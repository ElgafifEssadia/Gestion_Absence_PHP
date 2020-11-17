<?php
include "config.php";
$id=$_POST["id"];
$descri=$_POST["descri"];
$hor=$_POST["hor"];
$filiere=$_POST["filiere"];


$sql="update module set descriptionM='".$descri."',horaire=".$hor.",idFiliere=".$filiere." where idModule=".$id;
$res=mysqli_query($con,$sql);
if($res)
{
	echo "Modification Effectuee avec success";
}
else
{
	echo "Modification non Fait";
}
?>