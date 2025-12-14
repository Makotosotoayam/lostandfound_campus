@extends('layouts.app')

@section('content')
<h3 class="mb-4">Recent Lost & Found Items</h3>

@if($items->count() === 0)
    <div class="alert alert-info">
        No items reported yet.
    </div>
@endif

<div class="row">
@foreach($items as $item)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm h-100">
            <div class="card-body">
                <h5 class="card-title">{{ $item->title }}</h5>

                <span class="badge bg-{{ $item->type === 'lost' ? 'danger' : 'success' }}">
                    {{ ucfirst($item->type) }}
                </span>

                <p class="mt-2 text-muted">
                    {{ Str::limit($item->description, 80) }}
                </p>

                <small class="text-muted">
                    Posted {{ $item->created_at->diffForHumans() }}
                </small>
            </div>

            @auth
                @if(auth()->id() === $item->user_id)
                    <div class="card-footer bg-white">
                        <a href="/items/{{ $item->id }}/edit" class="btn btn-sm btn-warning">Edit</a>

                        <form action="/items/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                              onclick="return confirm('Delete this item?')">
                              Delete
                            </button>
                        </form>
                    </div>
                @endif
            @endauth
        </div>
    </div>
@endforeach
</div>
@endsection
