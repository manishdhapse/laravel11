<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inline CRUD</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Inline CRUD in Laravel</h2>

    <!-- Add New Item -->
    <div class="mb-3">
        <input type="text" id="newItem" class="form-control" placeholder="Add new item">
        <button class="btn btn-primary mt-2" id="addItem">Add Item</button>
    </div>

    <!-- Items Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Item</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="itemsTable">
            @foreach($items as $item)
                <tr data-id="{{ $item->id }}">
                    <td>
                        <input type="text" class="form-control itemName" value="{{ $item->name }}">
                    </td>
                    <td>
                        <button class="btn btn-success updateItem">Update</button>
                        <button class="btn btn-danger deleteItem">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // CSRF Token for AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // Add Item
    $('#addItem').click(function () {
        let name = $('#newItem').val();
        $.post("{{ route('items.store') }}", { name: name }, function (data) {
            let row = `<tr data-id="${data.id}">
                            <td><input type="text" class="form-control itemName" value="${data.name}"></td>
                            <td>
                                <button class="btn btn-success updateItem">Update</button>
                                <button class="btn btn-danger deleteItem">Delete</button>
                            </td>
                       </tr>`;
            $('#itemsTable').append(row);
            $('#newItem').val('');
        });
    });

    // Update Item
    $(document).on('click', '.updateItem', function () {
        let row = $(this).closest('tr');
        let id = row.data('id');
        let name = row.find('.itemName').val();
        $.ajax({
            url: `/items/${id}`,
            type: 'PUT',
            data: { name: name },
            success: function (data) {
                alert('Item updated successfully');
            }
        });
    });

    // Delete Item
    $(document).on('click', '.deleteItem', function () {
        let row = $(this).closest('tr');
        let id = row.data('id');
        $.ajax({
            url: `/items/${id}`,
            type: 'DELETE',
            success: function () {
                row.remove();
                alert('Item deleted successfully');
            }
        });
    });
</script>
</body>
</html>
