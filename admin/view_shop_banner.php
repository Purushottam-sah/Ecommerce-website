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
        <span>View All Shop Banner</span>
        <a href="shop_banner.php"><span><button class="btn btn-info">Add New</button></span></a>
    </div>
    <div class="tableform">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white order-header">
                        <th scope="col">Offer Banner Id</th>
                        <th scope="col">Offer Card Name</th>
                        <th scope="col">Offer Banner</th>
                        <th scope="col">Post Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require("process/config.php");

                    $banner_limit = 4;
                    if (isset($_GET['page'])) {
                        $pages = $_GET['page'];
                    } else {
                        $pages = 1;
                    }
                    $offset = ($pages - 1) * $banner_limit;

                    $view_offerBanner = "SELECT * FROM offer_banner_db LIMIT $offset, $banner_limit";
                    $view_offerBanner_query = mysqli_query($conn, $view_offerBanner);
                    if ($view_offerBanner_query->num_rows > 0) {
                        while ($row = $view_offerBanner_query->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row['o_id'] ?></td>
                                <td><?= $row['o_title'] ?></td>
                                <td><img src="process/upload/shop_banner/<?= $row['o_image'] ?>" alt="viewlogo_img" height="100" width="300"></td>
                                <td><?php echo date('d-Y-M', strtotime($row['o_created_at'])); ?></td>


                                <td><span class="badge <?= $row['o_status'] == '1' ? 'text-bg-success': 'text-bg-danger'?>"><?= $row['o_status'] == '0' ? 'Deactive' : 'Active' ?></span></td>
                                <td class="d-flex">
                                    <div>
                                        <a href="update_shop_banner.php?id=<?= $row['o_id'] ?> & o_title = <?= $row['o_title']?> & o_image=<?= $row['o_image'] ?>  & o_status=<?= $row['o_status'] ?> "><button class="btn btn-success"><i class='bx bx-edit'></i></button></a>
                                    </div>
                                    <div>
                                        <form action="process/delete_shop_banner.php" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                            <input type="hidden" name="o_id" value="<?= $row['o_id'] ?>">
                                            <input type="hidden" name="o_image" value="<?= $row['o_image'] ?>">
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
                    require("process/config.php");
                    $banner_sql = "SELECT * FROM offer_banner_db";
                    $banner_sql_query = mysqli_query($conn, $banner_sql);
                    $banner_res = mysqli_num_rows($banner_sql_query);
                    $banner_page = $banner_res;

                    $dispay_page = ceil($banner_page / $banner_limit);
                    ?>
                    <ul class="pagination">
                        <?php
                        if ($pages > 1) : ?>
                            <li class="page-item"><a class="page-link" href="view_shop_banner.php?page=<?= $pages - 1 ?>">Previous</a></li>
                        <?php endif; ?>

                        <?php
                        for ($i = 1; $i <= $dispay_page; $i++) {
                            if ($i == $pages) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                        ?>
                            <li class="page-item"><a class="page-link <?= $active ?>" href="view_shop_banner.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php

                        }
                        ?>
                        <?php
                        if ($pages < $dispay_page) : ?>
                            <li class="page-item"><a class="page-link" href="view_shop_banner.php?page=<?= $pages + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</section>



<?php include "includes/footer.php" ?>