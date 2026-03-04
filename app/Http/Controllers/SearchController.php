<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTest;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        if ($query) {
            $results = ProductTest::where('zat_aktif', 'like', '%' . $query . '%')->get();
            return view('search', compact('results'));
        } else {
            return view('search', ['results' => collect()]);
        }
    }
}
