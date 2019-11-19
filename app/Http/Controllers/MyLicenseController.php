<?php

namespace App\Http\Controllers;

use App\DataTables\MyLicenseDataTable;
use App\Repositories\LicenseRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MyLicenseController extends AppBaseController
{
    /** @var  LicenseRepository */
    private $licenseRepository;

    public function __construct(LicenseRepository $licenseRepo)
    {
        $this->licenseRepository = $licenseRepo;
    }

    /**
     * Display a listing of the License.
     *
     * @param MyLicenseDataTable $myLicenseDataTable
     * @return Response
     */
    public function index(MyLicenseDataTable $myLicenseDataTable)
    {
        return $myLicenseDataTable->render('my_license.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $license = $this->licenseRepository->find($id);

        if (empty($license)) {
            Flash::error('License not found');

            return redirect(route('licenses.index'));
        }

        $licenses = \App\Models\License::where('license_key', $license->license_key)->with('user')->get();

        return view('my_license.show')
            ->with('license', $license)
            ->with('licenses', $licenses);
    }
}
