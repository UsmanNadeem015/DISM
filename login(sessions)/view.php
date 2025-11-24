<?php
// DB connection
include("./db-xampp.php");

// Connection verification
if (!$register_connection) {
    echo"<h1>DATABASE NOT CONNECTED</h1>";
};
$id = $_GET["id"];
$user_fetch = "SELECT * from registration WHERE id = '$id'";
$run_query = mysqli_query($register_connection, $user_fetch);
$view = mysqli_fetch_assoc($run_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Veiw Data</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-base-200">

  <div class="card w-96 bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="text-2xl font-semibold text-center mb-4">Welcome</h2>

      <form action="register.php" method="post">
        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">First Name</span>
          </label>
          <input type="text" name="first_name" class="input input-bordered" value="<?php echo $view['first_name'] ?>" readonly  />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Last Name</span>
          </label>
          <input type="text" name="last_name" class="input input-bordered" value="<?php echo $view['last_name']?>" readonly />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" name="user_email" class="input input-bordered" value="<?php echo $view['user_email'] ?>" readonly />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Username</span>
          </label>
          <input type="text" name="user_name" class="input input-bordered" value="<?php echo $view['user_name'] ?>" readonly />
        </div>

        <div class="form-control mb-4">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="text" name="user_password" class="input input-bordered" value="<?php echo $view['user_password'] ?>" readonly />
        </div>
      </form>
     <p class="text-sm text-center mt-4">
        <a href="home.php" class="text-primary font-medium hover:underline">Back to user list</a>
     </p>
    </div>
  </div>
</body>
</html>
