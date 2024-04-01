<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

class ProductController extends Controller
{
    public function index(){
      //   return Product::all();
       $data =  Product::all();

       return view('product',['data'=>$data]);
    }

    public function detail(Request $req, $id){
        $product = Product::find($id);

        return view('detail',['product'=>$product]);
    }

    public function search(Request $req){

        $search = ['name', 'category'];

        $data = Product::where(function ($query) use ($search, $req) {
            foreach ($search as $column) {
                $query->orWhere($column, 'like', '%' . $req->input('search') . '%');
            }
        })->get();


        return view('search',['products'=>$data]);
    }

   public function addCart(Request $req)
    {
        //$req->session()->has('user')
       if($user_id = auth()->id()) {
        $cart = new Cart;
        $cart->user_id = $user_id;
        $cart->product_id = $req->product_id;
        $cart->save();
        return redirect('/');
       }else{
        return redirect('/login');
       }


    }

    static function cartItem()
    {
        //$req->session()->has('user')
        $user_id = auth()->id();
        //dd($user_id);
        return Cart::where('user_id',$user_id)->count();
    }

    public function cartList(){
         $userId = Auth::user()['id'];

         $products = DB::table('cart')
                    ->join('products','cart.product_id','=','products.id')
                    ->where('cart.user_id',$userId)
                    ->select('products.*','cart.id as cart_id')
                    ->get();

                    return view('cartList',['products'=>$products]);
    }


    public function removeItem(Request $req, $id){
        Cart::destroy($id);
        return redirect('/cart-list');
    }

    public function orderItem(){
        $userId = Auth::user()['id'];

        $total = DB::table('cart')
                   ->join('products','cart.product_id','=','products.id')
                   ->where('cart.user_id',$userId)
                   ->select('products.*','cart.id as cart_id')
                   ->sum('products.price');

                   return view('orderNow',['total'=>$total]);
    }

    public function orderPlace(Request $req){
        $userId = Auth::user()['id'];
        $allCart = Cart::where('user_id',$userId)->get();

        foreach($allCart as $cart){

            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            $order->payment_method = $req->payment;
            $order->payment_status = "pending";
            $order->address = $req->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();
        }
        return redirect('/');
    }

    public function myOrder(){
        $userId = Auth::user()['id'];

        $order = DB::table('orders')
                   ->join('products','orders.product_id','=','products.id')
                   ->where('orders.user_id',$userId)
                   ->get();

        return view('myorders',['order'=> $order]);
    }
}
