<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> <!-- Use asset() to link CSS -->
    <link rel="icon" href="{{ asset('img/minimart.png') }}" type="image/x-icon">
    <title>MegaMart Admin</title>
</head>
<body>
<nav>
    <img src="{{ asset('img/minimart.png') }}" alt="MegaMart Logo"> <!-- Use asset() for image paths -->
    <span class="brand">MEGAMART</span>

    <div class="links-home">
        <a href="#home">Home</a>
        <a href="/admin-addprod">Add Product</a>
    </div>
</nav>
<h1>Products</h1>

<table class="products-table">
    <thead>
        <tr>
            <th>Image</th>
            <th>Product ID</th>
            <th>Item</th>
            <th>Description</th>
            <th>Price</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $productInfo)
        <tr class="product">
            <td><img src="data:image/jpeg;base64,{{ urlencode(base64_encode($productInfo->prodImg)) }}" /></td>
            <td>{{ $productInfo->prodID }}</td>
            <td>{{ $productInfo->prodName }}</td>
            <td>{{ $productInfo->prodDesc }}</td>
            <td>{{ $productInfo->prodPrice }}</td>
            <td>{{ $productInfo->created_at }}</td>
            <td>{{ $productInfo->updated_at }}</td>
            <td class="product-action">
                <a href='{{ route('Admin.view-products', ['prodID' => $productInfo->prodID]) }}'><button type="button">Update</button></a>
                <form method="POST" action="{{ route('product.delete', ['prodID' => $productInfo->prodID]) }}">
                    @csrf
                    @method('DELETE')
                    <input class="title" type="submit" name="submitdelete" value="X DELETE" onclick="return confirm('Are you sure you want to delete?');">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="pagination">
    {{ $products->links('vendor.pagination.simple-default') }}
</div>

</body>
</html>
