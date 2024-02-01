<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    public function home()
    {
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            return view('admin.home');
        }
        else
        {
            return view('home.userpage');
        }
    }

    public function index()
    {
        return view ('YearnArt.Home');
    }
    public function About(){
        return view ('YearnArt.About');

        $user=Auth::user();
        return view ('YearnArt.About');

    }

    public function Products(){
    //pag hindi naka login yung user
        $products=Product::all();
        return view('YearnArt.Products',compact('products'));


    //PAg naka login yung users
        $usertype=Auth::user()->usertype;
        $products=Product::all();
        return view('YearnArt.Products',compact('products'));


    }

    public function product_details($id)
    {
    //pag hindi naka login yung user
    $products=product::find($id);
    return view('YearnArt.Product_Details', compact('products'));


    // PAg naka login yung users
        $usertype=Auth::user()->usertype;
        $products=Product::all();
        return view('YearnArt.Products',compact('products'));
    }

    public function add_cart(Request $request, $id) {

        if(Auth::id()){
            $user=Auth::user();

            $products=product::find($id);

            $cart=new cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;
            $cart->user_id=$user->id;
            $cart->product_name=$products->product_name;
            $cart->price=$products->price;
            $cart->processing_time=$products->processing_time;
            $cart->image=$products->image;
            $cart->product_id=$products->id;
            $cart->quantity=$request->quantity;
            $cart->primaryclr=$request->colorOption;
            $cart->secondaryclr=$request->secondaryColor;
            $cart->size=$request->sizeOption;

            $cart->save();

            return redirect()->back()->with('message', 'Added to Cart');
        }
        else{
            return redirect('login');
        }
    }


    public function show_cart(){

        if(Auth::id()){
        $id=Auth::user()->id;

        $cart=cart::where('user_id', '=', $id)->get();

        return view('YearnArt.MyOrders', compact('cart'));


        }
        else{
            return redirect('login');
        }


    }
    public function remove_cart($id){

        $cart=cart::find($id);

        $cart->delete();

        return redirect()->back()->with('message', 'Successfully Deleted');
    }

    public function cash_order(){

        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id','=', $userid)->get();


        foreach($data as $data){

            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;
            $order->user_id=$data->user_id;

            $order->product_name=$data->product_name;
            $order->quantity=$data->quantity;
            $order->price=$data->quantity * $data->price;
            $order->image=$data->image;
            $order->processing_time=$data->processing_time;
            $order->primaryclr=$data->primaryclr;
            $order->secondaryclr=$data->secondaryclr;
            $order->size=$data->size;
            $order->product_id=$data->product_id;

            $order->payment_status='Cash';
            $order->order_status='Order Placed';

            $order->save();

            $cart_id=$data->id;
            $cart=cart::find($cart_id);
            $cart->delete();


        }

        return redirect()->back()->with('message', 'Successfully Placed Order');

    }
    public function show_orders(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.ShowOrders', compact('order'));


            }
            else{
                return redirect('login');
            }


    }



    public function show_pending(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.pending', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_Dpayment(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Dpayment', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_on_process(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.OnProcess', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_Fpayment(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Fpayment', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_shipping(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Shipping', compact('order'));


            }
            else{
                return redirect('login');
            }


    }
    public function show_order_received(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.OrderReceived', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_order_completed(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.OrderCompleted', compact('order'));


            }
            else{
                return redirect('login');
            }


    }


//
//
//
//
//
//
//




}
