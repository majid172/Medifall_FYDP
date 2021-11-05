<?php
include('../dbconnect.php');
session_start();

if(!isset($_SESSION['is_Executivelogin'])){
  if(isset($_REQUEST['ExecutiveEmail'])){
    $ExecutiveEmail = mysqli_real_escape_string($conn,trim($_REQUEST['ExecutiveEmail']));
    $ExecutivePassword = mysqli_real_escape_string($conn,trim($_REQUEST['ExecutivePassword']));
    $sql = "SELECT e_email,ngo_name, e_pass FROM executivelogin_tb WHERE e_email='".$ExecutiveEmail."' AND e_pass='".$ExecutivePassword."' limit 1";
    $result = $conn->query($sql);
    
    if($result->num_rows == 1){
      $_SESSION['is_Executivelogin'] = true;
      $_SESSION['ExecutiveEmail'] = $ExecutiveEmail;
      $_SESSION['ExecutivePassword'] = $ExecutivePassword;
      $ngoname=$result->ngo_name;
      // Redirecting to RequesterProfile page on Correct Email and Pass
      echo "<script> location.href='ExecutiveDashboard.php'; </script>";
      exit;
    }

    else {
      $msg = '<div class="alert alert-warning mt-2" role="alert"> Enter Valid Email and Password </div>';
    }
  }
} 
else {
  echo "<script> location.href='ExecutiveDashboard.php'; </script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <?php include('../headerfooter/header.php');  ?>

    <style>
    .custom-margin {
        margin-top: 8vh;
    }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="mb-3 text-center mt-5" style="font-size: 30px;">
        <i class="fas fa-pills"></i>
        <span>Medifall</span>
    </div>
    <p class="text-center" style="font-size: 20px;"><i class="fas fa-users text-danger"></i> <span>Login as NGO 
            Executive</span>
    </p>
    <div class="container-fluid mb-5">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                        <i class="fas fa-user"></i><label for="email" class="pl-2 font-weight-bold">Email</label><input
                            type="email" class="form-control" placeholder="Email" name="ExecutiveEmail">
                        <!--Add text-white below if want text color white-->
                        <small class="form-text">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <i class="fas fa-key"></i><label for="pass" class="pl-2 font-weight-bold">Password</label><input
                            type="password" class="form-control" placeholder="Password" name="ExecutivePassword">
                    </div>
                    <button type="submit"
                        class="btn btn-outline-danger mt-3 btn-block shadow-sm font-weight-bold">Login</button>
                    <?php if(isset($msg)) {echo $msg; } ?>
                </form>
                <div class="text-center"><a class="btn btn-info mt-3 shadow-sm font-weight-bold"
                        href="../index.php">Back
                        to Home</a></div>
                <div class="text-center"><a class="btn btn-success mt-3 shadow-sm font-weight-bold"
                        href="ExecutiveReg.php">Create an Account Here...</a></div>
            </div>
        </div>
    </div>

    <!-- Boostrap JavaScript -->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/all.min.js"></script>
</body>

</html>