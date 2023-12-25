<main>
    <div class="nav-widget">
        <div class="nav-content">
            <div class="nav-bar">
                <i class='bx bx-menu'></i>
            </div>
            <div class="nav-search">
                <form class="d-flex header-search" role="search">
                    <input class="form-control header-serachBar" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success searchBtn-top" type="submit">
                        <i class='bx bx-search-alt-2'></i>
                    </button>
                </form>
            </div>
            <div>
                <ul class="admin-header-info">
                    <li><a href="#"><i class='bx bx-shopping-bag'></i><span>Order</span></a></li>
                    <li><a href="#"><i class='bx bxs-truck'></i><span>Delivery</span></a></li>
                    <li><a href="#"><i class='bx bx-user'></i><span>Users</span></a></li>
                </ul>
            </div>
        </div>
        <div class="account">
            <div class="userName">
                <span>Welcome: <?php echo $_SESSION['uname']; ?></span>
            </div>
            <div class="user-notification">
                <i class='bx bx-bell'></i>
            </div>
            <div class="dropdown admin-profile">
                <img src="img/profile/profile.png" alt="profile">
                <ul class="dropdown-menu profile-manage ">
                    <li><span>Amar Shah</span></li>
                    <li><a href="#">View My Profile</a></li>
                    <li><a href="#"><i class='bx bx-user'></i><span>Edit Profile</span></a></li>
                    <li><a href="#"><i class='bx bx-trending-up'></i><span>Activity Logs</span></a></li>
                    <li><a href="#"><i class='bx bx-star'></i><span>Go Pro</span></a></li>
                    <li><a href="#"> <i class='bx bx-cog'></i><span>Account Settings</span></a></li>
                    <li><a href="process/logout.php"><i class='bx bx-log-in-circle'></i><span>log Out</span></a></li>
                </ul>
            </div>
        </div>
    </div>