<?php
session_start(); 
// DB connection  
$register_connection = mysqli_connect("localhost", "root", "", "facebook");  
if (!$register_connection) {
    die("<h1>DATABASE NOT CONNECTED</h1>");
}  
// Redirect if not logged in 
if (!isset($_SESSION['user_name'])) {  
    header("Location: login.php");  
    exit();  
}

$user_name = $_SESSION['user_name'];

// Fetch all users
  $all_users_query = "SELECT * FROM registration";
  $all_users_result = mysqli_query($register_connection, $all_users_query);

// Logout btn
  if (isset($_POST['logout_btn'])) {  
    session_unset();
    session_destroy();  
    header("Location: login.php");  
    exit();  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Home</title>
<link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" />
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-base-200 min-h-screen">

<!-- TOP BAR -->
<div class="navbar bg-base-300 shadow-md mb-6">
    <div class="flex-1 px-4 text-lg">
        Logged in as:<pre><span class="font-semibold"> <?php echo htmlspecialchars($user_name); ?></span></pre>
    </div>
    <form action="" method="post">
    <button class="btn btn-error" type="submit" name="logout_btn">Logout</button>
    </form>
</div>



<div class="container mx-auto px-4">
<!-- ALL USERS LIST -->
 <div class="card bg-base-100 shadow-xl p-6">
        <h2 class="text-2xl font-semibold mb-4">All Registered Users</h2>
        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>First</th>
                        <th>Last</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Actions</th>


                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while ($row = mysqli_fetch_assoc($all_users_result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['user_password']; ?></td>
                            <td>
                              <a href="view.php?id=<?= $row['id']?>" class="btn btn-sm btn-info">View</a>
                              <a href="update.php?id=<?= $row['id']?>" class="btn btn-sm btn-warning">Update</a>
                              <a href="delete.php?id=<?= $row['id']?>" class="btn btn-sm btn-error">Delete</a>
                            </td>                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
  </div>
</div>

<script>
        function togglePass() {
            const passText = document.getElementById("passwordText");
            const btn = document.getElementById("ShowPassBtn");
            if (passText.classList.contains("blurtxt")) {
                passText.classList.remove("blurtxt");
                btn.textContent = "Hide Password";
            } else {
                passText.classList.add("blurtxt");
                btn.textContent = "Show Password";
            }
        }
</script>
</body>
</html>