<?php
require_once '../dbcon.php'; 
session_start();
if(isset ($_SESSION['student_login'])){
    header('location:index.php');
}
    if(isset($_POST['student_register'])) {
         $fname= $_POST['fname'];
         $lname= $_POST['lname'];
         $roll= $_POST['roll'];
         $reg= $_POST['reg'];
         $email= $_POST['email'];
         $username= $_POST['username'];
         $password= $_POST['password'];
         $phone= $_POST['phone'];
         $input_error=array();
         
         if (empty($fname)){
            $input_error['fname']="First name field is required";
        }
        if (empty($lname)){
            $input_error['lname']="Last name field is required";
        }
        if (empty($roll)){
            $input_error['roll']="roll name field is required";
        }
        if (empty($reg)){
            $input_error['reg']="Reg name field is required";
        }
        if (empty($email)){
            $input_error['email']="email name field is required";
        }
        if (empty($username)){
            $input_error['username']="user name field is required";
        }
        if (empty($password)){
            $input_error['password']="password field is required";
        }
        if (empty($phone)){
            $input_error['phone']="phone field is required";
        }
        if (empty($fname)){
             $input_error['fname']="First name field is required";
         }
         if(count($input_error)==0){

            /* $email_cheak=mysqli_query($con, query:"SELECT * FROM `students` WHERE 1 `email`='$email' ");
            print_r($email_cheak); */
            $password_hash=password_hash($password, algo:PASSWORD_DEFAULT);
            $result=mysqli_query($con, query:"INSERT INTO `students`( `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`,`status`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password_hash','$phone','0')");

            if($result){
                $success="Registration Successfully";
            } else {
                $error="something Wrong";
            }  
 
         }
         //$result=mysqli_query($con, query:"INSERT INTO `students`( `fname`, `lname`, `roll`, `reg`, `email`, `username`, `password`, `phone`,`status`) VALUES ('$fname','$lname','$roll','$reg','$email','$username','$password','$phone','0')");
    }
?>

<!doctype html>
<html lang="en" class="fixed accounts sign-in">


<!-- Mirrored from myiideveloper.com/helsinki/last-version/helsinki_green-dark/src/pages_register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 Mar 2019 13:06:17 GMT -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Library Registration</title>
    <link rel="apple-touch-icon" sizes="120x120" href="favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../asset/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../asset/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../asset/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../asset/stylesheets/css/style.css">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
        <h2 class="text-center" > Register </h2>
        <?php
        if (isset($success)){ 
        ?> 
        <div class="alert alert-success" role="alert">
  <?=$success ?>
  <button type="button" class="close" data-dismiss="alert" aria-level="close">
  <span aria-hidden="true">&times;</span>
  </button> 
</div>

<?php 
        }
        ?>
        <?php
        if (isset($error)){ 
        ?>
        <div class="alert alert-danger" role="alert">
  <?=$error ?>
  <button type="button" class="close" data-dismiss="alert" aria-level="close">
  <span aria-hidden="true">&times;</span>
  </button> 
</div>
<?php 
        }
        ?>
        </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="post" action="<?=$_SERVER['PHP_SELF']?>">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder=" First Name" name="fname">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                            if (isset($input_error['fname'])){
                                echo '<span class="input-errors">'.$input_error['fname'].'</span>' ;
                            }
                            ?>

                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder=" Last Name" name="lname">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                            if (isset($input_error['lname'])){
                                echo '<span class="input-errors">'.$input_error['lname'].'</span>' ;
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder=" Email" name="email">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                            if (isset($input_error['email'])){
                                echo '<span class="input-errors">'.$input_error['email'].'</span>' ;
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder=" Username" name="username">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                            if (isset($input_error['username'])){
                                echo '<span class="input-errors">'.$input_error['username'].'</span>' ;
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder=" Password" name="password">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php 
                            if (isset($input_error['password'])){
                                echo '<span class="input-errors">'.$input_error['password'].'</span>' ;
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder=" Roll" name="roll">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                            if (isset($input_error['roll'])){
                                echo '<span class="input-errors">'.$input_error['roll'].'</span>' ;
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder=" Reg. No" name="reg">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                            if (isset($input_error['reg'])){
                                echo '<span class="input-errors">'.$input_error['reg'].'</span>' ;
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="01*********" name="phone" >
                                <i class="fa fa-user"></i>
                            </span>
                            <?php 
                            if (isset($input_error['phone'])){
                                echo '<span class="input-errors">'.$input_error['phone'].'</span>' ;
                            }
                            ?>
                            
                        </div>
                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="student_register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="javascripts/template-script.min.js"></script>
<script src="javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>