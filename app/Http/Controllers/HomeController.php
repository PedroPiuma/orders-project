<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        // echo "<pre>";
        // print_r($user);

        // echo "<pre>";
        // print_r(DB::table('orders')->get('*'));

        $userOrders = DB::table('orders')->where('user_id', $user->id)->get('*')->all();
        // echo "<pre>";
        // print_r($orders);

        $data = ['name' => $user->name, 'orders' => $userOrders];
        if ($user->tier === 1) {
            $data['allOrders'] = DB::table('orders')->get('*')->all();
        }

        return view('home')->with($data);
    }
}
