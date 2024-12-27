<!-- View Item Modal -->
<div class="modal fade" id="viewItemModal" tabindex="-1" aria-labelledby="viewItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray-800 text-white">
                <h5 class="modal-title text-xl font-bold" id="viewItemModalLabel">Complete Product Information</h5>
                <button type="button" class="btn-close text-white text-2xl font-bold" data-dismiss="modal" aria-label="Close">&times;</button>
            </div>
            <div class="modal-body bg-gray-100">
                <div class="container mx-auto p-4">
                    <div class="flex flex-wrap -mx-4">
                        
                        <div class="w-full lg:w-1/2 px-4 mb-4 lg:mb-0">
                            <h6 class="text-lg font-semibold mb-2">Product Details</h6>
                            <!-- Product Image -->
                            <div id="view_image" class="bg-white rounded shadow-md p-4">
                                <img src="" class="w-full h-auto rounded" alt="Product Image">
                            </div>
                        </div>
                        <div class="w-full lg:w-1/2 px-4">
                            <div class="bg-white rounded shadow-md p-4">
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full lg:w-1/2 px-2 mb-4 lg:mb-0">
                                        <label class="block text-lg font-semibold mb-2">Product Name</label>
                                        <p id="view_name" class="text-gray-600"></p>
                                    </div>
                                    <div class="w-full lg:w-1/2 px-2">
                                        <label class="block text-lg font-semibold mb-2">Category</label>
                                        <p id="view_category" class="text-gray-600"></p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full lg:w-1/2 px-2 mb-4 lg:mb-0">
                                        <label class="block text-lg font-semibold mb-2">Description</label>
                                        <p id="view_description" class="text-gray-600"></p>
                                    </div>
                                    <div class="w-full lg:w-1/2 px-2">
                                        <label class="block text-lg font-semibold mb-2">Stocks</label>
                                        <p id="view_quantity" class="text-gray-600"></p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full lg:w-1/2 px-2 mb-4 lg:mb-0">
                                        <label class="block text-lg font-semibold mb-2">Condition</label>
                                        <p id="view_condition" class="text-gray-600"></p>
                                    </div>
                                    <div class="w-full lg:w-1/2 px-2">
                                        <label class="block text-lg font-semibold mb-2">Status</label>
                                        <p id="view_status" class="text-gray-600"></p>
                                    </div>
                                </div>
                                <div class="flex flex-wrap -mx-2">
                                    <div class="w-full lg:w-1/2 px-2 mb-4 lg:mb-0">
                                        <label class="block text-lg font-semibold mb-2">Price</label>
                                        <p id="view_price" class="text-gray-600"></p>
                                    </div>
                                    <div class="w-full lg:w-1/2 px-2">
                                        <label class="block text-lg font-semibold mb-2">Currency</label>
                                        <p id="view_currency" class="text-gray-600"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Item Modal
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addItemModalLabel">Add New Product</h5>
                <button type="button" class="btn-close text-red text-3xl font-weight-bold" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form action="connection/add_products.php" method="POST" enctype="multipart/form-data">
                    Form fields
                    <div class="container-fluid">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="itemName" name="name" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Condition</label>
                                <input type="text" class="form-control" id="prod_condition" name="prod_condition" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Stocks</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" name="price" min="1" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Currency</label>
                                <input type="text" class="form-control" id="currency" name="currency" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required style="resize:none"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="font-weight">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Add Product</button>
                        </div>
                        <div class="col-auto">
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<!-- Edit Modal
<div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editItemModalLabel">Edit Product Information</h5>
                <button type="button" class="btn-close text-red text-3xl font-weight-bold" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form action="connection/edit_item.conn.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="edit_id" name="id">
                    Form fields
                    <div class="container-fluid">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Category</label>
                                <input type="text" class="form-control" id="edit_category" name="category" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Condition</label>
                                <input type="text" class="form-control" id="edit_condition" name="prod_condition" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Stocks</label>
                                <input type="number" class="form-control" id="edit_quantity" name="quantity" min="1" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" id="edit_price" name="price" min="1" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Currency</label>
                                <input type="text" class="form-control" id="edit_currency" name="currency" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" id="edit_description" name="description" rows="3" required style="resize:none"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Status</label>
                                <input type="text" class="form-control" id="edit_status" name="status" required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<!-- Delete Item Modal
<div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold" id="deleteItemModalLabel">Delete Product</h5>
                <button type="button" class="btn-close text-red text-3xl font-weight-bold" data-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body text-center">
                <form id="deleteForm" action="connection/delete_item.conn.php" method="POST">
                    <input type="hidden" id="delete_id" name="id">
                    <p>Are you sure you want to delete this product?</p>
                    <div class="row p-4">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->

<!-- DataTable -->
<div class="bg-white shadow p-10 content-wrapper overflow-y-auto rounded">
    <div class="flex items-center justify-between pb-10">
        <h1 class="text-3xl text-black font-semibold">Product Information</h1>
        <form name="frmUpload" enctype="multipart/form-data" action="uploadRecords.php" method="POST" class="flex items-center space-x-4">
            <input type="file" name="txtFile" id="fileInput" class="bg-gray-300 p-2 text-black rounded cursor-pointer">
            <button class="bg-red-700 text-white rounded p-2" name="btnUpload" type="submit">Upload Records</button>
        </form>
    </div>
    <table id="productsTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Stocks</th>
                <th>Price</th>
                <th>Currency</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
            // Fetch data from the database
            require "connection/database.conn.php";

            $query = "SELECT * FROM products ORDER BY created_at ASC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($product = mysqli_fetch_assoc($result)) {
                    // Construct the image path
                    $imagePath = !empty($product['prod_image']) ? '../supplier/connection/uploads/' . htmlspecialchars($product['prod_image']) : '';

                    // Debug output to verify the path
                    error_log("Image Path: " . $imagePath);

                    $image = '<img src="' . $imagePath . '" style="width: 100px; height: auto;">';

                    $name = htmlspecialchars($product["name"]);
                    $description = htmlspecialchars($product["description"]);
                    $quantity = htmlspecialchars($product["quantity"]);
                    $currency = htmlspecialchars($product["currency"]);
                    $category = htmlspecialchars($product["category"]);
                    $condition = htmlspecialchars($product["prod_condition"]);
                    $status = htmlspecialchars($product["status"]);
                    $price = htmlspecialchars($product["price"]);
                    $id = htmlspecialchars($product["idproducts"]);

                    echo "<tr>
                <td>{$image}</td>
                <td>{$name}</td>
                <td>{$description}</td>
                <td>{$quantity}</td>
                <td>{$price}</td>
                <td>{$currency}</td>
                <td class='text-center'>
                    <div class='btn-group' role='group' aria-label='Product Actions'>
                        <button type='button' class='bg-red-700 text-white px-2 py-2 rounded viewBtn mx-1'
                            data-name='{$name}'
                            data-description='{$description}'
                            data-category='{$category}'
                            data-condition='{$condition}'
                            data-quantity='{$quantity}'
                            data-status='{$status}'
                            data-price='{$price}'
                            data-currency='{$currency}'
                            data-image='{$imagePath}'>
                            View
                        </button>
                    </div>
                </td>
            </tr>";

                    // Debug output
                    echo "<!-- Image Path Debug: {$imagePath} -->";
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No products found</td></tr>";
            }

            mysqli_close($conn);
            ?>
        </tbody>
        </table>
</div>