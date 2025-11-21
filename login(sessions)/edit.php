<?php
// DB connection
$register_connection = mysqli_connect("localhost", "root", "root", "user_data");
if (!$register_connection) { die("DATABASE NOT CONNECTED"); }

// Get ID from URL
$id = $_GET['id'];

// Fetch user data
$user_query = mysqli_query($register_connection, "SELECT * FROM data WHERE id = $id");
$current_user = mysqli_fetch_assoc($user_query);

// When update button pressed
if (isset($_POST["update_btn"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user_email = $_POST["user_email"];
    $user_name = $_POST["user_name"];
    $user_password = $_POST["user_password"];

    $update_query = "
        UPDATE data SET 
            first_name = '$first_name',
            last_name = '$last_name',
            user_email = '$user_email',
            user_name = '$user_name',
            user_password = '$user_password'
        WHERE id = $id
    ";

    mysqli_query($register_connection, $update_query);

    header("Location: home.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Update Data</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-base-200">

  <div class="card w-96 bg-base-100 shadow-xl">
    <div class="card-body">
      <h2 class="text-xl font-semibold text-center mb-4">Updating data for: <?php echo $current_user['user_name'];?></h2>

      <form method="post">
        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">First Name</span>
          </label>
          <input type="text" name="first_name" placeholder="Enter new first name" class="input input-bordered"  />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Last Name</span>
          </label>
          <input type="text" name="last_name" placeholder="Enter new last name" class="input input-bordered"  />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" name="user_email" placeholder="Enter new email" class="input input-bordered"  />
        </div>

        <div class="form-control mb-3">
          <label class="label">
            <span class="label-text">Username</span>
          </label>
          <input type="text" name="user_name" placeholder="Enter new username" class="input input-bordered"  />
        </div>

        <div class="form-control mb-4">
          <label class="label">
            <span class="label-text">Password</span>
          </label>
          <input type="password" name="user_password" placeholder="Enter new password" class="input input-bordered"  />
        </div>

        <div class="form-control">
          <button type="submit" name="update_btn" class="btn btn-primary w-full">Update Data</button>
        </div>
      </form>
     <p class="text-sm text-center mt-4">
        <a href="home.php" class="text-primary font-medium hover:underline">Back to user list</a>
     </p>
    </div>
  </div>
</body>
</html>
