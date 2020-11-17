<?php
include "config.php";
$id=$_POST["id"];
$sql="delete from module where idModule=".$id;
$res=mysqli_query($con,$sql);
if($res)
{
	echo "Suppression Faite";
}
else
{
	echo "Suppression non Faite";
}
?>