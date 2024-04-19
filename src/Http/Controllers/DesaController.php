<?php

namespace Laravolt\Indonesia\Http\Controllers;

use Illuminate\Http\Request;
use src\Models\Village;

class VillageController extends Controller
{
    public function index()
    {
        return Village::all();
    }

    public function show($id)
    {
        return Village::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:villages,code',
            'district_code' => 'required|exists:districts,code',
            'name' => 'required|string|max:255',
            'meta' => 'nullable',
        ]);

        return Village::create($request->all());
    }

    public function update(Request $request, $id)
    {
        $village = Village::findOrFail($id);

        $request->validate([
            'code' => 'required|unique:villages,code,'.$village->id,
            'district_code' => 'required|exists:districts,code',
            'name' => 'required|string|max:255',
            'meta' => 'nullable',
        ]);

        $village->update($request->all());

        return $village;
    }

    public function destroy($id)
    {
        $village = Village::findOrFail($id);
        $village->delete();

        return response()->json(['message' => 'Village deleted successfully']);
    }
}
