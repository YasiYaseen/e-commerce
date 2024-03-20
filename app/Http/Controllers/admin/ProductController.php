<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductSaveRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $extension = $request->image->extension();
            $fileName = Str::random(6)."_".time()."_product.".$extension;
            $request->image->storeAs('images', $fileName);
                $input['image']=$fileName;

        }
        // return $input;
       Product::create($input);
        return redirect()->route('admin.product.list')->with('message','New Product Added Succesfully');
    }
    public function delete($id){
        $product = Product::find(decrypt($id));
        if($product->image){
            Storage::delete("images/".$product->image);
        }
        $product->delete();
        return redirect()->route('admin.product.list')->with('message','Product Deleted Successfully');
    }
    public function editProduct($id){
        $product=Product::find(decrypt($id));
        $categories = Category::all();

        return view('admin.products.edit',compact('product','categories'));
    }
    public function saveEdit(ProductSaveRequest $request)
    {
        $input = $request->validated();
        $product = Product::find(decrypt($request->id));
        if($request->hasFile('image')){
            $extension = $request->image->extension();
            $fileName = Str::random(6)."_".time()."_product.".$extension;
            $request->image->storeAs('images', $fileName);
            $input['image']=$fileName;
        }
        $product->update($input);

        return redirect()->route('admin.product.list')->with('message',' Product Updated Succesfully');
    }
}
