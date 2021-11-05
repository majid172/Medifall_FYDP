<?php 
include('dbconnect.php'); 
if (isset($_POST['save'])) {

    $user = $_POST["user"];
    $email = $_POST["email"];
    $area = $_POST["area"];
    $upzilla = $_POST["upzilla"];
    $district = $_POST["district"];
    $medicine = $_POST["medicine"];
    $quantity = $_POST["quantity"];
    $phone = $_POST["phone"];
    $date = $_POST["date"];
//    print("inside if");

    $test = $_FILES['file'];
    // print_r($test);
    $filename = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $size = $_FILES['file']['size'];
    //deestination
    $dest = 'admin/uploads/' . $filename;

    //extension
    $extn = pathinfo($filename, PATHINFO_EXTENSION);



    if (!in_array($extn, ['jpg','png', 'pdf','zip', 'docx'])) {
        echo "You file extension must be jpg, png, zip, docx";
    } elseif ($_FILES['file']['size'] > 10000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified dest
        if (move_uploaded_file($fileTmpName, $dest)) {
            $sql = "INSERT INTO requestmedicine VALUES ('','$user','$email','$area','$upzilla','$district','$medicine','$quantity','$phone','$date','$filename')";
            if (mysqli_query($conn, $sql)) {
                $msg='<div class="alert alert-success mt-3 text-center">Request Submission successful, Please wait for our call/email</div>';
            }
        } else {
            $msg='<div class="alert alert-warning">Failed to submit</div>';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>

    <?php include('headerfooter/header.php'); ?>
    <title>Request Medicine</title>
    <link rel="icon" href="img/icon.png">
    <style type="text/css">
        .form-group {
            border-radius: 20px;
            box-shadow: 8px 8px 5px gray;

        }

        #header {
            color: #1F7A79;
        }

        #header p {
            margin-top: 10px;
            padding-top: 10px;
            text-align: justify;
        }

        #form {
            width: 600px;

        }

        label {
            line-height: 1px;
        }
		.small_text{
			font-size:9.5px;
			font-style: italic;
			color: blue;
		}
    </style>
</head>

<body>
    <?php include('headerfooter/nav.php'); ?>
    <div class="container">
        <div class="row mt-4">

            <div class="col-lg-6 mt-5" id="header">

                <h1>Request for Medicine </h1>
                <p>Medifall provides critical medicine to those people who need it most without paying any cost. If you’re in need of medicine you should get medicine very easily: simply fill-up detailed information from the Medicine Request Form then click the submit button and get service without any delay.</p>
            </div>

            <div class="col-lg-6">
                <img src="img/request.png" style="width: 600px; height: 400px;">

            </div>

        </div>
    </div>
    <div class="container col-md-5">
        <form class="form-group border border-info p-4 mt-5 mb-5" action="" method="POST" enctype="multipart/form-data">
            <h4 class="text-center">Medicine Request Form</h4>
            <p class="text-center text-weight-bold text-danger">All credit goes to Medifall</p>

            <div class="text-secondary">

                <label for="user" class="mt-3 text-secondary"><i class="far fa-user pr-2 text-secondary"></i>Name</label>
                <input type="user" name="user" class="form-control" required>

                <label for="email" class="text-secondary mt-3"><i class="far fa-envelope pr-2 text-secondary"></i>Email</label>
                <input type="email" name="email" class="form-control" required>

                <label for="area" class="text-secondary mt-3"><i class="fas fa-map-pin pr-2 text-secondary"></i>Address</label>
                <input type="text" name="area" class="form-control" required>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="upzilla" class="text-secondary mt-3"><i class="fas fa-location-arrow pr-2 text-secondary"></i>Upazila/Thana</label>
                        <input type="text" name="upzilla" class="form-control" required>
                    </div>

                    <div class="col-lg-6">
                        <label for="district" class="mt-3 text-secondary"><i class="fas fa-map-marker-alt pr-2 text-secondary"></i>District</label>
                        <input type="text" name="district" class="form-control" required>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-6">
                        <label for="medicine" class="mt-3"><i class="fas fa-pills pr-2 text-secondary"></i>Medicine Name</label>
                        <input type="text" name="medicine" class="form-control" required>
                    </div>

                    <div class="col-lg-6">
                        <label for="medicine" class="mt-3 text-secondary"><i class="fas fa-sort-amount-up-alt pr-2 text-secondary"></i>Quantity <small>(pcs)</small></label>
                        <input type="number" name="quantity" min="10" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <label for="phone" class="mt-3"><i class="fas fa-phone-volume pr-2"></i>Contact Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>

                    <div class="col-lg-6">
                        <label for="date" class="mt-3"><i class="far fa-calendar-plus pr-2"></i>Date</label>
                        <input type="datetime-local" name="date" class="form-control" required>
                    </div>
                </div>
            </div>
                    <label for="prescription" class="mt-3 text-secondary"><i class="fas fa-file-alt pr-2 text-secondary"></i>Upload Prescription <small class="small_text">(Please upload image/pdf/doc file of your prescription provided by doctor)</small> </label>
                    <input type="file" name="file" class="form-control">


                    <button type="submit" name="save" class=" btn btn-outline-info form-control mt-4">Submit</button>

				<?php if(isset($msg))
				{
					echo $msg;
				} ?>
        </form>

    </div>

    <?php include('headerfooter/footer.php'); ?>

</body>

</html>