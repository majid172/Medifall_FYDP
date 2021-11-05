<?php include('../dbconnect.php');
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('../headerfooter/header.php'); ?>
    <title>Pharma Donor's List</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <style type="text/css">
    .table {
        width: 1290px;
        margin-left: auto;
        margin-right: auto;
    }

    #assignbox {
        height: 600px;
        border-radius: 20px;
        overflow: hidden;
        background: #ecf0f3;
        box-shadow: inset 5px 5px 3px gray,
            inset -5px -5px 3px white;
    }
    </style>
</head>

<body>
    <?php include('includes/nav.php');?>
    <h3 class="text-center text-secondary mt-5">Pharmaceutical Donotion Proposals</h3>
    <div class="text-center"><a href="#scroll_down" class="btn btn-warning scroll_down"><i
                class="fas fa-sort-down"></i>Active Scroll Down</a></div>
    <table class="table table-bordered table-striped mt-5">
        <thead class="text-light bg-info text-center">
            <tr>
                <th>ID</th>
                <th>Pharma</th>
                <th>Email</th>
                <th>Address</th>
                <th>Upzaila</th>
                <th>District</th>
                <th>Medicine</th>
                <th>Quantity</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="text-center">

            <?php 
			$sql = "SELECT * FROM pharmadonation";
			$result= $conn->query($sql);
			if($result->num_rows>0){
				while ($row=$result->fetch_assoc()) {
					// code...
					echo '<tr><td>'.$row["pharmaID"].'</td><td>';
					echo $row["pharmaName"].'</td><td>';
					echo $row["email"].'</td><td>';
					echo $row["area"].'</td><td>';
					echo $row["upzilla"].'</td><td>';
					echo $row["district"].'</td><td>';
					echo $row["medicine"].'</td><td>';
					echo $row["quantity"].'</td><td>';
					echo $row["phone"].'</td><td>';
					echo $row["daate"].'</td><td>';
                    echo $row["status"].'</td><td>';

					

					echo '<form method="POST" >';
						echo '<input type="hidden" name="pharmaID" value='.$row["pharmaID"].'>';
						echo '<input type="hidden" name="donor" value='.$row["pharmaName"].'>';
						echo '<input type="hidden" name="medicine" value='.$row["medicine"].'>';

						echo '<input type="hidden" name="quantity" value='.$row["quantity"].'>';
						echo '<input type="hidden" name="address" value='.$row["area"].'>';
						echo '<input type="hidden" name="upzilla" value='.$row["upzilla"].'>';
						echo '<input type="hidden" name="district" value='.$row["district"].'>';
						echo '<input type="hidden" name="phone" value='.$row["phone"].'>';

					echo '<input type="submit" name="view" class="btn btn-info" value="Assign"></td><td>';
						echo '<input type="submit" name="close" class="btn btn-dark ml-2" value="Close"></input></td></tr>';
					echo '</form>';
					
						
				}
			}
			?>
        </tbody>
    </table>

    <?php
    
    if (isset($_REQUEST['view'])) //click view button then show details in assign form 
{
    // code...
    $sql="SELECT pharmaID,pharmaName,email,area,upzilla,district,medicine,quantity,phone,daate FROM pharmadonation WHERE pharmaID={$_REQUEST['pharmaID']}";
    $res=$conn->query($sql);
    $row=$res->fetch_assoc();
}
          
//DELETE 
if(isset($_REQUEST['close'])){
    $sql = "DELETE FROM pharmadonation WHERE pharmaID = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
    // echo "Record Deleted Successfully";
     // below code will refresh the page after deleting the record
   echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
  } else {
  echo "Unable to Delete Data";
    }
}
			if (isset($_REQUEST['assign'])) {
				$sql="SELECT pharmaID,pharmaName,email,area,upzilla,district,medicine,quantity,phone,daate FROM pharmadonation WHERE pharmaID={$_REQUEST['pharmaID']}";
				$res=$conn->query($sql);
 			    $row=$res->fetch_assoc();

                $id=$_REQUEST['pharmaID'];
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
				$sql="INSERT INTO assign_pharma(donorID,donor,medicine,quantity,address,upzilla,district,ngo,phone,date) VALUES('$id','$donor','$medicine','$quantity','$address','$upzilla','$district','$ngo','$phone','$date')";
				$result=$conn->query($sql);
				if($result==true)
				{
					$msg='<div class="alert alert-success">Successfully assigned</div>';
				}
				else
				{
					$msg='<div class="alert alert-danger">Failed to assign"</div>';
				}
			}
			?>
    

    <!--form_-->
    <div id="scroll_down">
        <div class="container mt-4 mb-4 form">
            <div class="p-2 pt-3" id="assignbox">
                <h4 class="text-info text-center mt-4">Assign NGO's</h4>

                <form method="POST">
                    <div class="form-group p-5">

                        <div class="row">

                            <div class="col-sm-2">
                                <label for="id">ID</label>
                                <input type="text" name="pharmaID" class="form-control mt-1 mb-2 text-center text-danger"
                                    value="<?php if(isset($_REQUEST['pharmaID'])) echo $_REQUEST['pharmaID']; ?>" readonly>
                            </div>

                            <div class="col-sm-10">
                                <label for="name">Pharmaceutical Donor</label><br>
                                <input type="text" name="donor" class="form-control mt-1 mb-2"
                                    value="<?php if(isset($_REQUEST['donor'])) echo $row['pharmaName']; ?>">
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <label for="medicine">Medicine name</label><br>
                                <input type="text" name="medicine" class="form-control mt-1 mb-2"
                                    value="<?php if(isset($_REQUEST['medicine'])) echo $row['medicine']; ?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="type">Quantity</label><br>
                                <input type="text" name="quantity" class="form-control mt-1 mb-2"
                                    value="<?php if(isset($_REQUEST['quantity'])) echo $row['quantity'];?>">
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <label for="address">Address</label><br>
                                <input type="text" name="address" class="form-control mt-1 mb-2"
                                    value="<?php if(isset($_REQUEST['address'])) echo $row['area'];?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="upzilla">Thana/Upazila</label><br>
                                <input type="text" name="upzilla" class="form-control mt-1 mb-2"
                                    value="<?php if(isset($_REQUEST['upzilla'])) echo $row['upzilla'];?>">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="type">District</label><br>
                                <input type="text" name="district" class="form-control mt-1 mb-2"
                                    value="<?php if(isset($_REQUEST['district'])) echo $row['district'];?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="ngo">Select NGO</label>
                                <select class="form-control" name="ngo" required>
                                    <option value="">Choose NGO</option>
                                    <?php 
								$sql = "SELECT ngo_name FROM ngologin_tb ";
								$result = $conn->query($sql);
								if($result->num_rows>0){
									while($row=$result->fetch_assoc()){
									
										?> <option value="<?php echo $row['ngo_name'];?>">
                                            <?php
                                            echo $row['ngo_name'];
									?></option>
                                    <?php
									}
								}
								?>
                                </select>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-6">
                                <label for="phone">Phone</label><br>
                                <input type="text" name="phone" class="form-control mt-1 mb-2"
                                    value="<?php if(isset($_REQUEST['phone'])) echo $row['phone'];?>">
                            </div>

                            <div class="col-sm-6">
                                <label for="date">Date</label>
                                <input type="date" name="date" class="form-control mt-1 mb-2">

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6 ">
                                <button class="btn btn-info " type="submit" name="assign">Assign Request</button>

                            </div>

                            <div class="col-sm-6">
                                <a href="pharma.php" class="btn btn-warning "><i
                                        class="fas fa-sync pr-2"></i>Refresh</a>
                            </div>
                            <?php 
            if (isset($msg)) {
            	// code...
            	echo $msg;
            }
             ?>
                        </div>


                </form>

            </div>
        </div>
    </div>
    </div>
    </div>

    <?php include('includes/footer.php'); ?>
</body>

</html>