<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Models\User;


use Illuminate\Support\Facades\Notification;

use App\Notifications\YearnArtNotification;


class AdminController extends Controller
{

    public function admin_dashboard(){
        $order=order::orderBy('created_at', 'desc')->get();

        $completedOrders = Order::where('order_status', 'Order Completed')
        ->select('id', 'quantity', 'created_at') // Adjust these fields based on your Order model
        ->orderBy('created_at', 'desc')
        ->get();

    // Calculate total quantity
    $totalQuantity = $completedOrders->sum('quantity');

    return view('admin.home', compact('completedOrders', 'totalQuantity', 'order'));




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
            $category = Category::find($request->category);


        $product = new product;

        $product->product_name=$request->product_name;
        $product->product_description=$request->product_description;
        $product->small_price=$request->small_price;
        $product->medium_price=$request->medium_price;
        $product->large_price=$request->large_price;
        $product->small_size=$request->small_size;
        $product->medium_size=$request->medium_size;
        $product->large_size=$request->large_size;
        $product->processing_time=$request->processing_time;
        $product->category = $category->category_name;
        $product->category_id = $request->category;
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
        $product->product_description=$request->product_description;
        $product->small_price=$request->small_price;
        $product->medium_price=$request->medium_price;
        $product->large_price=$request->large_price;
        $product->small_size=$request->small_size;
        $product->medium_size=$request->medium_size;
        $product->large_size=$request->large_size;
        $product->processing_time=$request->processing_time;
        $product->category=$request->category;

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
        $order = Order::orderBy('created_at', 'desc')->get();




        return view ('admin.order', compact('order'));
    }


    public function pending(){
        $order=order::orderBy('created_at', 'asc')->get();

        return view ('admin.pending', compact('order'));
    }
    public function dpayment(){
        $order = Order::orderBy('created_at', 'desc')->get();


        return view ('admin.dpayment', compact('order'));
    }
    public function onprocess(Request $request){
        $status = $request->input('status'); // Get the selected status from the request

        // Fetch orders based on the selected status
        if ($status && in_array($status, ['On Process', 'To Pay'])) {
            $order= Order::where('order_status', $status)
                        ->orderBy('downpayment_paid_at', 'desc') // Assuming 'downpayment_paid_at' is the column name
                        ->get();
        } else {
            // Fetch all orders if no status is selected or if an invalid status is provided
            $order = Order::orderBy('downpayment_paid_at', 'asc')->get(); // Fetch all orders sorted by 'downpayment_paid_at'
        }

        return view ('admin.onprocess', compact('order', 'status'));
    }


    public function to_dpay($id){

        $order = Order::find($id); // Assuming your model is named Order, not order
        $order->order_status = "Downpayment";
        $order->save();



        $details = [
            'subject' => 'Down Payment Required',
            'greeting' => 'Good day, ' . $order['name'] . '!',
            'firstline' => 'Thank you for choosing Yearn Art! To proceed with your order, we kindly request a 50% downpayment. This downpayment helps secure your booking and allows us to begin processing your order promptly. Once the downpayment is received, we\'ll swiftly move forward with the necessary arrangements to ensure everything is in place for your satisfaction. Please let us know if you have any questions or if there\'s anything else we can assist you with. We truly appreciate your business and look forward to serving you!',
            'button' => 'Track Order',
            'url' => 'http://127.0.0.1:8000/track_Sorder/' . $id,
            'lastline' => 'If you have any problems, you can contact us here or in our Facebook page https://www.facebook.com/yearnartofficial.',
        ];

        Notification::send($order, new YearnArtNotification($details));

        return redirect()->back();
    }
    public function to_onprocess($id){

        $order=order::find($id);

        $order->order_status="On Process";
        $order->downpayment_paid_at = now();

        $order->save();

        $details = [

            'subject' => 'Downpayment Paid',
            'greeting' => 'Good day, ' . $order['name'] . '!',
            'firstline' => 'We would like to infrom you that we already received your downpayment. Now, your order is on process.',
            'button' => 'Track Order',
            'url' => 'http://127.0.0.1:8000/track_Sorder/' . $id,
            'lastline' => 'If you have any problems, you can contact us here or in our Facebook page https://www.facebook.com/yearnartofficial.',
        ];

        Notification::send($order, new YearnArtNotification($details));


        return redirect()->back();
    }
    public function to_fpay($id){

        $order=order::find($id);

        $order->order_status="To Pay";

        $order->save();
        $details = [
            'subject' => 'Fullpayment Required',
            'greeting' => 'Good day, ' . $order['name'] . '!',
            'firstline' => 'We kindly request the full payment (50%) for your order to proceed with its finalization and delivery.',
            'button' => 'Track Order',
            'url' => 'http://127.0.0.1:8000/track_Sorder/' . $id,
            'lastline' => 'If you have any problems, you can contact us here or in our Facebook page https://www.facebook.com/yearnartofficial.',
        ];

        Notification::send($order, new YearnArtNotification($details));

        return redirect()->back();
    }
    public function to_ship($id){

        $order=order::find($id);

        $order->order_status="Shipping";
        $order->save();

        $details = [
            'subject' => 'To ship',
            'greeting' => 'Good day, ' . $order['name'] . '!',
            'firstline' => 'Yay! Finally your order is now on shipping',
            'button' => 'Track Order',
            'url' => 'http://127.0.0.1:8000/track_Sorder/' . $id,
            'lastline' => 'If you have any problems, you can contact us here or in our Facebook page https://www.facebook.com/yearnartofficial.',
        ];

        Notification::send($order, new YearnArtNotification($details));



        return redirect()->back();
    }


    public function customer_list(){
        $order=order::all();



        return view ('admin.customerlist', compact('order'));
    }

    public function search(Request $request){

        $searchtext= $request->search;

        $order=order::where('name','LIKE', "%$searchtext%")
        ->orWhere('email','LIKE', "%$searchtext%")
        ->orWhere('product_name','LIKE', "%$searchtext%")
        ->orWhere('size','LIKE', "%$searchtext%")
        ->orWhere('order_id','LIKE', "%$searchtext%")
        ->get();


        return view('admin.order', compact('order'));
    }

    public function searchDpayment(Request $request){

        $searchtext= $request->search;

        $order=order::where('name','LIKE', "%$searchtext%")
        ->orWhere('email','LIKE', "%$searchtext%")
        ->orWhere('product_name','LIKE', "%$searchtext%")
        ->orWhere('size','LIKE', "%$searchtext%")
        ->orWhere('order_id','LIKE', "%$searchtext%")
        ->get();


        return view('admin.dpayment', compact('order'));
    }
    public function searchPending(Request $request){

        $searchtext= $request->search;

        $order=order::where('name','LIKE', "%$searchtext%")
        ->orWhere('email','LIKE', "%$searchtext%")
        ->orWhere('product_name','LIKE', "%$searchtext%")
        ->orWhere('size','LIKE', "%$searchtext%")
        ->orWhere('order_id','LIKE', "%$searchtext%")
        ->get();


        return view('admin.pending', compact('order'));
    }
    public function searchOnprocess(Request $request){

        $searchtext= $request->search;

        $order=order::where('name','LIKE', "%$searchtext%")
        ->orWhere('email','LIKE', "%$searchtext%")
        ->orWhere('product_name','LIKE', "%$searchtext%")
        ->orWhere('size','LIKE', "%$searchtext%")
        ->orWhere('order_id','LIKE', "%$searchtext%")

        ->get();


        return view('admin.onprocess', compact('order'));
    }
    public function to_order_completed($id){

        $order=order::find($id);

        $order->order_status="Order Completed";
        $order->completed_at=now();

        $order->save();

        $details = [

            'subject' => 'Order Completed',
            'greeting' => 'Dear ' . $order['name'] . ',',
            'firstline' => '
            We are delighted to inform you that your order has been successfully completed! Thank you for choosing Yearn Art for your purchase. To view and print your receipt, click on the following button:',
            'button' => 'Print Receipt',
            'url' => 'http://127.0.0.1:8000/fullpayment_receipt/' . $id,
            'lastline' => 'If you have any problems, you can contact us here or in our Facebook page https://www.facebook.com/yearnartofficial.',
        ];

        Notification::send($order, new YearnArtNotification($details));


        return redirect()->back();
    }


// chart
public function get_data(Request $request)
{
    // Get the selected year from the request or use the current year as a default
    $selectedYear = $request->input('selected_year', date('Y'));

    $monthLabels = [
        'Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'
    ];

    // Initialize an array with zero values for each month
    $completedOrders = array_fill_keys($monthLabels, 0);

    // Fetch data from the database and update the array
    $ordersData = Order::where('order_status', 'Order Completed')
        ->whereYear('completed_at', $selectedYear) // Filter by the selected year
        ->selectRaw('MONTH(completed_at) as month, SUM(quantity) as total_quantity')
        ->groupBy(DB::raw('MONTH(completed_at)'))
        ->get();

    foreach ($ordersData as $data) {
        $completedOrders[$monthLabels[$data->month - 1]] = $data->total_quantity;
    }

    return response()->json(['data' => array_values($completedOrders), 'labels' => $monthLabels]);
}

public function get_data_category(Request $request)
{
    // Get the selected year from the request or use the current year as a default
    $selectedYear = $request->input('selected_year', date('Y'));

    // Get the current month
    $currentMonth = date('m');

    // Get all distinct categories from the database
    $allCategories = Order::distinct()->pluck('category');

    // Initialize category counts array with all categories set to 0
    $categoryCountsArray = $allCategories->mapWithKeys(function ($category) {
        return [$category => 0];
    })->toArray();

    // Fetch data from the database and update the array
    $categoryCounts = Order::where('order_status', 'Order Completed')
        ->whereYear('completed_at', $selectedYear) // Filter by the selected year
        ->whereMonth('completed_at', $currentMonth) // Filter by the current month
        ->selectRaw('category, COUNT(*) as total')
        ->groupBy('category')
        ->get();

    // Update the counts for categories with orders
    foreach ($categoryCounts as $categoryCount) {
        $categoryCountsArray[$categoryCount->category] = $categoryCount->total;
    }

    // Sort the category counts array by values in descending order
    arsort($categoryCountsArray);

    return response()->json(['data' => $categoryCountsArray, 'selected_year' => $selectedYear]);
}


public function edit_order($id){

    $order=order::find($id);

    return view ('admin.edit_order', compact('order'));

}

public function cancel_order($id){
    $order = order::find($id);

    if (!$order) {
        // Handle the case where the order with the given ID is not found.
        abort(404);
    }

    $order->order_status = 'Cancelled';
    $order->save();

    return redirect()->back();
}




public function  edit_order_confirm(Request $request, $id){
    $order = order::find($id);

    $order->primaryclr = $request->primaryclr;
    $order->size = $request->size;
    $order->secondaryclr = $request->secondaryclr;
    $order->price = $request->price;
    $order->processing_time = $request->processing_time;







    $order->save();
    return redirect()->back();
}


public function sales_report() {
    $user = Auth::user();
    $id = $user->id;

    // Assuming your order status column is named 'order_status' and the created_at column is named 'created_at'
    $orders = Order::whereYear('created_at', now()->year) // Filter by the current year
        ->whereMonth('completed', now()->month) // Filter by the current month
        ->get();

    $categoryCounts = Order::whereYear('completed_at', now()->year) // Filter by the current year
        ->whereMonth('completed_at', now()->month) // Filter by the current month
        ->selectRaw('category, COUNT(category) as total')
        ->groupBy('category')
        ->get();

    // Sort the category counts from highest to lowest
    $categoryCounts = $categoryCounts->sortByDesc('total');

    $pdf = Pdf::loadView('admin.sales_report', ['id' => $id, 'user' => $user, 'orders' => $orders, 'categoryCounts' => $categoryCounts]);
    return $pdf->download('Trend Report.pdf');
}

public function sales_report_edit() {
    $user = Auth::user();
    $id = $user->id;

    // Assuming your order status column is named 'order_status' and the created_at column is named 'created_at'
    $orders = Order::whereYear('created_at', now()->year) // Filter by the current year
        ->whereMonth('created_at', now()->month) // Filter by the current month
        ->get();

    $categoryCounts = Order::whereYear('created_at', now()->year) // Filter by the current year
        ->whereMonth('created_at', now()->month) // Filter by the current month
        ->selectRaw('category, COUNT(category) as total')
        ->groupBy('category')
        ->get();

        return view ('admin.sales_report', compact('orders', 'categoryCounts', 'user'));


}

}

