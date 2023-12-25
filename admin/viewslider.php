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
        <span>View All Slider</span>
        <a href="imageslider.php"><span><button class="btn btn-info">Add New</button></span></a>
    </div>
    <div class="tableform">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white order-header">
                        <th scope="col">Image Slider Id</th>
                        <th scope="col">Banner</th>
                        <th scope="col">Post Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include("process/config.php");

                    $slider_limit = 4;
                    if (isset($_GET['page'])) {
                        $pages = $_GET['page'];
                    } else {
                        $pages = 1;
                    }
                    $offset = ($pages - 1) * $slider_limit;

                    $bannerviewsql = "SELECT * FROM imageslider_db LIMIT $offset, $slider_limit";
                    $bannerviewsql_query = mysqli_query($conn, $bannerviewsql);
                    if ($bannerviewsql_query->num_rows > 0) {
                        while ($row = $bannerviewsql_query->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row['s_id'] ?></td>
                                <td><img src="process/upload/imageslider/<?php echo ($row['slider_1']) ?>" alt="banner" width="100"></td>
                                <td><?= date('d/M/Y', strtotime($row['created_at'])) ?></td>
                                <td>
                                    <span class="badge <?= $row['s_status'] == '1' ? 'text-bg-success' : 'text-bg-danger'; ?>">
                                        <?= $row['s_status'] == '1' ? 'Active' : 'Deactive'; ?>
                                    </span>
                                </td>
                                <td class="d-flex">
                                    <div>
                                        <a href="updateslider.php?id=<?= $row['s_id'] ?> & s_image=<?= $row['slider_1'] ?>  & s_status=<?= $row['s_status'] ?> "><button class="btn btn-success"><i class='bx bx-edit'></i></button></a>
                                    </div>
                                    <div>
                                        <form action="process/deleteslider.php" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                            <input type="hidden" name="s_id" value="<?= $row['s_id'] ?>">
                                            <input type="hidden" name="s_image" value="<?= $row['slider_1'] ?>">
                                            <button type="submit" name="submit" class="btn btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <div class="table-pagination-bottom my-4 mx-2">
                <nav aria-label="Page navigation example">
                    <?php
                    require("process/config.php");
                    $slider_pagination = "SELECT * FROM imageslider_db";
                    $slider_pagination_query = mysqli_query($conn, $slider_pagination);
                    $slider_res = mysqli_num_rows($slider_pagination_query);
                    $slider_page = $slider_res;

                    $dispay_page = ceil($slider_page / $slider_limit);
                    ?>
                    <ul class="pagination">
                        <?php
                        if ($pages > 1) : ?>
                            <li class="page-item"><a class="page-link" href="viewslider.php?page=<?= $pages - 1 ?>">Previous</a></li>
                        <?php endif; ?>

                        <?php
                        for ($i = 1; $i <= $dispay_page; $i++) {
                            if ($i == $pages) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                        ?>
                            <li class="page-item"><a class="page-link <?= $active ?>" href="viewslider.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php

                        }
                        ?>
                        <?php
                        if ($pages < $dispay_page) : ?>
                            <li class="page-item"><a class="page-link" href="viewslider.php?page=<?= $pages + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</section>



<?php include "includes/footer.php" ?>