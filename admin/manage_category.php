<?php 
require_once 'inc/header.php'; 
active_status();

$value = view_cat();


?>
<?php

if(!isset($_SESSION['ADMIN'])){
    header("location: index.php");
    
}
?>
<?php require_once 'inc/nav.php'; ?>

<div class="content-wrapper">
    <!-- START PAGE CONTENT-->
    <div class="page-heading">
        <h1 class="page-title">Quản lý danh mục</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html"><i class="la la-home font-20"></i></a>
            </li>

        </ol>
    </div>
    <div class="page-content fade-in-up">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Danh mục</div>
                <a href="add_category.php" class="btn btn-info">Thêm danh mục</a>
            </div>

            <div class="ibox-body">
                <table class="table table-striped table-bordered table-hover" id="example-table" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID danh mục</th>
                            <th>Tên danh mục</th>
                            <th>Trạng thái</th>
                            <th colspan="3" class="text-center">Tùy chọn</th>
                            
                        </tr>
                    </thead>
                    
                    
                    <tbody>
                        <tr>
                            <?php

                            while($row = mysqli_fetch_assoc($value)){
                                
                                
                            ?>
                            <td><?php echo $row['id']  ?></td>
                            <td><?php echo $row['cat_name']  ?></td>
                            <td>
                                <?php 
                                    if($row['status'] == '1'){
                                        echo 'Active';
                                    }else{
                                        echo 'Deactive';

                                    }
                                ?>
                            </td>
                            <td class="text-center">
                                <?php 
                                    if($row['status'] == '1'){
                                        echo "<a href='manage_category.php?opr=deactive&id=".$row['id']."' class='btn btn-success'>Không hoạt động</a>";
                                    }else{
                                        echo "<a href='manage_category.php?opr=active&id=".$row['id']."' class='btn btn-success'>Hoạt động</a>";
                                    }
                                ?>
                                
                                <a href="edit_cat.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Chỉnh sửa</a>
                                <a href="del_cat.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">Xóa</a>
                            </td>
                            
                           
                        </tr>
                            <?php
                            }
                            ?>
                            
                           
                       
                        

                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- END PAGE CONTENT-->
    <!-- <footer class="page-footer">
        <div class="font-13">2018 © <b>AdminCAST</b> - All rights reserved.</div>
        <a class="px-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">BUY PREMIUM</a>
        <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
    </footer> -->
</div>

<?php require_once 'inc/footer.php'; ?>