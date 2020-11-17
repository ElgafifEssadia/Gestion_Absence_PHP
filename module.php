<?php
    session_start();
    ob_start();

    $title = "Gestion des modules";
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
                        <h4 class="page-title">Gestion des modules</h4>
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
            <?php
                include "inludes/config.php";
                $sql="select * from module m,filiere f where m.idFiliere = f.IDFiliere ";
                $res=mysqli_query($con,$sql);
            ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Liste des Modules</h5>
                            <form method="post" action="">
                                <button type="submit" class="btn btn-secondary btn-sm" name="ajout">Ajouter Module</button>
                            </form>
                        </div>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col"><b>ID</b></th>
                                <th scope="col"><b>Description</b></th>
                                <th scope="col"><b>Horaire</b></th>
                                <th scope="col"><b>Filiére</b></th>
                                <th scope="col"><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                    <?php while($row=mysqli_fetch_array($res)){?>
                            <tr>
                                <th scope="row"><span id="<?php echo $row['idModule'] ;?>"><?php echo $row["idModule"] ;?></span></th>
                                <td><span id="<?php echo $row['idModule'] ;?>"><?php echo $row["descriptionM"] ;?></span></td>
                                <td><span id="<?php echo $row['idModule'] ;?>"><?php echo $row["horaire"] ;?></span></td>
                                <td><span id="<?php echo $row['idModule'] ;?>"><?php echo $row["description"] ;?></span></td>
                                <td>
				
                                    <a href="updateModule.php?id=<?php echo $row['idModule'] ;?>" class="btn btn-outline-secondary">Modifier</a>
                                    <a href="module.php?sup=<?php echo $row['idModule'] ;?>" class="btn btn-outline-danger" >Supprimer</a>
								
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

		


        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
<?php
if(isset($_POST["ajout"]))
{
    header("Location: ajouterModule.php");
}

if(isset($_GET["sup"]))
{
	$sql1="delete from module where idModule=".$_GET["sup"];
	$res1=mysqli_query($con,$sql1);
	header("Location: module.php");
}


    include "layout/footer.php";
    ob_end_flush();

?>