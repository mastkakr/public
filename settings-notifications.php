<?php
session_start(); // Start the session
if(!isset($_SESSION['login']))
    {
     header('Location: login.php');
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
		
    
	 // Execute the query to get transaction details
        $result_details_notify = $conn->query($sql_details_notify);
		
		// Check if there are transactions to display
        if ($result_details_notify && $result_details_notify->num_rows > 0) {
            // Initialize an array to store transaction data
            $notificationData = [];

       // Fetch and store transaction data in an array
        while ($row = $result_details_notify->fetch_assoc()) {
                $notificationData[] = $row;
            }

        // Check if there are transactions to display
        
      $lastFourDigits = substr($acc_number, -4);
	  $newAcc = "xxxx".$lastFourDigits;
	  
    } // end of else connect

    // Close the database connection
    $conn->close();
	}
}
// end of if class connect exists
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
          <div class="logo me-3"> <a class="d-flex" href="login.php" title="First National Bank"><img src="./images/logo2.png" alt="First National Bank" /></a> </div>
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
                  <li class="text-center text-3 py-2"><?php echo $firstname.  ' '  .$lastname ?></li>
                  <li class="dropdown-divider mx-n3"></li>
                  <li><a class="dropdown-item" href="settings-profile.php"><i class="fas fa-user"></i>My Profile</a></li>
                  <li><a class="dropdown-item" href="settings-Security.php"><i class="fas fa-shield-alt"></i>Security</a></li>
                  <li><a class="dropdown-item" href="settings-payment-methods.php"><i class="fas fa-credit-card"></i>Payment Methods</a></li>
                  <li><a class="dropdown-item" href="settings-notifications.php"><i class="fas fa-bell"></i>Notifications</a></li>
                  <li class="dropdown-divider mx-n3"></li>
                  <li><a class="dropdown-item" href="contact-us.php"><i class="fas fa-life-ring"></i>Need Help?</a></li>
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
  <div class="bg-primary">
    <div class="container d-flex justify-content-center">
      <ul class="nav nav-pills alternate nav-lg border-bottom-0">
        <li class="nav-item"> <a class="nav-link" href="settings-profile.php">Account</a></li>
        <li class="nav-item"> <a class="nav-link" href="settings-security.php">Security</a></li>
        <li class="nav-item"> <a class="nav-link" href="settings-payment-methods.php">Payment Methods</a></li>
        <li class="nav-item"> <a class="nav-link active" href="settings-notifications.php">Notifications</a></li>
      </ul>
    </div>
  </div>
  <!-- Secondary menu end --> 
  
  <!-- Content
  ============================================= -->
  <div id="content" class="py-4">
    <div class="container">
      <div class="row"> 
        <!-- Left Panel
        ============================================= -->
        <aside class="col-lg-3"> 
          
          <!-- Profile Details
          =============================== -->
          <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
            <div class="profile-thumb mt-3 mb-4"> <img class="rounded-circle" src="images/profile-thumb.jpg" alt="">
              <div class="profile-thumb-edit bg-primary text-white" data-bs-toggle="tooltip" title="Change Profile Picture"> <i class="fas fa-camera position-absolute"></i>
                <input type="file" class="custom-file-input" id="customFile">
              </div>
            </div>
            <p class="text-3 fw-500 mb-2">Hello, <?php echo $firstname.  ' '  .$lastname ?></p>
            <p class="mb-2"><a href="settings-profile.php" class="text-5 text-light" data-bs-toggle="tooltip" title="Edit Profile"><i class="fas fa-edit"></i></a></p>
          </div>
          <!-- Profile Details End --> 
          
          <!-- Available Balance
          =============================== -->
          <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-light my-3"><i class="fas fa-wallet"></i></div>
            <h3 class="text-5 fw-200">$<?php echo $acc_bal; ?></h3>
            <p class="mb-2 text-muted opacity-8">Available Balance</p>
            <hr class="mx-n3">
            <div class="d-flex"><h5 class="text-5 fw-200">Business Checking <?php echo $newAcc ?> </h5></div>
          </div>
          <!-- Available Balance End --> 
          
          <!-- Need Help?
          =============================== -->
          <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
            <div class="text-17 text-light my-3"><i class="fas fa-comments"></i></div>
            <h3 class="text-5 fw-400 my-4">Need Help?</h3>
            <p class="text-muted opacity-8 mb-4">Have questions or concerns regrading your account?<br>
              Our experts are here to help!.</p>
            <div class="d-grid"><a href="#" class="btn btn-primary">Chat with Us</a></div>
		  </div>
          <!-- Need Help? End --> 
          
        </aside>
        <!-- Left Panel End --> 
        
        <!-- Middle Panel
        ============================================= -->
        <div class="col-lg-9"> 
          
          <!-- Notifications
          ============================================= -->
          <div class="bg-white shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 fw-400">Notifications</h3>
            <p class="text-muted">Select subscriptions to be delivered to <span class="text-body"><?php $email; ?></span></p>
            <hr class="mx-n4">
            <form id="notifications" method="post">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="announcements" name="notifications" type="checkbox">
                <label class="form-check-label text-3" for="announcements">Announcements</label>
                <p class="text-muted lh-base mt-2 mb-0">Be the first to know about new features and other news.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="sendPayment" name="notifications" type="checkbox">
                <label class="form-check-label text-3" for="sendPayment">Send payment</label>
                <p class="text-muted lh-base mt-2 mb-0">Send an email when I send a payment.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="receiveApayment" name="notifications" type="checkbox">
                <label class="form-check-label text-3" for="receiveApayment">Receive a payment</label>
                <p class="text-muted lh-base mt-2 mb-0">Send me an email when I receive a payment.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="requestPayment" name="notifications" type="checkbox">
                <label class="form-check-label text-3" for="requestPayment">Request payment</label>
                <p class="text-muted lh-base mt-2 mb-0">Send me an email when i request payment.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="problemWithPayment" name="notifications" type="checkbox">
                <label class="form-check-label text-3" for="problemWithPayment">Have a problem with a payment</label>
                <p class="text-muted lh-base mt-2 mb-0">Send me an email when have a problem with a payment.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="specialOffers" name="notifications" type="checkbox">
                <label class="form-check-label text-3" for="specialOffers">Special Offers</label>
                <p class="text-muted lh-base mt-2 mb-0">Receive last-minute offers from us.</p>
              </div>
              <hr class="mx-n4">
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="reviewSurveys" name="notifications" type="checkbox">
                <label class="form-check-label text-3" for="reviewSurveys">Review Surveys</label>
                <p class="text-muted lh-base mt-2 mb-0">Share your payment experience to better inform users.</p>
              </div>
              <hr class="mx-n4">
              <button class="btn btn-primary mt-1" type="submit">Save Changes</button>
            </form>
          </div>
          <!-- Notifications End --> 
          
        </div>
        <!-- Middle Panel End --> 
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
<!-- Style Switcher --> 
<script src="js/switcher.min.js"></script> 
<script src="js/theme.js"></script>
</body>
</html>