<?php
session_start();
error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);

if (isset($_POST['update4'])) {
    require_once('__LIB__/secure_data.php'); 
    if (class_exists('SECURE_INPUT_DATA_AVAILABLE')) {
        $obj_secure_data = new SECURE_INPUT_DATA; 

        // Get personal details from the customers
        $email = $obj_secure_data->SECURE_DATA_ENTER($_POST['email']);  
        $status = $obj_secure_data->SECURE_DATA_ENTER($_POST['status']);            

        // Insert data into the database
        require_once('__LIB__/connect.php');

        if (class_exists('DATABASE_CONNECT')) {
            $obj_conn = new DATABASE_CONNECT;
            $conn = new mysqli($obj_conn->connect[0], $obj_conn->connect[1], $obj_conn->connect[2], $obj_conn->connect[3]);

            if ($conn->connect_error) {
                die("Cannot connect: " . $conn->connect_error);
            } else {
                // Prepare the SQL Statement to retrieve user's ID
                $stmt = $conn->prepare("SELECT user_id FROM customers WHERE email = ?");
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $stmt->bind_result($user_id);
                $stmt->fetch();
                $stmt->close();

                // Prepare the UPDATE statement for transactions
                $update_sql = "UPDATE customers SET account_type = ? WHERE email = ?";
                $update_stmt = $conn->prepare($update_sql);

                // Check if prepare was successful
                if (!$update_stmt) {
                    die("Error preparing statement: " . $conn->error);
                }

                // Bind the parameters
                $update_stmt->bind_param("ss", $status , $email);

                // Execute the UPDATE query
                if ($update_stmt->execute()) {
                    echo '<div class="registration-message">
                            <h2>Update Completed!</h2>
                          </div>';
                   
                } else {
                    echo "Error executing query: " . $update_stmt->error;
                }

                // Close the statement
                $update_stmt->close();
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
<title>Update Transaction Details</title>
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

<div id="main-wrapper" class="min-vh-100 d-flex flex-column">
  <!-- SignUp Form
  ============================================= -->
  <div class="container my-auto">
    <div class="row g-0">
      <div class="col-11 col-sm-9 col-md-7 col-lg-5 col-xl-4 m-auto py-5">
        <div class="logo text-center"> <a href="index.html" title="Payyed - HTML Template"><img src="images/logo-lg.png" alt="Payyed"></a> </div>
        <p class="lead text-center mb-4">INSTRUCTION: You can only change the STATUS to active or block.<br>
		                                   If you want the account to be accessible put "active" <br>
										   if you want the account NOT be accessible put "block"<br>
										   Remember only in small letters.</p>
        <form id="loginForm" method="post">
          <div class="vertical-input-group">
            <div class="input-group">
          
			<div class="input-group">
              <input type="text" name="status" class="form-control" id="Status" required placeholder="Status">
            </div>
			<div class="input-group">
              <input type="text" name="email" class="form-control" id="loginPassword" required placeholder="Email Address">
            </div>
          </div>
          <div class="d-grid my-4"><button class="btn btn-primary shadow-none" type="submit" name="update4">Update Status</button></div>
        </form>
        <p class="text-3 text-center text-muted">Already have an account? <a class="btn-link" href="admin_page.php">HOME</a></p>
      </div>
    </div>
  </div>
  <!-- SignUp Form End -->
  
  <!-- Footer
  ============================================= -->
  <div class="container-fluid bg-white py-2">
    <p class="text-center text-muted mb-0">Copyright &copy; 2023 <a href="#">First National Bank</a>. All Rights Reserved.</p>
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