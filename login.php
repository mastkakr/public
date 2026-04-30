<?php
session_start();
error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);

if (isset($_POST['submit_login'])) {
    require_once('__LIB__/secure_data.php');

    if (class_exists('SECURE_INPUT_DATA_AVAILABLE')) {
        $obj_secure_data = new SECURE_INPUT_DATA;

        $email = $obj_secure_data->SECURE_DATA_ENTER($_POST['email']);
        $password = $obj_secure_data->SECURE_DATA_ENTER($_POST['password']);

        require_once('__LIB__/connect.php');

        if (class_exists('DATABASE_CONNECT')) {
            $obj_conn = new DATABASE_CONNECT;
            $host = $obj_conn->connect[0];
            $user = $obj_conn->connect[1];
            $pass = $obj_conn->connect[2];
            $db = $obj_conn->connect[3];

            $conn = new mysqli($host, $user, $pass, $db);

            if ($conn->connect_error) {
                die("Cannot connect " . $conn->connect_error);
            }

            try {
                // Check if there is an existing row with the user's email in the 'code' table
                $stmt = $conn->prepare("SELECT passcode FROM code WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->store_result();

                if ($stmt->num_rows === 1) {
                    // An existing row with the user's email was found, proceed to update the passcode
                    $randomPasscode = mt_rand(1000, 9999);
                    $stmt = $conn->prepare("UPDATE code SET passcode = ? WHERE email = ?");
                    $stmt->bind_param("is", $randomPasscode, $email);
                    $stmt->execute();
                } else {
                    // No existing row with the user's email was found, create a new row
                    $randomPasscode = mt_rand(1000, 9999);
                    $stmt = $conn->prepare("INSERT INTO code (email, passcode) VALUES (?, ?)");
                    $stmt->bind_param("si", $email, $randomPasscode);
                    $stmt->execute();
                }

                // Rest of your authentication logic here...

                $email     =  $conn->real_escape_string($email);
                $password  =  $conn->real_escape_string($password);

                $sql = "select email,password,account_type from customers where email='$email'";
                $result = $conn->query($sql);
                $count =  $result->num_rows;

                if ($count == 1) {
                    while  ($row = $result->fetch_assoc()) {
                        if ($row['account_type'] != 'active') {
                            echo "
                            <div class='alert alert-danger' role='alert'>
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                <strong> Your account is not activated </strong>.
                            </div>";
                        } else if ($row['account_type'] == 'active') {
                            if ($row['email'] != $email) {
                                echo "
                                <div class='alert alert-danger' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    <strong> Your Login </strong> Email is invalid.
                                </div>";
                            }
                            if ($row['password'] != $password) {
                                echo "
                                <div class='alert alert-danger' role='alert'>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                    <strong> Your Login </strong> Password is invalid.
                                </div>";
                            }
                            if ($row['email'] == $email && $row['password'] == $password ) {
                                $_SESSION['login'] = $email;
                                $_SESSION['timestamp'] = time();
                                echo ("<script>location.href='auth.php'</script>");
                            }
                        }
                    }
                } else {
                    // Handle errors for no user found
                }

                $conn->close();
            } catch (Exception $e) {
                echo "Database error: " . $e->getMessage();
            }
        } else {
            echo "Database connection class not found.";
        }
    } else {
        // Handle the case where SECURE_INPUT_DATA_AVAILABLE class is not found
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
      <!-- Welcome Text
      ============================================= -->
      <div class="col-md-6">
        <div class="hero-wrap d-flex align-items-center h-100">
          <div class="hero-mask opacity-8 bg-primary"></div>
          <div class="hero-bg hero-bg-scroll" style="background-image:url('/images/bg/image-3.jpg');"></div>
          <div class="hero-content mx-auto w-100 h-100 d-flex flex-column">
            <div class="row g-0">
              <div class="col-10 col-lg-9 mx-auto">
                <div class="logo mt-5 mb-5 mb-md-0"> </div>
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
      
      <!-- Login Form
      ============================================= -->
      <div class="col-md-6 d-flex align-items-center">
        <div class="container my-4">
          <div class="row g-0">
            <div class="col-11 col-lg-9 col-xl-8 mx-auto">
              <h3 class="fw-400 mb-4">Log In</h3>
              <form id="loginForm" method="post">
                <div class="mb-3">
                  <label for="emailAddress" class="form-label">Email Address</label>
                  <input type="email" name="email" class="form-control" id="emailAddress" required placeholder="Enter Your Email">
                </div>
                <div class="mb-3">
                  <label for="loginPassword" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="loginPassword" required placeholder="Enter Password">
                </div>
                <div class="row mb-3">
                  <div class="col-sm">
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" id="remember-me" name="remember" type="checkbox">
                      <!-- <label class="form-check-label" for="remember-me">Remember Me</label> -->
                    </div>
                  </div>
                  <div class="col-sm text-end"><a class="btn-link" href="#">Forgot Password ?</a></div>
                </div>
                <div class="d-grid mb-3"><button class="btn btn-primary" type="submit" name="submit_login">Login</button></div>
              </form>
              <p class="text-3 text-center text-muted">Don't have an account? <a class="btn-link" href="page-register.php">Enroll</a></p>
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