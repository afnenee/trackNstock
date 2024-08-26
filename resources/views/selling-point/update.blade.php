<form action="{{ route('Employers.update', $employer->id) }}" method="POST">
    @csrf
    @method('PUT') 
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $employer->name }}" required>
    </div>
    <div class="mb-3">
        <label for="barcode" class="form-label">Barcode</label>
        <input type="text" class="form-control" id="barcode" name="barcode" value="{{ $employer->barcode }}" required>
    </div>
    <!-- Add other form fields as needed -->
    <button type="submit" class="btn btn-primary">Update employer info</button>
</form>
