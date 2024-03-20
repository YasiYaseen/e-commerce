<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSaveRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productList(){
        // return Product::paginate(10);
        $products=Product::orderBy('created_at','DESC')->paginate(10);
        return view('admin.products.list',compact('products'));
    }
    public function createProduct(){
        $categories = Category::all();
        return view('admin.products.create',compact('categories'));
    }
    public function save(ProductSaveRequest $request)
    {
        $input = $request->validated();
        if($request->hasFile('image')){
            $extension = $request->image->extension;
        }
        Product::create($input);
        return redirect()->route('admin.product.list')->with('message','New Product Added Succesfully');
    }
    public function delete($id){
        $product = Product::find(decrypt($id));
        $product->delete();
        return redirect()->route('admin.product.list')->with('message','Product Deleted Successfully');
    }
}
