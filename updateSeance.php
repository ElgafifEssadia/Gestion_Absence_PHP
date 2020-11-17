<?php
session_start();
ob_start();

include_once "layout/head.php";
?>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">


        <?php  include "layout/menuLeft.php"; ?>

        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <?php
			if(isset($_GET["id"]))
			{
				include "inludes/config.php";
				$id=$_GET["id"];
				$sql="select * from module ";
                $res=mysqli_query($con,$sql);
				
                
                $sql1="select * from seance where idSeance=".$id;
                $res5=mysqli_query($con,$sql1);
				$row1=mysqli_fetch_array($res5);
			}	
				
            ?>





            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Modifier Filiére</h4>
								
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label"></label>
                                    <div class="col-sm-9">
                                        <input type="hidden"  class="form-control" id="id" value="<?php echo $row1['idSeance'] ;?>" name="id" placeholder="Saisir Horaire">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Module</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="option1" >
                                        <?php while($row=mysqli_fetch_array($res)){?>
                                        <option value="<?php echo $row['idModule'] ;?>"><?php echo $row["descriptionM"] ;?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>

								
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Heure Debut</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" value="<?php echo $row1['heureDebut'] ;?>" name="debut" placeholder="saisir heure debut">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Heure fin</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lname" value="<?php echo $row1['heureFin'] ;?>" name="fin" placeholder="Saisir heure fin">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Type de séance</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lname" value="<?php echo $row1['typeSeance'] ;?>" name="typ" placeholder="Saisir Type de seance">
                                    </div>
                                </div>

                                
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary" name="valider">Valider</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <?php
			
            if(isset($_GET["valider"]))
            {
				$idd=$_GET["id"];
				$mod=$_GET["option1"];
                $debut=$_GET["debut"];
                $fin=$_GET["fin"];
                $typ=$_GET["typ"];
                
                $sql2='update seance set idModule="'.$mod.'",heureDebut="'.$debut.'",heureFin="'.$fin.'",typeSeance="'.$typ.'" where idSeance="'.$id.'"';                
				$res2=mysqli_query($con,$sql2);
                if($res2)
                {
                    header("Location:seance.php");
                }

            }
            ?>





        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>


<?php

include "layout/footer.php";
ob_end_flush();

?>