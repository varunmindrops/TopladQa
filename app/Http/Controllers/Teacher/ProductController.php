<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        $user = User::with(['product', 'product.subject', 'product.productPrice'])->find($id);
        return view('admin.super-admin.edit-product', compact('user'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('teacher/product')->with('success', 'Product Deleted Successfully');
    }
}
