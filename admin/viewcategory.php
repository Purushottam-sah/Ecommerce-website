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
        <span>View All Category</span>
        <a href="addcategories.php"><span><button class="btn btn-info">Add New</button></span></a>
    </div>
    <div class="tableform">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white order-header">
                        <th scope="col">Category Id</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Brand</th>
                        <th scope="col">Child-Category</th>            
                        <th scope="col">Category Title</th>
                        <th scope="col">Category Description</th>
                        <th scope="col">Category Image</th>
                        <th scope="col">Post Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $cate_limit = 5;
                    if (isset($_GET['page'])) {
                        $pages = $_GET['page'];
                    } else {
                        $pages = 1;
                    }
                    $offset = ($pages - 1) * $cate_limit;

                    require("process/config.php");
                    $viewcatesql = "SELECT * FROM categories_db 
                    LEFT JOIN brand_db ON categories_db.cate_slug_id = brand_db.b_id 
                    LEFT JOIN child_cate_db ON categories_db.cate_subcate = child_cate_db.child_id
                    LEFT JOIN subcate_db ON categories_db.cate_name = subcate_db.sub_id
                  
                    ORDER BY categories_db.create_at DESC LIMIT $offset,$cate_limit";
                    $viewcatesql_query = mysqli_query($conn, $viewcatesql);
                    if ($viewcatesql_query->num_rows > 0) {
                        while ($row = $viewcatesql_query->fetch_assoc()) {
                    ?>

                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= $row['scate_name'] ?></td>
                                <td><?= $row['b_name'] ?></td>
                                <td><?= $row['csubcate_name'] ?></td>
                                <td><?= substr($row['cate_metatitle'], 0, 50) ?></td>
                                <td><?= substr($row['cate_metadesc'], 0, 50) ?></td>
                                <td><img src="process/upload/<?= $row['cate_img'] ?>" alt="viewcategoryImg" height="50" width="80"></td>
                                <td><?php echo date('d-Y-M', strtotime($row['create_at'])); ?></td>


                                <td><span class="badge text-bg-info"><?= $row['cate_status'] == '0' ? 'Deactive' : 'Active' ?></span></td>
                                <td class="d-flex">
                                    <div>
                                        <a href="updatecategory.php?id=<?= $row['id'] ?> & scatename = <?= $row['sub_id']?> & csubcatename = <?= $row['child_id']?> & cate_subcate1=<?= $row['cate_subcate1']?> & cate_subcate2=<?= $row['cate_subcate2']?> & cate_metakeyword=<?php echo $row['cate_metakeyword'] ?> & cate_name=<?= $row['cate_name'] ?> & cate_subcate=<?= $row['cate_subcate'] ?> & cate_slug=<?= $row['b_id'] ?> & cate_metadesc=<?= $row['cate_metadesc'] ?>  & cate_desc=<?= $row['cate_desc'] ?> & cate_metatitle=<?= $row['cate_metatitle'] ?> & cate_img=<?= $row['cate_img'] ?> & create_at=<?= $row['create_at'] ?> & cate_status=<?= $row['cate_status'] ?> & cate_popular=<?= $row['cate_popular'] ?> "><button class="btn btn-success"><i class='bx bx-edit'></i></button></a>
                                    </div>
                                    <div>
                                        <form action="process/deletecategory.php" method="post" onsubmit="return confirm('Are you sure want to delete?')">
                                            <input type="hidden" name="cat_id" value="<?= $row['id'] ?>">
                                            <input type="hidden" name="cat_img" value="<?= $row['cate_img'] ?>">
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
                    $cate_pagination = "SELECT * FROM categories_db LEFT JOIN brand_db ON categories_db.cate_slug_id = brand_db.b_name ORDER BY categories_db.create_at DESC";
                    $cate_pagination_query = mysqli_query($conn, $cate_pagination);
                    $cate_res = mysqli_num_rows($cate_pagination_query);
                    $cate_page = $cate_res;

                    $dispay_page = ceil($cate_page / $cate_limit);
                    ?>
                    <ul class="pagination">
                        <?php
                        if ($pages > 1) : ?>
                            <li class="page-item"><a class="page-link" href="viewcategory.php?page=<?= $pages - 1 ?>">Previous</a></li>
                        <?php endif; ?>

                        <?php
                        for ($i = 1; $i <= $dispay_page; $i++) {
                            if ($i == $pages) {
                                $active = 'active';
                            } else {
                                $active = '';
                            }
                        ?>
                            <li class="page-item"><a class="page-link <?= $active ?>" href="viewcategory.php?page=<?= $i ?>"><?= $i ?></a></li>
                        <?php

                        }
                        ?>
                        <?php
                        if ($pages < $dispay_page) : ?>
                            <li class="page-item"><a class="page-link" href="viewcategory.php?page=<?= $pages + 1 ?>">Next</a></li>
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