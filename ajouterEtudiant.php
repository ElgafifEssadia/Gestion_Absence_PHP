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
            $sql="select * from filiere ";
            $res=mysqli_query($con,$sql);
            ?>





            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <h4 class="card-title">Ajouter Etudiant</h4>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nom</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="nom" placeholder="saisir Nom">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Prenom</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lname" name="prenom" placeholder="Saisir Prenom">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Adresse</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lname" name="adresse" placeholder="Saisir Adresse">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="lname" name="email" placeholder="Saisir Email">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Telephone</label>
                                    <div class="col-sm-9">
                                        <input type="tel" class="form-control" id="lname" name="tel" placeholder="Saisir Tel">
                                    </div>
                                </div>
								<div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">CNE</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lname" name="cne" placeholder="Saisir CNE">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Filiére</label>
                                    <div class="col-sm-9">
                                    <select class="form-control" name="option1" >
                                        <?php while($row=mysqli_fetch_array($res)){?>
                                        <option value="<?php echo $row['IDFiliere'] ;?>"><?php echo $row["description"] ;?></option>
                                        <?php } ?>
                                    </select>
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
                $nom=$_GET["nom"];
                $prenom=$_GET["prenom"];
				$adresse=$_GET["adresse"];
				$email=$_GET["email"];
				$tel=$_GET["tel"];
				$cne=$_GET["cne"];
                $fil=$_GET["option1"];
                $sql1="insert into etudiant(nom,prenom,adresse,email,tel,CNE,idFiliere) values ('".$nom."','".$prenom."','".$adresse."','".$email."','".$tel."','".$cne."',".$fil.")";
                $res1=mysqli_query($con,$sql1);
                if($res1)
                {
                    header("Location:etudiants.php");
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