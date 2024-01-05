<footer>
<div class="text-center py-2 bg-secondary text-light fixed-bottom">
    &copy; <?php echo date("Y"); ?> <a class="text-light" href="index.php">Ecommerce Store</a>
  </div></footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/113654cb35.js" crossorigin="anonymous"></script>

<script>
    // Function to sort products based on subcategory name
    function sortProducts(subcatName) {
        // You can perform sorting logic here
        // You might want to make an AJAX call to fetch and display sorted products
        console.log('Sorting products for subcategory: ' + subcatName);

        
    }

    // Original function to toggle subcategories
    function toggleSubcategories(category) {
        // Tìm thẻ ul con của thẻ li (thẻ subcategory-list)
        var subcategoryList = category.querySelector('.subcategory-list');

        // Kiểm tra trạng thái hiện tại và chuyển đổi giữa "none" và "block"
        subcategoryList.style.display = (subcategoryList.style.display === 'none' || subcategoryList.style.display === '') ? 'block' : 'none';
    }
   
  function redirectToNewPage() {
    // Change the URL to the desired page
    window.location.href = 'store.php';
  }
  function replaceWithTextBox() {
    // Replace button with text box and submit button
    document.getElementById('confirmAndPay').submit('send'); 
    document.getElementById('confirmAndPay').innerHTML = `
        <input type="text" name="confirmationCode" class="form-control" placeholder="Purchase code ">
        <button type="submit" name="confirm" class="form-control btn btn-success">Submit</button><br>
        
    `;
    
    // Submit the form after replacement
    // Replace 'yourFormId' with the actual form's ID
}



</script>
</script>




</body>
</html>
