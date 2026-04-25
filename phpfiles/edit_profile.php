<?php
session_start();
include 'db_connect.php';

// check login
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first!'); window.location='login.html';</script>";
    exit;
}

$user_id = $_SESSION['user_id'];

// fetch user data
$sql = "SELECT * FROM users WHERE sn='$user_id'";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>

    <style>
        body {
            font-family: Arial;
            background: #f2f2f2;
        }
        .container {
            width: 400px;
            margin: 80px auto;
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px gray;
        }
        h2 {
            text-align: center;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
        }
        button {
            width: 100%;
            padding: 10px;
            background: green;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background: darkgreen;
        }
    </style>

</head>
<body>

<div class="container">
    <h2>Edit Profile</h2>

    <form method="POST" action="update_profile.php">

        <label>Full Name</label>
        <input type="text" name="fullname" value="<?php echo $user['fullname']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <label>Username</label>
        <input type="text" name="username" value="<?php echo $user['username']; ?>" required>

        <label>Password</label>
        <input type="password" name="password" value="<?php echo $user['password']; ?>" required>

        <button type="submit">Update Profile</button>
    </form>
</div>

</body>
</html>