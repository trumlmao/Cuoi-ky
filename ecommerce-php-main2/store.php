<?php
include "inc/header.php";
?>

<div class="container-fluid p-0 main-store">
    <h1 class="text-center text-secondary my-4">All Products</h1>
    <div class="row">
        <div class="col-lg-2">
            <!-- Nội dung thanh category -->
            <?php
            function getSubcategories($mainCategoryId, $conn)
            {
                $sql = "SELECT * FROM subcategory WHERE main_category_id = $mainCategoryId";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo '<ul class="subcategory-list">';
                    while ($row = $result->fetch_assoc()) {
                        echo '<li class="subcategory-item">';
                        echo '<button class="text-only-button" onclick="sortProducts(\'' . $row["subcat_name"] . '\')" class="plain-text-button">' . $row["subcat_name"] . '</button>';
                        echo '</li>';
                    }
                    echo '</ul>';
                }
            }

            // Retrieve main categories
            $sqlMainCategories = "SELECT * FROM main_category";
            $resultMainCategories = $conn->query($sqlMainCategories);

            if ($resultMainCategories->num_rows > 0) {
                echo '<div class="category-bar">';
                echo '<ul class="category-list">';
                while ($rowMainCategory = $resultMainCategories->fetch_assoc()) {
                    echo '<li class="category-item" onclick="toggleSubcategories(this)">' . $rowMainCategory["name"];
                    getSubcategories($rowMainCategory["main_category_id"], $conn);
                    echo '</li>';
                }
                echo '</ul>';
                echo '</div>';
            }
            ?>

        </div>
        <!--  -->
        <!-- grid of products -->
        <div class="col-lg-9 store-pd">
            <div class="row">
                <?php
                $productsPerPage = 16;

                // Xác định trang hiện tại
                if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                    $currentPage = max(1, $_GET['page']);
                } else {
                    $currentPage = 1;
                }

                // Tính toán vị trí bắt đầu của sản phẩm trong database
                $startIndex = ($currentPage - 1) * $productsPerPage;

                // Truy vấn database để lấy sản phẩm cho trang hiện tại
                $sql = "SELECT * FROM product2 LIMIT $startIndex, $productsPerPage";
                $result = $conn->query($sql);

                $sqlCount = "SELECT COUNT(*) as total FROM product2";
                $resultCount = $conn->query($sqlCount);
                $rowCount = $resultCount->fetch_assoc();
                $totalProducts = $rowCount['total'];

                // Tính tổng số trang
                $totalPages = ceil($totalProducts / $productsPerPage);


                while ($row = $result->fetch_assoc()) {

                    echo '<form action="product.php" method="POST" class="card hover col-lg-3 col-md-4 col-sm-6 col-xs-12 mx-auto">';
                    echo '<img class="img-fluid " src="' . $row["p_img"] . '" alt="Card image">';
                    echo '<div class="card-body">';
                    echo '<h4 class="card-title">' . $row["pname"] . '</h4>';
                    echo '<p class="card-text">Price: $' . $row["pprice"] . '</p>';
                    echo '<input type="submit" class="btn btn-secondary px-3 text-white" name="pp" value="See Product >">';
                    echo '<input type="hidden" name="product" value="' . $row["pname"] . '">';
                    echo '</div></form>';
                }

                // Hiển thị các liên kết chuyển trang
                echo "<div class='pagination'>";
                echo "<ul class='pagination'>";

                // Previous Page Link
                if ($currentPage > 1) {
                    $prevPage = $currentPage - 1;
                    echo "<li class='page-item'><a class='page-link' href='?page=$prevPage'>&laquo; Previous</a></li>";
                }

                // Numbered Pages
                for ($i = 1; $i <= $totalPages; $i++) {
                    if ($i == $currentPage) {
                        echo "<li class='page-item active'><span class='page-link current-page'>$i</span></li>";
                    } else {
                        echo "<li class='page-item'><a class='page-link' href='?page=$i'>$i</a></li>";
                    }
                }
                // Next Page Link
                if ($currentPage < $totalPages) {
                    $nextPage = $currentPage + 1;
                    echo "<li class='page-item'><a class='page-link' href='?page=$nextPage'>Next &raquo;</a></li>";
                }
                echo "</ul>";
                echo "</div>";
                ?>
            </div>
        </div>

    </div>
</div>



<?php
include "inc/footer.php";
?>