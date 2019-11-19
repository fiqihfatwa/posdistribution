<?php

namespace App\Http\Controllers;

use App\DataTables\OrderDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Package;
use App\Models\License;
use App\Models\Transaction;

class OrderController extends AppBaseController
{

    /**
     * Show the Order page
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::where('user_id', Auth::user()->created_by)->get();

        return view('order.index', compact('packages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('order.show', compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  param CreateOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrderRequest $request)
    {
        $package = Package::where('id', $request->package_id)->first();
        $license = License::where('user_id', $package->user_id)->where('sold_in', 0);
        $stock = $license->count();
        $licenses = $license->get();

        //check stock seller
        if($stock < $package->amount) {
            return redirect(url()->previous())
                ->with('status', 'alert-danger')
                ->with('message', 'Stock seller is not enough.');
        }

        $input = $request->all();
        $input['transaction_number'] = time().strtoupper(substr(uniqid(sha1(time())),0,4));
        $input['customer_id'] = Auth::user()->id;
        $input['shop_id'] = $package->user_id;
        $input['grand_total'] = $package->price;
        $input['status_id'] = 1;

        $transaction = Transaction::create($input);

        return redirect(route('order.history.show', $transaction->id));
    }

    /**
     * Display a listing of the History Order 
     *
     * @param OrderDataTable $orderDataTable
     * @return Response
     */
    public function history(OrderDataTable $orderDataTable)
    {
        return $orderDataTable->render('order.history');
    }

    /**
     * Display the specified resource.
     *
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function showHistory(Transaction $transaction)
    {
        $licenses = Transaction::find($transaction->id)->license;

        return view('order.history_show', compact('transaction'))->with('licenses', $licenses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderRequest $request
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Transaction $transaction)
    {
        $path = $request->payment_img->store('public/payments');

        $update = Transaction::where('id', $transaction->id)
                        ->update([
                            'status_id' => 2,
                            'payment_img' => $path,
                        ]);

        return redirect(route('order.history.show', $transaction->id))
                        ->with('status', 'alert-success')
                        ->with('message', 'Upload payment success. Please wait confirmation from seller.');
    }
}
