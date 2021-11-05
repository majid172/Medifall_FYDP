<?php 
include('../dbconnect.php');
session_start();
 if(isset($_SESSION['is_Executivelogin'])){
  $ExecutiveEmail = $_SESSION['ExecutiveEmail'];

 } else {
  echo "<script> location.href='ExecutiveLogin.php'; </script>";
 }
?>

<!DOCTYPE html>
<html>

<head>
    <?php include('../headerfooter/header.php');?>

    <title>Medifall: Executive Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="custom.css">

</head>

<body>
    <?php include('ExecutiveNav.php'); ?>

    <div class="part1 container mt-5 mb-5">
    <?php 
								$sql = "SELECT e_email,e_name,e_pass FROM Executivelogin_tb WHERE e_email='".$ExecutiveEmail."' limit 1";

								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
									
										echo '<p>Executive: <b> '.$row['e_name'].'</b></p>';
							
									}
								}
								?>
<h2 class="text-center  mb-4">Donor's List </h2>
        

        <div class="row">
            <div class="col-sm-4">
                <div class="card text-center text-light bg-danger p-2">

                    <div class="card-body justify-center">
                        <h5>Individual Donation</h5>
                        <?php
                          $sql = "SELECT e_email,e_pass FROM executivelogin_tb WHERE e_email='".$ExecutiveEmail."' limit 1";
                          $query = mysqli_query($conn, $sql);
                          while($rs = mysqli_fetch_assoc($query)){
                             $Exe_email = $rs['e_email'];
                         }
							$sql="SELECT count(donorID) AS total FROM executive_assign_indi WHERE executive='$Exe_email' ";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total Donation Proposals: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="ExecutiveIndividual.php">View</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-center text-light bg-info p-2">
                    <div class="card-body justify-center">
                        <h5>Organization Donation</h5>
                        <?php
							$sql="SELECT count(donorID) AS total FROM executive_assign_org WHERE executive= '$Exe_email'";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total Donation Proposals: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="ExecutiveOrg.php">View</a>
                    </div>

                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-center text-light bg-warning p-2">
                    <div class="card-body justify-center">
                        <h5>Pharmaceutical Donation</h5>
                        <?php
							$sql="SELECT count(donorID) AS total FROM executive_assign_pharma WHERE executive ='$Exe_email'";
							$res=$conn->query($sql);
							$value=$res->fetch_assoc();
							$total_count=$value['total'];
							echo '<p>Total Donation Proposals: '.$total_count.'</p>';
							
						?>
                        <a class="btn btn-outline-dark text-light" style="width:100px" href="ExecutivePharma.php">View</a>
                    </div>

                </div>
            </div>


        </div>
    </div>

    <!--recntly upload -->
    <div class="jumbotron part2 ">
        <div class="container p-4">
            <div class="row">
                <div class="col-sm-3" id="recent">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>Recent Donation Proposals</h3>
                        </div>
                        <div class="col-sm-6 arrow">
                            <i class="fas fa-arrow-right"></i>
                        </div>
                    </div>

                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-header text-center text-info">Individual Donation</div>
                        <div class="card-body">

                            <?php 
								$sql = "SELECT * FROM individualdonation ORDER BY donorID DESC LIMIT 3";
								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
										echo '<ul>';
										echo '<li><p><b>Medicine name: </b>'.$row['medicine'].'</p></li>';
										echo '</ul>';
									}
								}
								?>

                        </div>

                    </div>
                </div>
                <div class="col-sm-3">

                    <div class="card">
                        <div class="card-header text-center text-info">Organization Donation</div>
                        <div class="card-body">

                            <?php 
								$sql = "SELECT * FROM organizationdonation ORDER BY orgID DESC LIMIT 3";
								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
										echo '<ul>';
										echo '<li><p><b>Medicine name: </b>'.$row['medicine'].'</p></li>';
										echo '</ul>';
									}
								}
								?>

                        </div>

                    </div>
                </div>


                <div class="col-sm-3">

                    <div class="card">
                        <div class="card-header text-center text-info">Pharmaceutical Donation</div>
                        <div class="card-body">

                            <?php 
								$sql = "SELECT * FROM pharmadonation order by pharmaID desc LIMIT 3";
								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
										echo '<ul>';
										echo '<li><p><b>Medicine name: </b>'.$row['medicine'].'</p></li>';
										echo '</ul>';
									}
								}
								?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <?php include('ExecutiveFooter.php'); ?>
</body>

</html>