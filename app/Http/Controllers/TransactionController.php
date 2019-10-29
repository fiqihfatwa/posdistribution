<?php

namespace App\Http\Controllers;

use App\DataTables\TransactionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use App\Repositories\TransactionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Illuminate\Support\Facades\Auth;

use App\Models\License;
use App\Models\Package;

class TransactionController extends AppBaseController
{
    /** @var  TransactionRepository */
    private $transactionRepository;

    public function __construct(TransactionRepository $transactionRepo)
    {
        $this->transactionRepository = $transactionRepo;
    }

    /**
     * Display a listing of the Transaction.
     *
     * @param TransactionDataTable $transactionDataTable
     * @return Response
     */
    public function index(TransactionDataTable $transactionDataTable)
    {
        return $transactionDataTable->render('transactions.index');
    }

    /**
     * Show the form for creating a new Transaction.
     *
     * @return Response
     */
    public function create()
    {
        return view('transactions.create');
    }

    /**
     * Store a newly created Transaction in storage.
     *
     * @param CreateTransactionRequest $request
     *
     * @return Response
     */
    public function store(CreateTransactionRequest $request)
    {
        $input = $request->all();

        if(empty($request->customer_id)) {
            $input['customer_id'] = Auth::user()->id;
        }

        if(empty($request->shop_id)) {
            $input['shop_id'] = Auth::user()->created_by;
        }

        $package = Package::where('id', $input['package_id'])->first();
        $license = License::where('user_id', $input['shop_id'])->where('sold_in', 0);
        $stock = $license->count();
        $licenses = $license->get();

        //check stock seller
        if($stock < $package->amount) {
            return redirect(url()->previous())->with('status', 'Stock seller is not enough.');
        }

        //check seller can't same as customer
        if($input['shop_id'] == $input['customer_id']) {
            return redirect(route('transactions.create'))->with('status', 'Seller and customer is same.');
        }

        //check payment image
        if(!empty($request->payment_img))
            $path = $request->payment_img->store('public/payments');
        else 
            $path = '';

        $input['transaction_number'] = time().strtoupper(substr(uniqid(sha1(time())),0,4));
        $input['grand_total'] = $package->price;
        $input['payment_img'] = $path;

        $transaction = $this->transactionRepository->create($input);

        //check status if complete create license for customer from seller
        if($input['status_id'] == 3) {
            for($i = 0; $i < $package->amount; $i++)
            {
                License::where('id', $licenses[$i]->id)
                    ->update([
                        'sold_in' => $transaction->id,
                    ]);

                License::create([
                    'license_key' => $licenses[$i]->license_key,
                    'sold_in' => 0,
                    'user_id' => $input['customer_id'],
                ]);
            }
        }

        Flash::success('Transaction saved successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Display the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }
        
        return view('transactions.show')->with('transaction', $transaction);
    }

    /**
     * Show the form for editing the specified Transaction.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        return view('transactions.edit')->with('transaction', $transaction);
    }

    /**
     * Update the specified Transaction in storage.
     *
     * @param  int              $id
     * @param UpdateTransactionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTransactionRequest $request)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        if(!empty($request->payment_img))
            $path = $request->payment_img->store('public/payments');
        else 
            $path = $transaction->payment_img;

        $transaction = $this->transactionRepository->update([
            'customer_id' => $request->customer_id,
            'shop_id' => $request->shop_id,
            'package_id' => $request->package_id,
            'status' => $request->status,
            'grand-total' => $request->grand_total,
            'payment_img' => $path,
        ], $id);

        Flash::success('Transaction updated successfully.');

        return redirect(route('transactions.index'));
    }

    /**
     * Remove the specified Transaction from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $transaction = $this->transactionRepository->find($id);

        if (empty($transaction)) {
            Flash::error('Transaction not found');

            return redirect(route('transactions.index'));
        }

        $this->transactionRepository->delete($id);

        Flash::success('Transaction deleted successfully.');

        return redirect(route('transactions.index'));
    }
    
}
