<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sellingPoint;

class sellingPointController extends Controller
{
  public function index()
  {
    $sellingPoints = sellingPoint::all();
    return view('selling-point.index', compact('sellingPoints'));
  }
  public function add(Request $request)
  {
    $sellingPoints = sellingPoint::all();
    return view('selling-point.add', compact('sellingPoints'));
  }
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string|max:255',
      'location' => 'required|string|max:255',
    ]);

    \Log::info('Validated data:', $validated);

    sellingPoint::create($validated);

    return redirect()->route('selling-point.index')->with('success', 'sellingPoint added successfully');
  }
  public function edit($id)
  {
    $sellingPoints = sellingPoint::findOrFail($id);
    return view('selling-point.edit', compact('sellingPoints'));
  }

  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'required|string|max:255',
      'location' => 'required|string|max:255',
    ]);

    $sellingPoints = sellingPoint::findOrFail($id);
    $sellingPoints->update($validatedData);
    return redirect()->route('selling-point.index')->with('success', 'sellingPoint updated successfully.');
  }


  public function destroy($id)
  {
    $sellingPoints = sellingPoint::findOrFail($id);
    $sellingPoints->delete();
    return redirect()->route('selling-point.index')->with('success', 'sellingPoint deleted successfully.');
  }

}
