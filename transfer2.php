<?php
session_start(); // Start the session

// Check if the session variable 'transfer' is set and true
if (isset($_SESSION['transfer']) && $_SESSION['transfer'] === true) {
    // Access the session variables set in transfer.php
    $acc_name = $_SESSION['account_name'];
    $bank_name = $_SESSION['bank_name'];
    $aba = $_SESSION['aba'];
    $acc_num = $_SESSION['account_number'];
    $amnt = $_SESSION['amnt'];
	$bank_address = $_SESSION['bank_address'];
	

    // You can now use these variables in your HTML

    if (isset($_POST['transfer2'])) {
        // Redirect to "transfer_auth.php" when the "transfer2" form is submitted
	
        $newUrl = "transfer_auth.php";
		$_SESSION['transfer2'] = true;
        header("Location: $newUrl");
        exit; // Don't forget to exit to prevent further execution
    }
} else {
    // The 'transfer' session variable is not set or not true
    echo "Transfer session is not active.";
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
<link rel="stylesheet" type="text/css" href="vendor/bootstrap-select/css/bootstrap-select.min.css" />
<link rel="stylesheet" type="text/css" href="vendor/currency-flags/css/currency-flags.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<!-- Colors Css -->
<link id="color-switcher" type="text/css" rel="stylesheet" href="#" />
</head>
<body>


<?php
require_once('__LIB__/connect.php');

// Check if the database connection class exists
if (class_exists('DATABASE_CONNECT')) {
    $obj_conn = new DATABASE_CONNECT;

    // Get connection parameters from the object
    $host = $obj_conn->connect[0];
    $user = $obj_conn->connect[1];
    $pass = $obj_conn->connect[2];
    $db = $obj_conn->connect[3];

    // Create a new mysqli connection
    $conn = new mysqli($host, $user, $pass, $db);

    // Check if the connection is successful
    if ($conn->connect_error) {
        die("Cannot connect " . $conn->connect_error);
    } else {
        // Get user's email from session
        $email = $_SESSION['login'];

        // Query to get user details
        $sql_details_user = "SELECT lastname, firstname, account_number, account_balance, email
                             FROM customers
                             WHERE email = '$email'";
							 
		$sql_details_notify = "SELECT created, title, message FROM notification WHERE email = '$email'";

        // Execute the query to get user details
        $result_details_user = $conn->query($sql_details_user);

        // Fetch user details
        $row_details_user = $result_details_user->fetch_assoc();
        $lastname = ucfirst($row_details_user['lastname']);
        $firstname = ucfirst($row_details_user['firstname']);
        $acc_number = $row_details_user['account_number'];
        $acc_bal = $row_details_user['account_balance'];
		$email = $row_details_user['email'];
		$lastFourDigits = substr($acc_number, -4);
	}
	
}
?>


<!-- Preloader -->
<div id="preloader">
  <div data-loader="dual-ring"></div>
</div>
<!-- Preloader End --> 

<!-- Document Wrapper   
============================================= -->
<div id="main-wrapper"> 
  <!-- Header
  ============================================= -->
  <header id="header">
    <div class="container">
      <div class="header-row">
        <div class="header-column justify-content-start"> 
          <!-- Logo
          ============================= -->
          <div class="logo me-3"> <a class="d-flex" href="index.html" title="First National Bank"><img src="images/logo2.png" alt="First National Bank" /></a> </div>
          <!-- Logo end --> 
          <!-- Collapse Button
          ============================== -->
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#header-nav"> <span></span> <span></span> <span></span> </button>
          <!-- Collapse Button end --> 
          
          <!-- Primary Navigation
          ============================== -->
          <nav class="primary-menu navbar navbar-expand-lg">
            <div id="header-nav" class="collapse navbar-collapse">
              <ul class="navbar-nav me-auto">
                 <li class="active"><a href="dashboard.php">Dashboard</a></li>
                <li><a href="transactions.php">Transactions</a></li>
                <li><a href="send-money.php">Direct Deposit</a></li>
                <li><a href="transfer.php">Fund Transfer</a></li>
				<li><a href="contact-us.php">Help</a></li>
                <li class="dropdown"> 
                  <ul class="dropdown-menu">
                    
                    <li class="dropdown">
                      <ul class="dropdown-menu">
                        
                      </ul>
                    </li>
                    <li class="dropdown">
                      <ul class="dropdown-menu">
                        
                      </ul>
                    </li>
                    <li class="dropdown">
                      <ul class="dropdown-menu">
                        
                      </ul>
                    </li>
                    <li class="dropdown">
                      <ul class="dropdown-menu">
                        
                      </ul>
                    </li>
                    
                  </ul>
                </li>
                <li class="dropdown dropdown-mega"> 
                  <ul class="dropdown-menu">
                    <li>
                      <div class="dropdown-mega-content">
                        <div class="row">
                          <div class="col-lg"> 
                            
                          </div>
                          <div class="col-lg"> 
                            <ul class="dropdown-mega-submenu">
                             
                                <ul class="dropdown-menu">
                                  
                                </ul>
                              </li>
                              
                            </ul>
                          </div>
                          <div class="col-lg"> 
                            <ul class="dropdown-mega-submenu">
                              
                              <li class="dropdown">
                                <ul class="dropdown-menu">
                                  
                                </ul>
                              </li>
                              <li class="dropdown">
                                <ul class="dropdown-menu">
                                  
                                </ul>
                              </li>
                              <li class="dropdown">
                                <ul class="dropdown-menu">
                                  
                                </ul>
                              </li>
                              <li class="dropdown">
                                <ul class="dropdown-menu">
                                  
                                </ul>
                              </li>
                              
                            </ul>
                          </div>
                          <div class="col-lg"> 
                            <ul class="dropdown-mega-submenu">
                              
                            </ul>
                          </div>
                          <div class="col-lg"> 
                            <ul class="dropdown-mega-submenu">
                              
                              
                              
                            </ul>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- Primary Navigation end --> 
        </div>
        <div class="header-column justify-content-end"> 
          <!-- My Profile
          ============================== -->
          <nav class="login-signup navbar navbar-expand">
            <ul class="navbar-nav">
              <li class="dropdown language"> <a class="dropdown-toggle" href="#">En</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">English</a></li>
                  <li><a class="dropdown-item" href="#">Spanish</a></li>
                  
                </ul>
              </li>
              <li class="dropdown notifications"> <a class="dropdown-toggle" href="#"><span class="text-5"><i class="far fa-bell"></i></span><span class="count">3</span></a>
                <ul class="dropdown-menu">
                  <li class="text-center text-3 py-2">Notifications (3)</li>
                  <li class="dropdown-divider mx-n3"></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-bell"></i>A new digital FIRC document is available for you to download<span class="text-1 text-muted d-block">22 Jul 2021</span></a></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-bell"></i>Updates to our privacy policy. Please read.<span class="text-1 text-muted d-block">04 March 2021</span></a></li>
                  <li><a class="dropdown-item" href="#"><i class="fas fa-bell"></i>Update about Payyed fees<span class="text-1 text-muted d-block">18 Feb 2021</span></a></li>
                  <li class="dropdown-divider mx-n3"></li>
                  <li><a class="dropdown-item text-center text-primary px-0" href="notifications.html">See all Notifications</a></li>
                </ul>
              </li>
              <li class="dropdown profile ms-2"> <a class="px-0 dropdown-toggle" href="#"><img class="rounded-circle" src="images/profile-thumb-sm.jpg" alt=""></a>
                <ul class="dropdown-menu">
                  <li class="text-center text-3 py-2">Hi, <?php echo $firstname. ' ' .$lastname;?></li>
                  <li class="dropdown-divider mx-n3"></li>
                  <li><a class="dropdown-item" href="settings-profile.php"><i class="fas fa-user"></i>My Profile</a></li>
                  <li><a class="dropdown-item" href="settings-Security.php"><i class="fas fa-shield-alt"></i>Security</a></li>
                  <li><a class="dropdown-item" href="settings-payment-methods.php"><i class="fas fa-credit-card"></i>Payment Methods</a></li>
                  <li><a class="dropdown-item" href="settings-notifications.php"><i class="fas fa-bell"></i>Notifications</a></li>
                  <li class="dropdown-divider mx-n3"></li>
                  <li><a class="dropdown-item" href="help.php"><i class="fas fa-life-ring"></i>Need Help?</a></li>
                  <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>Sign Out</a></li>
                </ul>
              </li>
            </ul>
          </nav>
          <!-- My Profile end --> 
        </div>
      </div>
    </div>
  </header>
  <!-- Header End --> 
  
  <!-- Secondary menu
  ============================================= -->
  <div class="bg-white">
    <div class="container d-flex justify-content-center">
      <ul class="nav nav-tabs nav-lg border-bottom-0">
        <li class="nav-item"> <a class="nav-link" href="#">Deposit</a></li>
        <li class="nav-item"> <a class="nav-link active" href="#">Withdraw</a></li>
      </ul>
    </div>
  </div>
  <!-- Secondary menu end --> 
  
  <!-- Content
  ============================================= -->
  <div id="content" class="py-4">
    <div class="container"> 
      
      <!-- Steps Progress bar -->
      <div class="row mt-4 mb-5">
        <div class="col-lg-11 mx-auto">
          <div class="row widget-steps">
            <div class="col-4 step complete">
              <div class="step-name">Details</div>
              <div class="progress">
                <div class="progress-bar"></div>
              </div>
              <a href="withdraw-money.html" class="step-dot"></a> </div>
            <div class="col-4 step active">
              <div class="step-name">Confirm</div>
              <div class="progress">
                <div class="progress-bar"></div>
              </div>
              <a href="#" class="step-dot"></a> </div>
            <div class="col-4 step disabled">
              <div class="step-name">Success</div>
              <div class="progress">
                <div class="progress-bar"></div>
              </div>
              <a href="#" class="step-dot"></a> </div>
          </div>
        </div>
      </div>
      <h2 class="fw-400 text-center mt-3 mb-4">Withdraw Money</h2>
      <div class="row">
        <div class="col-md-9 col-lg-7 col-xl-6 mx-auto"> 
          <!-- Withdraw Money Confirm
          ============================================= -->
		   <form id="form-withdraw-money-confirm" method="post">
          <div class="bg-white shadow-sm rounded p-3 pt-sm-5 pb-sm-5 px-sm-5 mb-4">
            <p class="lead text-center alert alert-info">Withdraw Money<br>
             From<br>
              <span class="fw-500">FNB - XXXXXXXXXXXX-<?php echo $lastFourDigits ?></span></p>
			
            <p class="text-4 fw-500">Account Name<span class="float-end"><?php
echo $acc_name;?></span></p>
			<hr>
            <p class="text-4 fw-500">Bank Name<span class="float-end"><?php echo $bank_name;?>  </span></p>
            <hr>
            <p class="text-4 fw-500">ABA Routing<span class="float-end"><?php echo $aba; ?></span></p>
			
			<hr>
			<p class="text-4 fw-500">Account Number<span class="float-end">  <?php echo $acc_num; ?> </span></p>
			<hr>
			<p class="text-4 fw-500">Amount<span class="float-end"> <?php echo $amnt; ?>USD</span></p> 
			<hr>
			<p class="text-4 fw-500">Bank Address<span class="float-end"> <?php echo $bank_address; ?></span></p><br>
			<hr>
			
			
			
           
              <div class="d-grid"><button class="btn btn-primary" name="transfer2">Transfer Fund</button></div>
            </form>
          </div>
          <!-- Withdraw Money Confirm end --> 
        </div>
      </div>
    </div>
  </div>
  <!-- Content end --> 
  
  <!-- Footer
  ============================================= -->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg d-lg-flex align-items-center">
          <ul class="nav justify-content-center justify-content-lg-start text-3">
            <li class="nav-item"> <a class="nav-link active" href="#">About Us</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Support</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Help</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Careers</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Affiliate</a></li>
            <li class="nav-item"> <a class="nav-link" href="#">Fees</a></li>
          </ul>
        </div>
        <div class="col-lg d-lg-flex justify-content-lg-end mt-3 mt-lg-0">
          <ul class="social-icons justify-content-center">
            <li class="social-icons-facebook"><a data-bs-toggle="tooltip" href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
            <li class="social-icons-twitter"><a data-bs-toggle="tooltip" href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
            <li class="social-icons-google"><a data-bs-toggle="tooltip" href="http://www.google.com/" target="_blank" title="Google"><i class="fab fa-google"></i></a></li>
            <li class="social-icons-youtube"><a data-bs-toggle="tooltip" href="http://www.youtube.com/" target="_blank" title="Youtube"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
      <div class="footer-copyright pt-3 pt-lg-2 mt-2">
        <div class="row">
          <div class="col-lg">
            <p class="text-center text-lg-start mb-2 mb-lg-0">Copyright &copy; 2023 <a href="#">First National Bank</a>. All Rights Reserved.</p>
          </div>
          <div class="col-lg d-lg-flex align-items-center justify-content-lg-end">
            <ul class="nav justify-content-center">
              <li class="nav-item"> <a class="nav-link active" href="#">Security</a></li>
              <li class="nav-item"> <a class="nav-link" href="#">Terms</a></li>
              <li class="nav-item"> <a class="nav-link" href="#">Privacy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Footer end --> 
  
</div>
<!-- Document Wrapper end --> 

<!-- Back to Top
============================================= --> 
<a id="back-to-top" data-bs-toggle="tooltip" title="Back to Top" href="javascript:void(0)"><i class="fa fa-chevron-up"></i></a> 

<!-- Styles Switcher -->

<!-- Styles Switcher End --> 

<!-- Script --> 
<script src="vendor/jquery/jquery.min.js"></script> 
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> 
<script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script> 
<!-- Style Switcher --> 
<script src="js/switcher.min.js"></script> 
<script src="js/theme.js"></script>
</body>
</html>