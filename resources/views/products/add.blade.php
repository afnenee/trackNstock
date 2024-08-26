@extends('layouts/contentNavbarLayout')
@section('title', 'Add Product')
@section('content')
<div class="container">
    <h3>Add Product</h3>
    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="barcode">Barcode</label>
            <input type="text" class="form-control" id="barcode" name="barcode">
            @if ($errors->any())
              <div class="alert alert-danger">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category" class="form-control">
                @foreach($categorys as $category)
                    <option value="{{ $category->name }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="etats">Etats</label>
            <select name="etats" class="form-control">
                <option value="broken-down">Broken-down</option>
                <option value="functional">Functional</option>
            </select>
        </div>
        <div class="form-group">
            <label for="agent">Agent</label>
            <select id="agent" name="agent" class="form-control">
              @foreach($employers as $employer)
                <option value="{{ $employer->name }}" data-position="{{ $employer->position }}" data-address="{{ $employer->address }}">
                    {{ $employer->name }}
                </option>
              @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="placement">Placement</label>
            <select id="placement" class="form-control">
                @foreach($sellingPoints as $point)
                    <option value="{{ $point->location }}">{{ $point->location }}</option>
                @endforeach
            </select>
            <input type="hidden" id="hidden-placement" name="placement">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var $placementSelect = $('#placement');
        var $hiddenPlacement = $('#hidden-placement');
        var $agentSelect = $('#agent');
        var defaultPlacement = $placementSelect.find('option:first').val();

        function updatePlacement() {
            var selectedOption = $agentSelect.find('option:selected');
            var position = selectedOption.data('position');
            var address = selectedOption.data('address');

            if (position === 'admin') {
                $placementSelect.prop('disabled', false);
                $hiddenPlacement.val($placementSelect.val());
            } else if (position === 'employer') {
                $placementSelect.prop('disabled', true);
                var selectedPlacement = address ? address : defaultPlacement;
                $placementSelect.val(selectedPlacement);
                $hiddenPlacement.val(selectedPlacement);
            }
        }

        updatePlacement();

        $agentSelect.on('change', function() {
            updatePlacement();
        });

        $placementSelect.on('change', function() {
            $hiddenPlacement.val($placementSelect.val());
        });
    });
</script>

@endsection
