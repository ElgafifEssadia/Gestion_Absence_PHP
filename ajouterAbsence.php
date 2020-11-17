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
            include "inludes/config.php";
            $sql="select * from seance ";
            $res=mysqli_query($con,$sql);
			
			$sql1="select * from etudiant ";
            $res1=mysqli_query($con,$sql1);
            ?>





            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Marquer absence</h4>
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Etudiant</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="option1" >
                                        <?php while($row1=mysqli_fetch_array($res1)){?>
                                        <option value="<?php echo $row1['IDEtudiant'] ;?>"><?php echo $row1["nom"]." ".$row1["prenom"] ;?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Seance</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="option2" >
                                        <?php while($row=mysqli_fetch_array($res)){?>
                                        <option value="<?php echo $row['idSeance'] ;?>"><?php echo $row["typeSeance"];?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Justification</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="jus" placeholder="Justification">
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
                $seance=$_GET["option2"];
				$etud=$_GET["option1"];
                $jus=$_GET["jus"];
                
                $sql1="insert into absence(idEtudiant,idSeance,justification) values(".$etud.",".$seance.",'".$jus."')";
                $res1=mysqli_query($con,$sql1);
                if($res1)
                {
                    header("Location:absence.php");
					
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