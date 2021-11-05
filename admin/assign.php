<!--assign work-->
<?php 
include('../dbconnect.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 include('../headerfooter/header.php');
 include('includes/nav.php');
?>
<title>Medifall: NGO Assign</title>
<link rel="stylesheet" type="text/css" href="../style.css">
<link rel="stylesheet" type="text/css" href="custom.css">


<div class="part3 mt-4 mb-5 container">
    <h2 class="text-center">Assign NGO's</h2>

    <marquee class="bg-info text-light p-2"><b>All NGOs: 01. Basmah. 02. HoPE Foundation</b> </marquee>


    <?php include('indiDashboard.php'); ?>
    <?php include('orgDashboard.php'); ?>
    <?php include('pharmaDashboard.php'); ?>
    <!--end assign process -->

    <?php 
				/*if(isset($_REQUEST['close']))
		{
			$sql="DELETE FROM individualdonation WHERE donorID={$_REQUEST['donorID']}";
			$del=$conn->query($sql);
			if ($del==TRUE) {
				// code...
				echo '<meta http-equiv="refresh" content="0;URL=?closed"/>';
			}
			else{
				echo "Disable to delete";
			}
		}

				*/?>

    <?php 
			if (isset($_REQUEST['assign'])) {
				// code...
				$id=$_REQUEST['id'];
				$donor=$_REQUEST['donor'];
				$medicine=$_REQUEST['medicine'];

				$quantity=$_REQUEST['quantity'];
				$address=$_REQUEST['address'];
				$upzilla=$_REQUEST['upzilla'];

				$district=$_REQUEST['district'];
				$ngo=$_REQUEST['ngo'];
				$phone=$_REQUEST['phone'];
				$date=$_REQUEST['date'];

				//insertion....
				$sql="INSERT INTO assign(donorID,donor,medicine,quantity,address,upzilla,district,ngo,phone,daate) VALUES('$id','$donor','$medicine','$quantity','$address','$upzilla','$district','$ngo','$phone','$date')";
				$result=$conn->query($sql);
				if($result==true)
				{
					$msg='<div class="alert alert-successfully">Successfully assign"</div>';
				}
				else
				{
					$msg='<div class="alert alert-danger">Unsuccessfully assign"</div>';
				}
			}
			?>
</div>
<div class="container mt-4 mb-4 form">
    <div class="p-2 pt-3" id="assignbox">
        <h4 class="text-info text-center mt-4">Assign NGO's</h4>

        <form method="POST">
            <div class="form-group p-5">

                <div class="row">

                    <div class="col-sm-2">
                        <label for="id">ID</label>
                        <input type="text" name="id" class="form-control mt-1 mb-2 text-center text-danger"
                            value="<?php if(isset($_REQUEST['id'])) echo $_REQUEST['id']; ?>" readonly>
                    </div>

                    <div class="col-sm-10">
                        <label for="name">Individual/ Organization/ Pharmaceutical Donor</label><br>
                        <input type="text" name="donor" class="form-control mt-1 mb-2"
                            value="<?php if(isset($_REQUEST['donor'])) echo $_REQUEST['donor']; ?>">
                    </div>

                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <label for="medicine">Medicine name</label><br>
                        <input type="text" name="medicine" class="form-control mt-1 mb-2"
                            value="<?php if(isset($_REQUEST['medicine'])) echo $_REQUEST['medicine']; ?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="type">Quantity</label><br>
                        <input type="text" name="quantity" class="form-control mt-1 mb-2"
                            value="<?php if(isset($_REQUEST['quantity'])) echo $_REQUEST['quantity'];?>">
                    </div>
                </div>



                <div class="row">
                    <div class="col-sm-6">
                        <label for="address">Address</label><br>
                        <input type="text" name="address" class="form-control mt-1 mb-2"
                            value="<?php if(isset($_REQUEST['address'])) echo $_REQUEST['address'];?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="upzilla">Upzilla</label><br>
                        <input type="text" name="upzilla" class="form-control mt-1 mb-2"
                            value="<?php if(isset($_REQUEST['upzilla'])) echo $_REQUEST['upzilla'];?>">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <label for="type">District</label><br>
                        <input type="text" name="district" class="form-control mt-1 mb-2"
                            value="<?php if(isset($_REQUEST['district'])) echo $_REQUEST['district'];?>">
                    </div>
                    <div class="col-sm-6">
                        <label for="ngo">NGOs</label>
                        <input type="text" name="ngo" class="form-control mt-1 mb-2" required>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-6">
                        <label for="phone">Phone</label><br>
                        <input type="text" name="phone" class="form-control mt-1 mb-2"
                            value="<?php if(isset($_REQUEST['phone'])) echo $_REQUEST['phone'];?>">
                    </div>

                    <div class="col-sm-6">
                        <label for="date">Date</label>
                        <input type="date" name="date" class="form-control mt-1 mb-2">

                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6 ">
                        <button class="btn btn-info " type="submit" name="assign">Assign Order</button>

                    </div>

                    <div class="col-sm-6">
                        <a href="dashboard.php" class="btn btn-warning "><i class="fas fa-sync pr-2"></i>Refresh</a>
                    </div>
                    <?php $msg; ?>
                </div>


        </form>

    </div>
</div>
</div>
<?php include('includes/footer.php'); ?>