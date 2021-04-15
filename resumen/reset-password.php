<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_password"]))){
        $new_password_err = "Please enter the new password.";     
    } elseif(strlen(trim($_POST["new_password"])) < 6){
        $new_password_err = "Password must have atleast 6 characters.";
    } else{
        $new_password = trim($_POST["new_password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm the password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_password_err) && empty($confirm_password_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            // Set parameters
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
	<link rel="icon" type="image/png" href="img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
       body, html {
	height: 98.6%;
}

* {
	box-sizing: border-box;
}

.bg {
	background-image: url("img/bg.jpg");
	filter: blur(10x);
	-webkit-filter: blur(10px);

	height: 100%;

	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}

.container {
	background-color: rgb(0,0,0);
	background-color: rgba(0,0,0, 0.55);
	color: white;
	border: 3px solid #f1f1f1;
	position: absolute;
	top: 48%;
	left: 50%;
	transform: translate(-50%, -50%);
	z-index: 2;
	width: 60%;
	height: 88%;
	padding: 20px;
	text-align: center;
}

.main{
	position: absolute;
	top: 49.5%;
	left: 50%;
	transform: translate(-50%, -50%);
	z-index: 2;
	width: 90%;
	height: 92%;
	padding: 20px;	
}

.logo {
	width: 55%;	
	margin-top: 3%;
}

.info {
	margin-top: 10%;
}

.contact {
	margin-top: 10%;
}

p {
    font-family: 'Montserrat';
	font-size: 18px;
	/*color: white;*/
}

a:link {
  text-decoration: none;
  color: #97c1cc;
}
a:visited {
  text-decoration: none;
  color: #97c1cc;
}
a:hover {
  text-decoration: none;
  color: #69858c;
}
a:active {
  text-decoration: none;
  color: #69858c;
}
    </style>
</head>
<body>
 <div class="bg"></div>

<div class="container">
		
	<div class="main">
			<img src="img/logo.png" width="40%"> 
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control <?php echo (!empty($new_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $new_password; ?>">
                <span class="invalid-feedback"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="welcome.php">Cancel</a>
            </div>
        </form>
    </div> 
    </div> 	
</body>
</html>