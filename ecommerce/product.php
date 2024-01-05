<?php
include "inc/header.php";

if (isset($_SESSION['customer'])) {
    include "controller/cart_manager.php";
    while ($row = mysqli_fetch_array($query_run_id)) {
        $uid = $row['id'];
        if (isset($_POST['add_to_cart'])) {
            $pid = $_POST['product_id'];
            $oqnt = $_POST['qnt'];
            if (empty($oqnt) || $oqnt == 0) {
                header("location: index.php");
                break;
            }

            // Check if product already exists in cart
            $check_existing = "SELECT * FROM cart WHERE pid = '$pid' AND uid = '$uid'";
            $query_existing = mysqli_query($conn, $check_existing);

            if (mysqli_num_rows($query_existing) > 0) {
                // Product exists, update quantity and total
                $row_existing = mysqli_fetch_array($query_existing);
                $new_oqnt = $row_existing['oqnt'] + $oqnt;
                $new_ototal = $row_existing['opprice'] * $new_oqnt;
                $update = $conn->query("UPDATE cart SET oqnt = '$new_oqnt', ototal = '$new_ototal' WHERE pid = '$pid' AND uid = '$uid'");
                if ($update) {
                    echo "<script>alert('Item quantity updated in cart');window.location.href='store.php';</script>";
                } else {
                    echo "<script>alert('Failed to update quantity');window.location.href='store.php';</script>";
                }
            } else {
                // Product not in cart, add it
                $check = "SELECT * FROM product2 WHERE pid = '$pid'";
                $query_run = mysqli_query($conn, $check);
                while ($row = mysqli_fetch_array($query_run)) {
                    $opid = $row['pid'];
                    $opname = $row['pname'];
                    $opprice = $row['pprice'];
                    $ototal = $opprice * $oqnt;
                    $insert = $conn->query("INSERT INTO cart(pid,uid,opname,opprice,oqnt,ototal) VALUES ('$opid','$uid','$opname','$opprice','$oqnt','$ototal')");
                    if (!$insert) {
                        echo "<script>alert('An unexpected error occured')</script>";
                    } else {
                        echo "<script>alert('Item successfully added to cart');window.location.href='store.php';</script>";
                    }
                }
            }
        }
    }
}


// fetching product data from dabatase
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['pp'])) {
        $p = $_POST['product'];
        $check = "SELECT * FROM product2 WHERE pname = '$p'";
        $query_run = mysqli_query($conn, $check);
    }
}

?>
<style>
  .container .row .text-end {
    text-align: left !important; /* Set the desired text alignment */
  }
</style>
<div class="container text-secondary">
    <form action="" method="POST" class="row py-5">
        <!-- displaying fetched data about product -->
        <?php while ($row = mysqli_fetch_array($query_run)) {?>
            <img src="<?php echo $row['p_img']; ?>" class="col-4 flex-shrink-0" style="max-width: 100%;" alt="">
        <div class="col-7 mx-auto text-end">
            <h1 class="mb-3"><?php echo $row['pname']; ?></h1>
            <h5 class="mb-3">Price: $<?php echo $row['pprice']; ?> </h5>
            <h4 class="mt-3">Description </h4>
            <p class="text-justify mb-2">
                <?php echo $row['pdes']; ?>
            </p>
            <!-- conditional function to add to card, depending on if user is logged in -->
            <?php if (!isset($_SESSION['customer'])) {?>
                <p class="my-0 fw-bold">Login to add to cart</p>
            <?php }?>
            <div class="d-flex my-3">
                <p class="col-11 me-2 my-1">Quantity: </p>
                <input type="number" class="col-1" name="qnt" value="1" <?php if (!isset($_SESSION['customer'])) {?> disabled <?php ;}?>>
            </div>
            <input type="submit" class="btn btn-success" name="add_to_cart" value="Add to Cart >" <?php if (!isset($_SESSION['customer'])) {?> disabled <?php ;}?>>
            <input type="hidden" name="product_id" value="<?php echo $row['pid']; ?>">
        </div>
        <?php }?>
    </form>.
    
    <?php
    $sql = "SELECT * FROM product2 ORDER BY RAND() LIMIT 4";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
      <h1 class="text-center my-4">Similar Products</h1>
      <div  style="margin-bottom: 40px;" class="px-5">
        <div class="row text-dark">
          <?php
          while ($row = $result->fetch_assoc()) {
            $imgSrc = "{$row['p_img']}";
          ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <div class="card hover p-2 mx-auto mt-2 ">
                <div class="image-container">
                  <img class="img-fluid" src="<?php echo $imgSrc; ?>" alt="Card image">
                </div>
                <div class="card-body text-center">
                  <form action="product.php" method="POST">
                    <h4 class="card-title"><?php echo substr($row['pname'], 0, 20); ?></h4>
                    <p class="card-text">Price: $<?php echo $row["pprice"]; ?></p>
                    <input type="submit" class="btn btn-secondary px-3 text-white" name="pp" value="See Product >">
                    <input type="hidden" name="product" value="<?php echo $row["pname"]; ?>">
                  </form>
                </div>
              </div>
            </div>
          <?php
          }
          ?>
          
        </div>
      </div>
    <?php
    } else {
      echo "0 results";
    }
    ?>
</div>
<?php
include "inc/footer.php";
?>
