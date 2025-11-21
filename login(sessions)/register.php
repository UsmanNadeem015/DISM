<?php
// Database Connection
// Set password to empty if using xammp
$register_connection = mysqli_connect("localhost","root","root","user_data");
// Connection verification
if (!$register_connection) {
    echo"<h1>DATABASE NOT CONNECTED</h1>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-base-200">

  <div class="card w-96 bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="text-2xl font-semibold text-center mb-4">Create Account</h2>

      <form action="register.php" method="post">
        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">First Name</span>
          </label>
          <input type="text" name="first_name" placeholder="Enter your first name" class="input input-bordered" required />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Last Name</span>
          </label>
          <input type="text" name="last_name" placeholder="Enter your last name" class="input input-bordered" required />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" name="user_email" placeholder="Enter your email" class="input input-bordered" required />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Username</span>
          </label>
          <input type="text" name="user_name" placeholder="Choose a username" class="input input-bordered" required />
        </div>

        <div class="form-control mb-4">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="password" name="user_password" placeholder="Create a password" class="input input-bordered" required />
        </div>

        <div class="form-control">
          <button type="submit" name="register_btn" class="btn btn-primary w-full">Register</button>
        </div>
      </form>

      <p class="text-sm text-center mt-4">
        Already have an account?
        <a href="login.php" class="text-primary font-medium hover:underline">Login here</a>
      </p>
    </div>
  </div>

<div id="toast-container" class="toast toast-top toast-end hidden">
  <div class="alert alert-success shadow-lg">
    <span>Registration Successful</span>
  </div>
</div>

</body>
</html>

<?php
if (isset($_POST["register_btn"])) {
// Save form data in variables
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$user_email = $_POST["user_email"];
$user_name = $_POST["user_name"];
$user_password = $_POST["user_password"];

// Insert
$register_insert = "
INSERT INTO 
data(first_name,last_name,user_email,user_name,user_password) 
VALUES 
('$first_name','$last_name','$user_email','$user_name','$user_password')
";

// Query Execution
if(mysqli_query($register_connection, $register_insert)){
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            const toast = document.getElementById("toast-container");
            toast.classList.remove("hidden");
            setTimeout(() => {
                window.location.href = "login.php";
            }, 2000); // waits 2 seconds before redirection
        });
    </script>';
}

}
?>


