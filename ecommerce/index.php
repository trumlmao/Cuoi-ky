<?php
include "inc/header.php";
?>
<div class="container-fluid p-0 mb-4">
  <div class="row-fluid mx-0 mb-5">
    <div id="carousel-main" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carousel-main" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carousel-main" data-bs-slide-to="1" aria-label="Slide 2"></button>
      
    </div>

    <div class="carousel-inner">
      <div class="carousel-item active c-item">
        <img src="https://assetsio.reedpopcdn.com/k70max.jpg?width=1920&height=1920&fit=bounds&quality=80&format=jpg&auto=webp" class="d-block w-100 c-img" alt="Slide 1">
        <div class="carousel-caption top-0 mt-4">
          <p class="mt-5 fs-3 text-uppercase">Discover the world of feeling, sound and more</p>
          
          <button class="btn btn-primary px-4 py-2 fs-5 mt-5" onclick="redirectToNewPage()">Get a keyboard!</button>>
        </div>
      </div>
      <div class="carousel-item c-item">
        <img src="https://assetsio.reedpopcdn.com/fnatic-streak-65.jpg?width=1920&height=1920&fit=bounds&quality=80&format=jpg&auto=webp" class="d-block w-100 c-img" alt="Slide 2">
        <div class="carousel-caption top-0 mt-4">
          <p class="text-uppercase fs-3 mt-5">Your thumds desire bettel !</p>
          
          <button class="btn btn-primary px-4 py-2 fs-5 mt-5" onclick="redirectToNewPage()">Get a nice keyboard!</button>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-main
" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carousel-main
" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

    <!-- slider section end -->

    <!-- Products section start -->
    <?php
    $sql = "SELECT * FROM product2 LIMIT 4";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
      <h1 class="text-center my-4">Most Popular Products</h1>
      <div class="px-5">
        <div class="row text-dark">
          <?php
          while ($row = $result->fetch_assoc()) {
            $imgSrc = "{$row['p_img']}";
          ?>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
              <div class="card hover p-2 mx-auto mt-2 ">
                <div class="image-container">
                  <img class="img-fluid" style="vertical-align: middle;" src="<?php echo $imgSrc; ?>" alt="Card image">
                </div>
                <div class="card-body text-center">
                  <form action="product.php" method="POST">
                    <h4 class="card-title"><?php echo $row["pname"]; ?></h4>
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
          <div class="text-center mb-3">
            <a class="mt-4 px-4 btn btn-secondary" href="store.php">See More ></a>
          </div>
        </div>
      </div>
    <?php
    } else {
      echo "0 results";
    }
    ?>


    <!-- Products section end -->
    <hr>

    <!-- features section start -->
    <?php
    $sql = "SELECT * FROM product2 ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
    ?>
      <form action="product.php" method="POST" class="px-5 mb-5">
        <div class="row my-5 px-5">
          <p class="lead">Random Product</p>

          <div class="row">
            <div class="col-md-8 md-5 order-md-1 order-2">
              <h1 class="text-dark"><?php echo $row["pname"]; ?></h1>
              <p class="text-dark my-4"><?php echo $row["pdes"]; ?></p>
              <input type="submit" class="btn btn-secondary px-4 text-white" name="pp" value="Buy Now >">
              <input type="hidden" name="product" value="<?php echo $row["pname"]; ?>">
            </div>
            <div class="col-md-4 order-md-2 order-1">
              <img class="img-fluid randimg md-5 " src="<?php echo $row["p_img"]; ?>" alt="d">
            </div>
          </div>
        </div>
      </form>


    <?php
    } else {
      echo "0 results";
    }
    ?>


  </div>.
  
</div>
<?php
include "inc/footer.php";
?>