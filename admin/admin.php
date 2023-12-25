<?php include "includes/header.php";
require_once("process/config.php");
if (!isset($_SESSION['uemail'])) {
    header("location:../home.php");
    exit();
}

?>
<?php include "middleware/admin_middleware.php" ?>
<?php include "includes/sidebar.php" ?>
<?php include "includes/navbar.php" ?>

<?php require_once('process/config.php') ?>

<section id="mainContent">
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey! <?php echo  $_SESSION['uname'] ?> </strong><?php echo $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['message']);
    }
    ?>
    <div class="header-section mb-5">
        <span>Welcome to Admin Dashboard!!</span>
    </div>
    <div class="content-widget">
        <div class="content-title">
            <h4>ABPH Summary</h4>
            <a href="process/config.php"><button class="btn-newProject">Add New Products</button></a>
        </div>
        <div class="bg-primary1 pt-10 pb-21"></div>
        <div class="card-content">
            <div class="card">
                <div class="card-body">
                    <div class="card-body-header">
                        <h5 class="card-title">Categories</h5>
                        <i class='bx bx-layer'></i>
                    </div>
                    <p class="card-text">18</p>
                    <span>2 Deactive</span>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-body-header">
                        <h5 class="card-title">Brands</h5>
                        <i class='bx bxl-blogger'></i>
                    </div>
                    <p class="card-text">132</p>
                    <span>28 Deactive</span>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-body-header">
                        <h5 class="card-title">Users</h5>
                        <i class='bx bxl-microsoft-teams'></i>
                    </div>
                    <p class="card-text">2300</p>
                    <span>+3% than last month</span>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="card-body-header">
                        <h5 class="card-title">Orders</h5>
                        <i class='bx bxs-shopping-bags'></i>
                    </div>
                    <p class="card-text">76%</p>
                    <span>98% Completed</span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-body-header">
                        <h5 class="card-title">Today's Money</h5>
                        <i class='bx bx-dollar-circle'></i>
                    </div>
                    <p class="card-text">$23k</p>
                    <span>58% than last week</span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-body-header">
                        <h5 class="card-title">New Clients</h5>
                        <i class='bx bxs-user'></i>
                    </div>
                    <p class="card-text">3256</p>
                    <span>-2% than yesterday</span>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="card-body-header">
                        <h5 class="card-title">Sales</h5>
                        <i class='bx bx-wallet'></i>
                    </div>
                    <p class="card-text">$4,34, 340</p>
                    <span>-5% than yesterday</span>
                </div>
            </div>
        </div>
    </div>
    <div class="order-top-title mt-4">
        <span>Order</span>
    </div>
    <div class="orderManagershow mt-4">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr class="bg-primary text-white order-header">
                        <th scope="col">Order No.</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Date</th>
                        <th scope="col">Paid Status</th>
                        <th scope="col">Order Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jacket</td>
                        <td>2</td>
                        <td>12-Dec-2023</td>
                        <td><span class="badge bg-danger">Unpaid</span></td>
                        <td><span class="badge bg-success">Compeletd</span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Shrt</td>
                        <td>5</td>
                        <td>16-Dec-2023</td>
                        <td><span class="badge bg-success">paid</span></td>
                        <td><span class="badge bg-info">Process</span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Jacket</td>
                        <td>2</td>
                        <td>20-Dec-2023</td>
                        <td><span class="badge bg-success">paid</span></td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                    </tr>

                </tbody>
            </table>
            <div class="table-pagination-bottom my-4 mx-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>



<?php include "includes/footer.php" ?>