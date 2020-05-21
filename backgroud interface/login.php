<?php

// 1. Open database connection
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Group3666";
$dbname = "funeral_service";

$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Test if connection is ok
if (mysqli_connect_errno()) {
    die("Database connection failed: " .
        mysqli_connect_error() .
        " (" . mysqli_connect_errno() . ")" 
    );
}



if (isset($_POST['submit'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        $error = "username or password is empty";
    } else { 
        // Save username & password in a variable
        $username = $_POST['username'];
        $password = $_POST['password'];

        // 2. Prepare query
        $query  = "SELECT username, password, level "; 
        $query .= "FROM user ";
        $query .= "WHERE username = '$username' AND password = '$password' ";

        // 2. Execute query
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("query is wrong");
        }

        // Save data to $row
        $row = mysqli_fetch_array($result);
        
        // Check how many answers did we get
        $numrows=mysqli_num_rows($result);
        if ($numrows == 1) {
            // Start to use sessions
            session_start();
            
            // Create session variables
            $_SESSION['login_user'] = $username;
			$_SESSION['login_level'] = $row['level'];
            
			if ($_SESSION['login_level'] == 3) {
				header('location: manager.php');
			} else if ($_SESSION['login_level'] == 1) {
				header('location: user.php');
			
	 
            
        } else {
            echo "Login failed";
        }
       } 
        // 4. free results
        mysqli_free_result($result);
}
}
// 5. close db connection
mysqli_close($connection);

?>

<?php

//require('includes/header.php');

if (isset($error)) {
    echo "<span>" . $error ."</span>";
}

?>


           
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Funeral Service-Product Information</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h2 class="h4 text-gray-900 mb-4">Welcome Back, Managers!</h2>
                  </div>
                    
                    
                  <form class="user" action="login.php" method="POST">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user"  placeholder="Enter Username...">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <input type="submit" name="submit" value="Login" class="btn btn-primary btn-user btn-block">
                        
                    
                    <hr>
                  
                  </form>
                  
                  <div class="text-center">
                    <h6><a class="small" href="forgot-password.html">Forgot Password?</a></h6>
                  </div>
                  <div class="text-center">
                      <h6><a class="small" href="register.html">Create an Account!</a></h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

