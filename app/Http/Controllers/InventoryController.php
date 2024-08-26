<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\sellingPoint;
use App\Models\Employer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventoryController extends Controller
{
  public function index(Request $request)
{
    $query = Inventory::query();

    if ($request->has('search')) {
        $search = $request->input('search');
        $query->where('name', 'LIKE', "%{$search}%")
              ->orWhere('agent', 'LIKE', "%{$search}%");
    }

    $inventorys = $query->get();
    $products = Product::all();
    $sellingPoints = sellingPoint::all();
    $Employers = Employer::all();

    if ($request->ajax()) {
        return response()->json([
            'html' => view('inventory.table', compact('inventorys'))->render(),
        ]);
    }

    return view('inventory.index', compact('inventorys', 'products', 'Employers'));
}


  public function addInventory()
  {
    $products = Product::all();
    $Employers = Employer::all();
    return view('inventory.create', compact('products', 'Employers'));
  }
  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'agent' => 'required|string|max:255',
      'product_id' => 'required|exists:products,id',
      'date' => 'required|date',
    ]);
    Inventory::create($validated);
    return redirect()->route('inventory.index')->with('success', 'Inventory created successfully!');
  }
  public function destroy($id)
  {
    $inventorys = inventory::findOrFail($id);
    $inventorys->delete();
    return redirect()->route('inventory.index')->with('success', 'inventory deleted successfully.');
  }
  public function showReportForm()
  {
    $employers = Employer::all();
    return view('inventory.report', compact('employers'));
  }

  public function generateReport(Request $request)
  {
    $request->validate([
      'start_date' => 'required|date',
      'end_date' => 'required|date|after_or_equal:start_date',
      'agent' => 'required|string',
    ]);

    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');
    $agentName = $request->input('agent');
    $query = Product::whereBetween('created_at', [$startDate, $endDate]);

    if ($agentName !== 'all') {
      $query->where('agent', $agentName);
    }

    $products = $query->get();

    return view('inventory.report_results', compact('products', 'startDate', 'endDate', 'agentName'));
  }
  public function printReport(Request $request)
  {
    $startDate = $request->query('start_date');
    $endDate = $request->query('end_date');

    $products = Product::whereBetween('created_at', [$startDate, $endDate])->get();

    return view('inventory.print-report', compact('products', 'startDate', 'endDate'));
  }
  public function newTab($id)
  {
    $inventory = Inventory::find($id);
    return view('inventory.newtab', compact('inventory'));
  }

  public function createNewTable($id)
  {
    $inventory = Inventory::find($id);
    $tableName = 'inventory_' . strtolower($inventory->name);
    $creationStartTime = Carbon::now();

    if (!Schema::hasTable($tableName)) {
      Schema::create($tableName, function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('etats');
        $table->string('placement');
        $table->timestamps();
      });
    }

    $tableData = DB::table($tableName)->get();

    return view('inventory.newtab', compact('inventory', 'tableName', 'tableData', 'creationStartTime'));
  }

}
