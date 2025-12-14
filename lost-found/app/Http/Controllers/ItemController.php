<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::latest()->get();
        return view('items.index', compact('items'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:lost,found',
        ]);

        $request->user()->items()->create($request->all());

        return redirect('/')->with('success', 'Item added');
    }

    public function edit(Item $item)
    {
        abort_if($item->user_id !== auth()->user()->id, 403);

        return view('items.edit', compact('item'));
    }

    public function update(Request $request, Item $item)
    {
        abort_if($item->user_id !== auth()->user()->id, 403);

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'status' => 'required|in:lost,found',
        ]);

        $item->update($request->all());

        return redirect('/')->with('success', 'Item updated');
    }

    public function destroy(Item $item)
    {
        abort_if($item->user_id !== auth()->user()->id, 403);

        $item->delete();

        return redirect('/')->with('success', 'Item deleted');
    }
}
