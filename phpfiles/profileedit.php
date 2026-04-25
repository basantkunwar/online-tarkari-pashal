<?php
session_start();
include 'db_connect.php';

// Check login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_sn = $_SESSION['user_id'];

// Fetch logged-in user data
$sql = "SELECT * FROM users WHERE sn='$user_sn'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);

// Update profile
if (isset($_POST['update'])) {

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];

    $update_sql = "UPDATE users 
                   SET fullname='$fullname', 
                       email='$email', 
                       username='$username' 
                   WHERE sn='$user_id'";

    if (mysqli_query($conn, $update_sql)) {

        // Update session values also
        $_SESSION['fullname'] = $fullname;
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $username;

        echo "<script>alert('Profile Updated Successfully');</script>";
        header("Refresh:0");
    } else {
        echo "<script>alert('Update Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile Update</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow p-4">
        <h3 class="text-center mb-4">Update Profile</h3>

        <form method="POST" action="profileedit.php">
            <div class="mb-3">
                <label>Full Name</label>
                <input type="text" name="fullname" 
                       value="<?= $user['fullname']; ?>" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" 
                       value="<?= $user['email']; ?>" 
                       class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="username" 
                       value="<?= $user['username']; ?>" 
                       class="form-control" required>
            </div>

            <button type="submit" name="update" 
                    class="btn btn-primary w-100">
                Update Profile
            </button>
        </form>
    </div>
</div>

</body>
</html>