<?php 
session_start();

if (isset($_POST['submit_step2'])) //Form Submission Check: This code checks whether the form with name 'submit_step1 has submitted
   {
       require_once('__LIB__/secure_data.php'); //Include Secure Data Class: This scripts includes a secure data handling class
         if (class_exists('SECURE_INPUT_DATA_AVAILABLE')) //it checks if the class 'SECURE_INPUT_DATA_AVAILABLE exists.
             {

                $obj_secure_data = new SECURE_INPUT_DATA; //If the class exists, an instance of the class 'SECURE_INPUT_DATA' is created.


              // get personal details from the customers
 

              $first_name             =  $obj_secure_data->SECURE_DATA_ENTER($_POST['first_name']);  //The script then uses this instance to sanitize and secure
              $last_name          =  $obj_secure_data->SECURE_DATA_ENTER($_POST['last_name']);   // user input values received via the '$_POST' array              
              $dob     =  $obj_secure_data->SECURE_DATA_ENTER($_POST['dob']);   //using the 'SECURE_DATA_ENTER' method


              // insert values to sessions 
       
          $_SESSION['first_name'] = $first_name;            //Storing Data in Sessions: The sanitized values are stored in session variables '$_SESSION['email']'
          $_SESSION['last_name'] = $last_name;
          $_SESSION['dob'] = $dob;

          $_SESSION['step2']=true;

          $destURL = "register3.php";       //The script redirects the user to another page
          header("Location: $destURL");
          

           }  // end of SECURE_INPUT_DATA_AVAILABLE class exists


         }  // end of submit_step1
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
              <h3 class="fw-400 mb-4">Step 2: Personal details</h3>
              <form id="loginForm" method="post">
                <div class="mb-3">
                  <label for="fullName" class="form-label">First Name</label>
                  <input type="text" name="first_name" class="form-control" id="fullName" required placeholder="Enter Your Name">
                </div>
				<div class="mb-3">
                  <label for="fullName" class="form-label">Last Name</label>
                  <input type="text" name="last_name" class="form-control" id="fullName" required placeholder="Enter Your Name">
                </div>
                <div class="mb-3">
                  <label for="emailAddress" class="form-label">Date Of Birth</label>
                  <input type="text" name="dob" class="form-control" id="dob" required placeholder="Enter Your DOB">
                </div>
               
				 
                <div class="d-grid mt-4 mb-3"><button class="btn btn-primary" name="submit_step2">Next Step</button></div>
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