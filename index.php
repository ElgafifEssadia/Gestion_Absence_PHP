<?php
    session_start();
    ob_start();

    $title = "Login Form";

    include "layout/head.php";

    /*if (isset($_SESSION["check"]))
        header("Location:dashboord.php");*/
?>

    <div class="main-wrapper">
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <!--<span class="db"><img src="assets/images/b5.jpg" alt="logo" /></span>-->
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform" action="" method="post">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control form-control-lg" placeholder="Username" name="login" aria-label="Username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" name="pwd" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <!--<button class="btn btn-info" id="to-recover" type="button"><i class="fa fa-lock m-r-5"></i> Lost password?</button>-->
                                        <button class="btn btn-success float-right" type="submit" name="connecter">Login</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<?php/*
include "inludes/config.php";
if(isset($_POST["connecter"]))
{
    $login=$_POST["login"];
    $pwd=$_POST["pwd"];

    $sql="select * from admin where pseudo='".$login."' and password='".$pwd."'";
    $res=mysqli_query($con,$sql);
    $num=mysqli_num_rows($res);
    if($num == 1)
    {
        $_SESSION["check"] = true;
        header("Location:dashboord.php");

    }
}
*/
?>

<?php
include "inludes/config.php";
if(isset($_POST["connecter"]))
{
    $login=$_POST["login"];
    $pwd=$_POST["pwd"];

    $sql="select * from admin where pseudo='".$login."' and password='".$pwd."'";
    $res=mysqli_query($con,$sql);
    $num=mysqli_num_rows($res);
    if($num == 1)
    {
        header("Location:dashboard.php");

    }
}
?>


<?php


include "layout/footer.php";

ob_end_flush();
?>