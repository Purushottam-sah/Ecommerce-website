<?php include("includes/header.php");
require("../admin/process/config.php");
if (!isset($_SESSION['uemail'])) {
    header("location:customer_homepage.php");
}

?>
<?php include("includes/navbar.php") ?>



<?php
if (isset($_GET['msg'])) {
    if (isset($_SESSION['uname'])) {
        $welcomeMessage = '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
            . '<strong>Welcome! </strong>' . $_SESSION['uname']
            . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
            . '</div>';
        echo $welcomeMessage;
    }
}
?>
<div class="body-widget mt-3">

    <div class="left-category-list">
        <ul class="category-section py-3">
            <li><a href="#"><i class='bx bx-child'></i><span>Women's Fashion</span></a></li>
            <li><a href="#"><i class='bx bx-injection'></i><span>Health & Beauty</span></a></li>
            <li><a href="#"><i class='bx bxs-t-shirt'></i><span>Men's Fashion</span></a></li>
            <li><a href="#"><i class='bx bx-stopwatch'></i><span>Watches & Accessories</span></a></li>
            <li><a href="#"><i class='bx bx-camera'></i><span>Electronic Devices</span></a></li>
            <li><a href="#"><i class='bx bx-tv'></i><span>TV & Home Appliances</span></a></li>
            <li><a href="#"><i class='bx bx-cctv'></i><span>Electronic Accessories</span></a></li>
            <li><a href="#"><i class='bx bx-cart-alt'></i><span>Groceries & Pets</span></a></li>
            <li><a href="#"><i class='bx bxl-tux'></i><span>Babies & Toys</span></a></li>
            <li><a href="#"><i class='bx bx-bed'></i><span>Home & Lifestyle</span></a></li>
            <li><a href="#"><i class='bx bx-cricket-ball'></i><span>Sports & Outdoor</span></a></li>
        </ul>
    </div>
    <div class="rightslider">
        <div class="slider">
            <div class="image-slider">
                <a href="#"><img src="img/banner/1.jpg" alt="banner"></a>
                <div class="overlay"></div>
                <div class="slider-content">
                    <!-- <a href="#">
                            <h3 class="text-white text-capitalize">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta quia sapiente autem unde, quasi etc.</h3>
                        </a>
                        <a href="#"><button class="btn btn-success buy-product my-3">Buy Now</button></a>
                        <a href="#"><button class="btn btn-primary readProduct my-3">Read More</button></a> -->
                </div>
            </div>
            <div>
                <a href="#"><img src="img/banner/2.jpg" alt="banner"></a>
                <div class="slider-content">
                    <!-- <a href="#">
                            <h3 class="text-white text-capitalize">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta quia sapiente autem unde, quasi etc.</h3>
                        </a>
                        <a href="#"><button class="btn btn-success buy-product my-3">Buy Now</button></a>
                        <a href="#"><button class="btn btn-primary readProduct my-3">Read More</button></a> -->
                </div>
            </div>
            <div>
                <a href="#"><img src="img/banner/3.jpg" alt="banner"></a>
                <div class="slider-content">
                    <!-- <a href="#">
                            <h3 class="text-white text-capitalize">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta quia sapiente autem unde, quasi etc.</h3>
                        </a>
                        <a href="#"><button class="btn btn-success buy-product my-3">Buy Now</button></a>
                        <a href="#"><button class="btn btn-primary readProduct my-3">Read More</button></a> -->
                </div>
            </div>
            <div>
                <a href="#"><img src="img/banner/4.jpg" alt="banner"></a>
                <div class="slider-content">
                    <!-- <a href="#">
                            <h3 class="text-white text-capitalize">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta quia sapiente autem unde, quasi etc.</h3>
                        </a>
                        <a href="#"><button class="btn btn-success buy-product my-3">Buy Now</button></a>
                        <a href="#"><button class="btn btn-primary readProduct my-3">Read More</button></a> -->
                </div>
            </div>
            <div>
                <a href="#"><img src="img/banner/5.jpg" alt="banner"></a>
                <div class="slider-content">
                    <!-- <a href="#">
                            <h3 class="text-white text-capitalize">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta quia sapiente autem unde, quasi etc.</h3>
                        </a>
                        <a href="#"><button class="btn btn-success buy-product my-3">Buy Now</button></a>
                        <a href="#"><button class="btn btn-primary readProduct my-3">Read More</button></a> -->
                </div>
            </div>
            <div>
                <a href="#"><img src="img/banner/6.jpg" alt="banner"></a>
                <div class="slider-content">
                    <!-- <a href="#">
                            <h3 class="text-white text-capitalize">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Soluta quia sapiente autem unde, quasi etc.</h3>
                        </a>
                        <a href="#"><button class="btn btn-success buy-product my-3">Buy Now</button></a>
                        <a href="#"><button class="btn btn-primary readProduct my-3">Read More</button></a> -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="flatProduct-offer">
    <div class="container-fluid text-center">
        <a href="#"> <img src="img/offer/offer1.png" alt="offer-product-img"></a>
    </div>
</div>
<div class="featuresProducts">
    <ul class="text-style-none d-flex feature-product-list">
        <li>
            <a href="#">
                <img src="img/feature/mart.png" alt="featureImg" width="80px"><span class="feature-product-title">Mart</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/beauty.png" alt="featureImg" width="80px">
                <span class="feature-product-title">Beauty</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/desor.png" alt="featureImg" width="80px"><span class="feature-product-title">Home and Decor</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/nepali.png" alt="featureImg" width="80px">
                <span class="feature-product-title">Proudly Nepali</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/men.png" alt="featureImg" width="80px">
                <span class="feature-product-title">Men's Fashion</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/electronics.png" alt="featureImg" width="80px">
                <span class="feature-product-title">Electronic</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/sale.png" alt="featureImg" width="80px">
                <span class="feature-product-title">Sale is Live</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/women.png" alt="featureImg" width="80px">
                <span class="feature-product-title">Women's Fashion</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/hobbies.png" alt="featureImg" width="80px">
                <span class="feature-product-title">Hobbies</span>
            </a>
        </li>
        <li>
            <a href="#">
                <img src="img/feature/everyday.png" alt="featureImg" width="80px">
                <span class="feature-product-title">Everyday Low Price</span>
            </a>
        </li>
    </ul>
</div>
<div class="latestProducts mb-4">
    <div class="latestProduct-info">
        <div class="latestprduct-title my-3">
            <span>Recently Added</span>
        </div>
        <div class="showMoreBtn">
            <button class="btn btn-success">Shop More</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/jeans1.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/jeans2.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/tshirt2.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/kurta.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/tshirt.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/shirt1.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="company-brand">
    <div class="brand-name">
        <span>Our Brands</span>
    </div>

    <div class="slider-brand">
        <div class="overlay1"></div>
        <div class="owl-carousel owl-theme brand-slider">
            <div class="item">
                <img src="img/brand/brand.svg" alt="brand">
            </div>
            <div class="item">
                <img src="img/brand/adidas.png" alt="brand">
            </div>
            <div class="item">
                <img src="img/brand/armore.png" alt="brand">
            </div>
            <div class="item">
                <img src="img/brand/brand2.png" alt="brand">
            </div>
            <div class="item">
                <img src="img/brand/brocade.png" alt="brand">
            </div>
            <div class="item">
                <img src="img/brand/lakhey.png" alt="brand">
            </div>
            <div class="item">
                <img src="img/brand/cross.png" alt="brand">
            </div>
        </div>
    </div>

</div>
<div class="shopCategories">
    <div class="category-title">
        <span>Categories</span>
    </div>
    <div class="categories-list d-grid">
        <div class="category-items d-grid">
            <img src="img/category/health.jpg" alt="category">
            <span>Health Accessories</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/cap.jpg" alt="category">
            <span>Hats & Caps</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/serum.jpg" alt="category">
            <span>Serum $ Essence</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/mats.jpg" alt="category">
            <span>Bath Mats</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/gloves.jpg" alt="category">
            <span>Cleaning Products</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/leggings.jpg" alt="category">
            <span>Leggings</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/bucket.jpg" alt="category">
            <span>Cleaning Buckets & Tubs</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/shoes.jpg" alt="category">
            <span>Shoes Organisers</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/kettles.jpg" alt="category">
            <span>Electric Kettles</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/sugar.jpg" alt="category">
            <span>Sugar</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/heaters.jpg" alt="category">
            <span>Heaters</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/food.jpg" alt="category">
            <span>Food Storage & Dispensers</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/face.jpg" alt="category">
            <span>Face Masks</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/door.jpg" alt="category">
            <span>Decorative Door Stops</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/earbud.jpg" alt="category">
            <span>Wireless Earbuds</span>
        </div>
        <div class="category-items d-grid">
            <img src="img/category/towels.jpg" alt="category">
            <span>Bath Towels</span>
        </div>
    </div>
</div>
<div class="justforyou mb-4">
    <div class="latestProduct-info">
        <div class="latestprduct-title my-3">
            <span>Just for You</span>
        </div>
        <div class="showMoreBtn">
            <button class="btn btn-success">Shop More</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/jeans1.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/jeans2.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/tshirt2.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/kurta.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/tshirt.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/shirt1.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/tshirt2.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/kurta.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/jeans2.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/tshirt.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/jeans1.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/shirt1.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/tshirt.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/jeans1.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/jeans2.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/tshirt2.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/shirt1.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-2 col-12 mt-2">
            <div class="card">
                <div class="latest-product-img">
                    <img src="img/latest/kurta.jfif" class="card-img-top" alt="latest">
                    <a href="#" class="addtocart"><i class='bx bx-cart'></i></a>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Wraon Super Light Blue Stretchable Premium</h6>
                    <div class="pricelist">
                        <span class="product-price">Rs. 250</span>
                        <div class="monthly-offer">
                            <span class="offer-price">Rs. 300</span> <span class="discount-offer">-38%</span>
                        </div>
                    </div>
                    <div class="product-rating mt-1">
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                        <i class='bx bxs-star'></i>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>




<?php include('includes/footer-nav.php') ?>
<?php include('includes/footer.php') ?>