<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\License;
use App\Models\Package;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::count();
        $transactions = Transaction::count();
        $licenses = License::where('user_id', Auth::user()->id)->count();
        $packages = Package::count();

        $mycustomers = User::where('created_by', Auth::user()->id)->count();
        $mytransactions = Transaction::where('shop_id', Auth::user()->id)->count();
        $mypackages = Package::where('user_id', Auth::user()->id)->count();
        $mystocks = License::where('user_id', Auth::user()->id)
            -> where('sold_in', 0)    
            ->count();

        $newpayment = Transaction::where('shop_id', Auth::user()->id)->where('status_id', 2)->count();

        $orderpayment = Transaction::where('customer_id', Auth::user()->id)->where('status_id', 1)->count();
        $orderconfirmation = Transaction::where('customer_id', Auth::user()->id)->where('status_id', 2)->count();
        $ordercomplete = Transaction::where('customer_id', Auth::user()->id)->where('status_id', 3)->count();

        return view('home')
            ->with('users', $users)
            ->with('transactions', $transactions)
            ->with('licenses', $licenses)
            ->with('packages', $packages)
            ->with('mycustomers', $mycustomers)
            ->with('mytransactions', $mytransactions)
            ->with('mypackages', $mypackages)
            ->with('mystocks', $mystocks)
            ->with('newpayment', $newpayment)
            ->with('orderpayment', $orderpayment)
            ->with('orderconfirmation', $orderconfirmation)
            ->with('ordercomplete', $ordercomplete);
    }
}
