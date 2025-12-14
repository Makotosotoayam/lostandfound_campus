@extends('layouts.app')

@section('content')
<h3>Edit Item</h3>

<form method="POST" action="{{ route('items.update', $item) }}" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Item Name</label>
        <input type="text" name="title" class="form-control" value="{{ $item->title }}" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" required>{{ $item->description }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select">
            <option value="lost" @selected($item->status === 'lost')>Lost</option>
            <option value="found" @selected($item->status === 'found')>Found</option>
        </select>
    </div>

    <button class="btn btn-primary">Update Item</button>
</form>
@endsection
