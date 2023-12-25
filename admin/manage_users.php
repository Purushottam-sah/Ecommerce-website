<?php include "includes/header.php";
require_once("process/config.php");
if (!isset($_SESSION['uemail'])) {
    header("location:../home.php");
    exit();
}
?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php" ?>

<?php require_once('process/config.php') ?>
<?php
if (isset($_SESSION['message'])) {
?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hey! </strong><?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>
<section id="mainContent">
    <div class="viewcategory d-flex">
        <span>View All Users</span>
        <!-- <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a> -->
    </div>
    <div class="tableform">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white order-header">
                        <th scope="col">Users Id</th>
                        <th scope="col">Users Name</th>
                        <th scope="col">Users Email</th>
                        <th scope="col">Users Phone Number</th>
                        <th scope="col">Post Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require("process/config.php");
                    $user_limit = 5;
                    if(isset($_GET['page'])){
                       $pages= $_GET['page'];
                    }
                    else{
                        $pages= 1;
                    }
                    $offset = ( $pages - 1) * $user_limit ;
                    $display_users = "SELECT * FROM registeruser_db ORDER BY create_at DESC LIMIT $offset,$user_limit";
                    $display_users_query = mysqli_query($conn, $display_users);
                    if ($display_users_query->num_rows > 0) {
                        while ($row = $display_users_query->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row['uid'] ?></td>
                                <td><?= $row['uname'] ?></td>
                                <td><?= $row['uemail'] ?></td>
                                <td><?= $row['uphone'] ?></td>
                                <td><?php echo date('d-Y-M', strtotime($row['create_at'])); ?></td>
                                <td><span class="badge <?= $row['role_as'] == '1' ? 'text-bg-success' : 'text-bg-danger' ?>"><?= $row['role_as'] == '0' ? 'Deactive' : 'Active' ?></span></td>
                                <td class="d-flex">
                                    <div>
                                        <a href="updatecategory.php?id=<?= $row['uid'] ?>& uname=<?= $row['uname'] ?> & uemail=<?= $row['uemail'] ?> & uphone=<?= $row['uphone'] ?> &  role_as=<?= $row['role_as'] ?> "><button class="btn btn-success"><i class='bx bx-edit'></i></button></a>
                                    </div>
                                    <div>
                                        <form action="process/delete_users.php" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                            <input type="hidden" name="uid" value="<?= $row['uid'] ?>">
                                            <button type="submit" name="submit" class="btn btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                    <?php
                        }
                    } else {
                        echo "<td><span>No Records Found!!</span></td>";
                    }

                    ?>






                </tbody>
            </table>
            <div class="table-pagination-bottom my-4 mx-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php
                        require("process/config.php");
                        $pagination_users = "SELECT * FROM registeruser_db";
                        $pagination_users_query = mysqli_query($conn, $pagination_users);
                        $total_record = mysqli_num_rows($pagination_users_query);
                      
                        $total_page = ceil($total_record / $user_limit);
                        for ($i = 1; $i <= $total_page; $i++) {
                            if($i == $pages){
                                $active = 'active';
                            }
                            else{
                                $active = '';
                            }
                        ?>
                            <li class="page-item <?=  $active?>"><a class="page-link" href="manage_users.php?page=<?=$i ?>"><?= $i ?></a></li>
                        <?php

                        }
                        ?>
<!-- 
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li> -->

                    </ul>
                </nav>
            </div>
        </div>
    </div>

</section>



<?php include "includes/footer.php" ?>