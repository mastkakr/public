<?php 
session_start();
error_reporting(E_ALL | E_WARNING | E_NOTICE);
ini_set('display_errors', TRUE);



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
<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css" />
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
                <li class="active"><a href="register.php">New Account</a></li>
                <li><a href="update_tran.php">Transaction </a></li>
                <li><a href="code_pin.php">PassCode/Pin</a></li>
                <li><a href="update_bal.php">Update Balance</a></li>
				<li><a href="update_status.php">Update Status</a></li>
				<li><a href="admin_page.php"> Back </a></li>
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
                 
                </ul>
              </li>
              <li class="dropdown notifications"> <a class="dropdown-toggle" href="#"><span class="text-5"><i class="far fa-bell"></i></span><span class="count">3</span></a>
               
              </li>
              <li class="dropdown profile ms-2"> <a class="px-0 dropdown-toggle" href="#"><img class="rounded-circle" src="images/profile-thumb-sm.jpg" alt=""></a>
              
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
          
          <!-- Profile Details End --> 
          
          <!-- Available Balance
          =============================== -->
          
          <!-- Available Balance End --> 
          
          <!-- Need Help?
          =============================== -->
          
          <!-- Need Help? End --> 
          
        </aside>
        <!-- Left Panel End -->
        
        <!-- Middle Panel
        ============================================= -->
        <div class="col-lg-12">
         
          
          <!-- Filter
          ============================================= -->
          <div class="row">
            <div class="col mb-2">
          
                  <!-- Date Range
                  ========================= -->
                  
                  <!-- All Filters Link
                  ========================= -->
                 
				  <!-- Statements Link
                  ========================= -->
               
                  
                  <!-- All Filters collapse
                  ================================ -->
                  
          <!-- Filter End --> 
          
          <!-- All Transactions
          ============================================= -->
		  
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
        // Query to get user details sorted by ID in ascending order
        $sql_details_user = "SELECT email, passcode, passpin
                             FROM code
                             ORDER BY id ASC"; // Modify this line to sort by ID

        // Execute the query to get user details
        $result_details_user = $conn->query($sql_details_user);

        if (!$result_details_user) {
            die("Error in query: " . $conn->error);
        }

        // Check if there are rows returned
        if ($result_details_user->num_rows > 0) {
            // Loop through the results and store data in an array
            $users = array();
            while ($row_details_user = $result_details_user->fetch_assoc()) {
                $email = ucfirst($row_details_user['email']);
                $passcode = ucfirst($row_details_user['passcode']);
                $passpin = $row_details_user['passpin'];
                

                // Store user data in an array
                $users[] = [
                    'email' => $email,
                    'passcode' => $passcode,
                    'passpin' => $passpin,
                ];
            }

            // Now, $users array contains all user data sorted by ID in ascending order

            // You can use $users to display user data or manipulate it as needed
        } else {
            echo "No users found in the database.";
        }
    } // end of else connect

    // Close the database connection
    $conn->close();
}
?>





          <div class="bg-white shadow-sm rounded py-6 mb-6">
            
            <!-- Title
            =============================== -->
            <div class="transaction-title py-2 px-4">
              <div class="row fw-00">
                <div class="col-auto col-sm-2 d-none d-sm-block text-center">Email</div>

                <div class="col-auto col-sm-2 d-none d-sm-block text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login 2fa code</div>
				<div class="col-auto col-sm-2 d-none d-sm-block text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transfer PinCode</div>
				
                
              </div>
            </div>
            <!-- Title End --> 
            <script>
    function refreshPage() {
        location.reload(); // This line reloads the current page
    }
</script>

            <!-- Transaction List
            =============================== -->
          <?php
if (!empty($users)) {
    foreach ($users as $user) {
        $email = $user['email'];
        $passcode = $user['passcode'];
        $passpin = $user['passpin'];

        echo "<div class='transaction-list'>
              <div class='transaction-item px-4 py-4' data-bs-toggle='modal' data-bs-target='#transaction-detail'>
                <div class='row align-items-center flex-row'>
                  <div class='col col-sm-2'> <span class='d-block text-4 fw-300'>$email</span> </div>
                  <div class='col col-sm-2'> <span class='d-block text-4'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$passcode</span> </div>
                  <div class='col col-sm-2'> <span class='text-nowrap'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$passpin</span> </div>
                  
                </div>
              </div>
            </div>";
    }
} else {
    echo "No users found in the database.";
}
?>
<div class="d-grid my-4"><button class="btn btn-primary shadow-none" type="submit" onclick="refreshPage()">Get Code Or Pin</button></div>

            </div>
            <!-- Transaction List End --> 
            
            <!-- Transaction Item Details Modal>
            =========================================== -->
            
            <!-- Transaction Item Details Modal End -->  
            
            <!-- Pagination
            ============================================= -->
            
            <!-- Paginations end --> 
            
          </div>
          <!-- All Transactions End --> 
        </div>
        <!-- Middle End --> 
      </div>
    </div>
  </div>
  <!-- Content end --> 
  
  <!-- Footer
  ============================================= -->
 
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
<script src="vendor/daterangepicker/moment.min.js"></script> 
<script src="vendor/daterangepicker/daterangepicker.js"></script> 
<script>
$(function() {
 'use strict';
 
 // Date Range Picker
 $(function() {
    var start = moment().subtract(29, 'days');
    var end = moment();
    function cb(start, end) {
        $('#dateRange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }
    $('#dateRange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    cb(start, end);
});
});
</script> 
<!-- Style Switcher --> 
<script src="js/switcher.min.js"></script> 
<script src="js/theme.js"></script>
</body>
</html>