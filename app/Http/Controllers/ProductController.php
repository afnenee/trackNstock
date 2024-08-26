<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\sellingPoint;
use App\Models\Category;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employer;

class ProductController extends Controller
{

  public function index(Request $request)
  {
    $query = Product::query();

    if ($request->has('search')) {
      $search = $request->input('search');
      $query->where('name', 'LIKE', "%{$search}%")
        ->orWhere('barcode', 'LIKE', "%{$search}%")
        ->orWhere('category', 'LIKE', "%{$search}%")
        ->orWhere('etats', 'LIKE', "%{$search}%")
        ->orWhere('placement', 'LIKE', "%{$search}%")
        ->orWhere('agent', 'LIKE', "%{$search}%");
    }

    $products = $query->get();

    if ($request->ajax()) {
      return response()->json([
        'html' => view('content.tables.products-table', compact('products'))->render(),
      ]);
    }

    return view('content.tables.tables-basic', compact('products'));
  }

  public function add(Request $request)
  {
    $employers = Employer::all();
    $sellingPoints = sellingPoint::all();
    $Products = Product::all();
    $categorys = category::all();
    return view('products.add', compact('Products', 'sellingPoints', 'employers', 'categorys'));
  }

  // public function store(Request $request)
  // {
  //   $validated = $request->validate([
  //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  //     'name' => 'required|string|max:255',
  //     'barcode' => 'required|string|max:255|unique:products,barcode',
  //     'etats' => 'required|string|max:255',
  //     'placement' => 'required|string|max:255',
  //     'category' => 'nullable|string|max:255',
  //     'agent' => 'nullable|string|max:255',
  //   ]);

  //   if ($request->hasFile('image')) {
  //     $file = $request->file('image');
  //     $fileName = time() . '_' . $file->getClientOriginalName();
  //     $imagePath = $file->storeAs('images', $fileName, 'public');
  //     $validated['image'] = $imagePath;
  //   }
  //   try {
  //     Product::create($validated);
  //   } catch (\Exception $e) {
  //     \Log::error('Error creating product: ' . $e->getMessage());
  //     return redirect()->route('product.index')->with('error', 'Failed to add product.');
  //   }

  //   return redirect()->route('product.index')->with('success', 'Product added successfully');
  // }
  public function store(Request $request)
  {
    $validated = $request->validate([
      'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      'name' => 'required|string|max:255',
      'barcode' => 'required|string|max:255|unique:products,barcode',
      'etats' => 'required|string|max:255',
      'placement' => 'required|string|max:255',
      'category' => 'nullable|string|max:255',
      'agent' => 'nullable|string|max:255',
    ]);

    if ($request->hasFile('image')) {
      $file = $request->file('image');
      $fileName = time() . '_' . $file->getClientOriginalName();
      $imagePath = $file->storeAs('images', $fileName, 'public');
      $validated['image'] = $imagePath;
    }

    try {
      Product::create($validated);
    } catch (\Exception $e) {
      \Log::error('Error creating product: ' . $e->getMessage());
      return redirect()->route('product.index')->with('error', 'Failed to add product.');
    }

    return redirect()->route('product.index')->with('success', 'Product added successfully');
  }



  public function edit($id)
  {
    $sellingPoints = sellingPoint::all();
    $product = Product::find($id);
    if (!$product) {
      return redirect()->route('product.index')->with('error', 'Product not found.');
    }

    return view('products.edit', compact('product', 'sellingPoints'));
  }

  public function update(Request $request, $id)
  {
    $validatedData = $request->validate([
      'name' => 'required|string|max:255',
      'barcode' => 'required|string|max:255',
      'category' => 'nullable|string|max:255',
      'etats' => 'required|string|max:255',
      'placement' => 'string|max:255',
    ]);

    $product = Product::findOrFail($id);
    $oldData = $product->getAttributes();
    $product->update($validatedData);

    $newData = $product->fresh()->getAttributes();
    $changes = array_diff_assoc($newData, $oldData);

    $changes = array_filter($changes, function ($value, $key) use ($oldData) {
      return isset($oldData[$key]) && $value !== $oldData[$key] && $key !== 'updated_at';
    }, ARRAY_FILTER_USE_BOTH);

    $formattedChanges = [];
    foreach ($changes as $key => $value) {
      $oldValue = $oldData[$key];
      $newValue = $value;
      $formattedChanges[] = ucfirst($key) . ": '$oldValue' changed to '$newValue'";
    }

    if (!empty($formattedChanges)) {
      ProductHistory::create([
        'product_id' => $product->id,
        'product_name' => $product->name,
        'changes' => implode(', ', $formattedChanges),
        'etats' => $product->etats,
        'placement' => $product->placement,
        'updated_at' => $product->updated_at,
      ]);
    }


    return redirect()->route('product.index')->with('success', 'Product updated successfully.');
  }


  public function destroy($id)
  {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
  }
  public function history($id)
  {
    $product = Product::findOrFail($id);
    $histories = ProductHistory::where('product_id', $id)->get();

    return view('products.history', compact('product', 'histories'));
  }
  public function imprime(Request $request)
  {
    $ids = $request->query('ids');
    $productIds = explode(',', $ids);

    $products = Product::whereIn('id', $productIds)->get();

    if ($products->isEmpty()) {
      return redirect()->route('product.index')->with('error', 'No products selected for printing.');
    }

    $pdf = PDF::loadView('products.imprime', compact('products'));
    return $pdf->download('products.pdf');
  }

  public function imprime_histo($id)
  {
    $product = Product::findOrFail($id);
    $histories = ProductHistory::where('product_id', $id)->get();
    $pdf = PDF::loadView('products.imprime_his', compact('product', 'histories'));
    return $pdf->download('product_history_' . $product->name . '.pdf');
  }
  public function inventory()
  {
    return redirect()->route('product.inventory');

  }



}
