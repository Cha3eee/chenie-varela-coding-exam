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
<nav>
    <img src="img/minimart.png" alt="MegaMart Logo">
    <span class="brand">MEGAMART</span>

    <div class="links">
        <a href="/admin-dashboard">Home</a>
    </div>
</nav>
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
        <textarea id="prodDesc" name="prodDesc" rows="4" required></textarea>
    </div>

    <div class="form-group">
        <label for="prodPrice">Product Price:</label>
        <input type="number" id="prodPrice" name="prodPrice" step="0.01" min="0" required>
    </div>

    <div class="form-group">
        <label for="prodImg">Product Image:</label>
        <input type="file" id="prodImg" name="prodImg">
    </div>

    <div class="form-group">
        <button type="submit">Add Product</button>
    </div>
</div>
</body>
</html>