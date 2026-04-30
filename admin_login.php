<?php
session_start();
error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);

if (isset($_POST['submit_admin'])) {
    require_once('__LIB__/secure_data.php');

    if (class_exists('SECURE_INPUT_DATA_AVAILABLE')) {
        $obj_secure_data = new SECURE_INPUT_DATA;

        $username = $obj_secure_data->SECURE_DATA_ENTER($_POST['username']);
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
                die("Cannot connect: " . $conn->connect_error);
            }

            try {
                // Sanitize and escape the input values
                $username = $conn->real_escape_string($username);
                $password = $conn->real_escape_string($password);

                $sql = "SELECT user, pass FROM admin WHERE user = '$username'";
                $result = $conn->query($sql);

                if ($result && $result->num_rows == 1) {
                    $row = $result->fetch_assoc();
                    $storedPassword = $row['pass'];

                    // Verify the plain password
                    if ($password === $storedPassword) {
                        $_SESSION['login'] = $username;
                        $_SESSION['timestamp'] = time();
                        echo "<script>location.href='admin_page.php'</script>";
                        exit();
                    } else {
                        echo "Invalid login details, please try again later.";
                    }
                } else {
                    echo "Invalid login details, please try again later.";
                }
            } catch (Exception $e) {
                echo "Database error: " . $e->getMessage();
            }

            $conn->close();
        } else {
            echo "Database connection class not found.";
        }
    } else {
        // Handle the case where SECURE_INPUT_DATA_AVAILABLE class is not found
        echo "Secure input data class not found.";
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
<title>Admin Login</title>
<meta name="description" content="#">
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

<div id="main-wrapper" class="min-vh-100 d-flex flex-column">
  <!-- Login Form
  ============================================= -->
  <div class="container my-auto"> 
    <div class="row g-0">
      <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 m-auto py-5">
        <div class="logo text-center"> <a href="admin_login.php" title="FNB - HTML Template"><img src="./images/logo2.png" alt="Payyed"></a> </div>
        <p class="lead text-center mb-4">We are glad to see you again!</p>
        <form id="loginForm" method="post">
          <div class="vertical-input-group">
            <div class="input-group">
              <input type="username" name="username" class="form-control" id="username" required placeholder="username">
            </div>
            <div class="input-group">
              <input type="password" name="password" class="form-control" id="loginPassword" required placeholder="Password">
            </div>
          </div>
          <div class="d-grid my-4"><button class="btn btn-primary shadow-none" type="submit" name="submit_admin" >Login</button></div>
        </form>
        
  
      </div>
    </div>
  </div>
  <!-- Login Form End -->
  
  <!-- Footer
  ============================================= -->
  <div class="container-fluid bg-white py-2">
    <p class="text-center text-muted mb-0">Copyright &copy; 2023 <a href="#">Fisrt National Bank</a>. All Rights Reserved.</p>
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