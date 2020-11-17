<?php
    session_start();
    ob_start();

    $title = "Marquer l'absence";
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
                        <h4 class="page-title">Marquer l'absence</h4>
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

<?php
                include "inludes/config.php";
                $sql="select * from absence a,etudiant e,seance s where a.idEtudiant=e.idEtudiant and a.idSeance = s.idSeance";
                $res=mysqli_query($con,$sql);
            ?>





            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <div class="row">
                     <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des Absence</h5>
                            <form method="post" action="">
                                <button type="submit" class="btn btn-secondary btn-sm" name="ajout">Marquer un absence</button>
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><b>ID</b></th>
                                <th scope="col"><b>Etudiant</b></th>
                                <th scope="col"><b>Seance</b></th>
                                <th scope="col"><b>Justification</b></th>
                            </tr>
                            </thead>
                            <tbody>
                    <?php while($row=mysqli_fetch_array($res)){?>
                            <tr>
                                <th scope="row"><?php echo $row["idAbsence"] ;?></th>
                                <td><?php echo $row["nom"]." ".$row["prenom"] ;?></td>
                                <td><?php echo $row["typeSeance"] ;?></td>
                                <td><?php echo $row["justification"] ;?></td>
                                
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







        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>


<?php

if(isset($_POST["ajout"]))
{
    header("Location: ajouterAbsence.php");
}




    include "layout/footer.php";
    ob_end_flush();

?>