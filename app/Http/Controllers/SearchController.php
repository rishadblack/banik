<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product\Product;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type == 'products') {
            return $this->searchProducts();
        }

        return collect([]);
    }

    public function searchProducts()
    {
        $query = Product::query();

        // if (request()->has('client_type') && request()->filled('client_type')) {
        //     $query->whereType(request()->client_type);
        // }

        // if (request()->has('client_type_only') && request()->filled('client_type_only')) {
        //     $query->whereIn('type', explode(',', request()->client_type_only));
        // }

        $query->select('id', 'code', 'name');
        $query->limit(10);

        if (request()->has('search') && request()->filled('search')) {
            $query->search(request()->search);
        }

        $query = $query->get()->map(function ($item, $key) {
            $item['id'] = $item->id;
            $item['name'] = $item->name;
            $item['code'] = $item->code;
            $item['search'] = request()->search;
            return $item;
        });

        return response()->json($query);
    }
}
