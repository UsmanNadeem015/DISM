<?php
session_start();
// DB connection
include("./db-xampp.php");

// Connection verification
if (!$register_connection) {
    echo"<h1>DATABASE NOT CONNECTED</h1>";}
?>

<!DOCTYPE html>
<html lang="en">
<head>  
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
.fade-out {
  opacity: 0;
  transition: opacity 0.6s ease;
}
</style>

</head>
<body class="min-h-screen flex items-center justify-center bg-base-200">
<div class="card w-96 bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="text-2xl font-semibold text-center mb-4">Login</h2>
      <form method="post">   
      <div class="form-control mb-3">
        <label class="label">
          <span class="label-text">Username</span>
        </label>
        <input 
        type="text" 
        placeholder="Enter your username" 
        class="input input-bordered" 
        name="login_username" required/>
      </div>

      <div class="form-control mb-4">
        <label class="label">
          <span class="label-text">Password</span>
        </label>
        <input 
        type="password" 
        placeholder="Enter your password" 
        class="input input-bordered" 
        name="login_password" required/>
      </div>

      <div class="form-control">
        <button class="btn btn-primary" name="login_btn">Login</button>
      </div>
      </form>
      
      <p class="text-sm text-center mt-4">
        New user? 
        <a href="register.php" class="text-primary font-medium hover:underline">Register here</a>
      </p>
    </div>
</div>

<!-- Alerts -->
<div id="toast-success" class="toast toast-top toast-end hidden">
  <div class="alert alert-success shadow-lg">
    <span>Login Successful</span>
  </div>
</div>

<div id="toast-error" class="toast toast-top toast-end hidden">
  <div class="alert alert-error shadow-lg">
    <span>Invalid Username or Password</span>
  </div>
</div>

</body>
</html>

<?php
if (isset($_POST['login_btn'])) {
    // Save data from login form in variables
    $login_username = $_POST['login_username'];
    $login_password = $_POST['login_password'];

    // login data verification from DB
    $login_query = "
        SELECT * FROM registration 
        WHERE user_name = '$login_username' 
        AND user_password = '$login_password'
    ";

    $result = mysqli_query($register_connection, $login_query);

    if (mysqli_num_rows($result) == 1) {
        // Fetch user data
        $user_data = mysqli_fetch_assoc($result);

        // Set session variables
        $_SESSION['user_name'] = $user_data['user_name'];
        $_SESSION['user_email'] = $user_data['user_email'];

        // Success toast and redirect
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const toast = document.getElementById("toast-success");
                toast.classList.remove("hidden");
                setTimeout(() => {
                    toast.classList.add("fade-out");
                    setTimeout(() => {
                        window.location.href = "home.php"; // redirect after fade
                    }, 600);
                }, 2000);
            });
        </script>';
    } else {
        // Error toast
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                const toast = document.getElementById("toast-error");
                toast.classList.remove("hidden");
                setTimeout(() => {
                    toast.classList.add("fade-out");
                    setTimeout(() => {
                        toast.classList.add("hidden");
                        toast.classList.remove("fade-out");
                    }, 600);
                }, 2000);
            });
        </script>';
    }
}
?>

