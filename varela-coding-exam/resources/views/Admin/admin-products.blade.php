<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="icon" href="img/minimart.png" type="image/x-icon">
    <title>MegaMart Admin</title>
</head>
<nav>
    <img src="img/minimart.png" alt="MegaMart Logo">
    <span class="brand">MEGAMART</span>

    <div class="links">
        <a href="#home">Home</a>
        <a href="/admin-addprod">Add Product</a>
    </div>
</nav>
<h1>Products</h1>

<table class="products-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Item</th>
            <th>Description</th>
            <th>Price</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr class="product">
            <td><img src="img/minimart.png" alt="Product 1"></td>
            <td>Item 1</td>
            <td>prod desc</td>
            <td>prod price</td>
            <td>created at</td>
            <td>updated at</td>
            <td class="product-action"><button>Update Product</button></td>
        </tr>
        <tr class="product">
            <td><img src="img/minimart.png" alt="Product 2"></td>
            <td>Item 2</td>
            <td>prod desc</td>
            <td>prod price</td>
            <td>created at</td>
            <td>updated at</td>
            <td class="product-action"><button>Update Product</button></td>
        </tr>
    </tbody>
</table>

<div class="pagination">
    <a href="#" class="active">1</a>
    <a href="#">2</a>
    <a href="#">3</a>
    <a href="#">4</a>
    <a href="#">5</a>
    <a href="#">Next</a>
</div>
</body>
</html>