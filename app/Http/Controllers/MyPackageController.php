<?php

namespace App\Http\Controllers;

use App\DataTables\MyPackageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatePackageRequest;
use App\Http\Requests\UpdatePackageRequest;
use App\Repositories\PackageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

use Illuminate\Support\Facades\Auth;

class MyPackageController extends AppBaseController
{
    /** @var  PackageRepository */
    private $packageRepository;

    public function __construct(PackageRepository $packageRepo)
    {
        $this->packageRepository = $packageRepo;
    }

    /**
     * Display a listing of the Package.
     *
     * @param MyPackageDataTable $myPackageDataTable
     * @return Response
     */
    public function index(MyPackageDataTable $myPackageDataTable)
    {
        return $myPackageDataTable->render('my_package.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('my_package.create');
    }

    /**
     * Store a newly created Package in storage.
     *
     * @param CreatePackageRequest $request
     *
     * @return Response
     */
    public function store(CreatePackageRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::user()->id;

        $package = $this->packageRepository->create($input);

        Flash::success('Package saved successfully.');

        return redirect(route('mypackage.index'));
    }

    /**
     * Display the specified Package.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('mypackage.index'));
        }

        return view('my_package.show')->with('package', $package);
    }

    /**
     * Show the form for editing the specified Package.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('mypackage.index'));
        }

        return view('my_package.edit')->with('package', $package);
    }

    /**
     * Update the specified Package in storage.
     *
     * @param  int              $id
     * @param UpdatePackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePackageRequest $request)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('mypackage.index'));
        }

        $package = $this->packageRepository->update($request->all(), $id);

        Flash::success('Package updated successfully.');

        return redirect(route('mypackage.index'));
    }

    /**
     * Remove the specified Package from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $package = $this->packageRepository->find($id);

        if (empty($package)) {
            Flash::error('Package not found');

            return redirect(route('mypackage.index'));
        }

        $this->packageRepository->delete($id);

        Flash::success('Package deleted successfully.');

        return redirect(route('mypackage.index'));
    }
}
