<?php

namespace App\Http\Controllers;

use App\DataTables\MyTransactionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Auth;

use App\Models\Transaction;
use App\Models\License;
use App\Models\Package;

class MyTransactionController extends AppBaseController
{

    /**
     * Display a listing of the Transaction.
     *
     * @param MyTransactionDataTable $myTransactionDataTable
     * @return Response
     */
    public function index(MyTransactionDataTable $myTransactionDataTable)
    {
        return $myTransactionDataTable->render('my_transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $licenses = Transaction::find($transaction->id)->license;

        return view('my_transaction.show', compact('transaction'))->with('licenses', $licenses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateOrderRequest $request
     * @param  Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        $package = Package::where('id', $transaction->package_id)->first();
        $license = License::where('user_id', $transaction->shop_id)->where('sold_in', 0);
        $stock = $license->count();
        $licenses = $license->get();

        //check stock seller
        if($stock < $package->amount) {
            return redirect(route('mytransaction.show', $transaction->id))
                            ->with('status', 'alert-danger')
                            ->with('message', 'Your stock is not enough.');
        }


        $update = Transaction::where('id', $transaction->id)
                        ->update([
                            'status_id' => 3,
                        ]);
        if($update) {
            for($i = 0; $i < $package->amount; $i++)
            {
                License::where('id', $licenses[$i]->id)
                    ->update([
                        'sold_in' => $transaction->id,
                    ]);

                License::create([
                    'license_key' => $licenses[$i]->license_key,
                    'sold_in' => 0,
                    'user_id' => $transaction->customer_id,
                ]);
            }
        }

        return redirect(route('mytransaction.show', $transaction->id))
                        ->with('status', 'alert-success')
                        ->with('message', 'Payment received. Transaction Complete');
    }
}
