<html lang="en">
<?php
include('../dbconnect.php');
//accessing $conn variable
$results = mysqli_query($conn, "SELECT * FROM requestmedicine")
    or die("Can not execute query");
?>


<head>
    <?php include('../headerfooter/header.php');?>
     
    <title>Medifall: Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="stylesheet" type="text/css" href="custom.css">


</head>

<body>
    <?php include('includes/nav.php'); ?>
    <h1 style="text-align: center; padding: 30px;">Medicine Requests</h1>


        <?php
        while ($rows = mysqli_fetch_array($results)) {

            extract($rows);
          echo '<form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $rows["requestID"] .'>
			  <button type="submit" class="btn btn-secondary " name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form>';

        ?>
         
                <div class="card ml-auto mr-auto" style="width: 1100px; border:1px solid gray">
                    <div class="row ">
                        <div class="col-md-8">
                            <img style="height: 390px; width: 800px;" src="uploads/<?php echo "$files"; ?>" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-4">
                            <div class="card-body">
                                <h5 class="card-title">Requester Details</h5>
								<p class="card-text"><b> Request ID:</b> <?php echo "$requestID"; ?></p>
                                <p class="card-text"><b> Name:</b> <?php echo "$name"; ?></p>
                                <p class="card-text"><b>Email:</b> <?php echo "$email"; ?></p>
                                <p class="card-text"><b>Area:</b> <?php echo "$area"; ?></p>
                                <p class="card-text"><b>Medicine Name:</b> <?php echo "$medicine"; ?></p>
                                <p class="card-text"><b>Quantity:</b> <?php echo "$quantity"; ?></p>
								<form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["requestID"] .'>
                    <button type="submit" name="delete" class=" btn btn-outline-danger form-control mt-4">Delete</button>
		                      </form>
					<button type="submit" name="assign" class=" btn btn-outline-success form-control mt-4">Assign</button>
                            </div>
                        </div>
                    </div>
                    <!-- button -->
                </div>
        <?php } ?>
		
	  <?php 	
      if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM requestmedicine WHERE requestID = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
    }
	?>
    <?php include('includes/footer.php'); ?>
</body>

</html>