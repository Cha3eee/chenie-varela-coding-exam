@include('AdminHeaders.__headersAdmin-prodperpage')
<body>
<nav>
    <span class="brand">MEGAMART</span>

    <div class="links">
        <a href="/admin-dashboard">Home</a>
    </div>
</nav>

<div class="container">
    <h1>Update Product</h1>

    @if ($isCached)
        <div class="alert alert-info">
            Product details were loaded from the cache.
        </div>
    @else
        <div class="alert alert-info">
            Product details were loaded from the database.
        </div>
    @endif

<form method="POST" action="{{ route('Admin.edit-product', ['prodID' => $product->prodID]) }}" id="productsperpage" enctype="multipart/form-data">
    @csrf
    @method('PUT')

        <div class="form-group">
            <label for="prodImg">Product Image:</label>
            <img src="data:image/jpeg;base64,{{ urlencode(base64_encode($product->prodImg)) }}" />
        </div>

        <div class="form-group">
            <label for="prodID">Product ID:</label>
            <input type="text" id="prodID" name="prodID" value="{{$product->prodID}}" readonly ondblclick="enableInput(this);">
        </div>

        <div class="form-group">
            <label for="prodName">Product Name:</label>
            <input type="text" id="prodName" name="prodName" required value="{{$product->prodName}}" readonly ondblclick="enableInput(this);">
        </div>

        <div class="form-group">
            <label for="prodDesc">Product Description:</label>
            <textarea id="prodDesc" name="prodDesc" rows="4" maxlength="255" oninput="checkLength(this);" required readonly ondblclick="enableInput(this);">{{$product->prodDesc}}</textarea>
            <span id="prodDescCount" class="char-count">0/255</span>
        </div>

        <div class="form-group">
            <label for="prodPrice">Product Price:</label>
            <input type="number" id="prodPrice" name="prodPrice" value="{{$product->prodPrice}}" step="0.01" min="0" required readonly ondblclick="enableInput(this);">
        </div>

        <div class="form-group">
            <label for="prodImg">Product Image:</label>
            <input type="file" id="prodImg" name="prodImg" accept="image/jpeg,image/png,image/jpg">
        </div>

        <div class="form-group">
            <input type="submit" value="Update Product" name="updateProduct">
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

    // Function to enable input for editing on double click
    function enableInput(input) {
        input.removeAttribute('readonly');
    }
</script>

</body>
</html>
