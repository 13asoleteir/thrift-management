<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with('category')->get();

        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('items.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'purchase_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric|min:0',
            'expected_selling_price' => 'nullable|numeric|min:0',
            'shipping_fee' => 'nullable|numeric|min:0',
            'other_expenses' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        Item::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'purchase_date' => $request->purchase_date,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'expected_selling_price' => $request->expected_selling_price,
            'shipping_fee' => $request->shipping_fee ?? 0,
            'other_expenses' => $request->other_expenses ?? 0,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        return view('items.edit', compact('item', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'purchase_date' => 'required|date',
            'quantity' => 'required|integer|min:1',
            'purchase_price' => 'required|numeric|min:0',
            'expected_selling_price' => 'nullable|numeric|min:0',
            'shipping_fee' => 'nullable|numeric|min:0',
            'other_expenses' => 'nullable|numeric|min:0',
            'notes' => 'nullable|string',
        ]);

        $item->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'purchase_date' => $request->purchase_date,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'expected_selling_price' => $request->expected_selling_price,
            'shipping_fee' => $request->shipping_fee ?? 0,
            'other_expenses' => $request->other_expenses ?? 0,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('items.index')
            ->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->delete();

        return redirect()
            ->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}
