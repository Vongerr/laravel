<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $models = Finance::latest()->paginate(10);
        return view('finance.index', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('finance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0'
        ]);

        Finance::create($request->all());

        return redirect()->route('finances.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Finance $model): View
    {
        return view('finance.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Finance $model): View
    {
        return view('finance.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Finance $model): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0'
        ]);

        $model->update($request->all());

        return redirect()->route('finance.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Finance $model): RedirectResponse
    {
        $model->delete();

        return redirect()->route('finance.index')
            ->with('success', 'Product deleted successfully.');
    }
}
