<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
use App\Models\Category;
use App\Models\sellingPoint;

class EmployersController extends Controller
{
  public function index(Request $request)
  {
      $query = Employer::query();

      if ($request->has('search')) {
          $search = $request->input('search');
          $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('email', 'LIKE', "%{$search}%")
                ->orWhere('phone_number', 'LIKE', "%{$search}%")
                ->orWhere('company', 'LIKE', "%{$search}%")
                ->orWhere('address', 'LIKE', "%{$search}%")
                ->orWhere('position', 'LIKE', "%{$search}%");
      }

      $employers = $query->get();

      if ($request->ajax()) {
          return response()->json([
              'html' => view('employers.table', compact('employers'))->render(),
          ]);
      }

      $sellingPoints = sellingPoint::all();
      return view('employers.index', compact('employers', 'sellingPoints'));
  }


  public function add(Request $request)
  {
    $employers = Employer::all();
    $sellingPoints = sellingPoint::all();
    $categorys = category::all();
    foreach ($employers as $employer) {
      $employers->address = $employer->address;
    }

    return view('employers.add', compact('sellingPoints', 'employers', 'categorys'));
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255|unique:employer',
      'email' => 'required|string|email|max:255|unique:employer',
      'company' => 'required|string|max:15',
      'position' => 'required|string|max:255',
      'hired_at' => 'required|date',
      'address' => 'required|string|max:255',
      'phone_number' => 'required|string|max:15',
    ]);

    // \Log::info('Validated data:', $validated);

    try {
      Employer::create($validated);
    } catch (\Exception $e) {
      \Log::error('Error creating Employer: ' . $e->getMessage());
      return redirect()->route('Employers.index')->with('error', 'Failed to add Employer.');
    }


    return redirect()->route('Employers.index')->with('success', 'Employer added successfully');
  }
  public function edit($id)
  {
    $sellingPoints = sellingPoint::all();
    $employers = Employer::find($id);
    if (!$employers) {
      return redirect()->route('employers.index')->with('error', 'employer not found.');
    }

    return view('employers.edit', compact('employers', 'sellingPoints'));
  }
  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|string|email|max:255|unique:employer',
      'company' => 'required|string|max:15',
      'position' => 'required|string|max:255',
      'hired_at' => 'required|date',
      'address' => 'required|string|max:255',
      'phone_number' => 'required|string|max:15',
    ]);

    $employers = employer::findOrFail($id);
    $employers->update($validatedData);
    return redirect()->route('Employers.index')->with('success', 'employer updated successfully.');
  }


  public function destroy($id)
  {
    $employers = employer::findOrFail($id);
    $employers->delete();
    return redirect()->route('Employers.index')->with('success', 'employer deleted successfully.');
  }

}
