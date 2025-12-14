@extends('layouts.app')

@section('content')
<h3>Add Item</h3>

<form method="POST" action="{{ route('items.store') }}" class="card p-4 shadow-sm">
    @csrf

    <div class="mb-3">
        <label class="form-label">Item Name</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="lost">Lost</option>
            <option value="found">Found</option>
        </select>
    </div>

    <button class="btn btn-success">Save Item</button>
</form>
@endsection
