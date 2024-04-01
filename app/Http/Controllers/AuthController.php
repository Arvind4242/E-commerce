<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
//use Illuminate\Session\Store;


class AuthController extends Controller
{

    public function adloadRegister(){
        return view('admin-register');
    }

    public function adregister(Request $req){
        // Validate the request if necessary

        $req->validate([
            'name' => 'string|required|min:5',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        $userData = $req->all();
        $req->hasFile('gallery');
        $galleryName = $req->file('gallery')->getClientOriginalName();
        $req->file('gallery')->move('uploads/', $galleryName);
        $userData['gallery'] = $galleryName;

        $result = Product::create($userData);
        if($result){
            return back()->with('success','Product Added Successfully!');
        }else{
            return ('error');
        }
    }



    public function loadRegister(){
        return view('register');
    }

    public function register(Request $req){
        //dd($req->all());

        /*$req->validate([
            'name' => 'string|required|min:5',
            'email' => 'email|required',
            'password' => 'required|confirmed|min:5',
            'address' => 'required',
        ]);*/


        $userData = $req->all();

        //dd($userData);
        $userData['password'] = Hash::make($req->input('password'));
        $result = User::create($userData);


        if($result){
          return redirect(route('login'))->with('success',
          'Your data added successfully!');
        }else{
          return redirect(route('register'))->with('error',
            'Something went wrong!');
        }

    }

    public function loadLogin(){
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }

    public function login(Request $req){

        $req->validate([
            'email' => 'string|required|min:2',
            'password' => 'string|required|min:5'
        ]);


        $user = $req->only('email','password');

        if(Auth::attempt($user)){

            $route = $this->redirectDash();
            return redirect($route);
            //return redirect('/')->with('s', 'You have logged in successfully!');
        }

        return redirect('/login')->with('error', 'Something went wrong');
    }


    public function logout(Request $req){
      //  Session::forget('user');
        Auth::logout();
        return redirect('/user/login');
    }

    public function redirectDash()
    {
        $redirect = '';

        if(Auth::user() && Auth::user()->role == 1){
            $redirect = '/user/home';
        } else if(Auth::user() && Auth::user()->role == 0){
            $redirect = '/admin/add';
        }
        else{
            $redirect = '/login';
        }

        return $redirect;
    }

}
