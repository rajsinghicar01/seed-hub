<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Spatie\Permission\Models\Permission;
use DB;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use DataTables;
use Auth;
use Session;

class ProductController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.add-more', compact('products'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $rules = [ "name" => "required", "stocks.*" => "required" ];

        foreach($request->stocks as $key => $value) {
            $rules["stocks.{$key}.quantity"] = 'required';
            $rules["stocks.{$key}.price"] = 'required';
        }

        $request->validate($rules);

        $product = Product::create(["name" => $request->name]);
        foreach($request->stocks as $key => $value) {
            $product->stocks()->create($value);
        }

        return redirect()->back()->with(['success' => 'Product created successfully.']);
    }
}