<?php
    session_start();
    ob_start();

    $title = "Dashboard";
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
            $sql1="select * from etudiant ";
            $res1=mysqli_query($con,$sql1);
			$num1=mysqli_num_rows($res1);
			
			$sql2="select * from filiere ";
            $res2=mysqli_query($con,$sql2);
			$num2=mysqli_num_rows($res2);
			
			$sql3="select * from module ";
            $res3=mysqli_query($con,$sql3);
			$num3=mysqli_num_rows($res3);
			
			$sql4="select * from seance ";
            $res4=mysqli_query($con,$sql4);
			$num4=mysqli_num_rows($res4);
			
			$sql5="select * from absence ";
            $res5=mysqli_query($con,$sql5);
			$num5=mysqli_num_rows($res5);
            ?>






            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
				<div class="container">
<div class="row">
<div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-primary">
                <div class="card-body bg-primary text-white">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-random fa-5x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $num1 ; ?></h1>
                            <h4>  Etudiants </h4>
                        </div>
                    </div>
                </div>
                <a href="etudiants.php">
                    <div class="card-footer bg-light">
                        <span class="float-left">Voir les détails</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-secondary">
                <div class="card-body bg-secondary text-white">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-user-graduate fa-5x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $num2 ; ?></h1>
                            <h4>  Filières</h4>
                        </div>
                    </div>
                </div>
                <a href="filieres.php">
                    <div class="card-footer bg-light text-secondary">
                        <span class="float-left">Voir les détails</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-success">
                <div class="card-body bg-success text-white">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-user-tie fa-5x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $num3 ; ?></h1>
                            <h4>  Modules</h4>
                        </div>
                    </div>
                </div>
                <a href="module.php">
                    <div class="card-footer bg-light text-success">
                        <span class="float-left">Voir les détails</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-danger">
                <div class="card-body bg-danger text-white">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $num4 ; ?></h1>
                            <h4>  Séances</h4>
                        </div>
                    </div>
                </div>
                <a href="seance.php">
                    <div class="card-footer bg-light text-danger">
                        <span class="float-left">Voir les détails</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6" style="margin-top: 20px">
            <div class="card border-warning">
                <div class="card-body bg-warning text-white">
                    <div class="row">
                        <div class="col-3">
                            <i class="fa fa-university fa-5x"></i>
                        </div>
                        <div class="col-9 text-right">
                            <h1><?php echo $num5 ; ?></h1>
                            <h4>  Absences</h4>
                        </div>
                    </div>
                </div>
                <a href="absence.php">
                    <div class="card-footer bg-light text-warning">
                        <span class="float-left">Voir les détails</span>
                        <span class="float-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        
    </div>
</div>
</div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->







        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>


<?php

    include "layout/footer.php";
    ob_end_flush();

?>