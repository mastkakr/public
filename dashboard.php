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
<title>First National Bank Of America</title>
<meta name="description" content="This professional design html template is for build a Money Transfer and online payments website.">
<meta name="author" content="harnishdesign.net">

<!-- Web Fonts
============================================= -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

<!-- Stylesheet
============================================= -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="vendor/font-awesome/css/all.min.css" />
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
<!-- Colors Css -->

</head>
<body>




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
        $sql_details_user = "SELECT lastname, firstname, account_number, account_balance, identity_back_data
                             FROM customers
                             WHERE email = '$email'";

        $sql_details_trans = "SELECT date, identification, description, trans_method, trans_status, trans_amount 
                              FROM transactions
                              WHERE email = '$email'";

        // Execute the query to get user details
        $result_details_user = $conn->query($sql_details_user);

        // Fetch user details
        $row_details_user = $result_details_user->fetch_assoc();
        $lastname = ucfirst($row_details_user['lastname']);
        $firstname = ucfirst($row_details_user['firstname']);
        $acc_number = $row_details_user['account_number'];
        $acc_bal = $row_details_user['account_balance'];
		$image_path = $row_details_user['identity_back_data'];

        // Execute the query to get transaction details
        $result_details_trans = $conn->query($sql_details_trans);

        // Check if there are transactions to display
        if ($result_details_trans && $result_details_trans->num_rows > 0) {
            // Initialize an array to store transaction data
            $transactionData = [];

            // Fetch and store transaction data in an array
            while ($row = $result_details_trans->fetch_assoc()) {
                $transactionData[] = $row;
            }
      $lastFourDigits = substr($acc_number, -4);
	  $newAcc = "xxxx".$lastFourDigits;
	  $imageUrl = "uploads/" . $image_path;
	  
    } // end of else connect

    // Close the database connection
    $conn->close();
	}
}// end of if class connect exists
?>
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
                  <li><a class="dropdown-item text-center text-primary px-0" href="notifications.php">See all Notifications</a></li>
                </ul>
              </li>
              <li class="dropdown profile ms-2"> <a class="px-0 dropdown-toggle" href="#">


</a>
                <ul class="dropdown-menu">
                  <li class="text-center text-3 py-2">Hello, <?php echo $firstname . ' ' . $lastname; ?></li>
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
            <div class="profile-thumb mt-3 mb-4"> 
              <div class="profile-thumb-edit bg-primary text-white" data-bs-toggle="tooltip" title="Change Profile Picture"> <i class="fas fa-camera position-absolute"></i>
                <input type="file" class="custom-file-input" id="customFile">
              </div>
            </div>
            <p class="text-3 fw-500 mb-2">Hello, <?php echo $firstname . ' ' . $lastname; ?></p>
            <p class="mb-2"><a href="settings-profile.html" class="text-5 text-light" data-bs-toggle="tooltip" title="Edit Profile"><i class="fas fa-edit"></i></a></p>
          </div>
          <!-- Profile Details End --> 
          
          <!-- Available Balance
          =============================== -->
          <div class="bg-white shadow-sm rounded text-center p-3 mb-4">
		     <h3 class="text-2 fw-0">Current Information</h3>
            <div class="text-17 text-light my-3"><i class="fas fa-wallet"></i></div>
            <h3 class="text-5 fw-200">$<?php echo $acc_bal ?></h3>
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
		
		<?php
// Set the default timezone to the user's timezone (you may want to change this based on your requirements)
date_default_timezone_set('America/New_York');

// Get the current time
$current_time = date('H:i'); // Hour and minute (24-hour format)

// Format the current date as "Month Day, Year"
$current_date = date('F j, Y');

// Determine the time of the day
if (date('H') < 12) {
    $time_of_day = 'Good Morning';
} elseif (date('H') < 17) {
    $time_of_day = 'Good Afternoon';
} else {
    $time_of_day = 'Good Evening';
}

// Display the welcome message

?>

          
          <!-- Profile Completeness
          =============================== -->
          <div class="bg-white shadow-sm rounded p-4 mb-4">
            <h3 class="text-5 fw-400 d-flex align-items-center mb-4"><?php echo "$time_of_day, Time is $current_time, $current_date";?></h3>
            <hr class="mb-4 mx-n4">
            <div class="row gy-4 profile-completeness">
              <div class="col-sm-6 col-md-3">
			  
                <div class="border rounded text-center px-3 py-4"><h3 class="text-4 fw-100">Checking <?php echo $newAcc; ?></h3> <span class="d-block text-10 text-light mt-2 mb-3"><i class="fas fa-wallet"></i></span> <span class="text-5 d-block text-success mt-4 mb-3"><h3 class="text-5 fw-200">$<?php echo $acc_bal ?></h3></span>
				
                  <p class="mb-0">Available Balance</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="border rounded text-center px-3 py-4"> <h3 class="text-4 fw-100">Checking <?php echo $newAcc; ?></h3><span class="d-block text-10 text-light mt-2 mb-3"><i class="fas fa-wallet"></i></span> <span class="text-5 d-block text-success mt-4 mb-3"><h3 class="text-5 fw-200">$<?php echo $acc_bal ?></h3></span>
                  <p class="mb-0">Current Balance</p>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="position-relative border rounded text-center px-3 py-4"> <span class="d-block text-10 text-light mt-2 mb-3"><i class="fas fa-credit-card"></i></span> <span class="text-5 d-block text-light mt-4 mb-3"><i class="far fa-circle "></i></span>
                  <p class="mb-0"><a class="btn-link stretched-link" href="settings-payment-methods.php">Add Card</a></p>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="position-relative border rounded text-center px-3 py-4"> <span class="d-block text-10 text-light mt-2 mb-3"><i class="fas fa-university"></i></span> <span class="text-5 d-block text-light mt-4 mb-3"><i class="far fa-circle "></i></span>
                  <p class="mb-0"><a class="btn-link stretched-link" href="settings-payment-methods.php">Add Bank Account</a></p>
                </div>
              </div>
            </div>
          </div>
          <!-- Profile Completeness End --> 
          
          <!-- Recent Activity
          =============================== -->
          <div class="bg-white shadow-sm rounded py-4 mb-4">
            <h3 class="text-5 fw-400 d-flex align-items-center px-4 mb-4">Recent Activity</h3>
            
            <!-- Title
            =============================== -->
            <div class="transaction-title py-2 px-4">
              <div class="row fw-00">
                <div class="col-4 col-sm-1 text-center"><span class="">Date</span></div>
                <div class="col-auto col-sm-2 d-none d-sm-block text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transaction ID</div>
				<div class="col-auto col-sm-2 d-none d-sm-block text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Description</div>
				<div class="col-auto col-sm-2 d-none d-sm-block text-center"></div>
                <div class="col-auto col-sm-2 d-none d-sm-block text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status</div>
                <div class="col-auto col-sm-2 d-none d-sm-block text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Amount</div>
              </div>
            </div>
            <!-- Title End --> 
            
            <!-- Transaction List
            =============================== -->
			
<?php



// Separate PHP tag for generating HTML for transactions
if (isset($transactionData) && count($transactionData) > 0) {
    foreach ($transactionData as $transaction) {
        $dat = $transaction['date'];
        $iden = $transaction['identification'];
        $desc = $transaction['description'];
        $trans_me = $transaction['trans_method'];
        $tran_s = $transaction['trans_status'];
        $tran_amt = $transaction['trans_amount'];
        ?>
        <div class="transaction-list">
            <div class="transaction-item px-4 py-3" data-bs-toggle="modal" data-bs-target="#transaction-detail">
                <div class="row align-items-center flex-row">
                    <div class="col-2 col-sm-1 text-center"> <span class="d-block text-2 fw-100"><?= $dat ?></span> <span class="d-block text-1 fw-300 text-uppercase"></span> </div>
                    <div class="col-auto col-sm-4 d-none d-sm-block text-center text-3"> <span><?= $iden ?></span> </div>
                    <div class="col col-sm-3"> <span class="d-block text-4"><?= $desc ?></span> <span class="text-muted"><?= $trans_me ?></span> </div>
                    <div class="col-auto col-sm-2 d-none d-sm-block text-center text-3">
                        <?php
                        if ($tran_s == 'pending') {
                            echo '<span class="text-warning" data-bs-toggle="tooltip" title="In Progress">Pending</span>';
                        } elseif ($tran_s == 'completed') {
                            echo '<span class="text-success" data-bs-toggle="tooltip" title="Completed">Completed</span>';
                        } else {
                            echo 'No status';
                        }
                        ?>
                    </div>
                    <div class="col-3 col-sm-2 text-end text-4"> <span class="text-nowrap">- <?= $tran_amt ?></span> <span class="text-2 text-uppercase">(USD)</span> </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo 'No transactions available.';
}

?>
              
              
              
              
              
              
              </div>
            </div>
			


            <!-- Transaction List End --> 
            
            <!-- Transaction Item Details Modal
            =========================================== -->
           
            <!-- Transaction Item Details Modal End --> 
            
            <!-- View all Link
            =============================== -->
            <div class="text-center mt-4"><a href="transactions.html" class="btn-link text-3">View all<i class="fas fa-chevron-right text-2 ms-2"></i></a></div>
            <!-- View all Link End --> 
            
          </div>
          <!-- Recent Activity End --> 
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
            <p class="text-center text-lg-start mb-2 mb-lg-0">Copyright &copy; 2023 <a href="#">First Nation Bank</a>. All Rights Reserved.</p>
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