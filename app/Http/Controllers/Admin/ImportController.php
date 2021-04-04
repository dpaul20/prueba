<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Illuminate\Http\Request;
use App\Imports\ImportProduct;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function index()
    {
        return view('admin.import');
    }
    public function import(Request $request)
    {
        $request->validate([
            'import_file' => 'required'
        ]);
        Excel::import(new ImportProduct, request()->file('import_file'));
        
        return back()->with('success', 'Contacts imported successfully.');
    }
}
