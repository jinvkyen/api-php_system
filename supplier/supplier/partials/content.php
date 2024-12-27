<!DOCTYPE html>
<html lang="en">

<!-- View Item Modal -->
<div class="modal fade" id="viewItemModal" tabindex="-1" aria-labelledby="viewItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-gray-800 text-white">
                <h5 class="modal-title text-xl font-bold text-white" id="viewItemModalLabel">Complete Product Information</h5>
                <button type="button" class="btn-close text-white text-2xl font-bold" data-bs-dismiss="modal" aria-label="Close"></button>

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


<!-- Add Item Modal -->
<div class="modal fade" id="addItemModal" tabindex="-1" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-600 text-white">
                <h5 class="modal-title text-xl font-bold text-white" id="addItemModalLabel">Add New Product</h5>
                <button type="button" class="btn-close text-white text-2xl font-bold" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body bg-gray-100">
                <form action="connection/add_products.php" method="POST" enctype="multipart/form-data">
                    <div class="container mx-auto p-4">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Product Name</label>
                                <input type="text" class="form-control" id="itemName" name="name" required>
                            </div>
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Category</label>
                                <input type="text" class="form-control" id="category" name="category" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Condition</label>
                                <input type="text" class="form-control" id="prod_condition" name="prod_condition" required>
                            </div>
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Stocks</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Price</label>
                                <input type="number" class="form-control" id="price" name="price" min="1" required>
                            </div>
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Currency</label>
                                <input type="text" class="form-control" id="currency" name="currency" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3" required style="resize:none"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Status</label>
                                <input type="text" class="form-control" id="status" name="status" required>
                            </div>
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2">
                            <button type="submit" class="btn btn-outline-primary">Add Product</button>
                            <button type="reset" class="bg-gray-500 text-white px-4 py-2 rounded">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Edit Modal -->
<div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-blue-600 text-white">
                <h5 class="modal-title text-xl font-bold" id="editItemModalLabel" style="color: white;">Edit Product Information</h5>
                <button type="button" class="btn-close text-white text-2xl font-bold" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body bg-gray-100">
                <form action="connection/edit_item.conn.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="edit_id" name="id">
                    <div class="container mx-auto p-4">
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Product Name</label>
                                <input type="text" class="form-control" id="edit_name" name="name" required>
                            </div>
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Category</label>
                                <input type="text" class="form-control" id="edit_category" name="category" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Condition</label>
                                <input type="text" class="form-control" id="edit_condition" name="prod_condition" required>
                            </div>
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Stocks</label>
                                <input type="number" class="form-control" id="edit_quantity" name="quantity" min="1" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Price</label>
                                <input type="number" class="form-control" id="edit_price" name="price" min="1" required>
                            </div>
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Currency</label>
                                <input type="text" class="form-control" id="edit_currency" name="currency" required>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Description</label>
                                <textarea class="form-control" id="edit_description" name="description" rows="3" required style="resize:none"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Status</label>
                                <input type="text" class="form-control" id="edit_status" name="status" required>
                            </div>
                            <div class="w-full lg:w-1/2 px-2 mb-4">
                                <label class="block text-lg font-semibold mb-2">Image</label>
                                <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                            </div>
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="btn btn-outline-success">Save Changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Delete Item Modal -->
<div class="modal fade" id="deleteItemModal" tabindex="-1" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-red-600 text-white">
                <h5 class="modal-title text-xl font-bold text-white" id="deleteItemModalLabel">Delete Product</h5>
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal" aria-label="Close">&times;</button>


            </div>
            <div class="modal-body bg-gray-100 text-center">
                <form id="deleteForm" action="connection/delete_item.conn.php" method="POST">
                    <input type="hidden" id="delete_id" name="id">
                    <p>Are you sure you want to delete this product?</p>
                    <div class="flex justify-center p-4">
                        <button type="submit" class="btn btn-outline-danger">Yes, delete it.</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<!-- DataTable -->
<div class="bg-white p-4 content-wrapper overflow-y-auto rounded-b-lg">
    <table id="productsTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Stocks</th>
                <th>Currency</th>
                <th>Date</th>
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
                    $imagePath = !empty($product['prod_image']) ? 'connection/uploads/' . htmlspecialchars($product['prod_image']) : '';

                    // Debug output to verify the path
                    error_log("Image Path: " . $imagePath);

                    $image = '<img src="' . $imagePath . '" style="width: 100px; height: auto;">';

                    $name = htmlspecialchars($product["name"]);
                    $description = htmlspecialchars($product["description"]);
                    $quantity = htmlspecialchars($product["quantity"]);
                    $currency = htmlspecialchars($product["currency"]);
                    $createdAt = htmlspecialchars($product["created_at"]);
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
                <td>{$currency}</td>
                <td>{$createdAt}</td>
                <td class='text-center'>
                    <div class='btn-group' role='group' aria-label='Product Actions'>
                        <button type='button' class='bg-yellow-400 text-white px-2 py-2 rounded viewBtn mx-1'
                            data-name='{$name}'
                            data-description='{$description}'
                            data-category='{$category}'
                            data-condition='{$condition}'
                            data-quantity='{$quantity}'
                            data-status='{$status}'
                            data-price='{$price}'
                            data-currency='{$currency}'
                            data-image='{$imagePath}'>
                            <i class='fas fa-eye fa-xl'></i>
                        </button>
                        <button type='button' class='bg-green-400 text-white px-2 py-2 rounded editBtn mx-1'
                            data-id='{$id}'
                            data-name='{$name}'
                            data-description='{$description}'
                            data-category='{$category}'
                            data-condition='{$condition}'
                            data-quantity='{$quantity}'
                            data-status='{$status}'
                            data-price='{$price}'
                            data-currency='{$currency}'
                            data-image='{$imagePath}'>
                            <i class='fa-solid fa-pen-to-square fa-xl'></i>
                        </button>
                        <button type='button' class='bg-red-600 text-white px-2 py-2 rounded deleteBtn mx-1'
                            data-id='{$id}'>
                            <i class='fa-solid fa-trash fa-xl'></i>
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
    <!-- Download Button -->
    <div class="mt-3 flex justify-end">
        <button id="downloadButton" class="btn btn-outline-info">Download Products</button>
    </div>
</div>

<script src="/supplier/js/bootstrap.bundle.min.js"></script>

</html>