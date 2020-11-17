
<?php
    session_start();
    ob_start();

    $title = "Gestion des etudiants";
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
                        <h4 class="page-title">Gestion des etudiants</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->






            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <!--========================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->



             <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php
            include "inludes/config.php";
            $sql="select * from etudiant e,filiere f where e.idFiliere = f.IDfiliere";
            $res=mysqli_query($con,$sql);
            ?>

             <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des Etudiants</h5>
                            <form method="post" action="">
                                <button type="submit" class="btn btn-secondary btn-sm" name="ajout">Ajouter Etudiant</button>
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><b>ID</b></th>
                                <th scope="col"><b>Nom</b></th>
                                <th scope="col"><b>Prénom</b></th>
                                <th scope="col"><b>Adresse</b></th>
                                <th scope="col"><b>Email</b></th>
                                <th scope="col"><b>Tel</b></th>
                                <th scope="col"><b>CNE</b></th>
                                <th scope="col"><b>Filiere</b></th>
                                <th scope="col"><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php while($row=mysqli_fetch_array($res)){?>
                                <tr>
                                    <th scope="row"><?php echo $row["IDEtudiant"] ;?></th>
                                    <td><?php echo $row["nom"] ;?></td>
                                    <td><?php echo $row["prenom"] ;?></td>
                                    <td><?php echo $row["adresse"] ;?></td>
									<td><?php echo $row["email"] ;?></td>
									<td><?php echo $row["tel"] ;?></td>
									<td><?php echo $row["CNE"] ;?></td>
									<td><?php echo $row["description"] ;?></td>
									
                                    <td>
                                       <a href="updateEtudiant.php?id=<?php echo $row['IDEtudiant'] ;?>" class="btn btn-outline-secondary">Modifier</a>
                                       <a href="etudiants.php?sup=<?php echo $row['IDEtudiant'] ;?>" class="btn btn-outline-danger" >Supprimer</a>
                                    </td>
                                </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
<?php
if(isset($_POST["ajout"]))
{
    header("Location: ajouterEtudiant.php");
}

if(isset($_GET["sup"]))
{
	$sql1="delete from etudiant where IDEtudiant=".$_GET["sup"];
	$res1=mysqli_query($con,$sql1);
	header("Location: etudiants.php");
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