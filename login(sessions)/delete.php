<?php
// DB connection
$register_connection = mysqli_connect("localhost", "root", "root", "user_data");
if (!$register_connection) { 
  die("DATABASE NOT CONNECTED"); 
};

// Get ID from URL
$id = $_GET['id'];

// Fetch user data
$user_query = mysqli_query($register_connection, "SELECT * FROM data WHERE id = $id");
$current_user = mysqli_fetch_assoc($user_query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-base-200">

    <div class="card bg-neutral text-neutral-content w-96">
        <div class="card-body items-center text-center">
            <h2 class="card-title">Deleting data for: <?php echo $current_user['user_name'];?></h2>
            <p>Are you sure you want to delete your data?</p>
            <div class="card-actions justify-end">
                <a class="btn btn-ghost" href="./home.php">Back to user list</a>
                <form method="post">
                  <button class="btn btn-error" name="del_btn">Delete Data</button>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
