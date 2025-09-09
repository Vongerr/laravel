<?php

namespace App\Http\Controllers;

use App\Models\Finance;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FinanceController extends Controller
{
    public function index(): Collection
    {
        return Finance::all();
    }

    public function store(Request $request)
    {
        return Finance::create($request->all());
    }

    public function show(Finance $finance): Finance
    {
        return $finance;
    }

    public function update(Request $request, Finance $finance): Finance
    {
        $finance->update($request->all());
        return $finance;
    }

    public function destroy(Finance $finance): Response
    {
        $finance->delete();
        return response()->noContent();
    }
}
