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
        <span>View All Products</span>
        <a href="addproduct.php"><span><button class="btn btn-info">Add New</button></span></a>
    </div>
    <div class="tableform">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white order-header">
                        <!-- <th scope="col"><button class="btn btn-danger" type="submit" name="delete_multiple_btn"><i class="bx bxs-trash"></i></button></th> -->
                        <th scope="col">Product Id</th>
                        <th scope="col">Product Title</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Product Brand</th>
                        <th scope="col">Product Meta Title</th>
                        <th scope="col">Product Meta Description</th>
                        <th scope="col">Product Price</th>
                        <th scope="col">Product Discount Price</th>
                        <th scope="col">Product small Description</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Keywords</th>
                        <th scope="col">Product Image</th>
                        <th scope="col">Post Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Trending</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    require("process/config.php");

                    $product_limit = 2;
                    if (isset($_GET['page'])) {
                        $pages = $_GET['page'];
                    } else {
                        $pages = 1;
                    }
                    $offset = ($pages - 1) * $product_limit;

                    $viewcatesql = "SELECT * FROM product_db LEFT JOIN categories_db ON product_db.categories_id = categories_db.id 
                        LEFT JOIN brand_db ON product_db.p_brand_id=brand_db.b_id ORDER BY created_at DESC LIMIT $offset, $product_limit";
                    $viewcatesql_query = mysqli_query($conn, $viewcatesql);
                    if ($viewcatesql_query->num_rows > 0) {
                        while ($row = $viewcatesql_query->fetch_assoc()) {
                    ?>
                            <tr>
                                <td><?= $row['p_id'] ?></td>
                                <td><?= $row['p_name'] ?></td>
                                <td><?= $row['cate_name'] ?></td>
                                <td><?= $row['b_name'] ?></td>
                                <td><?= $row['p_metatitle'] ?></td>
                                <td><?= substr($row['p_metadesc'], 0, 100) ?></td>
                                <td> <span>Rs.</span> <?= $row['p_price'] ?></td>
                                <td> <span>Rs.</span> <?= $row['p_saleprice'] ?></td>
                                <td><?= $row['p_smalldesc'] ?></td>
                                <td><?= $row['p_desc'] ?></td>
                                <td><?= $row['p_qty'] ?></td>
                                <td><?= $row['p_metakeyword'] ?></td>
                                <td><img src="process/upload/product/<?= $row['p_image'] ?>" alt="viewcategoryImg" height="50" width="80"></td>
                                <td><?php echo date('d-Y-M', strtotime($row['created_at'])); ?></td>
                                <td><span class="badge text-bg-info"><?= $row['p_status'] == '0' ? 'Deactive' : 'Active' ?></span></td>
                                <td><span class="badge text-bg-info"><?= $row['p_trending'] == '0' ? 'Deactive' : 'Active' ?></span></td>
                                <td class="d-flex">
                                    <div>
                                        <a href="updateproduct.php?id=<?= $row['p_id'] ?> & p_metakeyword=<?php echo $row['p_metakeyword'] ?>& quantity=<?= $row['p_qty'] ?> & categories_d=<?= $row['categories_id'] ?> & p_price=<?= $row['p_price'] ?> & p_saleprice=<?= $row['p_saleprice'] ?> & p_name=<?= $row['p_name'] ?> & p_brand_name=<?= $row['b_id'] ?> & p_metadesc=<?= $row['p_metadesc'] ?> & p_smalldesc=<?= $row['p_smalldesc'] ?> & p_desc=<?= $row['p_desc'] ?> & p_metatitle=<?= $row['p_metatitle'] ?> & p_image=<?= $row['p_image'] ?> & created_at=<?= $row['created_at'] ?> & p_status=<?= $row['p_status'] ?> & p_trending=<?= $row['p_trending'] ?> "><button class="btn btn-success"><i class='bx bx-edit'></i></button></a>
                                    </div>
                                    <div>
                                        <form action="process/deleteproduct.php" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                            <input type="hidden" name="p_id" value="<?= $row['p_id'] ?>">
                                            <input type="hidden" name="p_image" value="<?= $row['p_image'] ?>">
                                            <button type="submit" name="submit" class="btn btn-danger"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "
                            <tr>
                                <span style='font-size:20px; color: indigo; font-weight: 600; margin:3rem 0.3rem;'>No Records Found!!</span>
                            </tr>
                            
                            ";
                    }

                    ?>
                </tbody>
                <!-- <form> -->
            </table>
            <div class="table-pagination-bottom my-4 mx-2">
                <nav aria-label="Page navigation example">
                    <?php
                    require("process/config.php");
                    $product_pagination = "SELECT * FROM product_db";
                    $product_pagination_query = mysqli_query($conn, $product_pagination);
                    $product_res = mysqli_num_rows($product_pagination_query);
                    $product_pages = $product_res;

                    $dispay_page = ceil($product_pages / $product_limit);
                    ?>
                    <ul class="pagination">
                        <?php
                        if ($pages > 1) : ?>
                            <li class="page-item"><a class="page-link" href="viewproduct.php?page=<?= $pages - 1 ?>">Previous</a></li>
                        <?php endif; ?>

                        <?php
                        for ($i = 1; $i <= $dispay_page; $i++) {
                            if ($i == $pages) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                        ?>
                            <li class="page-item"><a class="page-link <?= $active ?>" href="viewproduct.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php

                        }
                        ?>
                        <?php
                        if ($pages < $dispay_page) : ?>
                            <li class="page-item"><a class="page-link" href="viewproduct.php?page=<?= $pages + 1 ?>">Next</a></li>
                        <?php endif; ?>
                        <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li> -->
                    </ul>
                </nav>
            </div>
        </div>
    </div>

</section>



<?php include "includes/footer.php" ?>