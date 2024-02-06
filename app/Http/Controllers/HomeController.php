<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Str;

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

            $orderId = strtoupper(Str::random(10));

            $order=new order;

                $order->name=$data->name;
                $order->email=$data->email;
                $order->phone=$data->phone;
                $order->address=$data->address;
                $order->user_id=$data->user_id;


                $order->order_id = $orderId;
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

    // start of order tracking (not specific)

    public function show_orders(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Order-Tracking.ShowOrders', compact('order'));


            }
            else{
                return redirect('login');
            }


    }



    public function show_pending(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Order-Tracking.pending', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_Dpayment(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Order-Tracking.Dpayment', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_on_process(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Order-Tracking.OnProcess', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_Fpayment(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Order-Tracking.Fpayment', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_shipping(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Order-Tracking.Shipping', compact('order'));


            }
            else{
                return redirect('login');
            }


    }
    public function show_order_received(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Order-Tracking.OrderReceived', compact('order'));


            }
            else{
                return redirect('login');
            }


    }

    public function show_order_completed(){
        if(Auth::id()){
            $id=Auth::user()->id;

            $order=order::where('user_id', '=', $id)->get();

            return view('YearnArt.Order-Tracking.OrderCompleted', compact('order'));


            }
            else{
                return redirect('login');
            }


    }
// end of order tracking (not specific)
//show specific na order (track order clinick ni customer)

    public function track_Sorder($id)
    {
        if(Auth::id()){
            $order = order::find($id);

        if (!$order) {
            // Handle the case where the order is not found
            return redirect()->route('track_orders')->with('error', 'Order not found');
        }

        // Get the order status
        $orderStatus = $order->order_status;

        // Check the order status and redirect accordingly
        switch ($orderStatus) {
            case 'Order Placed':
                return view('YearnArt.Specific-Order-Tracking.SPending', compact('order'));
            case 'Downpayment':
                return view('YearnArt.Specific-Order-Tracking.SDpayment', compact('order'));
            case 'On Process':
                return view('YearnArt.Specific-Order-Tracking.SOnProcess', compact('order'));
            case 'To Pay':
                return view('YearnArt.Specific-Order-Tracking.SFpayment', compact('order'));
            case 'Shipping':
                return view('YearnArt.Specific-Order-Tracking.Sshipping', compact('order'));
            case 'Order Received':
                return view('YearnArt.Specific-Order-Tracking.SOrderReceived', compact('order'));
            case 'Order Completed':
                return view('YearnArt.Specific-Order-Tracking.SOrderCompleted', compact('order'));
            // Add more cases for other order statuses

            default:
                // Handle the case where the order status is not recognized
                return redirect()->route('track_orders')->with('error', 'Unknown order status');

        }
        }
                    else{
        return redirect('login');
        }

    }
    // //pag hindi naka login yung user
    // $order=order::find($id);
    // return view('YearnArt.track_Sorder', compact('order'));




    public function receive_order($id){

        $order=order::find($id);

        $order->order_status="Order Received";
        $order->order_received_at=$order->updated_at;

        $order->save();

        return view('YearnArt.Specific-Order-Tracking.SOrderReceived', compact('order'));


    }





//
//
//
//
//
//
//




}
