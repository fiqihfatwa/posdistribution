<?php

namespace App\Http\Controllers;

use App\DataTables\MyCustomerDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class MyCustomerController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the Customer.
     *
     * @param MyCustomerDataTable $myCustomerDataTable
     * @return Response
     */
    public function index(MyCustomerDataTable $myCustomerDataTable)
    {
        return $myCustomerDataTable->render('my_customer.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('my_customer.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = Auth::user()->id;
        $input['role_id'] = 2;

        $user = $this->userRepository->create([
            'name' => $input['name'],
            'nik' => $input['nik'],
            'gender' => $input['gender'],
            'address' => $input['address'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'created_by' => $input['created_by'],
            'role_id' => $input['role_id'],
        ]);

        Flash::success('User saved successfully.');

        return redirect(route('customer.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);
        $parent = $this->userRepository->find($user->created_by);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('customer.index'));
        }

        return view('my_customer.show')->with('user', $user)->with('parent', $parent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        return view('my_customer.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('users.index'));
        }

        $input = $request->all();

        if(empty($input['password'])) {
            $input['password'] = $user->password;
        }
        
        $user = $this->userRepository->update([
            'name' => $input['name'],
            'nik' => $input['nik'],
            'gender' => $input['gender'],
            'address' => $input['address'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ], $id);

        Flash::success('User updated successfully.');

        return redirect(route('customer.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('customer.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('User deleted successfully.');

        return redirect(route('customer.index'));
    }
}
