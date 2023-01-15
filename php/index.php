<?php

include('UserDefinedLibrary.php');

// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("Location: ../php/home.php");
    exit;
}




// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        $sql = "select txtUserId,txtPassword from alpro_prod.mst_user where txtUserId='$username'";
        $data = getDataFromDB($sql);
        if(mysqli_num_rows($data) == 1){
            while($row = $data->fetch_assoc()){
                $txtPassword = $row['txtPassword'];
            }
            if($txtPassword==$password){
                // Password is correct, so start a new session
                session_start();
                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                // Redirect user to welcome page
                header("Location: ../php/home.php");
            }else{
                // Username,Password not matched, display a generic error message
                $login_err = "Invalid username or password.";
            }
            
        }else{
            // Username not matched, display a generic error message
            $login_err = "Username not found.";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="../staticfiles/img/logo.png">
    <link rel="stylesheet" href="../staticfiles/css/test.css">
    <link rel="stylesheet" href="../staticfiles/css/style.css">
    <!-- <style>
        body {
            background: url(../html/staticfiles/img/home_image.jpg) no-repeat center center fixed;
            background-size: cover;
        }
    </style> -->
    <script src="../staticfiles/js/jquery-3.3.1.js"></script>
    <script src="../staticfiles/js/reusable.js"></script>
</head>

<body>
    
    <div class="myDiv">

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }  
        if(!empty($username_err)){
            echo '<div class="alert alert-danger">' . $username_err . '</div>';
        }  
        if(!empty($password_err)){
            echo '<div class="alert alert-danger">' . $password_err . '</div>';
        }        
        ?>
        
    <!-- Section: Design Block -->
<section class=" text-center text-lg-start">
  <style>
    .rounded-t-5 {
      border-top-left-radius: 0.5rem;
      border-top-right-radius: 0.5rem;
    }

    @media (min-width: 992px) {
      .rounded-tr-lg-0 {
        border-top-right-radius: 0;
      }

      .rounded-bl-lg-5 {
        border-bottom-left-radius: 0.5rem;
      }
    }
  </style>
  <div class="card mb-3">
    <div class="row g-0 d-flex align-items-center">
      <div class="col-lg-4 d-none d-lg-flex">
        <img src="../staticfiles/img/product1.jpg" alt="Trendy Pants and Shoes"
          class="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div class="col-lg-8">
        <div class="card-body py-5 px-md-5">

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- username input -->
            <div class="form-outline mb-4">
              <input type="text" name="username" id="username" placeholder="Username" class="form-control"  <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
              <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" name="password" id="password" placeholder="Password" class="form-control" <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>

            <!-- 2 column grid layout for inline styling -->
            <div class="row mb-4">
              <div class="col d-flex justify-content-center">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
                  <label class="form-check-label" for="form2Example31"> Remember me </label>
                </div>
              </div>

            </div>

            <!-- Submit button -->
            <!-- <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button> -->

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block mb-4" value="Login">
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
    </div>

</body>

</html>