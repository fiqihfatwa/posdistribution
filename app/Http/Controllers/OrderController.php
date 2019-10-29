<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Transaction;
use App\DataTables\OrderDataTable;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Show the order page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::where('user_id', Auth::user()->created_by)->get();

        return view('order.index', compact('packages'));
    }

    public function show(Package $package)
    {
        return view('order.show', compact('package'));
    }

    /**
     * Display a listing of the Transaction.
     *
     * @param OrderDataTable $orderDataTable
     * @return Response
     */
    public function history(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('order.history');
    }

    public function showHistory(Transaction $transaction)
    {
        $licenses = Transaction::find($transaction->id)->license;

        return view('order.history_show', compact('transaction'))->with('licenses', $licenses);
    }
}
