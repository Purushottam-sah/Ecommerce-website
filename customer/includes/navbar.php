<div class="wrapper">
    <div class="row">
        <div class="col-md-8 col-lg-8 col-sm-12 col-12">
            <div class="top-bar-nav d-flex">
                <a href="#"><span>Become a Seller</span></a>
                <a href="#"><span>Paymet and Recharge</span></a>
                <a href="#"><span>Help and Support</span></a>
                <a href="#"><span>ABPH Logistics Partner</span></a>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-12 col-sm-12 col-12 saveApps">
            <span class="downloadApps">Save Me on Apps</span>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg">

        <a class="navbar-brand" href="home.php">
            <div class="header-logo">
                <img src="img/logo/logo.png" alt="logo" width="120">
            </div>

        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex header-search" role="search">
                <input class="form-control me-2 header-serachBar" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success searchBtn-top" type="submit">
                    <i class='bx bx-search-alt-2'></i>
                </button>
            </form>
            <ul class="navbar-nav login-box">
                <li class="nav-item">
                    <a href="login.php">
                        <?php echo $_SESSION['uname']; ?>
                    </a>
                </li>
                <li class="nav-item">
                    <span>|</span>
                </li>
                <li class="nav-item">
                    <a href="process/logout.php"><span><button class="btn btn-success">Logout</button></span></a>
                </li>
            </ul>
            <div>
                <span class="multi-lang">
                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class='bx bx-globe'></i><span>EN</span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">English</a></li>
                            <li><a class="dropdown-item" href="#">Nepali</a></li>
                            <!-- <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                        </ul>
                    </div>
                </span>
            </div>
            <div class="cartSection">
                <a href="#"><i class='bx bx-cart'></i></a>
            </div>
        </div>
    </nav>
</div>


