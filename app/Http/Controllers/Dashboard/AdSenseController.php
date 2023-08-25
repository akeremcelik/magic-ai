<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdSense\StoreAdSenseRequest;
use App\Http\Requests\AdSense\UpdateAdSenseRequest;
use App\Models\AdSense;
use Illuminate\Http\Request;

class AdSenseController extends Controller
{
    public function index()
    {
        $items = AdSense::all();

        return view('panel.adsense.index', compact('items'));
    }

    public function create()
    {
        return view('panel.adsense.create');
    }

    public function edit(int $id)
    {
        $item = AdSense::query()->findOrFail($id);

        return view('panel.adsense.edit', compact('item'));
    }

    public function store(StoreAdSenseRequest $request)
    {
        AdSense::query()->create($request->validated());

        return response()->redirectToRoute('dashboard.user.adsense.index');
    }

    public function update(UpdateAdSenseRequest $request, int $id)
    {
        $adSense = AdSense::query()->findOrFail($id);
        $adSense->update($request->validated());

        return response()->redirectToRoute('dashboard.user.adsense.index');
    }

    public function delete(int $id)
    {
        $adSense = AdSense::query()->findOrFail($id);
        $adSense->delete();

        return response()->redirectToRoute('dashboard.user.adsense.index');
    }
}
