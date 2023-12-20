<?php

namespace App\Http\Controllers;
use App\Exports\ExampleTableExport;
use App\Exports\InventoryExport;
use App\Models\Inventory;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function export()
    {
        return Excel::download(new InventoryExport, 'inventories_export.xlsx');
    }
}
