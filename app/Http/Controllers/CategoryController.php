<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function index(Request $request)
  {
      $query = Category::query();

      if ($request->has('search')) {
          $search = $request->input('search');
          $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('description', 'LIKE', "%{$search}%");
      }

      $categorys = $query->get();
      return view('category.index', compact('categorys'));
  }


  public function create()
  {
    return view('category.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'description' => 'nullable|string',
    ]);

    Category::create($request->all());

    return redirect()->route('category.index')->with('success', 'Category created successfully.');
  }

  public function destroy(Category $category)
  {
    $category->delete();

    return redirect()->route('category.index')->with('success', 'Category deleted successfully.');
  }
}
