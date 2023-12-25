<?php
$side_page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'], '/') + 1);
?>

<div class="sidebar">
    <div class="side-title">
        AdminHub
    </div>
    <ul class="dashboard-component">
        <li class="dashboard-item <?= $side_page == 'admin.php' ? 'active' : '' ?>">
            <a href="admin.php">
                <i class="bx bx-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="dashboard-item <?= in_array($side_page, ['addbrand.php', 'viewbrand.php']) ? 'active' : ''; ?>">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bxl-blogger'></i><span>Company Brand</span>
                </button>
                <ul class="dropdown-menu">
                    <li class="<?= $side_page == 'addbrand.php' ? 'active' : ''; ?>"><a href="addbrand.php">Add Brand</a></li>
                    <li class="<?= $side_page == 'viewbrand.php' ? 'active' : ''; ?>"><a href="viewbrand.php">View Brand</a></li>
                </ul>
            </div>
        </li>

        <li class="dashboard-item <?= in_array($side_page, ['addcategories.php', 'viewcategory.php']) ? 'active' : ''; ?>">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-layer"></i><span>Categories</span>
                </button>
                <ul class="dropdown-menu">
                    <li class="<?= $side_page == 'addcategories.php' ? 'active' : ''; ?>"><a href="addcategories.php">Add Categories</a></li>
                    <li class="<?= $side_page == 'add_subcategory.php' ? 'active' : ''; ?>"><a href="add_subcategory.php">Add Sub-category</a></li>
                    <li class="<?= $side_page == 'add_child_subcate.php' ? 'active' : ''; ?>"><a href="add_child_subcate.php">Add Child Sub-category</a></li>
                    <li class="<?= $side_page == 'viewcategory.php' ? 'active' : ''; ?>"><a href="viewcategory.php">View Categories</a></li>
                </ul>
            </div>
        </li>

        <li class="dashboard-item <?= in_array($side_page, ['addproduct.php', 'viewproduct.php']) ? 'active' : ''; ?>">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bx bx-layer"></i><span>Products</span>
                </button>
                <ul class="dropdown-menu">
                    <li class="<?= $side_page == 'addproduct.php' ? 'active' : ''; ?>"><a href="addproduct.php">Add Product</a></li>
                    <li class="<?= $side_page == 'viewproduct.php' ? 'active' : ''; ?>"><a href="viewproduct.php">View Products</a></li>
                </ul>
            </div>
        </li>

        <li class="dashboard-item">
            <a href="#"><i class="bx bx-cart-add"></i><span>Orders</span></a>
        </li>

        <li class="dashboard-item">
            <a href="#"><i class="bx bxs-truck"></i><span>Delivery</span></a>
        </li>

        <li class="dashboard-item <?= in_array($side_page, ['imageslider.php', 'viewslider.php']) ? 'active' : ''; ?>">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-slider'></i><span>Image Slider</span>
                </button>
                <ul class="dropdown-menu">
                    <li class="<?= $side_page == 'imageslider.php' ? 'active' : ''; ?>"><a href="imageslider.php">Add Slide</a></li>
                    <li class="<?= $side_page == 'viewslider.php' ? 'active' : ''; ?>"><a href="viewslider.php">View Slider</a></li>
                </ul>
            </div>
        </li>

        <li class="dashboard-item <?= in_array($side_page, ['shop_banner.php', 'view_shop_banner.php']) ? 'active' : ''; ?>">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-images'></i><span>Offer Banner</span>
                </button>
                <ul class="dropdown-menu">
                    <li class="<?= $side_page == 'shop_banner.php' ? 'active' : ''; ?>"><a href="shop_banner.php">Add Shop Banner</a></li>
                    <li class="<?= $side_page == 'view_shop_banner.php' ? 'active' : ''; ?>"><a href="view_shop_banner.php">View Shop Banner</a></li>
                </ul>
            </div>
        </li>

        <li class="dashboard-item <?= $side_page == 'manage_users.php' ? 'active' : '' ?>">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-user'></i><span>Users</span>
                </button>
                <ul class="dropdown-menu">
                    <li class="<?= $side_page == 'manage_users.php' ? 'active' : ''; ?>"><a href="manage_users.php">Manage Users</a></li>
                </ul>
            </div>
        </li>

        <li class="dashboard-item <?= in_array($side_page, ['add_logo.php', 'view_logo.php']) ? 'active' : ''; ?>">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-user'></i><span>Logo</span>
                </button>
                <ul class="dropdown-menu">
                    <li class="<?= $side_page == 'add_logo.php' ? 'active' : ''; ?>"><a href="add_logo.php">Add Logo</a></li>
                    <li class="<?= $side_page == 'view_logo.php' ? 'active' : ''; ?>"><a href="view_logo.php">View Logo</a></li>
                </ul>
            </div>
        </li>

        <li class="dashboard-item <?= $side_page == 'setting.php' ? 'active' : '' ?>">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-cog'></i><span>Settings</span>
                </button>
                <ul class="dropdown-menu">
                    <li class="<?= $side_page == 'setting.php' ? 'active' : ''; ?>"><a href="setting.php">Setting</a></li>
                </ul>
            </div>
        </li>
    </ul>
</div>
