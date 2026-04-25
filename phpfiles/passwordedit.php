<?php
include 'db_connect.php';

/* ===== GET SN FROM URL ===== */
if (!isset($_GET['sn'])) {
    header("Location: ../users.php");
    exit;
}

$sn = $_GET['sn'];

/* ===== FETCH USER (OPTIONAL, FOR DISPLAY) ===== */
$user = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT username FROM users WHERE sn = $sn")
);

/* ===== UPDATE PASSWORD ===== */
if (isset($_POST['update_password'])) {

    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $error = "Passwords do not match";
    } else {
        // Hash password (VERY IMPORTANT)
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        mysqli_query(
            $conn,
            "UPDATE users SET password='$hashed_password' WHERE sn=$sn"
        );

        header("Location: ./featch.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Password</title>

    <!-- ✅ Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">

    <div class="col-md-6">
        <div class="card shadow-lg border-0 rounded-4">

            <div class="card-header bg-success text-white text-center">
                <h4 class="mb-0">Edit Password</h4>
            </div>

            <div class="card-body p-4">

                <p class="text-center mb-4">
                    <strong>User:</strong> <?= htmlspecialchars($user['username']); ?>
                </p>

                <?php if (isset($error)) { ?>
                    <div class="alert alert-danger text-center">
                        <?= $error; ?>
                    </div>
                <?php } ?>

                <form method="POST">

                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" name="new_password"
                               class="form-control"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" name="confirm_password"
                               class="form-control"
                               required>
                    </div>

                    <div class="d-grid">
                        <button type="submit"
                                name="update_password"
                                class="btn btn-success">
                            Update Password
                        </button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

</body>
</html>
