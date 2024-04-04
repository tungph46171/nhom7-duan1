<?php
require_once 'inc/header.php';

$value = view_user();

?>
<?php

if (!isset($_SESSION['ADMIN'])) {
    header("location: index.php");
}
?>

<?php
if ($_SESSION['ADMIN_ROLE'] != 1) {
    header("location: dashboard.php");
}
?>

<?php require_once 'inc/nav.php'; ?>


<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">

        <h1 class="page-title">Quản lý người dùng</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>

        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Danh sách người dùng</div>
            </div>
            <div class="ibox-body">
                <?php
                display_message();
                ?>
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên người dùng</th>
                            <th>Email</th>
                            <th>Admin</th>
                            <th>Khách</th>
                            <th class="text-center">Tùy chọn</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- <form action="assign_roles.php" method="post"> -->
                        <?php while ($row = mysqli_fetch_assoc($value)) { ?>
                            <form id="form_<?php echo $row['id']; ?>" action="assign_roles.php" method="post">

                                <tr>
                                    <td>
                                        <input type="hidden" name="admin_email" value="<?php echo $row['email']; ?>">
                                        <input type="hidden" name="admin_id" value="<?php echo $row['id']; ?>">

                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>

                                    <td>
                                        <input type="radio" name="role_<?php echo $row['id']; ?>" value="1" <?php echo $row['role'] == 1 ? 'checked' : ''; ?>>
                                        <label for="role_<?php echo $row['id']; ?>"></label>
                                    </td>

                                    <td>
                                        <input type="radio" name="role_<?php echo $row['id']; ?>" value="2" <?php echo $row['role'] == 2 ? 'checked' : ''; ?>>
                                        <label for="role_<?php echo $row['id']; ?>"></label>
                                    </td>

                                    <script>
                                        function submitForm(adminId) {
                                            document.getElementById('form_' + adminId).submit();
                                        }
                                    </script>

                                    <td class="text-center">
                                        <!-- <button type="submit" class="btn btn-primary" name="assign_role_btn_up">Assign Roles</button> -->
                                        <button type="submit" class="btn btn-primary" name="assign_role_btn_up" onclick="submitForm(<?php echo $row['id']; ?>)">Phân quyền</button>

                                        <a href="del_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng này không?')">Xóa</a>
                                    </td>
                                </tr>
                            </form>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>

    </div>

</div>

<?php require_once 'inc/footer.php'; ?>