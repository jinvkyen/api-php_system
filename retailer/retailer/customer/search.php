<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>AYAKKUSU MERCH STORE</title>
    <link rel="icon" href="assets/logo.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chilanka&family=Montserrat:wght@300;400;500&display=swap" rel="stylesheet">

</head>

<body>
    <?php include('../customer/css/svg.php') ?>

    <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div>

    <!-- Cart Information -->
    <div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
        <div class="offcanvas-header justify-content-center">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="order-md-last">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Your cart</span>
                    <span class="badge bg-primary rounded-circle pt-2"><?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0'; ?></span>
                </h4>
                <form action="delete_cart.php" method="POST" id="cartForm">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <input type="checkbox" id="selectAll" class="me-2">
                                <label for="selectAll" class="my-0">Select All</label>
                            </div>
                        </li>
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $idproduct => $product) {
                                if (isset($product['price'], $product['quantity'], $product['name'], $product['description'], $product['currency'])) {
                                    $total += $product['price'] * $product['quantity'];
                                    echo '<li class="list-group-item d-flex justify-content-between lh-sm">';
                                    echo '<div>';
                                    echo '<h6 class="my-0">' . htmlspecialchars($product['name']) . '</h6>';
                                    echo '<small class="text-body-secondary">' . htmlspecialchars($product['description']) . '</small>';
                                    echo '</div>';
                                    echo '<span class="text-body-secondary">' . htmlspecialchars($product['currency']) . ' ' . number_format($product['price'], 2) . ' x ' . $product['quantity'] . '</span>';
                                    echo '<input type="checkbox" name="select[]" value="' . htmlspecialchars($idproduct) . '" class="ms-2 item-checkbox">';
                                    echo '</li>';
                                }
                            }
                        } else {
                            echo '<li class="list-group-item d-flex justify-content-between lh-sm">';
                            echo '<div>';
                            echo '<h6 class="my-0">Your cart is empty</h6>';
                            echo '</div>';
                            echo '</li>';
                        }
                        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-bold">Total (<?php echo isset($product['currency']) ? htmlspecialchars($product['currency']) : 'PhP'; ?>)</span>
                            <strong><?php echo number_format($total, 2); ?></strong>
                        </li>
                    </ul>
                    <div class="d-flex justify-content-between mb-3">
                        <button type="submit" name="delete_items" class="btn btn-danger w-45">Delete Selected</button>
                    </div>
                    <button type="button" onclick="checkoutSelected()" class="btn btn-primary w-100 btn-lg">Proceed to Checkout</button>
                </form>
            </div>
        </div>
        <script>
            // Select All functionality
            document.getElementById('selectAll').addEventListener('change', function() {
                const checkboxes = document.querySelectorAll('.item-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
            });

            function checkoutSelected() {
                const form = document.getElementById('cartForm');
                const selectedItems = form.querySelectorAll('input[name="select[]"]:checked'); // Corrected selector

                if (selectedItems.length > 0) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'checkout_items';
                    input.value = '1';
                    form.appendChild(input);

                    form.action = 'checkout_selected.php';
                    form.submit();
                } else {
                    alert('Please select at least one item to proceed.');
                }
            }
        </script>
    </div>
    <!-- End of Cart Information -->


    <!--header ng website-->
    <header>
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-sm-3 col-lg-2 text-center text-sm-start">
                    <div class="main-logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="logo" class="img-fluid">
                        </a>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="col-lg-4">
                    <div class="search-bar border rounded-2 px-3 border-dark-subtle">
                        <form id="search-form" class="text-center d-flex align-items-center" action="search.php" method="GET">
                            <input type="text" name="query" class="form-control border-0 bg-transparent" placeholder="Search Here" required />
                            <button type="submit">
                                <iconify-icon icon="tabler:search" class="fs-4 me-3"></iconify-icon>
                            </button>
                        </form>

                    </div>
                </div>
            </div>
            <!-- End of Search Bar -->

            <div class="container-fluid">
                <hr class="m-0">
            </div>

            <div class="container">
                <nav class="main-menu d-flex navbar navbar-expand-lg ">

                    <div class="d-flex d-lg-none align-items-end mt-3">
                        <ul class="d-flex justify-content-end list-unstyled m-0">
                            <li>
                                <!-- Cart Number -->
                                <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                    <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                    <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                        <?php
                                        session_start();

                                        if (!isset($_SESSION['cart'])) {
                                            $_SESSION['cart'] = array();
                                        }
                                        echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0';
                                        ?>
                                    </span>
                                </a>
                            </li>

                            <li>
                                <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                                    <iconify-icon icon="tabler:search" class="fs-4"></iconify-icon>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                        <div class="offcanvas-header justify-content-center">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body justify-content-between">
                            <ul class="navbar-nav menu-list list-unstyled d-flex gap-md-3 mb-0">
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a href="about_us.php" class="nav-link">About Us</a>
                                </li>
                                <!-- Anime News -->
                                <li class="nav-item">
                                    <a href="news.php" class="nav-link">News</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Order History</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">Payment History</a>
                                </li>
                            </ul>

                            <div class="d-none d-lg-flex align-items-end">
                                <ul class="d-flex justify-content-end list-unstyled m-0">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link mx-3">Welcome! <?php echo $_SESSION["email"]; ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <form action="includes/logout.inc.php" method="post" style="display: inline;">
                                            <a href="includes/logout.inc.php" class="mx-3 nav-link">Logout</a>
                                        </form>
                                    </li>
                                    <li class="">
                                        <a href="#" class="mx-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                                            <iconify-icon icon="mdi:cart" class="fs-4 position-relative"></iconify-icon>
                                            <span class="position-absolute translate-middle badge rounded-circle bg-primary pt-2">
                                                <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : '0'; ?>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
    </header>

    <!--categories-->
    <section id="categories">
        <div class="container">
            <div class="row my-5">
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <img src="images/keychain.jpg" class="img-fluid rounded-4" width="150px" alt="image">
                        <h5 class="nav-link">Key Chains and Pins</h5>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <img src="images/black shirt anime merch.png" class="img-fluid rounded-4" width="150px" alt="image">
                        <h5 class="nav-link">T-Shirts</h5>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <img src="images/figurine.png" class="img-fluid rounded-4" width="150px" alt="image">
                        <h5 class="nav-link">Figurines</h5>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <img src="images/plushie.png" class="img-fluid rounded-4" width="150px" alt="image">
                        <h5 class="nav-link">Plushies</h5>
                    </a>
                </div>
                <div class="col text-center">
                    <a href="#" class="categories-item">
                        <img src="images/poster.png" class="img-fluid rounded-4" width="215px" alt="image">
                        <h5 class="nav-link">Poster</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- merchandise -->
    <section id="merchandise" class="my-5 overflow-hidden" style="cursor: all-scroll;">
        <div class="container pb-5">
            <div class="section-header d-md-flex justify-content-between align-items-center mb-0">
            </div>

            <div class="products-carousel swiper">
                <div class="swiper-wrapper">
                    <?php
                    require '../../supplier/connection/database.conn.php';

                    // Get the search query
                    $query = isset($_GET['query']) ? htmlspecialchars($_GET['query']) : '';

                    // Prepare the SQL statement
                    $sql = "SELECT * FROM products 
                    WHERE 
                    name LIKE ? 
                    OR description LIKE ?
                    OR currency LIKE ?
                    OR category LIKE ?
                    OR prod_condition LIKE ?
                    OR status LIKE ?
                    OR price LIKE ?
                    ";


                    // Prepare the statement
                    if ($stmt = $conn->prepare($sql)) {
                        $searchTerm = '%' . $query . '%';
                        $stmt->bind_param('sssssss', $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm, $searchTerm);

                        // Execute the statement
                        if ($stmt->execute()) {
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                echo '<section id="search-results" class="my-5 overflow-hidden">';
                                echo '  <div class="container pb-5">';
                                echo '    <div class="section-header d-md-flex justify-content-between align-items-center mb-3">';
                                echo '      <h2 class="display-1 fw-normal">Search Results for "' . htmlspecialchars($query) . '"</h2>';
                                echo '    </div>';
                                echo '    <div class="products-carousel swiper">';
                                echo '      <div class="swiper-wrapper">';

                                while ($row = $result->fetch_assoc()) {
                                    $idproduct = htmlspecialchars($row['idproducts']);
                                    $name = htmlspecialchars($row['name']);
                                    $price = htmlspecialchars($row['price']);
                                    $quantity = htmlspecialchars($row['quantity']);
                                    $currency = htmlspecialchars($row['currency']);
                                    $prod_image = htmlspecialchars($row['prod_image']);
                                    $category = htmlspecialchars($row['category']);
                                    $condition = htmlspecialchars($row['prod_condition']);
                                    $status = htmlspecialchars($row['status']);

                                    // Construct the image path
                                    $imagePath = !empty($prod_image) ? '../../supplier/connection/uploads/' . $prod_image : 'default/image.jpg';

                                    echo '<div class="swiper-slide">';
                                    echo '  <div class="card position-relative">';
                                    echo '    <a href="single-product.html?id=' . $idproduct . '">';
                                    echo '      <img src="' . $imagePath . '" class="img-fluid rounded-4" width="265px" alt="' . $name . '">';
                                    echo '    </a>';
                                    echo '    <div class="card-body p-0">';
                                    echo '      <a href="single-product.php?id=' . $idproduct . '">';
                                    echo '        <h3 class="card-title pt-4 m-0">' . $name . '</h3>';
                                    echo '      </a>';
                                    echo '      <div class="card-text">';
                                    echo '        <h3 class="secondary-font text-primary">Quantity: ' . $quantity . '</h3>';
                                    echo '        <h3 class="secondary-font text-primary">' . $currency . ": " . $price . '</h3>';
                                    echo '        <div class="d-flex flex-wrap mt-3">';
                                    echo '          <button type="button" name="" class="btn btn-outline-primary btn-light me-3 px-4 pt-3 pb-3">';
                                    echo '            <h5 class="text-uppercase m-0">Add to Cart</h5>';
                                    echo '          </button>';
                                    echo '        </div>';
                                    echo '      </div>';
                                    echo '    </div>';
                                    echo '  </div>';
                                    echo '</div>';
                                }

                                echo '      </div>'; // swiper-wrapper
                                echo '    </div>'; // products-carousel
                                echo '  </div>'; // container
                                echo '</section>'; // search-results
                            } else {
                                echo '<section id="search-results" class="my-5 overflow-hidden">';
                                echo '  <div class="container pb-5">';
                                echo '    <h2 class="display-2 fw-normal">Search Results for "' . htmlspecialchars($query) . '"</h2>';
                                echo '    <p>No products found.</p>';
                                echo '  </div>'; // container
                                echo '</section>'; // search-results
                            }
                        } else {
                            echo 'Error executing query: ' . $stmt->error;
                        }
                    } else {
                        echo 'Error preparing statement: ' . $conn->error;
                    }
                    echo '<a href="index.php"><strong><h4 class="nav-link">Show All Products</h4></strong>';
                    echo '';
                    echo '</a>';

                    $stmt->close();
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- / products-carousel -->


    <div class="container-fluid">
        <hr class="m-0 py-3">
    </div>

    <!--services-->
    <section id="service">
        <div class="container py-2 my-2">
            <div class="row g-md-5 pt-4">
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div>
                            <iconify-icon class="service-icon text-primary" icon="la:shopping-cart"></iconify-icon>
                        </div>
                        <h3 class="card-title py-2 m-0">Free Delivery</h3>
                        <div class="card-text">
                            <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div>
                            <iconify-icon class="service-icon text-primary" icon="la:user-check"></iconify-icon>
                        </div>
                        <h3 class="card-title py-2 m-0">100% secure payment</h3>
                        <div class="card-text">
                            <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div>
                            <iconify-icon class="service-icon text-primary" icon="la:tag"></iconify-icon>
                        </div>
                        <h3 class="card-title py-2 m-0">Daily Offer</h3>
                        <div class="card-text">
                            <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 my-3">
                    <div class="card">
                        <div>
                            <iconify-icon class="service-icon text-primary" icon="la:award"></iconify-icon>
                        </div>
                        <h3 class="card-title py-2 m-0">Quality guarantee</h3>
                        <div class="card-text">
                            <p class="blog-paragraph fs-6">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!--footer-->
    <footer id="footer" class="my-5">
        <hr class="m-0">
        <div class="container py-1 my-5">
            <div class="row">

                <div class="col-md-6">
                    <div class="footer-menu">
                        <img src="images/logo.png" alt="logo" width="500px">
                        <p class="blog-paragraph fs-6 mt-3">Subscribe to our newsletter to get updates about our grand offers.</p>
                        <div class="social-links">
                            <ul class="d-flex list-unstyled gap-2">
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:facebook-fill"></iconify-icon>
                                    </a>
                                </li>
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:twitter-fill"></iconify-icon>
                                    </a>
                                </li>
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:pinterest-fill"></iconify-icon>
                                    </a>
                                </li>
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:instagram-fill"></iconify-icon>
                                    </a>
                                </li>
                                <li class="social">
                                    <a href="#">
                                        <iconify-icon class="social-icon" icon="ri:youtube-fill"></iconify-icon>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-menu">
                        <h3>Quick Links</h3>
                        <ul class="menu-list list-unstyled">
                            <li class="menu-item">
                                <a href="#" class="nav-link">Home</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="nav-link">About us</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="nav-link">Offer </a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="nav-link">Services</a>
                            </li>
                            <li class="menu-item">
                                <a href="#" class="nav-link">Conatct Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="footer-menu">
                        <h3>Help Center</h5>
                            <ul class="menu-list list-unstyled">
                                <li class="menu-item">
                                    <a href="#" class="nav-link">FAQs</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="nav-link">Payment</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="nav-link">Returns & Refunds</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="nav-link">Checkout</a>
                                </li>
                                <li class="menu-item">
                                    <a href="#" class="nav-link">Delivery Information</a>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/plugins.js"></script>
    <script src="js/script.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>