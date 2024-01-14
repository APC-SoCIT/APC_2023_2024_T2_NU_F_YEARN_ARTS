<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function view_category()
    {
        $data=category::all();
        
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_category($id){
        $data=category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }

    public function view_product(){
        $category=category::all();
        return view('admin.product', compact('category'));

    }
    public function add_product(Request $request){
       $product = new product;

       $product->product_name=$request->product_name;
       $product->product_description=$request->product_description;
       $product->price=$request->price;
       $product->processing_time=$request->processing_time;
       $product->category=$request->category;

       $image = $request->file('image');
       $imagename=time().'.'.$image->getClientOriginalExtension();

       $request->image->move('product',$imagename);
       $product->image=$imagename;

       $product->save();

       return redirect()->back()->with('message', 'Product Added Successfully');;
       

    }
    

}
