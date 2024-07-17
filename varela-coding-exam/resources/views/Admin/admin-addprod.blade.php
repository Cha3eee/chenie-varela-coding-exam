<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/addprod.css">
    <link rel="icon" href="img/minimart.png" type="image/x-icon">
    <title>MegaMart Admin</title>
</head>
<body>
<nav>
    <img src="img/minimart.png" alt="MegaMart Logo">
    <span class="brand">MEGAMART</span>

    <div class="links">
        <a href="/admin-dashboard">Home</a>
    </div>
</nav>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="container">
    <h1>Add Product</h1>

    <?php
    function generateProductID($length = 6) {
        return substr(str_shuffle("0123456789"), 0, $length);
    }
    $productID = generateProductID();
    ?>

    <div class="form-group">
        <label for="prodID">Product ID:</label>
        <input type="text" id="prodID" name="prodID" value="<?php echo $productID; ?>" readonly>
    </div>

    <div class="form-group">
        <label for="prodName">Product Name:</label>
        <input type="text" id="prodName" name="prodName" maxlength="255" required>
    </div>

    <div class="form-group">
        <label for="prodDesc">Product Description:</label>
        <textarea id="prodDesc" name="prodDesc" rows="4" maxlength="255" oninput="checkLength(this);" required></textarea>
        <span id="prodDescCount" class="char-count" style="margin-left: 550px; opacity: 50%; font-size: 13px">0/255</span>
    </div>

    <div class="form-group">
        <label for="prodPrice">Product Price:</label>
        <input type="number" id="prodPrice" name="prodPrice" step="0.01" min="0" required>
    </div>

    <div class="form-group">
        <label for="prodImg">Product Image:</label>
        <input type="file" id="prodImg" name="prodImg"  accept="image/jpeg,image/png,image/jpg" required>
    </div>

    <div class="form-group">
        <input type="submit" value="Add Product" name="addProduct">
    </div>
</div>
</form>

<script>
    // Function to limit character input to 255 characters
    function checkLength(textarea) {
        if (textarea.value.length > 255) {
            textarea.value = textarea.value.substring(0, 255);
        }
        document.getElementById('prodDescCount').textContent = textarea.value.length + '/255';
    }
</script>
</body>
</html>
