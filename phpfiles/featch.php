<?php include '../layoutfiles/d_head.php'; ?>
<?php include '../layoutfiles/d_header.php'; ?>
<?php include 'db_connect.php'; ?>

<?php
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
?>

<div class="container-fluid px-4 py-4">

    <h2 class="text-center fw-bold text-success mb-4">
        All Users
    </h2>
<?php $sn=1; ?>
    <div class="table-responsive shadow rounded">
        <table class="table table-bordered table-hover align-middle bg-white">
            <thead class="table-success text-center">
                <tr>
                    <th>SN</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody class="text-center">
                <?php if (mysqli_num_rows($result) > 0) { ?>
                    <?php while ($row1 = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $sn++ ?></td>
                            <td><?= $row1['fullname']; ?></td>
                            <td><?= $row1['email']; ?></td>
                            <td><?= $row1['username']; ?></td>
                            <td>

                                <!-- EDIT USER -->
                                <a href="user/edit_profile.php?sn=<?= $row1['sn']; ?>"
                                   class="btn btn-success btn-sm mb-1">
                                   Edit
                                </a>

                                <!-- EDIT PASSWORD -->
                                <a href="passwordedit.php?sn=<?= $row1['sn']; ?>"
                                   onclick="return confirm('Edit this user password?');"
                                   class="btn btn-info btn-sm mb-1">
                                   Edit Password
                                </a>

                                <!-- DELETE USER -->
                                <a href="userdelete.php?sn=<?= $row1['sn']; ?>"
                                   onclick="return confirm('Are you sure you want to delete this user?');"
                                   class="btn btn-danger btn-sm mb-1">
                                   Delete
                                </a>

                            </td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td colspan="5" class="text-danger fw-bold text-center">
                            No data found
                        </td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
    </div>
</div>

<?php include '../layoutfiles/d_footer.php'; ?>
<?php include '../layoutfiles/d_foot.php'; ?>
