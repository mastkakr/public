<?php
session_start(); // Start the session

// Redirect if required session variables are not set
if (!isset($_SESSION['step1']) || !isset($_SESSION['step2']) || !isset($_SESSION['step3'])) {
    header('Location: register.php');
    exit; // Terminate the script
}

if (isset($_POST['submit_end'])) {
    require_once('__LIB__/secure_data.php');

    if (class_exists('SECURE_INPUT_DATA_AVAILABLE')) {
        $obj_secure_data = new SECURE_INPUT_DATA;


        // Get the identity back image details
		$identity_back_name = $_FILES['identity_back']['name'];
        $identity_back_type = $_FILES['identity_back']['type'];
        $identity_back_tmp_name = $_FILES['identity_back']['tmp_name'];
		
		// Specify the directory where you want to store the uploaded images
        $uploadDirectory = 'uploads/';

        // Create a unique name for the uploaded image
        $uniqueFileName = uniqid() . '_' . $identity_back_name;

        // Move the uploaded image to the specified directory
        if (move_uploaded_file($identity_back_tmp_name, $uploadDirectory . $uniqueFileName)) {
            echo 'Image uploaded successfully.';
        } else {
            echo 'Error uploading image.';
        }
		
        // Get personal details from user
        $first_name = $_SESSION['first_name'];
        $last_name = $_SESSION['last_name'];
        $dob = $_SESSION['dob'];
        $mobile_number = $_SESSION['mobile'];
        $city = $_SESSION['city'];
        $add = $_SESSION['add'];
        $zip = $_SESSION['zip'];
		$stat = $_SESSION['stat'];
        $email = $_SESSION['email'];
        $password = $_SESSION['password'];
        $ip_instant_register = $_SERVER['REMOTE_ADDR'];
        $currentDateTime = date("Y-m-d H:i:s");
		$account_balance = 0.00;
		

        // Generate random pin and account number
        $length_pin = 4;
        $pin = substr(str_shuffle("0123456789"), 0, $length_pin);
        $length_account = 10;
        $account_number = substr(str_shuffle("0123456789"), 0, $length_account); 
		
		
        // Insert data into the database
        require_once('__LIB__/connect.php');

        if (class_exists('DATABASE_CONNECT')) {
            $obj_conn = new DATABASE_CONNECT;
            $conn = new mysqli($obj_conn->connect[0], $obj_conn->connect[1], $obj_conn->connect[2], $obj_conn->connect[3]);

            if ($conn->connect_error) {
                die("Cannot connect: " . $conn->connect_error);
            } else {
                $sql = "INSERT INTO customers (firstname, lastname, dob, mobile_number, city, address, zip, state, identity_back_data, email, password, pin, account_number, account_type, instant_register, ip_instant_register, account_balance)
                        VALUES ('$first_name', '$last_name', '$dob', '$mobile_number', '$city', '$add', '$zip', '$stat', '$uniqueFileName', '$email', '$password', '$pin', '$account_number', 'block', NOW(), '$ip_instant_register', '$account_balance')";

                $sql2_1 = "INSERT INTO notification (email, lastname, firstname, title, message)
							VALUES ('$email', '$last_name', '$first_name', 'Welcome', 'Welcome to First Nation Bank')";

				$sql2_2 = "INSERT INTO notification (email, lastname, firstname, title, message)
							VALUES ('$email', '$last_name', '$first_name', 'Balance', 'Your balance is 0.00 Dollar')";

				$sql2_3 = "INSERT INTO notification (email, lastname, firstname, title, message)
							VALUES ('$email', '$last_name', '$first_name', 'Account', 'Your account is activated')";
							
				$sql2_4 = "INSERT INTO code (email)
							VALUES ('$email')";
				$sql2_5 = "INSERT INTO transactions (account_number)
							VALUES ('$account_number')";

		if ($conn->query($sql) && $conn->query($sql2_1) && $conn->query($sql2_2) && $conn->query($sql2_3) && $conn->query($sql2_4) && $conn->query($sql2_5)) {
			echo '<div class="registration-message">
			<h2>Registration Completed!</h2>
			</div>';
			header("location:/finatbank.online/login.php");
			exit();
		} else {
				echo "Error inserting data: " . $conn->error;
	}

                $conn->close();
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">
<link href="images/favicon.png" rel="icon" />
<title>First National Bank</title>
<meta name="description" content="This professional design html template is for build a Money Transfer and online payments website.">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
============================================= -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

<!-- Stylesheet
============================================= -->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#" />
</head>
<body>
<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End -->

<div id="main-wrapper">
  <div class="container-fluid px-0">
    <div class="row g-0 min-vh-100">
      <div class="col-md-6"> 
        <!-- Get Verified! Text
        ============================================= -->
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8 bg-primary"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('./images/bg/image-3.jpg');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="row g-0">
              <div class="col-10 col-lg-9 mx-auto">
                <div class="logo mt-5 mb-5 mb-md-0"> <a class="d-flex" href="index.html" title="Payyed - HTML Template"><img src="images/logo-light.png" alt="Payyed"></a> </div>
              </div>
            </div>
            <div class="row g-0 my-auto">
              <div class="col-10 col-lg-9 mx-auto">
                <h1 class="text-11 text-white mb-4">Get Verified!</h1>
                <p class="text-4 text-white lh-base mb-5">Every day, Payyed makes thousands of customers happy.</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Get Verified! Text End --> 
      </div>
      <div class="col-md-6 d-flex align-items-center"> 
        <!-- SignUp Form
        ============================================= -->
        <div class="container my-4">
          <div class="row g-0">
            <div class="col-11 col-lg-9 col-xl-8 mx-auto">
              <h3 class="fw-400 mb-4">Step : Upload documents</h3>
              <form id="loginForm" method="post" enctype="multipart/form-data">
                
                
                <div class="mb-3">
                  <span class="btn btn-default btn-file glyphicon glyphicon-open-file">
                         <input type="file" name="identity_back" id="imgInp" required>
                       </span>
                    
                </div>
                <div class="d-grid mt-4 mb-3"><button class="btn btn-primary" name="submit_end" type="submit">Submit</button></div>
              </form>
              <p class="text-3 text-center text-muted">Already have an account? <a class="btn-link" href="login.html">Log In</a></p>
            </div>
          </div>
        </div>
        <!-- SignUp Form End --> 
      </div>
    </div>
  </div>
</div>

<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> 

<!-- Styles Switcher -->
<div id="styles-switcher" class="left">
  <h2 class="text-3">Color Switcher</h2>
  <hr>
  <ul>
    <li class="blue" data-bs-toggle="tooltip" title="Blue" data-path="css/color-blue.css"></li>
	<li class="indigo" data-bs-toggle="tooltip" title="Indigo" data-path="css/color-indigo.css"></li>
    <li class="purple" data-bs-toggle="tooltip" title="Purple" data-path="css/color-purple.css"></li>
	<li class="pink" data-bs-toggle="tooltip" title="Pink" data-path="css/color-pink.css"></li>
	<li class="red" data-bs-toggle="tooltip" title="Red" data-path="css/color-red.css"></li>
    <li class="orange" data-bs-toggle="tooltip" title="Orange" data-path="css/color-orange.css"></li>
	<li class="yellow" data-bs-toggle="tooltip" title="Yellow" data-path="css/color-yellow.css"></li>
	<li class="teal" data-bs-toggle="tooltip" title="Teal" data-path="css/color-teal.css"></li>
    <li class="cyan" data-bs-toggle="tooltip" title="Cyan" data-path="css/color-cyan.css"></li>
    <li class="brown" data-bs-toggle="tooltip" title="Brown" data-path="css/color-brown.css"></li>
  </ul>
  <button class="btn btn-dark btn-sm border-0 fw-400 rounded-0 shadow-none" data-bs-toggle="tooltip" title="Green" id="reset-color">Reset Default</button>
  <button class="btn switcher-toggle"><i class="fas fa-cog"></i></button>
</div>
<!-- Styles Switcher End --> 

<!-- Script --> 
<script src="vendor/jquery/jquery.min.js"></script> 
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="js/switcher.min.js"></script> 
<script src="js/theme.js"></script>
</body>
</html>