<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{

    public function admin_dashboard(){
        return view ('admin.home');
    }
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
    public function show_product(){
        $product=product::all();
      return view ('admin.show_product', compact('product'));
    }

    public function delete_product($id){
        $product=product::find($id);
        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id){
        $product=product::find($id);

        $category=category::all();
      return view ('admin.update_product', compact('product','category'));
    }

    public function  update_product_confirm(Request $request, $id){
        $product=product::find($id);


        $product->product_name=$request->product_name;
        $product->category=$request->category;
        $product->product_description=$request->product_description;
        $product->price=$request->price;
        $product->processing_time=$request->processing_time;

        $image = $request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }
        $product->save();
        return redirect()->back()->with('message', 'Product Updated Successfully');
    }

    public function order(){
        $order=order::all();



        return view ('admin.order', compact('order'));
    }

    public function pending(){
        $order=order::all();

        return view ('admin.pending', compact('order'));
    }
    public function dpayment(){
        $order=order::all();

        return view ('admin.dpayment', compact('order'));
    }
    public function onprocess(){
        $order=order::all();

        return view ('admin.onprocess', compact('order'));
    }


    public function to_dpay($id){

        $order=order::find($id);

        $order->order_status="Downpayment";

        $order->save();

        return redirect()->back();
    }
    public function to_onprocess($id){

        $order=order::find($id);

        $order->order_status="On Process";

        $order->save();

        return redirect()->back();
    }
    public function to_fpay($id){

        $order=order::find($id);

        $order->order_status="To Pay";

        $order->save();

        return redirect()->back();
    }
    public function to_ship($id){

        $order=order::find($id);

        $order->order_status="Shipping";

        $order->save();

        return redirect()->back();
    }





}
