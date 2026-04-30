<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once('__LIB__/connect.php'); // Include your database connection file

if (isset($_POST["passcode"])) {
    $submittedDigits = [
        $_POST["digit1"],
        $_POST["digit2"],
        $_POST["digit3"],
        $_POST["digit4"]
    ];

    // Check if the user is logged in and get their email address from the session
    if (isset($_SESSION["login"])) {
        $userEmail = $_SESSION["login"];

        // Database connection (use the provided code)
        if (class_exists('DATABASE_CONNECT')) {
            $obj_conn = new DATABASE_CONNECT;
            $host = $obj_conn->connect[0];
            $user = $obj_conn->connect[1];
            $pass = $obj_conn->connect[2];
            $db   = $obj_conn->connect[3];

            $conn = new mysqli($host, $user, $pass, $db);

            if ($conn->connect_error) {
                die("Cannot connect " . $conn->connect_error);
            }

            try {
                // Select the passcode from the database
                $stmt = $conn->prepare("SELECT passcode FROM code WHERE email = ?");
                $stmt->bind_param("s", $userEmail);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows === 1) {
                    $stmt->bind_result($storedPasscode);
                    $stmt->fetch();

                    if ($submittedDigits === str_split($storedPasscode)) {
                        // Passcode matches, redirect to the user's dashboard
                        header("Location: dashboard.php");
                        exit();
                    } else {
                        echo "Incorrect passcode. Please try again.";
                    }
                } else {
                    echo "No passcode found for the user.";
                }
            } catch (Exception $e) {
                echo "Database error: " . $e->getMessage();
            }
        }
    } else {
        // User is not logged in, handle authentication here or redirect to login page
        header("Location: login.php");
        exit();
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
<meta name="author" content="#">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

<!-- Stylesheet
============================================= -->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#" />
    <style>
        .pin-container {
            display: flex;
            justify-content: space-between;
            width: 150px;
            margin: 20px auto;
        }

        .pin-field {
            width: 30px;
            height: 40px;
            font-size: 24px;
            text-align: center;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
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
      <!-- Welcome Text
      ============================================= -->
      <div class="col-md-6">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8 bg-primary"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('./images/bg/image-3.jpg');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="row g-0">
              <div class="col-10 col-lg-9 mx-auto">
                <div class="logo mt-5 mb-5 mb-md-0">  </div>
              </div>
            </div>
            <div class="row g-0 my-auto">
              <div class="col-10 col-lg-9 mx-auto">
                 <p><img src="./images/logo3.png" /></p>
                <p class="text-4 text-white lh-base mb-5"><i>"Your Dreams, Our Commitment: First National Bank"</i></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Welcome Text End --> 
 <div class="col-md-6 d-flex align-items-center">
        <div class="container my-4">
          <div class="row g-0">
            <div class="col-11 col-lg-9 col-xl-8 mx-auto">
              <h3 class="fw-400 mb-4">2FA Authentication Required</h3>


    <form method="post">
        <div class="pin-container">
            <input class="pin-field" type="text" maxlength="1" name="digit1" required>&nbsp;
            <input class="pin-field" type="text" maxlength="1" name="digit2" required>&nbsp;
            <input class="pin-field" type="text" maxlength="1" name="digit3" required>&nbsp;
            <input class="pin-field" type="text" maxlength="1" name="digit4" required>&nbsp;
        </div>
        <div class="d-grid mb-3"><button class="btn btn-primary" type="submit" name="passcode">Verify</button></div>
    </form>
 </div>
          </div>
        </div>
      </div>
      <!-- Login Form End --> 
    </div>
  </div>
</div>

<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> 

<!-- Styles Switcher -->

<!-- Styles Switcher End --> 

<!-- Script --> 
<script src="vendor/jquery/jquery.min.js"></script> 
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<!-- Style Switcher --> 
<script src="js/switcher.min.js"></script> 
<script src="js/theme.js"></script>
</body>
</html>