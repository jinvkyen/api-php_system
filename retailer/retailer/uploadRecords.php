<?php
// Include the database connection file
require "connection/database.conn.php";

if (isset($_POST["btnUpload"])) {
    // Check if there is an error in the file upload
    if ($_FILES["txtFile"]["error"] > 0) {
        echo "<script type=\"text/javascript\">
                alert(\"Invalid File: Please Upload CSV File.\");
                window.location = \"../retailer/products_table.php\";
              </script>";
        exit();
    } else {
        $filename = $_FILES["txtFile"]["tmp_name"];
        if ($_FILES["txtFile"]["size"] > 0) {
            $file = fopen($filename, "r");

            // Skips the first row
            $header = fgetcsv($file, 1000, ",");

            $query = "INSERT INTO products (idproducts, prod_image, name, description, quantity, currency, category, prod_condition, status, price) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE
                      prod_image = VALUES(prod_image),
                      name = VALUES(name),
                      description = VALUES(description),
                      quantity = VALUES(quantity),
                      category = VALUES(category),
                      prod_condition = VALUES(prod_condition),
                      status = VALUES(status),
                      price = VALUES(price),
                      currency = VALUES(currency)";
            $stmt = mysqli_prepare($conn, $query);

            $rowsAffected = 0;

            while (($getData = fgetcsv($file, 1000, ",")) !== FALSE) {
                // Ensure all necessary fields are present
                if (isset($getData[0], $getData[1], $getData[2], $getData[3], $getData[4], $getData[5], $getData[6], $getData[7], $getData[8], $getData[9])) {
                    // Check if required fields are not null or empty
                    if (!empty($getData[2]) && !empty($getData[3])) {
                        mysqli_stmt_bind_param($stmt, 'isssissssi', 
                                               $getData[0], $getData[1], $getData[2], 
                                               $getData[3], $getData[4], $getData[5],
                                               $getData[6], $getData[7], $getData[8], $getData[9]);
                        mysqli_stmt_execute($stmt);
                        $rowsAffected += mysqli_stmt_affected_rows($stmt);
                    } else {
                        echo "<script type=\"text/javascript\">
                                alert(\"Missing required fields in CSV file.\");
                                window.location = \"../retailer/products_table.php\";
                              </script>";
                        exit();
                    }
                } else {
                    echo "<script type=\"text/javascript\">
                            alert(\"Invalid File: Please Upload CSV File.\");
                            window.location = \"../retailer/products_table.php\";
                          </script>";
                    exit();
                }
            }
            fclose($file);
            mysqli_stmt_close($stmt);

            if ($rowsAffected > 0) {
                echo "<script type=\"text/javascript\">
                        alert(\"CSV file has been successfully imported. Rows affected: {$rowsAffected}.\");
                        window.location = \"../retailer/products_table.php\";
                      </script>";
            } else {
                echo "<script type=\"text/javascript\">
                        alert(\"No rows were affected. Please check your CSV file.\");
                        window.location = \"../retailer/products_table.php\";
                      </script>";
            }
        } else {
            echo "<script type=\"text/javascript\">
                    alert(\"Empty File: Please Upload CSV File.\");
                    window.location = \"../retailer/products_table.php\";
                  </script>";
        }
    }
}
// Close the database connection
mysqli_close($conn);
