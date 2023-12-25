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
        <strong>Hey! Admin </strong><?php echo $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message']);
}
?>
<section id="mainContent">
    <div class="viewcategory d-flex">
        <span>View All Sub-category</span>
        <a href="add_subcategory.php"><span><button class="btn btn-info">Add New</button></span></a>
    </div>
    <div class="tableform">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white order-header">
                        <th scope="col">Sub-Category Id</th>
                        <th scope="col">Sub-category Name New*</th>
                        <th scope="col">Sub-category Description</th>
                        <th scope="col">Sub-category Image</th>
                        <!-- <th scope="col">Post Date</th> -->
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $page_limit = 5;

                    if (isset($_GET['page'])) {
                        $pages = $_GET['page'];
                    } else {
                        $pages = 1;
                    }

                    $offset = ($pages - 1) * $page_limit;

                    require("process/config.php");
                    $view_sub_category = "SELECT * FROM subcate_db ORDER BY sub_id DESC LIMIT $offset, $page_limit";
                    $view_sub_category_query = mysqli_query($conn, $view_sub_category);
                    if ($view_sub_category_query->num_rows > 0) {
                        while ($row = $view_sub_category_query->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row['sub_id'] ?></td>
                                <td><?= $row['scate_name'] ?></td>
                                <td><?= $row['c_catedesc'] ?></td>
                                <td><img src="process/upload/subcate/<?= $row['s_cateimg'] ?>" alt="viewlogo_img" height="70" width="100"></td>
                                <td><span class="badge <?= $row['s_catestatus'] == '1' ? 'text-bg-success' : 'text-bg-danger' ?>"><?= $row['s_catestatus'] == '0' ? 'Deactive' : 'Active' ?></span></td>
                                <td class="d-flex">
                                    <div>
                                        <a href="update_subcate.php?id=<?= $row['sub_id'] ?> & scatename = <?= $row['scate_name'] ?> & ccatedesc = <?= $row['c_catedesc'] ?> & subcate_image=<?= $row['s_cateimg'] ?>  & s_catestatus=<?= $row['s_catestatus'] ?> & scatepopular=<?= $row['s_catepopular'] ?> "><button class="btn btn-success"><i class='bx bx-edit'></i></button></a>
                                    </div>
                                    <div>
                                        <form action="process/delete_subcate.php" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                            <input type="hidden" name="s_id" value="<?= $row['sub_id'] ?>">
                                            <input type="hidden" name="s_cateimg" value="<?= $row['s_cateimg'] ?>">
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
                    <?php
                    $total_records = "SELECT * FROM subcate_db";
                    $total_records_query = mysqli_query($conn, $total_records);
                    $result = mysqli_num_rows($total_records_query);

                    $total_pages = $result;

                    $display_page = ceil($total_pages / $page_limit);
                    ?>
                    <ul class="pagination">
                        <?php if ($pages > 1) : ?>
                            <li class="page-item"><a class="page-link" href="view_subcategory.php?page=<?= $pages - 1 ?>">Previous</a></li>
                        <?php endif; ?>
                        <?php
                        for ($i = 1; $i <= $display_page; $i++) {
                        ?>
                            <li class="page-item"><a class="page-link" href="view_subcategory.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php
                        }
                        ?>
                        <?php if ($pages < $display_page) : ?>
                            <li class="page-item"><a class="page-link" href="view_subcategory.php?page=<?= $pages + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</section>



<?php include "includes/footer.php" ?>