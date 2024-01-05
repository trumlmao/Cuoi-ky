

<?php
// Include your database connection file here
include "database/database.php";

// Check if the product ID is set in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product details based on the ID
    $sql = "SELECT * FROM product2 WHERE pid = $product_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Check if there is a matching product
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $pname = $row['pname'];
            $pprice = $row['pprice'];
            $p_img = $row['p_img'];
            $pdes = $row['pdes'];
            $main_category_id = $row['main_category_id'];
            $subcategory_id = $row['subcategory_id'];
            $keyboard_type = $row['keyboard_type'];
            $switch_type = $row['switch_type'];
            $interface_type = $row['interface_type'];
            $accessory_type = $row['accessory_type'];
        } else {
            echo "Product not found.";
            exit();
        }
    } else {
        echo "Error retrieving product details: " . mysqli_error($conn);
        exit();
    }
} else {
    echo "Product ID not specified.";
    exit();
}

// Process form submission if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    // Add validation and sanitization as needed
    $updated_pname = $_POST['pname'];
    $updated_pprice = $_POST['pprice'];
    $updated_p_img = $_POST['p_img'];
    $updated_pdes = $_POST['pdes'];
    $updated_main_category_id = $_POST['main_category_id'];
    $updated_subcategory_id = $_POST['subcategory_id'];
    $updated_keyboard_type = $_POST['keyboard_type'];
    $updated_switch_type = $_POST['switch_type'];
    $updated_interface_type = $_POST['interface_type'];
    $updated_accessory_type = $_POST['accessory_type'];

    // Update product in the database
    $update_sql = "UPDATE product2 SET
        pname = '$updated_pname',
        pprice = '$updated_pprice',
        p_img = '$updated_p_img',
        pdes = '$updated_pdes',
        main_category_id = '$updated_main_category_id',
        subcategory_id = '$updated_subcategory_id',
        keyboard_type = '$updated_keyboard_type',
        switch_type = '$updated_switch_type',
        interface_type = '$updated_interface_type',
        accessory_type = '$updated_accessory_type'
        WHERE pid = $product_id";

    $update_result = mysqli_query($conn, $update_sql);

    if ($update_result) {
        echo "Product updated successfully.";
    } else {
        echo "Error updating product: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        /* Add some basic styling for better presentation */
        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <h2>Edit Product</h2>

    <form action="edit_product.php?id=<?php echo htmlspecialchars($product_id); ?>" method="POST">
        <!-- Left Column -->
        <div>
            <label for="pname">Product Name:</label>
            <input type="text" name="pname" value="<?php echo htmlspecialchars($pname); ?>" required>

            <label for="pprice">Product Price:</label>
            <input type="text" name="pprice" value="<?php echo htmlspecialchars($pprice); ?>" required>

            <label for="p_img">Product Image URL:</label>
            <input type="text" name="p_img" value="<?php echo htmlspecialchars($p_img); ?>" required>

            <label for="pdes">Product Description:</label>
            <textarea name="pdes" required><?php echo htmlspecialchars($pdes); ?></textarea>
        </div>

        <!-- Right Column -->
        <div>
            <label for="main_category_id">Main Category ID:</label>
            <input type="text" name="main_category_id" value="<?php echo htmlspecialchars($main_category_id); ?>">

            <label for="subcategory_id">Subcategory ID:</label>
            <input type="text" name="subcategory_id" value="<?php echo htmlspecialchars($subcategory_id); ?>">

            <label for="keyboard_type">Keyboard Type:</label>
            <input type="text" name="keyboard_type" value="<?php echo htmlspecialchars($keyboard_type); ?>">

            <label for="switch_type">Switch Type:</label>
            <input type="text" name="switch_type" value="<?php echo htmlspecialchars($switch_type); ?>">

            <label for="interface_type">Interface Type:</label>
            <input type="text" name="interface_type" value="<?php echo htmlspecialchars($interface_type); ?>">

            <label for="accessory_type">Accessory Type:</label>
            <input type="text" name="accessory_type" value="<?php echo htmlspecialchars($accessory_type); ?>">
        </div>
    
        <!-- Submit Button -->
        <div>
            <input type="submit" class="btn btn-primary" value="Update Product">
            
            <a href="manager.php" class="btn">Back to Manager Page</a>
        </div>
    </form>
</body>
</html>


    <!-- Bootstrap JS and Popper.js (optional)
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> -->
