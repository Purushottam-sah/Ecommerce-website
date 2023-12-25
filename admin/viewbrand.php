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
        <span>View All Brand</span>
        <a href="addbrand.php"><span><button class="btn btn-info">Add New</button></span></a>
    </div>
    <div class="tableform">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white order-header">
                        <th scope="col">Brand Id</th>
                        <th scope="col">Brand Name</th>
                        <th scope="col">Brand Description</th>
                        <th scope="col">Brand Image</th>
                        <th scope="col">Post Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $brand_limit = 5;
                    if (isset($_GET['page'])) {
                        $pages = $_GET['page'];
                    } else {
                        $pages = 1;
                    }
                    $offset = ($pages - 1) * $brand_limit;

                    require("process/config.php");
                    $addbrandsql = "SELECT * FROM brand_db ORDER BY b_created_at DESC LIMIT $offset, $brand_limit";
                    $addbrandsql_query = mysqli_query($conn, $addbrandsql);
                    if ($addbrandsql_query->num_rows > 0) {
                        while ($row = $addbrandsql_query->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row['b_id'] ?></td>
                                <td><?= $row['b_name'] ?></td>
                                <td><?= substr($row['b_metadesc'], 0, 100) ?></td>
                                <td><img src="process/upload/brand/<?= $row['b_image'] ?>" alt="viewbrand" height="70" width="100"></td>
                                <td><?php echo date('d-Y-M', strtotime($row['b_created_at'])); ?></td>


                                <td><span class="badge <?= $row['b_status'] == '1' ? 'text-bg-success' : 'text-bg-danger' ?>"><?= $row['b_status'] == '0' ? 'Deactive' : 'Active' ?></span></td>
                                <td class="d-flex">
                                    <div>
                                        <a href="updatebrand.php?id=<?= $row['b_id'] ?> & b_image=<?= $row['b_image'] ?>  & b_status=<?= $row['b_status'] ?> & b_name=<?= $row['b_name'] ?> & b_metadesc=<?= $row['b_metadesc'] ?> "><button class="btn btn-success"><i class='bx bx-edit'></i></button></a>
                                    </div>
                                    <div>
                                        <form action="process/deletebrand.php" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                            <input type="hidden" name="b_id" value="<?= $row['b_id'] ?>">
                                            <input type="hidden" name="b_image" value="<?= $row['b_image'] ?>">
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
                    $brand_pagination = "SELECT * FROM brand_db ORDER BY b_created_at DESC";
                    $brand_pagination_query = mysqli_query($conn, $brand_pagination);
                    $brand_res = mysqli_num_rows($brand_pagination_query);
                    $brand_page = $brand_res;

                    $dispay_page = ceil($brand_page / $brand_limit);
                    ?>
                    <ul class="pagination">
                        <?php 
                        if($pages > 1) : ?>
                        <li class="page-item"><a class="page-link" href="viewbrand.php?page=<?= $pages - 1 ?>">Previous</a></li>
                        <?php endif; ?>
                    
                        <?php
                        for ($i = 1; $i <= $dispay_page; $i++) {
                            if ($i == $pages) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                        ?>
                            <li class="page-item"><a class="page-link <?= $active ?>" href="viewbrand.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php

                        }
                        ?>
                        <?php
                         if($pages < $dispay_page) : ?>
                        <li class="page-item"><a class="page-link" href="viewbrand.php?page=<?= $pages + 1 ?>">Next</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</section>



<?php include "includes/footer.php" ?>