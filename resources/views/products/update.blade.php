<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- This is crucial for sending a PUT request -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
    </div>
    <div class="mb-3">
        <label for="barcode" class="form-label">Barcode</label>
        <input type="text" class="form-control" id="barcode" name="barcode" value="{{ $product->barcode }}" required>
    </div>
    <!-- Add other form fields as needed -->
    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

