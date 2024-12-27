<div class="my-1"></div>

<header class="bg-white p-4 d-flex justify-between items-center rounded-t-xl">
    <!-- Left side: Logo and Welcome Message -->
    <div class="d-flex align-items-center">
        <img src="../supplier/assets/supplier-logo.png" alt="Logo" width="70" height="70" class="me-3">

        <div class="btn-group me-2" role="group" aria-label="First group">
            <a href="connection/logout.conn.php" class="btn btn-outline-light">Logout</a>
        </div>
    </div>



    <button type="button" class="btn btn-outline-light">
        <a href="products_table.php" class="nav-link text-lg text-blue-500 hover:text-blue-700">
            <h6 style="font-weight: bold;"><?php echo "Welcome, " . $_SESSION["email"]; ?></h6>
        </a>
    </button>





    <!-- Right side: Buttons -->
    <div class="d-flex align-items-center">

        <!-- Add New Product button -->


        <button type="button" class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#addItemModal"> + Add New Product</button>

    </div>
</header>