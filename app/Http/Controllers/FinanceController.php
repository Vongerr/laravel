<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class FinanceController extends Controller
{
    public function __construct()
    {
    }

    public function index(): View
    {
        $models = Finance::latest()->paginate(10);

        return view('finance.index', compact('models'));
    }

    public function create(): View
    {
        $banks = [
            'vtb' => 'ВТБ',
            'tinkoff' => 'Тинькофф',
            'alfa' => 'Альфа-Банк',
        ];

        $categories = [
            'vtb' => 'ВТБ',
            'tinkoff' => 'Тинькофф',
            'alfa' => 'Альфа-Банк',
        ];

        return view('finance.create', compact('banks', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $model = Finance::create($request);

        $model->save();

        return redirect()->route('finances.index')->with('success', 'Пункт создан.');
    }

    public function show(Finance $model): View
    {
        return view('finance.show', compact('model'));
    }

    public function edit(Finance $model): View
    {
        return view('finance.edit', compact('model'));
    }

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

    public function destroy(Finance $model): RedirectResponse
    {
        $model->delete();

        return redirect()->route('finance.index')
            ->with('success', 'Product deleted successfully.');
    }
}
