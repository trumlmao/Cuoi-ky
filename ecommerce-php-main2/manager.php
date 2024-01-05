<?php
include "inc/header.php"; ?>
<!DOCTYPE html>
<html>

<head>
    <style>
        td {
            max-width: 200px;
            max-height: 50px;
            
            overflow: hidden;
        }
        
    /* Áp dụng kiểu cho danh sách ul */
    ul {
        list-style-type: none; /* Loại bỏ dấu hiệu danh sách mặc định */
        margin: 0;
        padding: 0;
        overflow: hidden; /* Loại bỏ overflow */
        /* background-color: #333; Màu nền của thanh điều hướng */
    }

    /* Áp dụng kiểu cho mỗi mục li */
    li {
        float: left; /* Đặt mỗi mục li nằm bên cạnh nhau */
    }

    /* Áp dụng kiểu cho các liên kết a bên trong mục li */
    li a {
        display: block; /* Chuyển đổi liên kết thành phần block để chiếm toàn bộ chiều rộng của mục li */
        color: black; /* Màu chữ trắng */
        text-align: center; /* Canh lề chữ giữa */
        padding: 14px 16px; /* Khoảng cách giữa các liên kết */
        text-decoration: none; /* Loại bỏ đường gạch chân */
    }

    /* Đổi màu khi di chuột qua liên kết */
    li a:hover {
        background-color: #111; /* Màu nền khi di chuột qua */
    }
</style>



    </style>
    <title>Product Management</title>
</head>

<body>
    <div class="container">
        <div class="row">
        <div class="col-4 sidebar">
    <ul>
        <li><a href="product_management.php">Product</a></li>
        <li><a href="account_management.php">Account</a></li>
        <li><a href="sale_management.php">Sale</a></li>
    </ul>
</div>
            <div class="col-8 table ">
                <table border="1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Main Category</th>
                            <th>Subcategory</th>
                            <th>Keyboard Type</th>
                            <th>Switch Type</th>
                            <th>Interface Type</th>
                            <th>Accessory Type</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Connect to your database


                        // Check connection
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        }

                        // Fetch product data
                        $sql = "SELECT * FROM product2";
                        $result = mysqli_query($conn, $sql);

                        // Display product data in the table
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['pid'] . "</td>";
                                echo "<td>" . $row['pname'] . "</td>";
                                echo "<td>" . $row['pprice'] . "</td>";
                                echo "<td><img src='" . $row['p_img'] . "' width='50' height='50'></td>";
                                echo "<td>" . substr($row['pdes'], 0, 50) . "..." . "</td>";
                                echo "<td>" . $row['main_category_id'] . "</td>";
                                echo "<td>" . $row['subcategory_id'] . "</td>";
                                echo "<td>" . $row['keyboard_type'] . "</td>";
                                echo "<td>" . $row['switch_type'] . "</td>";
                                echo "<td>" . $row['interface_type'] . "</td>";
                                echo "<td>" . $row['accessory_type'] . "</td>";
                                echo "<td><a href='edit_product.php?id=" . $row['pid'] . "'>Edit</a> | <a href='delete_product.php?id=" . $row['pid'] . "'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='12'>No products found.</td></tr>";
                        }

                        mysqli_close($conn);
                        ?>

                    </tbody>
                </table>
            </div>
            

        </div>
    </div>

</body>

</html>


<?php

include "inc/footer.php";
?>